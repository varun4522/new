<html lang="bn"
    style="--status-bar-height: 0px; --top-window-height: 0px; --window-left: 0px; --window-right: 0px; --window-margin: 0px; --window-top: calc(var(--top-window-height) + 0px); --window-bottom: calc(60px + env(safe-area-inset-bottom));"
    class="translated-ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title') Orion-apps</title>
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, viewport-fit=cover">
    <link rel="stylesheet" href="/public/static/index.2da1efab.css">
    <style type="text/css">
        @import url(https://fonts.font.im/css?family=Libre+Franklin:300,400,500,600,700,800,900);
    </style>

    <link rel="stylesheet" href="/public/static/style-1.css">
    <link rel="stylesheet" href="/public/static/style-2.css">
    <link rel="stylesheet" href="/public/static/style-3.css">
    <link rel="stylesheet" href="/public/static/style-4.css">
    <link rel="stylesheet" href="/public/static/style-5.css">
    <style>
        .d-b-c {
        
            gap: 10px;
        }
    </style>
    
    @yield('head')



    <style type="text/css">
        @import url(https://fonts.googleapis.com/css?family=Lohit+Bengali);
    </style>
    <style type="text/css">
        body {
            font-family: "Lohit Bengali", arial, sans-serif !important;
            background:#33a39c !important;
        }
    </style>
</head>
<body class="uni-body">
@yield('body')

<uni-toast data-duration="100000000" class="lo" style="display: none;">
    <div class="uni-toast"><i class="uni-icon_toast uni-loading"></i>
        <p class="uni-toast__content">লোড হচ্ছে...</p>
    </div>
</uni-toast>

<uni-toast class="msg" data-duration="2000" style="z-index: -1;opacity: 0;transition: .4s;">
    <div class="uni-sample-toast">
        <p class="uni-simple-toast__text msgText">
            Account is incorrect
        </p>
    </div>
</uni-toast>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@include('alert-message')
 
<script>
    function message(messageText = 'Data Loaded') {
        var msg = document.querySelector('.msg');
        var msgText = document.querySelector('.msgText');
        msg.style.opacity = '1';
        msg.style.zIndex = '9999';
        msg.style.transition = '.4s';
        msgText.innerHTML = messageText

        setInterval(function () {
            msg.style.opacity = '0';
            msg.style.zIndex = '-1';
            msg.style.transition = '.4s';
        }, 2000)
    }


    function goLink(link = '') {
        window.location.href = link;
    }


    function app_loading() {
        var lo = document.querySelector('.lo');
        lo.style.display = 'block'
    }


    function close_loading() {
        var lo = document.querySelector('.lo');
        lo.style.display = 'none'
    }


</script>   
</body>

</html>