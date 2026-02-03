<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, viewport-fit=cover" />
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
        
        .yGn3pxFHHcvQ1hyzqK_m {
            background-image: url('/public/img/11b90decc89dff37a993.png'),linear-gradient(0deg, #16a34a, #166534);
        }
        
        .g-button {
            height: 2.5rem;
            font-size: .875rem;
            font-weight: 600;
            line-height: 1.5rem;
            --tw-text-opacity: 1;
            color: rgb(255 255 255/var(--tw-text-opacity));
            text-transform: capitalize;
            border-radius: 2666.4vw;
        }
        
        .text-primary {
            --tw-text-opacity: 1;
            color: rgb(30 146 100/var(--tw-text-opacity));
        }
        
        .Mb61Dnsy9myfeB4iHzq3 {
            background-image: url('/public/img/701d5298d17f98dff730.png'),linear-gradient(90deg, #fece09, #e42e00);
        }
        
        .g-button-bg {
            background-image: linear-gradient(to bottom,var(--tw-gradient-stops));
            --tw-gradient-from: #017946 var(--tw-gradient-from-position);
            --tw-gradient-to: rgb(1 121 70 / 0) var(--tw-gradient-to-position);
            --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to);
            --tw-gradient-to: #0CAD49 var(--tw-gradient-to-position);
        }

    </style>
    
</head>

<body>
    <div>
        <header class="g-navigation grid grid-cols-12 overflow-hidden backdrop-blur bg-white/95 ">
            <div class="col-span-2 flex items-center justify-center">
                <a href="/" class="px-2 py-1"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"
                        class="w-5 h-5 font-bold">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5"></path>
                    </svg></a>
            </div>
            <div class="col-span-8 flex items-center justify-center">
                <div class="text-ellipsis overflow-hidden whitespace-nowrap">মানিব্যাগ</div>
            </div>
            <div class="col-span-2 flex items-center justify-end pr-5 text-sm text-right font-medium"></div>
        </header>
        <div class="px-5 py-2">
            <div class="yGn3pxFHHcvQ1hyzqK_m rounded-lg bg-cover p-3 flex justify-between text-white overflow-hidden">
                <div class="flex flex-col justify-around">
                    <h5 class="text-lg font-semibold">আমার ওয়ালেট</h5>
                    <p class="mt-4 mb-2 text-xss">ব্যালেন্স(BDT<!---->)</p>
                    <h3 class="text-3xl font-bold">{{ price(auth()->user()->balance) }}</h3>
                </div>
                <div class="flex flex-col justify-center"><button onclick="window.location.href='{{url('withdraw')}}'"
                        class="g-button flex items-center justify-center mb-4 min-w-24 px-3 h-9 text-xss text-white font-bold border-2">প্রত্যাহার
                        করুন</button><button onclick="window.location.href='{{url('user/recharge')}}'"
                        class="g-button flex items-center justify-center min-w-24 px-3 h-9 text-xss text-primary bg-white font-bold border">আমানত</button>
                </div>
            </div>
            <h5 class="mt-6 mb-3 font-semibold text-lg">অ্যাকাউন্ট লিঙ্ক করুন</h5><a href="/card"
                class="Mb61Dnsy9myfeB4iHzq3 block rounded-lg bg-no-repeat bg-center bg-cover text-white inactive"
                link="">
                <div class="flex py-6 flex-col items-center justify-center">
                    <div
                        class="w-11 h-11 bg-white rounded-full text-3xl text-primary font-bold flex items-center justify-center">
                        +</div>
                    <div class="mt-5 capitalize font-semibold">ব্যাংক অ্যাকাউন্ট</div>
                </div>
            </a>
            <div class="my-5 grid grid-cols-3 gap-3 text-xss text-white"><a href="{{route('deposit.record')}}"
                    class="p-3 rounded-lg g-button-bg inactive" link=""><img
                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAMAAABg3Am1AAABAlBMVEUAAAD////////////////+/v7////////+/v7////////////////////////////////////////////////////////////////////////////////+/v7////////////+/v7////////////////////////8/Pz////+/v7////////////+/v7////////+/v7////5+fn/10D/10D+/v7+/v7/////////////////////10D////39/f39/f4+Pj39/f////////678j678X85pL/10D/6pz/2ED/1kD/2kv/10H/////////10D4+Pj6+vr/2k7/43j84Ha7fqSVAAAAT3RSTlMAn9/9Hwx/v6gEZK9T0svDYBcImz8jExD39O/n45SLa0pEHNvXx6uPOCe2o4N3dFo7MCv+6bOHfG9QG+u7QDz36uPdNC/26ed/fHt3RD8GeDgRGQAAArZJREFUSMfdlFd7okAUho8MCIIi1th778bEkt62ly+Y5P//laUKZC+CN3ux79U8OC/D+c4Z6T+jm6SjiAGxo4QmkD1KUIAIHUEWYhILCs2wXDhdsvKQQhIvYU6koRQPsTmfnSVQ3FleEeo2m/9AiABItux1K4mPa5dHFbCMYC4FQ64ocogedJFIEaUSSDZDtnmNZDqtYkKhyWATRZXCk+aKhfZRw1QH6kQSp15lZoLVy6mS4Dix30jTX5z259QC8qZQAYrGo4YIoMxxDLiMChTgZAxIRMVLsmndkDAGk+InZLCMllEJZCc4YQ4G5JLqQMx55U0LTA58fP/9sHQQJT/LMub+QAcUZISZY/InTpHFwpNvltqL4KxAcn86nLRhaswTAFG+8LpeKeWdA3ro87y1cbBH3BMaCgPaSm2raY0cxTGxxQgseDL4rbOkJ/DUknttWGgkwQ5IQzdqYpdxt0fqICztdpw2NE3LUaVDFlX4L+yD900RdHl/G9GzFzX4s7hbYXMQUKhmDxnw7o0boMAZOFdL11E7CPUEUBrV5Eb2iU8fBIonjf1l+8BmQODpZp1gsMgKUMiPyqyC9BWmrmCnkn6Mb41MeKpwAUGEWdit7i+65x/fQ6xyxERiqrGe6DrzxYry7MITdlg7zy3aQ6P+W0MQvcbVSoBalbM5U0vF2qWUPXm8ORrGKvf57eXl9Zuv02lZKcKhS/ND2VNRM4f7y7PFd0+wJng+rUbGYsQIT/H/3QizT88Ov9wLVI29u7MdjFvO3ZPv9TdXOHdeoaLbCCqpBNj9SMpID7rBiyucuYdmGErSduEklR7uFkIG2K90k9XeJ7jwkw5MLo1ZKAAYE91cAWCMAXj1PslHa7eJXIkdLiEq/fqj9Za6JHLqaN386QrXFJKv9v4fFJrr87Oz82v6J/wB4R5/Eb+C2WQAAAAASUVORK5CYII="
                        class="w-6 h-6 object-contain" alt="img">
                    <h6 class="mt-2">আমানত রেকর্ড</h6>
                </a><a href="{{route('withdraw.record')}}" class="p-3 rounded-lg g-button-bg inactive" link=""><img
                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAMAAABg3Am1AAAAaVBMVEUAAAD/////////////////////////////////10D/10D/////////////////10D/////////////////////////////////10H/////////10D/10D/////////////////////10BLY6KoAAAAIXRSTlMAvz+ff99gII/rsw0Ip3NAL/nRhUvvxVQ/46t/eWs6GCQOWycPAAABLklEQVRIx93T2W6DMBRF0evLjM2YOW2Snvz/R9axYjcIY+AhqpT9CCyJgwV9TNtKzFZtX57Hov5EhRvNdkNFNgFaEEQAqLpWq0AMxKvABtisAjLP5QxYP7rlQK0HCAQSPrCLJ9t5QUKTJf8HftIDj5IBkMITB8A1wj4dtIdogxsQ0aAIRG8BLct1QIDnAYQDhwRRHGcWCPhALnILIpjYAn3LA0wGSIjskbJAFwSZ/T2XAtolF31mPA3OUANw6PBoMwAKZwdSnITOjSZ5ZeZ9J91o3Qkpueo+0VUOmGJkT1Alur4mTwbI1NR3yr3SsSyK8jgFMpi6i9vwdTd9TwDF3KPmjCxo7s+OfmBmti/nUFpQeoHLgcKC4k1g/Su50Y0HjJr5rGKUudw8Dq6hD+kXFwQvkiOfCLcAAAAASUVORK5CYII="
                        class="w-6 h-6 object-contain" alt="img">
                    <h6 class="mt-2">প্রত্যাহার রেকর্ড</h6>
                </a><a href="{{route('earning.record')}}" class="p-3 rounded-lg g-button-bg inactive" link=""><img
                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAMAAABg3Am1AAAAolBMVEUAAAD/////////////////////////////////////////////////10D/////////10D/////10D/////////////////////////////////////////////10D/////////////////////////////////////////////////////////////////////////////////////////10AR+IgCAAAANHRSTlMAf99gQNNKIPn1oNoK686+s34/K4Lr4nteOtelkop8RDMvEQjzxa9VKCQN762acmdjThu56g/TPQAAAXxJREFUSMft1NlygjAYhuEfkKrUrVoWwQXBfdd+3v+tFSKEBJRhhrNOnxMyv/OOJKD0NyioTEkCU63E5IFGlWi1AlvJzEnAp7mghcyUjXfOIr4glQ8sjfOJwo1zwtrZEyUzsxD0SBDqYJp8opYHG0ybMaoaaGiwa+VgjBU7rsoB2UvElNJAFu1g5y7fB/YlvpOzE4hRH2+D2F0H0LqyPRgxr90rDfowPi5ma8ROiVlty4ItVs8nIL5qZcEHvokowA897bSyd4kFX0TUQZ8kaqpqwNUK1ooiBTflpTUPIlJglP9rNBsRKdg2BBpgpOsmcVmg+iQZgZ33cNDtDobFgFTAC4rB7MHMxCC5Q0eH5eeD4SMhfMc8mj9NcRjlgkEaDMQPvHR5hrXn8wVgUzcNupRZWnw5wYSvb8D1deCB/4Y7x7EQw5duiRujR0XBASbJm+YMnIrBMd6CfKzc3oURkmwCqCFlD052d+GS7BPtBb3XsdqFQKcy+n9QI6jhF4u7U4KIkhh/AAAAAElFTkSuQmCC"
                        class="w-6 h-6 object-contain" alt="img">
                    <h6 class="mt-2">ব্যালেন্স বিল</h6>
                </a></div>
            <h5 class="mt-6 mb-3 font-semibold">প্রত্যাহার প্রমাণ</h5>
            <div class="rounded-lg px-5 py-3 bg-gray-100 min-h-40">
                <div class="g-load-more overflow-hidden min-h-40 ">
                    <div>
                        <div class="py-5 flex flex-col items-center justify-center"><img
                                src="/public/img/b9827da1e020d377ce07.png" class="h-32 object-contain" alt="img">
                            <p class="text-xss text-gray-300">এখনও কোন বিষয়বস্তু নেই</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>