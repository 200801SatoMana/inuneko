
<!DOCTYPE HTML>
<html lang="ja" style="height:100%;">
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>投稿作成</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet" type="text/css">
    </head>

    <body style="height:100%; background-color: #E6ECF0;">
        <div class="wrapper">
            <form action="/timeline/post" enctype="multipart/form-data" method="post">
                @csrf
                <input type="file" name="imafe_path" style="margin: 1rem; padding: 0 1rem; width: 70%; border-radius: 6px; border: 1px solid #ccc; height: 2.3rem;" placeholder="柴しか勝たん！">
                    <div style="background-color: #E8F4FA; text-align: center;">
                        <input type="submit" value="投稿"style="background-color: #2695E0; color: white; border-radius: 10px; padding: 0.5rem;">
                    </div>
                    <a href="{{url('/timeline')}}">もどる</a>
                    
                @if($errors->first('tweet')) <!-- 追加 -->
                    <p style="font-size: 0.7rem; color: red; padding: 0 2rem;">
                        ※{{$errors->first('tweet')}}
                    </p>
                @endif
                @foreach($tweets as $image_path)
                    <div>
                        <img src="{{ $image_path->image_path }}" alt="image_path" style="width: 30%; height: auto;"/>
                    </div>
                @endforeach
               

            </form>

        </div>
        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>