"""
Rekognitionの判定が柴犬でなかったときに呼ばれるファイル。

〇delete()
　指定されたバケットの指定されたファイル名のオブジェクトを削除する
"""

import os
import boto3




def delete(
    bucket:str,
    photo) ->None:
        
        
    try:
        s3=boto3.client('s3')
        
        
        s3.delete_object(
            Bucket = bucket,
            Key = photo
        )
        
    except Exception as e:
        print(e)
        
    print("delete success")
    
    