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
        <div class="wrapper" style="margin: 0 auto; width: 50%; height: 100%; background-color:white;font-family:'Courier New', Courier, monospace ">
            
                <div style="background-color: #f3be0e; height:70px;text-align: right;">
                    
                    <a href="{{url('/timeline/upload')}}">投稿</a>
                    <button action="{{url('/timeline/upload')}}" style="background-color:#836e53b2 ; color: white;margin:10px; border-radius: 10px; padding: 0.5rem;" >投稿</button>
                    
                </div>
            
                <div class="imgwrapper" style= "background-color:#f3e3b059;padding:2rem;  border-bottom: solid 5px #E6ECF0;"> 
                    <center>
                        
                    @foreach($images as $image)

                    <div>
                        <strong>{{ $image->name }}</strong> {{ $image->created_at }}
                    </div>
                    <div>
                        <img src="{{ $image->image }}" alt="image" style="width: 70%;margin:50px; height: auto; ;"/>
                    </div>
                @endforeach
                    </center>
                </div>

        </div>
        <script src="{{ mix('js/app.js') }}"></script>

    </body>
</html>