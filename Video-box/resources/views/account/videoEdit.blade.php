@extends('./templates/account')

@section('content')
<div class="edit-wrapper">
    <form action="{{ route('reporter.videoEdit', ['video' => $report->id]) }}" method="POST" class="editVideo">
        @csrf
        <input type="text" value="{{$report->title}}" name="title" required>

        <video src="/{{$report->video}}" controls autoplay muted loop></video>

        <button type="submit" name="submit" value="save">Opslaan</button>

        <button type="submit" name="submit" value="delete">Verwijderen</button>
    </form>
</div>
@endsection
