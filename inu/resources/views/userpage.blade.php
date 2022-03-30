<!DOCTYPE html>
<html lang="ja">
<head><script src="https://kit.fontawesome.com/fbfa2fac5a.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="imgwrapper" style= "background-color:#f3e3b059;padding:2rem;  border-bottom: solid 5px #E6ECF0;">
   <center>
        <p>名前:{{ $myuser->name }}</p>
        <p>ID:{{ $myuser->userID }}</p>

        @if (Auth::id() != $myuser->id)

            @if (Auth::user()->is_follow($myuser->id))

                {!! Form::open(['route' => ['follows.unfollow', $myuser->id], 'method' => 'delete']) !!}
                <input button type="submit" value="フォロー中" style="background-color:rgb(248, 203, 183);">
                {!! Form::close() !!}
                <input button type="submit" value="DM" style="background-color:rgb(248, 231, 183);">

            @else
                {!! Form::open(['route' => ['follows.follow', $myuser->id]]) !!}
                <input button type="submit" value="フォローする" style="background-color:rgb(255, 255, 255);">
                {!! Form::close() !!}

            @endif

        @endif


        @if (Session::has('icon_pass'))
            <img src="{{ asset('/storage/top_file') }}/{{ session('icon_pass') }}" alt=""> 

        @elseif ($myuser->icon == "/images/dog_akitainu.png")
            <p><img src="{{ $myuser->icon }}" alt=""> </p>

        @else
            <p><img src="{{ asset('/storage/top_file') }}/{{ $myuser->icon }}" alt=""> </p>

        @endif


                
        
        <div>
            <a href="{{url('/timeline')}}">TL</a>
        </div>
   </center>


            
        
    </div>


</body>
</html>