<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{env('APP_NAME')}}</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700;900&display=swap"
          rel="stylesheet">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="{{asset('public/v2')}}/assets/css/owl.carousel.css">
    <link rel="stylesheet" href="{{asset('public/v2')}}/assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="{{asset('public/v2')}}/assets/css/style.css">
    <link rel="stylesheet" href="{{asset('public/v2')}}/assets/css/v2.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="{{asset('public/v2')}}/developer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
    <style>
        .home-wrapper {
            background: #7777db;
        }
        section.miner-section {
            background: #e53700;
        }
        .menu-area {
            background: #ff0606;
        }
        body{
            background-image: #7777db;
        }
        .home-wrapper {
            background: transparent !important;
        }
        .header-area  img {
            filter: invert(1);
        }
        .slider-area {
            margin-top: 0;
        }
        .slider-area {
            height: 46vw;
        }
        section.miner-section {
            background: #40408f;
        }
        section.miner-section {
            margin-top: 6px;
        }
        .miner-end {
            width: 100%;
            display: unset;
            overflow: hidden;
        }
        .single-miner-end {
            width: 24%;
            float: left;
            margin-right: 1%;
            margin-top: 10px;
            padding: 10px 0;
            border-radius: 5px;
            background: #2e2e67;
        }
        .miner-end .single-miner-end p {
            font-size: 13px;
        }
        section.miner-section .miner-top {
            width: 100%;
        }
        .menu-area {
            background: #40408f;
        }
        .menu-area ul.menu li.menu-item span.menu-name {
            color: #fff;
        }
        .menu-area ul.menu li.menu-item span.menu-content span.menu-icon img {
            filter: sepia(1);
        }
    </style>
</head>

<body>
@yield('app_content')
@include('alert-message')
<div class="menu-area">
    <ul class="menu" style="margin: 0;">
        <li class="menu-item active">
            <a href="{{route('dashboard')}}">
                    <span class="menu-content">
                        <span class="menu-icon">
                            <img src="{{asset('public/v2')}}/assets/image/menu/home.png" alt="">
                            <img src="{{asset('public/v2')}}/assets/image/menu/home_cur.png" alt="" class="image-active">
                        </span>
                        <span class="menu-name">home</span>
                    </span>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{route('user.mining')}}">
                    <span class="menu-content">
                        <span class="menu-icon">
                            <img src="{{asset('public/v2')}}/assets/image/menu/invest.png" alt="">
                            <img src="{{asset('public/v2')}}/assets/image/menu/invest_cur.png" alt="" class="image-active">
                        </span>
                        <span class="menu-name">mining</span>
                    </span>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{route('user.team')}}">
                    <span class="menu-content">
                        <span class="menu-icon">
                            <img src="{{asset('public/v2')}}/assets/image/menu/team.png" alt="">
                            <img src="{{asset('public/v2')}}/assets/image/menu/team_cur.png" alt="" class="image-active">
                        </span>
                        <span class="menu-name">team</span>
                    </span>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{route('my.profile')}}">
                    <span class="menu-content">
                        <span class="menu-icon">
                            <img src="{{asset('public/v2')}}/assets/image/menu/me.png" alt="">
                            <img src="{{asset('public/v2')}}/assets/image/menu/me_cur.png" alt="" class="image-active">
                        </span>
                        <span class="menu-name">mine</span>
                    </span>
            </a>
        </li>
    </ul>
</div>

<!-- Scripts -->
<script src="{{asset('public/v2')}}/assets/js/jquery-3.7.1.min.js"></script>
<script src="{{asset('public/v2')}}/assets/js/owl.carousel.min.js"></script>
<script src="{{asset('public/v2')}}/assets/js/script.js"></script>
</body>

</html>
