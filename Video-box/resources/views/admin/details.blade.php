@extends('./templates/admin-account')

@section('content')
<h2>{{$list->name}}</h2>
<form class="form-group pull-right" action="{{ route('userlist.destroy', ['id' => $list->id])}}" method="post">
    @method("DELETE")
    @csrf
<table class="table table-condensed table-bordered">
    <tr>
        <th>name</th>
        <th>email</th>
        <th>type</th>
        <th>Delete?</th>
      </tr>
    <tr>
        <td>{{$list->name}} </td>
   
        <td>{{$list->email}} </td>
    
        <td>{{$list->type}} </td>

        {{-- <td>{{$report->video}} </td> --}}

        <td> <button type="submit" onclick="return confirm('Are you sure?')" value="Delete" style="border: none">Delete</button>
        </td>
    </tr>
</table>





   </form>

   <a href="{{ route('admin.overzicht') }}">terug naar overzicht</a>
   {{-- <form class="form-group pull-right" action="{{ route('userlist.destroy', ['id' => $report->id])}}" method="post">
    @method("DELETE")
    @csrf
<table class="table table-condensed table-bordered">
    <tr>
        <th>name</th>
        <th>email</th>
        <th>type</th>
        <th>Delete?</th>
      </tr>
    <tr>
        <td>{{$report->id}} </td>
   
        <td>{{$report->title}} </td>
    
        <td>{{$report->created_at}} </td>

        <td>{{$report->video}} </td>

        <td> <button type="submit" onclick="return confirm('Are you sure?')" value="Delete" style="border: none">Delete</button>
        </td>
    </tr>
</table>




<button href="{{ route('admin.overzicht') }}">terug naar overzicht</button>

   </form> --}}
@endsection
