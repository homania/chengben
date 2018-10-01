from flask import Flask, request, render_template, redirect, session, url_for, request, g, send_from_directory, jsonify, json, flash
from flask_sqlalchemy import SQLAlchemy
from datetime import datetime, date, timedelta
from app import app, db, models
from .models import extenixdb
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


@app.route('/extenix/', methods=['GET', 'POST'])
def extenix():
    return render_template("extenix/working.html")

@app.route('/extenix/products/', methods=['GET', 'POST'])
def products():
    items=extenixdb.query.filter(extenixdb.item_id >= 1, extenixdb.visible == 'Y').all()
    random.shuffle(items)
    return render_template("extenix/products.html", items=items)

@app.route('/ext_info/')
def ext_info():
    ref = request.args.get('itemid')
    iteminfo = extenixdb.query.filter(extenixdb.item_id == ref).first()
    rel1 = extenixdb.query.filter(extenixdb.item_id == iteminfo.related_1).first()
    rel2 = extenixdb.query.filter(extenixdb.item_id == iteminfo.related_2).first()
    rel3 = extenixdb.query.filter(extenixdb.item_id == iteminfo.related_3).first()
    return render_template("extenix/project.html", item=iteminfo, rel1=rel1,rel2=rel2,rel3=rel3)

@app.route('/extenix/services/', methods=['GET', 'POST'])
def ext_svcs():
    return render_template("extenix/services.html")

@app.route('/extenix/about/', methods=['GET', 'POST'])
def ext_about():
    return render_template("extenix/about.html")
