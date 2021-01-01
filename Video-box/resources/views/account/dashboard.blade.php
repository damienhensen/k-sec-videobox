@extends('./templates/account')

@section('username')
    NAAM-VERSLAGGEVER
@endsection

@section('content')
<div class="loop">

    @foreach($reports as $report)
    <div class="item">
        <div class="item-in">
            <video src="/{{$report->video}}"></video>
            <div class="bottom">
                <p class="title">{{$report->title}}</p>
                <a href="{{ route('reporter.videoEdit.view', ['video' => $report->id]) }}" class="edit">Edit</a>
            </div>
        </div>
    </div>
    @endforeach
    
    <div class="clear"></div>
</div>
@endsection
