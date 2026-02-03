<?php
include 'db.php';
session_start();
if(isset($_SESSION['user_id'])) {
    $uid = $_SESSION['user_id'];
    $res = mysqli_query($conn, "SELECT balance FROM users WHERE id = '$uid'");
    $row = mysqli_fetch_assoc($res);
    echo number_format($row['balance'], 2, '.', ',');
}
?>