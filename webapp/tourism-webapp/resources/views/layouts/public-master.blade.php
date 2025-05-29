<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    {{-- csrf-token generator --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- <link rel="icon" href="{{ asset('assets/icon/denji_icon.png') }}" type="image/x-icon"> --}}
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/manual.css') }}">
    <link href="{{ asset('assets/bootstrap-icons/bootstrap-icons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/notyf/notyf.min.css') }}" rel="stylesheet">
    @yield('view_styles')
    <title>M J | @yield('view_title')</title>
</head>

<body>

    @yield('view_content')

    <script src="{{ asset('assets/jquery/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/scripts/utils.js') }}"></script>
    <script src="{{ asset('assets/notyf/notyf.min.js') }}"></script>
    @yield('view_scripts')
</body>
</html>
