<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete_courier"])) {
    $courierId = $_POST["courier_id"];

    // Validate and sanitize user input as needed

    // Delete the courier from the database
    $deleteQuery = "DELETE FROM couriers WHERE your_table_primary_key = '$courierId'";

    if ($conn->query($deleteQuery) === TRUE) {
        echo "<p class='success-message'>Courier deleted successfully.</p>";
    } else {
        echo "<p class='error-message'>Error deleting courier: " . $conn->error . "</p>";
    }
}

// Retrieve the updated list of couriers
$selectQuery = "SELECT * FROM couriers";
$result = $conn->query($selectQuery);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Courier</title>
    <style>
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

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #333;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f0f0f0;
        }

        .back-btn {
            display: inline-block;
            background-color: #555;
            color: #fff;
            padding: 10px;
            text-decoration: none;
            margin-bottom: 20px;
        }

        .back-btn:hover {
            background-color: #333;
        }

        .success-message {
            color: green;
        }

        .error-message {
            color: red;
        }
    </style>
</head>
<body>

    <header>
        <h1>Courier Management System</h1>
    </header>

    <nav>
        <a href="admin_page.php">Admin Page</a>
        <a href="search_courier.php">Search Page</a>
        <a href="update_page.php">Update Page</a>
    </nav>

    <section>
        <a class="back-btn" href="admin_page.php">Back to Admin Page</a>
        <h2>Delete Courier</h2>

        <!-- Display Couriers Table -->
        <?php
        if ($result->num_rows > 0) {
            echo "<table>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>City</th>
                        <!-- Add other columns as needed -->
                        <th>Action</th>
                    </tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["id"] . "</td>
                        <td>" . $row["name"] . "</td>
                        <td>" . $row["city"] . "</td>
                        <!-- Add other columns as needed -->
                        <td>
                            <form method='post' action=''>
                                <input type='hidden' name='courier_id' value='" . $row["your_table_primary_key"] . "'>
                                <input type='submit' name='delete_courier' value='Delete'>
                            </form>
                        </td>
                    </tr>";
            }

            echo "</table>";
        } else {
            echo "<p>No couriers found.</p>";
        }
        ?>
    </section>

</body>
</html>
