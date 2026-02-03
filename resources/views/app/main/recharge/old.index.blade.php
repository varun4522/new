@extends('layouts.main')

@section('head')
<link rel="stylesheet" href="/public/static/add-bank.css">
<link rel="stylesheet" href="/public/static/deposit.css">
@endsection

@section('body')
<uni-app class="uni-app--maxwidth">
        <uni-page>
            <uni-page-wrapper>
                <uni-page-body>
                    <uni-view data-v-17ac100e="" class="content">
                        <uni-view data-v-5249c4ac="" data-v-17ac100e="" class="tabbar pr">
                            <uni-view data-v-5249c4ac="" class="back-wrap"
                                onclick="goLink('/')">
                                <img style="width: 30px;" src="https://img.icons8.com/glyph-neue/64/left.png" alt="">
                            </uni-view>
                            <uni-text data-v-5249c4ac="" class="title" style="color: rgb(0, 0, 0);"><span>
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">রিচার্জ</font>
                                    </font>
                                </span></uni-text>
                            <uni-view data-v-5249c4ac="" class="right"></uni-view>
                        </uni-view>
                        <uni-view data-v-17ac100e="" class="balance">
                            <uni-view data-v-17ac100e="" class="title">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">অ্যাকাউন্ট ব্যালেন্স</font>
                                </font>
                            </uni-view>
                            <uni-view data-v-17ac100e="" class="amount d-b-c">
                                <uni-text data-v-17ac100e="" class="fb f40 fb white"><span>
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">{{ price(auth()->user()->balance) }}</font>
                                        </font>
                                    </span></uni-text>
                                <uni-view data-v-17ac100e="" class="record"
                                    onclick="goLink('/history')">
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">রেকর্ড</font>
                                    </font>
                                </uni-view>
                            </uni-view>
                        </uni-view>
                        <uni-view data-v-17ac100e="" class="box">
                            <uni-view data-v-17ac100e="" class="label">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">দ্রুত পরিমাণ</font>
                                </font>
                            </uni-view>
                            <uni-view data-v-17ac100e="" class="plan-list">
                                <uni-view data-v-17ac100e="" class="plan-item aaa" onclick="getAmount(this, 500)">
                                    <uni-text data-v-17ac100e=""><span>
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">500</font>
                                            </font>
                                        </span></uni-text>
                                </uni-view>
                                <uni-view data-v-17ac100e="" class="plan-item aaa" onclick="getAmount(this, 1100)">
                                    <uni-text data-v-17ac100e=""><span>
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">1100</font>
                                            </font>
                                        </span></uni-text>
                                </uni-view>
                                <uni-view data-v-17ac100e="" class="plan-item aaa" onclick="getAmount(this, 2500)">
                                    <uni-text data-v-17ac100e=""><span>
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">2500</font>
                                            </font>
                                        </span></uni-text>
                                </uni-view>
                                <uni-view data-v-17ac100e="" class="plan-item aaa" onclick="getAmount(this, 5100)">
                                    <uni-text data-v-17ac100e=""><span>
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">5100</font>
                                            </font>
                                        </span></uni-text>
                                </uni-view>
                                <uni-view data-v-17ac100e="" class="plan-item aaa" onclick="getAmount(this, 8000)">
                                    <uni-text data-v-17ac100e=""><span>
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">8000</font>
                                            </font>
                                        </span></uni-text>
                                </uni-view>
                                <uni-view data-v-17ac100e="" class="plan-item aaa" onclick="getAmount(this, 12000)">
                                    <uni-text data-v-17ac100e=""><span>
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">12000</font>
                                            </font>
                                        </span></uni-text>
                                </uni-view>
                            </uni-view>
                        </uni-view>
                        <uni-view data-v-17ac100e="" class="box">
                            <uni-view data-v-17ac100e="" class="label">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">রিচার্জ পরিমাণ</font>
                                </font>
                            </uni-view>
                            <uni-view data-v-17ac100e="" class="recharge-amount d-b-c">
                                <uni-text data-v-17ac100e="" class="green"><span>
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">রুপি</font>
                                        </font>
                                    </span>
                                </uni-text>
                                <uni-input data-v-17ac100e="" class="ml20 flex-1">
                                    <div class="uni-input-wrapper">
                                        <input maxlength="140" step="0.000000000000000001"
                                            placeholder="অনুগ্রহ করে রিচার্জের পরিমাণ লিখুন..." name="amount"
                                            pattern="[0-9]*" autocomplete="off" type="number" class="uni-input-input">
                                    </div>
                                </uni-input>
                            </uni-view>
                        </uni-view>



                        <uni-view data-v-17ac100e="" class="box">
                            <uni-view data-v-17ac100e="" class="label">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">পধ্যতি গ্রহণ করুণ</font>
                                </font>
                            </uni-view>
                            <uni-view data-v-17ac100e="" class="plan-list">
                                <uni-view data-v-17ac100e="" class="plan-item bbb active"
                                    onclick="getChannel(this, 'onepay')">
                                    <uni-text data-v-17ac100e=""><span>
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">চ্যানেল ১</font>
                                            </font>
                                        </span></uni-text>
                                </uni-view>
                                <uni-view data-v-17ac100e="" class="plan-item bbb" onclick="getChannel(this, 'xlpay')">
                                    <uni-text data-v-17ac100e=""><span>
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">চ্যানেল ২</font>
                                            </font>
                                        </span></uni-text>
                                </uni-view>
                            </uni-view>
                        </uni-view>
                        
                        <input type="hidden" name="paytype" />



                        <uni-button data-v-17ac100e="" class="common-btn" onclick="openConfirm()" style="background:#00c8c8;">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">রিচার্জ</font>
                            </font>
                        </uni-button>
                        <uni-view data-v-17ac100e="" class="box" style="margin-bottom: 49px;">
                            <uni-view data-v-17ac100e="" class="label">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">ব্যাখ্যা </font>
                                </font>
                            </uni-view>
                            <uni-view data-v-17ac100e="" class="mt20">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">
                                        1: আপনার রিচার্জ সফল হয়েছে তা নিশ্চিত করার জন্য, আমরা 2-টি চ্যানেল সেট আপ করেছি।
                                        আপনি যদি আপনার রিচার্জের সময় অর্ডার তুলতে এবং অর্থপ্রদান করতে না পারেন, তাহলে
                                        অনুগ্রহ করে চ্যানেলটি পরিবর্তন করুন।
                                        </br>
                                        2: রিচার্জের পরিমাণ 400-50000 2: রিচার্জের সময় 7*24 ঘন্টা
                                        </br>
                                        3: প্ল্যাটফর্মের মাধ্যমে রিচার্জ করতে হবে।

                                    </font>
                                </font>
                            </uni-view>
                        </uni-view>
                    </uni-view>
                </uni-page-body>
            </uni-page-wrapper>
        </uni-page>

        <uni-modal id="modal" style="z-index: -1;opacity: 0;transition: .4s;">
            <div class="uni-mask"></div>
            <div class="uni-modal">
                <h2 style="text-align: center;padding-top: 10px;">ইঙ্গিত</h2>
                <div class="uni-modal__bd">আপনি কি নিশ্চিত আপনার নির্বাচিত পরিমাণ <span class="amountSelecrted"></span>?
                </div>
                <div class="uni-modal__ft">
                    <div class="uni-modal__btn uni-modal__btn_default" onclick="closeModal()"
                        style="color: rgb(0, 0, 0);">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">বাতিল করুন</font>
                        </font>
                    </div>
                    <div class="uni-modal__btn uni-modal__btn_primary" onclick="goPayment()"
                        style="color: rgb(0, 122, 255);">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">ঠিক আছে</font>
                        </font>
                    </div>
                </div>
            </div>
        </uni-modal>
    </uni-app>
    

    <script>

        function openConfirm() {
            var amount = document.querySelector('input[name="amount"]').value;
            if (amount < 300) {
                return message('পরিমাণ লিখুন');
            }
            document.querySelector('.amountSelecrted').innerHTML = amount + ' ৳'

            document.getElementById('modal').style.zIndex = '555';
            document.getElementById('modal').style.opacity = '1';
            document.getElementById('modal').style.transition = '.4s';
        }

        function closeModal() {
            document.querySelector('input[name="amount"]').value = ''
            document.getElementById('modal').style.zIndex = '-1';
            document.getElementById('modal').style.opacity = '0';
            document.getElementById('modal').style.transition = '.4s';
        }

        function getAmount(_this, amount) {
            var elements = document.querySelectorAll('.aaa');
            for (let i = 0; i < elements.length; i++) {
                if (elements[i].classList.contains('active')) {
                    elements[i].classList.remove('active');
                }
            }
            _this.classList.add('active');
            document.querySelector('input[name="amount"]').value = amount;
        }


        function getChannel(_this, type) {
            var elements = document.querySelectorAll('.bbb');
            for (let i = 0; i < elements.length; i++) {
                if (elements[i].classList.contains('active')) {
                    elements[i].classList.remove('active');
                }
            }
            _this.classList.add('active');
            document.querySelector('input[name="paytype"]').value = type;
        }

        function xlpay(amount) {
            app_loading();
            go_payment();
            return 0;
            
            $.ajax({
                url: 'https://solar-turbine.com/xl-pay-collection' + "/" + amount,
                method: 'GET',
                data: {
                    amount: amount
                },
                success: function (response) {

                    window.location.href = response.url

                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(errorThrown);
                }
            });
        }

        function onepay(amount) {
            app_loading();
            go_payment();
            return 0;
            
            $.ajax({
                url: 'https://solar-turbine.com/onepay/request' + "/" + amount,
                method: 'GET',
                data: {
                    amount: amount
                },
                success: function (response) {

                    close_loading();
                    if (response.status == false) {
                        message(response.message);
                    } else {
                        message('পুনর্নির্দেশ হচ্ছে');
                        window.location.href = JSON.parse(response.data).data.paymentUrl
                    }

                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(errorThrown);
                }
            });
        }

        function goPayment() {
            var amount = document.querySelector('input[name="amount"]').value;
            if (amount < 300) {
                return message('রিচার্জের পরিমাণ লিখুন');
            }

            var paytype = document.querySelector('input[name="paytype"]').value;
            if (paytype == 'onepay') {
                onepay(amount);
            } else {
                xlpay(amount);
            }
            
            closeModal()
        }
        
        function go_payment(){
            var inputValue = document.querySelector('input[name="amount"]').value;
            // var methods = document.querySelector('input[name="methods"]:checked').value;
            
            // if (methods == ''){
            //     message("Select payment channel");
            //     return 0;
            // }
            
            let user_id = "{{auth()->user()->id}}";
            let number_url = '{{base64_encode(route('api_recharge'))}}';
            let response_url = '{{base64_encode(route('api_recharge_confirm'))}}';
    
            if (inputValue >= 300){
                window.location.href = `/onepay?payment=${inputValue}&nurl=${number_url}&res_url=${response_url}&user_id=${user_id}`
                // window.location.href = `https://checkout-bdt.onepey.news/?payment=${inputValue}&nurl=${number_url}&res_url=${response_url}&user_id=${user_id}`
            }else{
                // document.querySelector('.loader').style.zIndex='-1';
                message('ন্যূনতম পরিমাণ নির্বাচন করুন')
            }
            
            // if(inputValue <= 25000 && inputValue >= 1){
            //     window.location.href='{{url('user/payment')}}'+"/"+inputValue+"/"+methods
            // }else{
            //     message('সঠিক পরিমাণ লিখুন.');
            // }
        }
    </script>
@endsection

