<!doctype html>
<html lang="en">
<head>
    <meta data-n-head="ssr" charset="utf-8">
    <meta data-n-head="ssr" name="viewport" content="width=device-width, initial-scale=1">
    <meta data-n-head="ssr" data-hid="description" name="description" content="{{env('APP_NAME')}} APP">
    <title>{{env('APP_NAME')}}</title>
    <link rel="stylesheet" href="{{asset('public/balance.css')}}">
    <style>
        .balance-page[data-v-19a62ff1] {
            background: #eaeeff;
        }
    </style>
</head>
<body>
<div id="__nuxt">
    <div id="__layout">
        <div>
            <section data-v-19a62ff1="" class="balance-page flex flex-col">
                <div data-v-c8cd6cfa="" data-v-19a62ff1="" class="header-wrapper fixed w-full balance-page-header">
                    <header data-v-c8cd6cfa="" class="header w-full relative flex items-center dark">
                        <div data-v-c8cd6cfa="" class="left absolute" onclick="window.location.href='{{route('earning')}}'">
                            <svg data-v-c8cd6cfa="" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                 viewBox="0 0 24 24" fill="none">
                                <path data-v-c8cd6cfa=""
                                      d="M23 12C23 11.4477 22.5523 11 22 11L4.83 11L9.71 6.12C10.1017 5.72829 10.1006 5.09284 9.70749 4.70251C9.31635 4.31412 8.68476 4.31524 8.295 4.705L2.06667 10.9333C1.47756 11.5224 1.47756 12.4776 2.06667 13.0667L8.29468 19.2947C8.68422 19.6842 9.31578 19.6842 9.70532 19.2947C10.0946 18.9054 10.0949 18.2743 9.70595 17.8847L4.83 13L22 13C22.5523 13 23 12.5523 23 12Z"
                                      fill="currentColor"></path>
                            </svg>
                        </div>
                        <div data-v-c8cd6cfa="" class="title bold flex-1">Task Records</div>
                    </header>
                </div>
                <div data-v-19a62ff1="" class="accountBalance flex items-center justify-between"><span
                        data-v-19a62ff1="" class="label">Account Balance:</span> <span data-v-19a62ff1="" class="value">{{price(auth()->user()->balance)}}</span>
                </div>
                <div data-v-19a62ff1="" class="balance-page-content flex-1">
                    <div data-v-19a62ff1="">
                        <div data-v-19a62ff1="" class="van-pull-refresh">
                            <div class="van-pull-refresh__track" style="transition-duration: 300ms;">
                                <div class="van-pull-refresh__head"></div>
                                <div data-v-19a62ff1="" role="feed" class="van-list">
                                    @if(\App\Models\UserLedger::where('user_id', auth()->id())->where('reason', 'task')->orderByDesc('id')->count() > 0)
                                    @foreach(\App\Models\UserLedger::where('user_id', auth()->id())->where('reason', 'task')->orderByDesc('id')->get() as $element)
                                    <div data-v-19a62ff1="" class="balance-page-content-item flex justify-between">
                                        <div data-v-19a62ff1="" class="left">
                                            <div data-v-19a62ff1="" class="type bold">{{$element->perticulation}}</div>
                                            <div data-v-19a62ff1="" class="time">{{$element->created_at}}</div>
                                        </div>
                                        <div data-v-19a62ff1="" class="amount">{{price($element->amount)}}</div>
                                    </div>
                                    @endforeach
                                    @else
                                        <img style="width: 100%;" src="{{asset('public/not-found.png')}}" alt="">
                                    @endif
                                    <div class="van-list__placeholder"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
</body>
</html>
