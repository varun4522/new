<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
  <meta charset="utf-8">
  <title>Lottery </title>
  <link rel="stylesheet" href="/public/site/layui/css/layui.css">
  <link rel="stylesheet" href="/public/site/css/common.css">
  <link rel="stylesheet" href="/public/site/css/lottery_new.css">
  <style>
    .animate {
      display: inline-block;
      white-space: nowrap;
      animation: 4s wordsLoop linear infinite normal;
      height: 400px;
      width: 100%;
    }

    @-webkit-keyframes wordsLoop {
      0% {
        transform: translateY(50px);
      }

      100% {
        transform: translateY(-80px);
        -webkit-transform: translateY(-80px);
      }
    }
  </style>
</head>

<body style="position: relative">
  <a href="javascript:history.go(-1)" style="position:fixed;top: 10px; left: 10px;z-index: 999999;display: block">
    <img src="/public/site/lottery/img/back.png" style="background: rgba(0, 0, 0, 0.5);border-radius: 50%; padding: 5px; box-sizing: border-box;width: 42px;height: 42px">
  </a>
  <div id="guize" style="top: 0rem; left: 0rem;">
    <img src="/public/site/lottery/img/img_3.png" class="up_down">
  </div>
  <div>
    <div id="top_image"><img src="/public/site/lottery/img/img_2.png" class="size_ani"></div>
  </div>
  <div id="music_icon" style="position:fixed;top: 10px; right: 10px;z-index: 999999">
    <img src="/public/site/lottery/img/music.png" style="background: rgba(0, 0, 0, 0.5);border-radius: 50%; padding: 5px; box-sizing: border-box;width: 42px;height: 42px">
  </div>
  <div style="width: 100%;margin: auto;position: relative;margin-top: 20px;">
    <div class="canvas_box">
      <div class="can">
        <canvas id="canvas_bg"></canvas>
        <canvas id="canvas_main" class="canvas_ani"></canvas>
      </div>
      <img src="/public/site/lottery/img/img12.png" id='pointer' />
      <img src="/public/site/lottery/img/img13.png" id='pointer_but' class="claim-btn" />
    </div>
    <img src="https://static.vecteezy.com/system/resources/thumbnails/035/566/895/small/red-gift-box-and-gold-ribbon-chinese-new-year-elements-icon-3d-rendering-png.png" id='img1' class="layui-hide" />
    <img src="https://static.vecteezy.com/system/resources/thumbnails/035/566/895/small/red-gift-box-and-gold-ribbon-chinese-new-year-elements-icon-3d-rendering-png.png" id='img2' class="layui-hide" />
    <img src="https://static.vecteezy.com/system/resources/thumbnails/035/566/895/small/red-gift-box-and-gold-ribbon-chinese-new-year-elements-icon-3d-rendering-png.png" id='img3' class="layui-hide" />
    <img src="https://static.vecteezy.com/system/resources/thumbnails/035/566/895/small/red-gift-box-and-gold-ribbon-chinese-new-year-elements-icon-3d-rendering-png.png" id='img4' class="layui-hide" />
    <img src="https://static.vecteezy.com/system/resources/thumbnails/035/566/895/small/red-gift-box-and-gold-ribbon-chinese-new-year-elements-icon-3d-rendering-png.png" id='img5' class="layui-hide" />
    <img src="https://static.vecteezy.com/system/resources/thumbnails/035/566/895/small/red-gift-box-and-gold-ribbon-chinese-new-year-elements-icon-3d-rendering-png.png" id='img6' class="layui-hide" />
    <img src="https://static.vecteezy.com/system/resources/thumbnails/035/566/895/small/red-gift-box-and-gold-ribbon-chinese-new-year-elements-icon-3d-rendering-png.png" id='img7' class="layui-hide" />
    <img src="https://static.vecteezy.com/system/resources/thumbnails/035/566/895/small/red-gift-box-and-gold-ribbon-chinese-new-year-elements-icon-3d-rendering-png.png" id='img8' class="layui-hide" />
  </div>
  
  <form id="claimAllForm" action="{{ route('spins.claimAll') }}" method="POST" style="display: none;">
    @csrf
</form>

  
  @php
    use App\Models\Spin;

    // Logged-in user er pending spins count
    $spinCount = Spin::where('referrer_id', auth()->id())
                     ->where('status', 'pending')
                     ->count();
@endphp
  
  <div style="text-align: center;color: #ffffff;margin-top: 5px">
    You have <strong class="num">{{ $spinCount }}</strong> chances to participate in the lottery
  </div>
  <div style="background: linear-gradient(90deg, #ffe5c4, #f4b28f);padding: 5px;margin: 10px;border-radius: 8px;margin-top: 50px;">
    <div id="prize-list">
      <div class="prize-box">
        <div class="prize-list-title" style="width: 100%">
          <img src="/public/site/lottery/img/img_5.png" style="width: 100%">
        </div>

        <div class="flex_space margin_bottom_10">
          <div class="li-box">
            <div class="img-box"><img src="/public/uploads/lottery_prizes/_d274f5aa5137292ef1ac59e900fc7b5f.jpg"></div>
            <div class="prize-name">
              <div class="prize_title">Bonus</div>
            </div>
          </div>
          <div class="li-box">
            <div class="img-box"><img src="/public/uploads/lottery_prizes/_3ab177866953574417e1472f1c745d5b.jpg"></div>
            <div class="prize-name">
              <div class="prize_title">Bonus</div>
            </div>
          </div>
        </div>
        <div class="flex_space margin_bottom_10">
          <div class="li-box">
            <div class="img-box"><img src="/public/uploads/lottery_prizes/_4eb8f5456a65dd888b5d8c737904c6d5.jpg"></div>
            <div class="prize-name">
              <div class="prize_title">Bonus</div>
            </div>
          </div>
          <div class="li-box">
            <div class="img-box"><img src="/public/uploads/lottery_prizes/_6705331a54d90b5b4a47d09b3890c531.jpg"></div>
            <div class="prize-name">
              <div class="prize_title">Bonus-139</div>
            </div>
          </div>
        </div>
        <div class="flex_space margin_bottom_10">
          <div class="li-box">
            <div class="img-box"><img src="/public/uploads/lottery_prizes/_98c0e52d6bc6414d7044ecdb304608a4.jpg"></div>
            <div class="prize-name">
              <div class="prize_title">Bonus</div>
            </div>
          </div>
          <div class="li-box">
            <div class="img-box"><img src="/public/uploads/lottery_prizes/_327e7f4de5497c1bcf0f6e3ae1b754a9.jpg"></div>
            <div class="prize-name">
              <div class="prize_title">Bonus-7799</div>
            </div>
          </div>
        </div>
        <div class="flex_space margin_bottom_10">
          <div class="li-box">
            <div class="img-box"><img src="/public/uploads/lottery_prizes/_94bfe56f88028756b1a907d8473bc2c4.jpg"></div>
            <div class="prize-name">
              <div class="prize_title">Bonus</div>
            </div>
          </div>
          <div class="li-box">
            <div class="img-box"><img src="/public/uploads/lottery_prizes/_33bbcc0b2ac1289900d30ec57c4a9a48.jpg"></div>
            <div class="prize-name">
              <div class="prize_title">Bonus</div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
  <div class="prize-list-title" style="width: 100%;margin-top: 30px;">
    <img src="/public/site/lottery/img/img_6.png" style="width: 100%">
  </div>

  <!--Winners Lists-->
  <div style="background: rgba(0, 0, 0, 0.3);padding: 10px;margin: 10px;border-radius: 8px; height: 350px; overflow: hidden;margin-bottom: 30px;">
    <div class="animate">
      <div class="user_list flex_left">
        <div class="user_avatar"><img src="/public/site/lottery/img/1.png"></div>
        <div class="user_item">
          <div class="flex_space">
            <div class="prize_account">99****4796</div>
            <div class="prize_date">2025-07-07 19:10:44</div>
          </div>
          <div class="prize_title">Bonus-79 ₹79.00</div>
        </div>
      </div>
      <div class="user_list flex_left">
        <div class="user_avatar"><img src="/public/site/lottery/img/1.png"></div>
        <div class="user_item">
          <div class="flex_space">
            <div class="prize_account">63****3652</div>
            <div class="prize_date">2025-07-07 19:09:07</div>
          </div>
          <div class="prize_title">Bonus-9 ₹9.00</div>
        </div>
      </div>
      <div class="user_list flex_left">
        <div class="user_avatar"><img src="/public/site/lottery/img/1.png"></div>
        <div class="user_item">
          <div class="flex_space">
            <div class="prize_account">93****8418</div>
            <div class="prize_date">2025-07-07 19:06:32</div>
          </div>
          <div class="prize_title">Bonus-79 ₹79.00</div>
        </div>
      </div>
      <div class="user_list flex_left">
        <div class="user_avatar"><img src="/public/site/lottery/img/1.png"></div>
        <div class="user_item">
          <div class="flex_space">
            <div class="prize_account">95****8283</div>
            <div class="prize_date">2025-07-07 19:05:53</div>
          </div>
          <div class="prize_title">Bonus-29 ₹29.00</div>
        </div>
      </div>
      <div class="user_list flex_left">
        <div class="user_avatar"><img src="/public/site/lottery/img/1.png"></div>
        <div class="user_item">
          <div class="flex_space">
            <div class="prize_account">78****1172</div>
            <div class="prize_date">2025-07-07 19:05:35</div>
          </div>
          <div class="prize_title">Bonus-9 ₹9.00</div>
        </div>
      </div>
      <div class="user_list flex_left">
        <div class="user_avatar"><img src="/public/site/lottery/img/1.png"></div>
        <div class="user_item">
          <div class="flex_space">
            <div class="prize_account">95****8283</div>
            <div class="prize_date">2025-07-07 19:02:09</div>
          </div>
          <div class="prize_title">Bonus-79 ₹79.00</div>
        </div>
      </div>
      <div class="user_list flex_left">
        <div class="user_avatar"><img src="/public/site/lottery/img/1.png"></div>
        <div class="user_item">
          <div class="flex_space">
            <div class="prize_account">96****5577</div>
            <div class="prize_date">2025-07-07 19:01:02</div>
          </div>
          <div class="prize_title">Bonus-9 ₹9.00</div>
        </div>
      </div>
      <div class="user_list flex_left">
        <div class="user_avatar"><img src="/public/site/lottery/img/1.png"></div>
        <div class="user_item">
          <div class="flex_space">
            <div class="prize_account">93****8418</div>
            <div class="prize_date">2025-07-07 18:59:14</div>
          </div>
          <div class="prize_title">Bonus-29 ₹29.00</div>
        </div>
      </div>
      <div class="user_list flex_left">
        <div class="user_avatar"><img src="/public/site/lottery/img/1.png"></div>
        <div class="user_item">
          <div class="flex_space">
            <div class="prize_account">79****1045</div>
            <div class="prize_date">2025-07-07 18:58:26</div>
          </div>
          <div class="prize_title">Bonus-29 ₹29.00</div>
        </div>
      </div>
      <div class="user_list flex_left">
        <div class="user_avatar"><img src="/public/site/lottery/img/1.png"></div>
        <div class="user_item">
          <div class="flex_space">
            <div class="prize_account">78****8997</div>
            <div class="prize_date">2025-07-07 18:46:54</div>
          </div>
          <div class="prize_title">Bonus-29 ₹29.00</div>
        </div>
      </div>
      <div class="user_list flex_left">
        <div class="user_avatar"><img src="/public/site/lottery/img/1.png"></div>
        <div class="user_item">
          <div class="flex_space">
            <div class="prize_account">98****7760</div>
            <div class="prize_date">2025-07-07 18:46:39</div>
          </div>
          <div class="prize_title">Bonus-29 ₹29.00</div>
        </div>
      </div>
      <div class="user_list flex_left">
        <div class="user_avatar"><img src="/public/site/lottery/img/1.png"></div>
        <div class="user_item">
          <div class="flex_space">
            <div class="prize_account">99****2676</div>
            <div class="prize_date">2025-07-07 18:46:36</div>
          </div>
          <div class="prize_title">Bonus-9 ₹9.00</div>
        </div>
      </div>
      <div class="user_list flex_left">
        <div class="user_avatar"><img src="/public/site/lottery/img/1.png"></div>
        <div class="user_item">
          <div class="flex_space">
            <div class="prize_account">63****7760</div>
            <div class="prize_date">2025-07-07 18:46:25</div>
          </div>
          <div class="prize_title">Bonus-9 ₹9.00</div>
        </div>
      </div>
      <div class="user_list flex_left">
        <div class="user_avatar"><img src="/public/site/lottery/img/1.png"></div>
        <div class="user_item">
          <div class="flex_space">
            <div class="prize_account">87****8441</div>
            <div class="prize_date">2025-07-07 18:44:52</div>
          </div>
          <div class="prize_title">Bonus-29 ₹29.00</div>
        </div>
      </div>
      <div class="user_list flex_left">
        <div class="user_avatar"><img src="/public/site/lottery/img/1.png"></div>
        <div class="user_item">
          <div class="flex_space">
            <div class="prize_account">96****5224</div>
            <div class="prize_date">2025-07-07 18:42:46</div>
          </div>
          <div class="prize_title">Bonus-9 ₹9.00</div>
        </div>
      </div>
      <div class="user_list flex_left">
        <div class="user_avatar"><img src="/public/site/lottery/img/1.png"></div>
        <div class="user_item">
          <div class="flex_space">
            <div class="prize_account">76****8502</div>
            <div class="prize_date">2025-07-07 18:34:27</div>
          </div>
          <div class="prize_title">Bonus-9 ₹9.00</div>
        </div>
      </div>
      <div class="user_list flex_left">
        <div class="user_avatar"><img src="/public/site/lottery/img/1.png"></div>
        <div class="user_item">
          <div class="flex_space">
            <div class="prize_account">76****3504</div>
            <div class="prize_date">2025-07-07 18:31:00</div>
          </div>
          <div class="prize_title">Bonus-29 ₹29.00</div>
        </div>
      </div>
      <div class="user_list flex_left">
        <div class="user_avatar"><img src="/public/site/lottery/img/1.png"></div>
        <div class="user_item">
          <div class="flex_space">
            <div class="prize_account">90****8197</div>
            <div class="prize_date">2025-07-07 18:30:14</div>
          </div>
          <div class="prize_title">Bonus-29 ₹29.00</div>
        </div>
      </div>
      <div class="user_list flex_left">
        <div class="user_avatar"><img src="/public/site/lottery/img/1.png"></div>
        <div class="user_item">
          <div class="flex_space">
            <div class="prize_account">80****8858</div>
            <div class="prize_date">2025-07-07 18:29:59</div>
          </div>
          <div class="prize_title">Bonus-29 ₹29.00</div>
        </div>
      </div>
      <div class="user_list flex_left">
        <div class="user_avatar"><img src="/public/site/lottery/img/1.png"></div>
        <div class="user_item">
          <div class="flex_space">
            <div class="prize_account">98****7760</div>
            <div class="prize_date">2025-07-07 18:25:21</div>
          </div>
          <div class="prize_title">Bonus-79 ₹79.00</div>
        </div>
      </div>
    </div>
  </div>
  <!--Winners Lists-->
  <!--Mp3-->
  <div class="music">
    <audio src="/public/site/lottery/img/music.mp3" preload="auto" id="music_play" autoplay="autoplay" loop="loop"></audio>
    <audio src="/public/site/lottery/img/m_2.mp3" preload="auto" id="music2"></audio>
    <audio src="/public/site/lottery/img/m_3.mp3" preload="auto" id="music3"></audio>
  </div>
  <!--Mp3-->
  <a style="display: block" href="/myPrizes" id="my"><img src="/public/site/lottery/img/img_4.png" class="left_right"></a>
  <!--Lottery Success Dialog-->
  <div id="lottery_dialog" class="lottery_dialog" style="background: #ffffff;display: none">
    <div class="lottery_winner_title_image"><img src="/public/site/lottery/img/img_10.png"></div>

    <div class="lottery_dialog_body">
      <img src="/public/site/lottery/img/1.png" style="width: 80px;height: 80px;" class="winner_prize_image" />
      <div class="winner_prize winner_prize_msg" style="margin-top: 10px">

      </div>
      <div></div>
      <div class="winner_btn" style="width: 100%;margin-top: 10px;">
        <div class="flex_space" style="padding: 10px;justify-content: center">
          <div class="layui-btn layui-btn-normal layui-btn-sm layui-btn-fluid view_details" data-id="" style="width: 120px;padding-right: 15px;">View Prize</div>
          <div class="layui-btn layui-btn-sm layui-btn-fluid layui-btn-danger close_dialog" style="width: 120px;padding-left: 15px;">Try Again</div>
        </div>
      </div>
    </div>
  </div>
  <!--Lottery Success Dialog-->
  <!--Fail Dialog-->
  <div id="lottery_fail_dialog" class="lottery_dialog" style="background: #ffffff;display: none">
    <div class="lottery_winner_title_image"><img src="/public/site/lottery/img/img_9.png"></div>

    <div class="lottery_dialog_body">
      <div class="winner_prize fail_msg" style="margin-top: 40px"></div>
      <div></div>
      <div class="winner_btn" style="width: 100%;margin-top: 30px;">
        <div class="flex_space" style="padding: 10px;justify-content: center">
          <div class="layui-btn layui-btn-sm layui-btn-fluid layui-btn-danger close_dialog" style="width: 120px;padding-left: 15px;">I Got It</div>
        </div>
      </div>
    </div>
  </div>
  <!--Fail Dialog-->
  <!--Rule Dialog-->
  <div id="open_dialog" class="position" style="width: 100%;height: 400px;background: #FFFFFF;display: none">
    <div style="padding:20px;">

      <div class="title" style="font-family: Arial, Arial;font-weight: 700;font-size: 22px;color: #14142B;line-height: 25px;margin-top: 20px;">
        Lottery Rules
      </div>
      <div class="text" style="font-family: Arial, Arial;font-weight: 400;font-size: 14px;color: #2A415C;line-height: 16px;margin-top: 10px;text-align: left;white-space:pre-line">
        Sweepstakes Rules

        Rule 1: Every purchase of a product is eligible for a sweepstakes entry

        Rule 2: Every invitation to a valid member is eligible for a sweepstakes entry </div>
      <!--        <div class="flex_space" style="padding: 10px;justify-content: center;margin-top: 20px;">-->
      <!--            <div class="layui-btn layui-btn-sm layui-btn-fluid layui-btn-danger close_dialog" style="width: 120px;padding-left: 15px;">I Got It</div>-->
      <!--        </div>-->
    </div>
  </div>
  
  <!-- SweetAlert2 CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Success!',
        text: "{{ session('success') }}",
        confirmButtonColor: '#3085d6',
    });
</script>
@endif

@if(session('error'))
<script>
    Swal.fire({
        icon: 'error',
        title: 'Oops!',
        text: "{{ session('error') }}",
        confirmButtonColor: '#d33',
    });
</script>
@endif

  <!--Rule Dialog-->
  <script src="/public/site/lottery/js/jquery.js"></script>
  <script src="/public/site/lottery/js/jQueryRotate.js" type="text/javascript" charset="utf-8"></script>
  <script src="/public/site/layui/layui.js"></script>
  <script>
  $(document).on('click', '.claim-btn', function(e) {
    e.preventDefault(); // default behavior block
    $('#claimAllForm').submit();
});
  </script>
  <script>
  // Button click listener for claim-all
$(document).on('click', '.claim-btn', function() {
    $.post('/spins/claim-all', {}, function(res) {
        if(res.status === 1){
            $('.winner_prize_msg').html(res.msg);
            // success handling
        } else {
            $('.fail_msg').html(res.msg);
            layer.open({
                type: 1,
                title: false,
                shade: 0.8,
                content: $('#lottery_fail_dialog'),
                area: ['80%', '320px'],
                closeBtn: false
            });
        }
    });
});

  </script>
  <script>
    layui.use(function () {
      var $ = layui.jquery;
      var layer = layui.layer;
      var flow = layui.flow;
      var element = layui.element;
      // Set outer frame size
      var wid = parseInt($('body').width() * 0.9);
      $('.canvas_box').width(wid).height(wid)
      wid = wid * 4
      $('.can').width(wid).height(wid)
      var angleVal = 0;
      var canvasAni = setInterval(function () {
        angleVal++
        if (angleVal == 360) {
          angleVal = 0
        }
      }, 3000)
      var currency = "";
      if (currency == '&pound;') {
        currency = '\uffe1'
      }

      var num = parseInt("0");
      // Prize parameters
      var prizeNum = parseInt("0"); // Winning prize index
      var prizeVal = [{
          img: 'img1', // Corresponding image
          text: currency + '', // Prize name, line break
          wid: wid * 0.1, // Image width
          hei: wid * 0.1, // Image height
        },
        {
          img: 'img2',
          text: currency + '',
          wid: wid * 0.1,
          hei: wid * 0.1,
        },
        {
          img: 'img3',
          text: currency + '',
          wid: wid * 0.1,
          hei: wid * 0.1,
        },
        {
          img: 'img4',
          text: currency + '',
          wid: wid * 0.1,
          hei: wid * 0.1,
        },
        {
          img: 'img5',
          text: currency + '',
          wid: wid * 0.1,
          hei: wid * 0.1,
        },
        {
          img: 'img6',
          text: currency + '',
          wid: wid * 0.1,
          hei: wid * 0.1,
        },
        {
          img: 'img7',
          text: currency + '',
          wid: wid * 0.1,
          hei: wid * 0.1,
        },
        {
          img: 'img8',
          text: currency + '',
          wid: wid * 0.1,
          hei: wid * 0.1,
        }
      ]

      // Start lottery
      var rotateType = true
      $("#pointer_but").on('click', function () {
        var is_open = parseInt("1"); // Whether the lottery is open
        if (is_open == 0) {
          $('.fail_msg').html('The raffle is under maintenance, so stay tuned!')
          layer.open({
            type: 1,
            title: false,
            shade: 0.8, // 不显示遮罩
            content: $('#lottery_fail_dialog'), // 捕获的元素
            area: ['80%', '360px'], // 宽高
            closeBtn: false,
            end: function () {
              // layer.msg('关闭后的回调', {icon:6});
            }
          });
          return false;
        }
        var myAudio = document.getElementById('music2');
        myAudio.play();
        if (rotateType == false) {
          return false
        }
        $('#canvas_main').removeClass('canvas_ani')
        rotateType = false
        $('#canvas_main').rotate({
          duration: 3000, //转动时间
          angle: angleVal, //起始角度
          animateTo: 1800 - prizeNum * 360 / prizeVal.length, //结束的角度
          easing: $.easing.easeOutSine, //动画效果，需加载jquery.easing.min.js
          callback: function () {
            var myAudio = document.getElementById('music3');
            myAudio.play();
            $.post('/lottery', {}, function (res) {
              if (res.status == 1) {
                $('.winner_prize_msg').html(res.msg)
                $('.winner_prize_image').attr('src', res.result.image)
                $('.view_details').attr('data-id', res.result.id)
                layer.open({
                  type: 1,
                  title: false,
                  shade: 0.8, // 不显示遮罩
                  closeBtn: false,
                  content: $('#lottery_dialog'), // 捕获的元素
                  area: ['80%', '340px'], // 宽高
                  end: function () {
                    // layer.msg('关闭后的回调', {icon:6});
                  }
                });
              } else {
                $('.fail_msg').html(res.msg)
                layer.open({
                  type: 1,
                  title: false,
                  shade: 0.8, // 不显示遮罩
                  content: $('#lottery_fail_dialog'), // 捕获的元素
                  area: ['80%', '320px'], // 宽高
                  closeBtn: false,
                  end: function () {
                    // layer.msg('关闭后的回调', {icon:6});
                  }
                });
              }
            })
            rotateType = true
          }
        });
      })

      // Turntable parameters
      var canvasArr = {
        'width': wid, // Turntable width
        'height': wid, // Turntable height
        'bgcolor': 'linear-gradient( 140deg, #2434A2 2%, #081A8F 100%);', // Background color
        'border': wid * 0.06, // Turntable border
        'lightnum': 24, // Number of background lights
        'lightwid': wid * 0.036 // Size of background light
      }

      // Draw turntable
      class htTurntable {
        constructor() {
          this.canvasbg = document.getElementsByTagName('canvas')[0];
          this.contextbg = this.canvasbg.getContext('2d');
          this.canvas = document.getElementsByTagName('canvas')[1];
          this.context = this.canvas.getContext('2d');
        }
        init() {
          this.canvasbg.width = canvasArr.width
          this.canvasbg.height = canvasArr.height
          this.canvas.width = canvasArr.width
          this.canvas.height = canvasArr.height
          this.bgfun()
          this.bglight()
          this.prize()
          this.iconfun()
          this.bglight('#FFFFFF', '#ffcf4d')
          this.bglightani() // Background light dynamic
          $('.can').css('transform', 'scale(0.25)');
          $('.can').css('margin-left', -wid / 2)
          $('.can').css('margin-top', -wid / 2)
        }
        // Background
        bgfun() {
          this.contextbg.beginPath()
          let clg = this.contextbg.createLinearGradient(0, 0, 0, canvasArr.height);
          clg.addColorStop(0, '#0596ef')
          clg.addColorStop(1, '#3354dc')
          this.contextbg.fillStyle = clg;
          this.contextbg.arc(canvasArr.width / 2, canvasArr.height / 2, canvasArr.width / 2, 0, Math.PI * 2);
          this.contextbg.closePath();
          this.contextbg.fill();

          this.contextbg.beginPath()
          this.contextbg.fillStyle = '#FFFFFF'
          this.contextbg.arc(canvasArr.width / 2, canvasArr.height / 2, canvasArr.width / 2 - canvasArr.border, 0, Math.PI * 2);
          this.contextbg.closePath();
          this.contextbg.fill();
        }
        // Surrounding background lights
        bglight(cor1, cor2) {
          for (let i = 0; i < canvasArr.lightnum; i++) {
            if (i % 2 == 0) {
              this.contextbg.fillStyle = cor1;
            } else {
              this.contextbg.fillStyle = cor2;
            }
            this.contextbg.beginPath()
            this.contextbg.arc(canvasArr.width / 2 + (canvasArr.width / 2 - canvasArr.border / 2) * Math.cos(360 / canvasArr.lightnum * i * Math.PI / 180), canvasArr.width / 2 + (canvasArr.width / 2 - canvasArr.border / 2) * Math.sin(360 / canvasArr.lightnum * i * Math.PI / 180), canvasArr.lightwid / 2, 0, Math.PI * 2);
            this.contextbg.closePath();
            this.contextbg.fill();
          }
        }
        // Surrounding background lights dynamic
        bglightani() {
          let that = this;
          let i = 0;
          setInterval(function () {
            i++;
            if (i % 2 == 0) {
              that.bglight('#ffb800', '#ffffff')
            } else {
              that.bglight('#ffffff', '#ffb800')
            }
          }, 600)
        }
        // Sectors
        prize() {
          for (let i = 0; i < prizeVal.length; i++) {
            this.context.beginPath()
            if (i % 2 == 0) {
              this.context.fillStyle = "#0596ef";
            } else {
              this.context.fillStyle = "#ffe4d6";
            }
            this.context.moveTo(canvasArr.width / 2, canvasArr.height / 2);
            this.context.arc(canvasArr.width / 2, canvasArr.height / 2, canvasArr.width / 2 - canvasArr.border, 2 * Math.PI / prizeVal.length * i - 0.5 * Math.PI - Math.PI / prizeVal.length, 2 * Math.PI / prizeVal.length * (i + 1) - 0.5 * Math.PI - Math.PI / prizeVal.length);
            this.context.closePath();
            this.context.fill();
          }
        }
        // Draw icon and text
        iconfun() {
          let step = 2 * Math.PI / prizeVal.length
          for (let i = 0; i < prizeVal.length; i++) {
            // Icon
            this.context.save()
            this.context.translate(canvasArr.width / 2, canvasArr.height / 2);
            this.context.rotate(step * (i))
            let img = new Image;
            img.src = $('#' + prizeVal[i].img).attr('src');
            this.context.drawImage(img, -prizeVal[i].wid / 2, -canvasArr.height / 2.4, prizeVal[i].wid, prizeVal[i].hei);
            // Text
            let textval = prizeVal[i].text.split(',')
            for (let j = 0; j < textval.length; j++) {
              this.context.beginPath()
              this.context.font = "bold 48px Microsoft YaHei";
              this.context.textAlign = "center";
              this.context.fillStyle = "#722207";
              this.context.fillText(textval[j], 0, -canvasArr.height / 3.9 + 64 * j);
            }
            this.context.restore()
          }
        }
      }
      new htTurntable().init();
      var is_play = true;
      $('#music_icon').click(function () {
        var myAudio = document.getElementById('music_play');
        $('#mySong').trigger('pause');
        if (is_play == true) {
          is_play = false;
          $('#music_icon img').attr('src', '/public/site/lottery/img/music_stop.png')
          myAudio.pause()
        } else {
          is_play = true;
          $('#music_icon img').attr('src', '/public/site/lottery/img/music.png')
          myAudio.play();
        }
      })
      $(document).on('click', '.close_dialog', function () {
        layer.closeAll();
      })
      $(document).on('click', '.view_details', function () {
        layer.closeAll();
        window.location.reload();
        window.location.href = '/myPrizes';
      })
      $(document).on('click', '#guize', function () {
        layer.open({
          type: 1,
          title: false,
          offset: 'b',
          anim: 'slideUp', // Slide up from bottom
          area: ['100%', 'auto'],
          shade: 0.5,
          shadeClose: true,
          id: 'ID-demo-layer-direction-b',
          content: $('#open_dialog')
        });
      })
    });
  </script>
  <script type="text/javascript">
    document.addEventListener('touchstart', function () {
      var myAudio = document.getElementById('music_play');
      myAudio.play();
    });
  </script>
</body>

</html>