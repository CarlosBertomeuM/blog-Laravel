<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titol')</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    @include('partials.nav')
    
    <div class="text-end pe-3 pt-2">
        <small>{{ fechaActual('d/m/Y') }}</small>
    </div>
    
    <div class="container">
        @yield('contingut')
    </div>
</body>
</html>