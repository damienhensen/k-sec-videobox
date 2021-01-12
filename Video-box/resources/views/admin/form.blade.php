@extends('./templates/admin-account')

@section('content')
<h1>Product toevoegen</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('product.store') }}" method="POST">
@csrf 
<div class="form-group">
     <label for="">Title</label>
     <input type="text" class="form-control" name="title" value="{{ old('title')}}"/>
</div>
<div class="form-group">
     <label for="">Omschrijving</label>
     <textarea class="form-control" name="description" >{{ old('description')}}</textarea>
</div>
<div class="form-group">
     <label for="">Prijs</label>
     <input type="text" class="form-control" name="price" value="{{ old('price')}}"/>
</div>
<div class="form-group">
     <label for="">Date</label>
     <input type="date" class="form-control" name="pub_date" value="{{ old('pub_date')}}"/>
</div>
<button type="submit" class="btn btn-primary">Opslaan</button>


</form>
@endsection
