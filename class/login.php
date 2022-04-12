<?php

namespace Login;

use database\Database as Database;

require_once 'database.php';

class Login
{
    public $loggedIn = false;
    public $userID = "";
    public $username = "";
    public $isAdmin = 0;

    public function __construct()
    {
        if (!isset($_SESSION['loggedin'])) {
            $_SESSION['loggedin'] = false;
        }
    }

    // LOGIN //

    public function login($username, $password)
    {

        if (!isset($_SESSION['loggedin'])) {
            $_SESSION['loggedin'] = false;
        }

        $db = new Database;
        $result_set = $db->query("SELECT ID, Username, PassKey, UserAdmin FROM users WHERE Username = '$username' and PassKey = '$password'");
        $results = mysqli_fetch_array($result_set);

        if ($results != null) {
            $_SESSION['loggedin'] = true;
            $this->userID = $results["ID"];
            $this->isAdmin = $results["UserAdmin"];
            $_SESSION['userId'] = $results["ID"];

            if ($this->isAdmin == 1) {
                $_SESSION['admin'] = 1;
                header("location:views/admin/dashboard.php");
            } else {
                header("location:views/user/dashboard.php");
            }
        }
    }
}
