<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="google" content="notranslate">
    <meta name="description" content="">
    <link rel="stylesheet" href="{{asset('public')}}/h5/assets/37EV4dkYCo2aa8fbf3.css">
    <title>{{env('APP_NAME')}}</title>
    <style>
        :root{
            --primary: #09c497;
        }
    </style>
    <link rel="stylesheet" href="{{asset('public')}}/h5/assets/DkDY3d9iBq4e418d51.css">
    <link rel="stylesheet" href="{{asset('public')}}/h5/assets/xNrjMIpshIcf1599ad.css">
    <link rel="stylesheet" href="{{asset('public')}}/h5/assets/p2FQ6oerIu7f8faf3d.css">
    <link rel="stylesheet" href="{{asset('public')}}/h5/assets/J6eb17oXMab2221d15.css">
    <style>
        .tab-bar-wrap .tab-bar {
            background: rgb(0, 0, 0);
        }
        #app {
            background: #222328;
        }
    </style>
</head>
<body class="">
@include('alert-message')
<div id="app" data-v-app="" class="a-t-1 no-1">
    <div class="van-config-provider">
        <div data-v-13c60ef2="" class="box-border min-h-full w-full pt-45px"><!---->
            <div data-v-be21edee="" data-v-13c60ef2="" class="navigation">
                <div data-v-be21edee="" class="navigation-content">
                    <div data-v-be21edee="" class="h-full flex cursor-pointer items-center justify-between">
                        <div data-v-be21edee="" onclick="window.location.href='{{route('my.profile')}}'" class="icon i-material-symbols-arrow-back-ios-new-rounded"></div>
                        <div data-v-be21edee="">Setup My Email</div>
                        <div data-v-be21edee="" class="opacity-0"> h</div>
                    </div>
                </div>
            </div>
            <div data-v-72258c4e="" class="change-pwd-wrap px-3">
                <div data-v-72258c4e="" class=":uno: container-form w-full rd-$radius">
                    <form data-v-72258c4e="" method="post" action="{{route('user.email.submit')}}" id="pas"> @csrf
                        <div data-v-72258c4e="" class="base-input is-password">
                            <div class="input-box">
                                <div class="input-left-slot"></div>
                                <input placeholder="Enter your name" name="name" class="w-full email" value="{{auth()->user()->name}}" type="text" required>
                            </div><!---->
                        </div>

                        <div data-v-72258c4e="" class="base-input is-password">
                            <div class="input-box">
                                <div class="input-left-slot"></div>
                                <input placeholder="Enter your email" name="email" class="w-full email" value="{{auth()->user()->email}}" type="email" required>
                            </div><!---->
                        </div>
                        <br>
                        <a data-v-72258c4e="" class=":uno: base-main-btn flex items-center justify-center" onclick="sd()">
                            <div class="base-main-btn-content"><!---->Confirm</div>
                        </a>
                    </form>
                </div>

                <p>Setup your email for alys notify your financial actions.</p>
                <p>Like Withdraw, Deposit, others commission you alys get notify message via email.</p>
            </div>
            @include('app.layout.menu')
        </div><!---->
    </div>
</div>

<script>
    function sd(){
        document.getElementById('pas').submit()
    }


</script>
</body>
</html>
