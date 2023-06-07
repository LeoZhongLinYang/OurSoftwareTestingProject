<?php
// tests/loginTest.php

use PHPUnit\Framework\TestCase;
require __DIR__ . '/../src/login.php';

class LoginTest extends TestCase
{
    private $Login = null;

    public function setUP() : void {
        $this->Login = new Login();
        $_SESSION = array('admin_sid' => null, 'customer_sid' => null);
    }

    public function tearDown() : void {
        $this->Login = null;
        $_SESSION = null;
    }

    /**
     * @uses Login
     * @covers Login::loginFunction
     */
    public function testLoginFunction()
    {
        $_SESSION['admin_sid'] = 1;
        $_SESSION['customer_sid'] = 1;
        $this->assertEquals(1, $this->Login->loginFunction());

        $_SESSION['admin_sid'] = NULL;
        $_SESSION['customer_sid'] = NULL;
        $this->assertEquals(0, $this->Login->loginFunction());
    }
}
?>
