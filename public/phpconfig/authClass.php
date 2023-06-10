<?php
require_once 'dbconfig.php';
class Auth{
    private $db;
    private $error;

    function __construct($db_conn)
    {
        $this -> db = $db_conn;
        session_start();
    }

    public function login($username, $password){
        $username = $_POST['username'];
        $password = $_POST['password'];
        }
    }
?>
