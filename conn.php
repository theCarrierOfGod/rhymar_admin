<?php

session_start();
define('DB_SERVER', 'localhost');
define('DB_USER', 'rhymarwo_all');
define('DB_PASS', 'rhymarwo_all');
define('DB_NAME', 'rhymarwo_all');
$con = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
$conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
} else {
    //echo "connected sucessfully ";	
}