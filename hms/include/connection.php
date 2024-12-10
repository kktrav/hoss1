<?php
$host = "localhost"; // Replace with your database host
$user = "root";      // Replace with your database username
$password = "";      // Replace with your database password
$database = "hms";   // Replace with your database name

$connect = new mysqli($host, $user, $password, $database);

// Check connection
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}
?>
