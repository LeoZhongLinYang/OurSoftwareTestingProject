<?php
class wallet {
    public function wallet_function() {

        # session_start();
        $user_id=$_SESSION['user_id'];

        if(!isset($con)) {
            $servername = "localhost";
            $server_user = "root";
            $server_pass = "";
            $dbname = "food";
            $con = new mysqli($servername, $server_user, $server_pass, $dbname);   
        }

        $sql = mysqli_query($con, "SELECT * FROM wallet WHERE customer_id = '$user_id';");
                
        while($row1 = mysqli_fetch_array($sql)){
            $wallet_id = $row1['id'];
        }

        $sql = mysqli_query($con, "SELECT * FROM wallet_details where wallet_id = '$wallet_id';");
                
        while($row1 = mysqli_fetch_array($sql)){
            $balance = $row1['balance'];
        }

        return $balance;

    }
}

$a = new wallet();
$balance = $a->wallet_function();
$user_id=$_SESSION['user_id'];

$servername = "localhost";
$server_user = "root";
$server_pass = "";
$dbname = "food";
$con = new mysqli($servername, $server_user, $server_pass, $dbname);  
$sql = mysqli_query($con, "SELECT * FROM wallet WHERE customer_id = '$user_id';");
                
while($row1 = mysqli_fetch_array($sql)){
    $wallet_id = $row1['id'];
}

?>