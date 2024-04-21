<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>TouristRent</title>
        <link rel="icon" href="{{ asset('images/logo_touristrent.jpg') }}" type="image/jpg">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    </head>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="{{ url('dashboard') }}">TouristRent</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <form class="form-inline ml-auto" method="POST" action="{{ route('logout') }}">
                    @csrf
                    <div class="d-flex align-items-center">
                        <span class="navbar-text mr-3">
                            Hola, {{ Auth::user()->name }}
                        </span>
                        <button class="btn btn-outline-danger" type="submit">Logout</button>
                    </div>
                </form>
            </div>
        </nav>
    </header>
    <body>
        @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif
        <div class="container-fluid" >
        @yield('content')
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"type="text/js"></script>
    </body>
</html>