<?php
session_start();
session_destroy();
echo "You have been logged out.";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Logout</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <h2>You have been logged out.</h2>
        <a href="login.html">Login Again</a>
    </div>
</body>
</html>
