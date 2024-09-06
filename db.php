<?php
$host = "fdb1033.awardspace.net";
$username = "4425980_couriour";
$password = "Arslan@1611541";
$database = "4425980_couriour";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

session_start();

if (!isset($_SESSION["user_type"]) || $_SESSION["user_type"] !== "admin") {
    header("Location: login.php");
    exit();
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete_id"])) {
    $courierId = $_POST["delete_id"];

    // Delete the courier with the specified ID from the database
    $deleteQuery = "DELETE FROM couriers WHERE id = $courierId";
    if ($conn->query($deleteQuery) === TRUE) {
        echo "Courier deleted successfully.";
    } else {
        echo "Error deleting courier: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Courier</title>
    <style>
        /* Your styling for the delete page */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        header {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 1em;
        }

        nav {
            background-color: #555;
            overflow: hidden;
        }

        nav a {
            float: left;
            display: block;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        nav a:hover {
            background-color: #ddd;
            color: black;
        }

        section {
            margin: 20px;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }

        h2 {
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            background-color: #333;
            color: #fff;
            padding: 10px;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #555;
        }
    </style>
</head>
<body>

    <header>
        <h1>Courier Management System</h1>
    </header>

    <nav>
        <a href="search_courier.php">Search Courier</a>
        <a href="view_couriers.php">View Couriers</a>
        <a href="delete_courier.php">Delete Courier</a>
    </nav>

    <section>
        <h2>Delete Courier</h2>

        <form method="post" action="">
            <label for="delete_id">Enter Courier ID to Delete:</label>
            <input type="number" name="delete_id" required>
            <input type="submit" value="Delete">
        </form>

    </section>

</body>
</html>
