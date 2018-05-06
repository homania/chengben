from flask import render_template, flash, redirect, session, url_for, request, g
from datetime import datetime
from app import app, db, models
from .models import User, itemdata, menutable
from config import ITEMS_PER_PAGE, WHOOSH_BASE
import flask.ext.whooshalchemy
import flask.ext.whooshalchemy as whooshalchemy

@app.route('/', defaults={'page': 1}, methods=['GET', 'POST'])
@app.route('/<int:page>', methods=['GET', 'POST'])
def index(page):
    user = {'nickname': 'Miguel'}  # fake user
    #items = itemdata.query.limit(1) #always works
    search = '*雞*'
    items = itemdata.query.whoosh_search(search).paginate(page, ITEMS_PER_PAGE).items
    #items = itemdata.query.paginate(page, ITEMS_PER_PAGE).items
    #items = itemdata.query.get(1)
    #items = itemdata.query.whoosh_search('Chicken').all()
    test = itemdata.query.whoosh_search(search).paginate(page, ITEMS_PER_PAGE)
    return render_template("index.html",
                           title='Home',
                           user=user,
                           items=items, test=test)
