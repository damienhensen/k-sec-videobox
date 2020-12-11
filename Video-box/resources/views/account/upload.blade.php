@extends('./templates/account')

@section('username')
    NAAM-VERSLAGGEVER
@endsection

@section('content')
<form action="" enctype="multipart/form-data">
    <input type="file" name="" id="r_video">
    <input type="text" placeholder="title">
    <input type="text" placeholder="tags">
    <button type="submit">Post</button>
</form>
@endsection