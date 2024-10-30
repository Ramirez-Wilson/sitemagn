<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<header>
    <!-- Aquí podría ir tu navegación -->
</header>
<main>
    @yield('content') <!-- Este es el área que las vistas pueden llenar -->
</main>
<footer>
    <!-- Aquí podría ir el pie de página -->
</footer>
</body>
</html>
