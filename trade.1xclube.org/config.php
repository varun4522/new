<?php
// basepay_notify.php

error_reporting(0);
ini_set('display_errors', 0);

// 1. Database Connection
$servername = "localhost";
$username = "affiliat_smdemo"; 
$password = "affiliat_smdemo"; 
$dbname = "affiliat_smdemo";   

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed");
}

// 2. Settings
$key = "eebffc308408408dba442e41808a2a61";

// 3. Data Receive
$data = $_POST;
if (empty($data)) { die("No data"); }

// 4. Signature Verify
$received_sign = $data['sign'];
unset($data['sign']); 
unset($data['signType']);

ksort($data);
$str = "";
foreach ($data as $k => $v) {
    if ($v !== "" && $v !== null) {
        $str .= $k . "=" . $v . "&";
    }
}
$str .= "key=" . $key;
$my_sign = md5($str);

// 5. Logic
if ($my_sign === $received_sign) {
    
    if ($data['tradeResult'] == "1") {
        
        $mch_order_no = $data['mchOrderNo'];
        $amount = floatval($data['amount']);
        
        // CHECK IN RECHARGES TABLE
        $stmt = $conn->prepare("SELECT id, user_id, status FROM recharges WHERE mch_order_no = ?");
        $stmt->bind_param("s", $mch_order_no);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($row = $result->fetch_assoc()) {
            
            // Agar status pehle se approved nahi hai tabhi update karo
            if ($row['status'] != 'approved') {
                
                // 1. Update Recharge Status
                $updateTxn = $conn->prepare("UPDATE recharges SET status = 'approved', updated_at = NOW() WHERE id = ?");
                $updateTxn->bind_param("i", $row['id']);
                $updateTxn->execute();
                $updateTxn->close();
                
                // 2. Add Balance to User
                $user_id = $row['user_id'];
                $updateUser = $conn->prepare("UPDATE users SET balance = balance + ? WHERE id = ?");
                $updateUser->bind_param("di", $amount, $user_id);
                $updateUser->execute();
                $updateUser->close();
            }
        }
        $stmt->close();
    }
    echo "success";
} else {
    echo "fail";
}
$conn->close();
?>