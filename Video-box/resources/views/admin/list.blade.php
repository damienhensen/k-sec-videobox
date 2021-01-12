@extends('./templates/admin-account')

@section('content')
<h1>list</h1>

<li><a href="{{ route('product.add') }}">Producten toevoegen</a></li>


<table class="table table-condensed table-bordered">
@foreach ($userlist as $list)
<tr>
    <td>
        {{ $list->name }}
    </td>
    <td>
        {{ $list->email }}
    </td>
    <td>
        {{ $list->type }}
    </td>
</tr>
    
@endforeach
</table>


@endsection
