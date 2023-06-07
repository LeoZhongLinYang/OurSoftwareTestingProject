<?php
include __DIR__ . '/../includes/connect.php';

class Router {
    private $username = null;
    private $password = null;

    public function setter($username, $password) {
        $this->username = htmlspecialchars($username);
        $this->password = htmlspecialchars($password);
    }

    public function getter() {
        return array('username' => $this->username, 'password' => $this->password);
    }

    public function routerFunction(mysqli $con) {
        $success=false;
        $result = mysqli_query($con, "SELECT * FROM users WHERE username='$this->username' AND role='Administrator' AND not deleted;");

        while($row = mysqli_fetch_array($result))
        {
            $password_hash = $row['password'];
            if(password_verify($this->password, $password_hash))
            {
                $success = true;
                $user_id = $row['id'];
                $name = $row['name'];
                $role= $row['role'];
                break;
            }
        }
        if($success == true)
        {	
            session_start();
            $_SESSION['admin_sid']=session_id();
            $_SESSION['user_id'] = $user_id;
            $_SESSION['role'] = $role;
            $_SESSION['name'] = $name;

            header("location: ../admin-page.php");
            return 0;
        }
        else
        {
            $result = mysqli_query($con, "SELECT * FROM users WHERE username='$this->username' AND role='Customer' AND not deleted;");
            while($row = mysqli_fetch_array($result))
            {
                $password_hash = $row['password'];
                if(password_verify($this->password, $password_hash))
                {
                    $success = true;
                    $user_id = $row['id'];
                    $name = $row['name'];
                    $role= $row['role'];
                    break;
                }
            }
            if($success == true)
            {
                session_start();
                $_SESSION['customer_sid']=session_id();
                $_SESSION['user_id'] = $user_id;
                $_SESSION['role'] = $role;
                $_SESSION['name'] = $name;			
                header("location: ../index.php");
                return 1;
            }
            else
            {
                header("location: ../login.php");
                return 2;
            }
        }
    }

}

$Router = new Router();
$Router->setter($_POST['username'], $_POST['password']);
$Router->routerFunction($con);
?>
