<?php
// tests/adminPageTest.php

use PHPUnit\Framework\TestCase;
require __DIR__ . '/../src/admin-page.php';

class AdminPageTest extends TestCase {
    private $AdminPage = null;
    private $con = null;

    public function setUp() : void {
        $this->AdminPage = new AdminPage();

        $servername = "localhost";
        $server_user = "root";
        $server_pass = "ericdamnit030635";
        $dbname = "food";
        $this->con = new mysqli($servername, $server_user, $server_pass, $dbname); 

        $_SESSION = array('admin_sid' => null, 'customer_sid' => null);
    }

    public function tearDown() : void {
        $this->AdminPage = null;
        $this->con = null;
        $this->_SESSION = null;
    }

    /**
     * @uses AdminPage
     * @covers AdminPage::adminPageFunction
     */
    public function testAdminPageFunction() {
        $_SESSION['admin_sid'] = session_id();
        $_SESSION['customer_sid'] = null;
        $this->assertEquals(0, $this->AdminPage->adminPageFunction($this->con, 'Admin 2', 'Administrator'));

        $_SESSION['admin_sid'] = null;
        $_SESSION['customer_sid'] = session_id();
        $this->assertEquals(1, $this->AdminPage->adminPageFunction($this->con, 'Customer 1', 'Customer'));

        $_SESSION['admin_sid'] = null;
        $_SESSION['customer_sid'] = null;
        $this->assertEquals(2, $this->AdminPage->adminPageFunction($this->con, 'hello', 'world'));
    }
}
?>
