<?php
$host = "localhost";
$user = 'root';
$password = '123'; // Replace with the correct password if required
$database = "hms";

$connect = new mysqli($host, $user, $password, $database);

if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}
echo "Connected successfully!";
?>
