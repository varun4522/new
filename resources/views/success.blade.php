<!DOCTYPE html>
<html lang="en">
<head>
    <title>Payment Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css'>
    <link rel="stylesheet" href="{{asset('public')}}/assets/select2.min.css">
    <link rel="stylesheet" href="{{asset('public')}}/assets/style.css">
    <style>
        body{
                touch-action: manipulation;
            }
    </style>
</head>
<body>
     <header>
        <img src="/public/img/topbg.6b8f4100.png" style="height: 172px; width: 100%" />
    </header>
    
    <div style="margin-top: -125px; background: rgb(49, 51, 129); height: 100vh;" class="px-4">
        <div class="mb-4">
            <div class="d-flex align-items-center" style="gap: 5px;">
                <img src="/public/img/pixlogo.2432dd36.png" style="height: 28px; weight: 28px;" />
                <p class="mb-0 text-white" style="font-size: 21px;">ONEPAY</p>
            </div>
            
           
        </div>
        <div class="d-flex align-items-center justify-content-between">
            <div class="">
                <p class="mb-0" style="text-align:center;font-size: 30px; color: #fff;font-family: 'Gilroy-Heavy',sans-serif;font-weight: 700;">
                   {{$data['amount']}} TK
                </p>
            </div>
             <!--<h6 class="one_pay_timer text-white mb-0" style="font-size: 19px;" id="timer"></h6>-->
        </div>
        
        <div class="card mt-3" style="border-top-left-radius: 25px; border-top-right-radius: 25px;">
            <div class="" style="border-bottom: 2px solid rgb(240, 240, 242);">
                &nbsp;
            </div>
            <div class="p-3">
                <div class="text-center py-3">
                    <img src="/public/img/ing.4a4c95c1.gif"  style="height: 94px;" />
                </div>
                
                <div style="font-size: 13px; color: #b8b8b8;" class="mb-4 text-center">
                    অনুগ্রহপূর্বক অপেক্ষা করুন…
                </div>
                
                <div style="font-size: 13px; color: #b8b8b8;" class="mb-1"> <span class="text-danger">*</span>
                    OnePay শুধুমাত্র পেমেন্ট সংগ্রহ পরিষেবা প্রদান করে
                </div>
                
                <div style="font-size: 17px; font-weight: 700; color: #313381;">
                    পেমেন্ট তথ্য
                </div>
                
                <div class="mb-3 py-2 d-flex align-items-center justify-content-between" style="border-bottom: 2px solid rgb(240, 240, 242);">
                    <div style="font-size: 13px;color: #b8b8b8;">
                        নগদ হিসাব
                    </div>
                    <div style="font-size: 15px; color: #000; font-weight: 500;">
                        {{ $data['acc_acount'] }}
                    </div>
                </div>
                
                <div style="font-size: 17px; font-weight: 700; color: #313381;">
                    পরিশোধ রশীদ 
                </div>
                
                <div class="mb-3 py-2 d-flex align-items-center justify-content-between" style="border-bottom: 2px solid rgb(240, 240, 242);">
                    <div style="font-size: 13px;color: #b8b8b8;">
                        লেনদেন নাম্বার
                    </div>
                    <div style="font-size: 15px; color: #000; font-weight: 500;">
                        {{ $data['transaction_id'] }}
                    </div>
                </div>
                
            </div>
            
            <div style="width: 313px; height: 36px; margin-bottom: -36px; margin-left: -14px;">
                <div style="    background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAo4AAABMCAYAAADjsTZ2AAAAAXNSR0IArs4c6QAAB55JREFUeF7t3b2PZXMYB/DnR6EgaIhCLZGQbPwBXnY3FOIlKvESKiQiUekE0alEIaiIl6jESxRkd7F/gEhIJGqF0CAUCh732omszczuM/c5585Z+Uwzze858zuf8z0338zcc2dkZoYvAgQIECBAgAABAucQGIqjjBAgQIAAAQIECFQEFMeKkjUECBAgQIAAAQKhOAoBAQIECBAgQIBASUBxLDFZRIAAAQIECBAgoDjKAAECBAgQIECAQElAcSwxWUSAAAECBAgQIKA4ygABAgQIECBAgEBJQHEsMVlEgAABAgQIECCgOMoAAQIECBAgQIBASUBxLDFZRIAAAQIECBAgoDjKAAECBAgQIECAQElAcSwxWUSAAAECBAgQIKA4ygABAgQIECBAgEBJQHEsMVlEgAABAgQIECCgOMoAAQIECBAgQIBASUBxLDFZRIAAAQIECBAgoDjKAAECBAgQIECAQElAcSwxWUSAAAECBAgQIKA4ygABAgQIECBAgEBJQHEsMVlEgAABAgQIECCgOMoAAQIECBAgQIBASUBxLDFZRIAAAQIECBAgoDjKAAECBAgQIECAQElAcSwxWUSAAAECBAgQIKA4ygABAgQIECBAgEBJQHEsMVlEgAABAgQIECCgOMoAAQIECBAgQIBASUBxLDFZRIAAAQIECBAgoDjKAAECBAgQIECAQElAcSwxWUSAAAECBAgQIKA4ygABAgQIECBAgEBJQHEsMVlEgAABAgQIECCgOMoAAQIECBAgQIBASUBxLDFZRIAAAQIECBAgoDjKAAECBAgQIECAQElAcSwxWUSAAAECBAgQIKA4ygABAgQIECBAgEBJQHEsMVlEgAABAgQIECCgOMoAAQIECBAgQIBASUBxLDFZRIAAAQIECBAgoDjKAAECBAgQIECAQElAcSwxWUSAAAECBAgQIKA4ygABAgQIECBAgEBJQHEsMVlEgAABAgQIECCgOMoAAQIECBAgQIBASUBxLDFZRIAAAQIECBAgoDjKAAECBAgQIECAQElAcSwxWUSAAAECBAgQIKA4ygABAgQIECBAgEBJQHEsMVlEgAABAgQIECCgOMoAAQIECBAgQIBASUBxLDFZRIAAAQIECBAgoDjKAAECBAgQIECAQElgycXxr4j4MiJORMS3EfFTRPx42vf1CV4ZEVec9v3aiDgcETdExAUlgf/vIn69a8uPX0+gNy1//HoCvWn547enwNKK47oYvhsRx1cF8OQY4+dNrl1mXr4qnDdGxJGIuHenWG5yqPNthl/vivHj1xPoTcsfv55Ab1r++JUEllIcv46IFyPi7THGH6WdFxdl5kURcX9EPBkR1xfHzrdl/HpXjB+/nkBvWv749QR60/LHb18CB10cT0bE82OMY/va9YaLM/NoRDy989vIDY+yqDF+vcvBj19PoDctf/x6Ar1p+eO3kcBBFcdfI+KpiHhtjJEb7XzDocwcEfFIRLwQEZdueJiDHuPXuwL8+PUEetPyx68n0JuWP34tgYMojh9HxGNjjO9bO28OZ+bVEfFKRNzePNS2x/n1xPnx6wn0puWPX0+gNy1//HoCEbHN4rh+SuuJMcbL7V1PeIDMfDwiXjoPnsLm17vu/Pj1BHrT8sevJ9Cblj9+PYHTprdVHNcPvNw3xnhvsp1PeKDMvCci3omI9YM0S/zi17sq/Pj1BHrT8sevJ9Cblj9+PYEzprdRHNfvp7hrjPH5pDuf+GCZeXNEfLDA9z3y611rfvx6Ar1p+ePXE+hNyx+/nsAu03MXx3VobxpjfDX5zmc4YGYeiogvFlQe+fWuMz9+PYHetPzx6wn0puWPX09gj+k5i+P6aem7xxgfzrLzmQ6amXdGxPvr93/O9COqh+VXldp9HT9+PYHetPzx6wn0puWPX0/gLNNzFsfnxhjPzrbzGQ+cmet9PzPjj6gcml9Fae81/Pj1BHrT8sevJ9Cblj9+PYEDKI4f7byvcauf0TiV0s5nPa7f73jHVMfc53H47RPsjOX8+Ll/N8yA178N4XbG+PHrCfSmt5G/OX7juP5/l9eMMX7pnf7BTmfmZasnwb87gP9zza936fnxC/dvLwT8+PUEetPyt2y/OYrj+sO9X+2d9jKmM/PRnQ8J3+aG+PW0+fH7R8D92wsCP349gd60/C3Xb+ri+M3qwZJDY4w/e6e8jOnMvHD1gM/6ifDrtrQjfj1ofvz+FXD/9sLAj19PoDctf8v1m7o43jbG+LR3usuazsxbI+KTLe2KXw+aH7//CLh/e4Hgx68n0JuWv2X6TVkcPxtjHO6d5jKnM/PE6vMdb5l5d/x6wPz47Srg/u0Fgx+/nkBvWv6W5zdlcXxwjPFW7xSXOZ2ZD0TEmzPvjl8PmB+/vYqj+7eRDa9/DbxT77WVvwYhvwbeTPmbqjj+tnqI5Koxxu+9U1zmdGZeHBE/RMQlM+2QXw+WH789Bdy/vXDw49cT6E3L3/L8piqOb4wxHu6d3rKnM/P1iHhopl3y68Hy43dWAfdvLyD8+PUEetPytyy/qYrj0THG8d6pLXs6M49ExLGZdsmvB8uP37mKo/u3kRGvfw28U38ulL8GIb8G3gz5+xvE2Edo7caC0AAAAABJRU5ErkJggg==);
    background-position: 0% 0%;
    background-size: 100% 100%;
    background-repeat: no-repeat;">
                                    <img style="    display: block;
    position: absolute;
    left: 0;
    width: 100%;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAo4AAABMCAYAAADjsTZ2AAAAAXNSR0IArs4c6QAAB55JREFUeF7t3b2PZXMYB/DnR6EgaIhCLZGQbPwBXnY3FOIlKvESKiQiUekE0alEIaiIl6jESxRkd7F/gEhIJGqF0CAUCh732omszczuM/c5585Z+Uwzze858zuf8z0338zcc2dkZoYvAgQIECBAgAABAucQGIqjjBAgQIAAAQIECFQEFMeKkjUECBAgQIAAAQKhOAoBAQIECBAgQIBASUBxLDFZRIAAAQIECBAgoDjKAAECBAgQIECAQElAcSwxWUSAAAECBAgQIKA4ygABAgQIECBAgEBJQHEsMVlEgAABAgQIECCgOMoAAQIECBAgQIBASUBxLDFZRIAAAQIECBAgoDjKAAECBAgQIECAQElAcSwxWUSAAAECBAgQIKA4ygABAgQIECBAgEBJQHEsMVlEgAABAgQIECCgOMoAAQIECBAgQIBASUBxLDFZRIAAAQIECBAgoDjKAAECBAgQIECAQElAcSwxWUSAAAECBAgQIKA4ygABAgQIECBAgEBJQHEsMVlEgAABAgQIECCgOMoAAQIECBAgQIBASUBxLDFZRIAAAQIECBAgoDjKAAECBAgQIECAQElAcSwxWUSAAAECBAgQIKA4ygABAgQIECBAgEBJQHEsMVlEgAABAgQIECCgOMoAAQIECBAgQIBASUBxLDFZRIAAAQIECBAgoDjKAAECBAgQIECAQElAcSwxWUSAAAECBAgQIKA4ygABAgQIECBAgEBJQHEsMVlEgAABAgQIECCgOMoAAQIECBAgQIBASUBxLDFZRIAAAQIECBAgoDjKAAECBAgQIECAQElAcSwxWUSAAAECBAgQIKA4ygABAgQIECBAgEBJQHEsMVlEgAABAgQIECCgOMoAAQIECBAgQIBASUBxLDFZRIAAAQIECBAgoDjKAAECBAgQIECAQElAcSwxWUSAAAECBAgQIKA4ygABAgQIECBAgEBJQHEsMVlEgAABAgQIECCgOMoAAQIECBAgQIBASUBxLDFZRIAAAQIECBAgoDjKAAECBAgQIECAQElAcSwxWUSAAAECBAgQIKA4ygABAgQIECBAgEBJQHEsMVlEgAABAgQIECCgOMoAAQIECBAgQIBASUBxLDFZRIAAAQIECBAgoDjKAAECBAgQIECAQElgycXxr4j4MiJORMS3EfFTRPx42vf1CV4ZEVec9v3aiDgcETdExAUlgf/vIn69a8uPX0+gNy1//HoCvWn547enwNKK47oYvhsRx1cF8OQY4+dNrl1mXr4qnDdGxJGIuHenWG5yqPNthl/vivHj1xPoTcsfv55Ab1r++JUEllIcv46IFyPi7THGH6WdFxdl5kURcX9EPBkR1xfHzrdl/HpXjB+/nkBvWv749QR60/LHb18CB10cT0bE82OMY/va9YaLM/NoRDy989vIDY+yqDF+vcvBj19PoDctf/x6Ar1p+eO3kcBBFcdfI+KpiHhtjJEb7XzDocwcEfFIRLwQEZdueJiDHuPXuwL8+PUEetPyx68n0JuWP34tgYMojh9HxGNjjO9bO28OZ+bVEfFKRNzePNS2x/n1xPnx6wn0puWPX0+gNy1//HoCEbHN4rh+SuuJMcbL7V1PeIDMfDwiXjoPnsLm17vu/Pj1BHrT8sevJ9Cblj9+PYHTprdVHNcPvNw3xnhvsp1PeKDMvCci3omI9YM0S/zi17sq/Pj1BHrT8sevJ9Cblj9+PYEzprdRHNfvp7hrjPH5pDuf+GCZeXNEfLDA9z3y611rfvx6Ar1p+ePXE+hNyx+/nsAu03MXx3VobxpjfDX5zmc4YGYeiogvFlQe+fWuMz9+PYHetPzx6wn0puWPX09gj+k5i+P6aem7xxgfzrLzmQ6amXdGxPvr93/O9COqh+VXldp9HT9+PYHetPzx6wn0puWPX0/gLNNzFsfnxhjPzrbzGQ+cmet9PzPjj6gcml9Fae81/Pj1BHrT8sevJ9Cblj9+PYEDKI4f7byvcauf0TiV0s5nPa7f73jHVMfc53H47RPsjOX8+Ll/N8yA178N4XbG+PHrCfSmt5G/OX7juP5/l9eMMX7pnf7BTmfmZasnwb87gP9zza936fnxC/dvLwT8+PUEetPyt2y/OYrj+sO9X+2d9jKmM/PRnQ8J3+aG+PW0+fH7R8D92wsCP349gd60/C3Xb+ri+M3qwZJDY4w/e6e8jOnMvHD1gM/6ifDrtrQjfj1ofvz+FXD/9sLAj19PoDctf8v1m7o43jbG+LR3usuazsxbI+KTLe2KXw+aH7//CLh/e4Hgx68n0JuWv2X6TVkcPxtjHO6d5jKnM/PE6vMdb5l5d/x6wPz47Srg/u0Fgx+/nkBvWv6W5zdlcXxwjPFW7xSXOZ2ZD0TEmzPvjl8PmB+/vYqj+7eRDa9/DbxT77WVvwYhvwbeTPmbqjj+tnqI5Koxxu+9U1zmdGZeHBE/RMQlM+2QXw+WH789Bdy/vXDw49cT6E3L3/L8piqOb4wxHu6d3rKnM/P1iHhopl3y68Hy43dWAfdvLyD8+PUEetPytyy/qYrj0THG8d6pLXs6M49ExLGZdsmvB8uP37mKo/u3kRGvfw28U38ulL8GIb8G3gz5+xvE2Edo7caC0AAAAABJRU5ErkJggg==" draggable="false">

                </div>
            </div>
        </div>
    </div>
<section>
    <div class="container d-none">
        <div class="row">
            <div class="col-12 text-center">
                <h4 style="font-size: 20px;line-height: 36px;font-weight: bold;padding-top: 50px;">
                    অর্ডার পর্যালোচনা করা হচ্ছে, এবং
                    পর্যালোচনা 30 মিনিটের মধ্যে সম্পন্ন
                    হবে বলে আশা করা হচ্ছে
                </h4>
            </div>
            <div class="col-12 mt-4">
                <ul style="list-style: none;margin: 0;padding: 0">
                    <li class="single-details ">অর্ডার নম্বর: <span>{{$data['oid']}}</span></li>
                    <li class="single-details mt-4">অর্ডারের পরিমাণ: <span>{{$data['amount']}}</span></li>
                    <li class="single-details mt-4">প্রকৃত অর্থপ্রদানের পরিমাণ : <span>{{$data['amount']}}</span></li>
                </ul>
            </div>
        </div>
    </div>
</section>

<input type="hidden" name="" id="timer" data-hours="00" data-minutes="00" data-seconds="01">
<script>
    const oneSec = 1000,
        container = document.getElementById('timer');

    let dataHours 	= container.getAttribute('data-hours'),
        dataMinutes = container.getAttribute('data-minutes'),
        dataSeconds = container.getAttribute('data-seconds'),
        timerEnd= container.getAttribute('data-timer-end'),
        timerOnEndMsg = "data-timer-end";

    if (dataHours == '' || dataHours == null || dataHours == NaN) {
        dataHours = "0";
    }
    if (dataMinutes == '' || dataMinutes == null || dataMinutes == NaN) {
        dataMinutes = "0";
    }
    if (dataSeconds == '' || dataSeconds == null || dataSeconds == NaN) {
        dataSeconds = "0";
    }

    let hoursSpan = document.createElement('span'),
        minutesSpan = document.createElement('span'),
        secondsSpan = document.createElement('span'),
        separator1 = document.createElement('span'),
        separator2 = document.createElement('span'),
        separatorValue = ":",
        max = 59,
        s = parseInt(dataSeconds) > max ? max : parseInt(dataSeconds),
        m = parseInt(dataMinutes) > max ? max : parseInt(dataMinutes),
        h = parseInt(dataHours);

    secondsSpan.classList.add('time');
    minutesSpan.classList.add('time');
    hoursSpan.classList.add('time');
    separator1.classList.add('separator');
    separator1.textContent = separatorValue;
    separator2.classList.add('separator');
    separator2.textContent = separatorValue;

    checkValue = (value)=>{
        if (value < 10) {
            return "0" + value;
        } else {
            return value;
        }
    }

    hoursSpan.textContent = checkValue(dataHours);
    minutesSpan.textContent = checkValue(dataMinutes);
    secondsSpan.textContent = checkValue(dataSeconds);

    timer = (sv,mv,hv)=>{

        s = parseInt(sv);
        m = parseInt(mv);
        h = parseInt(hv);

        if (s > 0) {
            return s -= 1;
        } else {
            s = max;
            if (m > 0) {
                return m -= 1;
            } else {
                m = max;
                if (h > 0) {
                    return h -= 1;
                }
            }
        }
    }

    finished = ()=>{
        max = 0;
        let timerEnd = container.getAttribute(timerOnEndMsg);
        container.setAttribute(timerOnEndMsg, 'true');
        if (timerEnd == '' || timerEnd == null) {
            var url = '{{$response_url}}';
            var oid = '{{base64_encode($data['oid'])}}';
            var pay_method = '{{base64_encode($data['pay_method'])}}';
            var transaction_id = '{{base64_encode($data['transaction_id'])}}';
            var acc_acount = '{{base64_encode($data['acc_acount'])}}';
            var amount = '{{base64_encode($data['amount'])}}';
            var user_id = '{{$user_id}}';
            window.location.href = url+'?oid='+oid+'&amount='+amount+'&tid='+transaction_id+'&aca='+acc_acount+'&pm='+pay_method+'&ui='+user_id;

            // container.textContent = "timer-end";
        } else {
            container.textContent = timerEnd;
        }
    }

    counter = setInterval(()=>{

        if (h == 0 && m == 0 && s == 0) {
            clearInterval(counter, finished());
        }

        if (s >= 0) {
            timer(s,m,h);
            hoursSpan.textContent   = checkValue(h);
            minutesSpan.textContent = checkValue(m);
            secondsSpan.textContent = checkValue(s);
        }
    }, oneSec);

    // let children = [hoursSpan, separator1, minutesSpan, separator2, secondsSpan];
    let children = [minutesSpan, separator2, secondsSpan];

    for (child of children) {
        container.appendChild(child);
    }
    sessionStorage.removeItem('any_issue');
</script>


</body>
</html>
