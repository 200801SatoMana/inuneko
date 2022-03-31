<!DOCTYPE HTML>
<html lang="ja" style="height:100%;">
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>shibastagram</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet" type="text/css">
    <script src="https://kit.fontawesome.com/fbfa2fac5a.js" crossorigin="anonymous"></script>
    </head>
    <body style="height:auto; background-color:#ccc);">
        <div class="wrapper" style="margin: 0 auto; width: 50%; height: 100%; background-color:white;font-family:'Courier New', Courier, monospace ">
            
                <div style="background-color: #f3be0e; height:70px;text-align: right;">
                    
                    <input type="button" onclick="location.href='/mypage'" value="&#xf007;" class="fas" style="background-color:#836e53b2 ; color: white;font-size: 40px;margin:10px;border-radius: 10px; padding: 0.5rem;">
                    
    
                    <input type="button" onclick="location.href='/timeline/upload'" value="投稿" style="background-color:#836e53b2 ; color: white;margin:10px; border-radius: 10px; padding: 0.5rem;" >
                    
                </div>
            
                <div class="imgwrapper" style= "background-color:#f3e3b059;padding:2rem;  border-bottom: solid 5px #E6ECF0;"> 
                    <center>
                        
                    @foreach($images as $image)
                
                    
                    <div style="font-size: 25px; color:rgb(119, 108, 90)">
                        <a href="/{{$image->uid}}"><strong>{{ $image->name }}</strong></a> {{ $image->created_at }}
                    </div>
                    <div>
                        <img src="{{ $image->image }}" alt="image" style="width: 30%;margin:50px; height: auto; ;"/>
                    </div>
                    <div style="font-size: 20px;color:rgb(119, 108, 90)">
                        {{$image->comment}}

                        
                            <!--フォームファサード使用-->
                            @if (Auth::user()->is_like($image->id))

                                {{ Form::open(['route' => ['likes.unlike', $image->id], 'method' => 'delete']) }}
                                    <button type="submit" class="btn" style="color:rgb(179, 144, 152); font-size:20px;border-radius: 10px; padding: 0.5rem;"><i class="fa-solid fa-paw"></i></button>
                                {{ Form::close() }}

                            @else

                                {{ Form::open(['route' => ['likes.like', $image->id]]) }}
                                <button type="submit" class="btn" style="color:rgb(58, 57, 57); font-size:20px;border-radius: 10px; padding: 0.5rem;"><i class="fa-solid fa-paw"></i></button>
                                {{ Form::close() }}

                            @endif

                        
                        
                        <hr style="height: 5px;
                        background: rgb(185, 177, 162);
                        border: none;">
                    </div>
                
                @endforeach
                    </center>
                </div>

        </div>
        <script src="{{ mix('js/app.js') }}"></script>

    </body>
</html>