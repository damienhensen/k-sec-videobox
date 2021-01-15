@extends('layouts.app')

@section('content')
{{--<div class="container">--}}
    {{--<div class="row justify-content-center">--}}
        {{--<div class="col-md-8">--}}
            {{--<div class="card">--}}
                {{--<div class="card-header">{{ __('Dashboard') }}</div>--}}

                {{--<div class="card-body">--}}
                    {{--@if (session('status'))--}}
                        {{--<div class="alert alert-success" role="alert">--}}
                            {{--{{ session('status') }}--}}
                        {{--</div>--}}
                    {{--@endif--}}

                    {{--{{ __('You are logged in!') }}--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}

<div class="container home">
    <form id="search-form" action="{{ route('homepage') }}" method="GET" class="mb-3">
        @csrf
        <div class="input-group">
            <input type="text" class="form-control" id="search" name="search" placeholder="Zoeken&hellip;">
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit">Zoeken</button>
            </div>
        </div>
    </form>

    @if ($searched)
    <div class="mb-3">
        <a href="{{ route('homepage') }}">Home</a>
    </div>
    @endif

    <div class="results">
        @foreach ($reports as $report)
        <div class="p-1 card-wrapper">
            <a href="{{ route('report.single', ['report' => $report->id]) }}" class="card mx-auto">
                <video class="card-img-top" src="/{{$report->video}}"></video>
                <div class="card-body">
                    <h5 class="card-title text-center">{{$report->title}}</h5>
                </div>
            </a>
        </div>
        @endforeach
        <div class="clear"></div>
    </div>

    @if ($searched)
    <div class="mx-auto">
        {{ $reports->links() }}
    </div>
    @endif
</div>


<h1 style="text-align: center;">Welkom bezoekers</h1>
@endsection
