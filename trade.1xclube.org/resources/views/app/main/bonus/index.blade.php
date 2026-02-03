@extends('app.layout.app')
@section('app_content')
    <div class="mypage-section">
        <div class="container">
            <link rel="stylesheet" href="{{asset('public/spin/spain.css')}}">
            <style>
                h1.l_wheel {
                    font-size: 26px;
                }
            </style>
            <style>
                #spin-container {
                    text-align: center;
                    background: linear-gradient(rgb(0 0 0 / 90%), rgb(0 0 0));
                }
                .activity_notice {
                    border: 1px solid #fff;
                    margin: 0 7px;
                    text-align: unset;
                    padding: 5px 12px;
                    background: #ffffff30;
                    margin-bottom: 20px;
                    border-radius: 5px;
                    box-shadow: 0 0 10px 4px #ffffff80;
                    margin: 15px;
                }
                .spin_code {
                    width: 92%;
                    padding: 15px 15px;
                    border: 1px solid #fff;
                    margin: auto;
                    margin-top: 12px;
                    background: #ffffff29;
                    border-radius: 5px;
                }
                button.spin_code_btn {
                    background: #000;
                    border: none;
                    padding: 10px 21px;
                    margin-top: 15px;
                    color: #fff;
                    font-size: 16px;
                    border-radius: 5px;
                    box-shadow: 0 0px 9px 2px #ffffff4a;
                }
                #spin_round {
                    transition: transform 0.25s linear;
                    width: 60px;
                    height: 60px;
                    border-radius: 50px;
                }

                #spinner {
                    width: 330px;
                    height: 330px;
                }
                div#spin {
                    width: 70px;
                    position: absolute;
                    z-index: 99;
                    left: 50%;
                    top: 40px;
                    transform: translate(-50%, -50%) rotate(180deg);
                    height: 70px;
                    text-align: center;
                    line-height: 70px;
                }
                input.spin_input::placeholder {
                    color: #8000106e;
                }
                input.spin_input {
                    border-radius: 7px;
                }
            </style>

            <div class="spin_banner"
                 style="background: linear-gradient(rgb(0 0 0 / 40%), rgb(0 0 0)), url(http://localhost/foonew/public/spin/image/s_banner.jpg) no-repeat;
      background-size: cover">
                <div class="spin_back">
                    <div style="display: flex;justify-content: space-between;">
                        <div onclick="window.location.href='{{route('dashboard')}}'"><i class="fa fa-chevron-left"></i></div>
                        <div></div>
                        <div style="margin-right: 15px"></div>
                    </div>
                </div>
                <div>
                    <h1 class="l_wheel">Gift Bonus</h1>
                </div>
            </div>
            <style>
                .hsbchsbchs {
                    background: #fff;
                    width: 90%;
                    margin: auto;
                    margin-top: 15px;
                    padding: 25px 0;
                    border-radius: 5px;
                    box-shadow: 0px 3px 18px #da231a;
                }
                input[type="text"] {
                    display: block;
                    width: 92%;
                    margin: auto;
                    padding: 15px 10px;
                    border: none;
                    background: #ff000029;
                    border-radius: 5px;

                }
                button {
                    border: none;
                    background: #ffffff;
                    color: #fff;
                    padding: 11px 53px;
                    font-size: 17px;
                    border-radius: 5px;
                    margin-top: 20px;
                }
                label {
                    text-align: left;
                    display: block;
                    margin-left: 14px;
                    margin-bottom: 9px;
                    font-weight: 600;
                }
                #spin-container {
                    margin-bottom: 0;
                }
            </style>
            <div id="spin-container">
                <div class="hsbchsbchs">
                    <label for="code">Bonus Code</label>
                    <input type="text" name="code" id="code" placeholder="Enter your bonus code">
                    <button type="button" onclick="checkin_bonus_submit()">Submit</button>
                </div>
            </div>
            <style>
                :host([direction="up"]), :host([direction="down"]) {
                    overflow: initial;
                    overflow-y: hidden;
                    white-space: initial;
                }

                :host {
                    display: inline-block;
                    overflow: hidden;
                    text-align: initial;
                    white-space: nowrap;
                }

                marquee {
                    background: #fff;
                    height: 237px;
                    width: 90%;
                    margin:auto;
                    border-radius: 5px;
                    margin-top: 37px;
                    padding: 0 16px;
                }
            </style>


            <div style="text-align: center;">
                <marquee behavior="scroll" direction="up">
                    @for($i=0;$i < 300;$i++)
                        <div class="single-purchase">
                            <div class="info" style="overflow: hidden">
                                <p style="width: 50%;float: left;color: #ffffff;">********</p>
                                <p style="width: 50%;float: left; text-align: right;color: #ffffff;">{{number_format(rand(7,50), 2)}}</p>
                            </div>
                        </div>
                    @endfor
                </marquee>
            </div>
            <meta name="csrf-token" content="{{ csrf_token() }}" />
        @include('alert-message')

        </div>
    </div>

    <meta name="csrf-token" content="{{csrf_token()}}">

    <script>
        function checkin_bonus_submit()
        {
            var URL = '{{route('user.submit-bonus')}}'
            var secret = document.querySelector('input[name="code"]').value;
            if (secret == ''){
                message('Secret code required');
                return true;
            }
            fetch(URL, {
                method: 'post',
                credentials: "same-origin",
                body:JSON.stringify({bonus_code:secret}),
                headers: {
                    "Content-Type": "application/json",
                    "Accept": "application/json",
                    "X-Requested-With": "XMLHttpRequest",
                    "X-CSRF-Token": document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
            }).then(function (response) {
                return response.json();
            }).then(function (res) {
                message(res.message)
                document.querySelector('input[name="code"]').value='';
            })
                .catch(function (error) {
                    console.log(error)
                });
        }

    </script>


    <script>
        var spinBtn = document.querySelector('#spin-btn')
        var spinArrow = document.querySelector('#spin_round')
        var spinerImage = document.getElementById('spinerImage');

        var goForSpan = '';

        let value = Math.ceil(Math.random() * 4000);

        function spinToWin() {
            spinerImage.style.transition = '5s';
            spinerImage.style.transform = 'rotate('+ value +'deg)';

            for (let i=0; i<value;i++){
                if (value >= 380){
                    value = value - 360
                }
            }

            /** Start Calculate Amount Using Rotate DEG**/
            var amount = 0
            if (value >= 0 && value <= 48){
                amount = '5'
            }else if(value >= 49 && value <= 96){
                amount = 'loss'
            }else if(value >= 97 && value <= 138){
                amount = "-10"
            }else if(value >= 139 && value <= 180){
                amount = 'thankyou'
            }else if(value >= 181 && value <= 220){
                amount = '10+'
            }else if(value >= 221 && value <= 262){
                amount = "star"
            }else if(value >= 263 && value <= 308){
                amount = '-3'
            }else if(value >= 309 && value <= 358){
                amount = 'winner'
            }else if(value >= 357 && value <= 380){
                amount = 'again'
            }
            /** End Calculate Amount **/
            /** Start Ajax Amount **/
            var data = {
                spin: amount
            }
            fetch('{{route('user.spin.amount.submit')}}',
                {
                    method:"POST",
                    body:JSON.stringify(data),
                    headers: {
                        'Content-type': 'application/json; charset=UTF-8',
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}})
                .then(response => response.json())
                .then(data => {
                    spinArrow.setAttribute('onclick', 'CHECK_SPIN_CODE()')

                    setTimeout(function (){
                        message(data.message);
                    }, 5000);
                }).catch();
        }

        function CHECK_SPIN_CODE()
        {
            message('Get Permission')
        }

        let userBalance = '{{auth()->user()->commission_balance}}'

        function SUBMIT_SPIN_CODE()
        {
            var amount = document.querySelector('.spin_input');

            if (amount)
                goForSpan = amount.value;
            if (amount.value != '' && amount.value == 10){
                if (userBalance < amount.value){
                    message('Your balance too low.')
                    return true;
                }

                spinArrow.setAttribute('onclick', 'spinToWin()')
                document.querySelector('.spin_input').value = '';
            }else{
                message('Enter amount of 10')
            }
        }
    </script>
@endsection
