<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, viewport-fit=cover" />
    <title>Earnig Record</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        html {
            height: 100%;
            font-size: calc(100vw/375 * 16);
        }
        
        .g-navigation {
            height: 2.75rem;
            --tw-text-opacity: 1;
            color: rgb(31 41 55/var(--tw-text-opacity));
            --tw-bg-opacity: 1;
            background-color: rgb(255 255 255/var(--tw-bg-opacity));
            font-weight: 600;
            position: sticky;
            top: 0;
            left: 0;
            right: 0;
            z-index: 10;
            text-transform: capitalize;
        }
    </style>
</head>

<body>
    <div id="app">
        <div>
            <header class="g-navigation grid grid-cols-12 overflow-hidden backdrop-blur bg-white/95 ">
                <div class="col-span-2 flex items-center justify-center">
                    <a href="/" class="px-2 py-1"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"
                            class="w-5 h-5 font-bold">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5"></path>
                        </svg></a>
                </div>
                <div class="col-span-8 flex items-center justify-center">
                    <div class="text-ellipsis overflow-hidden whitespace-nowrap">মানি রেকর্ড</div>
                </div>
                <div class="col-span-2 flex items-center justify-end pr-5 text-sm text-right font-medium"></div>
            </header>
            <div class="px-5 pt-5">
                <div class="g-load-more overflow-hidden min-h-40 ">
                @foreach(\App\Models\UserLedger::where('user_id', auth()->id())->whereNotIn('reason', ['payment_approved', 'withdraw_request', 'withdraw_approved', 'payment_rejected', 'user_deposit'])->orderByDesc('id')->get() as $element)
                    <div class="mb-4 flex items-center justify-between font-semibold">
                        <div>
                            <p>{{price($element->amount)}}</p>
                            <p class="mt-1 text-sm font-medium text-gray-500">{{$element->created_at}}</p>
                        </div>
                        <div class="text-blue-500">
                            {{$element->perticulation}}
                        </div>
                    </div>
                @endforeach
                </div>
                
            </div>
        </div>
        
    </div>
</body>

</html>
