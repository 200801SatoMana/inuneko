"""
　S3のバケットに画像が投稿されたのをトリガーに一番最初に動くファイル。

    〇lambda_handler()
    　メインの処理を行う。

    〇__setSession()
    　AWSのaccess_key_id,secret_access_key,regionを設定する。

    〇download_recent_file()
    　S3のバケット内の最新ファイルのパスを返す。
"""

import json
from boto3 import Session
import boto3
import analyse_image as analyse
import start_model as start
import stop_model as stop
import delete_inusta as delt

def lambda_handler(event, context):
    print("start")
    #start.main()        #モデル開始(時間かかるため手動で)
    session = __setSession__()
    photo = download_recent_file(session,"inusta","/test")
    label = analyse.main(photo)
    if label :
        print("柴")
    else :
        print("柴じゃない")
        delt.delete("inusta",photo)
    #stop.main()         #モデル停止
#end of lambda_function
    
    
    
    
def __setSession__():
    session =Session(
        aws_access_key_id ='AWS_ACCESS_KEY_ID',
        aws_secret_access_key ='AWS_SECRET_ACCESS_KEY',
        region_name = '開発に使用したリージョン'
    )
    return session
#end of __setSession()




def download_recent_file(
    session:Session,
    s3_bucket:str,
    s3_prefix:str
    ) ->None:
    
    s3 = session.resource('s3')
    bucket = s3.Bucket(s3_bucket)
    
    objs = bucket.meta.client.list_objects_v2(
        Bucket = bucket.name
    )
    
    loop_first_f = True
    for o in objs.get('Contents'):
        if loop_first_f:
            download_target_file = o.get('Key')
            modified_datetime_mid = o.get('LastModified')
            loop_first_f = False
        else :
            if modified_datetime_mid <= o.get('LastModified'):
                modified_datetime_mid =o.get('LastModified')
                download_target_file = o.get('Key')
    print(download_target_file)
    return  download_target_file
#end of download_recent_file

