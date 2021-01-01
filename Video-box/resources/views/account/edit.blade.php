@extends('./templates/account')

@section('content')
<form class="account-edit" method="POST" id="form_id">
    @csrf
    <div class="form-group">
        <label for="name">Naam</label>
        <input type="text" class="form-control" placeholder="Naam" id="name" name="name" value="{{ $user->name }}">
        <small class="form-text text-muted">Verander je gebruikersnaam</small>
    </div>

    <div class="form-group">
        <label for="email">E-mail</label>
        <input type="email" class="form-control" placeholder="E-mail" id="email" name="email" value="{{ $user->email }}">
        <small class="form-text text-muted">Verander je e-mailaddress</small>
    </div>
    
    <div class="form-group">
        <label for="password">Wachtwoord</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Wachtwoord">
    </div>

    <div class="form-group">
        <label for="password2">Wachtwoord herhalen</label>
        <input type="password" class="form-control" id="password2" name="password_confirmation" placeholder="Wachtwoord">
    </div>

    <div class="form-check mb-2">
        <input type="checkbox" class="form-check-input" id="changePassword" name="passwordChange">
        <label class="form-check-label" for="changePassword">Wachtwoord veranderen?</label>
    </div>

    <button type="submit" name="submit">Save</button>
</form>

@if (Session::has('success'))
   <div class="alert alert-success mt-3">{{ Session::get('success') }}</div>
@endif

<div class="alert alert-danger mt-3" style="@if ($errors->any()) display: block; @else display: none; @endif">
    <ul>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        @endif
    </ul>
</div>
@endsection
