<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login.html");
    exit();
}

$conn = new mysqli('localhost', 'root', '', 'user_db');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$newUsername = $_POST['username'];
$newEmail = $_POST['email'];
$newPassword = password_hash($_POST['password'], PASSWORD_BCRYPT);
$currentEmail = $_SESSION['email'];

$sql = "UPDATE users SET username='$newUsername', email='$newEmail', password='$newPassword' WHERE email='$currentEmail'";
if ($conn->query($sql) === TRUE) {
    $_SESSION['email'] = $newEmail;
    echo "Update successful";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
