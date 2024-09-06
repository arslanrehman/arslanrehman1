<?php
session_start();

if (!isset($_SESSION["user_type"]) || $_SESSION["user_type"] !== "user") {
    header("Location: login_user.php");
    exit();
}

// Add your user-specific code here

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <!-- Add your styling or link to external CSS file here -->
</head>
<body>

    <h2>Welcome, <?php echo $_SESSION["username"]; ?>!</h2>
    <!-- Add user-specific content here -->

</body>
</html>
