
<!DOCTYPE html>
<html lang="ja">
<head><script src="https://kit.fontawesome.com/fbfa2fac5a.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="imgwrapper" style= "background-color:#f3e3b059;padding:2rem;  border-bottom: solid 5px #E6ECF0;">
   <center>

<h3>名前:{{ $myuser->name }}</h3>
<h2>ID:{{ $myuser->userID }}</h2>

@if (Session::has('icon_pass'))
    <img src="{{ asset('/storage/top_file') }}/{{ session('icon_pass') }}" alt=""> 

@elseif ($myuser->icon == "/images/dog_akitainu.png")
    <p><img src="{{ $myuser->icon }}" alt=""> </p>

@else
    <p><img src="{{ asset('/storage/top_file') }}/{{ $myuser->icon }}" alt=""> </p>

@endif

<!-- マイページ変更画面 -->
<form action="/mypage" method="post" enctype='multipart/form-data'> 
    {{ csrf_field() }}
    <!-- 画像内容 -->
    <div>
        <h4>アイコン変更</h4>
        <input type="file" name="icon">
    </div>
    <input type="submit" value="変更する">
    <div>
        <a href="{{url('/timeline')}}">TL</a>
    </div>
</form>

</body>
</html>