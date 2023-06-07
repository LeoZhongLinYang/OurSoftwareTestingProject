<?php
// tests/routers/routerTest.php

use PHPUnit\Framework\TestCase;
require __DIR__ . '/../../src/routers/router.php';

class RouterTest extends TestCase {
     private $Router = null;
     private $con = null;

     public function setUp() : void {
         $this->Router = new Router();

         $servername = "eric";
         $server_user = "eric"; 
         $server_pass = "ericdamnit030635";
         $dbname = "food";
         $name = $_session['name'];
         $role = $_session['role'];
         $this->con = new mysqli($servername, $server_user, $server_pass, $dbname); 
     }

     public function tearDown() : void {
         $this->Router = null;
         $this->con = null;
     }


     /**
      * @uses Router
      * @covers Router::setter
      * @covers Router::getter
      */
     public function testSetter() {
         $username = 'root1';
         $password = '1toor';
         $this->Router->setter($username, $password);
         $getInfo = $this->Router->getter();
         $this->assertEquals($username, $getInfo['username']);
         $this->assertEquals($password, $getInfo['password']);
     }

    /**
     * @uses Router
     * @covers Router::routerFunction 
     */
    public function testRouterFunction() { 
        $this->Router->setter('root1', '1toor');
        $this->assertEquals(0, $this->Router->routerFunction($this->con));

        $this->Router->setter('Tiffany', 'tiffany');
        $this->assertEquals(1, $this->Router->routerFunction($this->con));

        $this->Router->setter('adfadsf', 'feagafds');
        $this->assertEquals(2, $this->Router->routerFunction($this->con));
    }
}
