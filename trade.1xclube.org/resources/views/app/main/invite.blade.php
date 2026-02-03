<!DOCTYPE html>
<html lang="en">

<head>

  <!-- Meta -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui, viewport-fit=cover">

   <link rel="shortcut icon" type="image/x-icon" href="/IMG_20250918_172903_494.jpg">
  <title>Invite</title>

 
  <link rel="stylesheet" type="text/css" href="/assets/app/css/style.css?v=191">
  <link rel="stylesheet" href="/assets/app/vendor/swiper/swiper-bundle.min.css">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/toastify-js" type="fa87047e0b3650d36a16211e-text/javascript"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>

<body data-theme-color="color-orange">
  <div class="page-wraper">


    <style>
      .header .header-content .mid-content {
        flex: 1;
        text-align: left;
      }

      .header {
        background-color: #925bf9;
        min-height: 55px;
        z-index: 2;
        border-bottom: 0px solid #dddddd;
      }

      #preloader {
        top: 0;
      }

      i.fa-solid.fa-bell {
        font-size: 22px;
        color: white;
        margin-top: 12px;
        padding-right: 7px;
      }

      i.fa-solid.fa-globe {
        font-size: 22px;
        color: white;
        margin-top: 12px;
        padding-right: 7px;
      }

      .header .sticky-header {
        top: 0px;
        background: #ffffff00;
      }

      .toastify {
        padding: 12px 20px;
        color: #ffffff;
        display: inline-block;
        box-shadow: 0 3px 6px -1px rgba(0, 0, 0, 0.12), 0 10px 36px -4px rgba(77, 96, 232, 0.3);
        background: rgb(36, 6, 89);
        top: 15px;
        border-radius: 10px;
        position: fixed;
        opacity: 0;
        transition: all 0.4s cubic-bezier(0.215, 0.61, 0.355, 1);
        cursor: pointer;
        text-decoration: none;
        max-width: 90%;
        z-index: 2147483647;
      }

      .toastify.on {
        opacity: 1;
      }

      .toast-close {
        opacity: 0.4;
        padding: 0 5px;
      }

      .toastify-right {
        right: 15px;
      }

      .toastify-left {
        left: 15px;
      }

      .toastify-top {
        top: 15px;
      }

      .toastify-bottom {
        bottom: 15px;
      }

      .toastify-rounded {
        border-radius: 25px;
      }

      .toastify-avatar {
        width: 1.5em;
        height: 1.5em;
        margin: 0 5px;
        border-radius: 2px;
      }

      .toastify-center {
        margin-left: auto;
        margin-right: auto;
        left: 0;
        right: 0;
        max-width: fit-content;
      }

      * {
        user-select: none;
      }
    </style>


    <!-- Header -->
    <header class="header">
      <div class="main-bar">
        <div class="container">
          <div class="header-content">

            <div class="mid-content">
              <h5 class="mb-0">Refferal Program</h5>
            </div>
          
          </div>
        </div>
      </div>
    </header>


    <div class="sidebar">
      <div class="author-box mb-2">
        <div class="dz-media">
          <img src="/assets/profile.png" class="rounded-circle" alt="author-image">
        </div>
        <div class="dz-info">
          <span>Good Afternoon</span>
          <h5 class="name">MD ROKI </h5>
        </div>
      </div>
      <ul class="nav navbar-nav">


        <li><a class="nav-link" onclick="if (!window.__cfRLUnblockHandlers) return false; navigate('/');" data-cf-modified-fa87047e0b3650d36a16211e-="">
            <span class="dz-icon bg-pink light">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M9.14373 20.7821V17.7152C9.14372 16.9381 9.77567 16.3067 10.5584 16.3018H13.4326C14.2189 16.3018 14.8563 16.9346 14.8563 17.7152V20.7732C14.8562 21.4473 15.404 21.9951 16.0829 22H18.0438C18.9596 22.0023 19.8388 21.6428 20.4872 21.0007C21.1356 20.3586 21.5 19.4868 21.5 18.5775V9.86585C21.5 9.13139 21.1721 8.43471 20.6046 7.9635L13.943 2.67427C12.7785 1.74912 11.1154 1.77901 9.98539 2.74538L3.46701 7.9635C2.87274 8.42082 2.51755 9.11956 2.5 9.86585V18.5686C2.5 20.4637 4.04738 22 5.95617 22H7.87229C8.19917 22.0023 8.51349 21.8751 8.74547 21.6464C8.97746 21.4178 9.10793 21.1067 9.10792 20.7821H9.14373Z" fill="#130F26" />
              </svg>
            </span>
            <span>Home</span>
          </a></li>


        <li><a class="nav-link" onclick="if (!window.__cfRLUnblockHandlers) return false; navigate('/home/team');" data-cf-modified-fa87047e0b3650d36a16211e-="">
            <span class="dz-icon bg-orange light">
              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20" viewBox="0 0 24 24" version="1.1" class="svg-main-icon">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <polygon points="0 0 24 0 24 24 0 24" />
                  <path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z" fill="#fff" fill-rule="nonzero" />
                  <path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z" fill="#fff" opacity="0.5" />
                </g>
              </svg>
            </span>
            <span>Team</span>
          </a></li>
        <li><a class="nav-link" onclick="if (!window.__cfRLUnblockHandlers) return false; navigate('/home/products');" data-cf-modified-fa87047e0b3650d36a16211e-="">
            <span class="dz-icon bg-skyblue light">
              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18" height="18" viewBox="0 0 24 24" version="1.1" class="svg-main-icon">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <rect x="0" y="0" width="24" height="24" />
                  <rect fill="#00aeff" x="4" y="4" width="7" height="7" rx="1.5" />
                  <path d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z" fill="#fff" opacity="0.5" />
                </g>
              </svg>
            </span>
            <span>Products</span>
          </a></li>
        <li><a class="nav-link" onclick="if (!window.__cfRLUnblockHandlers) return false; navigate('/home/notifications');" data-cf-modified-fa87047e0b3650d36a16211e-="">
            <span class="dz-icon bg-green light">
              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18" height="18" viewBox="0 0 24 24" version="1.1" class="svg-main-icon">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <path d="M17,12 L18.5,12 C19.3284271,12 20,12.6715729 20,13.5 C20,14.3284271 19.3284271,15 18.5,15 L5.5,15 C4.67157288,15 4,14.3284271 4,13.5 C4,12.6715729 4.67157288,12 5.5,12 L7,12 L7.5582739,6.97553494 C7.80974924,4.71225688 9.72279394,3 12,3 C14.2772061,3 16.1902508,4.71225688 16.4417261,6.97553494 L17,12 Z" fill="#fff" />
                  <rect fill="#fff" opacity="0.3" x="10" y="16" width="4" height="4" rx="2" />
                </g>
              </svg>
            </span>
            <span>Notification</span>

          </a></li>
        <li><a class="nav-link" onclick="if (!window.__cfRLUnblockHandlers) return false; navigate('/home/profile');" data-cf-modified-fa87047e0b3650d36a16211e-="">
            <span class="dz-icon bg-yellow light">
              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18" height="18" viewBox="0 0 24 24" version="1.1" class="svg-main-icon">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <polygon points="0 0 24 0 24 24 0 24" />
                  <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#fff" fill-rule="nonzero" opacity="0.3" />
                  <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#fff" fill-rule="nonzero" />
                </g>
              </svg>
            </span>
            <span>Profile</span>
          </a></li>
        <li><a class="nav-link" onclick="if (!window.__cfRLUnblockHandlers) return false; navigate('/home/help');" data-cf-modified-fa87047e0b3650d36a16211e-="">
            <span class="dz-icon bg-skyblue light">
              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18" height="18" viewBox="0 0 24 24" version="1.1" class="svg-main-icon">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <rect x="0" y="0" width="24" height="24" />
                  <path d="M21.9999843,15.009808 L22.0249378,15 L22.0249378,19.5857864 C22.0249378,20.1380712 21.5772226,20.5857864 21.0249378,20.5857864 C20.7597213,20.5857864 20.5053674,20.4804296 20.317831,20.2928932 L18.0249378,18 L6,18 C4.34314575,18 3,16.6568542 3,15 L3,6 C3,4.34314575 4.34314575,3 6,3 L19,3 C20.6568542,3 22,4.34314575 22,6 L22,15 C22,15.0032706 21.9999948,15.0065399 21.9999843,15.009808 Z" fill="#fff" opacity="0.3" />
                  <path d="M7.5,12 C6.67157288,12 6,11.3284271 6,10.5 C6,9.67157288 6.67157288,9 7.5,9 C8.32842712,9 9,9.67157288 9,10.5 C9,11.3284271 8.32842712,12 7.5,12 Z M12.5,12 C11.6715729,12 11,11.3284271 11,10.5 C11,9.67157288 11.6715729,9 12.5,9 C13.3284271,9 14,9.67157288 14,10.5 C14,11.3284271 13.3284271,12 12.5,12 Z M17.5,12 C16.6715729,12 16,11.3284271 16,10.5 C16,9.67157288 16.6715729,9 17.5,9 C18.3284271,9 19,9.67157288 19,10.5 C19,11.3284271 18.3284271,12 17.5,12 Z" fill="#fff" opacity="0.3" />
                </g>
              </svg>
            </span>
            <span>Help & Support</span>

          </a></li>
        <li>
          <a class="nav-link" href="/home/logout">
            <span class="dz-icon bg-red light">
              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18" height="18" viewBox="0 0 24 24" version="1.1" class="svg-main-icon">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <rect x="0" y="0" width="24" height="24" />
                  <path d="M14.0069431,7.00607258 C13.4546584,7.00607258 13.0069431,6.55855153 13.0069431,6.00650634 C13.0069431,5.45446114 13.4546584,5.00694009 14.0069431,5.00694009 L15.0069431,5.00694009 C17.2160821,5.00694009 19.0069431,6.7970243 19.0069431,9.00520507 L19.0069431,15.001735 C19.0069431,17.2099158 17.2160821,19 15.0069431,19 L3.00694311,19 C0.797804106,19 -0.993056895,17.2099158 -0.993056895,15.001735 L-0.993056895,8.99826498 C-0.993056895,6.7900842 0.797804106,5 3.00694311,5 L4.00694793,5 C4.55923268,5 5.00694793,5.44752105 5.00694793,5.99956624 C5.00694793,6.55161144 4.55923268,6.99913249 4.00694793,6.99913249 L3.00694311,6.99913249 C1.90237361,6.99913249 1.00694311,7.89417459 1.00694311,8.99826498 L1.00694311,15.001735 C1.00694311,16.1058254 1.90237361,17.0008675 3.00694311,17.0008675 L15.0069431,17.0008675 C16.1115126,17.0008675 17.0069431,16.1058254 17.0069431,15.001735 L17.0069431,9.00520507 C17.0069431,7.90111468 16.1115126,7.00607258 15.0069431,7.00607258 L14.0069431,7.00607258 Z" fill="#fff" fill-rule="nonzero" opacity="0.3" transform="translate(9.006943, 12.000000) scale(-1, 1) rotate(-90.000000) translate(-9.006943, -12.000000) " />
                  <rect fill="#ff4db8" opacity="0.3" transform="translate(14.000000, 12.000000) rotate(-270.000000) translate(-14.000000, -12.000000) " x="13" y="6" width="2" height="12" rx="1" />
                  <path d="M21.7928932,9.79289322 C22.1834175,9.40236893 22.8165825,9.40236893 23.2071068,9.79289322 C23.5976311,10.1834175 23.5976311,10.8165825 23.2071068,11.2071068 L20.2071068,14.2071068 C19.8165825,14.5976311 19.1834175,14.5976311 18.7928932,14.2071068 L15.7928932,11.2071068 C15.4023689,10.8165825 15.4023689,10.1834175 15.7928932,9.79289322 C16.1834175,9.40236893 16.8165825,9.40236893 17.2071068,9.79289322 L19.5,12.0857864 L21.7928932,9.79289322 Z" fill="#fff" fill-rule="nonzero" transform="translate(19.500000, 12.000000) rotate(-90.000000) translate(-19.500000, -12.000000) " />
                </g>
              </svg>
            </span>
            <span>Logout</span>
          </a>
        </li>

        <li class="nav-label">Settings</li>

        <li>
          <div class="mode">
            <span class="dz-icon bg-green light">
              <i class="fa-solid fa-moon"></i>
            </span>
            <span>Dark Mode</span>
            <div class="custom-switch">
              <input type="checkbox" class="switch-input theme-btn" id="toggle-dark-menu">
              <label class="custom-switch-label" for="toggle-dark-menu"></label>
            </div>
          </div>
        </li>
      </ul>
      <div class="sidebar-bottom">
        <h6 class="name">Solar Ai</h6>
        <p>App Version 1.0</p>
      </div>
    </div>
  
  
    <meta name="theme-color" content="#310d64">

    <style>
      :root {
        --primary-color: #310d64;
        --secondary-color: #0c453a;
        --accent-color: #1a7560;
        --light-bg: #f5f7fa;
        --text-color: #333;
        --border-color: #e0e0e0;
      }

      body {
        background: var(--light-bg);
        font-family: 'Poppins', sans-serif;
        color: var(--text-color);
        padding: 0;
        margin: 0;
      }

      .refer-container {
        max-width: 600px;
        margin: -92px auto;
        padding: 15px;
        margin-bottom: 60px;
      }

      .refer-header {
        text-align: center;
        margin-bottom: 30px;
      }

      .mb-0 {
        margin-bottom: 0 !important;
        color: #ffffff;
        text-align: center;
        font-size: 22px !important;
        margin-top: 25px !important;
      }

      .header {
        background: linear-gradient(135deg, #310d64, #140047);
        min-height: 160px;
        z-index: 2;
        border-bottom: 0px solid #dddddd;
        border-radius: 0px 0px 50px 50px;
      }

      .refer-header h1 {
        color: var(--primary-color);
        font-size: 24px;
        margin-bottom: 10px;
      }

      .refer-header p {
        color: #666;
        font-size: 15px;
      }

      .refer-card {
        background: white;
        border-radius: 15px;
        padding: 20px;
        margin-bottom: 20px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        border: 2px solid white;
      }

      .refer-title {
        font-size: 18px;
        font-weight: 600;
        margin-bottom: 15px;
        color: #310d64;
        display: flex;
        align-items: center;
      }

      .refer-title i {
        margin-right: 10px;
        color: #29095c;
      }

      .refer-code-box {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background: rgb(30 4 80 / 8%);
        padding: 15px;
        border-radius: 10px;
        margin-bottom: 15px;
      }

      .refer-code {
        font-size: 18px;
        font-weight: bold;
        color: #310d64;
      }

      .copy-btn {
        background: #310d64;
        color: white;
        border: none;
        border-radius: 8px;
        padding: 8px 15px;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
      }

      .copy-btn:hover {
        background: #310d64;
      }

      .share-buttons {
        display: flex;
        gap: 10px;
        margin-top: 15px;
      }

      .share-btn {
        flex: 1;
        background: var(--primary-color);
        color: white;
        border: none;
        border-radius: 8px;
        padding: 12px;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
      }

      .share-btn:hover {
        background: var(--secondary-color);
      }

      .share-btn i {
        margin-right: 8px;
      }

      .benefits-list {
        margin-top: 20px;
      }

      .benefit-item {
        display: flex;
        align-items: center;
        margin-bottom: 15px;
      }

      .benefit-icon {
        width: 30px;
        height: 30px;
        background: rgba(17, 90, 75, 0.1);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 15px;
        color: var(--primary-color);
        font-size: 14px;
      }

      .benefit-text {
        flex: 1;
        font-size: 14px;
        color: var(--text-color);
      }

      .commission-levels {
        width: 100%;
        border-collapse: collapse;
        margin-top: 15px;
      }

      .commission-levels th,
      .commission-levels td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid var(--border-color);
      }

      .commission-levels th {
        background: rgb(48 12 99 / 8%);
        color: var(--primary-color);
      }

      .commission-levels tr:last-child td {
        border-bottom: none;
      }

      .faq-item {
        margin-bottom: 15px;
      }

      .faq-question {
        font-weight: 600;
        color: var(--primary-color);
        margin-bottom: 5px;
      }

      .faq-answer {
        color: #666;
        font-size: 14px;
      }

      .refer-stats {
        display: flex;
        justify-content: space-between;
        margin-top: 20px;
      }

      .stat-box {
        background: rgba(17, 90, 75, 0.1);
        padding: 15px;
        border-radius: 10px;
        text-align: center;
        flex: 1;
        margin: 0 5px;
      }

      .stat-value {
        font-size: 20px;
        font-weight: 700;
        color: var(--primary-color);
      }

      .stat-label {
        font-size: 12px;
        color: #666;
        margin-top: 5px;
      }

      .cta-card {
        text-align: center;
        background: rgba(17, 90, 75, 0.1);
        border: 1px solid var(--accent-color);
      }

      .backbutton {
        width: 36px;
        height: 36px;
        background: #ffffff1c;
        border-radius: 12px 12px 12px 12px;
        border: 1px solid #ffffff80;
        line-height: 36px;
        text-align: center;
        position: absolute;
        top: 20px;
        left: 15px;
        color: white;
      }
    </style>

    <div class="refer-container">

      <p class="backbutton" onclick="navigate('/');" data-cf-modified-fa87047e0b3650d36a16211e-="">
        <i class="fa-solid fa-chevron-left" style="color: white;"></i>
      </p>
      <div class="swiper-defult-pagination pagination-dots style-1 p-0"></div>


      <div class="refer-card">
        <div class="refer-title">
          <i class="fas fa-user-plus"></i> Your Referral Information
        </div>

        <div class="refer-code-box">
          <div>
            <div style="font-size: 13px; color: #666; margin-bottom: 5px;">Your Referral Code</div>
            <div class="refer-code">{{auth()->user()->ref_id}}</div>
          </div>
          <button class="copy-btn" onclick="copyToClipboard('{{auth()->user()->ref_id}}')" data-cf-modified-fa87047e0b3650d36a16211e-="">
            Copy
          </button>
        </div>

        <div style="font-size: 13px; color: #666; margin-bottom: 5px;">Your Referral Link</div>
        <div style="word-break: break-all; font-size: 14px; margin-bottom: 15px; color: #444;">
          {{url('register').'?inviteCode='.auth()->user()->ref_id}} </div>

        <div class="share-buttons">
          <button class="share-btn" onclick="copyToClipboard('{{url('register').'?inviteCode='.auth()->user()->ref_id}}')" data-cf-modified-fa87047e0b3650d36a16211e-="">
            <i class="fas fa-copy"></i> Copy Link
          </button>
          <button class="share-btn" onclick="if (!window.__cfRLUnblockHandlers) return false; shareLink()" data-cf-modified-fa87047e0b3650d36a16211e-="">
            <i class="fas fa-share-alt"></i> Share
          </button>
        </div>
      </div>
      
      <?php
        $first_ref = \App\Models\Package::max('ref1');
        $second_ref = \App\Models\Package::max('ref2');
        $third_ref = \App\Models\Package::max('ref3');
      ?>

      <div class="refer-card">
        <div class="refer-title">
          <i class="fas fa-gift"></i> Your Referral Benefits
        </div>

        <div class="benefits-list">
          <div class="benefit-item">
            <div class="benefit-icon">
              <i class="fas fa-rupee-sign"></i>
            </div>
            <div class="benefit-text">
              Earn 27% commission on your direct referrals' investments
            </div>
          </div>

          <div class="benefit-item">
            <div class="benefit-icon">
              <i class="fas fa-users"></i>
            </div>
            <div class="benefit-text">
              Earn 2% commission on Level 2 referrals (friends of your friends)
            </div>
          </div>

          <div class="benefit-item">
            <div class="benefit-icon">
              <i class="fas fa-network-wired"></i>
            </div>
            <div class="benefit-text">
              Earn 1% commission on Level 3 referrals (extended network)
            </div>
          </div>
        </div>
      </div>

      <div class="refer-card">
        <div class="refer-title">
          <i class="fas fa-percentage"></i> Commission Structure
        </div>

        <table class="commission-levels">
          <tr>
            <th>Level</th>
            <th>Relationship</th>
            <th>Commission</th>
          </tr>
          <tr>
            <td>Level 1</td>
            <td>Direct referrals</td>
            <td>27%</td>
          </tr>
          <tr>
            <td>Level 2</td>
            <td>Friends of your friends</td>
            <td>2%</td>
          </tr>
          <tr>
            <td>Level 3</td>
            <td>Extended network</td>
            <td>1%</td>
          </tr>
        </table>
      </div>

      <div class="refer-card">
        <div class="refer-title">
          <i class="fas fa-question-circle"></i> Frequently Asked Questions
        </div>

        <div class="faq-item">
          <div class="faq-question">How do I refer friends?</div>
          <div class="faq-answer">
            Share your unique referral link or code with friends. When they sign up using your link/code and make an investment, you'll earn commissions.
          </div>
        </div>

        <div class="faq-item">
          <div class="faq-question">When will I receive my referral earnings?</div>
          <div class="faq-answer">
            Commissions are credited to your account immediately when your referrals make qualifying investments. You can withdraw these earnings anytime.
          </div>
        </div>

        <div class="faq-item">
          <div class="faq-question">Is there any limit to how many people I can refer?</div>
          <div class="faq-answer">
            No! You can refer unlimited friends and earn commissions from all of them, plus their network up to 3 levels deep.
          </div>
        </div>

        <div class="faq-item">
          <div class="faq-question">How can I maximize my referral earnings?</div>
          <div class="faq-answer">
            Share your link on social media, messaging apps, and with your personal network. The more active users you refer, the more you can earn!
          </div>
        </div>
      </div>

      <div class="refer-card cta-card">
        <h3 style="margin-bottom: 10px; color: var(--primary-color);">Start Earning Today!</h3>
        <p style="margin-bottom: 15px;">Share your referral link now and grow your passive income</p>
        <button class="share-btn" onclick="if (!window.__cfRLUnblockHandlers) return false; shareLink()" style="max-width: 200px; margin: 0 auto;" data-cf-modified-fa87047e0b3650d36a16211e-="">
          <i class="fas fa-share-alt"></i> Share Now
        </button>
      </div>
    </div>

    <script type="text/javascript">
      function copyToClipboard(text) {
        navigator.clipboard.writeText(text).then(() => {
          notify("success", "Copy Success !!");
        }).catch(err => {
          notify("error", "Failed to copy: " + err);
        });
      }

      function shareLink() {
        const url = "https://solar-ai55.com/home/register?invite=P0DBDMG8";
        const text = "Join Solar Ai using my referral code P0DBDMG8 and we both earn rewards!";

        if (navigator.share) {
          navigator.share({
            title: "Earn with Solar Ai",
            text: text,
            url: url,
          }).catch(err => {
            // Fallback if user cancels share
            copyToClipboard(url);
            notify("info", "Link copied! You can now share it manually.");
          });
        } else {
          // Fallback for browsers without Web Share API
          copyToClipboard(url);
          notify("info", "Link copied! You can now share it manually.");
        }
      }
    </script>


    <style>
      /* Footer Navigation */
      .menubar-area {
        position: fixed;
        bottom: 0px;
        left: 0;
        right: 0;
        background: #fff;
        backdrop-filter: blur(10px);
        z-index: 1000;
        width: 100%;
        padding: 10px;
        padding-top: 20px !important;
        padding-bottom: 5px !important;
        box-shadow: 0 12px 26px 0 rgba(0, 0, 0, 0.3);
        border-radius: 25PX 25PX 0PX 0PX;
        margin: 0px;
      }

      .menubar-nav {
        display: flex;
        justify-content: space-around;
        padding: 10px 0;
      }

      .nav-link {
        display: flex;
        flex-direction: column;
        align-items: center;
        color: rgba(255, 255, 255, 0.7);
        text-decoration: none;
        font-size: 12px;
        padding: 5px 10px;
        border-radius: 10px;
        transition: all 0.3s ease;
      }

      .mb-0 {
        margin-bottom: 0 !important;
        color: #ffffff;
        text-align: center;
      }

      .nav-link i {
        font-size: 28px;
        margin-bottom: 5px;
        color: #65656569;
      }

      .nav-link.active,
      .nav-link:hover {
        color: white;
        background: rgba(255, 255, 255, 0.2);
      }

      .nav-link label {
        margin-top: 2px;
        font-size: 12px;
        color: #65656569 ! important;
      }
    </style>




  </div>
 


  <script src="/assets/app/js/jquery.js" type="fa87047e0b3650d36a16211e-text/javascript"></script>
  <script src="/assets/app/vendor/bootstrap/js/bootstrap.bundle.min.js" type="fa87047e0b3650d36a16211e-text/javascript"></script>
  <script src="/assets/app/js/settings.js" type="fa87047e0b3650d36a16211e-text/javascript"></script>
  <script src="/assets/app/js/custom.js?v=45" type="fa87047e0b3650d36a16211e-text/javascript"></script>
  <script src="/assets/app/js/dz.carousel.js" type="fa87047e0b3650d36a16211e-text/javascript"></script>
  <script src="/assets/app/vendor/swiper/swiper-bundle.min.js" type="fa87047e0b3650d36a16211e-text/javascript"></script>

  <div id="responsePopup" style="
display: none;
 position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color:#310d64;
    color: white;
    width: 65%;
    text-align: center;
    padding: 12px 16px;
    border-radius: 10px;
    font-size: 14px;
    font-weight: 500;
    box-shadow: rgba(0, 0, 0, 0.38) 0px 4px 12px;
    z-index: 9999;
    opacity: 1;
    transition: opacity 0.3s;
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.16);"></div>
  <div id="popupOverlay" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; 
     background:rgba(0,0,0,0.3); z-index:9998;"></div>



  <script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function () {
      document.querySelectorAll('input, select, textarea').forEach(function (element) {
        element.oninvalid = function (event) {
          event.preventDefault();
          notify('error', this.validationMessage);
        };
        element.oninput = function () {
          this.setCustomValidity('');
        };
      });

      window.scrollTo(0, 0);

    });

    (function versionCheckAndCleanup() {
      const CURRENT_VERSION = 'v45';
      const STORAGE_VERSION_KEY = 'v45';

      const savedVersion = localStorage.getItem(STORAGE_VERSION_KEY);

      if (savedVersion !== CURRENT_VERSION) {
        console.log('[Cache] Version changed. Clearing stored data...');

        Object.keys(localStorage).forEach(key => {
          if (key.startsWith('swrcache-') || key.startsWith('app_')) {
            localStorage.removeItem(key);
          }
        });

        const dbDeleteRequest = indexedDB.deleteDatabase('AppCacheDB');
        dbDeleteRequest.onsuccess = function () {
          console.log('[IndexedDB] AppCacheDB deleted due to version change.');
        };
        dbDeleteRequest.onerror = function (event) {
          console.error('[IndexedDB] Error deleting DB:', event);
        };

        localStorage.setItem(STORAGE_VERSION_KEY, CURRENT_VERSION);
      } else {
        console.log('[Cache] App version unchanged:', CURRENT_VERSION);
      }
    })();

    function closeIframe() {
      var popup = document.getElementById("popup");
      var iframe = document.getElementById("youtubeVideo");
      iframe.src = iframe.src;
      popup.style.display = "none";
    }

    window.addEventListener("popstate", function (event) {
      location.reload();
    });

    function convertAllFormToAjax() {
      document.querySelectorAll("form").forEach((form) => {
        form.onsubmit = (e) => {
          form.querySelector("button[type=submit]").disabled = true;
          let buttonText = form.querySelector("button[type=submit]").innerHTML;
          form.querySelector("button[type=submit]").innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>';
          e.preventDefault();
          const formData = $(form).serializeArray();
          const jsonData = {};
          formData.forEach(field => {
            jsonData[field.name] = field.value;
          });
          $.ajax({
            url: form.action,
            method: form.method,
            contentType: 'application/json',
            data: JSON.stringify(jsonData),
            success: function (response) {
              try {
                onRequestResponse(response);
              } catch (e) {
                console.log("error", e);
              }
              form.querySelector("button[type=submit]").disabled = false;
              form.querySelector("button[type=submit]").innerHTML = buttonText;
            },
            error: function (xhr, status, error) {
              try {
                onRequestError(error);
              } catch (e) {
                console.log("error", e);
              }
              form.querySelector("button[type=submit]").disabled = false;
              form.querySelector("button[type=submit]").innerHTML = buttonText;
            }
          });
        };
      });
    }

    function showPopup(message) {
      document.getElementById("responsePopup").innerText = message;
      document.getElementById("responsePopup").style.display = "block";
      document.getElementById("popupOverlay").style.display = "block";
      const toast = document.getElementById("responsePopup");
      toast.style.display = "block";
      toast.style.opacity = "1";
    }

    function hidePopup() {
      document.getElementById("responsePopup").style.display = "none";
      document.getElementById("popupOverlay").style.display = "none";
    }

    function notify(status, msg) {
      if (status === "success" || status === "error") {
        showPopup(`${msg}`);
        setTimeout(() => {
          hidePopup();
        }, 1500);
      }
    }

    window.first = false;

    const dbName = 'AppCacheDB';
    const dbVersion = 1;
    const storeName = 'pages';
    let db;

    function openIndexedDB(callback) {
      const request = indexedDB.open(dbName, dbVersion);

      request.onupgradeneeded = function (event) {
        db = event.target.result;
        if (!db.objectStoreNames.contains(storeName)) {
          db.createObjectStore(storeName, {
            keyPath: 'path'
          });
        }
      };

      request.onsuccess = function (event) {
        db = event.target.result;
        if (callback) callback();
      };

      request.onerror = function (event) {
        console.error("IndexedDB error:", event.target.errorCode);
      };
    }

    function savePageToIndexedDB(path, data) {
      if (!db) return;

      const tx = db.transaction([storeName], 'readwrite');
      const store = tx.objectStore(storeName);
      const item = {
        path,
        data,
        timestamp: Date.now()
      };
      store.put(item);
    }

    function getPageFromIndexedDB(path, callback) {
      if (!db) {
        callback(null);
        return;
      }

      const tx = db.transaction([storeName], 'readonly');
      const store = tx.objectStore(storeName);
      const request = store.get(path);

      request.onsuccess = function (event) {
        callback(event.target.result);
      };

      request.onerror = function (event) {
        console.error("Error reading IndexedDB:", event.target.errorCode);
        callback(null);
      };
    }

    function cleanupIndexedDB(maxEntries = 20) {
      if (!db) return;

      const tx = db.transaction([storeName], 'readwrite');
      const store = tx.objectStore(storeName);
      const items = [];

      store.openCursor().onsuccess = function (event) {
        const cursor = event.target.result;
        if (cursor) {
          items.push(cursor.value);
          cursor.continue();
        } else {
          if (items.length > maxEntries) {
            const excess = items.sort((a, b) => a.timestamp - b.timestamp)
              .slice(0, items.length - maxEntries);
            excess.forEach(item => store.delete(item.path));
          }
        }
      };
    }

    function staleWhileRevalidate(path, callback) {
      const ttl = 7 * 24 * 60 * 60 * 1000; // 7 days

      getPageFromIndexedDB(path, function (cacheItem) {
        const now = Date.now();
        const isValid = cacheItem && now - cacheItem.timestamp < ttl;

        if (isValid) {
          callback(cacheItem.data);
        }

        let postData = {
          turbo: "1"
        };
        if (window.first) {
          postData.first = 1;
          window.first = false;
        }

        $.get(path, postData, (fresh) => {
          if (!isValid || fresh !== cacheItem?.data) {
            savePageToIndexedDB(path, fresh);
            cleanupIndexedDB();
            callback(fresh);
          }
        });
      });
    }

    // Initialize IndexedDB
    openIndexedDB(() => {
      console.log("IndexedDB ready");
    });

    function cleanupCache(maxEntries = 20) {
      const keys = Object.keys(localStorage).filter(k => k.startsWith('swrcache-'));

      if (keys.length <= maxEntries) return;

      const sorted = keys.map(k => ({
        key: k,
        timestamp: (() => {
          try {
            return JSON.parse(localStorage.getItem(k)).timestamp || 0;
          } catch {
            return 0;
          }
        })()
      })).sort((a, b) => a.timestamp - b.timestamp);

      const excess = sorted.length - maxEntries;
      for (let i = 0; i < excess; i++) {
        localStorage.removeItem(sorted[i].key);
      }
    }

    window.navRequestId = window.navRequestId || 0;

    function navigate(path, complete = true) {
      window.location.href = path;
     
    }

    function loadFromCache(data, complete, path) {
      if (complete) {
        document.documentElement.innerHTML = data;
        $("#loader").hide();
        setTimeout(() => {
          document.querySelectorAll("script").forEach((old_script) => {
            let script = document.createElement("script");
            if (old_script.src != "") {
              script.src = old_script.src;
              old_script.remove();
              document.body.append(script);
            } else {
              if (old_script.className != "afterLoadScript") {
                script.innerHTML = old_script.innerHTML;
                document.body.append(script);
                old_script.remove();
              }
            }
          });

          document.querySelectorAll("link").forEach((old_link) => {
            let link = document.createElement("link");
            link.href = old_link.href;
            link.rel = "stylesheet";
            old_link.remove();
            document.head.append(link);
          });

          executeComponentScript();
          convertAllFormToAjax();
          try {
            $('#preloader').hide();
          } catch (e) {}
        }, 50);
      } else {
        document.querySelector("#innerBody").innerHTML = data;
        executeComponentScript();
        convertAllFormToAjax();
      }

      history.pushState({}, "", path);
    }

    function closeDropdown(ele) {
      ele.parentElement.parentElement.className = ele.parentElement.parentElement.className.replace("show", "");
    }

    function activeNavigation(ele) {
      $(".side-menu__item").removeClass("active");
      ele.className = 'side-menu__item active';
      if (document.documentElement.clientWidth <= 992) {
        document.querySelector("html").setAttribute("data-toggled", "close");
        document.querySelector("#responsive-overlay").className = '';
      }
    }

    window.onload = function () {
      executeComponentScript();
      convertAllFormToAjax();
    }

    function executeComponentScript() {
      let scriptComponent = document.querySelector('.afterLoadScript');
      if (scriptComponent) {
        try {
          eval(scriptComponent.innerHTML);
        } catch (e) {
          console.log("Error", e);
        }
      }
    }
  </script>


  <!--<script src="index.js" defer></script>-->
  <!--<script src="/assets/app/js/jquery.js"></script>-->
  <!--<script src="/assets/app/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>-->
  <!--<script src="/assets/app/js/settings.js"></script>-->
  <!--<script src="/assets/app/js/custom.js"></script>-->
  <!--<script src="/assets/app/js/dz.carousel.js"></script><!-- Swiper -->
  <!--<script src="/assets/app/vendor/swiper/swiper-bundle.min.js"></script><!-- Swiper -->
  <script src="/cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="fa87047e0b3650d36a16211e-|49" defer></script>
</body>

</html>

