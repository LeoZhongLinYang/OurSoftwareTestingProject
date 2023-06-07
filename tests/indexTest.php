<?php
// tests/indexTest.php

use PHPUnit\Framework\TestCase;
require __DIR__ . '/../src/index.php';

class IndexTest extends TestCase {
    private $Index = null;
    private $con = null;

    public function setUp() : void {
        $this->Index = new Index();
        
        $servername = "localhost";
        $server_user = "root";
        $server_pass = "ericdamnit030635";
        $dbname = "food";
        $this->con = new mysqli($servername, $server_user, $server_pass, $dbname); 

        $_SESSION = array('admin_sid' => null, 'customer_sid' => null);
    }

    public function tearDown() : void {
        $this->Index = null;
        $this->con = null;
        $_SESSION = null;
    }
    
    /**
     * @uses Index
     * @covers Index::indexFunction
     */
    public function testIndexFunction() {
        $_SESSION['admin_sid'] = null;
        $_SESSION['customer_sid'] = session_id();
        $this->assertEquals(0, $this->Index->indexFunction($this->con, 7, 2000, 'Customer 1', 'Customer'));

        $_SESSION['admin_sid'] = session_id();
        $_SESSION['customer_sid'] = null; 
        $this->assertEquals(1, $this->Index->indexFunction($this->con, 8, 2000, 'Admin 2', 'Administrator'));

        $_SESSION['admin_sid'] = null;
        $_SESSION['customer_sid'] = null;
        $this->assertEquals(2, $this->Index->indexFunction($this->con, 0, 1000, 'hello', 'world'));
    }
}
?>
