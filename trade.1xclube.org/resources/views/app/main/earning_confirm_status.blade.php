@extends('app.layout.app')
@section('app_content')
    <link rel="stylesheet" href="{{asset('public/mining.css')}}">
    <style>
        .am_receiver {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 16px;
            background: #000;
            box-shadow: 0px 0px 5px #ffffff3b;
            border-radius: 5px;
            margin-top: 10px;
        }
    </style>
    <div class="container" style="text-align: center;">
        <div style="display: flex;justify-content: space-between;align-items: center;padding: 12px 10px">
            <div style="color: #ffffff;">Machine</div>
            <div style="color: #fff;"><img
                    onclick="window.location.href='{{route('hard.reload', $purchase->id)}}'"
                    style="width: 30px;height: 30px;" src="https://img.icons8.com/3d-fluency/94/refresh.png" alt=""></div>
        </div>

        <div class="circles-wrapper">
            <div class="circle circle-lg">
                <div class="circle circle-md">
                    <div class="circle circle-sm"></div>
                </div>
            </div>

            <div class="start" id="mining_start_btn">Running.</div>
        </div>

        <div class="am_receiver">
            <div id="amountTag" style="color: #ffffff;">{{price($receive_able_total_amount)}}</div>
            <div><a id="receive" onclick="earning()" href="javascript:void(0)" style="color: #ffffff;">Receiver</a></div>
        </div>
    </div>

    <div class="container">
        <div style="margin: 10px 0;">
            <div class="discount-offer" style="border-radius: 7px;">
                <div class="hot-img">
                    <img src="{{asset('public/v2')}}/img/hot.png" alt="">
                </div>
                <div class="discount-img">
                    <img src="{{asset($purchase->package->photo)}}" alt="">
                    <img src="{{asset('public/')}}/logo.png" alt="">
                </div>
            </div>

            <div class="cloud-comoputing">
                <h2>{{$purchase->package->name}}</h2>
                <h3>{{$purchase->package->title}}</h3>
                <div class="currency">
                    <p>daily
                        income {{price($purchase->package->commission_with_avg_amount / $purchase->package->validity)}}</p>
                    <p>valid Period: {{$purchase->package->validity}} days</p>
                    <p>Total revenue: {{price($purchase->package->commission_with_avg_amount)}}</p>
                    <p>Currency: BDT(৳)</p>
                </div>
            </div>

            <div class="rent">
                <h3>{{price($purchase->package->price)}}</h3>
                <button onclick="window.location.href='{{route('mining.status', $purchase->id)}}'">Machine</button>
            </div>
        </div>
    </div>

    <div style="height: 100px;"></div>

    <input type="hidden" name="csrf-token" value="{{csrf_token()}}">
        <script>
        function earning() {
            let receive = document.getElementById('receive');

            receive.innerText = 'Receiving...';
            var _token = document.querySelector('input[name="csrf-token"]').value;
            $.ajax({
                url: "{{route('user.receive')}}",
                type: "POST",
                data: {
                    amount: '{{$receive_able_total_amount}}',
                    _token: _token
                },
                success: function (response) {
                    receive.innerText = 'Received';
                    message(response.message)
                    document.getElementById('amountTag').innerText = response.amount;
                }, error: function (err) {
                    console.log(err);
                }
            });
        }
    </script>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
@endsection

