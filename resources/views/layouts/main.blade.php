<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="keywords" content="Laravel, Server, API, CMS, Blog">
        <meta name="author" content="A. A. Sumitro">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title') | Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Load Tailwind Css -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body>
        @yield('content')
    </body>
</html>
