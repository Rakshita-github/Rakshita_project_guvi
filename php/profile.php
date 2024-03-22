<?php
$servername = "localhost";
$username = "root";
$password = "1420";
$dbname = "user_registration";
$mysqli = new mysqli($servername, $username, $password, $dbname);
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
$sql = "SELECT * FROM user_profile WHERE username = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0) {
    $userProfile = $result->fetch_assoc();
    echo "Username: " . $userProfile['username'] . "<br>";
    echo "Age: " . $userProfile['age'] . "<br>";
    echo "DOB: " . $userProfile['dob'] . "<br>";
    echo "Contact: " . $userProfile['contact'] . "<br>";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $age = $_POST['age'];
        $dob = $_POST['dob'];
        $contact = $_POST['contact'];
        $sql = "UPDATE user_profile SET age = ?, dob = ?, contact = ? WHERE username = ?";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("ssss", $age, $dob, $contact, $username);
        if ($stmt->execute()) {
            echo "Profile updated successfully";
        } else {
            echo "Error updating profile: " . $mysqli->error;
        }
    }
} else {
    echo "User profile not found";
}
$stmt->close();
$mysqli->close();
?>
