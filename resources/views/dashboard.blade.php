<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
<div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
    <h1 class="text-2xl font-bold mb-6 text-center text-gray-800">Panel Principal</h1>
    <!-- Botón para ir a la vista empleado -->
    <a href="{{ url('/empleado') }}"
       class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">
        Empleado
    </a>
    <a href="{{ url('/nominas') }}"
       class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">
        Gestion de nomina
    </a>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit"
                class="w-full flex justify-center py-2 px-4 border border-t-blue-700 rounded-md shadow-sm text-sm font-medium text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
            Cerrar Sesión
        </button>
    </form>
</div>
</body>
</html>
