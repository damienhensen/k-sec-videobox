@extends('layouts.app')

@section('content')
<div class="container single">
    <form id="search-form" action="{{ route('homepage') }}" method="GET" class="mb-3">
        @csrf
        <div class="input-group">
            <input type="text" class="form-control" id="search" name="search" placeholder="Zoeken&hellip;">
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit">Zoeken</button>
            </div>
        </div>
    </form>

    <div class="card mx-auto">
        <video class="card-img-top" src="/{{$report->video}}" controls></video>
        <div class="card-body">
            <h5 class="card-title text-center">{{$report->title}}</h5>
        </div>
    </div>
</div>
@endsection
