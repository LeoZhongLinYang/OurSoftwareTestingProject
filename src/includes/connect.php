<?php
session_start();
$servername = "eric";
$server_user = "eric";
$server_pass = "ericdamnit030635";
$dbname = "food";
$name = $_SESSION['name'];
$role = $_SESSION['role'];
$con = new mysqli($servername, $server_user, $server_pass, $dbname);
?>
