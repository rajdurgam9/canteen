<?php
// Establish a database connection
$hostname = 'localhost';
$dbUsername = 'id20822154_root';
$dbPassword = 'oNnq-!K=#JY7o9}+';
$database = 'id20822154_canteen';

$conn = new mysqli($hostname, $dbUsername, $dbPassword, $database);
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

// Delete the first row from the table
$sql = "DELETE FROM orders ORDER BY time LIMIT 1";
$conn->query($sql);

// Close the database connection
$conn->close();
?>
