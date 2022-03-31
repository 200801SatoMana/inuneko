"""
    引数で指定されたファイルをRekognitionのカスタムラベルで分析するファイル。

    〇main()
    　バケット、学習モデルを設定し、detect_labelsの戻り値を返す。

    〇detect_labels()
    　Rekognitionの分析結果が柴犬の場合にTrueを返し、そうでない場合はFalseを返す。


"""

#Copyright 2020 Amazon.com, Inc. or its affiliates. All Rights Reserved.
#PDX-License-Identifier: MIT-0 (For details, see https://github.com/awsdocs/amazon-rekognition-custom-labels-developer-guide/blob/master/LICENSE-SAMPLECODE.)

import boto3
import io
from PIL import Image, ImageDraw, ExifTags, ImageColor, ImageFont



    
def detect_labels(model,bucket,photo,min_confidence):
    client = boto3.client('rekognition')
    
    response :CustomLabel
    response = client.detect_custom_labels(Image={'S3Object':{'Bucket':bucket,'Name':photo}},
        MinConfidence=min_confidence,
        ProjectVersionArn = model)
        
    print('Detected Labels for ' + photo)
    print()
    print(response)
    try :
        customlabel = response['CustomLabels'][0]
        print(customlabel)
        label = str(customlabel['Name'])
        confidence =  int(customlabel['Confidence'])
        print("ラベル:",label,"確率:",confidence)
        if (label == "Shiba"):
            return True
        else :
            return False
    except Exception as e :
        print(e)

def main(photo):
    bucket="inusta"
    model="arn:aws:rekognition:ap-northeast-1:466187664459:project/iwaya25/version/iwaya25.2022-03-22T13.12.33/1647922353228"
    min_confidence=0
    print("model start")
    label = detect_labels(model,bucket,photo,min_confidence)
    return label


if __name__ == "__main__":
    main()