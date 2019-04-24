<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8" />

    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link rel="stylesheet" href="{{ URL::to('bootstrap-4.3.1-dist/css/bootstrap.min.css') }}" />
    <style>@yield('style')</style>
</head>
<body>

@yield('content')

<!-- Scripts -->
<script src="{{ URL::to('bootstrap-4.3.1-dist/js/bootstrap.min.js') }}"></script>
<script @yield('script')></script>


</body>
</html>
