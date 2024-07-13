<?php
session_start();
$conn = new mysqli('localhost', 'root', '', 'user_db');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE email='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])) {
        $_SESSION['email'] = $email;
        header("Location: dashboard.php");
    } else {
        echo "Invalid password";
    }
} else {
    echo "No user found with that email";
}

$conn->close();
?>
