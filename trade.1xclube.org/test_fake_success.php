<?php
// test_fake_success.php
// WARNING: DELETE THIS FILE AFTER TESTING

// 1. Configuration
$my_secret_key = "e038636bf18042c89a1199f505fdf470"; 

// FIX: Yahan 'http' ko 'https' kar diya hai
$notify_url = "https://" . $_SERVER['HTTP_HOST'] . "/basepay_notify.php"; 

$message = "";

// 2. Form Submit Hone Par
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $order_id = trim($_POST['order_id']); // Extra spaces hata diye
    $amount = $_POST['amount'];
    
    if($order_id && $amount) {
        $data = [
            'mchId' => '100567212',
            'mchOrderNo' => $order_id,
            'amount' => number_format((float)$amount, 2, '.', ''),
            'tradeResult' => '1',
            'orderDate' => date('Y-m-d H:i:s'),
            'transaction_id' => 'TEST_TXN_' . time()
        ];
        
        // 3. Signature
        ksort($data);
        $str = "";
        foreach ($data as $k => $v) {
            $str .= $k . "=" . $v . "&";
        }
        $str .= "key=" . $my_secret_key;
        $sign = md5($str);
        
        $data['sign'] = $sign;
        
        // 4. Send Request
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $notify_url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // SSL Verify false rakha taaki local certificate error na aaye
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        
        $response = curl_exec($ch);
        $err = curl_error($ch);
        curl_close($ch);
        
        if ($err) {
            $message = "<div class='text-red-500'>Error: $err</div>";
        } else {
            // Check exact response
            if(trim($response) == "success") {
                $message = "<div class='p-4 bg-green-600 rounded-lg text-white font-bold text-center mb-4'>✅ SUCCESS! <br> Database check karo, User ka balance update ho gaya hoga.</div>";
            } else {
                $message = "<div class='p-4 bg-red-600 rounded-lg text-white font-bold text-center mb-4'>❌ Failed! <br> Server Response: " . htmlspecialchars($response) . "</div>";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fake Payment Tester</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white flex items-center justify-center min-h-screen">
    <div class="bg-gray-800 p-8 rounded-xl shadow-lg w-full max-w-md border border-gray-700">
        <h2 class="text-2xl font-bold mb-6 text-center text-yellow-400">⚡ Fake Payment Tester</h2>
        
        <?php echo $message; ?>

        <form method="POST" class="space-y-4">
            <div>
                <label class="block text-sm text-gray-400 mb-1">Transaction ID (mch_order_no)</label>
                <input type="text" name="order_id" value="<?php echo isset($_POST['order_id']) ? $_POST['order_id'] : ''; ?>" placeholder="ORD17000..." required 
                       class="w-full p-3 bg-gray-900 border border-gray-600 rounded text-white focus:border-yellow-400 outline-none">
            </div>

            <div>
                <label class="block text-sm text-gray-400 mb-1">Amount</label>
                <input type="number" name="amount" value="500" required 
                       class="w-full p-3 bg-gray-900 border border-gray-600 rounded text-white focus:border-yellow-400 outline-none">
            </div>

            <button type="submit" class="w-full bg-yellow-500 hover:bg-yellow-600 text-black font-bold py-3 rounded transition">
                Simulate Success Payment
            </button>
        </form>
        
        <div class="mt-6 text-center text-xs text-red-400">
            ⚠️ TESTING ONLY. DELETE THIS FILE AFTER USE.
        </div>
    </div>
</body>
</html>