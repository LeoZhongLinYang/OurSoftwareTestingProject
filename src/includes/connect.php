<?php
include_once 'connectClass.php';

$Connect = new connect();
$con = $Connect->connect_function();
$name = "root";
if(isset($_SESSION['name'])) {
    $name = $_SESSION['name'];
}

$role = "Administrator";
if(isset($_SESSION['role'])) {
    $role = $_SESSION['role'];
}
?>
