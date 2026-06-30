<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('adminlte3/dist/img/favbeko.png') }}" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>Beko 09 Workshop | @yield('title')</title>
    @include('layouts.style')
    @livewireStyles
</head>

<body class="hold-transition login-page">
    @yield('content')
    @include('layouts.script')
    @livewireScripts
</body>

</html>
