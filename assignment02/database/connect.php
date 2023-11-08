<?php
    session_start();
    define('DB_HOST', 'localhost');
    define('DB_USER', 'admin');
    define('DB_PASS', '123456');
    define('DB_NAME', 'assignment02');

    // Create connection
    // static $conn = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
    static $conn = new mysqli('localhost','root','',DB_NAME);

    // Test connection
    if($conn->connect_error){
        die('Connection failed! ' . $conn->connect_error);
    }
    
?>
