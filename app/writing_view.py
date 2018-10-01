from flask import Flask, request, render_template, redirect, session, url_for, request, g, send_from_directory, jsonify, json, flash
from flask_sqlalchemy import SQLAlchemy
from datetime import datetime, date, timedelta
from app import app, db, models
from .models import User, itemdata, menutable, vendortable, analytics, dictionary, averagedb, uniquedb, chargedb, ratesdb
from .models import usersdb, linkcheck, accounting, receiptdb, watchlistdb, tabledb, booking_tablenamesdb, hr_sched_views, taskdb, writingdb
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


@app.route('/writing/', methods=['GET', 'POST'])
def writing():
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
    trans = writingdb.query.filter(writingdb.datef >= start_date).filter(writingdb.datef <= end_date).order_by(writingdb.datef.asc())

    userid = 0
    dayviews = hr_sched_views.query.filter(hr_sched_views.user_id == userid).filter(hr_sched_views.visible == 1).order_by(hr_sched_views.cview_id.asc())

    datevar = start_date - timedelta(days=1)
    for d in dayviews:
        d.date_field = datevar + timedelta(days=1)
        d.date_field = d.date_field.strftime("%Y-%m-%d")
        datevar += timedelta(days=1)

    for t in trans:
        t.timef = t.timef.strftime("%H:%M")
        t.dayvar = t.datef.strftime("%A")
        for d in dayviews:
            if t.dayvar == d.dayname:
                t.color = d.color

    l1menu = writingdb.query.filter(writingdb.tier == 1).order_by(writingdb.order.asc())
    l2menu = writingdb.query.filter(writingdb.tier == 2).order_by(writingdb.parent.asc(), writingdb.order.asc())
    
    return render_template('writing/writing.html', title='Writing Builder', trans=trans, dayviews = dayviews, datevar = datevar, \
                           ref=ref, user=current_user, l1menu=l1menu, l2menu=l2menu)

def find_start(text):
    if text and text != 'None' and isinstance(text, str):
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

def last_day_of_month(date):
    if date.month == 12:
        return date.replace(day=31)
    return date.replace(month=date.month+1, day=1) - datetime.timedelta(days=1)

@app.route('/date_test_writing/')
def date_test_writing():            #hr_scheduling date retrieval, modify for other functions later
    text = request.args.get('jsdata')
    category = request.args.get('category')
    start_date = find_start(text)
    
    #end_date = last_day_of_month(start_date)
    end_date = '2018-07-31'

    if category:
        date_filter = writingdb.query.filter(writingdb.datef <= end_date).group_by(writingdb.datef).filter(writingdb.category == category) \
                      .order_by(writingdb.datef.asc())
    else:
        date_filter = writingdb.query.filter(writingdb.datef <= end_date).group_by(writingdb.datef).order_by(writingdb.datef.asc())  
    df2 = []
    if date_filter:
        for d in date_filter:
            df2.append(d.datef)
    return jsonify(df2)

@app.route('/writingdatelist/')
def writingdatelist():         #receipt transactions - update bottom list based on date
    text = request.args.get('jsdata')
    category = request.args.get('category')
    e_date = request.args.get('e_date')
    if e_date:
        start_date = e_date
        end_date = e_date
    else:
        start_date = find_start(text)
        end_date = start_date + timedelta(days = 6)

    if category:
        trans = writingdb.query.filter(writingdb.datef >= start_date).filter(writingdb.datef <= end_date).filter(writingdb.category == category) \
                .order_by(writingdb.datef.asc())
    else:
        trans = writingdb.query.filter(writingdb.datef >= start_date).filter(writingdb.datef <= end_date).order_by(writingdb.datef.asc())

    userid = 0
    dayviews = hr_sched_views.query.filter(hr_sched_views.user_id == userid).filter(hr_sched_views.visible == 1).order_by(hr_sched_views.cview_id.asc())

    for t in trans:
        t.timef = t.timef.strftime("%H:%M")
        t.dayvar = t.datef.strftime("%A")
        for d in dayviews:
            if t.dayvar == d.dayname:
                t.color = d.color
                d.date_field = t.datef
        
    return render_template('writing/writingdatelist.html', trans = trans, user=current_user)

@app.route('/writingmenuupdate/')
def writingmenuupdate():

    l1menu = writingdb.query.filter(writingdb.tier == 1).order_by(writingdb.order.asc())
    l2menu = writingdb.query.filter(writingdb.tier == 2).order_by(writingdb.parent.asc(), writingdb.order.asc())
    
    return render_template('writing/leftmenu.html', l1menu=l1menu, l2menu=l2menu)


@app.route('/writingtableupdate/')  #writing-dates-table ('writing_table') id
def writingtableupdate():
    category = request.args.get('category')
    dateg = request.args.get('dateg')
    
    start_date = find_start(dateg)
    end_date = start_date + timedelta(days = 6)
    if category:
        trans = writingdb.query.filter(writingdb.datef >= start_date).filter(writingdb.datef <= end_date).filter(writingdb.category == category) \
            .order_by(writingdb.timef.asc())
    else:
        trans = writingdb.query.filter(writingdb.datef >= start_date).filter(writingdb.datef <= end_date).order_by(writingdb.timef.asc())

    userid = 0
    dayviews = hr_sched_views.query.filter(hr_sched_views.user_id == userid).filter(hr_sched_views.visible == 1).order_by(hr_sched_views.cview_id.asc())

    datevar = start_date - timedelta(days=1)
    for d in dayviews:
        d.date_field = datevar + timedelta(days=1)
        d.date_field = d.date_field.strftime("%Y-%m-%d")
        datevar += timedelta(days=1)
    
    for t in trans:
        t.timef = t.timef.strftime("%H:%M")
        t.dayvar = t.datef.strftime("%A")
        for d in dayviews:
            if t.dayvar == d.dayname:
                t.color = d.color
                d.date_field = t.datef
        
    
    return render_template('writing/writingtableupdate.html', trans = trans, dayviews = dayviews, user=current_user)

@app.route('/writingtablecommit/')  #booking_table_update & commit ('booking_table') id
def writingtablecommit():
    writingid = request.args.get('writingid')
    parent_num = request.args.get('parent')
    order = request.args.get('order')
    if order == '' or not order:
        order = 1
    else:
        order = int(order)
    orig_id = request.args.get('orig_id')
    if orig_id == '' or not orig_id:
        orig_id = None

    entry_check = writingdb.query.filter(writingdb.writingid == writingid).first()
    if entry_check.tier == 1:
        return ""

    entry = writingdb(writingid=writingid, parent=parent_num)
    db.session.merge(entry)
            
    parent_query = writingdb.query.filter(writingdb.parent == parent_num).order_by(writingdb.order.asc())
    entry_find = writingdb.query.filter(writingdb.writingid == writingid).first()
    order_num = 1
    final_list = []

    #if entry_find in parent_query:

    for item in parent_query:
        if (item.order != order) and (item not in final_list):
            if item != entry_find:
                final_list.append(item)
        if item.order == order:
            final_list.append(entry_find)
            if item != entry_find:
                final_list.append(item)
    for f in final_list:
        f.order = order_num
        order_num +=1
        
    db.session.commit()

    l1menu = writingdb.query.filter(writingdb.tier == 1).order_by(writingdb.order.asc())
    l2menu = writingdb.query.filter(writingdb.tier == 2).order_by(writingdb.parent.asc(), writingdb.order.asc())
    
    return render_template('writing/leftmenu.html', l1menu=l1menu, l2menu=l2menu, final_list=final_list)

@app.route('/writing_del/')
def writing_del():
    writingid = request.args.get('writingid')
    datef = request.args.get('datef')
    
    writingdb.query.filter(writingdb.writingid == writingid).delete()
    db.session.commit()
    
    start_date = find_start(datef)
    end_date = start_date + timedelta(days = 6)

    trans = writingdb.query.filter(writingdb.datef >= start_date).filter(writingdb.datef <= end_date).order_by(writingdb.timef.asc())

    userid = 0
    dayviews = hr_sched_views.query.filter(hr_sched_views.user_id == userid).filter(hr_sched_views.visible == 1).order_by(hr_sched_views.cview_id.asc())

    datevar = start_date - timedelta(days=1)
    for d in dayviews:
        d.date_field = datevar + timedelta(days=1)
        d.date_field = d.date_field.strftime("%Y-%m-%d")
        datevar += timedelta(days=1)    
    
    for t in trans:
        t.timef = t.timef.strftime("%H:%M")
        t.dayvar = t.datef.strftime("%A")
        for d in dayviews:
            if t.dayvar == d.dayname:
                t.color = d.color
                d.date_field = t.datef
    
    return render_template('writing/writingtableupdate.html', trans = trans, dayviews = dayviews, user=current_user)

@app.route('/writing_add/')
def writing_add():
    timef = ''
    datef = ''
    writingid = request.args.get('writingid')
    if writingid == '' or not writingid:
        last_writing = writingdb.query.filter(writingdb.writingid > 0).order_by(writingdb.writingid.desc()).first()
        if not last_writing:
            writingid = 1
        else:
            writingid = last_writing.writingid + 1
        timef = datetime.datetime.now().time()
        datef = datetime.date.today()
    else:
        modified = datetime.datetime.now()
        
    tier = request.args.get('tier')
    if tier == '':
        tier = None
    order = request.args.get('order')
    if order == '':
        order = None
    parent = request.args.get('parent')
    if parent == '':
        parent = None
    title = request.args.get('title')
    if title == '':
        title = None        
    category = request.args.get('category')
    if category == '':
        category = None        
    searchtags = request.args.get('searchtags')
    if searchtags == '':
        searchtags = None
    content = request.args.get('content')
    if content == '':
        content = None
    
    if timef == '':
        new_writing = writingdb(writingid=writingid, tier=tier, order=order, parent=parent, title=title, category=category,
                                searchtags=searchtags, content=content, modified=modified)        
    else:
        new_writing = writingdb(writingid=writingid, tier=tier, order=order, parent=parent, title=title, category=category,
                                searchtags=searchtags, content=content, timef=timef, datef=datef)
    db.session.merge(new_writing)
    db.session.commit()

    if datef == '':
        datevar = datetime.date.today()

    start_date = find_start(datef)
    end_date = start_date + timedelta(days = 6)

    trans = writingdb.query.filter(writingdb.datef >= start_date).filter(writingdb.datef <= end_date).order_by(writingdb.timef.asc())

    userid = 0
    dayviews = hr_sched_views.query.filter(hr_sched_views.user_id == userid).filter(hr_sched_views.visible == 1).order_by(hr_sched_views.cview_id.asc())

    datevar = start_date - timedelta(days=1)
    for d in dayviews:
        d.date_field = datevar + timedelta(days=1)
        d.date_field = d.date_field.strftime("%Y-%m-%d")
        datevar += timedelta(days=1)    
    
    for t in trans:
        t.timef = t.timef.strftime("%H:%M")
        t.dayvar = t.datef.strftime("%A")
        for d in dayviews:
            if t.dayvar == d.dayname:
                t.color = d.color
                d.date_field = t.datef
    
    return render_template('writing/writingtableupdate.html', trans = trans, dayviews = dayviews, user=current_user)

@app.route('/wscratch_query/')
def wscratch_query():
    writingid = request.args.get('writingid')
    if writingid == '' or not writingid:
        return ''
    else:
        this_query = writingdb.query.filter(writingdb.writingid == writingid).first()
    if this_query.content == None:
        return ''
    return this_query.content
