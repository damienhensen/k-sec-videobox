@extends('./templates/admin-account')

@section('content')
<h1>overzicht</h1>

<li><a href="{{ route('product.add') }}">Producten toevoegen</a></li>

<h2>Alle Users</h2>
@foreach ($userslist as $user)
    {{ $user->name }} <br>
@endforeach

@endsection
