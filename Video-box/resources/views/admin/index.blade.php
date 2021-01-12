@extends('./templates/admin-account')

@section('content')



    <div class="bts-popup" role="alert">
        <div class="bts-popup-container">
            <img src="https://www.trend-transformations.com/wp-content/themes/trend-transformations/library/images/trend-logo-white.svg" alt="" width="50%" />
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                {{ __('You are logged in admin!') }}
            </div>
            <a href="#0" class="bts-popup-close img-replace">Close</a>
        </div>
    </div>

@endsection