<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,viewport-fit=cover">
  <meta name="theme-color" content="#e60012" />
  <title>My Team — HONDA Civic Income</title>

  <!-- Favicons Icon -->
  <link rel="shortcut icon" type="image/x-icon" href="/IMG_20250918_172903_494.jpg">

  <!-- Stylesheets -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

  <style>
    :root{
      --honda:#e60012;
      --honda-dark:#b3000e;
      --soft-bg:#f6f8fb;
      --muted:#6b7280;
      --dark-900:#071024;
      --max-width:520px;
    }

    *{box-sizing:border-box}
    html,body{
      height:100%; margin:0; padding:0;
      font-family: Inter, system-ui, -apple-system, "Segoe UI", Roboto, Arial;
      background:linear-gradient(180deg, #fff 0%, var(--soft-bg) 100%);
      color:var(--dark-900);
    }

    a{color:inherit;text-decoration:none}
    .wrap{max-width:var(--max-width);margin:0 auto;padding:12px;padding-bottom:140px}

    /* ---------- HERO ---------- */
    .hero{
      position:relative;
      background:linear-gradient(90deg,var(--honda),var(--honda-dark));
      border-radius:16px;
      padding:20px;
      color:#fff;
      box-shadow:0 22px 60px rgba(179,0,14,0.10);
      display: flex;
      align-items: center;
      gap: 16px;
    }
    .hero .icon-badge {
        width: 50px; height: 50px;
        background: rgba(255,255,255,0.1);
        border-radius: 12px;
        display: flex; align-items: center; justify-content: center;
        flex-shrink: 0;
    }
    .hero .icon-badge i { font-size: 24px; color: #fff; }
    .hero h1{ margin:0; font-size:18px; font-weight:900; }
    .hero p{ margin:4px 0 0; font-size:13px; color:rgba(255,255,255,0.9); }

    /* ---------- Stats & Referral Cards ---------- */
    .stats-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 12px; margin-top: 18px; }
    .stat-card {
        background: #fff; border-radius: 14px; padding: 16px;
        text-align: center; box-shadow: 0 12px 34px rgba(2,6,23,0.06);
        border:1px solid rgba(2,6,23,0.04);
    }
    .stat-value { font-size: 22px; font-weight: 900; color: var(--honda); }
    .stat-label { font-size: 13px; color: var(--muted); margin-top: 4px; }

    .referral-card {
        background: #fff; border-radius: 14px; padding: 16px; margin-top: 18px;
        box-shadow: 0 12px 34px rgba(2,6,23,0.06); border:1px solid rgba(2,6,23,0.04);
    }
    .referral-header { display: flex; align-items: center; gap: 12px; margin-bottom: 12px; }
    .referral-header i { color: var(--honda); }
    .referral-header h3 { margin: 0; font-size: 16px; font-weight: 800; }
    .referral-input-container { position: relative; }
    .referral-input {
        width: 100%; padding: 12px 100px 12px 15px; border: 1px solid #eee;
        border-radius: 10px; font-size: 14px; background: var(--soft-bg);
    }
    .copy-btn {
        position: absolute; right: 0; top: 0; height: 100%;
        padding: 0 20px; background: var(--honda);
        color: white; border: none; border-radius: 0 10px 10px 0;
        font-weight: 700; cursor: pointer;
    }

    /* ---------- Level Cards ---------- */
    .level-card {
        background: #fff; border-radius: 14px; margin-top: 18px;
        box-shadow: 0 12px 34px rgba(2,6,23,0.06);
        border:1px solid rgba(2,6,23,0.04); overflow: hidden;
    }
    .level-header {
        background: var(--soft-bg); padding: 12px 16px;
        display: flex; align-items: center; justify-content: space-between;
        border-bottom: 1px solid #eee;
    }
    .level-title { display: flex; align-items: center; gap: 10px; font-weight: 800; font-size: 15px; }
    .level-title i { color: var(--honda); }
    .level-commission { font-size: 13px; font-weight: 700; color: var(--honda); }
    .level-details { display: grid; grid-template-columns: repeat(3, 1fr); padding: 16px; text-align: center; }
    .detail-value { font-size: 18px; font-weight: 800; }
    .detail-label { font-size: 12px; color: var(--muted); margin-top: 4px; }
    
    /* ---------- Info Card (How it works) ---------- */
    .info-card {
        background: #fff; border-radius: 14px; padding: 16px; margin-top: 18px;
        box-shadow: 0 12px 34px rgba(2,6,23,0.06); border:1px solid rgba(2,6,23,0.04);
    }
    .info-title { font-size: 16px; font-weight: 800; margin-bottom: 12px; display: flex; align-items: center; gap: 10px; }
    .info-title i { color: var(--honda); }
    .step { display: flex; gap: 12px; margin-bottom: 10px; align-items: flex-start; }
    .step-number {
        background: var(--honda); color: white; width: 24px; height: 24px;
        border-radius: 8px; display: flex; align-items: center; justify-content: center;
        flex-shrink: 0; font-size: 14px; font-weight: 700;
    }
    .step-content { flex: 1; font-size: 14px; line-height: 1.6; color: var(--muted); }
    .step-content strong { color: var(--dark-900); font-weight: 600; }

    /* ---------- BOTTOM NAV ---------- */
    .bottom-nav{
      position:fixed; left:50%; transform:translateX(-50%); bottom:12px;
      width:94%; max-width:var(--max-width); height:78px; background:#fff; border-radius:14px;
      display:flex; align-items:center; justify-content:space-around;
      box-shadow:0 18px 48px rgba(2,6,23,0.08); z-index:60; padding:8px;
    }
    .nav-item{
      display:flex; flex-direction:column; align-items:center; justify-content:center;
      color:var(--muted); font-weight:600; font-size:12px;
      width:22%; height:100%; border-radius:10px; cursor:pointer; gap: 4px;
    }
    .nav-item .nav-label{ display: block; font-size: 12px; }
    .nav-item.active{ color:var(--honda); font-weight: 800; background:rgba(230,0,18,0.06); }
    .nav-item i{ font-size: 20px; }

    /* --- NEW: Toast Notification --- */
    #toast-bar {
      position: fixed;
      bottom: 100px;
      left: 50%;
      transform: translate(-50%, 10px);
      background-color: rgba(0, 0, 0, 0.85);
      color: white;
      padding: 12px 24px;
      border-radius: 12px;
      z-index: 1000;
      visibility: hidden;
      opacity: 0;
      transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
      font-weight: 500;
    }
    #toast-bar.show {
      visibility: visible;
      opacity: 1;
      transform: translate(-50%, 0);
    }
  </style>
</head>
<body>
  
  <?php
      $team_size = $team_size ?? 0;
      $totalCommission = $totalCommission ?? 0;
      $totalCommission1 = $totalCommission1 ?? 0;
      $totalDeposit1 = $totalDeposit1 ?? 0;
      $first_level_users = $first_level_users ?? collect();
      $totalCommission2 = $totalCommission2 ?? 0;
      $totalDeposit2 = $totalDeposit2 ?? 0;
      $second_level_users = $second_level_users ?? collect();
      $totalCommission3 = $totalCommission3 ?? 0;
      $totalDeposit3 = $totalDeposit3 ?? 0;
      $third_level_users = $third_level_users ?? collect();
  ?>

  <div class="wrap" role="document">

    <!-- HERO -->
    <header class="hero" role="banner">
        <div class="icon-badge">
            <i class="fa-solid fa-users"></i>
        </div>
        <div>
            <h1>My Team</h1>
            <p>Invite friends and earn rewards</p>
        </div>
    </header>

    <!-- Stats Overview -->
    <div class="stats-grid">
      <div class="stat-card">
        <div class="stat-value">{{ $team_size }}</div>
        <div class="stat-label">Total Members</div>
      </div>
      <div class="stat-card">
        <div class="stat-value">{{ number_format($totalCommission, 2) }}</div>
        <div class="stat-label">Total Commission</div>
      </div>
    </div>

    <!-- Referral Link -->
    <div class="referral-card">
      <div class="referral-header">
        <i class="fa-solid fa-link"></i>
        <h3>Your Referral Link</h3>
      </div>
      <div class="referral-input-container">
        <input type="text" class="referral-input" id="inviteLink" value="{{ url('register').'?inviteCode='.auth()->user()->ref_id }}" readonly>
        <button class="copy-btn" onclick="copyToClipboard()">COPY</button>
      </div>
    </div>

    <!-- Team Levels -->
    <div class="level-card">
      <div class="level-header">
        <div class="level-title"><i class="fa-solid fa-layer-group"></i><span>First Level</span></div>
        <div class="level-commission">22%</div>
      </div>
      <div class="level-details">
        <div class="detail-item">
          <div class="detail-value">{{ number_format($totalCommission1, 2) }}</div>
          <div class="detail-label">Commission</div>
        </div>
        <div class="detail-item">
          <div class="detail-value">{{ number_format($totalDeposit1, 2) }}</div>
          <div class="detail-label">Recharges</div>
        </div>
        <div class="detail-item">
          <div class="detail-value">{{ $first_level_users->count() }}</div>
          <div class="detail-label">Members</div>
        </div>
      </div>
    </div>

    <div class="level-card">
      <div class="level-header">
        <div class="level-title"><i class="fa-solid fa-layer-group"></i><span>Second Level</span></div>
        <div class="level-commission">2%</div>
      </div>
      <div class="level-details">
        <div class="detail-item">
          <div class="detail-value">{{ number_format($totalCommission2, 2) }}</div>
          <div class="detail-label">Commission</div>
        </div>
        <div class="detail-item">
          <div class="detail-value">{{ number_format($totalDeposit2, 2) }}</div>
          <div class="detail-label">Recharges</div>
        </div>
        <div class="detail-item">
          <div class="detail-value">{{ $second_level_users->count() }}</div>
          <div class="detail-label">Members</div>
        </div>
      </div>
    </div>
    
    <div class="level-card">
      <div class="level-header">
        <div class="level-title"><i class="fa-solid fa-layer-group"></i><span>Third Level</span></div>
        <div class="level-commission">1%</div>
      </div>
      <div class="level-details">
        <div class="detail-item">
          <div class="detail-value">{{ number_format($totalCommission3, 2) }}</div>
          <div class="detail-label">Commission</div>
        </div>
        <div class="detail-item">
          <div class="detail-value">{{ number_format($totalDeposit3, 2) }}</div>
          <div class="detail-label">Recharges</div>
        </div>
        <div class="detail-item">
          <div class="detail-value">{{ $third_level_users->count() }}</div>
          <div class="detail-label">Members</div>
        </div>
      </div>
    </div>

    <!-- How It Works -->
    <div class="info-card">
      <div class="info-title"><i class="fa-solid fa-circle-info"></i> How It Works</div>
      <div class="info-text">
        <div class="step">
          <div class="step-number">1</div>
          <div class="step-content"><strong>Copy Your Link:</strong> Click the COPY button to get your unique referral link.</div>
        </div>
        <div class="step">
          <div class="step-number">2</div>
          <div class="step-content"><strong>Share With Friends:</strong> Share this link on social media or directly with your friends.</div>
        </div>
        <div class="step">
          <div class="step-number">3</div>
          <div class="step-content"><strong>Earn Commissions:</strong> You'll earn commissions when friends register with your link and invest.</div>
        </div>
      </div>
    </div>
  </div>

  <!-- BOTTOM NAV -->
  <nav class="bottom-nav" role="navigation">
    <a class="nav-item" href="{{ route('dashboard') }}"><i class="fa-solid fa-house-chimney"></i><span class="nav-label">Home</span></a>
    <a class="nav-item" href="/my/vip"><i class="fa-solid fa-box-open"></i><span class="nav-label">My Product</span></a>
    <a class="nav-item" href="{{ route('user.team') }}"><i class="fa-solid fa-users"></i><span class="nav-label">Team</span></a>
    <a class="nav-item" href="{{ route('mine') }}"><i class="fa-solid fa-user-circle"></i><span class="nav-label">Mine</span></a>
  </nav>

  <div id="toast-bar"></div>

  @include('alert-message')

  <script>
    function showToast(message) {
        const toastBar = document.getElementById('toast-bar');
        if (toastBar) {
            toastBar.textContent = message;
            toastBar.classList.add('show');
            setTimeout(() => {
                toastBar.classList.remove('show');
            }, 3000); 
        }
    }
    
    function copyToClipboard() {
        const input = document.getElementById('inviteLink');
        const textToCopy = input.value;

        if (navigator.clipboard && navigator.clipboard.writeText) {
            navigator.clipboard.writeText(textToCopy).then(() => {
                showToast('Referral link copied successfully!');
            }).catch(err => {
                showToast('Failed to copy.');
            });
        } else {
            input.select();
            document.execCommand('copy');
            showToast('Referral link copied successfully!');
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        const navItems = document.querySelectorAll('.bottom-nav .nav-item');
        const currentPath = window.location.pathname;

        navItems.forEach(item => {
            const itemPath = new URL(item.href).pathname;
            item.classList.remove('active');
            
            if (item.href.includes('my-team')) {
                item.classList.add('active');
            }
        });
    });
  </script>
</body>
</html>