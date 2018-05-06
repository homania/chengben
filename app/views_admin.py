from flask import render_template, flash, redirect, session, url_for, request, g
from flask.ext.login import login_user, logout_user, current_user, login_required
from datetime import datetime
from app import app, db, models
from .models import User, itemdata, menutable, vendortable, analytics, averagedb, uniquedb
from config import ITEMS_PER_PAGE, WHOOSH_BASE, SECRET_KEY
import flask.ext.whooshalchemy as whooshalchemy
import PIL, uuid, requests, re
from PIL import ImageFont, Image, ImageDraw
from sqlalchemy import func, create_engine, distinct
from sqlalchemy.orm import sessionmaker

def sumSessionCounter(): #user tracking db.
    try:
        session['counter']
    except KeyError:
        session['counter'] = uuid.uuid1()
    sess = analytics(sid=session['counter'], ip=request.remote_addr, timestamp=datetime.utcnow(), url=request.url)
    db.session.add(sess)
    db.session.commit()

@app.route('/', defaults={'page': 1}, methods=['GET', 'POST'])
@app.route('/<int:page>', methods=['GET', 'POST'])
def index(page):
    engine = create_engine('mysql://root:sh030780@localhost/chengben')
    Sessions = sessionmaker(bind=engine)
    Sessions.configure(bind=engine)
    session = Sessions()
    test = session.query(func.count(analytics.sid), analytics.sid).group_by(analytics.sid).order_by(func.count(analytics.sid).desc()).all()
    itemsall = analytics.query.filter(analytics.parsed == None)
    for x in test: #avgdb start
        begin = None
        end = None
        datevar = datetime.today()
        change = 0
        for y in itemsall:
            if y.sid == x[1]:  #later if y.timestamp - current.time > 30 minutes, to ensure session is over. if not, change = 0
                change = 1
                sid = y.sid
                ip = y.ip
                user_id=y.user_id
                clicks=x[0]
                browser = y.browser
                #average = averagedb(sid=y.sid, ip=y.ip, user_id=y.user_id, clicks=x[0], browser=y.browser)
                if (begin == None) or (y.timestamp < begin):
                    begin = y.timestamp
                if (end == None) or (y.timestamp > end):
                    end = y.timestamp
        if change == 1:
            if (end != None) and (begin != None):
                dura = (end-begin).total_seconds()
            else:
                dura = 0
            average = averagedb(sid=sid, ip=ip, user_id=user_id, clicks=clicks, browser=browser, duration=dura, datevar=end)
            db.session.add(average)
            db.session.commit()    #avg.db_end

    for t in itemsall:   #parsed flag switcher
        t.parsed = 0
        db.session.add(t)
        db.session.commit()  

    unique = []
    for y in itemsall:
        if (y.sid, y.url) not in unique:
            stringvar = (y.sid, y.url)
            unique.append(stringvar)
            uni_db = uniquedb(sid=y.sid, ip=y.ip, user_id=y.user_id, url=y.url, date=y.timestamp)
            db.session.add(uni_db)
            db.session.commit()
            
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
    session.close()
    return render_template('metrics.html',
                           title='Metrics', test=test, test2=test2, L2=L2, L4=L4)

