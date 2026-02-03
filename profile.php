<?php
include 'db.php';
session_start();

if(!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}

$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$user = $stmt->get_result()->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile - Chicken Road</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        * { font-family: 'Poppins', sans-serif; }
        .gradient-bg { background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%); }
        .glass-effect { background: rgba(15, 23, 42, 0.7); backdrop-filter: blur(20px); border: 1px solid rgba(255, 255, 255, 0.1); }
    </style>
</head>
<body class="gradient-bg min-h-screen pb-24 text-white">

    <div class="container mx-auto px-4 py-8">
        <div class="flex items-center mb-8">
            <button onclick="window.history.back()" class="w-10 h-10 rounded-full glass-effect flex items-center justify-center mr-4">
                <i class="fas fa-chevron-left"></i>
            </button>
            <h1 class="text-xl font-bold">My Profile</h1>
        </div>

        <div class="glass-effect rounded-[32px] p-8 text-center mb-8 relative overflow-hidden">
            <div class="relative inline-block mb-4">
                <img src="https://robohash.org/<?php echo $user_id; ?>.png?set=set4" 
                     class="w-24 h-24 rounded-full border-4 border-blue-500 shadow-2xl mx-auto object-cover"
                     alt="Profile Picture">
                <div class="absolute bottom-0 right-0 bg-blue-500 w-8 h-8 rounded-full flex items-center justify-center border-4 border-[#1e293b]">
                    <i class="fas fa-camera text-[10px]"></i>
                </div>
            </div>
            <h2 class="text-2xl font-bold"><?php echo htmlspecialchars($user['username']); ?></h2>
            <p class="text-blue-400 text-sm">Member since <?php echo isset($user['created_at']) ? date('M Y', strtotime($user['created_at'])) : 'Joined'; ?></p>
        </div>

        <div class="space-y-4">
            <div class="glass-effect rounded-2xl p-4 flex items-center">
                <div class="w-10 h-10 rounded-xl bg-blue-500/10 text-blue-500 flex items-center justify-center mr-4">
                    <i class="fas fa-user"></i>
                </div>
                <div class="flex-1">
                    <p class="text-xs text-gray-400 uppercase tracking-wider">Username</p>
                    <p class="font-medium"><?php echo htmlspecialchars($user['username']); ?></p>
                </div>
            </div>

            <div class="glass-effect rounded-2xl p-4 flex items-center">
                <div class="w-10 h-10 rounded-xl bg-emerald-500/10 text-emerald-500 flex items-center justify-center mr-4">
                    <i class="fas fa-phone"></i>
                </div>
                <div class="flex-1">
                    <p class="text-xs text-gray-400 uppercase tracking-wider">Phone Number</p>
                    <p class="font-medium"><?php echo htmlspecialchars($user['phone']); ?></p>
                </div>
            </div>

            <div class="glass-effect rounded-2xl p-4 flex items-center">
                <div class="w-10 h-10 rounded-xl bg-orange-500/10 text-orange-500 flex items-center justify-center mr-4">
                    <i class="fas fa-envelope"></i>
                </div>
                <div class="flex-1">
                    <p class="text-xs text-gray-400 uppercase tracking-wider">Email Address</p>
                    <p class="font-medium"><?php echo htmlspecialchars($user['email'] ?? 'Not provided'); ?></p>
                </div>
            </div>
        </div>

        <button onclick="window.location.href='logout.php'" class="w-full mt-8 bg-red-500/10 text-red-500 border border-red-500/20 py-4 rounded-2xl font-bold flex items-center justify-center gap-2">
            <i class="fas fa-power-off"></i>
            Logout Account
        </button>
    </div>

    <!-- Use shared bottom nav -->
    <script src="assets/js/shared_bottom_nav.js"></script>

</body>
</html>