<?php
// tests/usersTest.php

use PHPUnit\Framework\TestCase;
require __DIR__ . '/../src/users.php';


class UsersTest extends TestCase {
    private $Users = null;
    private $con = null; 

    public function setUP() : void {
        $this->Users = new Users();
        
        $servername = "localhost";
        $server_user = "root"; 
        $server_pass = "ericdamnit030635";
        $dbname = "food";
        $name = $_session['name'];
        $role = $_session['role'];
        $this->con = new mysqli($servername, $server_user, $server_pass, $dbname);    

        $_SESSION = array('admin_sid' => null, 'customer_sid' => null);
    }

    public function tearDown() : void {
        $this->Users = null;
        $this->con = null;
    }

    /**
     * @uses Users
     * @covers Users::usersFunction
     */
    public function testUsersFunction() { 
        $_SESSION['admin_sid'] = session_id();
        $_SESSION['customer_sid'] = null;
        $this->assertEquals(0, $this->Users->usersFunction($this->con));

        $_SESSION['admin_sid'] = null;
        $_SESSION['customer_sid'] = session_id();
        $this->assertEquals(1, $this->Users->usersFunction($this->con));

        $_SESSION['admin_sid'] = null;
        $_SESSION['customer_sid'] = null;
        $this->assertEquals(2, $this->Users->usersFunction($this->con));
    }
}

?>
