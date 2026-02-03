<?php
// basepay_request.php - FINAL PRODUCTION VERSION
// Error reporting band (User ko errors nahi dikhne chahiye)
error_reporting(0);
ini_set('display_errors', 0);
session_start();

// ============================================================
// 1. DATABASE CONNECTION
// ============================================================
$servername = "localhost";
$username = "affiliat_smdemo"; 
$password = "affiliat_smdemo"; 
$dbname = "affiliat_smdemo";   

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("System Error: Database Connection Failed");
}

// ============================================================
// 2. BASEPAY SETTINGS
// ============================================================
$mch_id = "100567212"; 
$key = "e038636bf18042c89a1199f505fdf470"; 
$gateway_url = "https://api.nekpayment.com/pay/web";
$pay_type = "105"; 

// User ID Setup
// Prefer explicit POSTed `user_id` (sent from Laravel blade) to avoid wrong mapping
if (isset($_POST['user_id']) && is_numeric($_POST['user_id'])) {
    $user_id = (int) $_POST['user_id'];
} elseif (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    // fallback (avoid defaulting to 1 silently)
    $user_id = 0;
}

// Amount Validation
$amount = $_POST['amount'] ?? 0;
if ($amount < 1) {
    die("Error: Invalid Amount");
}

if (empty($user_id) || !is_numeric($user_id)) {
    die("Error: User not identified");
}

$trade_amount = number_format((float)$amount, 2, '.', '');
$mch_order_no = "ORD" . time() . rand(1000,9999);
$order_date = date('Y-m-d H:i:s');

// URLs
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";
$host = $_SERVER['HTTP_HOST'];
$notify_url = "$protocol://$host/basepay_notify.php";
$page_url = "$protocol://$host/deposit/record"; // Success hone par yahan wapas aayega

// ============================================================
// 3. INSERT INTO RECHARGES TABLE
// ============================================================
$sql = "INSERT INTO recharges (user_id, number, amount, status, operator, mch_order_no, created_at, updated_at) VALUES (?, '0000000000', ?, 'pending', 'Basepay', ?, NOW(), NOW())";

$stmt = $conn->prepare($sql);
if (!$stmt) {
    die("System Error: SQL Prepare Failed");
}

$stmt->bind_param("ids", $user_id, $trade_amount, $mch_order_no);
if (!$stmt->execute()) {
    die("System Error: DB Insert Failed");
}
$stmt->close();

// ============================================================
// 4. SEND REQUEST TO BASEPAY
// ============================================================
$params = [
    "goods_name" => "AddFunds",
    "mch_id" => $mch_id,
    "mch_order_no" => $mch_order_no,
    "mch_return_msg" => "UID_" . $user_id,
    "notify_url" => $notify_url,
    "order_date" => $order_date,
    "page_url" => $page_url,
    "pay_type" => $pay_type,
    "trade_amount" => $trade_amount,
    "version" => "1.0"
];

ksort($params);
$signStr = "";
foreach ($params as $k => $v) {
    if ($v !== "" && $v !== null) {
        $signStr .= $k . "=" . $v . "&";
    }
}
$signStr .= "key=" . $key;
$sign = md5($signStr);

$params['sign'] = $sign;
$params['sign_type'] = 'MD5';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $gateway_url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

$response = curl_exec($ch);
$err = curl_error($ch);
curl_close($ch);

// ============================================================
// 5. HANDLE RESPONSE & REDIRECT
// ============================================================
if ($err) {
    die("Payment Gateway Error: " . $err);
} else {
    // JSON response ko padho
    $result = json_decode($response, true);
    
    // Check karo agar SUCCESS hai aur payInfo (Link) mila hai
    if (isset($result['respCode']) && $result['respCode'] === 'SUCCESS' && !empty($result['payInfo'])) {
        
        // User ko Payment Page par bhej do
        header("Location: " . $result['payInfo']);
        exit;
        
    } else {
        // Agar error aaya gateway se
        echo "Payment Creation Failed: " . ($result['tradeMsg'] ?? 'Unknown Error');
        // Debugging ke liye response print kar sakte ho agar chaho:
        // echo "<br>Raw Response: " . $response;
    }
}
?>