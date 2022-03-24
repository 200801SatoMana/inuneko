@if (Session::has('message'))
    <p>{{ session('message') }}</p>
@endif

<p>名前:{{ $myuser->name }}</p>
<p>ID:{{ $myuser->userID }}</p>

@if (Session::has('icon_pass'))
    <img src="{{ asset('/storage/top_file') }}/{{ session('icon_pass') }}" alt=""> 

@elseif ($myuser->icon == "/images/dog_akitainu.png")
    <p><img src="{{ $myuser->icon }}" alt=""> </p>

@else
    <p><img src="{{ asset('/storage/top_file') }}/{{ $myuser->icon }}" alt=""> </p>

@endif
<!DOCTYPE html>
<html lang="ja">
<body>
<!-- マイページ変更画面 -->
<form action="/mypage" method="post" enctype='multipart/form-data'> 
    {{ csrf_field() }}
    <!-- 画像内容 -->
    <div>
        <input type="file" name="icon">
    </div>
    <input type="submit" value="変更する">
    <div>
        <a href="{{url('/timeline')}}">TL</a>
    </div>
</form>

</body>
</html>