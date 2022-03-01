<!DOCTYPE HTML>
<html lang="ja" style="height:100%;">
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>shibastagram</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet" type="text/css">
    </head>
    <body style="height:100%; background-color:#ccc);">
        <div class="wrapper" style="margin: 0 auto; width: 50%; height: 100%; background-color: white;">
            
                <div style="background-color: #c19a6b; text-align: center;">
                    
                    <button action="{{url('/timeline/post')}}" style="background-color:#786D5F ; color: white; border-radius: 10px; padding: 0.5rem;" >投稿</button>
                </div>
            
        

            <div class="tweet-wrapper"> <!-- この辺追加 -->
                @foreach($tweets as $tweet)
                <div style="padding:2rem; border-top: solid 1px: #ccc; border-bottom: solid 1px #ccc;">
                    <div>{{ $tweet->tweet }}</div>
                </div>
                @endforeach

            </div>
        </div>
        <script src="{{ mix('js/app.js') }}"></script>

    </body>
</html>