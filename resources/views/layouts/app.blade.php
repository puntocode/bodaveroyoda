<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title', 'Boda Osval & Vero')</title>
        <!-- Fonts -->
        <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    </head>
    <body>
        <div id="app">
            @yield('content')
        </div>

        <script>
            window.asset = "{{ URL::asset('')  }}";
        </script>
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
