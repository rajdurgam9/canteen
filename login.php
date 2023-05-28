<?php
session_start(); // Start the session

// Retrieve the entered username and password from the login form
$rollnum = $_POST['roll'];
$e = $_POST['email'];
$p = $_POST['password'];

// Establish a database connection
$hostname = 'localhost';
$dbUsername = 'id20822154_root';
$dbPassword = 'oNnq-!K=#JY7o9}+';
$database = 'id20822154_canteen';

$conn = new mysqli($hostname, $dbUsername, $dbPassword, $database);
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

// Prepare the SQL statement to retrieve the user details
$sql = "SELECT * FROM user WHERE roll = '$rollnum' and password = '$p'";
$result = $conn->query($sql);

// Check if the query returned a matching user
if ($result->num_rows === 1) {
    // Authentication successful
    // $_SESSION['username'] = $username; // Store the username in the session variable
    echo '<script>window.location.href = "orders.html";</script>';
} else {
    // Authentication failed
   echo '<script>window.location.href = "Student_Login.html";</script>';
}

$conn->close();
?>
