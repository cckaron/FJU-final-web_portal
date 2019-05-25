<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8" />

    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- primary -->
    <link rel="stylesheet" href="{{ URL::to('assets/css/main.css') }}" />

    <!-- matrix admin-->
    <link rel="stylesheet" href="{{ URL::to('matrix/css/style.min.css') }}" />
    <link rel="stylesheet" href="{{ URL::to('matrix/css/select2.min.css') }}" />
    <style>@yield('style')</style>
    @yield('style2')
</head>
<body class="is-preload">

<!-- Header -->
<header id="header">
{{--    <img src="{{ URL::to('images/eye.png') }}" height="25px" width="25px">--}}
    <a class="logo" href="/"><span style="color:#FF8300">OVERLOOK &nbsp;&nbsp;堅守治道</span> </a>

    <nav>
        <a href="#menu">Menu</a>
    </nav>
</header>
<nav id="menu">
    <ul class="links">
        <li><a href="{{ route('main.index') }}">主控台</a></li>
        <li><a href="{{ route('main.rule') }}">規則介紹</a></li>
        <li><a href="{{ route('main.video') }}">即時影片</a></li>
        <li><a href="{{ route('main.member') }}">研究成員</a></li>
        <li><a href="{{ route('user.manage') }}">使用者管理</a></li>
        <li><a href="{{ route('auth.signOut') }}">登出</a></li>

    </ul>
</nav>

<!-- Banner -->
<section id="banner">
    <div class="inner">
        <div class="inner">
            <img src="{{ URL::to('images/logo.jpg') }}" height="25%" width="25%" align="right" style="opacity:0.5">
        <h1>Overlook</h1><br>
        <h1>監守治道</h1>
        </div>

    </div>

    <video autoplay loop muted playsinline src="{{ URL::to('images/car.mp4') }}"></video>
</section>

<div class="container-fluid">
    @yield('content')
</div>
<footer id="footer" style="padding:0 0 0 0;">
   <div class="inner" style="padding-top: 1%">
        <div class="content" style="width: 100%;">
            <section style="width: 80%;">
                <h3>聯絡資訊</h3>
                <ul class="alt">
                    <li><b><font color="#FF8300">凱哥</font></b> &nbsp;高俊凱 &nbsp;&nbsp;&nbsp;手機：0981-429-828 &nbsp;&nbsp;&nbsp;信箱：405402091@gapp.fju.edu.tw</li>
                    <li><b><font color="#FF8300">蝴蝶</font></b> &nbsp;何俞樺 &nbsp;&nbsp;&nbsp;手機：0975-762-822 &nbsp;&nbsp;&nbsp;信箱：a0910020888@gmail.com</li>
                    <li><b><font color="#FF8300">助教</font></b> &nbsp;陳建軒 &nbsp;&nbsp;&nbsp;手機：0909-982-918 &nbsp;&nbsp;&nbsp;信箱：b02180202@gmail.com</li>
                    <li><b><font color="#FF8300">蔡媽</font></b> &nbsp;蔡依庭 &nbsp;&nbsp;&nbsp;手機：0909-982-859 &nbsp;&nbsp;&nbsp;信箱：tina604201510128@gmail.com</li>
                    <li><b><font color="#FF8300">Bobo</font></b> &nbsp;黃柏勳 &nbsp;&nbsp;&nbsp;手機：0905-350-342 &nbsp;&nbsp;&nbsp;信箱：nbx7777@gmail.com</li>
                    <li><b><font color="#FF8300">金魚</font></b> &nbsp;張沛心 &nbsp;&nbsp;&nbsp;手機：0937-216-113 &nbsp;&nbsp;&nbsp;信箱：sandy230207@gmail.com</li>
                    <li><b><font color="#FF8300">帥哥</font></b> &nbsp;郭鎮源 &nbsp;&nbsp;&nbsp;手機：0988-955-511 &nbsp;&nbsp;&nbsp;信箱：asdf024681029@gmail.com</li>
                </ul>
            </section>

        </div>
        <div class="copyright">

        </div>
    </div>
</footer>
<!-- Scripts -->

<!-- primary -->
<script src="{{ URL::to('assets/js/jquery.min.js') }}"></script>
<script src="{{ URL::to('assets/js/browser.min.js') }}"></script>
<script src="{{ URL::to('assets/js/breakpoints.min.js') }}"></script>
<script src="{{ URL::to('assets/js/util.js') }}"></script>
<script src="{{ URL::to('assets/js/main.js') }}"></script>

<!-- matrix admin -->
<script src="{{ URL::to('matrix/js/popper.min.js') }}"></script>
<script src="{{ URL::to('matrix/js/jquery.min.js') }}"></script>
<script src="{{ URL::to('matrix/js/bootstrap.min.js') }}"></script>
<script src="{{ URL::to('matrix/js/perfect-scrollbar.jquery.min.js') }}"></script>
<script src="{{ URL::to('matrix/js/sparkline.js') }}"></script>
<script src="{{ URL::to('matrix/js/waves.js') }}"></script>
<script src="{{ URL::to('matrix/js/sidebarmenu.js') }}"></script>
<script src="{{ URL::to('matrix/js/custom.min.js') }}"></script>
<!--Select JS -->
<script src="{{ URL::to('matrix/js/select2.full.min.js') }}"></script>
<script src="{{ URL::to('matrix/js/select2.min.js') }}"></script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script @yield('script')></script>
@yield('script1')
</body>
</html>
