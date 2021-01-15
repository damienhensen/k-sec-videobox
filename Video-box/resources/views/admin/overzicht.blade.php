@extends('./templates/admin-account')

@section('content')
<h1>overzicht</h1>

<li><a href="{{ route('product.add') }}">Producten toevoegen</a></li>
<li><a href="{{ route('user.list') }}">users zien</a></li>
@endsection
