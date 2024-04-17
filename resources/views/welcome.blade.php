<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome - TouristRent</title>
    <link rel="icon" href="{{ asset('images/logo_touristrent.jpg') }}" type="image/jpg">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<body>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center">
                <img src="{{ asset('images/logo_touristrent.jpg') }}" alt="Logo" class="img-fluid mb-4">
                <h1 class="mb-3">Tourist Rent</h1>
                <p class="lead">Plataforma interna per treballadors. Aquí podràs gestionar la base de dades de clients, apartaments i lloguers.</p>
                <a href="{{ route('login') }}" class="btn btn-primary">Iniciar sessió</a>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"type="text/js"></script>

</body>

</html>
