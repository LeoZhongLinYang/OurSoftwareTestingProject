<?php
// tests/detailsTest.php

use PHPUnit\Framework\TestCase;
require __DIR__ . '/../src/details.php';

class DetailsTest extends TestCase {
    private $Details = null;
    private $con = null;

    public function setUp() : void {
        $this->Details = new Details();

        $servername = "localhost";
        $server_user = "root";
        $server_pass = "ericdamnit030635";
        $dbname = "food";
        $this->con = new mysqli($servername, $server_user, $server_pass, $dbname); 

        $_SESSION = array('admin_sid' => null, 'customer_sid' => null);
    }

    public function tearDown() : void {
        $this->Details = null;
        $this->con = null;
        $_SESSION = null;
    }

    /**
     * @uses Details
     * @covers Details::setter
     * @covers Details::getter
     */
    public function testSetter() {
        $user_id = 1;
        $this->Details->setter($user_id);
        $this->assertEquals($user_id, $this->Details->getter());
    }

    /**
     * @uses Details
     * @covers Details::detailsFunction
     */
    public function testDetailsFunction() {
        $this->Details->setter(7);
        $_SESSION['admin_sid'] = null;
        $_SESSION['customer_sid'] = session_id();
        $this->assertEquals(0, $this->Details->detailsFunction($this->con));
 
        $this->Details->setter(8);
        $_SESSION['admin_sid'] = session_id();
        $_SESSION['customer_sid'] = null;
        $this->assertEquals(1, $this->Details->detailsFunction($this->con));

        $this->Details->setter(0);
        $_SESSION['admin_sid'] = null;
        $_SESSION['customer_sid'] = null;
        $this->assertEquals(2, $this->Details->detailsFunction($this->con));
    }
}
?>
