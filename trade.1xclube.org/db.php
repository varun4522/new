<?php
$servername = "localhost";
$username = "zewinsbs_chiken"; // Aapka DB User
$password = "zewinsbs_chiken";     // Aapka DB Password
$dbname = "zewinsbs_chiken"; // Aapke Database ka naam

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>