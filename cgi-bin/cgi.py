#!/usr/bin/python3

import os
import sys

# プロジェクトのパスを指定
sys.path.insert(0, '/home/xs888688/wakatake.info/public_html/wrs')

# Djangoの設定を指定
os.environ['DJANGO_SETTINGS_MODULE'] = 'my_project.settings'

# Djangoアプリケーションをインポート
from django.core.handlers.cgi import CGIHandler

# CGIハンドラを実行
application = CGIHandler()
application.run()
