import os

WTF_CSRF_ENABLED = True
SECRET_KEY = os.urandom(24)

import os
basedir = os.path.abspath(os.path.dirname(__file__))

SQLALCHEMY_DATABASE_URI = 'mysql://root:sh030780@localhost/chengben'
SQLALCHEMY_MIGRATE_REPO = os.path.join(basedir, 'db_repository')
SQLALCHEMY_TRACK_MODIFICATIONS = True

# pagination
ITEMS_PER_PAGE = 21

WHOOSH_BASE = os.path.join(basedir, 'whoosh_index')
