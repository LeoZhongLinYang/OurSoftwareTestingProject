<?php
class connect {
    public function connect_function() {

            session_start();
            $servername = "localhost";
            $server_user = "root";
            $server_pass = "ericdamnit030635";
            $dbname = "food";

            $name = "root";
            if(isset($_SESSION['name'])) {
                $name = $_SESSION['name'];
            }

            $role = "Administrator";
            if(isset($_SESSION['role'])) {
                $role = $_SESSION['role'];
            }


            $con = new mysqli($servername, $server_user, $server_pass, $dbname);

            return $con;
        }
}
