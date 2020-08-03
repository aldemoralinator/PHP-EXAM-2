<?php 

namespace Controller;

class LoginController
{

    public function __construct()
    {

    }

    public function index()
    {
        include('../view/login.php');
    }

    public function authenticate()
    {
        $staticUsername = "root";
        $staticPassword = "secret";

        if (
            $_POST['username'] == $staticUsername && 
            $_POST['password'] == $staticPassword
        ) {
            $_SESSION["error"] = null;
            $_SESSION["username"] = $staticUsername;
            return header("Location: http://localhost:8000/currency");
        }

        $_SESSION["error"] = "ERROR: incorrect username or password";
        return header("Location: http://localhost:8000/");
    }

    public function logout()
    {
        session_unset();

        return header("Location: http://localhost:8000/");
    }

}

?>