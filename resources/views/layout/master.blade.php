<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8" />

    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link rel="stylesheet" href="{{ URL::to('assets/css/main.css') }}" />
    <script @yield('script')></script>
    <style>@yield('style')</style>
    <script @yield('script1')></script>
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
        <li><a href="{{ route('main.rule') }}">規則介紹</a></li>
        <li><a href="{{ route('main.video') }}">即時影片</a></li>
        <li><a href="{{ route('main.member') }}">研究成員</a></li>
    </ul>
</nav>

<!-- Banner -->
<section id="banner">
    <div class="inner">
        <div class="inner">
            <img src="images/logo.jpg" height="25%" width="25%" align="right" style="opacity:0.5">
        <h1>Eye of Intelligence</h1><br>

        <h1>開天眼</h1>
        </div>

    </div>

    <video autoplay loop muted playsinline src="images/car.mp4"></video>
</section>
<div class="container" style="padding-bottom: 50px;padding-top: 75px">
    @yield('content')
</div>
<footer id="footer" style="padding:0 0 0 0;">
   <div class="inner" style="padding-top: 1%">
        <div class="content" style="width: 100%;">
            <section style="width: 80%;">
                <h3>聯絡資訊</h3>
                <ul class="alt">
                    <li><b><font color="#FF0000">凱哥</font></b> &nbsp;高俊凱 &nbsp;&nbsp;&nbsp;手機：0981429828 &nbsp;&nbsp;&nbsp;信箱：405402091@gapp.fju.edu.tw</li>
                    <li><b><font color="#FF0000">蝴蝶</font></b> &nbsp;何俞樺 &nbsp;&nbsp;&nbsp;手機：0975762822 &nbsp;&nbsp;&nbsp;信箱：a0910020888@gmail.com</li>
                    <li><b><font color="#FF0000">助教</font></b> &nbsp;陳建軒 &nbsp;&nbsp;&nbsp;手機：0909982918 &nbsp;&nbsp;&nbsp;信箱：b02180202@gmail.com</li>
                    <li><b><font color="#FF0000">蔡媽</font></b> &nbsp;蔡依庭 &nbsp;&nbsp;&nbsp;手機：0909982859 &nbsp;&nbsp;&nbsp;信箱：tina604201510128@gmail.com</li>
                    <li><b><font color="#FF0000">Bobo</font></b> &nbsp;黃柏勳 &nbsp;&nbsp;&nbsp;手機：0905350342 &nbsp;&nbsp;&nbsp;信箱：nbx7777@gmail.com</li>
                    <li><b><font color="#FF0000">金魚</font></b> &nbsp;張沛心 &nbsp;&nbsp;&nbsp;手機：0937216113 &nbsp;&nbsp;&nbsp;信箱：sandy230207@gmail.com</li>
                    <li><b><font color="#FF0000">帥哥</font></b> &nbsp;郭鎮源 &nbsp;&nbsp;&nbsp;手機：0988955511 &nbsp;&nbsp;&nbsp;信箱：asdf024681029@gmail.com</li>
                </ul>
            </section>

        </div>
        <div class="copyright">

        </div>
    </div>
</footer>
<!-- Scripts -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/browser.min.js"></script>
<script src="assets/js/breakpoints.min.js"></script>
<script src="assets/js/util.js"></script>
<script src="assets/js/main.js"></script>
</body>
</html>
