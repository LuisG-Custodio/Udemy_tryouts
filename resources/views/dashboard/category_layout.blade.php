<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo')</title>
</head>
<body>
    @if(session('status'))
        {{session('status')}}
    @endif
    @yield('contenido')
</body>
</html>