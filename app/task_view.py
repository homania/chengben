from flask import Flask, request, render_template, redirect, session, url_for, request, g, send_from_directory, jsonify, json, flash
from flask_sqlalchemy import SQLAlchemy
from datetime import datetime, date, timedelta
from app import app, db, models
from .models import User, itemdata, menutable, vendortable, analytics, dictionary, averagedb, uniquedb, chargedb, ratesdb
from .models import usersdb, linkcheck, accounting, receiptdb, watchlistdb, tabledb, booking_tablenamesdb, hr_sched_views, taskdb, taskdb
from .forms import MenuData, ItemEdit, ReceiptEdit, BookingEdit, SchedEdit, SignupForm
from config import ITEMS_PER_PAGE, WHOOSH_BASE, SECRET_KEY
import PIL, uuid, requests, re
from PIL import ImageFont, Image, ImageDraw
from sqlalchemy import func, create_engine, distinct, or_
from sqlalchemy.orm import sessionmaker
import webbrowser, random, os, string, ctypes, datetime, calendar, operator
import geoip2.database
from functools import reduce, wraps
from string import ascii_lowercase, digits
from random import choice, randrange
from operator import itemgetter
from flask_login import LoginManager, login_user, logout_user, current_user


def l1menu():
    l1_list = ['Uncategorized']
    test = taskdb.query.filter(taskdb.timef == None).order_by(taskdb.taskid.asc())
    for t in test:
        if t.category is None:
            t.category = 'Uncategorized'
        if t.category not in l1_list:
            l1_list.append(t.category)

    cat_qry = taskdb.query.filter(taskdb.timef == None)
    cat_list = []
    for c in cat_qry:
        if c.category is None or c.category == '':
            cname = 'Uncategorized'
        else:
            cname = c.category
            
        try:
            test = [x[1] for x in cat_list].index(cname)
            cat_list[test][0] += 1
        except ValueError:
            cat_list.append([1,cname])            
            
    #browser_qry = analytics.query.filter(analytics.parsed == 0).group_by(analytics.sid)
    #browser_list = []
    #for t in browser_qry:
    #    bname = t.browser
    #    try:
    #        test = [x[1] for x in browser_list].index(bname)
    #        browser_list[test][0] += 1
    #    except ValueError:
    #        browser_list.append([1,bname])
            
    return cat_list

def l2menu():
    l2query = taskdb.query.filter(taskdb.timef == None).order_by(taskdb.taskid.asc())
    return l2query

@app.route('/tasklist/', methods=['GET', 'POST'])
def tasklist():
    ref = request.args.get('ref')
    if ref:
        datevar = datetime.datetime.strptime(ref, "%Y-%m-%d")
    else:
        datevar = datetime.date.today()

    if datevar.isoweekday() != 7:
        start_date = datevar - timedelta(days=datevar.isoweekday())
    else:
        start_date = datevar
        
    end_date = start_date + timedelta(days = 6)
    trans2 = taskdb.query.filter(taskdb.datef >= start_date).filter(taskdb.datef <= end_date).order_by(taskdb.datef.asc()).order_by(taskdb.timef.asc())
    trans = taskdb.query.filter(taskdb.datef == datevar).order_by(taskdb.timef.desc())

    userid = 0
    dayviews = hr_sched_views.query.filter(hr_sched_views.user_id == userid).filter(hr_sched_views.visible == 1).order_by(hr_sched_views.cview_id.asc())

    datevar = start_date - timedelta(days=1)
    for d in dayviews:
        d.date_field = datevar + timedelta(days=1)
        d.date_field = d.date_field.strftime("%Y-%m-%d")
        datevar += timedelta(days=1)

    for t in trans2:
        if t.timef != None:
            t.timef = t.timef.strftime("%H:%M")
        t.dayvar = t.datef.strftime("%A")
        for d in dayviews:
            if t.dayvar == d.dayname:
                t.color = d.color
                
    l1menus = l1menu()
    l2menus = l2menu()
            
    return render_template("tasklist.html", trans=trans, dayviews = dayviews, datevar = datevar, ref=ref, user=current_user, trans2=trans2,
                           l1menu=l1menus,l2menu=l2menus)

def find_start(text):
    if text and text != 'None':
        if text.find('/') > -1:
            month,date,year = text.split('/')
            dt = year + '-' + month + '-' + date
            datevar = datetime.datetime.strptime(dt, "%Y-%m-%d")
        else:
            datevar = datetime.datetime.strptime(text, "%Y-%m-%d")
    else:        
        datevar = datetime.date.today()
    if datevar.isoweekday() != 7:
        start_date = datevar - timedelta(days=datevar.isoweekday())
    else:
        start_date = datevar
    return start_date

def formatdate(text):
    if text and text != 'None':
        if text.find('/') > -1:
            month,date,year = text.split('/')
            dt = year + '-' + month + '-' + date
            datevar = datetime.datetime.strptime(dt, "%Y-%m-%d")
        else:
            datevar = datetime.datetime.strptime(text, "%Y-%m-%d")
    else:        
        datevar = datetime.date.today()
    return datevar

def last_day_of_month(date):
    if date.month == 12:
        return date.replace(day=31)
    return date.replace(month=date.month+1, day=1) - datetime.timedelta(days=1)

@app.route('/date_test_task/')
def date_test_task():            #hr_scheduling date retrieval, modify for other functions later
    text = request.args.get('jsdata')
    category = request.args.get('category')
    start_date = find_start(text)
    
    #end_date = last_day_of_month(start_date) #still need to fix
    end_date = '2018-12-31'

    if category:
        date_filter = taskdb.query.filter(taskdb.datef <= end_date).group_by(taskdb.datef).filter(taskdb.category == category) \
                      .order_by(taskdb.datef.asc()).order_by(taskdb.timef.asc())
    else:
        date_filter = taskdb.query.filter(taskdb.datef <= end_date).group_by(taskdb.datef).order_by(taskdb.datef.asc()).order_by(taskdb.timef.asc())
    df2 = []
    if date_filter:
        for d in date_filter:
            df2.append(d.datef)
    return jsonify(df2)

@app.route('/taskdatelist/')
def taskdatelist():         #receipt transactions - update bottom list based on date
    text = request.args.get('jsdata')
    category = request.args.get('category')
    e_date = request.args.get('e_date')
    if e_date:
        start_date = formatdate(e_date)
        end_date = start_date
    else:
        start_date = find_start(text)
        end_date = start_date + timedelta(days = 6)

    if category:
        trans = taskdb.query.filter(taskdb.datef >= start_date).filter(taskdb.datef <= end_date).filter(taskdb.category == category) \
                .order_by(taskdb.datef.asc()).order_by(taskdb.timef.desc())
    else:
        trans = taskdb.query.filter(taskdb.datef >= start_date).filter(taskdb.datef <= end_date).order_by(taskdb.datef.asc()).order_by(taskdb.timef.desc())

    userid = 0
    dayviews = hr_sched_views.query.filter(hr_sched_views.user_id == userid).filter(hr_sched_views.visible == 1).order_by(hr_sched_views.cview_id.asc())

    for t in trans:
        if t.timef != None:
            t.timef = t.timef.strftime("%H:%M")
        t.dayvar = t.datef.strftime("%A")
        for d in dayviews:
            if t.dayvar == d.dayname:
                t.color = d.color
                d.date_field = t.datef
        
    return render_template("taskdatelist.html", trans = trans, user=current_user)

@app.route('/tasktableupdate/')  #task-dates-table ('task_table') id
def tasktableupdate():
    category = request.args.get('category')
    dateg = request.args.get('dateg')
    
    start_date = find_start(dateg)
    end_date = start_date + timedelta(days = 6)
    if category:
        trans = taskdb.query.filter(taskdb.datef >= start_date).filter(taskdb.datef <= end_date).filter(taskdb.category == category) \
            .order_by(taskdb.datef.asc()).order_by(taskdb.timef.asc())
    else:
        trans = taskdb.query.filter(taskdb.datef >= start_date).filter(taskdb.datef <= end_date).order_by(taskdb.datef.asc()).order_by(taskdb.timef.asc())

    userid = 0
    dayviews = hr_sched_views.query.filter(hr_sched_views.user_id == userid).filter(hr_sched_views.visible == 1).order_by(hr_sched_views.cview_id.asc())

    datevar = start_date - timedelta(days=1)
    for d in dayviews:
        d.date_field = datevar + timedelta(days=1)
        d.date_field = d.date_field.strftime("%Y-%m-%d")
        datevar += timedelta(days=1)
    
    for t in trans:
        if t.timef != None:
            t.timef = t.timef.strftime("%H:%M")
        t.dayvar = t.datef.strftime("%A")
        for d in dayviews:
            if t.dayvar == d.dayname:
                t.color = d.color
                d.date_field = t.datef
        
    
    return render_template("tasktableupdate.html", trans = trans, dayviews = dayviews, user=current_user)

@app.route('/tasktablecommit/')  #booking_table_update & commit ('booking_table') id
def tasktablecommit():
    taskid = request.args.get('taskid')
    datef = request.args.get('sdate')
    task_edit = taskdb(taskid = taskid, datef = datef)
    db.session.merge(task_edit)
    db.session.commit()
    
    start_date = find_start(datef)
    end_date = start_date + timedelta(days = 6)

    trans = taskdb.query.filter(taskdb.datef >= start_date).filter(taskdb.datef <= end_date).order_by(taskdb.datef.asc()).order_by(taskdb.timef.asc())

    userid = 0
    dayviews = hr_sched_views.query.filter(hr_sched_views.user_id == userid).filter(hr_sched_views.visible == 1).order_by(hr_sched_views.cview_id.asc())

    datevar = start_date - timedelta(days=1)
    for d in dayviews:
        d.date_field = datevar + timedelta(days=1)
        d.date_field = d.date_field.strftime("%Y-%m-%d")
        datevar += timedelta(days=1)    
    
    for t in trans:
        if t.timef != None:
            t.timef = t.timef.strftime("%H:%M")
        else:
            t.timef = 0
        t.dayvar = t.datef.strftime("%A")
        for d in dayviews:
            if t.dayvar == d.dayname:
                t.color = d.color
                d.date_field = t.datef
    
    return render_template("tasktableupdate.html", trans = trans, dayviews = dayviews, user=current_user)

@app.route('/task_del/')
def task_del():
    taskid = request.args.get('taskid')
    datef = request.args.get('datef')
    
    taskdb.query.filter(taskdb.taskid == taskid).delete()
    db.session.commit()
    
    start_date = find_start(datef)
    end_date = start_date + timedelta(days = 6)

    trans = taskdb.query.filter(taskdb.datef >= start_date).filter(taskdb.datef <= end_date).order_by(taskdb.datef.asc()).order_by(taskdb.timef.asc())

    userid = 0
    dayviews = hr_sched_views.query.filter(hr_sched_views.user_id == userid).filter(hr_sched_views.visible == 1).order_by(hr_sched_views.cview_id.asc())

    datevar = start_date - timedelta(days=1)
    for d in dayviews:
        d.date_field = datevar + timedelta(days=1)
        d.date_field = d.date_field.strftime("%Y-%m-%d")
        datevar += timedelta(days=1)    
    
    for t in trans:
        if t.timef != None:
            t.timef = t.timef.strftime("%H:%M")
        t.dayvar = t.datef.strftime("%A")
        for d in dayviews:
            if t.dayvar == d.dayname:
                t.color = d.color
                d.date_field = t.datef
    
    return render_template("tasktableupdate.html", trans = trans, dayviews = dayviews, user=current_user)

@app.route('/task_add/')
def task_add():
    taskid = request.args.get('taskid')
    if taskid == '' or not taskid:
        last_task = taskdb.query.filter(taskdb.taskid > 0).order_by(taskdb.taskid.desc()).first()
        taskid = last_task.taskid + 1
        #taskid = 6
    category = request.args.get('category')
    if category == '':
        category = None
    entry_type = request.args.get('entry_type')
    if entry_type == '':
        entry_type = None
    scratchbox = request.args.get('scratchbox')
    if scratchbox == '':
        scratchbox = None
    description = request.args.get('description')
    if description == '':
        description = None
    else:
        description = description.replace("'", "\\\'")
        description = description.replace('\n', '<br />')
    timef = request.args.get('timef')
    modified = ''
    if timef == '' or not timef:
        timef = datetime.datetime.now().time()

    if category == 'Scratchbox':
        timef = None
        
    datef = request.args.get('datef')
    if (datef == 'None') or (not datef) or (datef == ''):
        new_sched = taskdb(taskid=taskid, category=category, entry_type=entry_type, description=description, modified=modified, datef=None, timef=None, scratchbox=scratchbox)
    else:
        new_sched = taskdb(taskid=taskid, category=category, entry_type=entry_type, description=description, timef=timef, datef=datef, modified=modified, scratchbox=scratchbox)
    db.session.merge(new_sched)
    db.session.commit()
    
    start_date = find_start(datef)
    end_date = start_date + timedelta(days = 6)

    trans = taskdb.query.filter(taskdb.datef >= start_date).filter(taskdb.datef <= end_date).order_by(taskdb.datef.asc()).order_by(taskdb.timef.asc())

    userid = 0
    dayviews = hr_sched_views.query.filter(hr_sched_views.user_id == userid).filter(hr_sched_views.visible == 1).order_by(hr_sched_views.cview_id.asc())

    datevar = start_date - timedelta(days=1)
    for d in dayviews:
        d.date_field = datevar + timedelta(days=1)
        d.date_field = d.date_field.strftime("%Y-%m-%d")
        datevar += timedelta(days=1)    
    
    for t in trans:
        if t.timef != None:
            t.timef = t.timef.strftime("%H:%M")
        t.dayvar = t.datef.strftime("%A")
        for d in dayviews:
            if t.dayvar == d.dayname:
                t.color = d.color
                d.date_field = t.datef
    
    return render_template("tasktableupdate.html", trans = trans, dayviews = dayviews, user=current_user)

@app.route('/taskmenuupdate/')
def taskmenuupdate():

    l1menus = l1menu()
    l2menus = l2menu()
    
    return render_template('taskmgr/leftmenu.html', l1menu=l1menus, l2menu=l2menus)

@app.route('/scratch_query/')
def scratch_query():
    taskid = request.args.get('taskid')
    if taskid == '' or not taskid:
        return ''
    else:
        this_query = taskdb.query.filter(taskdb.taskid == taskid).first()
    if this_query.scratchbox == None:
        return ''
    return this_query.scratchbox
