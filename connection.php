<?php
$servername = "localhost";
$username = "usuarioalmox";
$password = "0cENUP&uAz@F";
$db = "almox";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $db) or die (mysqli_error());
mysqli_select_db($conn,$db) or die(mysqli_error($conn));

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//conecção ok
//echo "Connected successfully";

//CREATE DATABASE almox;
//CREATE USER 'usuarioalmox'@'localhost' IDENTIFIED BY '0cENUP&uAz@F';
//GRANT ALL PRIVILEGES ON * . * TO 'usuarioalmox'@'localhost';
//FLUSH PRIVILEGES;
//quit
?>