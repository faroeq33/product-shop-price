<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @yield('head')
    @vite('resources/css/app.css')
</head>

<body class="h-screen">
    @yield('content')
</body>

@yield('scripts')

</html>