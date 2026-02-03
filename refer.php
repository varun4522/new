<?php
include 'db.php';
session_start();

// Redirect if not logged in
if(!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}

$user_id = $_SESSION['user_id'];

// Fast Data Fetching (Sirf wahi data jo zaroori hai)
$query = "SELECT referral_code, balance FROM users WHERE id = ? LIMIT 1";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$user = $stmt->get_result()->fetch_assoc();

$ref_code = $user['referral_code'] ?? 'REF' . $user_id;
$invite_link = "https://" . $_SERVER['HTTP_HOST'] . "/register.php?ref=" . $ref_code;

// Referral stats
$count_query = "SELECT COUNT(id) as total FROM users WHERE referred_by = ?";
$c_stmt = $conn->prepare($count_query);
$c_stmt->bind_param("s", $ref_code);
$c_stmt->execute();
$total_ref = $c_stmt->get_result()->fetch_assoc()['total'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Refer & Earn</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { background-color: #020617; color: white; font-family: system-ui, -apple-system, sans-serif; }
        .glass { background: rgba(30, 41, 59, 0.4); backdrop-filter: blur(10px); border: 1px solid rgba(255,255,255,0.05); }
        .gradient-btn { background: linear-gradient(90deg, #3b82f6, #8b5cf6); }
        /* Fast Loading Animation */
        @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }
        .fade-in { animation: fadeIn 0.3s ease-out forwards; }
    </style>
</head>
<body class="p-4 pb-24">

    <div class="flex items-center justify-between mb-6 fade-in">
        <button onclick="window.history.back()" class="p-2 glass rounded-xl text-gray-400">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"/></svg>
        </button>
        <h1 class="text-lg font-bold">Refer & Earn</h1>
        <div class="w-10"></div>
    </div>

    <div class="glass rounded-[30px] p-6 mb-6 relative overflow-hidden fade-in" style="animation-delay: 0.1s;">
        <div class="relative z-10">
            <h2 class="text-3xl font-black mb-1 text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-purple-400">₹50.00</h2>
            <p class="text-gray-400 text-sm">Earn for every friend who joins & deposits.</p>
        </div>
        <div class="absolute -right-4 -bottom-4 w-24 h-24 bg-blue-600/20 rounded-full blur-2xl"></div>
    </div>

    <div class="grid grid-cols-2 gap-4 mb-6 fade-in" style="animation-delay: 0.2s;">
        <div class="glass p-4 rounded-2xl border-b-2 border-blue-500">
            <p class="text-xs text-gray-500 mb-1">Total Invited</p>
            <p class="text-xl font-bold"><?php echo $total_ref; ?></p>
        </div>
        <div class="glass p-4 rounded-2xl border-b-2 border-purple-500">
            <p class="text-xs text-gray-500 mb-1">Total Earned</p>
            <p class="text-xl font-bold text-green-400">₹<?php echo $total_ref * 50; ?></p>
        </div>
    </div>

    <div class="glass rounded-2xl p-5 mb-6 fade-in" style="animation-delay: 0.3s;">
        <label class="text-xs text-gray-500 block mb-3 font-medium uppercase tracking-widest">Your Referral Link</label>
        <div class="flex items-center gap-2 bg-black/40 p-2 rounded-xl border border-white/5">
            <input type="text" id="refLink" value="<?php echo $invite_link; ?>" readonly class="bg-transparent border-none outline-none text-xs flex-1 px-2 text-blue-300">
            <button onclick="copyLink()" class="gradient-btn px-4 py-2 rounded-lg text-xs font-bold active:scale-95 transition-all">COPY</button>
        </div>
    </div>

    <div class="space-y-3 fade-in" style="animation-delay: 0.4s;">
        <div class="flex items-center gap-4 p-3 glass rounded-2xl">
            <div class="w-8 h-8 rounded-full bg-blue-500/20 flex items-center justify-center text-blue-400 text-sm font-bold">1</div>
            <p class="text-xs text-gray-300">Share your link with friends.</p>
        </div>
        <div class="flex items-center gap-4 p-3 glass rounded-2xl">
            <div class="w-8 h-8 rounded-full bg-purple-500/20 flex items-center justify-center text-purple-400 text-sm font-bold">2</div>
            <p class="text-xs text-gray-300">Friend registers & deposits ₹500.</p>
        </div>
        <div class="flex items-center gap-4 p-3 glass rounded-2xl border border-green-500/20">
            <div class="w-8 h-8 rounded-full bg-green-500/20 flex items-center justify-center text-green-400 text-sm font-bold">3</div>
            <p class="text-xs text-gray-300">Get ₹50 instantly in your wallet.</p>
        </div>
    </div>

    <div id="toast" class="fixed bottom-24 left-1/2 -translate-x-1/2 bg-blue-600 text-white px-6 py-2 rounded-full text-xs font-bold opacity-0 transition-opacity pointer-events-none">Link Copied!</div>

    <script>
        function copyLink() {
            const link = document.getElementById('refLink');
            link.select();
            document.execCommand('copy');
            
            const toast = document.getElementById('toast');
            toast.style.opacity = '1';
            setTimeout(() => { toast.style.opacity = '0'; }, 2000);
        }
    </script>

    <script src="assets/js/shared_bottom_nav.js"></script>

</body>
</html>