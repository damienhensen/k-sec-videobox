@extends('./templates/admin-account')

@section('content')
<h2>{{$list->name}}</h2>

{{$list->name}} <br/>
{{$list->email}} <br/>
{{$list->type}} <br/>


<li><a href="{{ route('admin.overzicht') }}">terug naar overzicht</a></li>
@endsection
