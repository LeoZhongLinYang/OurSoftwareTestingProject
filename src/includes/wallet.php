<?php
include_once 'walletClass.php';

$a = new wallet();
$balance = $a->wallet_function();
$user_id=$_SESSION['user_id'];

$servername = "localhost";
$server_user = "root";
$server_pass = "ericdamnit030635";
$dbname = "food";
$con = new mysqli($servername, $server_user, $server_pass, $dbname);  
$sql = mysqli_query($con, "SELECT * FROM wallet WHERE customer_id = '$user_id';");

while($row1 = mysqli_fetch_array($sql)){
    $wallet_id = $row1['id'];
}

?>
