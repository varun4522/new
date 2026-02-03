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
  <meta content='My Profile, You earn profit by funding in the cold drink project - ColdDrinkFund, You earn profit by funding in the cold drink project - ColdDrinkFund' name='keywords' />
  <meta property="article:tag" content="My Profile, You earn profit by funding in the cold drink project - ColdDrinkFund" name='description' />
  <meta content="My Profile, You earn profit by funding in the cold drink project - ColdDrinkFund" name='DC.title' />
  <meta name="theme-color" content="#69b452">
  <meta name="msapplication-navbutton-color" content="#69b452">
  <meta name="apple-mobile-web-app-status-bar-style" content="#69b452">

  <link rel="icon" type="image/x-icon" href="/img/icon.png" />
  <link rel="shortcut icon" href="/img/icon.png" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.9.1/font/bootstrap-icons.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/line-awesome/1.3.0/line-awesome/css/line-awesome.min.css" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="/css/icofont.min.css" />
  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet" />
  <link type="text/css" rel="stylesheet" href="/css/main.css" />
  <link type="text/css" rel="stylesheet" href="/css/head.css" />
  <link type="text/css" rel="stylesheet" href="/css/account.css" />

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script type="text/javascript" src="/js/out.js"></script>
  <link type="text/css" rel="stylesheet" href="/css/resize.css" />
  <title>My Profile, You earn profit by funding in this project - 1x Club </title>
</head>

<body>

  <div class="loading2"></div>
  <div class="all_msg1"></div>
  <div class="all_msg2"></div>
  <div class="sv_back_to_top" id="BackToTop"><i class="fa fa-chevron-up"></i> BACK TO TOP</div>
  <div class="sv_tidio"></div>

  <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-3VN0DCMS5M"></script>
  <script>
    if (typeof window !== 'undefined') {
      window.dataLayer = window.dataLayer || [];
      function gtag(){ window.dataLayer.push(arguments); }
      try { gtag('js', new Date()); gtag('config', 'G-3VN0DCMS5M'); } catch(e) { console.warn('gtag init failed', e); }
    }
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

  <div class="my_pbody">
    <div class="my_msg1"></div>
    <div class="my_msg2"></div>
    <div class="my_msg3"></div>
    <!--Menu--S-->
    <div class="my_menu_body">
      <div class="my_menu_tab">
        <div class="my_menu_b1">
          <div class="my_menu_profile">
            <dd><img src="./pimg/7.png" /></dd>
            <dl>
              <nav>
                <span>#<b id="AidCodeCopyHead">{{ auth()->user()->ref_id }}</b></span><i class="fa fa-clone" onClick="copyDivToClipboard('AidCodeCopyHead');"></i>
              </nav>
              <h1>{{ auth()->user()->name }} </h1>
              <!-- <h2><i class="ri-smartphone-fill"></i>+91 9059216360</h2> -->
            </dl>
          </div>

          <div class="my_menu_exit"><span class="ShowMobileMenuExit"><i class="fa-solid fa-xmark"></i></span></div>
        </div>
        <div class="my_menu_b2">
          <a href="/dashboard" class=" load3 minmr2"><span style="color:;"><i class="fa fa-home"></i></span>
            <h2>Home</h2>
            <dl><em class="fa-solid fa-angle-right"></em></dl>
          </a><a href="/mine" class=" load3 minmr2"><span style="color:;"><i class="bi bi-person-circle"></i></span>
            <h2>Profile Details</h2>
            <dl><em class="fa-solid fa-angle-right"></em></dl>
          </a><a href="/vip" class=" my_menu_active  load3 minmr2"><span style="color:;"><i class="fa-solid fa-chart-simple"></i></span>
            <h2>Our Plans</h2>
            <dl><em class="fa-solid fa-angle-right"></em></dl>
          </a><a href="/my/vip" class=" load3 minmr2"><span style="color:;"><i class="bi bi-receipt"></i></span>
            <h2>My Orders</h2>
            <dl><em class="fa-solid fa-angle-right"></em></dl>
          </a><a href="/user/recharge" class=" load3 minmr2"><span style="color:;"><i class="fa-solid fa-wallet"></i></span>
            <h2>My Recharge</h2>
            <dl><em class="fa-solid fa-angle-right"></em></dl>
          </a><a href="/withdraw" class=" load3 minmr2"><span style="color:;"><i class="fa-solid fa-credit-card"></i></span>
            <h2>My Withdrawal</h2>
            <dl><em class="fa-solid fa-angle-right"></em></dl>
          </a><a href="/my-team" class=" load3 minmr2"><span style="color:;"><i class="ri-team-fill"></i></span>
            <h2>My Friends</h2>
            <dl><em class="fa-solid fa-angle-right"></em></dl>
          </a><a href="/add/card" class=" load3 minmr2"><span style="color:;"><i class="ri-bank-card-fill"></i></span>
            <h2>Update Bank</h2>
            <dl><em class="fa-solid fa-angle-right"></em></dl>
          </a><a href="/deposit/record" class=" load3 minmr2"><span style="color:;"><i class="bi bi-credit-card-fill"></i></span>
            <h2>Recharge Records</h2>
            <dl><em class="fa-solid fa-angle-right"></em></dl>
          </a><a href="/withdraw/record" class=" load3 minmr2"><span style="color:;"><i class="bi bi-credit-card"></i></span>
            <h2>Withdrawal Records</h2>
            <dl><em class="fa-solid fa-angle-right"></em></dl>
          </a><a href="/my/password" class=" load3 minmr2"><span style="color:;"><i class="bi bi-shield-lock-fill"></i></span>
            <h2>Change Password</h2>
            <dl><em class="fa-solid fa-angle-right"></em></dl>
          </a><a href="/help" class=" load3 minmr2"><span style="color:;"><i class="bi bi-ticket-perforated-fill"></i></span>
            <h2>Support Ticket?</h2>
            <dl><em class="fa-solid fa-angle-right"></em></dl>
          </a><a href="/service" class=" load3 minmr2"><span style="color:;"><i class="bi bi-chat-text-fill"></i></span>
            <h2>Customer Care?</h2>
            <dl><em class="fa-solid fa-angle-right"></em></dl>
          </a><a href="/faq" class=" load3 minmr2"><span style="color:;"><i class="bi bi-question-circle-fill"></i></span>
            <h2>F & Q?</h2>
            <dl><em class="fa-solid fa-angle-right"></em></dl>
          </a><a href="/about-us" class=" load3 minmr2"><span style="color:;"><i class="bi bi-info-circle-fill"></i></span>
            <h2>About Us.</h2>
            <dl><em class="fa-solid fa-angle-right"></em></dl>
          </a><a href="/terms" class=" load3 minmr2"><span style="color:;"><i class="ri-file-list-3-fill"></i></span>
            <h2>Term & Conditions.</h2>
            <dl><em class="fa-solid fa-angle-right"></em></dl>
          </a><a href="/privacy" class=" load3 minmr2"><span style="color:;"><i class="ri-shield-check-fill"></i></span>
            <h2>Privacy Policy.</h2>
            <dl><em class="fa-solid fa-angle-right"></em></dl>
          </a><a href="/logout" class=" load3 minmr2"><span style="color:;"><i class="ri-logout-circle-line" style="color:#fff;"></i></span>
            <h2>LogOut.</h2>
            <dl><em class="fa-solid fa-angle-right"></em></dl>
          </a>
        </div>
        <!-- <div class="my_menu_b3">
            <section>
                <dd>
                    <a href="./logout/" class="minmr2 LogOut"><span><i class="ri-logout-circle-line"></i></span>Logout.</a>
                </dd>
                <dl>
                    <a href="./customer-care.php" class="minmr2"><span><i class="fa fa-question-circle"></i></span></a>
                    <a href="./customer-care.php" class="minmr2" style="border-left:1px solid var(--wl2);"><span><i class="fa fa-envelope"></i></span></a>
                </dl>
            </section>
            <article>Made with <i class="fa-solid fa-heart"></i> in india.</article>
        </div> -->

      </div>
    </div>
    <script>
      $(function () {
        $(".ShowMobileMenu").click(function () {

          $(".my_menu_body").fadeIn();
          $(".my_menu_tab").animate({
            left: "0px"
          });
          $(".MenuIconBar").hide();
          $(".MenuIconClose").fadeIn();

        });

        $(".ShowMobileMenuExit").click(function () {
          $(".my_menu_tab").animate({
            left: "-76%"
          });
          $(".my_menu_body").fadeOut();
          $(".MenuIconClose").hide();
          $(".MenuIconBar").fadeIn();
        });

        $('.my_menu_body').click(function (event) {
          if (!$('.my_menu_tab').is(event.target) && $('.my_menu_tab').has(event.target).length === 0) {
            $(".my_menu_tab").animate({
              left: "-76%"
            });
            $(".my_menu_body").fadeOut();
            $(".MenuIconClose").hide();
            $(".MenuIconBar").fadeIn();
          }
        });
      });
      $(document).on('click', '.LogOut', function () {
        var action = 'userLogOut';
        var rurl = '';
        $('.all_msg1').html('<div class="load"><i></i></div>');
        $.post('./__allaction.php', {
          action: action,
          rurl: rurl
        }, function (data) {
          $(".all_msg1").html(data);
        });
      });
    </script>
    <!--Menu--E-->
    <!--FixBottomMenu--E-->
    <div class="sv1_fix">
      <div class="sv1_fix_box  FixBHome" style=""><a class="load2 minmr2 BtnPlay" href="/dashboard"><i></i><span>My Home</span></a></div>

      <div class="sv1_fix_box  FixBTeam" style=""><a href="/my-team" class="load2 minmr2 BtnPlay"><i></i><span>My Friends</span></a></div>

      <div class="sv1_fix_box  FixBView" style=""><a href="/vip" class="load2 minmr2 BtnPlay"><img src="./img/icon.png" /><span>Our Plans</span></a></div>

      <div class="sv1_fix_box  FixBVip" style=""><a href="/my/vip" class="load2 minmr2 BtnPlay"><i></i><span>My Orders</span></a></div>

      <div class="sv1_fix_box sv1_fix_active FixBProfile" style=""><a href="/mine" class="load2 minmr2 BtnPlay"><i></i><span>My Profile</span></a></div>
    </div>
    <!--FixBottomMenu--E-->
    <div class="my_pbody_in">
      <header class="my_thead">
        <section class="my_thead_menu" style="position: relative; margin: 0; height:100%; border: none;">
          <a class="minmr2 ShowMobileMenu">
            <i class="ri-menu-2-line MenuIconBar"></i>
            <i class="fa-solid fa-xmark MenuIconClose"></i>
          </a>
        </section>
        <section class="my_thead_b2">
          <h3>My Profile</h3>
        </section>

        <section class="my_thead_b3">
          <a href="#" class="my_thead_icon tload1">
            <dl>
              <span>
                <sup>0</sup> <i class="fa-solid fa-bell"></i>
              </span>
            </dl>
          </a>
        </section>
      </header>

      <!--Profile--S-->
      <div class="my_account_box1">


        <!--News--S-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.Marquee/1.5.0/jquery.marquee.min.js"></script>
        <div class="pte_news">
          <div class="pte_news_i"><img src="/gifimg/btc.gif" /></div>
          <div class="marquee_text">
            ✔️☑️ User 96****7653 withdrawal balance success <b><i class="fa-solid fa-indian-rupee-sign"></i>4,837.00</b>. ✔️☑️ User 75****1442 withdrawal balance success <b><i class="fa-solid fa-indian-rupee-sign"></i>3,006.00</b>. ✔️☑️ User 68****6172 withdrawal balance success <b><i class="fa-solid fa-indian-rupee-sign"></i>2,258.00</b>. ✔️☑️ User 70****4468 withdrawal balance success <b><i class="fa-solid fa-indian-rupee-sign"></i>2,177.00</b>. ✔️☑️ User 95****5269 withdrawal balance success <b><i class="fa-solid fa-indian-rupee-sign"></i>1,513.00</b>. ✔️☑️ User 87****6645 withdrawal balance success <b><i class="fa-solid fa-indian-rupee-sign"></i>2,891.00</b>. ✔️☑️ User 94****3848 withdrawal balance success <b><i class="fa-solid fa-indian-rupee-sign"></i>3,725.00</b>. ✔️☑️ User 69****7222 withdrawal balance success <b><i class="fa-solid fa-indian-rupee-sign"></i>4,512.00</b>. ✔️☑️ User 91****2291 withdrawal balance success <b><i class="fa-solid fa-indian-rupee-sign"></i>4,571.00</b>. ✔️☑️ User 80****5747 withdrawal balance success <b><i class="fa-solid fa-indian-rupee-sign"></i>174.00</b>. ✔️☑️ User 84****7968 withdrawal balance success <b><i class="fa-solid fa-indian-rupee-sign"></i>906.00</b>. ✔️☑️ User 70****6686 withdrawal balance success <b><i class="fa-solid fa-indian-rupee-sign"></i>3,875.00</b>. ✔️☑️ User 98****7159 withdrawal balance success <b><i class="fa-solid fa-indian-rupee-sign"></i>2,230.00</b>. ✔️☑️ User 66****6980 withdrawal balance success <b><i class="fa-solid fa-indian-rupee-sign"></i>1,411.00</b>. ✔️☑️ User 89****4025 withdrawal balance success <b><i class="fa-solid fa-indian-rupee-sign"></i>760.00</b>. ✔️☑️ User 90****6707 withdrawal balance success <b><i class="fa-solid fa-indian-rupee-sign"></i>4,715.00</b>. ✔️☑️ User 79****1521 withdrawal balance success <b><i class="fa-solid fa-indian-rupee-sign"></i>1,501.00</b>. ✔️☑️ User 94****1626 withdrawal balance success <b><i class="fa-solid fa-indian-rupee-sign"></i>4,756.00</b>. ✔️☑️ User 99****1800 withdrawal balance success <b><i class="fa-solid fa-indian-rupee-sign"></i>3,903.00</b>. ✔️☑️ User 94****4318 withdrawal balance success <b><i class="fa-solid fa-indian-rupee-sign"></i>4,071.00</b>. ✔️☑️ User 92****5122 withdrawal balance success <b><i class="fa-solid fa-indian-rupee-sign"></i>1,891.00</b>. ✔️☑️ User 94****1133 withdrawal balance success <b><i class="fa-solid fa-indian-rupee-sign"></i>3,038.00</b>. ✔️☑️ User 78****9779 withdrawal balance success <b><i class="fa-solid fa-indian-rupee-sign"></i>2,286.00</b>. ✔️☑️ User 81****7600 withdrawal balance success <b><i class="fa-solid fa-indian-rupee-sign"></i>4,580.00</b>. ✔️☑️ User 81****3383 withdrawal balance success <b><i class="fa-solid fa-indian-rupee-sign"></i>3,679.00</b>. ✔️☑️ User 94****4895 withdrawal balance success <b><i class="fa-solid fa-indian-rupee-sign"></i>286.00</b>. </div>

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
        <div class="my_account_tab1">
          <section>
            <a class="my_account_pic tload1" href="#"><i class="fa-solid fa-pen-to-square"></i></a>
            <img src="/pimg/7.png" />
          </section>
          <aside>
            <div class="my_account_t2">
              <div class="my_account_t2_b1">
                <b><i class="fa-solid fa-square-phone"></i></b><span>{{ auth()->user()->phone }}</span>
              </div>

              <div class="my_account_t2_b2">
                <span>AID:</span><b id="AidCodeCopy">{{ auth()->user()->ref_id }}</b><i class="fa-solid fa-copy" onClick="copyDivToClipboard('AidCodeCopy');"></i>
              </div>
            </div>

            <h3>{{ auth()->user()->name }} </h3>
          </aside>
          <nav>
            <a href="#" class="minmr2 tload1 BtnPlay">
              <i class="bi bi-chevron-right"></i>
            </a>
          </nav>
        </div>


      </div>

      <!--Team-Account--S-->
      <div class="my_invite_team_body">
        <div class="my_title_t3">
          <i class="fa-solid fa-wallet"></i> Account Information
        </div>
        <div class="my_invite_team_in">
          <div class="my_account_refresh WalletRefresh"><em class="fa-solid fa-rotate"></em></div>
          <div class="my_invite_team_box my_invite_team_box2">
            <section data-murphy="flip-left">
              <h5>Available Balance</h5>
              <h4><i class="fa-solid fa-indian-rupee-sign"></i>{{ auth()->user()->balance }}</h4>
            </section>
            <section data-murphy="flip-right">
              <h5>Withdrawal Yet</h5>
              <h4><i class="fa-solid fa-indian-rupee-sign"></i>0.00</h4>
            </section>
          </div>

          <div class="my_invite_team_box">
            <section>
              <h3>Today earn:</h3>
              <h2><i class="fa-solid fa-indian-rupee-sign"></i>0.00</h2>
            </section>
            <section>
              <h3>Yesterday earn:</h3>
              <h2><i class="fa-solid fa-indian-rupee-sign"></i>0.00</h2>
            </section>
            <section>
              <h3>Total referrals:</h3>
              <h2><i class="fa-solid fa-user-group"></i>0</h2>
            </section>
          </div>

          <div class="my_invite_team_box">
            <section>
              <h3>Referrals earn:</h3>
              <h2><i class="fa-solid fa-indian-rupee-sign"></i>0.00</h2>
            </section>
            <section>
              <h3>Today team earn:</h3>
              <h2><i class="fa-solid fa-indian-rupee-sign"></i>0.00</h2>
            </section>
            <section>
              <h3>Yesterday team earn:</h3>
              <h2><i class="fa-solid fa-indian-rupee-sign"></i>0.00</h2>
            </section>
          </div>

          <div class="my_invite_team_box">
            <section>
              <h3>Total order:</h3>
              <h2>0</h2>
            </section>
            <section>
              <h3>Daily Profits:</h3>
              <h2><i class="fa-solid fa-indian-rupee-sign"></i>0.00</h2>
            </section>
            <section>
              <h3>Total Profits:</h3>
              <h2><i class="fa-solid fa-indian-rupee-sign"></i>0.00</h2>
            </section>
          </div>
        </div>
      </div>
      <!--Team-Account--E-->

      <!--Tab-Btn--S-->
      <div class="my_account_tab4">

        <div class="my_account_tab4_in2">
          <a href="/user/recharge" class="BtnPlay load2 my_account_recharge">
            <img src="/icon/wallet4.png" />
            <small>Recharge</small>
          </a>
          <a href="/withdraw" class="BtnPlay load2">
            <img src="/icon/withdrawal3.png" />
            <small>Withdrawal</small>
          </a>
          <a href="/my-team" class="BtnPlay load2">
            <img src="/icon/referral2.png" />
            <small>Referral</small>
          </a>
          <!-- <a href="./about-us.php?rurl=aHR0cHM6Ly9jb2xkZHJpbmtmdW5kLmNvbS9teS1wcm9maWxlLnBocA==" class="BtnPlay load2">
            <img src="./icon/telegram3.png" />
            <small>Telegram</small>
        </a> -->
          <a href="/service" class="BtnPlay load2">
            <img src="/icon/help2.png" />
            <small>Help</small>
          </a>
        </div>
      </div>
      <!--Tab-Btn--E-->
      <!--Balance--S-->
      <!--Balance--E-->

      <!--Profile--E-->
      <div class="my_account_tab6">
        <!--DailyReward--S-->
        <a href="/checkin" class="my_account_tab6_tab my_daily_bonus">
          <h1>Daily Login Bonus.</h1>
          <p>Claim your daily reward.</p>
        </a>
        <!--DailyReward--E-->
        <!--Telegram--S-->

        <a href="https://t.me/+bdlIukk4ndA1NDg1" target="_blank" class="my_account_tab6_tab my_telegram_body">
          <h1>Telegram Channel</h1>
          <p>Join for latest updates.</p>
        </a>
        <!--Telegram--E-->
      </div>
      <!--Referral--S-->

      <!--Referral--E-->
      <div class="my_ac_box3">
        <div class="my_title_t3">
          <i class="fa-solid fa-ellipsis-vertical"></i>Records Details
        </div>
        <div class="my_ac_box3_in">
          <a href="/deposit/record" class="minmr2 tload1 BtnPlay"><i class="bi bi-credit-card-fill" style="color:#3DCE32;"></i>
            <h2>Recharge Records<small>Show your amount history and status.</small></h2>
            <dl><em class="fa-solid fa-chevron-right"></em></dl>
          </a>

          <a href="/withdraw/record" class="minmr2 tload1 BtnPlay"><i class="bi bi-credit-card" style="color:#638C09;"></i>
            <h2>Withdrawal Records<small>Show your amount history and status.</small><small></small></h2>
            <dl><em class="fa-solid fa-chevron-right"></em></dl>
          </a>

          <a href="/history" class="minmr2 tload1 BtnPlay"><i class="fa-solid fa-database" style="color:#44D98C;"></i>
            <h2>Payment Records<small>Show your amount history and status.</small><small></small></h2>
            <dl><em class="fa-solid fa-chevron-right"></em></dl>
          </a>
        </div>
      </div>

      <div class="my_ac_box3" data-murphy="fade-right">
        <div class="my_title_t3">
          <i class="fa-solid fa-ellipsis-vertical"></i>Bonus Details
        </div>
        <div class="my_ac_box3_in">
          <a href="/my-team" class="minmr2 tload1 BtnPlay"><i class="fa-solid fa-users" style="color:#C28C63;"></i>
            <h2>Refer & Earn<small>Your team member information and bonus collect.</small></h2>
            <dl><em class="fa-solid fa-chevron-right"></em></dl>
          </a>

          <a href="/tasks" class="minmr2 tload1 BtnPlay"><i class="fa-solid fa-star" style="color:#0F8266;"></i>
            <h2>Invitation Rewards<small>Collect new referral join bonus.</small></h2>
            <dl><em class="fa-solid fa-chevron-right"></em></dl>
          </a>

          <a href="/checkin" class="minmr2 tload1 BtnPlay"><i class="fa-solid fa-clock" style="color:#56777C;"></i>
            <h2>Daily Login Bonus<small>Collect daily login bonus.</small></h2>
            <dl><em class="fa-solid fa-chevron-right"></em></dl>
          </a>
        </div>
      </div>


      <div class="my_ac_box3" data-murphy="fade-right">
        <div class="my_title_t3">
          <i class="fa-solid fa-ellipsis-vertical"></i>Update Details
        </div>
        <div class="my_ac_box3_in">
          <a href="/mine" class="minmr2 tload1 BtnPlay"><i class="fa-regular fa-id-card" style="color:#86C0FC"></i>
            <h2>User Details<small>Member general information.</small></h2>
            <dl><em class="fa-solid fa-chevron-right"></em></dl>
          </a>

          <a href="/add/card" class="minmr2 tload1 BtnPlay"><i class="fa-solid fa-building-columns" style="color:#F52A71;"></i>
            <h2>Bank Details<small>Change or update new bank details.</small></h2>
            <dl><em class="fa-solid fa-chevron-right"></em></dl>
          </a>

          <a href="#" class="minmr2 tload1 BtnPlay"><i class="ri-btc-fill" style="color:#8209BF;"></i>
            <h2>Crypto Details<small>Change or update new crypto wallet address.</small></h2>
            <dl><em class="fa-solid fa-chevron-right"></em></dl>
          </a>

          <a href="/my/password" class="minmr2 tload1 BtnPlay"><i class="bi bi-shield-lock-fill" style="color:#7AFCE9;"></i>
            <h2>Password Change<small>Reset new password.</small></h2>
            <dl><em class="fa-solid fa-chevron-right"></em></dl>
          </a>

          <a href="#" class="minmr2 tload1 BtnPlay"><i class="bi bi-translate" style="color:#DD054E;"></i>
            <h2>Language<small>App default language change.</small></h2>
            <dl>English <em class="fa-solid fa-chevron-right"></em></dl>
          </a>

          <a href="#" class="minmr2 tload1 BtnPlay"><i class="bi bi-currency-exchange" style="color:#F4B1A8;"></i>
            <h2>Currency<small>App default currency change.</small></h2>
            <dl>&#8377; INR <em class="fa-solid fa-chevron-right"></em></dl>
          </a>
        </div>
      </div>

      <div class="my_ac_box3" data-murphy="fade-right">
        <div class="my_title_t3">
          <i class="fa-solid fa-ellipsis-vertical"></i>Help & Other Details
        </div>
        <div class="my_ac_box3_in">
          <a href="#" class="minmr2 tload1 BtnPlay"><i class="fa-solid fa-bell" style="color:#78C979;"></i>
            <h2>Notification<small>Latest information.</small></h2>
            <dl><em class="fa-solid fa-chevron-right"></em></dl>
          </a>

          <a href="/help" class="minmr2 tload1 BtnPlay"><i class="bi bi-ticket-perforated-fill" style="color:#539F96;"></i>
            <h2>Raise a Ticket<small>Help & support by ticket.</small></h2>
            <dl><em class="fa-solid fa-chevron-right"></em></dl>
          </a>

          <a href="/service" class="minmr2 tload1 BtnPlay"><i class="bi bi-chat-text-fill" style="color:#3CD200;"></i>
            <h2>Customer Care?<small>We're here to help.</small></h2>
            <dl><em class="fa-solid fa-chevron-right"></em></dl>
          </a>

          <a href="/faq" class="minmr2 tload1 BtnPlay"><i class="bi bi-question-circle-fill" style="color:#2A199F;"></i>
            <h2>F&Q?<small>Clear your common problems.</small></h2>
            <dl><em class="fa-solid fa-chevron-right"></em></dl>
          </a>

          <a href="/about-us" class="minmr2 tload1 BtnPlay"><i class="bi bi-info-circle-fill" style="color:#C67A1B;"></i>
            <h2>About Us?<small>Get information on our work and company.</small></h2>
            <dl><em class="fa-solid fa-chevron-right"></em></dl>
          </a>

          <a href="/privacy" class="minmr2 tload1 BtnPlay"><i class="ri-shield-check-fill" style="color:#1EDA28;"></i>
            <h2>Privacy Policy.<small>Our policies and procedures on the collection,</small></h2>
            <dl><em class="fa-solid fa-chevron-right"></em></dl>
          </a>

          <a href="/terms" class="minmr2 tload1 BtnPlay"><i class="ri-file-list-3-fill" style="color:#7034A2;"></i>
            <h2>Term & Conditions.<small>The rules of a product or service.</small></h2>
            <dl><em class="fa-solid fa-chevron-right"></em></dl>
          </a>
        </div>
      </div>
      <div class="my_ac_box3" data-murphy="fade-right">
        <div class="my_ac_box3_in">
          <a href="#" class="minmr2 BtnPlay"><i class="bi bi-android2" style="color:#EA40D2;"></i>
            <h2>Download App<small>Android and iOs app download.</small></h2>
            <dl><em class="fa-solid fa-chevron-right"></em></dl>
          </a>


          <a href="/logout" class="minmr2 BtnPlay" style="margin-left: auto;"><i class="fa-solid fa-power-off" style="color:#e80000 !important;"></i>
            <h2>Log Out<small>Log out from your account.</small></h2>
            <dl><em class="fa-solid fa-chevron-right"></em></dl>
          </a>

        </div>
      </div>

      <br>
      <br>

      <!--Notes--S-->
      <div class="my_copy">
        &copy; 2025 - 2026 <span style="">1x Club Media</span> All Rights Reserved.
      </div>
      <!--Notes--E-->
      <br>
      <br>
      <br>

    </div>
  </div>
  <!--Body--E-->
  <script>
    $(document).on('click', '#MusicSetting', function () {
      $(this).toggleClass('fa-volume-high fa-volume-xmark');
      $(".all_msg1").html('<div class="load3_box"></div>');
      ClickBtnPlay();
      var action = 'MusicSetting';
      $.post('./__setting_action.php', {
        action: action
      }, function (data) {
        $(".all_msg1").html(data);
      });
    });
  </script>
  <script src="/js/reveal-animation-murphy.js"></script>
  <script>
    window.murphy.play();
  </script>
  <div class="clearfix"></div>
  <script>
    /* $(document).on('click', '.minm_popup_close', function(){
						$('.minm_popup').fadeOut(300);
						var taburl = 'https://colddrinkfund.com/my-profile.php';
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

    });
  </script>
  <script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015" integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ==" data-cf-beacon='{"version":"2024.11.0","token":"3488a88409724353a65cd0f4b9d0d950","r":1,"server_timing":{"name":{"cfCacheStatus":true,"cfEdge":true,"cfExtPri":true,"cfL4":true,"cfOrigin":true,"cfSpeedBrain":true},"location_startswith":null}}' crossorigin="anonymous"></script>
</body>

</html>