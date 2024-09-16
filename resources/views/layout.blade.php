<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title', config('app.name'))</title>

        @vite(['resources/assets/sass/main.scss', 'resources/js/app.js'])
    </head>
    <body>
    <div class="app">
        @yield('content')
    </div>
    </body>
</html>
