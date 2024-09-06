<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // For simplicity, let's check if the username and password match a predefined admin account
    if ($username == "arslan" && $password == "123") {
        $_SESSION["user_type"] = "admin";
        header("Location: admin_dashboard.php");
        exit();
    } else {
        echo "Invalid credentials. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        /* Your styling for the login page */
    </style>
</head>
<body>

    <header>
        <h1>Courier Management System</h1>
    </header>

    <section>
        <h2>Login</h2>
        <form method="post" action="">
            <label for="username">Username:</label>
            <input type="text" name="username" required><br>

            <label for="password">Password:</label>
            <input type="password" name="password" required><br>

            <input type="submit" value="Login">
        </form>
    </section>

</body>
</html>
