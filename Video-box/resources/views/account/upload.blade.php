@extends('./templates/account')

@section('username')
    NAAM-VERSLAGGEVER
@endsection

@section('content')
<form action="{{ route('reporter.upload') }}" enctype="multipart/form-data" class="uploadVideoForm" method="POST">
    @csrf
    <input type="file" name="video" id="r_video" required>
    <input type="text" name="title" placeholder="title" required>
    <button type="submit">Post</button>
</form>

<div class="alert alert-error" @if ($errors->any()) style="display: block;" @endif>
    <ul>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        @endif
    </ul>
</div>

@if (Session::has('success'))
   <div class="alert alert-success">{{ Session::get('success') }}</div>
@endif
@endsection