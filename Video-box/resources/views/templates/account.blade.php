<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VideoBox | @yield('username')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="content reporter">
        <div class="container">
            <div class="wrapper">
                @if($errors->any())
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                @endif

                <h1>U bent ingelogd als @yield('username')</h1>
        
                <div class="navigation">
                    <ul>
                        <li>
                            <a href="{{ route('reporter.upload')}}">Rapportage Uploaden</a>
                        </li>
                        <li>
                            <a href="{{ route('reporter.crud')}}">Rapportages Overzicht</a>
                        </li>
                        <li>
                            <a href="{{ route('reporter.edit')}}">Account instellingen</a>
                        </li>
                    </ul>
                </div>
        
                @section('content')
                @show
            </div>
        </div>
    </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>