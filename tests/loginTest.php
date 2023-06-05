<?php
// tests/loginTest.php

use PHPUnit\Framework\TestCase;
require __DIR__ . '/../src/login.php';

class loginTest extends TestCase
{
    /**
     * @covers login::login_function
     */
    public function testLoginFunction()
    {
        $a = new login();
        $a->loginFunction();

        $_SESSION['admin_sid'] = 1;
        $_SESSION['customer_sid'] = 1;
        $this->assertEquals(1, $a->loginFunction());

        $_SESSION['admin_sid'] = NULL;
        $_SESSION['customer_sid'] = NULL;
        $this->assertEquals(0, $a->loginFunction());
    }
}
?>
