<!doctype html>
<html lang="en">
<head>
    <meta data-n-head="ssr" charset="utf-8">
    <meta data-n-head="ssr" name="viewport" content="width=device-width, initial-scale=1">
    <meta data-n-head="ssr" data-hid="description" name="description" content="{{env('APP_NAME')}} APP">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <title>{{env('APP_NAME')}}</title>
    <link rel="stylesheet" href="{{asset('public/password.css')}}">
</head>
<body>
<div id="__nuxt">
    <div id="__layout">
        @include('alert-message')
        <div>
            <section class="changePsw-page flex flex-col">
                <div data-v-3d11c917="" class="header-wrapper fixed w-full">
                    <header data-v-3d11c917="" class="header w-full relative flex items-center dark">
                        <div data-v-3d11c917="" class="left absolute" onclick="window.location.href='{{route('my.profile')}}'">
                            <svg data-v-3d11c917="" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                 viewBox="0 0 24 24" fill="none">
                                <path data-v-3d11c917=""
                                      d="M12.4888 15.9872C12.4888 15.9865 12.4903 15.9858 12.4903 15.9851C12.4846 15.9851 12.4839 15.9858 12.4888 15.9872ZM0.941297 13.007L8.30281 20.3685C8.93608 21.0018 9.96354 21.0018 10.5961 20.3685C11.2294 19.7367 11.2294 18.7092 10.5961 18.076L6.00247 13.4816H21.588C22.4836 13.4816 23.2092 12.7553 23.2092 11.8604C23.2092 10.9641 22.4828 10.2384 21.588 10.2384H6.00318L10.5968 5.64481C11.2301 5.01225 11.2301 3.98408 10.5968 3.35152C10.2802 3.03489 9.86482 2.87622 9.44946 2.87622C9.03481 2.87622 8.61945 3.03489 8.30352 3.35152L0.941297 10.7137C0.307328 11.347 0.307328 12.3731 0.941297 13.007Z"
                                      fill="currentColor">
                                </path>
                            </svg>
                        </div>
                        <div data-v-3d11c917="" class="title bold flex-1">Withdraw Password</div>
                    </header>
                </div>
                <form action="{{route('user.withdraw.password.submit')}}" method="post">@csrf
                    <div class="changePsw-page-content flex-1">
                        <div class="item">
                            <div data-v-002a3f5f="" class="input-container light">
                                <label data-v-002a3f5f="" for="password">Change Withdraw Password</label>
                                <div data-v-002a3f5f="" class="flex items-center input-content">
                                    <input data-v-002a3f5f="" autocomplete="off" id="password" type="password" name="password" placeholder="Password" class="input-field w-full hasSuff">
                                    <div data-v-002a3f5f="" class="suffix-icon" onclick="viewPassword('password')">
                                        <img data-v-002a3f5f="" src="{{asset('public')}}/_nuxt/img/EyeIcon.1bb8244.svg" alt="suffix Icon">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="changePsw-page-bottom fixed w-full">
                        <button data-v-3d9a385b="" type="submit" class="w-full button flex items-center justify-center relative button-primary default">Save</button>
                    </div>
                </form>
            </section>
        </div>
    </div>
</div>
<script>
    function viewPassword(elementName){
        let input = document.querySelector(`input[name=${elementName}]`);
        console.log(input)
        if (input.type == 'password'){
            input.type = 'type';
        }else {
            input.type = 'password';
        }
    }
</script>
</body>
</html>
