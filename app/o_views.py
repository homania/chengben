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


@app.route('/booking_ui/', methods=['GET', 'POST'])
def booking_ui():
    form = SignupForm()
    #sumSessionCounter()
    #g.sid = session['counter']
    items = menutable.query.filter(menutable.tier >= 1, menutable.tier < 3) #always works    
    l1menu = menutable.query.filter(menutable.tier == 1).order_by(menutable.menu_order.asc())
    l2menu = menutable.query.filter(menutable.tier == 2).order_by(menutable.parent_id.asc(), menutable.menu_order.asc())
                
    return render_template("booking_ui.html", title='Home', l1menu=l1menu, l2menu=l2menu, user = current_user, form=form)
    #return render_template("page_jobs.html", title='Home', l1menu=l1menu, l2menu=l2menu, user = current_user, form=form)
