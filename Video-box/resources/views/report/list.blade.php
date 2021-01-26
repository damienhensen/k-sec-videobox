@extends ('./templates/admin-account')

@section('content')
<ul>

@foreach($reports as $report)
<li>
    {{ $report->video }}
</li>

@endforeach
</ul>
@endsection