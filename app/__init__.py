import os
from flask import Flask, request, render_template
from flask_sqlalchemy import SQLAlchemy
from config import basedir

app = Flask(__name__)
app.config.from_object('config')
db = SQLAlchemy(app)

#from app import models, views_admin
from app import views, models, o_views, task_view, writing_view, ext_view
