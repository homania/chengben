from flask_wtf import Form
from wtforms import StringField, BooleanField, TextAreaField, IntegerField, \
     validators, TextField, DateField, SubmitField, PasswordField
from wtforms_components import TimeField
from wtforms.validators import DataRequired, Length, Email
from app.models import User

class SignupForm(Form):
    password = PasswordField('password', validators=[DataRequired()])
    email = TextField('email', [validators.optional()])
    submit = SubmitField("Sign In")

class MenuData(Form):
    menu_id = IntegerField('menu_id', [validators.optional()], filters=[lambda x: x or None])
    cat_name = TextField('cat_name', validators=[DataRequired()])
    tier = IntegerField('tier', validators=[DataRequired()])
    order = IntegerField('order', validators=[DataRequired()])
    parent = IntegerField('parent', validators=[DataRequired()])
    keyword = TextField('keyword', validators = [validators.optional(),
                                                   Length(max = 100)], filters=[lambda x: x or None])
    test = StringField('test', [validators.optional()])

class ItemEdit(Form):
    idItemData = IntegerField('idItemData', [validators.optional()])
    name = TextField('name', [validators.optional()])
    brand = TextField('brand', [validators.optional()])
    desc = TextField('desc', [validators.optional()])
    price = TextField('price', [validators.optional()])
    weight = TextField('weight', [validators.optional()])
    unit = TextField('unit', [validators.optional()])
    pack = TextField('pack', [validators.optional()])
    web_url = TextField('web_url', [validators.optional()])
    image_url = TextField('image_url', [validators.optional()])
    searchtags = TextField('searchtags', [validators.optional()])
    cat_type = TextField('cat_type', [validators.optional()])
    gen_cat = TextField('gen_cat', [validators.optional()])
    active= IntegerField('active', [validators.optional()])
    vendor= IntegerField('vendor', [validators.optional()])
    confirmed= IntegerField('confirmed', [validators.optional()])

class ReceiptEdit(Form):
    receipt_id = IntegerField('receipt_id', [validators.optional()])
    store_name = TextField('store_name', [validators.optional()])
    ref_id = TextField('ref_id', [validators.optional()])
    datef = TextField('datef', [validators.optional()])
    item_name = TextField('item_name', [validators.optional()])
    price = IntegerField('price', [validators.optional()])
    net_weight = IntegerField('net_weight', [validators.optional()])
    unit_weight = IntegerField('unit_weight', [validators.optional()])
    unit = TextField('unit', [validators.optional()])
    quantity = IntegerField('quantity', [validators.optional()])
    user_id = IntegerField('user_id', [validators.optional()])    

class BookingEdit(Form):
    booking_id = IntegerField('booking_id', [validators.optional()])
    name = TextField('name', [validators.optional()])
    phone = TextField('phone', [validators.optional()])
    seats = TextField('seats', [validators.optional()])
    datef = TextField('datef', [validators.optional()])
    timev = TimeField('timev', [validators.optional()])
    table = TextField('table', [validators.optional()])
    notes = TextField('notes', [validators.optional()])
    status = TextField('status', [validators.optional()])

class SchedEdit(Form):
    sched_id = IntegerField('sched_id', [validators.optional()])
    name = TextField('name', [validators.optional()])
    dept = TextField('dept', [validators.optional()])
    team = TextField('team', [validators.optional()])
    phone = TextField('phone', [validators.optional()])
    start_time = TextField('start_time', [validators.optional()])
    end_time = TextField('end_time', [validators.optional()])
    datef = TextField('datef', [validators.optional()])
    notes = TextField('notes', [validators.optional()])

class EditForm(Form):
    nickname = StringField('nickname', validators=[DataRequired()])
    about_me = TextAreaField('about_me', validators=[Length(min=0, max=140)])

    def __init__(self, original_nickname, *args, **kwargs):
        Form.__init__(self, *args, **kwargs)
        self.original_nickname = original_nickname

    def validate(self):
        if not Form.validate(self):
            return False
        if self.nickname.data == self.original_nickname:
            return True
        user = User.query.filter_by(nickname=self.nickname.data).first()
        if user != None:
            self.nickname.errors.append('This nickname is already in use. Please choose another one.')
            return False
        return True
    
class PostForm(Form):
    post = StringField('post', validators=[DataRequired()])
