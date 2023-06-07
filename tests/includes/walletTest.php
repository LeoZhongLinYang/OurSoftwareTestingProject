<?php
// tests/includes/walletTest.php

use PHPUnit\Framework\TestCase;
require __DIR__ . '/../../src/includes/wallet.php';

class walletTest extends TestCase
{
    /**
     * @uses wallet
     * @covers wallet::wallet_function
     */
    public function testwallet_function()
    {

        $a = new wallet();

        $servername = "localhost";
        $server_user = "root";
        $server_pass = "ericdamnit030635";
        $dbname = "food";
        $con = new mysqli($servername, $server_user, $server_pass, $dbname);

        $sql = mysqli_query($con, "SELECT * FROM wallet_details where wallet_id = 1;");

        while($row1 = mysqli_fetch_array($sql)){
            $balance = $row1['balance'];
        }

        $_SESSION = array('user_id' => 1);
        $this->assertEquals($balance, $a->wallet_function());

    }
}
?>
