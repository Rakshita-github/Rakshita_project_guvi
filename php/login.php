<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost"; 
    $username = "root"; 
    $password = "1420"; 
    $dbname = "user_registration"; 
    $mysqli = new mysqli($servername, $username, $password, $dbname);
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email_id = $_POST['email_id'];
    $stmt = $mysqli->prepare("SELECT password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($hashed_password);
    $stmt->fetch();
    $stmt->close();
    if (password_verify($password, $hashed_password)) {
        echo "success";
    } else {
        echo "Invalid username or password";
    }
    $mysqli->close();
}
?>
