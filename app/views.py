from flask import Flask, request, render_template, redirect, session, url_for, request, g, send_from_directory, jsonify, json, flash
from flask_sqlalchemy import SQLAlchemy
from datetime import datetime, date, timedelta
from app import app, db, models
from .models import User, itemdata, menutable, vendortable, analytics, dictionary, averagedb, uniquedb, chargedb, ratesdb
from .models import usersdb, linkcheck, accounting, receiptdb, watchlistdb, tabledb, booking_tablenamesdb, hr_sched_views, hr_scheddb
from .forms import MenuData, ItemEdit, ReceiptEdit, BookingEdit, SchedEdit, SignupForm
from config import ITEMS_PER_PAGE, WHOOSH_BASE, SECRET_KEY
import flask_whooshalchemy as whooshalchemy
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

lm = LoginManager()
lm.init_app(app)

@app.before_request
def before_request():
    g.user = current_user

@lm.user_loader
def load_user(email):
    return usersdb.query.filter_by(email = email).first()

def login_required(role="ANY"):
    def wrapper(fn):
        @wraps(fn)
        def decorated_view(*args, **kwargs):
            if not current_user.is_authenticated():
              return lm.unauthorized()
            if ((current_user.acct_type != role) and (role != "ANY")):
                return lm.unauthorized()
            return fn(*args, **kwargs)
        return decorated_view
    return wrapper

@app.route('/signup', methods=['GET', 'POST'])
def signup():
    form = SignupForm()
    if request.method == 'GET':
        if g.user is not None and g.user.is_authenticated:
            return g.user.email + " is already logged in."
        else:
            return render_template('signup.html', form = form)
    elif request.method == 'POST':
        if form.validate_on_submit():
            if usersdb.query.filter_by(email=form.email.data).first():
                return "Email address already exists"
            else:
                newuser = usersdb(form.email.data, form.password.data)
                db.session.add(newuser)
                db.session.commit()
                return "User created!!!"  
        else:
            return "Form didn't validate"
        
@app.route('/login', methods=['GET','POST'])
def login():
    form = SignupForm()
    uemail = request.args.get('email')
    upass = request.args.get('password')    
    if g.user is not None and g.user.is_authenticated:
        text_line = user.email + ' (' + str(user.acct_type) + ')'
        return text_line
    else:
        if uemail is None:
            return render_template('login_div.html', form=form, user=g.user, uemail=uemail)
        else:
            user=usersdb.query.filter_by(email=uemail).first()
            if user:
                if user.password == upass:
                    login_user(user)
                    return render_template('login_div.html', form=form, user=g.user, uemail=uemail)
                else:
                    message = ' Wrong Password '
                    return render_template('login_div.html', form=form, user=g.user, message=message, uemail=uemail)
            else:
                message = ' User Doesn''t Exist. '
                return render_template('login_div.html', form=form, user=g.user, message=message, uemail=uemail)               
        
@app.route('/protected')
@login_required(role=0)
def protected():
    return "protected area"

@app.route("/logout")
@login_required(role='ANY')
def logout():
    logout_user()
    form = SignupForm()
    uemail = request.args.get('email')
    return render_template('login_div.html', form=form, user=g.user, uemail=uemail)

def sumSessionCounter(): #user tracking db.
    try:
        session['counter']
    except KeyError:
        session['counter'] = uuid.uuid1()
    sess = analytics(sid=session['counter'], ip=request.remote_addr, timestamp=datetime.datetime.utcnow(), url=request.url, referer=request.referrer)
    db.session.add(sess)
    db.session.commit()

@app.route('/vendor_clicks/', methods=['GET', 'POST'])
def vendor_clicks():
    vendor = 1
    charges = chargedb.query.filter(chargedb.vendor_id == vendor).filter(chargedb.trans_id == None).order_by(chargedb.timestamp.asc())
    subtotal = 0
    query_total = charges.count()
    for c in charges:
        if c.rate:
            subtotal += c.rate

    return render_template("vendor_clicks.html", charges=charges, query_total=query_total, subtotal=subtotal, user=current_user)

@app.route('/vendor_pay/', methods=['GET', 'POST'])
def vendor_pay():
    vendor = 1
    charges = chargedb.query.filter(chargedb.vendor_id == vendor).filter(chargedb.sid.contains('type')).order_by(chargedb.timestamp.asc())
    subtotal = 0
    query_total = charges.count()
    for c in charges:
        if c.rate:
            subtotal += c.rate

    return render_template("vendor_pay.html", charges=charges, query_total=query_total, subtotal=subtotal, user=current_user)

@app.route('/add_charges/', methods=['GET', 'POST'])
def add_charges():
    charges = chargedb.query.filter(chargedb.rate == None).all()
    for c in charges:
        if (c.ip.find('Taiwan') > -1) or (c.ip.find('TWN') > -1):
            rates = ratesdb.query.filter(ratesdb.vendor_id == c.vendor_id).filter(ratesdb.timestamp < c.timestamp).order_by(ratesdb.timestamp.desc()).first()
            if rates:
                if rates.acct_type == 'monthly':
                    c.rate = 0
                elif rates.acct_type == 'ppc':
                    c.rate = rates.rate            
                db.session.merge(c)
                db.session.commit()
    return 'Charge Rates Added Complete ' + datetime.datetime.now().strftime("%I:%M%p on %B %d, %Y")

@app.route('/charged/', methods=['GET', 'POST'])
def charged():
    filepath = os.path.abspath('app/static/mmdb/GeoLite2-Country.mmdb')
    #filepath = os.path.abspath('app/static/mmdb/GeoLite2-City.mmdb')
    reader = geoip2.database.Reader(filepath)
    analytic = analytics.query.filter(analytics.parsed == 0).filter(analytics.url.contains('vendor'))
    #analytic = analytics.query.filter(analytics.url.contains('vendor'))
    unique_list = []
    entry_id = 27
    for a in analytic:
        if '/vendor/' in a.url:
            start_loc = a.url.find('/vendor/') + 7
            end_loc = a.url.find('/', start_loc + 1)
            v_id = a.url[start_loc+1:end_loc]
            vendor_link = a.url[0:(end_loc+1)]
            
            if (a.sid, a.ip, a.user_id, vendor_link) not in unique_list:
                stringvar = (a.sid, a.ip, a.user_id, vendor_link)
                unique_list.append(stringvar)
                try:
                    response = reader.country(a.ip)
                    country = response.country.name
                except:
                    country = ''
                    pass
                if a.ip == '127.0.0.1':
                    country = 'Taiwan'
                if country == 'Taiwan':
                    country = 'TWN'
                if country != '':
                    final_ip = a.ip + ' (' + country+')'
                else:
                    final_ip = a.ip
                charge_entry = chargedb(sid=a.sid, ip=final_ip, user_id=a.user_id,vendor_id =v_id,timestamp=a.timestamp)
                db.session.add(charge_entry)
                db.session.commit()
                entry_id += 1
        a.parsed = 1    #parsed flag switcher
        db.session.merge(a)
        db.session.commit()
    return 'Charged Complete ' + datetime.datetime.now().strftime("%I:%M%p on %B %d, %Y")

@app.route('/customer/', methods=['GET', 'POST'])
def customer():
    filepath = os.path.abspath('app/static/mmdb/GeoLite2-Country.mmdb')
    #filepath = os.path.abspath('app/static/mmdb/GeoLite2-City.mmdb')
    reader = geoip2.database.Reader(filepath)
    try:
        response = reader.country('118.167.13.56')
        test = response.country.name
    except:
        test = ''
        pass
    
    PopCat = menutable.query.filter(menutable.menu_id > 0).order_by(menutable.clicks.desc()).limit(20).all()
    random.shuffle(PopCat)
    #PopItems = itemdata.query.filter(itemdata.idItemData > 0).order_by(itemdata.clicks.desc()).limit(3).all()
    PopItems = itemdata.query.filter(itemdata.idItemData > 0).order_by(itemdata.idItemData.desc()).limit(3).all()
        #popular today?, need to add clicks field.  Popular "today" would be ideal.. but these could also be 'promoted' items.
    NewItems = itemdata.query.filter(itemdata.idItemData > 0).order_by(itemdata.idItemData.desc()).limit(2).all()
    NewVendors = vendortable.query.filter(vendortable.vendor_id > 0).order_by(vendortable.vendor_id.asc()).limit(4).all()
    return render_template("index_customer.html", PopCat = PopCat, PopItems = PopItems, NewItems = NewItems, NewVendors = NewVendors, test=test, user=current_user)

@app.route('/customer_settings/', methods=['GET', 'POST'])
def customer_settings():
    return render_template("customer_settings.html", user=current_user)

@app.route('/hr_scheduling/', methods=['GET', 'POST'])
def hr_scheduling():
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
    trans = hr_scheddb.query.filter(hr_scheddb.datef >= start_date).filter(hr_scheddb.datef <= end_date).order_by(hr_scheddb.datef.asc())

    userid = 0
    dayviews = hr_sched_views.query.filter(hr_sched_views.user_id == userid).filter(hr_sched_views.visible == 1).order_by(hr_sched_views.cview_id.asc())

    datevar = start_date - timedelta(days=1)
    for d in dayviews:
        d.date_field = datevar + timedelta(days=1)
        d.date_field = d.date_field.strftime("%Y-%m-%d")
        datevar += timedelta(days=1)

    for t in trans:
        t.start_time = t.start_time.strftime("%H:%M")
        t.end_time = t.end_time.strftime("%H:%M")
        t.dayvar = t.datef.strftime("%A")
        for d in dayviews:
            if t.dayvar == d.dayname:
                t.color = d.color
                
    form = SchedEdit()
    if form.validate_on_submit():
        edit_sched = hr_scheddb(sched_id=form.sched_id.data, name=form.name.data, dept=form.dept.data, team=form.team.data, \
                                  phone=form.phone.data, start_time=form.start_time.data, end_time=form.end_time.data, \
                                  datef=form.datef.data, notes=form.notes.data)
        db.session.merge(edit_sched)
        db.session.commit()
        return redirect(url_for('hr_scheduling', ref = form.datef.data))
            
    return render_template("hr_scheduling.html", trans=trans, form=form, dayviews = dayviews, datevar = datevar, ref=ref, user=current_user)

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

def last_day_of_month(date):
    if date.month == 12:
        return date.replace(day=31)
    return date.replace(month=date.month+1, day=1) - datetime.timedelta(days=1)

@app.route('/date_test_hr/')
def date_test_hr():            #hr_scheduling date retrieval, modify for other functions later
    text = request.args.get('jsdata')
    name = request.args.get('name')
    start_date = find_start(text)
    
    #end_date = last_day_of_month(start_date)
    end_date = '2017-08-31'

    if name:
        date_filter = hr_scheddb.query.filter(hr_scheddb.datef <= end_date).group_by(hr_scheddb.datef).filter(hr_scheddb.name == name) \
                      .order_by(hr_scheddb.datef.asc())
    else:
        date_filter = hr_scheddb.query.filter(hr_scheddb.datef <= end_date).group_by(hr_scheddb.datef).order_by(hr_scheddb.datef.asc())  
    df2 = []
    if date_filter:
        for d in date_filter:
            df2.append(d.datef)
    return jsonify(df2)

@app.route('/scheddatelist/')
def scheddatelist():         #receipt transactions - update bottom list based on date
    text = request.args.get('jsdata')
    name = request.args.get('name')
    e_date = request.args.get('e_date')
    if e_date:
        start_date = e_date
        end_date = e_date
    else:
        start_date = find_start(text)
        end_date = start_date + timedelta(days = 6)

    if name:
        trans = hr_scheddb.query.filter(hr_scheddb.datef >= start_date).filter(hr_scheddb.datef <= end_date).filter(hr_scheddb.name == name) \
                .order_by(hr_scheddb.datef.asc())
    else:
        trans = hr_scheddb.query.filter(hr_scheddb.datef >= start_date).filter(hr_scheddb.datef <= end_date).order_by(hr_scheddb.datef.asc())

    userid = 0
    dayviews = hr_sched_views.query.filter(hr_sched_views.user_id == userid).filter(hr_sched_views.visible == 1).order_by(hr_sched_views.cview_id.asc())

    for t in trans:
        t.start_time = t.start_time.strftime("%H:%M")
        t.end_time = t.end_time.strftime("%H:%M")
        t.dayvar = t.datef.strftime("%A")
        for d in dayviews:
            if t.dayvar == d.dayname:
                t.color = d.color
                d.date_field = t.datef
        
    return render_template("scheddatelist.html", trans = trans, user=current_user)

@app.route('/schedtableupdate/')  #sched-dates-table ('sched_table') id
def schedtableupdate():
    name = request.args.get('name')
    dateg = request.args.get('dateg')
    
    start_date = find_start(dateg)
    end_date = start_date + timedelta(days = 6)
    if name:
        trans = hr_scheddb.query.filter(hr_scheddb.datef >= start_date).filter(hr_scheddb.datef <= end_date).filter(hr_scheddb.name == name) \
            .order_by(hr_scheddb.start_time.asc())
    else:
        trans = hr_scheddb.query.filter(hr_scheddb.datef >= start_date).filter(hr_scheddb.datef <= end_date).order_by(hr_scheddb.start_time.asc())

    userid = 0
    dayviews = hr_sched_views.query.filter(hr_sched_views.user_id == userid).filter(hr_sched_views.visible == 1).order_by(hr_sched_views.cview_id.asc())

    datevar = start_date - timedelta(days=1)
    for d in dayviews:
        d.date_field = datevar + timedelta(days=1)
        d.date_field = d.date_field.strftime("%Y-%m-%d")
        datevar += timedelta(days=1)
    
    for t in trans:
        t.start_time = t.start_time.strftime("%H:%M")
        t.end_time = t.end_time.strftime("%H:%M")
        t.dayvar = t.datef.strftime("%A")
        for d in dayviews:
            if t.dayvar == d.dayname:
                t.color = d.color
                d.date_field = t.datef
        
    
    return render_template("schedtableupdate.html", trans = trans, dayviews = dayviews, user=current_user)

@app.route('/schedtablecommit/')  #booking_table_update & commit ('booking_table') id
def schedtablecommit():
    sched_id = request.args.get('sched_id')
    datef = request.args.get('sdate')
    sched_edit = hr_scheddb(sched_id = sched_id, datef = datef)
    db.session.merge(sched_edit)
    db.session.commit()
    
    start_date = find_start(datef)
    end_date = start_date + timedelta(days = 6)

    trans = hr_scheddb.query.filter(hr_scheddb.datef >= start_date).filter(hr_scheddb.datef <= end_date).order_by(hr_scheddb.start_time.asc())

    userid = 0
    dayviews = hr_sched_views.query.filter(hr_sched_views.user_id == userid).filter(hr_sched_views.visible == 1).order_by(hr_sched_views.cview_id.asc())

    datevar = start_date - timedelta(days=1)
    for d in dayviews:
        d.date_field = datevar + timedelta(days=1)
        d.date_field = d.date_field.strftime("%Y-%m-%d")
        datevar += timedelta(days=1)    
    
    for t in trans:
        t.start_time = t.start_time.strftime("%H:%M")
        t.end_time = t.end_time.strftime("%H:%M")
        t.dayvar = t.datef.strftime("%A")
        for d in dayviews:
            if t.dayvar == d.dayname:
                t.color = d.color
                d.date_field = t.datef
    
    return render_template("schedtableupdate.html", trans = trans, dayviews = dayviews, user=current_user)

@app.route('/sched_del/')
def sched_del():
    sched_id = request.args.get('sched_id')
    datef = request.args.get('datef')
    
    hr_scheddb.query.filter(hr_scheddb.sched_id == sched_id).delete()
    db.session.commit()
    
    start_date = find_start(datef)
    end_date = start_date + timedelta(days = 6)

    trans = hr_scheddb.query.filter(hr_scheddb.datef >= start_date).filter(hr_scheddb.datef <= end_date).order_by(hr_scheddb.start_time.asc())

    userid = 0
    dayviews = hr_sched_views.query.filter(hr_sched_views.user_id == userid).filter(hr_sched_views.visible == 1).order_by(hr_sched_views.cview_id.asc())

    datevar = start_date - timedelta(days=1)
    for d in dayviews:
        d.date_field = datevar + timedelta(days=1)
        d.date_field = d.date_field.strftime("%Y-%m-%d")
        datevar += timedelta(days=1)    
    
    for t in trans:
        t.start_time = t.start_time.strftime("%H:%M")
        t.end_time = t.end_time.strftime("%H:%M")
        t.dayvar = t.datef.strftime("%A")
        for d in dayviews:
            if t.dayvar == d.dayname:
                t.color = d.color
                d.date_field = t.datef
    
    return render_template("schedtableupdate.html", trans = trans, dayviews = dayviews, user=current_user)

@app.route('/sched_add/')
def sched_add():
    name = request.args.get('name')
    dept = request.args.get('dept')
    if dept == '':
        dept = None
    team = request.args.get('team')
    if team == '':
        team = None
    phone = request.args.get('phone')
    if phone == '':
        phone = None
    start_time = request.args.get('start_time')
    if start_time == '':
        start_time = None
    end_time = request.args.get('end_time')
    if end_time == '':
        end_time = None
    notes = request.args.get('notes')
    datef = request.args.get('datef')
    new_sched = hr_scheddb(name=name, phone=phone, dept=dept, team=team, start_time=start_time, end_time=end_time, \
                           notes=notes, datef=datef)
    db.session.add(new_sched)
    db.session.commit()
    
    start_date = find_start(datef)
    end_date = start_date + timedelta(days = 6)

    trans = hr_scheddb.query.filter(hr_scheddb.datef >= start_date).filter(hr_scheddb.datef <= end_date).order_by(hr_scheddb.start_time.asc())

    userid = 0
    dayviews = hr_sched_views.query.filter(hr_sched_views.user_id == userid).filter(hr_sched_views.visible == 1).order_by(hr_sched_views.cview_id.asc())

    datevar = start_date - timedelta(days=1)
    for d in dayviews:
        d.date_field = datevar + timedelta(days=1)
        d.date_field = d.date_field.strftime("%Y-%m-%d")
        datevar += timedelta(days=1)    
    
    for t in trans:
        t.start_time = t.start_time.strftime("%H:%M")
        t.end_time = t.end_time.strftime("%H:%M")
        t.dayvar = t.datef.strftime("%A")
        for d in dayviews:
            if t.dayvar == d.dayname:
                t.color = d.color
                d.date_field = t.datef
    
    return render_template("schedtableupdate.html", trans = trans, dayviews = dayviews, user=current_user)

@app.route('/booking/', methods=['GET', 'POST'])
def booking():
    ref = request.args.get('ref')
    datevar = datetime.date.today()
    if ref:
        trans = tabledb.query.filter(tabledb.start_date == ref).order_by(tabledb.booking_id.desc())
    else:
        trans = tabledb.query.filter(tabledb.start_date == datevar).order_by(tabledb.booking_id.desc())
    
    all_book = tabledb.query.filter(tabledb.booking_id > 0).order_by(tabledb.start_date.desc())
    for v in all_book:
        v.timev = v.timev.strftime("%H:%M")
            
    #trans = tabledb.query.filter(tabledb.start_date == datevar).order_by(tabledb.booking_id.desc())
    userid = 0
    tablenames = booking_tablenamesdb.query.filter(booking_tablenamesdb.user_id == userid).order_by(booking_tablenamesdb.sort.asc())
                
    form = BookingEdit()
    if form.validate_on_submit():
        edit_booking = tabledb(booking_id=form.booking_id.data, name=form.name.data, phone=form.phone.data, \
            seats=form.seats.data, start_date=form.datef.data, timev=form.timev.data, table=form.table.data, \
            notes=form.notes.data, status=form.status.data)
        db.session.merge(edit_booking)
        db.session.commit()
        return redirect(url_for('booking', ref = form.datef.data))
            
    return render_template("booking.html", all_book=all_book, trans=trans, form=form, tablenames = tablenames, datevar = datevar, ref=ref, user=current_user)

@app.route('/date_test/')
def date_test():            #booking date retrieval, modify for other functions later
    text = request.args.get('jsdata')
    if text:
        month,date,year = text.split('/')
        dt = year + '-' + month + '-' + date
        start_date = year + '-' + month + '-01'
    else:
        dt = datetime.datetime.today()
        start_date = 0
    end_date = '2017-08-31'
    date_filter = tabledb.query.filter(tabledb.start_date <= end_date).group_by(tabledb.start_date).order_by(tabledb.start_date.asc())  
    df2 = []
    for d in date_filter:
        df2.append(d.start_date)
    return jsonify(df2)

@app.route('/bookingdatelist/')
def bookingdatelist():         #receipt transactions - update bottom list based on date
    text = request.args.get('jsdata')
    if text:
        month,date,year = text.split('/')
        dt = year + '-' + month + '-' + date
        #else:
        #    dt = text
        trans = tabledb.query.filter(tabledb.start_date == dt).order_by(tabledb.booking_id.desc())
    else:        
        trans = tabledb.query.filter(tabledb.booking_id > 0).order_by(tabledb.booking_id.desc())
        
    for t in trans:
        t.timev = t.timev.strftime("%H:%M")
        
    return render_template("bookingdatelist.html", trans = trans, user=current_user)

@app.route('/bookingtableupdate/')  #booking-dates-table ('booking_table') id
def bookingtableupdate():
    dateg = request.args.get('dateg')
    month,date,year = dateg.split('/')
    dt = year + '-' + month + '-' + date
    trans = tabledb.query.filter(tabledb.start_date == dt).order_by(tabledb.timev.asc())
    userid = 0
    tablenames = booking_tablenamesdb.query.filter(booking_tablenamesdb.user_id == userid).order_by(booking_tablenamesdb.sort.asc())
    for t in trans:
        t.timev = t.timev.strftime("%H:%M")
    
    return render_template("bookingtableupdate.html", trans = trans, tablenames = tablenames, user=current_user)

@app.route('/bookingtablecommit/')  #booking_table_update & commit ('booking_table') id
def bookingtablecommit():
    booking_id = request.args.get('booking_id')
    start_date = request.args.get('sdate')
    table = request.args.get('table')
    table_edit = tabledb(booking_id = booking_id, table = table)
    db.session.merge(table_edit)
    db.session.commit()
    
    dt = start_date
    trans = tabledb.query.filter(tabledb.start_date == dt).order_by(tabledb.timev.asc())
    for t in trans:
       t.timev = t.timev.strftime("%H:%M")    
    userid = 0
    tablenames = booking_tablenamesdb.query.filter(booking_tablenamesdb.user_id == userid).order_by(booking_tablenamesdb.sort.asc())
    
    return render_template("bookingtableupdate.html", trans = trans, tablenames = tablenames, user=current_user)

@app.route('/booking_del/')
def booking_del():
    bid = request.args.get('bid')
    datef = request.args.get('datef')
    
    tabledb.query.filter(tabledb.booking_id == bid).delete()
    db.session.commit()
    
    trans = tabledb.query.filter(tabledb.start_date == datef).order_by(tabledb.booking_id.asc())
    for t in trans:
        t.timev = t.timev.strftime("%H:%M")    
    userid = 0
    tablenames = booking_tablenamesdb.query.filter(booking_tablenamesdb.user_id == userid).order_by(booking_tablenamesdb.sort.asc())
    
    return render_template("bookingtableupdate.html", trans = trans, tablenames = tablenames, user=current_user)

@app.route('/booking_add/')
def booking_add():
    name = request.args.get('name')
    phone = request.args.get('phone')
    seats = request.args.get('seats')
    if seats == '':
        seats = None
    table = request.args.get('table')
    if table == '':
        table = None
    timev = request.args.get('timev')
    notes = request.args.get('notes')
    status = request.args.get('status')
    if status == '':
        status = 'None'
    datef = request.args.get('datef')
    new_booking = tabledb(name=name, phone=phone, seats=seats, table=table, timev=timev, notes=notes, status=status, start_date=datef)
    db.session.add(new_booking)
    db.session.commit()
    
    trans = tabledb.query.filter(tabledb.start_date == datef).order_by(tabledb.booking_id.asc())
    for t in trans:
        t.timev = t.timev.strftime("%H:%M")    
    userid = 0
    tablenames = booking_tablenamesdb.query.filter(booking_tablenamesdb.user_id == userid).order_by(booking_tablenamesdb.sort.asc())
    
    return render_template("bookingtableupdate.html", trans = trans, tablenames = tablenames, user=current_user)

@app.route('/customer_watchlist/', methods=['GET', 'POST'])
def customer_watchlist():
    PopCat = menutable.query.filter(menutable.menu_id > 0).order_by(menutable.clicks.desc()).limit(20).all()
    random.shuffle(PopCat)
    #PopItems = itemdata.query.filter(itemdata.idItemData > 0).order_by(itemdata.clicks.desc()).limit(3).all()
    PopItems = itemdata.query.filter(itemdata.idItemData > 0).order_by(itemdata.idItemData.desc()).limit(3).all()
        #popular today?, need to add clicks field.  Popular "today" would be ideal.. but these could also be 'promoted' items.
    NewItems = itemdata.query.filter(itemdata.idItemData > 0).order_by(itemdata.idItemData.desc()).limit(2).all()
    NewVendors = vendortable.query.filter(vendortable.vendor_id > 0).order_by(vendortable.vendor_id.asc()).limit(4).all()

#search by idItemData only, list vendor name    
    user_id = 0
    item_ids = watchlistdb.query.filter(watchlistdb.user_id == user_id).order_by(watchlistdb.watch_id.asc())
    ids = []
    if item_ids:
        for i in item_ids:
            ids.append (i.idItemData)
        item_result = itemdata.query.filter(itemdata.idItemData.in_(ids)).order_by(itemdata.idItemData.asc())
    else:
        item_result = None
    item_results = []
    for i in item_result:
        namevar = vendortable.query.filter(vendortable.vendor_id == i.vendor).first()
        name_var = namevar.ch_name
        i.vendor_name = name_var
        item_results.append(i)

#search by searchtags
    user_id = 0
    searchtag_search = watchlistdb.query.filter(watchlistdb.user_id == user_id)
    search_term = searchtag_search[2].searchtags
    cat_type = searchtag_search[2].cat_type
    search_terms = search_term.split()
    
    results_all = []

    # apply for L4 search pages with category filter etc.
    if search_terms:
        results = itemdata.query.filter(itemdata.cat_type == cat_type)
        for s in reversed(search_terms):
            results = results.filter(itemdata.searchtags.contains(s))
    results_all = results

#search by words
    user_id = 0
    searchtag_search = watchlistdb.query.filter(watchlistdb.user_id == user_id).first()
    search_term = searchtag_search.word_search
    #search_term = searchtag_search.searchtags
    cat_type = searchtag_search.cat_type
    search_terms = search_term.split()
    
    words_all = []
    if search_terms:
        for s in reversed(search_terms):
            t = s
            results = itemdata.query.filter(itemdata.name.contains(t))
            if not words_all:
                words_all = results
            else:
                words_all = [x for x in results if x in results_all]                
    
    return render_template("customer_watchlist.html", PopCat = PopCat, PopItems = PopItems, NewItems = NewItems, NewVendors = NewVendors, \
                           item_results = item_results, results_all=results_all, words_all = words_all, user=current_user)

@app.route('/vendor_settings/', methods=['GET', 'POST'])
def vendor_settings():
    return render_template("vendor_settings.html", user=current_user)

@app.route('/accounting/', methods=['GET', 'POST'])
def accountingdb():
    date = "2017-07-21"
    form = ReceiptEdit()
    trans = accounting.query.filter(accounting.trans_id > 0)
    return render_template("accounting_dash2.html", trans=trans, form=form, user=current_user)

@app.route('/dytrans/')
def dytrans():
    text = request.args.get('jsdata')
    if text:
        month,date,year = text.split('/')
        dt = year + '-' + month + '-' + date
        trans = accounting.query.filter(accounting.scheduled_date == dt)
    else:
        trans = accounting.query.filter(accounting.trans_id > 0)
    return render_template("dytrans.html", trans = trans, user=current_user)

@app.route('/rectrans/')
def rectrans():         #receipt transactions - update bottom list based on date
    text = request.args.get('jsdata')
    if text:
        month,date,year = text.split('/')
        dt = year + '-' + month + '-' + date
        #trans = receiptdb.query.filter(receiptdb.datef == dt).group_by(receiptdb.ref_id)

        pre_trans = receiptdb.query.filter(receiptdb.datef == dt).group_by(receiptdb.ref_id).order_by(receiptdb.datef.desc())
        all_trans = receiptdb.query.filter(receiptdb.datef == dt).order_by(receiptdb.ref_id.desc())
        trans = []
        for p in pre_trans:
            subtotal = 0
            for a in all_trans:
                if p.ref_id == a.ref_id:
                    subtotal += a.quantity * a.price
            trans.append([p.store_name, p.ref_id, p.datef, subtotal])        
    else:
        pre_trans = receiptdb.query.filter(receiptdb.receipt_id > 0).group_by(receiptdb.ref_id).order_by(receiptdb.datef.desc())
        all_trans = receiptdb.query.filter(receiptdb.receipt_id > 0).order_by(receiptdb.ref_id.desc())
        trans = []
        for p in pre_trans:
            subtotal = 0
            for a in all_trans:
                if p.ref_id == a.ref_id:
                    subtotal += a.quantity * a.price
            trans.append([p.store_name, p.ref_id, p.datef, subtotal])
    return render_template("rectrans.html", trans = trans, user=current_user)

@app.route('/rec_check/')
def rec_check():
    ref = request.args.get('ref')
    transa = receiptdb.query.filter(receiptdb.ref_id == ref).order_by(receiptdb.receipt_id.asc()).first()
    green_icon = 0
    if transa:
        green_icon = 1
    return render_template("rec_icon.html", ref=ref, green_icon=green_icon, transa=transa, user=current_user)


@app.route('/receipt/', methods=['GET', 'POST'])
def receipt():
    ref = request.args.get('ref')
    if ref:
        last_rec = receiptdb.query.filter(receiptdb.ref_id == ref).order_by(receiptdb.receipt_id.asc()).first()
    else:
        last_rec = receiptdb.query.filter(receiptdb.receipt_id > 0).order_by(receiptdb.receipt_id.desc()).first()
        
    pre_trans = receiptdb.query.filter(receiptdb.receipt_id > 0).group_by(receiptdb.ref_id).order_by(receiptdb.datef.desc())
    all_trans = receiptdb.query.filter(receiptdb.receipt_id > 0).order_by(receiptdb.ref_id.desc())
    trans = []
    for p in pre_trans:
        subtotal = 0
        for a in all_trans:
            if p.ref_id == a.ref_id:
                subtotal += a.quantity * a.price
        trans.append([p.store_name, p.ref_id, p.datef, subtotal])
                
    whole_rec = receiptdb.query.filter(receiptdb.ref_id == last_rec.ref_id).order_by(receiptdb.receipt_id.asc())
    subtotal = 0
    for w in whole_rec:
        subtotal += w.quantity * w.price
    form = ReceiptEdit()
    if form.validate_on_submit():
        edit_receipt = receiptdb(store_name=form.store_name.data, ref_id=form.ref_id.data, item_name=form.item_name.data,
                                 datef=form.datef.data, price=form.price.data, net_weight=form.net_weight.data, unit=form.unit.data,
                                 unit_weight=form.unit_weight.data, quantity=form.quantity.data, receipt_id=form.receipt_id.data)
        db.session.merge(edit_receipt)
        db.session.commit()
        return redirect('receipt')
        
    return render_template("receipt_dash.html", trans=trans, form=form, last_rec=last_rec, whole_rec=whole_rec, subtotal=subtotal, user=current_user)

@app.route('/rec_update/')
def rec_update():
    ref = request.args.get('ref')
    item = request.args.get('item')
    store = request.args.get('store')
    net = request.args.get('net')
    if net == '':
        net = None
    uw = request.args.get('uw')
    if uw == '':
        uw = None
    unit = request.args.get('unit')
    qty = request.args.get('qty')
    if qty == '':
        qty = None
    price = request.args.get('price')
    if price == '':
        price = None
    rid = request.args.get('rid')
    if rid == '':
        rid = None
    dateg = request.args.get('dateg')
    new_item = receiptdb(store_name=store, ref_id=ref, item_name=item, datef=dateg, price=price, net_weight=net, unit=unit,
                                 unit_weight=uw, quantity=qty)
    db.session.add(new_item)
    db.session.commit()
    trans = receiptdb.query.filter(receiptdb.ref_id == ref).order_by(receiptdb.receipt_id.asc())
    subtotal = 0
    for t in trans:
        subtotal += t.quantity * t.price 
    return render_template("rec_update.html", trans = trans, subtotal=subtotal, user=current_user)

@app.route('/bot_rec_update/')
def bot_rec_update():
    ref = request.args.get('ref')
    trans = receiptdb.query.filter(receiptdb.ref_id == ref).order_by(receiptdb.receipt_id.asc())
    subtotal = 0
    for t in trans:
        subtotal += t.quantity * t.price 
    return render_template("rec_update.html", trans = trans, subtotal=subtotal, user=current_user)

@app.route('/bot_rec_update_date/')  #receipt-items-updater ('rec-items') id
def bot_rec_update_date():
    dateg = request.args.get('dateg')
    month,date,year = dateg.split('/')
    dt = year + '-' + month + '-' + date    
    pre_trans = receiptdb.query.filter(receiptdb.datef == dt).order_by(receiptdb.receipt_id.asc()).first()
    if pre_trans:
        ref = pre_trans.ref_id
        trans = receiptdb.query.filter(receiptdb.ref_id == ref).order_by(receiptdb.receipt_id.asc())
        subtotal = 0
        for t in trans:
            subtotal += t.quantity * t.price
    else:
        trans = []
        subtotal = 0
    return render_template("rec_update.html", trans = trans, subtotal=subtotal, user=current_user)

@app.route('/item_del/')
def item_del():
    rid = request.args.get('rid')
    ref = request.args.get('ref')
    
    receiptdb.query.filter(receiptdb.receipt_id == rid).delete()
    db.session.commit()
    
    trans = receiptdb.query.filter(receiptdb.ref_id == ref).order_by(receiptdb.receipt_id.asc())
    subtotal = 0
    for t in trans:
        subtotal += t.quantity * t.price 
    return render_template("rec_update.html", trans = trans, subtotal=subtotal, user=current_user)

@app.route('/store_suggest/')
def store_suggest():
    store = request.args.get('store')
    dateg = request.args.get('dateg')
    if store:
        all_stores = receiptdb.query.filter(receiptdb.store_name.contains(store))
    else:
        all_stores = receiptdb.query.filter(receiptdb.receipt_id > 0)
    all_store=[]
    for a in all_stores:
        all_store.append(a.store_name)
        
    used_store = receiptdb.query.filter(receiptdb.datef == dateg)    
    engine = create_engine('mysql://root:sh030780@localhost/chengben?charset=utf8')
    Sessions = sessionmaker(bind=engine)
    Sessions.configure(bind=engine)
    session = Sessions()      
    store_qty = session.query(func.count(receiptdb.store_name), receiptdb.store_name).group_by(receiptdb.store_name).order_by(func.count(receiptdb.store_name).desc()).all()
    
    used_list = []
    if dateg:     
        for u in used_store:
            if u.store_name not in used_list:
                used_list.append(u.store_name)
    final_store = []
    for q in store_qty:
        if (q[1] not in used_list) and (q[1] in all_store):
            final_store.append(q[1])
    for u in used_list:
        if u in all_store:
            final_store.append(u)

    return render_template("store_suggest.html", final_store=final_store, user=current_user)

@app.route('/item_suggest/')
def item_suggest():
    store = request.args.get('store')
    item = request.args.get('item')
    dateg = request.args.get('dateg')
    test_var = 0
    if item and store:
        all_items = receiptdb.query.filter(receiptdb.item_name.contains(item)).filter(receiptdb.store_name==store)
        test_var = 1
    elif store and not item:
        all_items = receiptdb.query.filter(receiptdb.store_name==store)
        test_var = 2
    else:
        all_items = receiptdb.query.filter(receiptdb.receipt_id > 0)
        test_var = 3
        
    all_item=[]
    for i in all_items:
        all_item.append([i.item_name, i.price])
#only use all_item hereafter.
        
    if store:    
        used_item = receiptdb.query.filter(receiptdb.datef == dateg).filter(receiptdb.store_name==store)
    else:
        used_item = receiptdb.query.filter(receiptdb.datef == dateg)
    
    engine = create_engine('mysql://root:sh030780@localhost/chengben?charset=utf8')
    Sessions = sessionmaker(bind=engine)
    Sessions.configure(bind=engine)
    session = Sessions()      
    item_qty = session.query(func.count(receiptdb.item_name), receiptdb.item_name, receiptdb.price).group_by(receiptdb.item_name).order_by(func.count(receiptdb.item_name).desc()).all()
    
    used_list = []
    if dateg:     
        for u in used_item:
            if [u.item_name, u.price] not in used_list:
                used_list.append([u.item_name, u.price])
    final_item = []
    
    for i in item_qty:
        if ([i[1],i[2]] not in used_list) and ([i[1],i[2]] in all_item):
            final_item.append([i[1],i[2]])
    for u in used_list:
        if u in all_item:
            final_item.append(u)

    return render_template("item_suggest.html", final_item=final_item, test_var = test_var, all_item=used_list, user=current_user)

@app.route('/ivendor/', methods=['GET', 'POST'])
def ivendor():
    NewUsers = usersdb.query.filter(usersdb.userid > 0).order_by(usersdb.userid.asc()).limit(2).all()
    NewVendors = vendortable.query.filter(vendortable.vendor_id > 0).order_by(vendortable.vendor_id.asc()).limit(4).all()
    vendor = 1
    searchstring = '/vendor/' + str(vendor) + '/'

    #Recent Clicks
    engine = create_engine('mysql://root:sh030780@localhost/chengben?charset=utf8')
    Sessions = sessionmaker(bind=engine)
    Sessions.configure(bind=engine)
    session = Sessions()      
    #clicks_qty = session.query(analytics.sid, func.count(analytics.url.contains(searchstring))).group_by(analytics.sid).order_by(func.count(analytics.url.contains(searchstring)).desc()).all()
    itemsall = analytics.query.filter(analytics.url.contains(searchstring))
    
    unique_first = []
    for y in itemsall:
        if searchstring in y.url:     
            if (y.sid[0:10], searchstring) not in unique_first:
                stringvar = (y.sid[0:10], searchstring)
                unique_first.append(stringvar)
    unique = []
    for u in unique_first:
        clicks = 0
        for y in itemsall:
            if y.sid[0:10] in u[0]:
                clicks = clicks + 1
        stringvar = (u[0], clicks)
        unique.append(stringvar)

    #top_list = sorted(top_list, key=itemgetter(0), reverse=True)
    unique = sorted(unique, key=itemgetter(1), reverse=True)
    # creates unique list of sids with /vendor/1/ in the string
    # for every unique sid, aggregate clicks for all items in analytics query
    #end RecentClicks
    TopItems = itemdata.query.filter(itemdata.vendor == vendor).order_by(itemdata.clicks.desc()).limit(4).all()
    
    return render_template("index_vendor.html", NewUsers = NewUsers, NewVendors = NewVendors, unique = unique, TopItems = TopItems, user=current_user)

@app.route('/umgmt/', methods=['GET', 'POST'])
def umgmt():
    users = usersdb.query.filter(usersdb.userid > 0).order_by(usersdb.userid.asc()).all()
    for v in users:
        if '\r' in v.phone1:
            v.phone1 = v.phone1.replace('\r', '')
        if '\n' in v.phone1:
            v.phone1 = v.phone1.replace('\n', '')            
        if v.phone2:
            if '\r' in v.phone2:
                v.phone2 = v.phone2.replace('\r', '')
            if '\n' in v.phone2:
                v.phone2 = v.phone2.replace('\n', '')
        if v.email:
            if '\r' in v.email:
                v.email = v.email.replace('\r', '')
            if '\n' in v.email:
                v.email = v.email.replace('\n', '')
        if v.address:
            if '\r' in v.address:
                v.address = v.address.replace('\r', '')
            if '\n' in v.address:
                v.address = v.address.replace('\n', '')
        if v.fax:
            if '\r' in v.fax:
                v.fax = v.fax.replace('\r', '')
            if '\n' in v.fax:
                v.fax = v.fax.replace('\n', '')
        if v.website:
            if '\r' in v.website:
                v.fax = v.fax.replace('\r', '')
            if '\n' in v.website:
                v.fax = v.fax.replace('\n', '')
            if 'http' not in v.website:
                v.website = 'http://' + v.website
    db.session.merge(v)
    db.session.commit()
    
    form = ItemEdit()
    links = []
    for i in users:
        if i.website:
            try:
                os.stat(i.website)
                web_ping = requests.head(i.website)
                if web_ping.status_code < 400:
                    web_status = 1
                else:
                    web_status = 0
            except OSError:
                web_status = 0
    
        if i.profilepic:
            if 'static' not in i.profilepic:
                image_ping = requests.head(i.profilepic)
                if image_ping.status_code < 400:
                    image_status = 1
                else:
                    image_status = 0
            else:
                image_status = 1
        else:
            image_status = 0
            
        link_vars = linkcheck(idItemData = i.userid, web_check = web_status, image_check = image_status)
        links.append(link_vars)
     
    return render_template("umgmt.html", vendors = users, form=form, links=links, user=current_user)

@app.route('/vmgmt/', methods=['GET', 'POST'])
def vmgmt(): 
    vendors = vendortable.query.filter(vendortable.vendor_id > 0).order_by(vendortable.vendor_id.asc()).all()
    for v in vendors:
        if '\r' in v.phone1:
            v.phone1 = v.phone1.replace('\r', '')
        if '\n' in v.phone1:
            v.phone1 = v.phone1.replace('\n', '')            
        if v.phone2:
            if '\r' in v.phone2:
                v.phone2 = v.phone2.replace('\r', '')
            if '\n' in v.phone2:
                v.phone2 = v.phone2.replace('\n', '')
        if v.email:
            if '\r' in v.email:
                v.email = v.email.replace('\r', '')
            if '\n' in v.email:
                v.email = v.email.replace('\n', '')
        if v.ch_name:
            if '\r' in v.ch_name:
                v.ch_name = v.ch_name.replace('\r', '')
            if '\n' in v.ch_name:
                v.ch_name = v.ch_name.replace('\n', '')
        if v.address:
            if '\r' in v.address:
                v.address = v.address.replace('\r', '')
            if '\n' in v.address:
                v.address = v.address.replace('\n', '')
        if v.fax:
            if '\r' in v.fax:
                v.fax = v.fax.replace('\r', '')
            if '\n' in v.fax:
                v.fax = v.fax.replace('\n', '')
    db.session.merge(v)
    db.session.commit()
    
    form = ItemEdit()
    items = itemdata.query.filter(itemdata.vendor == 27).order_by(itemdata.idItemData.desc()).limit(20).all()
    fitem = items[0]
    links = []
    for i in vendors:
        if i.website:
            web_ping = requests.head(i.website)
            if web_ping.status_code < 400:
                web_status = 1
            else:
                web_status = 0
        else:
            web_status = 0
    
        if i.logo_url:
            if 'static' not in i.logo_url:
                image_ping = requests.head(i.logo_url)
                if image_ping.status_code < 400:
                    image_status = 1
                else:
                    image_status = 0
            else:
                image_status = 1
        else:
            image_status = 0
            
        link_vars = linkcheck(idItemData = i.vendor_id, web_check = web_status, image_check = image_status)
        links.append(link_vars)
     
    return render_template("vmgmt_header_footer.html", vendors = vendors, items = items, form=form, fitem=fitem, links=links, user=current_user)

def findvar(var_name):
    testvar = request.args.get(var_name)
    if testvar == '':
        testvar = None
    return testvar

@app.route('/itemquicksave/', methods=['GET', 'POST'])
def itemquicksave():
    item_id = request.args.get('item_id')
    name = request.args.get('name')
    brand = findvar('brand')
    item_cat = findvar('item_cat')
    item_searchtags = findvar('item_searchtags')
    weight = findvar('weight')
    unit = findvar('unit')
    pack = findvar('pack')
    vendor = findvar('vendor')
    web_url = findvar('web_url')
    image_url = findvar('image_url')
    vendorcat = findvar('vendorcat')
    gen_cat = findvar('gen_cat')
    active = findvar('active')
    confirmed = findvar('confirmed')
    desc = findvar('desc')
    price = findvar('price')
    edit_item = itemdata(idItemData=item_id, name=name, brand=brand, cat_type=item_cat, searchtags=item_searchtags, weight=weight, \
                unit=unit,pack=pack,vendor=vendor,web_url=web_url,image_url=image_url,vendorcat=vendorcat,gen_cat=gen_cat,\
                active=active,confirmed=confirmed, desc=desc, price=price)
    db.session.merge(edit_item)
    db.session.commit()
                         
        
    #normal itemdashboard query.
    vendor = 1
    items = itemdata.query.filter(itemdata.vendor == vendor).order_by(itemdata.idItemData.asc()).limit(20).all()
    form = ItemEdit()
    fitem = items[0]
    links = []
    for i in items:
        web_ping = requests.head(i.web_url)
        if web_ping.status_code < 400:
            web_status = 1
        else:
            web_status = 0
        image_ping = requests.head(i.image_url)
        if image_ping.status_code < 400:
            image_status = 1
        else:
            image_status = 0
        link_vars = linkcheck(idItemData = i.idItemData, web_check = web_status, image_check = image_status)
        links.append(link_vars)
        db.session.merge(link_vars)
        db.session.commit()
                
    return render_template("itemquicksave.html", items = items, links=links, user=current_user)

@app.route('/itemdashboard/', methods=['GET', 'POST'])
def itemdashboard():
    NewVendors = vendortable.query.filter(vendortable.vendor_id > 0).order_by(vendortable.vendor_id.asc()).limit(4).all()
    vendor = 1
    items = itemdata.query.filter(itemdata.vendor == vendor).order_by(itemdata.idItemData.asc()).limit(20).all()
    form = ItemEdit()
    fitem = items[0]
    links = []
    for i in items:
        web_ping = requests.head(i.web_url)
        if web_ping.status_code < 400:
            web_status = 1
        else:
            web_status = 0
        image_ping = requests.head(i.image_url)
        if image_ping.status_code < 400:
            image_status = 1
        else:
            image_status = 0
        link_vars = linkcheck(idItemData = i.idItemData, web_check = web_status, image_check = image_status)
        links.append(link_vars)
        db.session.merge(link_vars)
        db.session.commit()

    if form.validate_on_submit():
        edit_item = itemdata(idItemData=form.idItemData.data, name=form.name.data, brand=form.brand.data, desc=form.desc.data, price=form.price.data, weight=form.weight.data,
                             unit=form.unit.data, pack=form.pack.data, web_url=form.web_url.data, image_url=form.image_url.data, searchtags=form.searchtags.data, 
                             cat_type=form.cat_type.data, gen_cat=form.gen_cat.data, active=form.active.data, vendor=form.vendor.data, confirmed = form.confirmed.data)
        
        db.session.merge(edit_item)        
        db.session.commit()
        return redirect('itemdashboard')
                
    return render_template("item_dashboard.html", NewVendors = NewVendors, items = items, form=form, fitem=fitem, links=links, user=current_user)

@app.route('/', defaults={'page': 1}, methods=['GET', 'POST'])
@app.route('/<int:page>', methods=['GET', 'POST'])
def index(page):
    form = SignupForm()
    #sumSessionCounter()
    #g.sid = session['counter']
    items = menutable.query.filter(menutable.tier >= 1, menutable.tier < 3) #always works    
    l1menu = menutable.query.filter(menutable.tier == 1).order_by(menutable.menu_order.asc())
    l2menu = menutable.query.filter(menutable.tier == 2).order_by(menutable.parent_id.asc(), menutable.menu_order.asc())
                
    return render_template("L1_home.html", title='Home', l1menu=l1menu, l2menu=l2menu, user = current_user, form=form)

@app.route('/parser/', methods=['GET', 'POST'])
def parser():
    
    items = itemdata.query.filter(itemdata.confirmed == 1).limit(20).all()
    fitem = itemdata.query.filter(itemdata.confirmed == 1).first()
    form = ItemEdit()
    if fitem.cat_type == 'Frozen':
        fitem.cat_type = 'Processed'
    if fitem.cat_type == 'Fish':
        fitem.cat_type = 'FishMeat'
    if fitem.cat_type == 'Vegetables':
        fitem.cat_type = 'Vegetable'          

    if form.validate_on_submit():
        edit_item = itemdata(idItemData=form.idItemData.data, name=form.name.data, brand=form.brand.data, desc=form.desc.data, price=form.price.data, weight=form.weight.data,
                             unit=form.unit.data, pack=form.pack.data, web_url=form.web_url.data, image_url=form.image_url.data, searchtags=form.searchtags.data, 
                             cat_type=form.cat_type.data, gen_cat=form.gen_cat.data, active=form.active.data, vendor=form.vendor.data, confirmed = 2)
        
        db.session.merge(edit_item)        
        db.session.commit()
        return redirect('parser')
                        
    return render_template("parser.html", title='Parser', form=form, items=items, fitem=fitem, user=current_user)

@app.route('/parserall/', methods=['GET', 'POST'])
def parserall(): #parser_codestorage_here

    def unique_list(l):
        ulist = []
        [ulist.append(x) for x in l if x not in ulist]
        return ulist

    #items = itemdata.query.filter(or_(itemdata.confirmed == 0, itemdata.confirmed == None))
    #for parsing new items (above)
    #items = itemdata.query.filter(itemdata.confirmed == 1)
    
    items = itemdata.query.filter(itemdata.confirmed == 1)
    
    form = ItemEdit()
    diction = dictionary.query.order_by((func.char_length(dictionary.match_text)).desc(), dictionary.match_text.asc())

    for i in items:
        if i.searchtags:
            new_keywords = i.searchtags
        else:
            new_keywords = ''
        if i.cat_type:
            cat_temp = i.cat_type
        else:
            cat_temp = ''
        search_string = i.name.upper()
        orig_string = i.name
        found = False
        for d in diction:
            upper = d.match_text.upper()
            if search_string.find(upper) != -1:
                if new_keywords == "":
                    new_keywords = d.keywords
                    found = True
                else:
                    new_keywords += " " + d.keywords
                    found = True
                if orig_string.endswith(upper):
                    if d.category != '' and cat_temp != '':
                        cat_temp = d.category
                search_string = search_string.replace(upper,'')
        if found == True:
            new_keywords = ' '.join(unique_list(new_keywords.split()))
            i.searchtags = new_keywords
            i.confirmed = 1
            i.match =  100-int(round(float(len(search_string)/len(orig_string))*100,0))
            i.unmatched = search_string
            if cat_temp != "":
                i.cat_type = cat_temp
            db.session.add(i)
            db.session.commit()
                        
    return render_template("parser.html", title='Parser', diction=diction, form=form, items=items, user=current_user)

#@app.route('/L2/', defaults={'page': 1}, methods=['GET', 'POST'])
@app.route('/L2/<int:page>/', methods=['GET', 'POST'])
def L2(page):
    sumSessionCounter()
    items = menutable.query.filter(menutable.tier >= 3, menutable.tier < 5) #always works   
    l1menu = menutable.query.filter(menutable.tier == 3).order_by(menutable.menu_order.asc())
    l2menu = menutable.query.filter(menutable.tier == 4).order_by(menutable.parent_id.asc(), menutable.menu_order.asc())    

    #L2 Totaller
    admin = menutable.query.filter(menutable.menu_id == page).first() #item_id
    t3 = menutable.query.filter(menutable.parent_id == page) #find tier3s where parent = page
    total = 0
    for t in t3:
        for t2 in l2menu:
            if (t2.parent_id == t.menu_id) and (t2.menu_name != 'All'):    #find tier4s where parent = tier3
                if t2.sub_count != None:
                    total += t2.sub_count
    admin.sub_count = total
    db.session.add(admin)
    db.session.commit() #end L2Totaller

    return render_template("L2.html",
                           title='L2Menus',
                           l1menu=l1menu, l2menu=l2menu, page=page, user=current_user)    

@app.route('/L3/<int:page>/', methods=['GET', 'POST'])
def L3(page):
    sumSessionCounter()
    keyword = request.args.get('keyword')
    #items = itemdata.query.whoosh_search(keyword).paginate(1, ITEMS_PER_PAGE).items

#search by searchtags
    search_terms = keyword.split()
    items = itemdata.query.filter(itemdata.cat_type.contains(search_terms[0])) #whoosh_search all items with keywords
    search_terms.pop(0)
    #items = itemdata.query.filter(itemdata.idItemData > 0) #whoosh_search all items with keywords
    results_all = []

    # apply for L4 search pages with category filter etc.
    if search_terms:
        for s in reversed(search_terms):
            items = items.filter(itemdata.searchtags.contains(s))
    
    count = items.count()  #items found
    admin = menutable.query.filter(menutable.menu_id == page).first() #item_id
    admin.sub_count = count
    db.session.add(admin)
    db.session.commit()
    test = itemdata.query.filter(itemdata.name.contains(keyword)).paginate(1, ITEMS_PER_PAGE)
    brands = []
    for x in items:
            if x.brand not in brands:
                brands.append(x.brand)
    vendors = vendortable.query.all()
                
    ##test = itemdata.query.whoosh_search(keyword).all()
    return render_template("L4.html",
                           title='Menus', brands=brands,
                           items=items, test=test, count=count, page=page, admin=admin, vendors=vendors, user=current_user)

@app.route('/L4quicksearch/', methods=['GET', 'POST'])
def L4quicksearch():
    keyword = request.args.get('keyword')
    if keyword == '':
        keyword = None

    #keyword search
    if keyword:
        search_terms = keyword.split()
        if search_terms[0] == 'None':
            items = itemdata.query.filter(itemdata.idItemData > 0)
            search_terms.pop(0)
        elif itemdata.query.filter(itemdata.cat_type.contains(search_terms[0])).count() != 0:
            items = itemdata.query.filter(itemdata.cat_type.contains(search_terms[0])) #whoosh_search all items with keywords
            search_terms.pop(0)
        elif itemdata.query.filter(itemdata.searchtags.contains(search_terms[0])).count() != 0:
            items = itemdata.query.filter(itemdata.searchtags.contains(search_terms[0])) #whoosh_search all items with keywords
            search_terms.pop(0)            
        elif itemdata.query.filter(itemdata.name.contains(search_terms[0])).count() != 0:
            items = itemdata.query.filter(itemdata.name.contains(search_terms[0])) #whoosh_search all items with keywords
            search_terms.pop(0)            

        # apply for L4 search pages with category filter etc.
        if search_terms:
            for s in reversed(search_terms):
                if items.filter(itemdata.searchtags.contains(s)).count() != 0:
                    items = items.filter(itemdata.searchtags.contains(s))
                elif items.filter(itemdata.name.contains(s)).count() !=0:
                    items = items.filter(itemdata.name.contains(s))
                
        vendors = vendortable.query.all()
                
        return render_template("l4quicksave.html", items=items, vendors=vendors, user=current_user)

@app.route('/L4quicksave/', methods=['GET', 'POST'])
def L4quicksave():
    keyword = request.args.get('keyword')
    item_id = request.args.get('item_id')
    if item_id:
        item_cat = request.args.get('item_cat')
        if item_cat == '':
            item_cat = None
        item_searchtags = request.args.get('item_searchtags')
        if item_searchtags == '':
            item_searchtags = None
        item_image = request.args.get('item_image')
        if item_image == '':
            item_image = None
        item_url = request.args.get('item_url')
        if item_url == '':
            item_url = None
        keyword = request.args.get('keyword')
        if keyword == '':
            keyword = None
        edit_item = itemdata(idItemData=item_id, cat_type=item_cat, searchtags=item_searchtags, image_url=item_image, web_url=item_url)
        db.session.merge(edit_item)
        db.session.commit()
        
    menu_id = request.args.get('menu_id')
    if menu_id:
        menu_keyword = request.args.get('menu_keyword')
        if menu_keyword == '':
            menu_keyword = None
        edit_menu = menutable(menu_id=menu_id,keyword=menu_keyword)
        db.session.merge(edit_menu)
        db.session.commit()

    #keyword search
    if keyword:
        if menu_id:
            keyword = menu_keyword
        
        search_terms = keyword.split()
        
        if search_terms[0] == 'None':
            items = itemdata.query.filter(itemdata.idItemData > 0)
            search_terms.pop(0)
        elif itemdata.query.filter(itemdata.cat_type.contains(search_terms[0])).count() != 0:
            items = itemdata.query.filter(itemdata.cat_type.contains(search_terms[0])) #whoosh_search all items with keywords
            search_terms.pop(0)
        elif itemdata.query.filter(itemdata.searchtags.contains(search_terms[0])).count() != 0:
            items = itemdata.query.filter(itemdata.searchtags.contains(search_terms[0])) #whoosh_search all items with keywords
            search_terms.pop(0)            
        elif itemdata.query.filter(itemdata.name.contains(search_terms[0])).count() != 0:
            items = itemdata.query.filter(itemdata.name.contains(search_terms[0])) #whoosh_search all items with keywords
            search_terms.pop(0)   

        # apply for L4 search pages with category filter etc.
        if search_terms:
            for s in reversed(search_terms):
                if items.filter(itemdata.searchtags.contains(s)).count() != 0:
                    items = items.filter(itemdata.searchtags.contains(s))
                elif items.filter(itemdata.name.contains(s)).count() !=0:
                    items = items.filter(itemdata.name.contains(s))
        vendors = vendortable.query.all()
                
        return render_template("l4quicksave.html", items=items, vendors=vendors, user=current_user)
    
@app.route('/L4/<int:page>/', methods=['GET', 'POST'])
@app.route('/L4search/<int:page>/', methods=['GET', 'POST'])
def L4search(page):
    sumSessionCounter()
    keyword = request.args.get('keyword')
    search_type = 2
    
#search by searchtags
    if keyword:
        keyword = keyword.replace('*', '')
        keyword = keyword.replace(' AND ', ' ')
        search_terms = keyword.split()
        items = []

        if search_type == 1:
            if search_terms[0] == 'None':
                items = itemdata.query.filter(itemdata.idItemData > 0) #whoosh_search all items with keywords
                search_terms.pop(0)
            else:
                items = itemdata.query.filter(itemdata.cat_type.contains(search_terms[0])) #whoosh_search all items with keywords
                search_terms.pop(0)
                
        elif search_type == 2:
            if search_terms[0] == 'None':
                items = itemdata.query.filter(itemdata.idItemData > 0)
                search_terms.pop(0)
            elif itemdata.query.filter(itemdata.cat_type.contains(search_terms[0])).count() != 0:
                items = itemdata.query.filter(itemdata.cat_type.contains(search_terms[0])) #whoosh_search all items with keywords
                search_terms.pop(0)
            elif itemdata.query.filter(itemdata.searchtags.contains(search_terms[0])).count() != 0:
                items = itemdata.query.filter(itemdata.searchtags.contains(search_terms[0])) #whoosh_search all items with keywords
                search_terms.pop(0)            
            elif itemdata.query.filter(itemdata.name.contains(search_terms[0])).count() != 0:
                items = itemdata.query.filter(itemdata.name.contains(search_terms[0])) #whoosh_search all items with keywords
                search_terms.pop(0)   


        # apply for L4 search pages with category filter etc.
        if search_terms:
            for s in reversed(search_terms):
                if items.filter(itemdata.searchtags.contains(s)).count() != 0:
                    items = items.filter(itemdata.searchtags.contains(s))
                elif items.filter(itemdata.name.contains(s)).count() !=0:
                    items = items.filter(itemdata.name.contains(s))
                
        count = items.count()
        admin = menutable.query.filter(menutable.menu_id == page).first() #item_id
        admin.sub_count = count
        db.session.add(admin)
        db.session.commit()
        
        test = itemdata.query.filter(itemdata.name.contains(keyword)).paginate(1, ITEMS_PER_PAGE)
        brands = []
        for x in items:
                if x.brand not in brands:
                    brands.append(x.brand)
        vendors = vendortable.query.all()

                
    ##test = itemdata.query.whoosh_search(keyword).all()
        return render_template("L4search.html", title='Search', brands=brands, items=items, test=test, count=count, page=page, admin=admin, vendors=vendors, keyword=keyword, user=current_user)
    else:
        test = 0
        brands = ""
        count = 0
        page = 0
        admin = 1
        vendors=""
        return render_template("L4search.html", title='L4Search', user=current_user)

@app.route('/vendor/<int:vendorid>/<int:page>/', methods=['GET', 'POST'])
def vendor(vendorid, page):
    sumSessionCounter()
    keyword = '*'
    items = itemdata.query.filter(itemdata.vendor == vendorid).paginate(page, ITEMS_PER_PAGE).items
    #items = itemdata.query.whoosh_search(keyword).all()
    itemsall = itemdata.query.filter(itemdata.vendor == vendorid).all()

    count = len(itemsall)
    admin = vendortable.query.filter(vendortable.vendor_id == vendorid).first()
    logo = admin.logo_url
    #admin.sub_count = count
    #db.session.add(admin)
    #db.session.commit()
    test = itemdata.query.filter(itemdata.vendor == vendorid).paginate(page, ITEMS_PER_PAGE)
    brands = []
    for x in itemsall:
            if x.vendorcat not in brands:
                brands.append(x.vendorcat)
    #testzone
    font = ImageFont.truetype('app/static/contact/arial.ttf',14)
    changes = 0
    if (admin.phone1_img == None) and (admin.phone1):
        img = Image.new('RGB', (170, 16), (255, 255, 255))
        d = ImageDraw.Draw(img)
        d.text((0, 0), admin.phone1, (85,85,85), font=font)
        phone1_link ='contact/' + str(vendorid)+ '_phone1.jpg'
        img.save('app/static/contact/' + str(vendorid)+ '_phone1.jpg')
        admin.phone1_img = phone1_link
        changes = 1
    if (admin.phone2_img == None) and (admin.phone2):
        img = Image.new('RGB', (170, 16), (255, 255, 255))
        d = ImageDraw.Draw(img)
        d.text((0, 0), admin.phone2, (85,85,85), font=font)
        phone2_link ='contact/' + str(vendorid)+ '_phone2.jpg'
        img.save('app/static/contact/' + str(vendorid)+ '_phone2.jpg')
        admin.phone2_img = phone2_link
        changes = 1
    if (admin.fax_img == None) and (admin.fax):
        img = Image.new('RGB', (170, 16), (255, 255, 255))
        d = ImageDraw.Draw(img)
        d.text((0, 0), admin.fax, (85,85,85), font=font)
        fax_link ='contact/' + str(vendorid)+ '_fax.jpg'
        img.save('app/static/contact/' + str(vendorid)+ '_fax.jpg')
        admin.fax_img = fax_link
        changes = 1
    if (admin.email_img == None) and (admin.email):
        img = Image.new('RGB', (170, 16), (255, 255, 255))
        d = ImageDraw.Draw(img)
        d.text((0, 0), admin.email, (85,85,85), font=font)
        email_link ='contact/' + str(vendorid)+ '_email.jpg'
        img.save('app/static/contact/' + str(vendorid)+ '_email.jpg')
        admin.email_img = email_link
        changes = 1
    if changes == 1:
        db.session.add(admin)
        db.session.commit()        
                    
    ##test = itemdata.query.whoosh_search(keyword).all()
    return render_template("vendor.html",
                           title='Vendor', brands=brands,
                           items=items, test=test, count=count, page=page, vendorid=vendorid, admin=admin, logo=logo, user=current_user)

@app.route('/metrics/', methods=['GET', 'POST'])
def metrics():
    engine = create_engine('mysql://root:sh030780@localhost/chengben')
    Sessions = sessionmaker(bind=engine)
    Sessions.configure(bind=engine)
    session = Sessions()
        #unique number of clicks per sid (unique visitor)
    test = session.query(func.count(analytics.sid), analytics.sid).group_by(analytics.sid).order_by(func.count(analytics.sid).desc()).all()
    itemsall = analytics.query.filter(analytics.parsed == None) #normal query
    #itemsall = analytics.query.filter(analytics.parsed == 0) #only to re-populate duration & unique dbs.  Remember to switch back!

    avg_list = []
    for y in itemsall:
        try:
            #structure (0-sid, 1-begin time, 2-end time,3-clicks,4-ip,5-user_id,6-browser)
            sid_loc = [x[0] for x in avg_list].index(y.sid)
            avg_list[sid_loc][3] += 1
            if (avg_list[sid_loc][1] == None) or (avg_list[sid_loc][1] > y.timestamp):
                avg_list[sid_loc][1] = y.timestamp
            if (avg_list[sid_loc][2] == None) or (avg_list[sid_loc][2] < y.timestamp):
                avg_list[sid_loc][2] = y.timestamp
        except ValueError:
            avg_list.append([y.sid,y.timestamp,y.timestamp,1,y.ip,y.user_id,y.browser])
    for a in avg_list:
        dura = (a[2]-a[1]).total_seconds()
        average=averagedb(sid=a[0],ip=a[4],user_id=a[5],clicks=a[3],duration=dura,datevar=a[1],browser=a[6])
        db.session.add(average)

    unique = []
    for y in itemsall:
        if (y.sid, y.url) not in unique:
            stringvar = (y.sid, y.url)
            unique.append(stringvar)
            uni_db = uniquedb(sid=y.sid, ip=y.ip, user_id=y.user_id, url=y.url, date=y.timestamp)
            db.session.add(uni_db)
        y.parsed = 0 #parsed flag switcher
        db.session.add(y)
            #db.session.commit()
            
    test2 = session.query(func.count(uniquedb.url), uniquedb.url).group_by(uniquedb.url).order_by(func.count(uniquedb.url).desc()).all()
    L2 = []
    for t in test2:
        if 'L2' in t[1]:
            L2.append(t)
    L4 = []
    for t in test2:
        if 'L4' in t[1]:
            textstr = t[1][:t[1].find('/?keyword')]
            apper = (t[0], textstr)
            L4.append(apper)
    db.session.commit()
    session.close()
    return render_template('metrics.html',
                           title='Metrics', test=test, test2=test2, L2=L2, L4=L4, user=current_user)

@app.route('/metrics_items/', methods=['GET', 'POST'])
def metrics_items():
    engine = create_engine('mysql://root:sh030780@localhost/chengben')
    Sessions = sessionmaker(bind=engine)
    Sessions.configure(bind=engine)
    session = Sessions()
    startDate = datetime.datetime(2017,8,1,0,0)
    nowDate = datetime.datetime.now()
    weekDate = datetime.datetime.now() - timedelta(days=7)
    week_sec = (nowDate - weekDate).total_seconds()
    top_clicked = analytics.query.filter(analytics.url.contains('vendor'))
    top_list = []
    for t in top_clicked:
        if 'ref' in t.url:
            ref_id = t.url[t.url.find('?ref=')+5:]
            try:
                test = [x[1] for x in top_list].index(ref_id)
                top_list[test][0] += 1
                #if (top_list[test][3] == None) or (top_list[test][3] > t.timestamp):
                #    top_list[test][3] = t.timestamp
                #if (top_list[test][4] == None) or (top_list[test][4] < t.timestamp):
                #    top_list[test][4] = t.timestamp
                    
            except ValueError:
                top_list.append([1,ref_id,'',t.timestamp,t.timestamp])
                
    top_list = sorted(top_list, key=itemgetter(0), reverse=True)
    for t in range(0, 7):
        ref_id = top_list[t][1]
        item_name = itemdata.query.filter(itemdata.idItemData == int(ref_id)).first()
        item_name = item_name.name
        #dura = round(float(top_list[t][0] / months),2)
        top_list[t] = [top_list[t][0],top_list[t][1],item_name]

    #top 7 day Velocity
    top_week = analytics.query.filter(analytics.url.contains('vendor')).filter(analytics.timestamp <= nowDate).filter(analytics.timestamp>=weekDate)
    week_list = []
    for t in top_week:
        if 'ref' in t.url:
            ref_id = t.url[t.url.find('?ref=')+5:]
            try:
                test = [x[1] for x in week_list].index(ref_id)
                week_list[test][0] += 1
            except ValueError:
                week_list.append([1,ref_id,''])
                
    week_list = sorted(week_list, key=itemgetter(0), reverse=True)
    for t in range(0, 7):
        ref_id = week_list[t][1]
        item_name = itemdata.query.filter(itemdata.idItemData == int(ref_id)).first()
        item_name = item_name.name
        week_list[t] = [week_list[t][0],week_list[t][1],item_name]                
                
            
    test2 = session.query(func.count(uniquedb.url), uniquedb.url).group_by(uniquedb.url).order_by(func.count(uniquedb.url).desc()).all()
    L2 = []
    for t in test2:
        if 'L2' in t[1]:
            L2.append(t)
    L4 = []
    for t in test2:
        if 'L4' in t[1]:
            textstr = t[1][:t[1].find('/?keyword')]
            apper = (t[0], textstr)
            L4.append(apper)
            
    #Browsers
    browser_qry = analytics.query.filter(analytics.parsed == 0).group_by(analytics.sid)
    browser_list = []
    for t in browser_qry:
        bname = t.browser
        try:
            test = [x[1] for x in browser_list].index(bname)
            browser_list[test][0] += 1
        except ValueError:
            browser_list.append([1,bname])
            
    qry_num = browser_qry.count()
    for b in range(0,len(browser_list)):
        browser_list[b] = ([ str(round(float(browser_list[b][0]/qry_num)*100,0)), browser_list[b][1] ])

    #last 7 days unique visitors per day
    dayvar = datetime.datetime.now()
    total_list = []
    for i in range(0,7):
        beg_date = datetime.datetime(dayvar.year,dayvar.month,dayvar.day,0,0)
        dayvar = dayvar - timedelta(days=1)
        end_date = datetime.datetime(dayvar.year,dayvar.month,dayvar.day,0,0)
        date_qry = analytics.query.filter(analytics.timestamp < beg_date).filter(analytics.timestamp >= end_date).group_by(analytics.sid)
        day_str = dayvar.strftime("%A")[:3] + ' ' + str(dayvar.month) + '/' + str(dayvar.day)
        total_list.append([date_qry.count(), day_str])
    total_list = reversed(total_list)

    #total clicks per day vs unique clicks per day
    dayvar = datetime.datetime.now()
    totalc_list = []
    for i in range(0,7):
        beg_date = datetime.datetime(dayvar.year,dayvar.month,dayvar.day,0,0)
        dayvar = dayvar - timedelta(days=1)
        end_date = datetime.datetime(dayvar.year,dayvar.month,dayvar.day,0,0)
        date_qry = uniquedb.query.filter(uniquedb.date < beg_date).filter(uniquedb.date >= end_date) #unique clicks per day
        date_qry2 = analytics.query.filter(analytics.timestamp < beg_date).filter(analytics.timestamp >= end_date) #total clicks per day
        day_str = dayvar.strftime("%A")[:3] + ' ' + str(dayvar.month) + '/' + str(dayvar.day)
        totalc_list.append([date_qry.count(), date_qry2.count(), day_str])
    totalc_list = reversed(totalc_list)

    #last7 days unique visitors vs previous 7-14
    dayvar = datetime.datetime.now()
    dayvar2 = dayvar - timedelta(days=7)
    totalw_list = []
    for i in range(0,7):
        beg_date = datetime.datetime(dayvar.year,dayvar.month,dayvar.day,0,0)
        beg_date2 = datetime.datetime(dayvar2.year,dayvar2.month,dayvar2.day,0,0)
        dayvar = dayvar - timedelta(days=1)
        dayvar2 = dayvar2 - timedelta(days=1)
        end_date = datetime.datetime(dayvar.year,dayvar.month,dayvar.day,0,0)
        end_date2 = datetime.datetime(dayvar2.year,dayvar2.month,dayvar2.day,0,0)
        date_qry = uniquedb.query.filter(uniquedb.date < beg_date).filter(uniquedb.date >= end_date) #unique clicks per day
        date_qry2 = uniquedb.query.filter(uniquedb.date < beg_date2).filter(uniquedb.date >= end_date2) #total clicks per day
        day_str = dayvar.strftime("%A")[:3]
        day_str2 = str(dayvar2.month) + '/' + str(dayvar2.day)
        totalw_list.append([date_qry.count(), date_qry2.count(), day_str, day_str2])
    totalw_list = reversed(totalw_list)

        
    session.close()
    return render_template('metrics_items.html',
                           title='Item Metrics', test=top_list, test2=week_list, L2=L2, L4=L4, blist=browser_list, totals=total_list, \
                           totalc=totalc_list, totalw=totalw_list, user=current_user)

@app.route('/l1mgmt/', methods=['GET', 'POST'])
def L1_MenuMgmt():
    #sumSessionCounter()
    #g.sid = session['counter']
    items = menutable.query.filter(menutable.tier >= 1, menutable.tier < 3) #always works    
    l1menu = menutable.query.filter(menutable.tier == 1).order_by(menutable.menu_order.asc())
    l2menu = menutable.query.filter(menutable.tier == 2).order_by(menutable.parent_id.asc(), menutable.menu_order.asc())
    
    form = MenuData()
    #form.test = 'test'
    if form.validate_on_submit():
    #    form.test = 'monkey'
        if form.tier.data == 2:
            form.test = 'blah'
    #if form.keyword.data == None:
    #    form.test = 'Empty Text'
        if form.menu_id.data == 0:
            #next_menu = menutable.query.filter(menutable.menu_id > 0).order_by(menutable.menu_id.desc()).limit(1) + 1 #need to test
            new_add = menutable(menu_name=form.cat_name.data, tier=form.tier.data, menu_order=form.order.data,parent_id=form.parent.data,keyword=form.keyword.data)
            db.session.add(new_add)
            db.session.commit()
        else:
            edit_new = menutable(menu_name=form.cat_name.data, menu_id=form.menu_id.data, tier=form.tier.data, menu_order=form.order.data,parent_id=form.parent.data,
                                 keyword=form.keyword.data, sub_count=0, clicks=0, active=1)
            db.session.merge(edit_new)
            db.session.commit()
                
    return render_template("l1_mgmt.html", title='L1 Mgmt', l1menu=l1menu, l2menu=l2menu, form=form, user=current_user)

@app.route('/l2mgmt/<int:page>', methods=['GET', 'POST'])
def L2_MenuMgmt(page):
    sumSessionCounter()
    items = menutable.query.filter(menutable.tier >= 3, menutable.tier < 5) #always works   
    l1menu = menutable.query.filter(menutable.tier == 3).order_by(menutable.menu_order.asc())
    l2menu = menutable.query.filter(menutable.tier == 4).order_by(menutable.parent_id.asc(), menutable.menu_order.asc())    

    #L2 Totaller
    admin = menutable.query.filter(menutable.menu_id == page).first() #item_id
    t3 = menutable.query.filter(menutable.parent_id == page) #find tier3s where parent = page
    total = 0
    for t in t3:
        for t2 in l2menu:
            if (t2.parent_id == t.menu_id) and (t2.menu_name != 'All'):    #find tier4s where parent = tier3
                if t2.sub_count != None:
                    total += t2.sub_count
    admin.sub_count = total
    db.session.add(admin)
    db.session.commit() #end L2Totaller

    form = MenuData()
    if form.validate_on_submit():
        if form.menu_id.data == 0:
            new_add = menutable(menu_name=form.cat_name.data, tier=form.tier.data, menu_order=form.order.data,parent_id=form.parent.data,keyword=form.keyword.data)
            db.session.add(new_add)
            db.session.commit()
        else:
            edit_new = menutable(menu_name=form.cat_name.data, menu_id=form.menu_id.data, tier=form.tier.data, menu_order=form.order.data,parent_id=form.parent.data,
                                 keyword=form.keyword.data, sub_count=0, clicks=0, active=1)
            db.session.merge(edit_new)
            db.session.commit()

    return render_template("L2_mgmt.html",
                           title='L2Menus',
                           l1menu=l1menu, l2menu=l2menu, page=page, form=form, user=current_user)

@app.route('/dummy_back/', methods=['GET', 'POST'])
def dummy_back():    
    start_day = 1
    startDate = datetime.datetime.now()
    l4search = menutable.query.filter(menutable.tier == 4)
    l4count = l4search.count()
    l2search = menutable.query.filter(menutable.tier == 2)
    l2count = l2search.count()
    msearch = dictionary.query.filter(dictionary.keywords != '')    
    mcount = msearch.count()
    vsearch = vendortable.query.filter(vendortable.vendor_id > 0)
    vcount = vsearch.count()
    isearch = itemdata.query.filter(itemdata.idItemData > 0)
    icount = isearch.count() 
    current = startDate
    rand_list = []
    for i in range (1,50):
        sid = ''.join([choice(ascii_lowercase + digits) for i in range(32)])
        sid = sid[:8] + '-' + sid[8:12] + '-' + sid[12:16] + '-' + sid[16:20] + '-' + sid[20:32]
        ip = ''.join([choice(digits) for i in range(12)])
        ip = ip[:3] + '.' + ip[3:6] + '.' + ip[6:9] + '.' + ip[9:12]
        ip = ip.replace('.00','.')
        ip = ip.replace('.0','.')
        ip = ip.lstrip('0')
        browser_list = ['Chrome', 'IE/Edge', 'Firefox', 'Safari', 'Opera']
        browser = browser_list[randrange(5)]
        current = startDate - datetime.timedelta(days=randrange(14))

        for j in range(1, randrange(20)):
            current = current + datetime.timedelta(hours = randrange(2), minutes=randrange(60), seconds=randrange(60))
            currentp = current.strftime("%I:%M%p on %B %d, %Y")

            #url_link
            link_pref = 'http://localhost:5000/'
            link_type = randrange(1,4)
            if link_type == 1:  #random L2
                lrand = randrange(0, l2count)
                llink = l2search[lrand].menu_id
                link_pref += 'L2/' + str(llink) + '/'
            if link_type == 2:  #random L4
                lrand = randrange(0, l4count)
                llink = l4search[lrand].menu_id
                mrand = randrange(0, mcount)
                mlink = msearch[mrand].keywords
                link_pref += 'L4/' + str(llink) + '/?keyword=' + mlink
            if link_type == 3:  #random vendor
                vrand = randrange(0, vcount)
                llink = vsearch[vrand].vendor_id
                irand = randrange(0, icount)
                ilink = isearch[irand].idItemData
                link_pref += 'vendor/' + str(llink) + '/1/?ref=' + str(ilink)

            #ref_link
            ref_pref = 'http://localhost:5000/'
            link_type = randrange(1,4)
            if link_type == 1:  #random L2
                lrand = randrange(0, l2count)
                llink = l2search[lrand].menu_id
                ref_pref += 'L2/' + str(llink) + '/'
            if link_type == 2:  #random L4
                lrand = randrange(0, l4count)
                llink = l4search[lrand].menu_id
                mrand = randrange(0, mcount)
                mlink = msearch[mrand].keywords
                ref_pref += 'L4/' + str(llink) + '/?keyword=' + mlink
            if link_type == 3:  #random vendor
                vrand = randrange(0, vcount)
                llink = vsearch[vrand].vendor_id
                irand = randrange(0, icount)
                ilink = isearch[irand].idItemData
                ref_pref += 'vendor/' + str(llink) + '/1/?ref=' + str(ilink)
            rand_list.append([sid, ip,currentp,link_pref,ref_pref,browser])
            ana_entry = analytics(sid=sid,ip=ip,timestamp=current,url=link_pref,referer=ref_pref,browser=browser)
            db.session.add(ana_entry)
    db.session.commit()
    
    return render_template('dummy.html', rand_list = rand_list, user=current_user)

@app.route('/dummy_forward/', methods=['GET', 'POST'])
def dummy_forward():    
    start_day = 1
    startDate = datetime.datetime.now()
    l4search = menutable.query.filter(menutable.tier == 4)
    l4count = l4search.count()
    l2search = menutable.query.filter(menutable.tier == 2)
    l2count = l2search.count()
    msearch = dictionary.query.filter(dictionary.keywords != '')    
    mcount = msearch.count()
    vsearch = vendortable.query.filter(vendortable.vendor_id > 0)
    vcount = vsearch.count()
    isearch = itemdata.query.filter(itemdata.idItemData > 0)
    icount = isearch.count() 
    current = startDate
    rand_list = []
    for i in range (1,50):
        sid = ''.join([choice(ascii_lowercase + digits) for i in range(32)])
        sid = sid[:8] + '-' + sid[8:12] + '-' + sid[12:16] + '-' + sid[16:20] + '-' + sid[20:32]
        ip = ''.join([choice(digits) for i in range(12)])
        ip = ip[:3] + '.' + ip[3:6] + '.' + ip[6:9] + '.' + ip[9:12]
        ip = ip.replace('.00','.')
        ip = ip.replace('.0','.')
        ip = ip.lstrip('0')
        browser_list = ['Chrome', 'IE/Edge', 'Firefox', 'Safari', 'Opera']
        browser = browser_list[randrange(5)]
        current = startDate - datetime.timedelta(days=randrange(14))

        for j in range(1, randrange(20)):
            current = current + datetime.timedelta(hours = randrange(2), minutes=randrange(60), seconds=randrange(60))
            currentp = current.strftime("%I:%M%p on %B %d, %Y")

            #url_link
            link_pref = 'http://localhost:5000/'
            link_type = randrange(1,4)
            if link_type == 1:  #random L2
                lrand = randrange(0, l2count)
                llink = l2search[lrand].menu_id
                link_pref += 'L2/' + str(llink) + '/'
            if link_type == 2:  #random L4
                lrand = randrange(0, l4count)
                llink = l4search[lrand].menu_id
                mrand = randrange(0, mcount)
                mlink = msearch[mrand].keywords
                link_pref += 'L4/' + str(llink) + '/?keyword=' + mlink
            if link_type == 3:  #random vendor
                vrand = randrange(0, vcount)
                llink = vsearch[vrand].vendor_id
                irand = randrange(0, icount)
                ilink = isearch[irand].idItemData
                link_pref += 'vendor/' + str(llink) + '/1/?ref=' + str(ilink)

            #ref_link
            ref_pref = 'http://localhost:5000/'
            link_type = randrange(1,4)
            if link_type == 1:  #random L2
                lrand = randrange(0, l2count)
                llink = l2search[lrand].menu_id
                ref_pref += 'L2/' + str(llink) + '/'
            if link_type == 2:  #random L4
                lrand = randrange(0, l4count)
                llink = l4search[lrand].menu_id
                mrand = randrange(0, mcount)
                mlink = msearch[mrand].keywords
                ref_pref += 'L4/' + str(llink) + '/?keyword=' + mlink
            if link_type == 3:  #random vendor
                vrand = randrange(0, vcount)
                llink = vsearch[vrand].vendor_id
                irand = randrange(0, icount)
                ilink = isearch[irand].idItemData
                ref_pref += 'vendor/' + str(llink) + '/1/?ref=' + str(ilink)
            rand_list.append([sid, ip,currentp,link_pref,ref_pref,browser])
            ana_entry = analytics(sid=sid,ip=ip,timestamp=current,url=link_pref,referer=ref_pref,browser=browser)
            db.session.add(ana_entry)
    db.session.commit()
    
    return render_template('dummy.html', rand_list = rand_list, user=current_user)
