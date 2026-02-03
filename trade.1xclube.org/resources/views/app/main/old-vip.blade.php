<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,viewport-fit=cover">
  <meta name="theme-color" content="#e60012" />
  <title>Products — HONDA Civic Income</title>
 <script src="https://cdn.tailwindcss.com"></script>
  <link rel="shortcut icon" type="image/x-icon" href="/IMG_20250918_172903_494.jpg">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

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

    /* ---------- BOTTOM NAV ---------- */
    .bottom-nav{
      position:fixed; left:50%; transform:translateX(-50%); bottom:12px;
      width:94%; max-width:var(--max-width);
      height:78px; background:#fff; border-radius:14px;
      display:flex; align-items:center; justify-content:space-around;
      box-shadow:0 18px 48px rgba(2,6,23,0.08); z-index:60; padding:8px;
    }
    .bottom-nav .nav-item{
      display:flex; flex-direction:column; align-items:center; justify-content:center;
      color:var(--muted); font-weight:600; font-size:12px; 
      width:22%; height:100%; border-radius:10px; cursor:pointer;
      gap: 4px; 
    }
    .bottom-nav .nav-item .nav-label{
      display: block; 
      font-size: 12px;
    }
    .bottom-nav .nav-item.active{
      color:var(--honda);
      font-weight: 800; 
    }
    .bottom-nav .nav-item i{
      font-size: 20px; 
    }
  </style>
</head>
<body>

  <?php
      use App\Models\Package;
      use App\Models\Purchase;
      
      $packageOne = Package::where('status', '!=', 'inactive')->where('tab', 'vip')->get();
      $packagetwo = Package::where('status', '!=', 'inactive')->where('tab', 'fixed')->get();
      $activePurchases = Purchase::where('user_id', auth()->id())->where('status', 'active')->count();
  ?>

  <div class="wrap" role="document">

    <!-- HERO -->
    <header class="hero" role="banner">
      <div class="logo-badge">
        <img src="https://honda-civic.store/ui1/logo.png" alt="HONDA emblem">
      </div>
      <h1>HONDA Civic Income</h1>
      <p>Products & Investment Plans</p>
      <div class="hero-wave">
        <svg viewBox="0 0 1440 60" preserveAspectRatio="none"><path d="M0,28 C360,100 1080,-20 1440,28 L1440,60 L0,60 Z" fill="#fff"></path></svg>
      </div>
    </header>

    <div class="spacer"></div>

    <div class="card purchases" role="region">
      <div class="thumb">
        <i class="fa-solid fa-box-open"></i>
      </div>
      <div class="content">
        <div>
          <h3 class="title">My purchases</h3>
          <div class="meta">Active purchases</div>
          <div class="count">{{ $activePurchases }}</div>
        </div>
        <div class="bottom">
          <div></div>
          <a class="orders-btn" href="{{ url('my/vip') }}">My orders</a>
        </div>
      </div>
    </div>

    <div class="tab-container">
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
                                <div class="text-lg font-bold text-purple-600 mb-1">{{ number_format($element->daily_limit, 2) }}</div>
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
                            <span class="text-xl font-bold text-gray-800 ml-1">{{ number_format($element->price, 2) }}</span>
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
  </div>

  <nav class="bottom-nav" role="navigation">
    <div class="nav-item" onclick="location.href='{{ url('dashboard') }}'">
      <i class="fa-solid fa-house-chimney"></i>
      <span class="nav-label">Home</span>
    </div>
    <div class="nav-item active" onclick="location.href='/my/vip'">
      <i class="fa-solid fa-box-open"></i>
      <span class="nav-label">My Product</span>
    </div>
    <div class="nav-item" onclick="location.href='{{ url('my-team') }}'">
      <i class="fa-solid fa-users"></i>
      <span class="nav-label">Team</span>
    </div>
    <div class="nav-item" onclick="location.href='{{ url('my-profile') }}'">
      <i class="fa-solid fa-user-circle"></i>
      <span class="nav-label">Mine</span>
    </div>
  </nav>

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
</body>
</html>