<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My Laravel App')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- Puedes agregar más enlaces a hojas de estilo o scripts aquí -->
</head>
<body>
    <header>
        <h1>Mi Aplicación Laravel</h1>
        <!-- Aquí puedes agregar un menú de navegación si es necesario -->
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>&copy; 2024 Mi Aplicación Laravel. Todos los derechos reservados.</p>
    </footer>

    <script src="{{ asset('js/app.js') }}"></script>
    <!-- Puedes agregar más scripts aquí -->
</body>
</html>
