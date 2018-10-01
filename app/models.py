from hashlib import md5
from app import db
from app import app
from flask_sqlalchemy import SQLAlchemy

class User(db.Model):
    __table_args__ = {'extend_existing': True} #test field
    
    id = db.Column(db.Integer, primary_key=True)
    nickname = db.Column(db.String(64), index=True, unique=True)
    email = db.Column(db.String(120), index=True, unique=True)

    def __repr__(self):
        return '<User %r>' % (self.nickname)

class usersdb(db.Model):
    __tablename__ = 'usersdb'
    
    userid = db.Column(db.Integer, primary_key=True)
    name = db.Column(db.String(50))
    nickname = db.Column(db.String(50))
    password = db.Column(db.String(50))
    acct_type = db.Column(db.Integer)
    ch_name = db.Column(db.String(50))
    profilepic = db.Column(db.String(200))
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
    website = db.Column(db.String(100))
    create_date = db.Column(db.DateTime)
    last_update = db.Column(db.DateTime)
    active = db.Column(db.Integer)
    
    #def __init__(self, email, password):
    #    self.email = email
    #    self.password = password
    #def __repr__(self):
    #    return '<User %r>' % self.email
    def is_authenticated(self):
        return True
    def is_active(self):
        return True
    def is_anonymous(self):
        return False
    def get_id(self):
        return str(self.email)    

class itemdata(db.Model):
    __tablename__ = 'itemdata'
    __searchable__ = ['name', 'brand', 'searchtags', 'cat_type']
    
    idItemData = db.Column(db.Integer, primary_key=True)
    name = db.Column(db.String(50), index=True)
    brand = db.Column(db.String(50), index=True)
    desc = db.Column(db.String(500))
    price = db.Column(db.String(50))
    weight = db.Column(db.String(50))
    unit = db.Column(db.String(50))
    pack = db.Column(db.String(50))
    web_url = db.Column(db.String(200))
    image_url = db.Column(db.String(300))
    searchtags = db.Column(db.String(200), index=True)
    cat_type = db.Column(db.String(50), index=True)
    vendorcat = db.Column(db.String(50))
    gen_cat = db.Column(db.String(50))
    active = db.Column(db.Integer)
    vendor = db.Column(db.Integer, db.ForeignKey('vendortable.vendor_id'))
    confirmed = db.Column(db.Integer)
    match = db.Column(db.Integer)
    unmatched = db.Column(db.String(50))
    clicks = db.Column(db.Integer)
    create_date = db.Column(db.DateTime)
    last_update = db.Column(db.DateTime)    

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

#index_all(app)

class analytics(db.Model):
    __tablename__ = 'analytics'
    event_id = db.Column(db.Integer, primary_key=True)
    sid = db.Column(db.String(100))
    ip = db.Column(db.String(15))
    user_id = db.Column(db.Integer)
    timestamp = db.Column(db.DateTime)
    url = db.Column(db.String(200))
    referer = db.Column(db.String(200))
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

class dictionary(db.Model):
    __tablename_ = 'dictionary'
    dict_id = db.Column(db.Integer, primary_key=True)
    translation = db.Column(db.String(100))
    match_text = db.Column(db.String(45))
    keywords = db.Column(db.String(150))
    category = db.Column(db.String(45))

class linkcheck(db.Model):
    __tablename_ = 'linkcheck'
    idItemData = db.Column(db.Integer, primary_key=True)
    web_check = db.Column(db.Integer)
    image_check = db.Column(db.Integer)

class accounting(db.Model):
    __tablename_ = 'accounting'
    trans_id = db.Column(db.Integer, primary_key=True)
    trans_type = db.Column(db.String(50))
    vendor = db.Column(db.String(50))
    desc = db.Column(db.String(100))
    amount = db.Column(db.Integer)
    scheduled_date = db.Column(db.Date)
    trans_date = db.Column(db.Date)
    trans_person = db.Column(db.String(50))
    trans_method = db.Column(db.String(50))
    trans_receipt = db.Column(db.String(50))
    notes = db.Column(db.String(100))
    create_date = db.Column(db.DateTime)
    last_update = db.Column(db.DateTime)
    recur = db.Column(db.Integer)
    interval = db.Column(db.String(11))
    int_number = db.Column(db.Integer)
    userid = db.Column(db.Integer)

class receiptdb(db.Model):
    __tablename_ = 'receiptdb'
    receipt_id = db.Column(db.Integer, primary_key=True)
    store_name = db.Column(db.String(50))
    ref_id = db.Column(db.String(50))
    datef = db.Column(db.String(50))
    item_name = db.Column(db.String(50))
    price = db.Column(db.Integer)
    net_weight = db.Column(db.Integer)
    unit_weight = db.Column(db.Integer)
    unit = db.Column(db.String(50))
    quantity = db.Column(db.Integer)

class watchlistdb(db.Model):
    __tablename_ = 'watchlistdb'
    watch_id = db.Column(db.Integer, primary_key=True)
    user_id = db.Column(db.Integer)
    idItemData = db.Column(db.Integer)
    searchtags = db.Column(db.String(50))
    cat_type = db.Column(db.String(50))
    word_search = db.Column(db.String(50))
    create_date = db.Column(db.Date)
    last_viewed = db.Column(db.Date)
    orig_price = db.Column(db.Integer)
    
class tabledb(db.Model):
    __tablename_ = 'tabledb'
    booking_id = db.Column(db.Integer, primary_key=True)
    name = db.Column(db.String(50))
    phone = db.Column(db.String(50))
    seats = db.Column(db.String(50))
    start_date = db.Column(db.String(50))
    timev = db.Column(db.Time)
    table = db.Column(db.String(50))
    notes = db.Column(db.String(50))
    status = db.Column(db.String(50))
    result = db.Column(db.String(50))
    userid = db.Column(db.Integer)

class booking_tablenamesdb(db.Model):
    __tablename_ = 'booking_tablenamesdb'
    ctable_id = db.Column(db.Integer, primary_key=True)
    user_id = db.Column(db.Integer)
    tablename = db.Column(db.String(50))
    sort = db.Column(db.Integer)

class hr_sched_views(db.Model):
    __tablename_ = 'hr_sched_views'
    cview_id = db.Column(db.Integer, primary_key=True)
    user_id = db.Column(db.Integer)
    dayname = db.Column(db.String(50))
    visible = db.Column(db.Integer)
    color = db.Column(db.String(50))
    date_field = db.Column(db.String(50))

class hr_scheddb(db.Model):
    __tablename_ = 'hr_scheddb'
    sched_id = db.Column(db.Integer, primary_key=True)
    emp_id = db.Column(db.Integer)
    name = db.Column(db.String(50))
    dept = db.Column(db.String(50))
    team = db.Column(db.String(50))
    phone = db.Column(db.String(50))
    start_time = db.Column(db.Time)
    end_time = db.Column(db.Time)
    datef = db.Column(db.String(50))
    create_date = db.Column(db.Date)
    last_update = db.Column(db.Date)
    vendor_id = db.Column(db.Integer)
    notes = db.Column(db.String(50))

class chargedb(db.Model):
    __tablename__ = 'chargedb'
    charge_id = db.Column(db.Integer, primary_key=True)
    sid = db.Column(db.String(100))
    ip = db.Column(db.String(15))
    user_id = db.Column(db.Integer)
    vendor_id = db.Column(db.Integer)
    timestamp = db.Column(db.DateTime)
    rate = db.Column(db.Integer)
    trans_id = db.Column(db.Integer)

class ratesdb(db.Model):
    __tablename__ = 'ratesdb'
    rate_id = db.Column(db.Integer, primary_key=True)
    vendor_id = db.Column(db.Integer)
    vendor_name = db.Column(db.String(50))
    timestamp = db.Column(db.DateTime)
    rate = db.Column(db.String(50))
    acct_type = db.Column(db.String(50))

class taskdb(db.Model):
    __tablename__ = 'taskdb'
    taskid = db.Column(db.Integer, primary_key=True)
    userid = db.Column(db.Integer)
    entry_type = db.Column(db.String(50))
    category = db.Column(db.String(50))
    description = db.Column(db.String(500))
    timef = db.Column(db.Time)
    datef = db.Column(db.String(50))
    modified = db.Column(db.String(50))
    autosave = db.Column(db.Integer)
    scratchbox = db.Column(db.Text)

class writingdb(db.Model):
    __tablename__ = 'writingdb'
    writingid = db.Column(db.Integer, primary_key=True)
    tier = db.Column(db.Integer)
    order = db.Column(db.Integer)
    parent = db.Column(db.Integer)    
    title = db.Column(db.String(50))
    category = db.Column(db.String(50))
    searchtags = db.Column(db.String(50))
    content = db.Column(db.Text)
    datef = db.Column(db.String(50))
    timef = db.Column(db.Time)
    modified = db.Column(db.DateTime)    

class extenixdb(db.Model):
    __tablename__ = 'extenix'
    item_id = db.Column(db.Integer, primary_key=True)
    name = db.Column(db.String(50))
    description = db.Column(db.String(500))
    sm_img_link = db.Column(db.String(200))
    md_img_link = db.Column(db.String(200))
    lg_img_link = db.Column(db.String(200))
    img_link = db.Column(db.String(200))
    tags = db.Column(db.String(200))
    related_1 = db.Column(db.String(200))
    related_2 = db.Column(db.String(200))
    related_3 = db.Column(db.String(200))
    visible = db.Column(db.String(200))
