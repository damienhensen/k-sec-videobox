@extends('./templates/account')

@section('content')
<h1 class="text-center pb-2">U bent ingelogd als {{ $user->name }}</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@foreach($reports as $report)
<div class="py-4">
    <div class="card mx-auto">
        <video class="card-img-top" src="/{{$report->video}}"></video>
        <div class="card-body">
            <h5 class="card-title">{{$report->title}}</h5>
            <a href="{{ route('reporter.videoEdit.view', ['video' => $report->id]) }}" class="edit">Edit</a>
        </div>
    </div>
</div>
@endforeach
@endsection
