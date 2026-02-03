<?php
include 'db.php';
session_start();

if(!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}

$user_id = $_SESSION['user_id'];

// 1. User ka balance aur baki details fetch karna
$sql = "SELECT balance, referral_earnings, phone, username FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$user = $stmt->get_result()->fetch_assoc();

// 2. Database se REAL Transactions fetch karna
// Dhayan dein: Table ka naam 'transactions' hona chahiye
$trans_query = "SELECT * FROM transactions WHERE user_id = ? ORDER BY id DESC LIMIT 10";
$t_stmt = $conn->prepare($trans_query);
$t_stmt->bind_param("i", $user_id);
$t_stmt->execute();
$transactions = $t_stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Wallet - Chicken Road</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        body { font-family: 'Poppins', sans-serif; background: #0f172a; color: white; }
        .glass { background: rgba(30, 41, 59, 0.7); backdrop-filter: blur(12px); border: 1px solid rgba(255,255,255,0.05); }
        .global-bottom-nav { position: fixed !important; bottom: 0 !important; left: 0 !important; right: 0 !important; z-index: 9999 !important; }
        .global-bottom-nav a { color: rgba(255,255,255,0.6); transition: all 0.3s ease; text-decoration: none; }
        .global-bottom-nav a:hover { color: #3b82f6; }
    </style>
</head>
<body class="pb-24">

    <div class="container mx-auto px-6 py-8">
        <div class="glass p-8 rounded-[40px] mb-8 relative overflow-hidden bg-gradient-to-br from-blue-600/20 to-transparent">
            <div class="relative z-10 text-center">
                <p class="text-gray-400 text-sm mb-2">Total Balance</p>
                <h1 class="text-5xl font-black mb-6 tracking-tighter">₹<?php echo number_format($user['balance'], 2); ?></h1>
                <div class="flex gap-3 justify-center mb-6">
                    <div class="bg-white/5 rounded-3xl p-1 flex items-center" style="border:1px solid rgba(255,255,255,0.03);">
                        <button id="toggleDeposit" class="px-5 py-3 rounded-2xl text-sm font-bold text-white bg-blue-600">Deposit</button>
                        <button id="toggleWithdraw" class="px-5 py-3 rounded-2xl text-sm font-bold text-gray-300 ml-2">Withdraw</button>
                    </div>
                </div>
                <div id="walletFrames" class="space-y-4">
                    <div id="depositFrameWrap" class="hidden">
                        <iframe id="depositFrame" src="deposit.html" class="w-full h-[620px] rounded-2xl border-0 bg-transparent"></iframe>
                    </div>
                    <div id="withdrawFrameWrap" class="hidden">
                        <iframe id="withdrawFrame" src="withdraw.html" class="w-full h-[620px] rounded-2xl border-0 bg-transparent"></iframe>
                    </div>
                </div>
            </div>
            <i class="fas fa-wallet absolute -bottom-10 -right-10 text-[180px] text-white/5 rotate-12"></i>
        </div>

        <div class="flex justify-between items-center mb-6">
            <h3 class="text-xl font-bold">Recent Activity</h3>
            <button class="text-blue-400 text-sm font-medium">View All</button>
        </div>

        <div class="space-y-4">
            <?php 
            if ($transactions->num_rows > 0) {
                while($row = $transactions->fetch_assoc()) { 
                    // Deposit aur Withdraw ke liye alag color/icon logic
                    $isDeposit = (stripos($row['type'], 'deposit') !== false || $row['amount'] > 0);
                    $icon = $isDeposit ? 'fa-plus' : 'fa-minus';
                    $color = $isDeposit ? 'text-green-400' : 'text-red-400';
                    $bg = $isDeposit ? 'bg-green-400/10' : 'bg-red-400/10';
            ?>
                <div class="glass p-5 rounded-[28px] flex items-center justify-between">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 <?php echo $bg; ?> rounded-2xl flex items-center justify-center <?php echo $color; ?>">
                            <i class="fas <?php echo $icon; ?> text-lg"></i>
                        </div>
                        <div>
                            <p class="text-sm font-bold uppercase"><?php echo htmlspecialchars($row['type']); ?></p>
                            <p class="text-[10px] text-gray-500"><?php echo date('d M Y, h:i A', strtotime($row['created_at'])); ?></p>
                        </div>
                    </div>
                    <p class="<?php echo $color; ?> font-black text-lg">
                        <?php echo ($isDeposit ? '+' : '-') . '₹' . number_format(abs($row['amount']), 2); ?>
                    </p>
                </div>
            <?php 
                }
            } else {
                echo '<div class="text-center py-10 text-gray-500">No real transactions yet.</div>';
            }
            ?>
        </div>
    </div>

    <!-- Inline bottom nav removed; using assets/js/shared_bottom_nav.js -->

    <script>
        (function(){
            const depBtn = document.getElementById('toggleDeposit');
            const withBtn = document.getElementById('toggleWithdraw');
            const depWrap = document.getElementById('depositFrameWrap');
            const withWrap = document.getElementById('withdrawFrameWrap');

            function setActive(which){
                if(which === 'deposit'){
                    depWrap.classList.remove('hidden');
                    withWrap.classList.add('hidden');
                    depBtn.classList.add('bg-blue-600'); depBtn.classList.remove('text-gray-300');
                    depBtn.classList.remove('text-gray-300'); depBtn.classList.remove('text-gray-400');
                    depBtn.classList.remove('bg-transparent');
                    withBtn.classList.remove('bg-blue-600'); withBtn.classList.add('text-gray-300');
                    depBtn.classList.remove('opacity-70');
                } else {
                    withWrap.classList.remove('hidden');
                    depWrap.classList.add('hidden');
                    withBtn.classList.add('bg-blue-600'); withBtn.classList.remove('text-gray-300');
                    depBtn.classList.remove('bg-blue-600'); depBtn.classList.add('text-gray-300');
                }
            }

            depBtn.addEventListener('click', function(e){ e.preventDefault(); setActive('deposit'); });
            withBtn.addEventListener('click', function(e){ e.preventDefault(); setActive('withdraw'); });

            // default view
            setActive('deposit');
        })();
    </script>

    <script src="assets/js/shared_bottom_nav.js"></script>
</body>
</html>