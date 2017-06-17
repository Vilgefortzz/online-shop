<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Set icon image --}}
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/smoothproducts/smoothproducts.css') }}" rel="stylesheet">
    <link href="{{ asset('css/star-rating/star-rating.min.css') }}" media="all" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>

    <!-- jQuery -->
    <script src = "{{ asset('js/jquery/jquery.min.js') }}"></script>

</head>
<body>

{{-- Navigation bar --}}
@include('layouts.nav_bar')
{{-- Content --}}
@yield('content')
{{-- Footer --}}
@include('layouts.footer')

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
