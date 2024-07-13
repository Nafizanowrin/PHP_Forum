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

// Check if the logged-in user is the first registered user
$currentEmail = $_SESSION['email'];
$sql = "SELECT * FROM users ORDER BY id ASC LIMIT 1";
$result = $conn->query($sql);
$firstUser = $result->fetch_assoc();

if ($firstUser['email'] != $currentEmail) {
    echo "You do not have permission to view this page.";
    exit();
}

// Fetch all registered users
$sql = "SELECT * FROM users";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>All Registered Users</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <h2>All Registered Users</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Email</th>
                <th>Username</th>
            </tr>
            <?php
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row['id'] . "</td><td>" . $row['email'] . "</td><td>" . $row['username'] . "</td></tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>
<?php
$conn->close();
?>
