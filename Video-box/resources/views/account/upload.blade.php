@extends('./templates/account')

@section('content')
<form action="{{ route('reporter.upload') }}" enctype="multipart/form-data" class="uploadVideoForm" method="POST">
    @csrf
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text">Upload</span>
        </div>
        <div class="custom-file">
            <input type="file" name="video" id="r_video" class="custom-file-input" required>
            <label class="custom-file-label" for="r_video">Kies een bestand</label>
        </div>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Titel</label>
        <input type="text" name="title" placeholder="Titel" class="form-control" required>
    </div>
    <button type="submit">Post</button>
</form>

<div class="alert alert-danger" style="@if ($errors->any()) display: block; @else display: none; @endif">
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