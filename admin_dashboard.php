<?php
session_start();

if (!isset($_SESSION["user_type"]) || $_SESSION["user_type"] !== "admin") {
    header("Location: login.php");
    exit();
}

// You can add any additional admin-specific code here
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        /* Your styling for the admin dashboard */
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

        p {
            color: #666;
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
        <a href="add_courier.php">Add Courier</a>
        <a href="delete_courier.php">Delete Courier</a>
        <a href="update_courier.php">Update Courier</a>
    </nav>

    <section>
        <h2>Welcome, Admin!</h2>
        <p>Manage couriers efficiently using the links above.</p>
        <!-- Add additional admin-specific content here -->
    </section>

</body>
</html>
