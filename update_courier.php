<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $courierId = $_POST["courier_id"];
    $newStatus = $_POST["new_status"];

    $updateQuery = "UPDATE couriers SET status='$newStatus' WHERE id=$courierId";
    $conn->query($updateQuery);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Courier Status</title>
</head>
<body>
    <h2>Update Courier Status</h2>
    <form method="post" action="">
        <label for="courier_id">Courier ID:</label>
        <input type="text" name="courier_id" required><br>

        <label for="new_status">New Status:</label>
        <input type="text" name="new_status" required><br>

        <input type="submit" value="Update Status">
    </form>
</body>
</html>
