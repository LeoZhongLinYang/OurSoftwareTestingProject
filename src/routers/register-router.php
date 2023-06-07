<?php
include '../includes/connect.php';
$name = htmlspecialchars($_POST['name']);
$username = htmlspecialchars($_POST['username']);
$password = password_hash(htmlspecialchars($_POST['password']), PASSWORD_DEFAULT);
$phone = $_POST['phone'];

function number($length) {
    $result = '';

    for($i = 0; $i < $length; $i++) {
        $result .= mt_rand(0, 9);
    }

    return $result;
}

$sql = "SELECT * FROM users WHERE username = '$username';";

if (mysqli_fetch_array(mysqli_query($con, $sql))) {
    echo("<script>alert('This username has been used!!!')</script>");
    echo("<script>window.location = '../register.php';</script>");
} else {
    $sql = "INSERT INTO users (name, username, password, contact) VALUES ('$name', '$username', '$password', $phone);";
    if($con->query($sql)==true){
        $user_id =  $con->insert_id;
        $sql = "INSERT INTO wallet(customer_id) VALUES ($user_id)";
        if($con->query($sql)==true){
            $wallet_id =  $con->insert_id;
            $cc_number = number(16);
            $cvv_number = number(3);
            $sql = "INSERT INTO wallet_details(wallet_id, number, cvv) VALUES ($wallet_id, $cc_number, $cvv_number)";
            $con->query($sql);
        }
    }
    header("location: ../login.php");       
}
?>
