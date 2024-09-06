<?php
include 'db.php';

$selectQuery = "SELECT * FROM couriers";
$result = $conn->query($selectQuery);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Couriers</title>
    <style>
        /* Your existing styles remain unchanged */
    </style>
</head>
<body>

    <header>
        <h1>Courier Management System</h1>
    </header>

    <nav>
        <a href="search_courier.php">Search Courier</a>
        <a href="view_couriers.php">View Couriers</a>
    </nav>

    <section>
        <h2>View Couriers</h2>
        <?php
        if ($result->num_rows > 0) {
            echo "<table>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>City</th>
                        <th>ZIP Code</th>
                        <th>Permanent Address</th>
                        <th>Item</th>
                        <th>Weight</th>
                        <th>Status</th>
                        <th>Tracking Number</th>
                    </tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["id"] . "</td>
                        <td>" . $row["name"] . "</td>
                        <td>" . $row["city"] . "</td>
                        <td>" . $row["zip_code"] . "</td>
                        <td>" . $row["permanent_address"] . "</td>
                        <td>" . $row["item"] . "</td>
                        <td>" . $row["weight"] . "</td>
                        <td>" . $row["status"] . "</td>
                        <td>" . $row["tracking_number"] . "</td>
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
