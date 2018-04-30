<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Kutim | @yield('title')</title>

        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Favicon -->
        <link rel="shortcut icon" href="{{ asset('assets_frontend/images/favicon.png') }}" type="image/x-icon">
        <link rel="icon" href="{{ asset('assets_frontend/images/favicon.png') }}" type="image/x-icon">

        {{-- include style css --}}
        @include('includes.style')

    </head>

    <body>

        <!-- Preloader -->
        <div class="preloader"></div>
        <!-- End Pre-Loader -->

        {{-- include topbar --}}
        @include('includes.topbar')

        {{-- include menu --}}
        @include('includes.menu')

        {{-- content --}}
        @yield('content')

        {{-- include footer --}}
        @include('includes.footer')

        {{-- include script --}}
        @include('includes.script')

    </body>
</html>      
