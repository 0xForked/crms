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
        {{--Page Title--}}
        <title>@yield('title') | Laravel</title>
        {{-- Boostrap style v4.4.1 --}}
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
        {{-- Fontawesome Icon --}}
        <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.css') }}">
        {{-- stisla style --}}
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">
        {{-- custom style --}}
        <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
        {{-- custom style head specified field --}}
        @yield('custom-style')
        {{-- custom script on head specified page --}}
        @yield('custom-script-head')
    </head>
    <body>
        <x-admin.loading/>
        <div id="app">
            <div class="main-wrapper">
                <div class="navbar-bg"></div>
                <x-admin.toolbar/>
                <x-admin.sidebar/>
                <div class="main-content">
                    <section class="section">
                        <x-admin.breadcrumb/>
                        @yield('content')
                    </section>
                </div>
                <x-admin.footer/>
            </div>
        </div>
        @if((Request::segment(1) === 'articles') || (Request::segment(1) === 'projects'))
            {{-- Status Modal --}}
            <x-admin.status/>
        @endif
        {{-- Delete Modal --}}
        <x-admin.delete/>
        {{-- Logout Modal --}}
        <x-admin.logout/>
        {{-- custom inclide specified page --}}
        @yield('custom-include')
        {{-- Jquery v3.4.1 --}}
        <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
        {{-- Bootstrap Script v4.4.1 with popperjs --}}
        <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
        {{-- JS Module --}}
        <script src="{{ asset('assets/js/modules/jquery.nicescroll.min.js') }}"></script>
        <script src="{{ asset('assets/js/modules/jquery-ui.min.js') }}"></script>
        {{-- Stisla Asset --}}
        <script src="{{ asset('assets/js/stisla.js') }}"></script>
        {{--    --}}
        @if((Request::segment(1) === 'articles') || (Request::segment(1) === 'projects'))
            <script src="{{ asset('assets/js/modules/jquery.uploadPreview.min.js') }}"></script>
        @endif
        {{--    --}}
        <script src="{{ asset('assets/js/scripts.js') }}"></script>
        {{-- custom script global --}}
        <script src="{{ asset('assets/js/custom.js') }}"></script>
        {{-- custom script specified page --}}
        @yield('custom-script-body')
    </body>
</html>
