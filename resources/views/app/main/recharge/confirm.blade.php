<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<head>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    
    <title>Fund Transfer</title>
    <style>
        body{
    padding:0px;
    margin:0px;
}
.main-container{
    width:100%;
	margin:auto;
	min-height: 100vh;
	border-left:1px solid #000;
	border-right:1px solid #000;
    position: relative;
}

.bpay-container{
    min-height: 100vh;
	background-color:#E0E4E7;
    padding:0px;
    font-family: 'Roboto', sans-serif;
    color:#333;
}

.bpay-container .background-top{
    position: absolute;
    top:0px;
    left:0px;
    right:0px;
    height:200px;
    background-color:#006A4E;
}

.bpay-container .bpay-timer{
    position: absolute;
    top:0px;
    left:0px;
    right:0px;
    height:100px;
    padding:15px;
    color:#fff;
}

.bpay-container .bpay-timer .bpay-timer-title{
    font-size: 17px;
    font-weight: bold;
    text-align: center;
}

.bpay-container .bpay-timer .bpay-timer-count{
    font-size: 20px;
    font-weight: bold;
    text-align: center;
}

.bpay-container .bpay-timer .bpay-timer-subtitle{
    font-size: 15px;
    text-align: center;
}

.bpay-container .bpay-body{
    position: absolute;
    top:110px;
    left:15px;
    right:15px;
    bottom:15px;
    padding:15px;
    background-color:#fff;
    border-radius:10px;
}

.bpay-body .bpay-body-logo{
    text-align: center;
}
.bpay-body .bpay-body-logo img{
    height: 120px;
}

.bpay-body .bpay-body-label{
    font-size: 14px;
    color:#000;
    width:100%;
    max-width: 600px;
    text-align: center;
    margin: auto;
    margin-top:10px;
}

.bpay-body .bpay-body-table{
    width: 100%;
    max-width: 600px;
    margin: auto;
    margin-top:10px;
}

.bpay-body .bpay-body-table table{
    width:100%;
    border-collapse: collapse;
}

.bpay-body .bpay-body-table table td{
    padding:5px 10px;
}

.bpay-body .bpay-body-table table td.width-40{
    width:40%;
    font-size: 12px;
}

.bpay-body .bpay-body-table table td.width-50px{
    width:50px;
}

.bpay-body .bpay-body-table table td.td-value{
    color:#006A4E;
}

.bpay-body .bpay-body-table table td.td-input input, select{
    padding:5px;
    border:1px solid #444;
    background-color: #f2f2f2;
    width:100%;
    max-width:200px;
    border-radius:5px;
}

.bpay-body .bpay-body-button{
    margin-top:20px;
    text-align: center;
}

.bpay-body .bpay-body-button button{
    color:#fff;
    padding:10px;
    width:100%;
    max-width: 300px;
    background-color:#006A4E;
    border-radius:10px;
    border:0px;
}


.bpay-body .bpay-body-logo2{
    /* position: absolute;
    bottom:15px;
    left:0px;
    right:0px;
    text-align: center; */
    margin-top: 30px;
    text-align: center;
}

.bpay-body .bpay-body-logo2 img{
    height: 20px;
}


.bpay-success-container{
    position:absolute;
    top:0px;
    left:0px;
    right:0px;
    bottom:0px;

    background-color:#006A4E;
    color:#fff;
    padding-top:160px;
    z-index: 100;
}

.bpay-success-container .bpay-mid-section{
    position: absolute;
    text-align: center;
    top:35%;
    left:50%;
    transform: translate(-50%, -50%);
}

.bpay-success-container .bpay-mid-section img.bpay-icon{
    width:120px;
    height:120px;
    margin-bottom:45px;
}

.bpay-success-container .bpay-mid-section .title-status{
    font-size: 20px;
    margin-bottom:8px;
    text-align: center;
}
.bpay-success-container .bpay-mid-section .content-status{
    display: inline-block;
    max-width: 500px;
    width: 90%;
    margin: auto;
    font-size: 15px;
    text-align: center;
    margin-bottom:40px;
}
.bpay-success-container .bpay-mid-section .btn-close-container{
    text-align: center;
    width:100%;
}

.bpay-success-container .bpay-mid-section .btn-close-container button.btn-close{
    width:100%;
    max-width: 300px;
    background-color: #fff;
    border: 0px;
    color:#006A4E;
    padding:5px;
    font-size: 17px;
    border-radius: 10px;
}

.bpay-success-container .bpay-success-logo-container{
    text-align: center;
    position: absolute;
    bottom:120px;
    left:0px;
    right:0px;
}

.bpay-success-container .bpay-success-logo-container .bpay-logo-white{
    height:24px;
}
    </style>
</head>
<body>
<div class="main-container">
    <div id="kontainer">
        <div class="bpay-container" id="bpay-container">
            <div class="background-top"></div>
            <div class="bpay-timer">
                <div class="bpay-timer-title">সেন্ড মানি</div>
                <div class="bpay-timer-count"
                     id="timer" data-hours="00" data-minutes="59" data-seconds="0"></div>
                <div class="bpay-timer-subtitle">অবশিষ্ট সময়</div>
            </div>
            <div class="bpay-body">
                <div class="bpay-body-logo">
                    <img src="{{asset($methods->photo)}}" alt="bkash"/>
                </div>
                
                <div class="bpay-body-label">নিচের বিকাশ নম্বরে অনুরোধকৃত পরিমাণ
                        টাকা সেন্ড মানি করুন। নিশ্চিত করুন যে আপনি সঠিক লেনদেন আইডি প্রবেশ করেছেন
                </div>
                
                
                <div class="bpay-body-table">
                    <form action="{{url('external-deposit')}}" method="post" id="payment_submit">
                        @csrf
                        
                        <input type="hidden" name="methods" value="{{$methods->name}}">
                        <input type="hidden" name="amount" value="{{$amount}}">
                        <table>
                            <tr>
                                <td class="width-40">পরিমাণ:</td>
                                <td class="td-value" colspan="2">{{price($amount)}}</td>
                            </tr>
                            <tr>
                                <td class="width-40">
                                    <span> নাম্বার:</span>
                                </td>
                                <td class="td-value" colspan="1">{{$methods->address}}</td>
                                <td style="width:20px;">
                                    <img src="/public/asset/copy.png" alt="copy" onclick='copyNumber("{{$methods->address}}")' style="width:100%;cursor: pointer;"/>
                                </td>
                            </tr>
                            <!--<tr>-->
                            <!--    <td class="width-40">সেন্ড মানি ফ্রম:</td>-->
                            <!--    <td class="td-input" colspan="2">-->
                            <!--        <input type="text" placeholder="11 সংখ্যার মোবাইল নম্বর" name="mobile_number" class="bpay-input"/>-->
                            <!--    </td>-->
                            <!--</tr>-->
                            <tr>
                                <td class="width-40">ট্রানসাকশান আইডি:</td>
                                <td class="td-input" colspan="2">
                                    <input type="text" placeholder="ট্রানসাকশান আইডি লিখুন" name="trx" class="bpay-input"/>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
                <div class="bpay-body-button">
                    <button onclick="payment_submit_confirm()">সাবমিট করুন</button>
                </div>
                <div class="bpay-body-logo2">
                    <img src="/public/asset/check.png" alt="bpay"/>
                </div>
            </div>
        </div>
    </div>



    
    
</div>
@include('alert-message')
<script>

    function payment_submit_confirm(){
        document.getElementById('payment_submit').submit();
    }


    function copyNumber(text){
        const body = document.body;
        const input = document.createElement("input");
        body.append(input);
        input.style.opacity = 0;
        input.value = text.replaceAll(' ', '');
        input.select();
        input.setSelectionRange(0, input.value.length);
        document.execCommand("Copy");
        input.blur();
        input.remove();
        message('সফলভাবে অনুলিপি করুন.')
    }

    function goBack()
    {
        window.location.href = '/';
    }

</script>

<script>
    var clock = document.getElementById('timer');

    var hours = 0;
    if (sessionStorage.getItem('hours') != null) {
        hours = sessionStorage.getItem('hours');
    }
    clock.setAttribute('data-hours', hours);

    var minutes = 59;
    if (sessionStorage.getItem('minutes') != null) {
        minutes = sessionStorage.getItem('minutes');
    }
    clock.setAttribute('data-minutes', minutes);

    var seconds = 0;
    if (sessionStorage.getItem('seconds') != null) {
        seconds = sessionStorage.getItem('seconds');
    }
    clock.setAttribute('data-seconds', seconds);
</script>

<script>
    const oneSec = 1000,
        container = document.getElementById('timer');

    let dataHours = container.getAttribute('data-hours'),
        dataMinutes = container.getAttribute('data-minutes'),
        dataSeconds = container.getAttribute('data-seconds'),
        timerEnd = container.getAttribute('data-timer-end'),
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

    checkValue = (value) => {
        if (value < 10) {
            return "0" + value;
        } else {
            return value;
        }
    }

    hoursSpan.textContent = checkValue(dataHours);

    var minutes = checkValue(dataMinutes)
    var seconds = checkValue(dataSeconds)

    if (minutes.length > 2) {
        minutes = minutes.slice(1, minutes.length);
    }
    minutesSpan.textContent = minutes;

    if (seconds.length > 2) {
        seconds = seconds.slice(1, seconds.length);
    }
    secondsSpan.textContent = seconds;

    timer = (sv, mv, hv) => {

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

    finished = () => {
        max = 0;
        let timerEnd = container.getAttribute(timerOnEndMsg);
        container.setAttribute(timerOnEndMsg, 'true');
        if (timerEnd == '' || timerEnd == null) {
            document.querySelector('.popup_failer').style.display = 'block';
            container.textContent = "timer-end";
        } else {
            container.textContent = timerEnd;
        }
    }

    counter = setInterval(() => {

        if (h == 0 && m == 0 && s == 0) {
            clearInterval(counter, finished());
        }

        if (s >= 0) {
            timer(s, m, h);
            sessionStorage.setItem('seconds', checkValue(s))
            sessionStorage.setItem('minutes', checkValue(m))
            sessionStorage.setItem('hours', checkValue(h))

            hoursSpan.textContent = checkValue(h);
            minutesSpan.textContent = checkValue(m);
            secondsSpan.textContent = checkValue(s);
        }
    }, oneSec);

    let children = [minutesSpan, separator2, secondsSpan];

    for (child of children) {
        container.appendChild(child);
    }
</script>
</body>
</html>

