<?php
$hostname = 'localhost';      // Change this if your database is located on a different server
$username = 'id20822154_root';  // Replace with your database username
$password = 'oNnq-!K=#JY7o9}+';  // Replace with your database password
$database = 'id20822154_canteen';  // Replace with your database name

// Create a database connection
$conn = new mysqli($hostname, $username, $password, $database);

// Check the connection
if (!$conn) {
    die('Connection failed: ' . $conn->connect_error);
}

$roll = $_POST['roll'];
$b = $_POST['burger'];
$p = $_POST['pizza'];
$s = $_POST['salad'];
$f = $_POST['fries'];
$t = $_POST['total'];

$sql = "INSERT INTO `orders` (`roll`, `burger` , `pizza` ,`salad`,`fries`,`total`) VALUES ('$roll','$b','$p','$s','$f','$t')";
if ($conn->query($sql) === TRUE) {
    echo 'Yay!! Your Order Placed successfully.';
} else {
    echo 'Error: ' . $sql . '<br>' . $conn->error;
}

$conn->close();
?>