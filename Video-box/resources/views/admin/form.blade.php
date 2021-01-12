@extends('./templates/admin-account')

@section('content')
<style>
    .is-invalid{
        border: 1px solid red;
    }
    .error-message{
        margin: 5px 0;
        background: #ff0000;
        color: #ffffff;
        padding: 3px;
    }
</style>
<h1>Product toevoegen</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <p>Er zijn fouten, het form is niet opgeslagen!</p>
    </div>
@endif

<form action="{{ route('product.store') }}" method="POST">
@csrf 


<div class="form-group">
     <label for="">Title</label>
     <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title')}}" />
</div>
@error('title')
    <div class="error-message">
        {{ $message }}
    </div>
@enderror



<div class="form-group">
     <label for="">Omschrijving</label>
     <textarea class="form-control @error('title') is-invalid @enderror" name="description" >{{ old('description')}}</textarea>
</div>
@error('description')
    <div class="error-message">
        {{ $message }}
    </div>
@enderror


<div class="form-group">
     <label for="">Prijs</label>
     <input type="text" class="form-control @error('title') is-invalid @enderror" name="price" value="{{ old('price')}}" />
</div>
@error('price')
    <div class="error-message">
        {{ $message }}
    </div>
@enderror


<div class="form-group">
     <label for="">Date</label>
     <input type="date" class="form-control @error('title') is-invalid @enderror" name="pub_date" value="{{ old('pub_date')}}" />
</div>
@error('pub_date')
    <div class="error-message">
        {{ $message }}
    </div>
@enderror


<button type="submit" class="btn btn-primary">Opslaan</button>


</form>
@endsection
