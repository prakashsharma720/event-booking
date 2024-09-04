<?php
// Start the session
session_start();

// Check if the user is logged in; if not, redirect to the login page
if (!isset($_SESSION['token']) || !isset($_SESSION['userId'])) {
    header("Location: login.php");
    exit();
}

// Retrieve user information from the session
$userName = $_SESSION['name'] ?? 'Guest';
$email = $_SESSION['email'] ?? 'Not provided';
$loginTime = $_SESSION['login_time'] ?? 'Not recorded';

?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="styles.css"> <!-- Include your CSS file -->
</head>
<body>
    <div class="container">
        <h1>Welcome to Your Dashboard</h1>
        <p>Hello, <strong><?php echo htmlspecialchars($userName); ?></strong>!</p>
        <p>Your email: <strong><?php echo htmlspecialchars($email); ?></strong></p>
        <p>You logged in at: <strong><?php echo htmlspecialchars($loginTime); ?></strong></p>

        <div class="actions">
            <a href="logout.php" class="btn btn-danger">Logout</a>
        </div>
    </div>
</body>
</html>
