<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />
    <link rel="icon" href="{{ asset('adminlte3/dist/img/favbeko.png') }}" type="image/png">
    <title>Beko 09 Workshop | @yield('title')</title>

    @include('layouts.style')
    @livewireStyles
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

        @include('layouts.navbar')

        @include('layouts.sidebar')

        @yield('content')

        @include('layouts.footer')

    </div>
    <!-- ./wrapper -->

    @include('layouts.script')
    @livewireScripts
    @stack('scripts')

</body>

</html>
