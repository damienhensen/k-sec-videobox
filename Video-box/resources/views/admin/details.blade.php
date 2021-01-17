@extends('./templates/admin-account')

@section('content')
<h2>{{$list->name}}</h2>

{{$list->name}} <br/>
{{$list->email}} <br/>
{{$list->type}} <br/>


<li><a href="{{ route('admin.overzicht') }}">terug naar overzicht</a></li>
<form class="form-group pull-right" action="{{ route('userlist.destroy', ['id' => $list->id])}}" method="post">
    @method("DELETE")
    @csrf
    <button type="submit" onclick="return confirm('Are you sure?')" value="Delete" style="border: none"><i class="fa fa-trash" aria-hidden="true"></i></button>
   </form>
@endsection
