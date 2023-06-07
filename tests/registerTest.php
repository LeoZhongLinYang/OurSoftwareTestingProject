<?php
// tests/registerTest.php

use PHPUnit\Framework\TestCase;
require __DIR__ . '/../src/register.php';

class registerTest extends TestCase
{
    /**
     * @uses register
     * @covers register::register_function
     */
    public function testregister_function()
    {
        $a = new register();

        $_SESSION['admin_sid'] = 1;
        $_SESSION['customer_sid'] = 1;
        $this->assertEquals(1, $a->register_function());

        $_SESSION['admin_sid'] = NULL;
        $_SESSION['customer_sid'] = NULL;
        $this->assertEquals(0, $a->register_function());
    }
}
?>
