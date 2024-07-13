<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Welcome Dear, <?php echo $_SESSION['email']; ?></h2>
        <a href="update.html">Update</a>
        <a href="logout.html">Logout</a>
    </div>
</body>
</html>
