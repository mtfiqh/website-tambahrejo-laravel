<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Desa Tambahrejo - @yield('title')</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{ asset('/css/app.css') }}">

        {{-- if u want to use additional css --}}
        @yield('additional-css')
    </head>
    <body>
        @include('layouts.header')
        @yield('up-content')

        <div class="container">
            @yield('content')

        </div>
        @yield('bot-content')

        
        @include('layouts.footer')
        
        <script type="text/javascript" src="{{ asset('/js/app.js') }}"></script>
        {{-- if u want to use additional css --}}
        @yield('additional-js')
    </body>
</html>
