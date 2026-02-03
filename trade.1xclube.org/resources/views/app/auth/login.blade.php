<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />


  <meta property="og:title" content="You earn profit by funding in the cold drink project - ColdDrinkFund" />
  <meta property="og:url" content="https://colddrinkfund.com/" />
  <meta property="og:description" content="You earn profit by funding in the cold drink project - ColdDrinkFund" />
  <meta property="og:site_name" content="You earn profit by funding in the cold drink project - ColdDrinkFund">
  <meta property="og:image" content="https://colddrinkfund.com/img/icon.png" />
  <link href="https://fonts.googleapis.com/css?family=Proxima+Nova:400" rel="stylesheet" />

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet" />
  <meta content='Home, You earn profit by funding in the cold drink project - ColdDrinkFund, You earn profit by funding in the cold drink project - ColdDrinkFund' name='keywords' />
  <meta property="article:tag" content="Home, You earn profit by funding in the cold drink project - ColdDrinkFund" name='description' />
  <meta content="Home, You earn profit by funding in the cold drink project - ColdDrinkFund" name='DC.title' />
  <meta name="theme-color" content="#69b452">
  <meta name="msapplication-navbutton-color" content="#69b452">
  <meta name="apple-mobile-web-app-status-bar-style" content="#69b452">

  <link rel="icon" type="image/x-icon" href="./img/icon.png" />
  <link rel="shortcut icon" href="./img/icon.png" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.9.1/font/bootstrap-icons.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/line-awesome/1.3.0/line-awesome/css/line-awesome.min.css" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="./css/icofont.min.css" />
  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet" />
  <link type="text/css" rel="stylesheet" href="/css/main.css" />
  <link type="text/css" rel="stylesheet" href="/css/head.css" />
  <link type="text/css" rel="stylesheet" href="/css/index.css" />

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script type="text/javascript" src="/js/out.js"></script>
  <link type="text/css" rel="stylesheet" href="/css/resize.css" />
  <title>You earn profit by funding in this project</title>
  <style>
    /* Green linear gradient background for the page */
    html, body, .my_pbody, .my_pbody_in, .my_pbody_in2, .my_login_pbody {
      background-image: linear-gradient(135deg, #27ae60, #2ecc71) !important;
      background: linear-gradient(135deg, #27ae60, #2ecc71) !important;
    }

    /* Splash Screen Styles */
    .splash-screen {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: linear-gradient(135deg, #27ae60, #2ecc71);
      z-index: 9999;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      color: white;
      font-family: 'Rubik', sans-serif;
    }
    .splash-screen img {
      width: 150px;
      height: auto;
      margin-bottom: 20px;
    }
    .splash-screen h1 {
      font-size: 2.5rem;
      margin: 0;
    }
    .splash-screen p {
      font-size: 1.2rem;
      margin-top: 10px;
    }
  </style>
</head>

<body>

  <div class="splash-screen">
    <img src="./img/icon.png" alt="1x Club Logo">
    <h1>Welcome to 1x Club</h1>
    <p>Loading your experience...</p>
  </div>

  <div class="loading2"></div>
  <div class="all_msg1"></div>
  <div class="all_msg2"></div>
  <div class="sv_back_to_top" id="BackToTop"><i class="fa fa-chevron-up"></i> BACK TO TOP</div>
  <div class="sv_tidio"></div>

  <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-3VN0DCMS5M"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-3VN0DCMS5M');
  </script>

  <script>
    //Window Onload In Multipal Use
    var InmSddFunctionOnWindowLoad = function (callback) {
      if (window.addEventListener) {
        window.addEventListener('load', callback, false);
      } else {
        window.attachEvent('onload', callback);
      }
    }
    //Use this type InmSddFunctionOnWindowLoad(window.load function);
    var closepopup = '';

    function load2() {
      $(".loading2").show();
    }

    function rload() {
      setTimeout(function () {
        window.location.href = window.location.href;
      }, 1000);
    }
    $(document).on('click', '.loading2', function () {
      load2();
    });
    $(document).on('click', '.load2', function () {
      load2();
    });
    $(document).on('click', '.load3', function () {
      $('.all_msg2').html('<div class="load3_box"></div>');
    });
    $(document).on('click', '.tload1', function () {
      $('.my_msg1').html('<div class="load3_box"></div>');
    });
  </script>
  <!--Body--S-->
  <link type="text/css" rel="stylesheet" href="/css/loginregister.css" />
  <div class="my_pbody my_login_pbody">
    <div class="my_msg1"></div>
    <div class="my_msg2"></div>
    <div class="my_pbody_in2">
      <div class="my_circule"></div>


      <!--News--S-->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.Marquee/1.5.0/jquery.marquee.min.js"></script>
      <div class="pte_news">
        <div class="pte_news_i"><img src="/gifimg/btc.gif" /></div>
        <div class="marquee_text">
          ✔️☑️ User 81****5213 withdrawal balance success <b><i class="fa-solid fa-indian-rupee-sign"></i>1,743.00</b>. ✔️☑️ User 95****8242 withdrawal balance success <b><i class="fa-solid fa-indian-rupee-sign"></i>1,240.00</b>. ✔️☑️ User 92****2362 withdrawal balance success <b><i class="fa-solid fa-indian-rupee-sign"></i>2,673.00</b>. ✔️☑️ User 96****6212 withdrawal balance success <b><i class="fa-solid fa-indian-rupee-sign"></i>1,981.00</b>. ✔️☑️ User 74****9595 withdrawal balance success <b><i class="fa-solid fa-indian-rupee-sign"></i>4,472.00</b>. ✔️☑️ User 76****4988 withdrawal balance success <b><i class="fa-solid fa-indian-rupee-sign"></i>2,849.00</b>. ✔️☑️ User 80****4552 withdrawal balance success <b><i class="fa-solid fa-indian-rupee-sign"></i>480.00</b>. ✔️☑️ User 88****6712 withdrawal balance success <b><i class="fa-solid fa-indian-rupee-sign"></i>3,775.00</b>. ✔️☑️ User 70****5602 withdrawal balance success <b><i class="fa-solid fa-indian-rupee-sign"></i>816.00</b>. ✔️☑️ User 82****3481 withdrawal balance success <b><i class="fa-solid fa-indian-rupee-sign"></i>3,845.00</b>. ✔️☑️ User 80****7513 withdrawal balance success <b><i class="fa-solid fa-indian-rupee-sign"></i>727.00</b>. ✔️☑️ User 75****7603 withdrawal balance success <b><i class="fa-solid fa-indian-rupee-sign"></i>3,347.00</b>. ✔️☑️ User 88****1013 withdrawal balance success <b><i class="fa-solid fa-indian-rupee-sign"></i>1,936.00</b>. ✔️☑️ User 80****5671 withdrawal balance success <b><i class="fa-solid fa-indian-rupee-sign"></i>3,740.00</b>. ✔️☑️ User 77****3350 withdrawal balance success <b><i class="fa-solid fa-indian-rupee-sign"></i>4,416.00</b>. ✔️☑️ User 95****7595 withdrawal balance success <b><i class="fa-solid fa-indian-rupee-sign"></i>2,820.00</b>. ✔️☑️ User 66****7404 withdrawal balance success <b><i class="fa-solid fa-indian-rupee-sign"></i>1,175.00</b>. ✔️☑️ User 95****5681 withdrawal balance success <b><i class="fa-solid fa-indian-rupee-sign"></i>1,335.00</b>. ✔️☑️ User 72****9125 withdrawal balance success <b><i class="fa-solid fa-indian-rupee-sign"></i>1,866.00</b>. ✔️☑️ User 81****9697 withdrawal balance success <b><i class="fa-solid fa-indian-rupee-sign"></i>396.00</b>. ✔️☑️ User 88****7475 withdrawal balance success <b><i class="fa-solid fa-indian-rupee-sign"></i>4,681.00</b>. ✔️☑️ User 80****5592 withdrawal balance success <b><i class="fa-solid fa-indian-rupee-sign"></i>4,429.00</b>. ✔️☑️ User 87****5105 withdrawal balance success <b><i class="fa-solid fa-indian-rupee-sign"></i>4,925.00</b>. ✔️☑️ User 77****6686 withdrawal balance success <b><i class="fa-solid fa-indian-rupee-sign"></i>2,749.00</b>. ✔️☑️ User 95****1318 withdrawal balance success <b><i class="fa-solid fa-indian-rupee-sign"></i>1,197.00</b>. ✔️☑️ User 71****2688 withdrawal balance success <b><i class="fa-solid fa-indian-rupee-sign"></i>3,551.00</b>. </div>

      </div>
      <!--News--E-->
      <script>
        // Start marquee
        $('.marquee_text').marquee({
          direction: 'left',
          duration: 400000,
          gap: 50,
          delayBeforeStart: 0,
          duplicated: true,
          startVisible: true
        });
      </script>
      <div class="my_login_body">
        <div class="my_login_success" style="display: none;"><img src="/gifimg/success5.gif" /></div>

        <div class="container">

          <div id="basicSliderOuter">
            <div id="basicSlider">
              <ul>

                <li>
                  <ul class="inside-slide">
                    <div class="my_text_sld my_text_t3">You purchase the order and we will make the profit and that too every day.</div>
                  </ul>
                </li>
                <li>
                  <ul class="inside-slide">
                    <div class="my_text_sld my_text_t4">Daily profit daily withdrawal.</div>
                  </ul>
                </li>
                <li>
                  <ul class="inside-slide">
                    <div class="my_text_sld my_text_t1">Start your daily profit. Risk free digital platform.</div>
                  </ul>
                </li>

              </ul>
            </div>
          </div>
          <!-- <div id="slideBtns"></div>  -->
        </div>
        <script id="rendered-js">
          //jquery by helpchrisplz - chris sowerby
          $autoSlideChange = 5000;
          $childNumbers = 0; // this must be 0
          $useSlideBtns = true;
          $slideEffect = "fade"; // fade or slide
          var refreshInterval;

          if ($useSlideBtns == true) {
            $('#basicSlider > ul li').each(function () {
              $childNumbers++;

              var addSlideBtn = "<span class='slidechildNumber" + $childNumbers + "'>" + $childNumbers + "</span>";

              //#slideBtns span
              $(this).addClass('slidechildNumber' + $childNumbers);
              $('#slideBtns').append(addSlideBtn);
            });
            $("#slideBtns span:nth-child(1)").addClass("slideBtns");
          }



          //call resizeMyWindow function when the window is resized
          var basicSliderResizeTimer;
          $(window).resize(function () {
            clearTimeout(basicSliderResizeTimer);
            basicSliderResizeTimer = setTimeout(basicSliderResizeMyWindow, 100);
          });

          function basicSliderResizeMyWindow() {
            slideCount = $('#basicSlider > ul li').length;
            slideWidth = $('#basicSlider > ul li').width();

            var theParentWidth = $("#basicSlider").parent().width();

            slideWidth = theParentWidth;
            $('#basicSlider > ul li').css("width", slideWidth);

            slideHeight = $('#basicSlider > ul > li:nth-child(2) > ul').height();
            sliderUlWidth = slideCount * slideWidth;

            $('#basicSlider').css({
              width: slideWidth,
              height: slideHeight
            });

            $('#basicSlider > ul').css({
              width: sliderUlWidth,
              marginLeft: -slideWidth
            });


          }
          $('#basicSlider > ul li:last-child').prependTo('#basicSlider > ul');
          basicSliderResizeMyWindow();


          function doNextBtnRight() {
            $("#slideBtns").find(".slideBtns").removeClass("slideBtns").
            next().addClass("slideBtns");

            if (!$("#slideBtns span").hasClass("slideBtns")) {
              $("#slideBtns span:nth-child(1)").addClass("slideBtns");
            }
          }

          function doNextBtnLeft() {
            $("#slideBtns").find(".slideBtns").removeClass("slideBtns").
            prev().addClass("slideBtns");

            if (!$("#slideBtns span").hasClass("slideBtns")) {
              $("#slideBtns span:last-child").addClass("slideBtns");
            }
          }

          function setTheHight() {
            //used if content is difrent sizes. 
            slideHeight = $('#basicSlider > ul > li:nth-child(2) > ul').height();
            $('#basicSlider').animate({
              height: slideHeight
            }, 100);

          }


          function moveLeft(no) {
            if (!no) {
              doNextBtnLeft();
            }
            if ($slideEffect == "fade") {
              $('#basicSlider > ul').animate({
                  opacity: 0.0
                },
                400,
                function () {
                  $('#basicSlider > ul li:last-child').prependTo('#basicSlider > ul');
                  $('#basicSlider > ul').css('opacity', '1.0');
                });
            }
            if ($slideEffect == "slide") {
              $('#basicSlider > ul').animate({
                  left: +slideWidth
                },
                400,
                function () {
                  $('#basicSlider > ul li:last-child').prependTo('#basicSlider > ul');
                  $('#basicSlider > ul').css('left', '0');
                });
            }

            setTimeout(function () {
              setTheHight();
            }, 420);
          };

          function moveRight(no) {
            if (!no) {
              doNextBtnRight();
            }

            if ($slideEffect == "fade") {
              $('#basicSlider > ul').animate({
                  opacity: 0.0
                },
                400,
                function () {
                  $('#basicSlider > ul li:first-child').appendTo('#basicSlider > ul');
                  $('#basicSlider > ul').css('opacity', '1.0');
                });
            }

            if ($slideEffect == "slide") {
              $('#basicSlider > ul').animate({
                  left: -slideWidth
                },
                400,
                function () {
                  $('#basicSlider > ul li:first-child').appendTo('#basicSlider > ul');
                  $('#basicSlider > ul').css('left', '0');
                });
            }


            setTimeout(function () {
              setTheHight();
            }, 420);
          };

          // this block of code is to change the slide if $useSlideBtns is set to true.
          $('#slideBtns span').click(function () {
            clearInterval(refreshInterval);
            // the one you click on
            var numberFromCurrentClass = $(this).prevAll().length + 1;

            // the one that is active
            var numberFromClickedToEnd = $("#slideBtns .slideBtns").prevAll().length + 1;

            //remove old class and update to new position
            $("#slideBtns .slideBtns").removeClass("slideBtns");
            $(this).addClass("slideBtns");

            if (numberFromCurrentClass < numberFromClickedToEnd) {
              var newNumber = numberFromClickedToEnd - numberFromCurrentClass;
              //console.log("minus = "+newNumber)

              for (var i = 0; i < newNumber; i++) {
                if (i == 1) {
                  moveLeft("no");
                } else {
                  setTimeout(function () {
                    moveLeft("no");
                  }, 500);
                }
              }

            } else {
              var newNumber = numberFromCurrentClass - numberFromClickedToEnd;
              //console.log("plus = "+newNumber)

              for (var i = 0; i < newNumber; i++) {
                if (i == 1) {
                  moveRight("no");
                } else {
                  setTimeout(function () {

                    moveRight("no");
                  }, 500);
                }
              }

            }
            refreshInterval = setInterval(update, $autoSlideChange);
          });


          refreshInterval = setInterval(update, $autoSlideChange);

          function update() {
            moveRight();
          }
          //# sourceURL=pen.js
        </script>
        <!--Form--S-->
        <div class="my_login_form">

          <div class="my_login_form_in">
            <div class="my_login_form_t">
              <b>Welcome back</b>
              <span>Log in Account</span>
            </div>
            <!--Form-In--S-->
            <form id="login-form" action="{{url('login')}}" method="POST" class="card" novalidate>
            @csrf
            <div class="my_login_form_bg">
              <article class="my_l_msg" id="userAllMsg"></article>
              <section class="my_login_phone">
                <small id="userPhoneTxt"><i class="fa-solid fa-square-phone"></i> Phone Number (10-digit)</small>
                <aside id="msgPhone">
                  <dl class="my_login_flag">
                    <div class="my_login_flag_set"><img src="./icon/flag_in.jpg" /></div>
                    <div class="my_login_flag_hide" style="display: none;">
                      <li><img src="./icon/flag_in.jpg" /> (+91) INDIA</li>
                    </div>
                  </dl>
                  <span style="font-weight:900;"><i class="fa-solid fa-mobile-retro"></i></span>

                  <input type="text" placeholder="Enter your phone number" name="phone" maxlength="10" onkeyup="this.value = this.value.replace(/[^+\d]+/g, '');" value="" autofocus="autofocus" autocomplete="off" id="userPhone">
                </aside>
                <article class="my_l_msg" id="userPhoneMsg"></article>
              </section>

              <!--<section class="my_login_email" style="display:none;"><small id="userNameTxt"><i class="fa-solid fa-envelope"></i> Email Address</small>-->
              <!--  <aside id="msgEmail"><input type="text" placeholder="Fill your email address" maxlength="50" value="" autofocus autocomplete="off" id="userEmail" /></aside>-->
              <!--  <article class="my_l_msg" id="userEmailMsg"></article>-->
              <!--</section>-->

              <section><small id="userPassTxt"><i class="fa-solid fa-lock"></i> Password</small>
                <aside id="msgPass"><span><i class="fa-solid fa-lock"></i></span><input type="password" name="password" placeholder="Enter your password" value="" autofocus="autofocus" autocomplete="off" id="userPass" /><abbr class="pPassShow"><i class="fa-regular fa-eye-slash"></i></abbr></aside>
                <article class="my_l_msg" id="userPassMsg"></article>
              </section>

              <div class="my_login_form_forgot">
                <label for="KeepMeLogin">
                  <input type="checkbox" id="KeepMeLogin" value="1" /> Keep me logged in.</label>
                <a href="./forgot-password.php" class="tload1">Forgot password ?</a>
              </div>

              <div class="my_form_btn"><button id="userLogin" type="submit">SUBMIT <i class="ri-arrow-right-s-line"></i></button></div>
            </div>
            <!--Form-In--E-->
            </form>


            <div class="my_login_form_btn2"><a href="{{url('register')}}" class="tload1">Create a 1x club account? <span>Register account <i class="ri-arrow-right-circle-line"></i></span></a></div>
          </div>


        </div>
        <!--Form--E-->


      </div>
      <!--Media-Patner--S-->
      <div class="my_login_app clearfix">
        <h3>Get 1x club App</h3>
        <aside>
        </aside>
      </div>

      <!--Media-Patner--E-->

      <div class="my_copy">
        &copy; 2025 - 2026 <span style="">1x club Media</span> All Rights Reserved.
      </div>

    </div>
  </div>
  <input type="hidden" id="userLoginType" value="1" />
  <script>
    $(document).on('click', '.my_forgot_choose section', function () {
      $('.my_forgot_choose section').removeClass('my_forgot_choose_active');
      $(this).addClass('my_forgot_choose_active');
    });
    $(document).on('click', '.my_forgot_email', function () {
      $('.my_login_phone').hide();
      $('.my_login_email').fadeIn(300);
      $('#userEmail').val('');
      $('#userPhone').val('');
      $('#userLoginType').val('2');
    });
    $(document).on('click', '.my_forgot_phone', function () {
      $('.my_login_email').hide();
      $('.my_login_phone').fadeIn(300);
      $('#userEmail').val('');
      $('#userPhone').val('');
      $('#userLoginType').val('1');
    });
    $(document).on('click', '.my_login_flag', function () {
      $('.my_login_flag_hide').toggle(200);
    });
    $(document).on('keyup', '#userPhone', function () {
      $("#msgPhone").css({
        "border-color": "#1f7c03"
      });
      $("#userPhoneMsg").html("");
    });
    $(document).on('keyup', '#userEmail', function () {
      $("#msgEmail").css({
        "border-color": "#1f7c03"
      });
      $("#userEmailMsg").html("");
    });
    $(document).on('keyup', '#userPass', function () {
      $("#msgPass").css({
        "border-color": "#1f7c03"
      });
      $("#userPassMsg").html("");
    });
    $(document).on('keyup', '#CaptchaCode', function () {
      $("#msgCaptchaCode").css({
        "border-color": "#1f7c03"
      });
      $("#userCaptchaCodeMsg").html("");
    });
    var refreshButton = document.querySelector(".captcha-image");
    refreshButton.onclick = function () {
      document.querySelector(".captcha-image").src = './inc/captcha_code.php?' + Date.now();
    }
    var refreshButton2 = document.querySelector(".captcha-image2");
    refreshButton2.onclick = function () {
      document.querySelector(".captcha-image").src = './inc/captcha_code.php?' + Date.now();
    }
  </script>
  <script src="/js/lr.js"></script>
  <!--Body--E-->
  <script src="/js/index.js"></script>
  <div class="clearfix"></div>
  <script>
    /* $(document).on('click', '.minm_popup_close', function(){
						$('.minm_popup').fadeOut(300);
						var taburl = 'https://colddrinkfund.com/';
						//window.history.pushState({},'',taburl);
						window.history.replaceState({}, '', taburl);	
					}); */
    //Empty Link
    $(document).on('click', 'body a', function () {
      //$('body a').click(function(){
      var linkalldata = $(this).attr('href');
      if (typeof linkalldata !== typeof undefined && linkalldata !== false) {
        if (linkalldata.length == 0) {
          $('.all_msg2').html('<div class="give_error_no"><i class="fa fa-exclamation-circle"></i> Page is coming soon please visit some time leta.</div>');
          return false;
        } else {
          return true;
        }
      }
    });
  </script>
  <script src="/js/foot.js"></script>
  <div class="all_fmsg"></div>
  <style>
    @media screen and (max-width:931px) {}

    @media screen and (max-width:768px) {
      body {
        /*	max-width: 420px!important;*/
        margin: 0 auto !important;
      }

      .g11_head1_logo a img {
        max-width: 240px;
      }

      /* .give_error_no, .give_error_yes{
    	display: ;
	} */
    }

    @media screen and (max-width:480px) {}

    @media screen and (max-width:320px) {}
  </style>


  <style>
    /* anim="minmr"*/
    [anim="minmr"] {
      position: relative;
      overflow: hidden;
    }

    .minmr {
      position: relative;
    }

    /* .minmr2{
} */
    [anim="minmr"]:before,
    .minmr:before,
    .minmr2:before {
      content: '';
      position: absolute;
      /*display: block;*/
      background: var(--minmr-background, #999);
      border-radius: 50%;
      pointer-events: none;
      top: calc(var(--y1) * 1px);
      left: calc(var(--x1) * 1px);
      width: calc(var(--d1) * 1px);
      height: calc(var(--d1) * 1px);
      opacity: calc(var(--o1, 1) * var(--minmr-opacity, 0.3));
      transition: calc(var(--t1, 0) * var(--minmr-duration, 600ms)) var(--minmr-easing, linear);
      -webkit-transform: translate(-50%, -50%) scale(var(--s1, 1));
      transform: translate(-50%, -50%) scale(var(--s1, 1));
      -webkit-transform-origin: center;
      transform-origin: center;
    }
  </style>

  <script>
    [].map.call(document.querySelectorAll('[anim="minmr"], .minmr, .minmr2'), function (el) {
      el.addEventListener('click', function (e) {
        e = e.touches ? e.touches[0] : e;
        var r = el.getBoundingClientRect(),
          d = Math.sqrt(Math.pow(r.width, 2) + Math.pow(r.height, 2)) * 2;
        el.style.cssText = "--s1: 0; --o1: 1;";
        el.offsetTop;
        el.style.cssText = "--t1: 1; --o1: 0; --d1: " + d + "; --x1:" + (e.clientX - r.left) + "; --y1:" + (e.clientY - r.top) + ";";
      });
    });
    $(document).on('click', '.load1', function () {
      $('.load').fadeIn(100);
    });
  </script>

  <!--Audio--S-->
  <script>
    function ClickBtnPlay() {
      var audio = document.getElementById("ClickBtnPlay");
      audio.play();
    }

    $(document).on('click', '.BtnPlay', function () {
      ClickBtnPlay();
    });

    function completeOrderPlay() {
      var audio2 = document.getElementById("completeOrderPlay");
      audio2.play();
    }

    function processMusicPlay() {
      var audio3 = document.getElementById("processMusicPlay");
      audio3.play();
    }
  </script>
  <audio id="ClickBtnPlay" src=""></audio>
  <audio id="completeOrderPlay" src=""></audio>
  <audio id="processMusicPlay" src=""></audio>

  <!--Audio--E-->
  <script>
    $(document).ready(function (e) {
      //AccountRefresh
      $(document).on('click', '.AccountRefresh', function () {
        $('.my_msg1').html('<div class="load"></div>');
        var action = 'AccountRefresh';
        $.post('./__ac_action.php', {
          action: action
        }, function (data) {
          $(".my_msg1").html(data);
        });
      });
      //WalletRefresh
      $(document).on('click', '.WalletRefresh', function () {
        $('.my_msg1').html('<div class="load"></div>');
        var action = 'WalletRefresh';
        $.post('./__ac_action.php', {
          action: action
        }, function (data) {
          $(".my_msg1").html(data);
        });
      });
      $(document).on('click', '.MsgPopupClose', function () {
        $('.MsgPopup').fadeOut(300);
      });
      $('body, html').click(function (event) {
        if ((!$('.sv_popup_in').is(event.target) && $('.sv_popup_in').has(event.target).length === 0)) {
          $('.MsgPopup').fadeOut(300);
        }
      });

      if (screen.width <= 768) {

      } else {}

      $(document).on("click", "#BackToTop", function () {
        $("body,html").animate({
          scrollTop: 0
        }, 500);
      });
      $(window).scroll(function () {
        if ($(this).scrollTop() >= 50) {
          $("#BackToTop").fadeIn(200);
        } else {
          $("#BackToTop").fadeOut(200);
        }
      });

      //Empty Link
      $(document).on('click', 'body a', function () {
        //$("body a").click(function(){
        var linkalldata = $(this).attr("href");
        if (typeof linkalldata !== typeof undefined && linkalldata !== false) {
          if (linkalldata.length == 0) {
            $(".all_msg2").html('<div class="give_error_no"><dd><i class="fa fa-exclamation-circle"></i></dd>Page is coming soon please visit some time leta.</div>');
            setTimeout(function () {
              rload()
            }, 2000);
            return false;
          } else {
            return true;
          }
        }
      });
      window.addEventListener("load", function (event) {
        lazyload();
      });

      // Splash Screen Hide
      setTimeout(function() {
        $('.splash-screen').fadeOut(1000);
      }, 3000);

    });
  </script>
  <script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015" integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ==" data-cf-beacon='{"version":"2024.11.0","token":"3488a88409724353a65cd0f4b9d0d950","r":1,"server_timing":{"name":{"cfCacheStatus":true,"cfEdge":true,"cfExtPri":true,"cfL4":true,"cfOrigin":true,"cfSpeedBrain":true},"location_startswith":null}}' crossorigin="anonymous"></script>
</body>

</html>
