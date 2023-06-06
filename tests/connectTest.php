<?php
// tests/connectTest.php

use PHPUnit\Framework\TestCase;
require __DIR__ . '/../src/includes/connect.php';

class connectTest extends TestCase
{
    /**
     * @covers connect::connect_function
     */
    public function testconnect_function()
    {
        
        session_start();
        $servername = "localhost";
        $server_user = "root";
        $server_pass = "";
        $dbname = "food";
        $name = "root";
        $role = "Administrator";
        $con = new mysqli($servername, $server_user, $server_pass, $dbname);

        $a = new connect();
        $this->assertEquals($con, $a->connect_function());
        
        $_SESSION = array('name' => 'root', 'role' => 'Administrator');
        $this->assertEquals($con, $a->connect_function());

    }
}
?>