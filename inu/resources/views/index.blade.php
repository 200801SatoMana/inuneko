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

            <body style="height:auto; background-color:#ccc);">
                <div class="wrapper" style="margin: 0 auto; width: 50%; height: 100%; background-color:white;">
                    <div class=post style=background-color:#f3e3b059;>
                        <form method="POST" action="{{route('image.store')}}" enctype="multipart/form-data">
                            @csrf
                            <input id="image" type="file" name="image" style= margin:20px;>
                        
                            <button type="submit">投稿</button>
                            <a href="{{url('/timeline')}}">もどる</a>
                        </form>
                    </div>
                </div>
            </body>
</html>
