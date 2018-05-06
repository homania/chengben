from hashlib import md5
from app import db
from app import app
import flask.ext.whooshalchemy as whooshalchemy
from flask_whooshalchemyplus import index_all

class User(db.Model):
    id = db.Column(db.Integer, primary_key=True)
    nickname = db.Column(db.String(64), unique=True)
    email = db.Column(db.String(120), unique=True)

    def __repr__(self):
        return '<User %r>' % (self.nickname)

class itemdata(db.Model):
    __tablename__ = 'itemdata'
    __searchable__ = ['name', 'brand', 'searchtags', 'cat_type', 'vendorcat', 'gen_cat']
    
    idItemData = db.Column(db.Integer, primary_key=True)
    name = db.Column(db.String(50))
    brand = db.Column(db.String(50))
    desc = db.Column(db.String(500))
    price = db.Column(db.String(50))
    weight = db.Column(db.String(50))
    unit = db.Column(db.String(50))
    pack = db.Column(db.String(50))
    web_url = db.Column(db.String(200))
    image_url = db.Column(db.String(300))
    searchtags = db.Column(db.String(100))
    cat_type = db.Column(db.String(50))
    vendorcat = db.Column(db.String(50))
    gen_cat = db.Column(db.String(50))
    active = db.Column(db.Integer)
    vendor = db.Column(db.Integer)

class menutable(db.Model):
    __tablename__ = 'menutable'
    menu_id = db.Column(db.Integer, primary_key =True)
    menu_name = db.Column(db.String(45))
    tier = db.Column(db.Integer)
    menu_order = db.Column(db.Integer)
    parent_id = db.Column(db.Integer, db.ForeignKey('menutable.menu_id'))
    sub_count = db.Column(db.Integer)
    clicks = db.Column(db.Integer)
    active = db.Column(db.Boolean)
    keyword = db.Column(db.String(45))

class vendortable(db.Model):
    __tablename__ = 'vendortable'
    
    vendor_id = db.Column(db.Integer, primary_key=True)
    name = db.Column(db.String(50))
    ch_name = db.Column(db.String(50))
    address = db.Column(db.String(50))
    district = db.Column(db.String(50))
    city = db.Column(db.String(50))
    country = db.Column(db.String(50))
    contact = db.Column(db.String(50))
    phone1 = db.Column(db.String(50))
    phone2 = db.Column(db.String(50))
    fax = db.Column(db.String(50))
    email = db.Column(db.String(50))
    BID = db.Column(db.Integer)
    logo_url = db.Column(db.String(200))
    website = db.Column(db.String(100))
    create_date = db.Column(db.DateTime)
    last_update = db.Column(db.DateTime)
    CPC = db.Column(db.Integer)
    active = db.Column(db.Boolean)
    phone1_img = db.Column(db.String(100))
    phone2_img = db.Column(db.String(100))
    fax_img = db.Column(db.String(100))
    email_img = db.Column(db.String(100))


index_all(app)
#whooshalchemy.whoosh_index(app, itemdata)

class analytics(db.Model):
    __tablename__ = 'analytics'
    event_id = db.Column(db.Integer, primary_key=True)
    sid = db.Column(db.String(100))
    ip = db.Column(db.String(15))
    user_id = db.Column(db.Integer)
    timestamp = db.Column(db.DateTime)
    url = db.Column(db.String(200))
    browser = db.Column(db.String(100))
    parsed = db.Column(db.Boolean)
    @property
    def is_authenticated(self):
        return True
    

   
class averagedb(db.Model):
    __tablename_ = 'averagedb'
    average_id = db.Column(db.Integer, primary_key=True)
    sid = db.Column(db.String(100))
    ip = db.Column(db.String(15))
    user_id = db.Column(db.Integer)
    clicks = db.Column(db.Integer)
    duration = db.Column(db.Integer)
    datevar = db.Column(db.DateTime)
    browser = db.Column(db.String(100))

class uniquedb(db.Model):
    __tablename_ = 'uniquedb'
    unique_id = db.Column(db.Integer, primary_key=True)
    sid = db.Column(db.String(100))
    ip = db.Column(db.String(15))
    user_id = db.Column(db.Integer)
    url = db.Column(db.String(150))
    date = db.Column(db.DateTime)
    chargeable = db.Column(db.Boolean)


