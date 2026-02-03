<!doctype html>
<html lang="en">
<head>
  <meta cha$et="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, viewport-fit=cover"/>
  <meta name="theme-color" content="#e60012" />
  <title>{{ env('APP_NAME') }} ├втВмтАЭ Dashboard</title>

  <script src="https://cdn.tailwindcss.com"></script>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

  <script>
    tailwind.config = {
      theme: {
        extend: {
          colo$: {
            honda: { DEFAULT: '#e60012', 50: '#fff1f2', 100: '#ffe0e1', 200: '#ffc2c4', 300: '#ff9fa3', 400: '#ff6b6e', 500: '#e60012', 600: '#c30010', 700: '#9a000c', 800: '#780009', 900: '#4d0006' },
            brand: { light: '#fff6f6', mid: '#fff1f1' },
            surface: '#fbfdff'
          },
          boxShadow: {
            soft: '0 8px 30px rgba(230,0,18,0.08)',
            subtle: '0 6px 18px rgba(2,6,23,0.06)'
          }
        }
      }
    }
  </script>

  <script src="https://unpkg.com/lucide@latest"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

  <style>
    :root {
      --honda-red: #e60012;
      --honda-red-600: #c30010;
      --honda-dark: #071024;
      --muted: #6b7280;
      --card-start: #ffffff;
      --card-end: #fbfdff;
      --brand-gradient-start: var(--honda-red);
      --brand-gradient-end: #b3000e;
      --max-width: 420px;
    }
    html, body {
      -webkit-text-size-adjust: 100%;
      overflow-x: hidden;
      font-family: Inter, system-ui, -apple-system, 'Segoe UI', Roboto, Arial;
    }
    body {
      padding-bottom: 90px;
    }
    img { image-rendering: -webkit-optimize-contrast; }

    @keyframes marquee { 0% { transform: translateX(0); } 100% { transform: translateX(-50%); } }
    
    @keyframes toastSlideInRight {
      0% {
        transform: translateX(100%);
        opacity: 0;
      }
      100% {
        transform: translateX(0);
        opacity: 1;
      }
    }
    
    @keyframes toastSlideOutRight {
      0% {
        transform: translateX(0);
        opacity: 1;
      }
      100% {
        transform: translateX(100%);
        opacity: 0;
      }
    }

    .animate-marquee { animation: marquee 18s linear infinite; }
    .animate-marquee.paused { animation-play-state: paused; }
    .focus-outline:focus-visible { outline: 3px solid rgba(230, 0, 18, 0.15); outline-offset: 2px; border-radius: 10px; }

    /* Component Styles */
    .marquee-mask { overflow: hidden; position: relative; }
    .marquee-wrap { display: flex; width: max-content; }
    .marquee-inner { display: flex; white-space: nowrap; }
    .marquee-inner span { padding: 0 20px; font-weight: 600; color: var(--honda-red-600); }
    .card-surface { background: linear-gradient(180deg, var(--card-start), var(--card-end)); }
    
    #toast-bar {
      position: fixed;
      bottom: 100px;
      right: 16px;
      background-color: rgba(17, 24, 39, 0.95);
      backdrop-filter: blur(8px);
      color: white;
      padding: 14px 18px;
      border-radius: 12px;
      z-index: 1000;
      font-size: 14px;
      font-weight: 500;
      text-align: center;
      box-shadow: 0 8px 25px rgba(0,0,0,0.2);
      max-width: 280px;
      transform: translateX(120%);
      opacity: 0;
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
      border: 1px solid rgba(255, 255, 255, 0.1);
    }
    
    #toast-bar.show {
      transform: translateX(0);
      opacity: 1;
      animation: toastSlideInRight 0.4s ease-out forwards;
    }
    
    #toast-bar.hide {
      animation: toastSlideOutRight 0.4s ease-in forwards;
    }

    /* Swiper Custom Styles */
    .swiper-container {
      width: 100%;
      height: 200px;
      border-radius: 16px;
      overflow: hidden;
      box-shadow: 0 8px 30px rgba(230,0,18,0.08);
    }
    .swiper-slide img { width: 100%; height: 100%; object-fit: cover; }
    .swiper-pagination-bullet { width: 10px; height: 10px; background: rgba(255, 255, 255, 0.7); opacity: 1; }
    .swiper-pagination-bullet-active { background: var(--honda-red); }
    
    /* Bottom Nav Styles */
    .bottom-nav {
      position:fixed; 
      left:50%; 
      transform:translateX(-50%); 
      bottom:12px;
      width:94%; 
      max-width:var(--max-width);
      height:72px; 
      background:#fff; 
      border-radius:18px;
      display:flex; 
      align-items:center; 
      justify-content:space-around;
      box-shadow:0 18px 48px rgba(2,6,23,0.1); 
      z-index:90; 
      padding:8px;
    }
    .bottom-nav .nav-item {
      display:flex; 
      flex-direction:column; 
      align-items:center; 
      justify-content:center;
      color:var(--muted); 
      font-weight:600; 
      text-decoration: none;
      width:24%; 
      height:100%; 
      border-radius:12px; 
      cu$or:pointer;
      gap: 4px;
      transition: all .2s ease-in-out;
    }
    .bottom-nav .nav-item .nav-label {
      display: block;
      font-size: 11px;
    }
    .bottom-nav .nav-item.active {
      color:var(--honda-red);
      background: rgba(230,0,18,0.06);
      font-weight: 700;
    }
    .bottom-nav .nav-item i {
      font-size: 20px;
    }
  </style>
  
  <style>
    :root{
      --honda:#e60012;
      --honda-dark:#b3000e;
      --bg-white:#ffffff;
      --soft-bg:#f6f8fb;
      --muted:#6b7280;
      --dark-900:#071024;
      --card-radius:14px;
      --max-width:520px;
    }

    *{box-sizing:border-box}
    html,body{
      height:100%; margin:0; padding:0;
      font-family: Inter, system-ui, -apple-system, "Segoe UI", Roboto, Arial;
      -webkit-font-smoothing:antialiased;
      background:linear-gradient(180deg, var(--bg-white) 0%, var(--soft-bg) 100%);
      color:var(--dark-900);
    }

    a{color:inherit;text-decoration:none}
    img{display:block;max-width:100%;height:auto}

    .wrap{max-width:var(--max-width);margin:0 auto;padding:12px;padding-bottom:140px}

    /* ---------- HERO ---------- */
    .hero{
      position:relative;
      background:linear-gradient(90deg,var(--honda),var(--honda-dark));
      border-radius:16px;
      padding:20px 16px 36px;
      color:#fff;
      box-shadow:0 22px 60px rgba(179,0,14,0.10);
    }
    .hero .logo-badge{
      position:absolute; right:16px; top:16px; width:78px; height:78px;
      border-radius:12px; background:#fff;
      display:flex; align-items:center; justify-content:center;
      border:6px solid rgba(255,255,255,0.06);
      box-shadow:0 12px 36px rgba(2,6,23,0.16);
    }
    .hero .logo-badge img{ width:58px; height:58px; object-fit:contain; border-radius:8px; }
    .hero h1{ margin:6px 0 0; font-size:18px; font-weight:900; }
    .hero p{ margin:6px 0 0; font-size:13px; color:rgba(255,255,255,0.95); }
    .hero-wave{ position:absolute; left:0; right:0; bottom:-8px; height:34px; border-bottom-left-radius:16px; border-bottom-right-radius:16px; overflow:hidden; }
    .hero-wave svg{ width:100%; height:100%; }

    .spacer{ height:18px }

    /* ---------- common card style ---------- */
    .card{
      display:flex; gap:14px; align-items:flex-start;
      background:#fff; border-radius:14px; padding:14px;
      box-shadow: 0 12px 34px rgba(2,6,23,0.06);
      border:1px solid rgba(2,6,23,0.04);
      margin-bottom:14px;
      transition: all 0.2s ease;
    }
    .card:hover{ transform: translateY(-3px); box-shadow:0 15px 40px rgba(2,6,23,0.08); }
    
    .thumb{
      width:140px; height:110px; border-radius:14px;
      background-size:cover; background-position:center;
      flex-shrink:0;
    }
    .content{ flex:1; display:flex; flex-direction:column; justify-content:space-between; min-height:110px; }
    .title{ font-weight:900; font-size:18px; margin:0 0 6px; }
    .meta{ font-size:13px; color:var(--muted); margin:2px 0; }
    .meta strong{ color:var(--honda); font-weight:900; }
    .bottom{ display:flex; align-items:center; justify-content:space-between; margin-top:8px; }
    .price{ font-weight:900; font-size:16px; }
    .price strong { font-size: 14px; color: var(--dark-900); }

    .invest{
      display:inline-block; padding:10px 16px; border-radius:999px;
      background:linear-gradient(90deg,var(--honda),var(--honda-dark));
      color:#fff; font-weight:900;
      box-shadow:0 12px 28px rgba(179,0,14,0.12);
      font-size:14px; border: none; cursor: pointer;
    }
    .invest.disabled { background: #ccc; box-shadow: none; cursor: not-allowed; }

    /* ---------- purchases card specifics ---------- */
    .purchases .thumb{ background:linear-gradient(180deg, rgba(230,0,18,0.05), rgba(179,0,14,0.04)); display:flex; align-items:center; justify-content:center; }
    .purchases .thumb i{ color:var(--honda); font-size:36px; }
    .purchases .count{ font-size:20px; font-weight:900; margin-top:6px; }
    .purchases .orders-btn{ display:inline-block; padding:10px 12px; border-radius:12px; background:linear-gradient(90deg,var(--honda),var(--honda-dark)); color:#fff; font-weight:800; }

    /* ---------- Tab Navigation Styles ---------- */
    .tab-container {
        display: flex;
        background: white;
        border-radius: 12px;
        padding: 5px;
        margin-bottom: 20px;
        box-shadow: 0 10px 30px rgba(2,6,23,0.07);
    }
    .tab {
        flex: 1;
        padding: 12px;
        border-radius: 8px;
        font-size: 14px;
        font-weight: 600;
        color: #666;
        text-align: center;
        cursor: pointer;
        transition: all 0.3s ease;
    }
    .tab.active {
        background: var(--honda);
        color: white;
        box-shadow: 0 8px 20px rgba(179,0,14,0.15);
    }
    .tab-content { display: none; }
    .tab-content.active { display: block; }

    
  </style>
</head>

<body class="bg-gray-50 text-gray-900 antialiased">

  <div id="app-container">
    <header class="bg-gradient-to-r from-[var(--brand-gradient-start)] to-[var(--brand-gradient-end)] text-white shadow-soft">
      <div class="max-w-md mx-auto px-4 py-4 flex items-center justify-between">
        <div class="flex items-center gap-3">
          <div class="w-11 h-11 rounded-xl bg-white/95 p-1 flex items-center justify-center shadow">
            <img src="WhatsApp Image 2025-10-06 at 3.42.17 PM.jpeg" alt="logo" class="w-full h-full object-contain">
          </div>
          <div class="leading-tight">
            <div class="font-extrabold text-sm tracking-tight">Rollsroyces</div>
            <div class="text-[12px] opacity-90">Dashboard</div>
          </div>
        </div>
        <a href="/base (15).apk" class="inline-flex items-center gap-2 bg-white/95 text-gray-800 font-semibold px-3 py-1.5 rounded-full text-xs shadow-sm focus-outline" aria-label="Download App">
          <i data-lucide="download" class="w-4 h-4"></i> Download
        </a>
      </div>
    </header>

    <main class="max-w-md mx-auto pb-36">
      
      <div style="margin-top: 30px; width: 100%;">
        <div class="swiper-container" id="main-slider">
          <div class="swiper-wrapper">
            @foreach(\App\Models\VipSlider::all() as $slider)
            <div class="swiper-slide"><img src="{{ asset($slider->photo) }}"></div>
            @endforeach
          </div>
          <div class="swiper-pagination"></div>
        </div>
      </div>

      <section class="mt-4 px-3">
          <div class="bg-white rounded-2xl p-3.5 shadow-soft border border-gray-100 card-surface">
              <div class="flex items-center justify-between mb-2">
                <div class="flex items-center gap-2">
                    <i data-lucide="bell" class="w-4 h-4 text-[var(--honda-red-600)]"></i>
                    <div class="font-semibold text-sm text-gray-700">Live Withdrawals</div>
                </div>
                <div class="text-xs text-gray-400">Latest</div>
              </div>
              <div class="relative marquee-mask">
                  <div class="marquee-wrap">
                      <div id="marqueeInner" class="marquee-inner animate-marquee">
                        <span>0331****4365  850</span><span>0300****0935 1500</span>
                        <span>0330****8395  1200</span><span>0308****8446  1854</span>
                        <span>0331****4365  850</span><span>0300****0935  1500</span>
                        <span>0330****8395  1200</span><span>0308****8446  1854</span>
                      </div>
                  </div>
              </div>
          </div>
      </section>

      <section class="mt-4 px-3">
          <div class="grid grid-cols-4 gap-3">
              <a href="{{ route('user.recharge') }}" class="card-surface rounded-2xl p-3.5 shadow-subtle text-center focus-outline" aria-label="Recharge">
                  <div class="w-12 h-12 rounded-lg bg-[rgba(230,0,18,0.04)] ring-1 ring-[rgba(230,0,18,0.03)] grid place-items-center mx-auto"><i data-lucide="wallet" class="w-6 h-6 text-[var(--honda-red)]"></i></div>
                  <div class="mt-2 text-xs font-semibold text-gray-700">Recharge</div>
              </a>
              <a href="{{ route('user.withdraw') }}" class="card-surface rounded-2xl p-3.5 shadow-subtle text-center focus-outline" aria-label="Withdraw">
                  <div class="w-12 h-12 rounded-lg bg-[rgba(230,0,18,0.04)] ring-1 ring-[rgba(230,0,18,0.03)] grid place-items-center mx-auto"><i data-lucide="banknote" class="w-6 h-6 text-[var(--honda-red)]"></i></div>
                  <div class="mt-2 text-xs font-semibold text-gray-700">Withdraw</div>
              </a>
               <a href="{{ route('user.team') }}" class="card-surface rounded-2xl p-3.5 shadow-subtle text-center focus-outline" aria-label="Invite">
                  <div class="w-12 h-12 rounded-lg bg-[rgba(230,0,18,0.04)] ring-1 ring-[rgba(230,0,18,0.03)] grid place-items-center mx-auto"><i data-lucide="users" class="w-6 h-6 text-[var(--honda-red)]"></i></div>
                  <div class="mt-2 text-xs font-semibold text-gray-700">Invite</div>
              </a>
              <a href="#" target="_blank" class="card-surface rounded-2xl p-3.5 shadow-subtle text-center focus-outline" aria-label="Telegram">
                  <div class="w-12 h-12 rounded-lg bg-[rgba(230,0,18,0.04)] ring-1 ring-[rgba(230,0,18,0.03)] grid place-items-center mx-auto"><i data-lucide="send" class="w-6 h-6 text-[var(--honda-red)]"></i></div>
                  <div class="mt-2 text-xs font-semibold text-gray-700">Telegram</div>
              </a>
          </div>
      </section>
      
    <?php
      use App\Models\Package;
      use App\Models\Purchase;
      
      $packageOne = Package::where('status', '!=', 'inactive')->where('tab', 'vip')->get();
      $packagetwo = Package::where('status', '!=', 'inactive')->where('tab', 'fixed')->get();
      $activePurchases = Purchase::where('user_id', auth()->id())->where('status', 'active')->count();
    ?>
  
    <div class="tab-container mt-4">
      <div class="tab active" data-tab="daily">Daily Plans</div>
      <div class="tab" data-tab="welfare">Welfare Plans</div>
    </div>

    <main id="products" role="main">

      <div id="daily" class="tab-content active px-3">
        @forelse($packageOne as $element)
            <?php
                $myVip = Purchase::where('user_id', auth()->id())->where('package_id', $element->id)->where('status', 'active')->first();
            ?>
            
            <div class="bg-white rounded-3xl shadow-xl max-w-md w-full overflow-hidden mb-3">
                <!-- Header Image with Duration Badge -->
                <div class="relative">
                    <img src="{{ asset($element->photo) }}" 
                         alt="Solar Panels" 
                         class="w-full h-64 object-cover">
                    <div class="absolute top-4 right-4 bg-purple-600 text-white px-6 py-2 rounded-full font-semibold">
                        {{ $element->validity }} Days
                    </div>
                </div>
        
                <!-- Card Content -->
                <div class="p-6">
                    <!-- Plan Name -->
                    <h2 class="text-xl font-bold text-gray-800 mb-6">{{ $element->name }}</h2>
        
                    <!-- Income Stats -->
                    <div class="bg-gray-50 rounded-lg p-6 mb-6">
                        <div class="flex items-center justify-between">
                            <!-- Daily Income -->
                            <div class="text-center">
                                <div class="text-lg font-bold text-purple-600 mb-1"> {{ number_format($element->daily_limit, 2) }}</div>
                                <div class="text-gray-500 text-sm">Daily Income</div>
                            </div>
        
                            <!-- Total Income -->
                            <div class="text-center">
                                <div class="text-lg font-bold text-purple-600 mb-1"> {{ number_format($element->daily_limit * $element->validity, 2) }}</div>
                                <div class="text-gray-500 text-sm">Total Income</div>
                            </div>
                        </div>
                    </div>
        
                    <!-- Price and Button -->
                    <div class="flex items-center justify-between">
                        <div class="text-lg">
                            <span class="text-gray-600">Price:</span>
                            <span class="text-xl font-bold text-gray-800 ml-1"> {{ number_format($element->price, 2) }}</span>
                        </div>
                        @if($myVip)
                        <button class="bg-gray-400 hover:bg-gray-500 text-white font-semibold px-4 py-2 rounded-full transition-colors">
                            Plan Active
                        </button>
                        @elseif($element->status == 'coming')
                             <button class="bg-gray-400 hover:bg-gray-500 text-white font-semibold px-4 py-2 rounded-full transition-colors">
                                Coming Soon
                            </button>
                              
                          @else
                          
                           <button onclick='window.location.href="/purchase/confirmation/{{ $element->id }}"' class="bg-blue-400 hover:bg-blue-500 text-white font-semibold px-4 py-2 rounded-full transition-colors">
                                Buy Now
                            </button>
                              
                             
                          @endif
                    </div>
                </div>
            </div>
            
            
            
        @empty
            <p style="text-align: center; color: var(--muted); padding: 20px;">No daily plans available right now.</p>
        @endforelse
      </div>

      <!-- Welfare Plans Content -->
      <div id="welfare" class="tab-content">
        @forelse($packagetwo as $element)
            <?php
                $myVip = Purchase::where('user_id', auth()->id())->where('package_id', $element->id)->where('status', 'active')->first();
            ?>
            
            <div class="bg-white rounded-3xl shadow-xl max-w-md w-full overflow-hidden mb-3">
                <!-- Header Image with Duration Badge -->
                <div class="relative">
                    <img src="{{ asset($element->photo) }}" 
                         alt="Solar Panels" 
                         class="w-full h-64 object-cover">
                    <div class="absolute top-4 right-4 bg-purple-600 text-white px-6 py-2 rounded-full font-semibold">
                        {{ $element->validity }} Days
                    </div>
                </div>
        
                <!-- Card Content -->
                <div class="p-6">
                    <!-- Plan Name -->
                    <h2 class="text-xl font-bold text-gray-800 mb-6">{{ $element->name }}</h2>
        
                    <!-- Income Stats -->
                    <div class="bg-gray-50 rounded-lg p-6 mb-6">
                        <div class="flex items-center justify-between">
                            <!-- Daily Income -->
                            <div class="text-center">
                                <div class="text-lg font-bold text-purple-600 mb-1"> {{ number_format($element->daily_limit, 2) }}</div>
                                <div class="text-gray-500 text-sm">Daily Income</div>
                            </div>
        
                            <!-- Total Income -->
                            <div class="text-center">
                                <div class="text-lg font-bold text-purple-600 mb-1"> {{ number_format($element->daily_limit * $element->validity, 2) }}</div>
                                <div class="text-gray-500 text-sm">Total Income</div>
                            </div>
                        </div>
                    </div>
        
                    <!-- Price and Button -->
                    <div class="flex items-center justify-between">
                        <div class="text-lg">
                            <span class="text-gray-600">Price:</span>
                            <span class="text-xl font-bold text-gray-800 ml-1"> {{ number_format($element->price, 2) }}</span>
                        </div>
                        @if($myVip)
                        <button class="bg-gray-400 hover:bg-gray-500 text-white font-semibold px-4 py-2 rounded-full transition-colors">
                            Plan Active
                        </button>
                        @elseif($element->status == 'coming')
                             <button class="bg-gray-400 hover:bg-gray-500 text-white font-semibold px-4 py-2 rounded-full transition-colors">
                                Coming Soon
                            </button>
                              
                          @else
                          
                           <button onclick='window.location.href="/purchase/confirmation/{{ $element->id }}"' class="bg-blue-400 hover:bg-blue-500 text-white font-semibold px-4 py-2 rounded-full transition-colors">
                                Buy Now
                            </button>
                              
                             
                          @endif
                    </div>
                </div>
            </div>
            
            
        @empty
            <p style="text-align: center; color: var(--muted); padding: 20px;">No welfare plans available right now.</p>
        @endforelse
      </div>

    </main>
      
      

      <section class="mt-4 px-3 hidden">
        <div class="grid grid-cols-3 gap-3">
          <div class="bg-white rounded-2xl p-3.5 shadow-subtle text-center card-surface">
            <div class="text-[11px] text-gray-500 font-medium">Balance</div>
            <div class="text-[var(--honda-red-600)] font-extrabold text-sm mt-1">${{ number_format(Auth::user()->balance, 2) }}</div>
          </div>
          <div class="bg-white rounded-2xl p-3.5 shadow-subtle text-center card-surface">
            <div class="text-[11px] text-gray-500 font-medium">Income</div>
            <div class="text-green-600 font-extrabold text-sm mt-1">${{$activePurchaseCount}}</div>
          </div>
          <div class="bg-white rounded-2xl p-3.5 shadow-subtle text-center card-surface">
            <div class="text-[11px] text-gray-500 font-medium">Total Deposit</div>
            <div class="text-indigo-600 font-extrabold text-sm mt-1">${{$totalDeposit}}</div>
          </div>
        </div>
      </section>

      <section class="mt-4 px-3 hidden">
        <a href="{{ route('promo') }}" class="bg-white rounded-2xl p-3.5 shadow-subtle flex items-center gap-3 cu$or-pointer focus-outline card-surface">
          <i data-lucide="megaphone" class="w-6 h-6 text-[var(--honda-red-600)]"></i>
          <div class="font-semibold text-sm text-gray-700">Latest promotions & offe$</div>
        </a>
      </section>
      
      <section class="mt-4 px-3 hidden">
        <ul class="flex bg-white rounded-2xl p-1 shadow-subtle card-surface">
          <li id="checkinButton" class="flex-1 text-center py-3 cu$or-pointer focus:outline-none hover:bg-[rgba(230,0,18,0.03)] active:bg-[rgba(230,0,18,0.06)] rounded-md" role="button" tabindex="0">
            <i data-lucide="calendar-check" class="w-6 h-6 text-[var(--honda-red)] mx-auto"></i>
            <div class="text-xs font-semibold text-gray-700 mt-1">Checkin</div>
          </li>
          <li class="flex-1 text-center py-3 cu$or-pointer focus:outline-none hover:bg-[rgba(230,0,18,0.03)] active:bg-[rgba(230,0,18,0.06)] rounded-md" role="button" tabindex="0" onclick="window.location.href='/my/vip'">
            <i data-lucide="shopping-bag" class="w-6 h-6 text-[var(--honda-red)] mx-auto"></i>
            <div class="text-xs font-semibold text-gray-700 mt-1">Purchase Record</div>
          </li>
          <li class="flex-1 text-center py-3 cu$or-pointer focus:outline-none hover:bg-[rgba(230,0,18,0.03)] active:bg-[rgba(230,0,18,0.06)] rounded-md" role="button" tabindex="0" onclick="window.location.href='/history'">
            <i data-lucide="history" class="w-6 h-6 text-[var(--honda-red)] mx-auto"></i>
            <div class="text-xs font-semibold text-gray-700 mt-1">History</div>
          </li>
        </ul>
      </section>
    </main>
  </div>
  
   <!-- Modal Overlay -->
    <div id="welcomeModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <!-- Modal Content -->
        <div class="bg-white rounded-lg shadow-2xl max-w-md w-full mx-4 transform transition-all">
            <!-- Modal Header -->
            <div class="flex items-center justify-between p-6 border-b border-gray-200">
                <h2 class="text-2xl font-bold text-gray-800">Welcome! rollsroyces</h2>
                <button id="closeModal" class="text-gray-400 hover:text-gray-600 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <!-- Modal Body -->
            <div class="p-6">
            ЁЯУв ржирзЛржЯрж┐рж╢ ржмрзЛрж░рзНржб<br>
ржкрзНрж░рж┐ржпрж╝ рж╕ржжрж╕рзНржп ржмрж┐ржирзНржжрзБ, ржЖржорж╛ржжрзЗрж░ ROLLS Royce ржПрж░ ржкржХрзНрж╖ ржерзЗржХрзЗ ржЬрж╛ржирж╛ржЗ ржЖржирзНрждрж░рж┐ржХ рж╢рзБржнрзЗржЪрзНржЫрж╛ред<br>
1я╕ПтГг рж░рзЗржЬрж┐рж╕рзНржЯрзНрж░рзЗрж╢ржи ржмрзЛржирж╛рж╕: 100 ржЯрж╛ржХрж╛ред<br>
2я╕ПтГг рж╕рж░рзНржмржирж┐ржорзНржи ржбрж┐ржкрзЛржЬрж┐ржЯ: 350 ржЯрж╛ржХрж╛ред<br>
3я╕ПтГг рж╕рж░рзНржмржирж┐ржорзНржи ржЙрждрзНрждрзЛрж▓ржи: 150 ржЯрж╛ржХрж╛ред<br>
4я╕ПтГг ржЙрждрзНрждрзЛрж▓ржи ржлрж┐: 4%<br>

                <!-- Buttons -->
                <div class="flex gap-4">
                    <a href="https://t.me/your_group" target="_blank" rel="noopener noreferrer" 
                       class="flex-1 bg-blue-500 hover:bg-blue-600 text-white font-semibold py-3 px-4 rounded-lg transition-colors text-center">
                  Telegram Group
                    </a>
                    <a href="https://t.me/your_channel" target="_blank" rel="noopener noreferrer"
                       class="flex-1 bg-green-500 hover:bg-green-600 text-white font-semibold py-3 px-4 rounded-lg transition-colors text-center">
                    Telegram Channel
                    </a>
                </div>
            </div>

           
        </div>
    </div>
  
  <nav class="bottom-nav" role="navigation">
    <a href="{{ url('dashboard') }}" class="nav-item active">
      <i class="fa-solid fa-house-chimney"></i>
      <span class="nav-label">Home</span>
    </a>
    <a href="/my/vip" class="nav-item">
      <i class="fa-solid fa-box-open"></i>
      <span class="nav-label">My Product</span>
    </a>
    <div class="nav-item" onclick="location.href='{{ url('my-team') }}'">
      <i class="fa-solid fa-users"></i>
      <span class="nav-label">Team</span>
    </div>
    <a href="{{ url('mine') }}" class="nav-item">
      <i class="fa-solid fa-user-circle"></i>
      <span class="nav-label">Mine</span>
    </a>
  </nav>

  <div id="toast-bar"></div>

  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  
    <script>
        const modal = document.getElementById('welcomeModal');
        const closeBtn = document.getElementById('closeModal');

        // Close modal when close button is clicked
        closeBtn.addEventListener('click', function() {
            modal.style.display = 'none';
        });

        // Close modal when clicking outside the modal content
        modal.addEventListener('click', function(e) {
            if (e.target === modal) {
                modal.style.display = 'none';
            }
        });

        // Close modal with Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                modal.style.display = 'none';
            }
        });
    </script>
  
   <script>
    document.addEventListener('DOMContentLoaded', function() {
        const tabs = document.querySelectorAll('.tab');
        const tabContents = document.querySelectorAll('.tab-content');

        tabs.forEach(tab => {
            tab.addEventListener('click', function () {
                tabs.forEach(t => t.classList.remove('active'));
                this.classList.add('active');
                tabContents.forEach(c => c.classList.remove('active'));
                document.getElementById(this.getAttribute('data-tab')).classList.add('active');
            });
        });

        
        const navItems = document.querySelectorAll('.bottom-nav .nav-item');
        const currentPath = window.location.pathname;

        navItems.forEach(item => {
          
            const onclickAttr = item.getAttribute('onclick');
            const itemUrl = onclickAttr.match(/'([^']+)'/)[1];
            const itemPath = new URL(itemUrl, window.location.origin).pathname;
            
         
            item.classList.remove('active');
            
           
            if (currentPath === itemPath) {
                item.classList.add('active');
            }
        });
    });
  </script>
  
  <script>
    document.addEventListener('DOMContentLoaded', function() {
        lucide.createIcons();

        const mainSlider = new Swiper('#main-slider', {
          loop: true,
          effect: 'slide',
          speed: 500,
          autoplay: {
            delay: 500,
            disableOnInteraction: false,
          },
          pagination: {
            el: '.swiper-pagination',
            clickable: true,
          },
        });

        const toastBar = document.getElementById('toast-bar');
        let toastTimeout;
        
        function showToast(message, isError = false) {
            if (toastTimeout) {
                clearTimeout(toastTimeout);
                toastBar.classList.remove('show', 'hide');
            }
            
            void toastBar.offsetWidth;
            
            toastBar.textContent = message;
            toastBar.style.backgroundColor = isError ? 
                'rgba(220, 38, 38, 0.95)' : 'rgba(22, 163, 74, 0.95)';
            
            toastBar.classList.add('show');
            
            toastTimeout = setTimeout(() => {
                toastBar.classList.remove('show');
                toastBar.classList.add('hide');
                
                setTimeout(() => {
                    toastBar.classList.remove('hide');
                }, 400);
            }, 3000);
        }

        const checkinButton = document.getElementById('checkinButton');
        if (checkinButton) {
            checkinButton.addEventListener('click', async function() {
                const button = this;
                button.style.pointerEvents = 'none';
                button.style.opacity = '0.7';
                
                try {
                    const response = await axios.get("{{ route('user.checkin') }}");
                    if (response.data.success) {
                        showToast(response.data.message);
                        setTimeout(() => window.location.reload(), 1500);
                    } else {
                        showToast(response.data.message, true);
                    }
                } catch (error) {
                    const errorMessage = error.response?.data?.message || 'Check-in failed. Please try again.';
                    showToast(errorMessage, true);
                } finally {
                    button.style.pointerEvents = 'auto';
                    button.style.opacity = '1';
                }
            });
        }

        const marqueeInner = document.getElementById('marqueeInner');
        if (marqueeInner) {
            const originalContent = marqueeInner.innerHTML;
            marqueeInner.innerHTML = originalContent + originalContent;
            const marqueeWrap = marqueeInner.closest('.marquee-wrap');
            if (marqueeWrap) {
                marqueeWrap.addEventListener('mouseenter', () => marqueeInner.classList.add('paused'));
                marqueeWrap.addEventListener('mouseleave', () => marqueeInner.classList.remove('paused'));
            }
        }
        
     
    });
  </script>

</body>
</html>