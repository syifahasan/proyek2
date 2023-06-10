<?php

use Illuminate\Support\Facades\Auth;

$conn = new mysqli('localhost', 'root', '', 'absensimhs');

if ($conn -> connect_errno){
    echo "Failed to connect to mySQL: " . $conn -> connect_error;
    exit();
}

include_once 'authClass.php';

$user = new Auth();
?>
