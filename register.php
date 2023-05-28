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

// $table = 'user';
$roll = $_POST['roll'];
$email = $_POST['email'];
$pwd = $_POST['password'];

$sql = "INSERT INTO `user` (`roll`, `email` , `password`) VALUES ('$roll','$email','$pwd')";

if ($conn->query($sql) === TRUE) {
    echo 'Yay!! Regestration Successfull!!.';
} else {
    echo 'Error: ' . $sql . '<br>' . $conn->error;
}

$conn->close();
?>