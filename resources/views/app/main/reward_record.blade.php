<!doctype html>
<html lang="en">
<head>
    <meta data-n-head="ssr" charset="utf-8">
    <meta data-n-head="ssr" name="viewport" content="width=device-width, initial-scale=1">
    <meta data-n-head="ssr" data-hid="description" name="description" content="{{env('APP_NAME')}} APP">
    <title>{{env('APP_NAME')}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="{{asset('public/reword.css')}}">
    <style>
        .reward-record-page-content-item {
            background: #fff;
            padding: 13px 15px !important;
            border-radius: 13px;
            margin: 7px 0;
        }
        .header.dark[data-v-3d11c917] {
            background: #fff;
            color: #1a1a1a;
            height: unset;
            padding: 15px 0;
        }
        .left[data-v-3d11c917] {
            left: 12px;
            top: 13px;
        }
    </style>
</head>
<body>
<?php
$rewordRecords = \App\Models\UserLedger::where('user_id', auth()->id())->where('reason', 'reword')->orderByDesc('id')->get();
$rewordRecordsTotalAmount = \App\Models\UserLedger::where('user_id', auth()->id())->where('reason', 'reword')->sum('amount');
?>
<div id="__nuxt">
    <div id="__layout">
        <div>
            <section data-v-5ac2b3c1="" class="reward-record-page flex flex-col">
                <div data-v-3d11c917="" data-v-5ac2b3c1=""
                     class="header-wrapper fixed w-full reward-record-page-header">
                    <header data-v-3d11c917="" class="header w-full relative flex items-center dark">
                        <div data-v-3d11c917="" class="left absolute" onclick="window.location.href='{{route('earning')}}'">
                            <svg data-v-3d11c917="" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                 viewBox="0 0 24 24" fill="none">
                                <path data-v-3d11c917=""
                                      d="M12.4888 15.9872C12.4888 15.9865 12.4903 15.9858 12.4903 15.9851C12.4846 15.9851 12.4839 15.9858 12.4888 15.9872ZM0.941297 13.007L8.30281 20.3685C8.93608 21.0018 9.96354 21.0018 10.5961 20.3685C11.2294 19.7367 11.2294 18.7092 10.5961 18.076L6.00247 13.4816H21.588C22.4836 13.4816 23.2092 12.7553 23.2092 11.8604C23.2092 10.9641 22.4828 10.2384 21.588 10.2384H6.00318L10.5968 5.64481C11.2301 5.01225 11.2301 3.98408 10.5968 3.35152C10.2802 3.03489 9.86482 2.87622 9.44946 2.87622C9.03481 2.87622 8.61945 3.03489 8.30352 3.35152L0.941297 10.7137C0.307328 11.347 0.307328 12.3731 0.941297 13.007Z"
                                      fill="currentColor"></path>
                            </svg>
                        </div>
                        <div data-v-3d11c917="" class="title bold flex-1">Reward Records</div>
                    </header>
                </div>
                <div data-v-5ac2b3c1="" class="rewardRecord flex items-center justify-between">
                    <span data-v-5ac2b3c1="" class="label">Reward Records:</span>
                    <span data-v-5ac2b3c1="" class="value">{{price($rewordRecordsTotalAmount)}}</span></div>

                <div data-v-5ac2b3c1="" class="reward-record-page-content flex-1">

                    @foreach($rewordRecords as $element)
                    <div data-v-5ac2b3c1="" class="reward-record-page-content-item flex">
                        <div data-v-5ac2b3c1="" class="flex flex-col flex-1">
                            <div data-v-5ac2b3c1="" class="flex items-center justify-between">
                                <div data-v-5ac2b3c1="" class="status" style="color: #00d18b;">{{$element->perticulation}}</div>
                                <div data-v-5ac2b3c1="" class="amount">{{price($element->amount)}}</div>
                            </div>
                            <div data-v-5ac2b3c1="" class="flex items-center justify-between"
                                 style="margin-top: 8px;"><span data-v-5ac2b3c1="" class="num">Received Time</span>
                                <span data-v-5ac2b3c1="" class="time">{{$element->created_at}}</span></div>
                        </div>
                    </div>
                    @endforeach
                    <div class="van-list__finished-text">No more data</div>
                    <div class="van-list__placeholder"></div>
                </div>
            </section>
        </div>
    </div>
</div>
</body>
</html>
