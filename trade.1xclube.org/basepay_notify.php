<?php
// basepay_notify.php

// Error reporting band rakhein
error_reporting(0);
ini_set('display_errors', 0);

// 1. Database Connection (Tumhara naya DB 'invest')
$servername = "localhost";
$username = "affiliat_smdemo"; 
$password = "affiliat_smdemo"; 
$dbname = "affiliat_smdemo";   

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed");
}

// 2. Basepay Payment Key 
// (Note: Yeh wahi Key honi chahiye jo basepay_request.php mein hai)
$key = "eebffc308408408dba442e41808a2a61";

// 3. Data Receive Karo
$data = $_POST;

if (empty($data)) {
    die("No data");
}

// 4. Signature Verification
$received_sign = $data['sign'];
unset($data['sign']); 
unset($data['signType']);

ksort($data); // Data ko A-Z sort karte hain

$str = "";
foreach ($data as $k => $v) {
    if ($v !== "" && $v !== null) {
        $str .= $k . "=" . $v . "&";
    }
}
$str .= "key=" . $key;
$my_sign = md5($str);

// 5. Check agar Signature Match hua
if ($my_sign === $received_sign) {
    
    // Check agar Payment Successful hai
    if ($data['tradeResult'] == "1") {
        
        $mch_order_no = $data['mchOrderNo']; // Order ID
        $amount = floatval($data['amount']); // Amount
        
        // Step A: 'recharges' table mein Transaction dhoondo
        // Hum 'transactions' nahi 'recharges' table use kar rahe hain
        $stmt = $conn->prepare("SELECT id, user_id, status FROM recharges WHERE mch_order_no = ?");
        $stmt->bind_param("s", $mch_order_no);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($row = $result->fetch_assoc()) {
            
            // Sirf tab update karo agar wo pehle se 'approved' NA ho
            if ($row['status'] != 'approved') {
                
                // 1. Recharge Status ko 'approved' karo
                $updateTxn = $conn->prepare("UPDATE recharges SET status = 'approved', updated_at = NOW() WHERE id = ?");
                $updateTxn->bind_param("i", $row['id']);
                $updateTxn->execute();
                $updateTxn->close();
                
                // 2. User ke Wallet (users table) mein paise add karo
                $user_id = $row['user_id'];
                $updateUser = $conn->prepare("UPDATE users SET balance = balance + ? WHERE id = ?");
                $updateUser->bind_param("di", $amount, $user_id);
                $updateUser->execute();
                $updateUser->close();
                
            }
        }
        $stmt->close();
    }
    
    // Basepay ko success bhejo
    echo "success";
    
} else {
    // Fake request
    echo "fail";
}

$conn->close();
?>