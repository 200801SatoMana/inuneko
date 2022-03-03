<form method="POST" action="{{route('image.store')}}" enctype="multipart/form-data">
    @csrf
    <input id="image" type="file" name="image">
    <button type="submit">投稿</button>
</form>
