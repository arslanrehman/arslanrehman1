<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $searchValue = $_POST["search_value"];

    $searchQuery = "SELECT * FROM couriers WHERE tracking_number = '$searchValue' OR name LIKE '%$searchValue%'";
    $result = $conn->query($searchQuery);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Courier</title>
    <style>
        /* Your styling for the search page */
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
        <h2>Search Courier</h2>
        <form method="post" action="">
            <label for="search_value">Enter Tracking Number or Name:</label>
            <input type="text" name="search_value" required>
            <input type="submit" value="Search">
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && $result->num_rows > 0) {
            echo "<h3>Search Results:</h3>";
            while ($row = $result->fetch_assoc()) {
                // Display search results here
                echo "<p>Name: " . $row["name"] . "</p>";
                echo "<p>Tracking Number: " . $row["tracking_number"] . "</p>";
                // Add other fields as needed
            }
        } elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
            echo "<p>No couriers found.</p>";
        }
        ?>
    </section>

</body>
</html>
