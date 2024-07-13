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
    $message = "Update successful";
} else {
    $message = "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Status</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Update Status</h2>
        <p id="message"><?php echo $message; ?></p>
        <a href="dashboard.php" class="button">Go to Dashboard</a>
    </div>
</body>
</html>
