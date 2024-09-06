<?php
$host = "fdb1033.awardspace.net";
$username = "4425980_couriour";
$password = "Arslan@1611541";
$database = "4425980_couriour";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    // Add other user-related fields as needed

    $insertQuery = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

    if ($conn->query($insertQuery) === TRUE) {
        echo "User registered successfully.";
    } else {
        echo "Error registering user: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Signup</title>
    <!-- Add your styling or link to external CSS file here -->
</head>
<body>

    <h2>User Signup</h2>

    <form method="post" action="">
        <label for="username">Username:</label>
        <input type="text" name="username" required><br>

        <label for="password">Password:</label>
        <input type="password" name="password" required><br>

        <!-- Add other user-related fields here -->

        <input type="submit" value="Signup">
    </form>

</body>
</html>
