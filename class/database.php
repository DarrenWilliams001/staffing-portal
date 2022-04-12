<?php

namespace database;

class Database
{

    private $db_user = 'db_user';
    private $db_pass = 'P@s$w0rd123!';
    private $db_name = "test";
    private $db_host = 'localhost';
    var $mysqli = null;

    public function __construct()
    {
        $this->mysqli = new \mysqli($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
    }

    // ***CONNECT TO DATABASE*** //

    public function Connect()
    {
        if ($this->mysqli->connect_errno) {
            printf("connection Failed" . $this->mysqli->connect_error);
            exit();
        } else {
            echo "<script> console.log('Connected')</script>";
        }
    }

    // ***QUERY DATABASE TO GET DATA BACK*** //

    public function query($queryTerm)
    {
        $results = $this->mysqli->query($queryTerm);
        return $results;

        $this->Connect->close();
    }

    //  ADD USER  //

    public function AddUser($firstname, $lastname, $email, $username, $password, $isadmin)
    {
        if ($this->query("INSERT INTO users (FirstName, LastName, Email, Username, PassKey, UserAdmin,Accepted,Opened) VALUES ('$firstname', '$lastname', '$email', '$username', '$password', $isadmin,0,0)") === TRUE) {
            header("location:dashboard.php");
        } else {
            echo "Error";
        };
    }

    //  UPDATE USER  //



    //  DELETE USER  //

    public function DeleteUser($id)
    {
        $query = "DELETE FROM users WHERE ID= '$id'";
        $this->mysqli->query($query);
    }
}
