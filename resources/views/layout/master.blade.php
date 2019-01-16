<!DOCTYPE HTML>
<html>
<head>
    <title>Eye of Intelligence</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link rel="stylesheet" href="{{ URL::to('assets/css/main.css') }}" />
</head>
<body class="is-preload">

<!-- Header -->
<header id="header">
    <a class="logo" href="/">Eye of Intelligence 開天眼</a>
    <!--<div align="left">
        <img src="images/logo.jpg" height="30%" width="5%" align="left">
    </div>-->
    <nav>
        <a href="#menu">Menu</a>
    </nav>
</header>
<nav id="menu">
    <ul class="links">
        <li><a href="{{ route('main.index') }}">首頁</a></li>
        <li><a href="{{ route('main.index') }}">即時影片</a></li>
        <li><a href="{{ route('main.index') }}">研究成員</a></li>
    </ul>
</nav>

<!-- Banner -->
<section id="banner">
    <div class="inner">
        <div class="inner">
            <img src="images/logo.jpg" height="25%" width="25%" align="right" >
        <h1>Eye of Intelligence</h1><br>

        <h1>開天眼</h1>
        </div>

    </div>

    <video autoplay loop muted playsinline src="images/car.mp4"></video>
</section>
<!-- Scripts -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/browser.min.js"></script>
<script src="assets/js/breakpoints.min.js"></script>
<script src="assets/js/util.js"></script>
<script src="assets/js/main.js"></script>
</body>
</html>
