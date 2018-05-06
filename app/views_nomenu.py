from flask import render_template, flash, redirect, session, url_for, request, g
from flask.ext.login import login_user, logout_user, current_user, login_required
from datetime import datetime
from app import app, db, models
#from .models_noindex import User, itemdata, menutable, vendortable, analytics
from .models import User, itemdata, menutable, vendortable, analytics
from config import ITEMS_PER_PAGE, WHOOSH_BASE, SECRET_KEY
import flask.ext.whooshalchemy as whooshalchemy
import PIL, uuid, requests
from PIL import ImageFont, Image, ImageDraw

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
#    sumSessionCounter()
#    g.sid = session['counter']
    items = menutable.query.filter(menutable.tier >= 1, menutable.tier < 3) #always works    
    l1menu = menutable.query.filter(menutable.tier == 1).order_by(menutable.menu_order.asc())
    l2menu = menutable.query.filter(menutable.tier == 2).order_by(menutable.parent_id.asc(), menutable.menu_order.asc())
    
    return render_template("searchmain3.html",
                           title='Home',
                           l1menu=l1menu, l2menu=l2menu)

#@app.route('/L2/', defaults={'page': 1}, methods=['GET', 'POST'])
@app.route('/L2/<int:page>', methods=['GET', 'POST'])
def L2(page):
#    sumSessionCounter()
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
                           l1menu=l1menu, l2menu=l2menu, page=page)    

@app.route('/L4/<int:page>/', methods=['GET', 'POST'])
def L4(page):
#    sumSessionCounter()
    keyword = request.args.get('keyword')
    #items = itemdata.query.whoosh_search(keyword).paginate(1, ITEMS_PER_PAGE).items
    items = itemdata.query.whoosh_search(keyword).all() #whoosh_search all items with keywords
    count = len(items)  #items found
    admin = menutable.query.filter(menutable.menu_id == page).first() #item_id
    admin.sub_count = count
    db.session.add(admin)
    db.session.commit()
    test = itemdata.query.whoosh_search(keyword).paginate(1, ITEMS_PER_PAGE)
    brands = []
    for x in items:
            if x.brand not in brands:
                brands.append(x.brand)
    vendors = vendortable.query.all()
                
    ##test = itemdata.query.whoosh_search(keyword).all()
    return render_template("L4.html",
                           title='Menus', brands=brands,
                           items=items, test=test, count=count, page=page, admin=admin, vendors=vendors)

@app.route('/vendor/<int:vendorid>/<int:page>', methods=['GET', 'POST'])
def vendor(vendorid, page):
#    sumSessionCounter()
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
        #d.text((0, 0), admin.phone1, (85,85,85), font=font)
        #d.text((0, 0), admin.phone1, (85,85,85), font=font)
        phone1_link ='contact/' + str(vendorid)+ '_phone1.jpg'
        img.save('app/static/contact/' + str(vendorid)+ '_phone1.jpg')
        admin.phone1_img = phone1_link
        changes = 1
    if (admin.phone2_img == None) and (admin.phone2):
        img = Image.new('RGB', (170, 16), (255, 255, 255))
        d = ImageDraw.Draw(img)
        d.text((0, 0), admin.phone2, (85,85,85), font=font)
        #d.text((0, 0), admin.phone2, (85,85,85), font=font)
        #d.text((0, 0), admin.phone2, (85,85,85), font=font)
        phone2_link ='contact/' + str(vendorid)+ '_phone2.jpg'
        img.save('app/static/contact/' + str(vendorid)+ '_phone2.jpg')
        admin.phone2_img = phone2_link
        changes = 1
    if (admin.fax_img == None) and (admin.fax):
        img = Image.new('RGB', (170, 16), (255, 255, 255))
        d = ImageDraw.Draw(img)
        d.text((0, 0), admin.fax, (85,85,85), font=font)
        #d.text((0, 0), admin.fax, (85,85,85), font=font)
        #d.text((0, 0), admin.fax, (85,85,85), font=font)
        fax_link ='contact/' + str(vendorid)+ '_fax.jpg'
        img.save('app/static/contact/' + str(vendorid)+ '_fax.jpg')
        admin.fax_img = fax_link
        changes = 1
    if (admin.email_img == None) and (admin.email):
        img = Image.new('RGB', (170, 16), (255, 255, 255))
        d = ImageDraw.Draw(img)
        d.text((0, 0), admin.email, (85,85,85), font=font)
        #d.text((0, 0), admin.email, (85,85,85), font=font)
        #d.text((0, 0), admin.email, (85,85,85), font=font)
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
                           items=items, test=test, count=count, page=page, vendorid=vendorid, admin=admin, logo=logo)
