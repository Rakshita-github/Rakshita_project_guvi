<?php
$servername = "localhost"; 
$username = "root"; 
$password = "1420"; 
$dbname = "user_registration";
$mysqli = new mysqli($servername, $username, $password, $dbname);
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
?>
