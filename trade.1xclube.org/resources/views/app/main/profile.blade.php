<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Mine — Honda Civic</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

  <style>
    :root{
      --honda: #e60012;
      --honda-dark: #b3000e;
      --muted: #64748b;
      --card-bg: #fff;
      --nav-h: 72px;
      --max-w: 420px;
    }

    html,body{
      height:100%;
      margin:0;
      font-family:Inter,system-ui,-apple-system,'Segoe UI',Roboto,Arial;
      background:linear-gradient(180deg,#fff 0%,#fff5f5 100%);
      -webkit-font-smoothing:antialiased;
      color:#071026;
    }

    .page{
      max-width:var(--max-w);
      margin:0 auto;
      padding:14px;
      padding-bottom:calc(var(--nav-h) + 18px);
      box-sizing:border-box;
    }

    /* Header */
    .header {
      background: linear-gradient(90deg,var(--honda),var(--honda-dark));
      color: #fff;
      padding:18px;
      border-radius:18px;
      box-shadow:0 12px 30px rgba(179,0,14,0.08);
      position:relative;
      overflow:visible;
    }
    .header .user-row { display:flex; gap:12px; align-items:center; }
    .logo-box {
      width:78px; height:78px; border-radius:14px; background:#fff; display:flex; align-items:center; justify-content:center;
      box-shadow:0 8px 22px rgba(2,6,23,0.08); flex-shrink:0; overflow:hidden; cursor:pointer;
    }
    .logo-box img{ width:100%; height:100%; object-fit:cover; display:block }
    .user-name{font-weight:800;font-size:16px}
    .user-id{font-size:12px; opacity: 0.8;}
    .balance-label{font-size:13px;opacity:0.95;margin-top:6px}
    .balance-value{font-size:26px;font-weight:900;margin-top:4px}

    .support-btn {
      position:absolute; right:12px; top:12px;
      background:rgba(255,255,255,0.14); color:#fff; border-radius:10px; padding:8px; border:0;
      cursor:pointer; font-weight:700; display:flex; align-items:center; gap:6px;
    }

    /* Quick actions */
    .actions { display:grid; grid-template-columns:repeat(3,1fr); gap:12px; margin-top:14px; }
    .action-card {
      background:var(--card-bg); border-radius:12px; padding:14px; display:flex; flex-direction:column; align-items:center; gap:10px;
      box-shadow:0 10px 30px rgba(2,6,23,0.06); cursor:pointer; transition:transform .12s ease, box-shadow .12s ease;
    }
    .action-card:active, .action-card:focus { transform:translateY(2px); box-shadow:0 6px 18px rgba(2,6,23,0.08); }
    .action-icon { width:48px;height:48px;border-radius:12px;display:flex;align-items:center;justify-content:center;background:linear-gradient(90deg,var(--honda),var(--honda-dark)); color:#fff; }

    .action-label { font-size:13px; font-weight:700; color:#0b1220; text-align:center; }

    /* Banner */
    .banner { margin-top:14px; border-radius:12px; overflow:hidden; box-shadow:0 10px 30px rgba(2,6,23,0.06) }
    .banner img{ display:block; width:100%; height:auto; object-fit:cover }

    /* Options list */
    .options { margin-top:14px; border-radius:12px; overflow:hidden; background:var(--card-bg); box-shadow:0 12px 30px rgba(2,6,23,0.06); }
    .option { display:flex; gap:12px; align-items:center; padding:12px; border-bottom:1px solid #f1f5f9; cursor:pointer; transition:background .12s ease; }
    .option:focus, .option:hover{ background:#fff5f5; outline:none; }
    .option:last-child{ border-bottom:0 }
    .ico { width:40px;height:40px;border-radius:10px;display:flex;align-items:center;justify-content:center;background:linear-gradient(90deg,var(--honda),var(--honda-dark)); color:#fff }
    .label{ font-weight:800; color:#213547; font-size:14px; flex-grow:1; }

    /* Logout */
    .logout { margin-top:16px; background:linear-gradient(90deg,var(--honda),var(--honda-dark)); color:#fff; padding:12px; border-radius:12px; text-align:center; font-weight:900; box-shadow:0 12px 30px rgba(179,0,14,0.12); cursor:pointer; display:flex; align-items:center; justify-content:center; gap:8px; border:0; }

    /* Floating invite FAB */
    .fab { position:fixed; bottom:calc(var(--nav-h) + 26px); right:16px; width:56px; height:56px; border-radius:999px; background:linear-gradient(90deg,var(--honda),var(--honda-dark)); display:flex;align-items:center;justify-content:center;color:#fff;box-shadow:0 18px 48px rgba(179,0,14,0.18); z-index:40; border:0; }

    /* toast */
    .toast { position:fixed; bottom:calc(var(--nav-h) + 26px); left:50%; transform:translateX(-50%); background:#16a34a; color:#fff; padding:10px 18px; border-radius:10px; box-shadow:0 12px 30px rgba(2,6,23,0.12); z-index:1001; opacity:0; transition:all .22s ease; pointer-events:none; }
    .toast.show{ opacity:1; transform:translateX(-50%) translateY(0); pointer-events:auto }

    /* Bottom nav */
    .bottom-nav{ position:fixed; left:50%; transform:translateX(-50%); bottom:12px; width:94%; max-width:var(--max-w); height:var(--nav-h); background:#fff; border-radius:14px; display:flex; justify-content:space-around; align-items:center; padding:8px 6px; box-shadow:0 18px 48px rgba(2,6,23,0.08); z-index:1000 }
    .bottom-nav .nav-item{ display:flex; flex-direction:column; align-items:center; justify-content:center; gap:4px; /* Adjusted gap */ color:var(--muted); font-weight:800; font-size:12px; text-decoration:none; width:22%; height:100%; border-radius:10px; text-align:center; }
    
    /* === FIX STARTS HERE === */
    .bottom-nav .nav-item .nav-label{ 
      display:block; /* Always show the label */
      font-size:11px; 
    }
    /* === FIX ENDS HERE === */

    .bottom-nav .nav-item.active{ color:var(--honda); background:rgba(230,0,18,0.06) }
    .nav-item:active{ transform:translateY(2px); }

    @media (max-width:360px){
      .user-name{font-size:14px}
      .balance-value{font-size:22px}
      .action-icon{width:44px;height:44px}
      .logo-box{width:64px;height:64px}
      .bottom-nav{height:64px}
    }
  </style>
</head>
<body>
  <div class="page" role="main" aria-label="Profile page">

    <!-- Header -->
    <header class="header" role="banner" aria-labelledby="profile_title">
      <button class="support-btn" aria-label="Customer support" onclick="navigate('#')">
        <i class="fa fa-headphones" aria-hidden="true"></i>
      </button>

      <div class="user-row" id="profile_title">
        <div class="logo-box" aria-hidden="false" title="Click to upload profile picture" onclick="uploadProfile()">
          <img id="profileImage" src="/photo_2025-09-16_21-47-52.jpg" alt="User profile picture">
        </div>

        <div style="flex:1">
          <div class="user-name">{{ auth()->user()->name }}</div>
          <div class="user-id">ID: {{ auth()->user()->phone }}</div>
          <div class="balance-label">Account Balance</div>
          <div class="balance-value">{{ price( auth()->user()->balance ) }}</div>
        </div>
      </div>
    </header>

    <!-- Quick actions -->
    <div class="actions" role="navigation" aria-label="Quick actions">
      <button class="action-card" onclick="navigate('/user/recharge')" aria-label="Recharge">
        <div class="action-icon" aria-hidden="true"><i class="fa fa-credit-card" aria-hidden="true"></i></div>
        <div class="action-label">Recharge</div>
      </button>

      <button class="action-card" onclick="navigate('/withdraw')" aria-label="Withdraw">
        <div class="action-icon" aria-hidden="true"><i class="fa fa-money-bill-transfer" aria-hidden="true"></i></div>
        <div class="action-label">Withdraw</div>
      </button>

      <button class="action-card" onclick="navigate('/history')" aria-label="History">
        <div class="action-icon" aria-hidden="true"><i class="fa fa-clipboard-list" aria-hidden="true"></i></div>
        <div class="action-label">History</div>
      </button>
    </div>

    <!-- Banner -->
    <div class="banner" role="img" aria-label="Invite banner" onclick="navigate('/my-team')">
      <img src="/ui1/4.png" alt="Invite banner" />
    </div>

    <!-- Options -->
    <div class="options" role="list" aria-label="Profile options">
      <div class="option" role="button" tabindex="0" onclick="navigate('/my/vip')" aria-label="Order">
        <div class="ico" aria-hidden="true"><i class="fa fa-box-open" aria-hidden="true"></i></div>
        <div class="label">Order</div>
        <i class="fas fa-chevron-right text-gray-400"></i>
      </div>

      <div class="option" role="button" tabindex="0" onclick="navigate('/deposit/record')" aria-label="Deposit Record">
        <div class="ico" aria-hidden="true"><i class="fa fa-file-invoice-dollar" aria-hidden="true"></i></div>
        <div class="label">Deposit Record</div>
        <i class="fas fa-chevron-right text-gray-400"></i>
      </div>
      
      <div class="option" role="button" tabindex="0" onclick="navigate('/withdraw/record')" aria-label="Withdrawal Record">
        <div class="ico" aria-hidden="true"><i class="fa fa-money-bill-wave" aria-hidden="true"></i></div>
        <div class="label">Withdrawal Record</div>
        <i class="fas fa-chevron-right text-gray-400"></i>
      </div>
     
     <div class="option" role="button" tabindex="0" onclick="navigate('/add/card')" aria-label="Withdrawal Record">
        <div class="ico" aria-hidden="true"><i class="fa fa-credit-card" aria-hidden="true"></i></div>
        <div class="label">Withdrawal Wallet</div>
        <i class="fas fa-chevron-right text-gray-400"></i>
      </div>
      
      <div class="option" role="button" tabindex="0" onclick="navigate('/about-us')" aria-label="About us">
        <div class="ico" aria-hidden="true"><i class="fa fa-info-circle" aria-hidden="true"></i></div>
        <div class="label">About Us</div>
        <i class="fas fa-chevron-right text-gray-400"></i>
      </div>

      <div class="option" role="button" tabindex="0" onclick="navigate('#')" aria-label="App Download">
        <div class="ico" aria-hidden="true"><i class="fa fa-download" aria-hidden="true"></i></div>
        <div class="label">App Download</div>
        <i class="fas fa-chevron-right text-gray-400"></i>
      </div>
    </div>

    <!-- Logout -->
    <button id="logoutBtn" class="logout" aria-label="Log out" onclick="openLogoutModal()">
      <i class="fa fa-right-from-bracket" aria-hidden="true"></i>
      <span>Log Out</span>
    </button>

  </div>

  <!-- Toast -->
  <div id="toast" class="toast" role="status" aria-live="polite">Action successful!</div>

  <!-- FAB Invite -->
  <button class="fab" title="Invite friends" aria-label="Invite friends" onclick="navigate('/my-team')">
    <i class="fa fa-share-nodes" aria-hidden="true"></i>
  </button>

  <!-- Bottom navigation -->
  <nav class="bottom-nav" role="navigation" aria-label="Primary navigation">
    <a href="javascript:void(0);" onclick="navigate('/')" class="nav-item" id="nav-home" aria-label="Home" tabindex="0">
      <i class="fa fa-house-chimney" aria-hidden="true" style="font-size:18px"></i>
      <span class="nav-label">Home</span>
    </a>

    <a href="javascript:void(0);" onclick="navigate('/my/vip')" class="nav-item" id="nav-product" aria-label="Product" tabindex="0">
      <i class="fa fa-store" aria-hidden="true" style="font-size:18px"></i>
      <span class="nav-label">My Product</span>
    </a>

    <a href="javascript:void(0);" onclick="navigate('/my-team')" class="nav-item" id="nav-team" aria-label="Team" tabindex="0">
      <i class="fa fa-users" aria-hidden="true" style="font-size:18px"></i>
      <span class="nav-label">Promotion</span>
    </a>

    <a href="javascript:void(0);" onclick="navigate('/mine')" class="nav-item active" id="nav-mine" aria-current="page" aria-label="Mine" tabindex="0">
      <i class="fa fa-user-circle" aria-hidden="true" style="font-size:18px"></i>
      <span class="nav-label">Profile</span>
    </a>
  </nav>

  <!-- Logout confirmation modal (simple) -->
  <div id="logoutModal" role="dialog" aria-modal="true" aria-hidden="true" class="fixed inset-0 z-[2000] flex items-center justify-center bg-black bg-opacity-40 hidden">
    <div class="bg-white rounded-lg max-w-sm w-11/12 p-6 text-center">
      <h3 class="text-lg font-bold mb-2">Confirm Logout</h3>
      <p class="text-sm text-gray-600 mb-6">Are you sure you want to log out?</p>
      <div class="flex gap-3 justify-center">
        <button onclick="closeLogoutModal()" class="px-4 py-2 rounded-md border border-gray-200">Cancel</button>
        <button id="confirmLogoutBtn" class="px-4 py-2 rounded-md bg-red-600 text-white">Log out</button>
      </div>
    </div>
  </div>
  
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    // Helper to show toast notification
    function showToast(msg = 'Action successful!') {
      const t = document.getElementById('toast');
      if (!t) return;
      t.textContent = msg;
      t.classList.add('show');
      setTimeout(() => t.classList.remove('show'), 2500);
    }

    // Logout modal functions
    function openLogoutModal() {
      document.getElementById('logoutModal').classList.remove('hidden');
      document.getElementById('logoutModal').setAttribute('aria-hidden', 'false');
    }
    function closeLogoutModal() {
      document.getElementById('logoutModal').classList.add('hidden');
      document.getElementById('logoutModal').setAttribute('aria-hidden', 'true');
    }

    // Wire the confirm logout button
    document.getElementById('confirmLogoutBtn').addEventListener('click', function(e) {
      this.disabled = true;
      this.textContent = 'Logging out...';
      navigate('/logout'); 
    });
    
    // Profile picture upload function
    function uploadProfile() {
        let input = document.createElement("input");
        input.accept = ".png,.jpg,.jpeg";
        input.type = "file";
        input.onchange = function () {
            const file = input.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = () => {
                    const base64String = reader.result.split(",")[1];
                    document.querySelector("#profileImage").src = "data:image/png;base64," + base64String;
                    // Using jQuery for the POST request
                    $.post("/home/upload_profile_image", { data: base64String }, (data) => {
                        showToast("Profile image updated!");
                    }).fail(() => {
                        showToast("Failed to update image.");
                    });
                };
                reader.readAsDataURL(file);
            }
        }
        input.click();
    }
    
    // Main navigation function
    function navigate(path) {
        window.location.href = path;
    }
    
    // Simplified notification function
    function notify(status, msg) {
        showToast(msg);
    }

    // Execute when the page is fully loaded
    window.onload = function () {
      document.querySelectorAll('.option, button, a, .action-card').forEach(el=>{
        el.addEventListener('keyup', e => { if(e.key === 'Enter' || e.key === ' ') el.click(); });
        el.addEventListener('touchstart', ()=>{}, {passive:true});
      });
    }
  </script>
</body>
</html>