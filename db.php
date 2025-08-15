<?php
// Database connection variables
$servername = "localhost"; // Host
$username = "root"; // Database username (default for MySQL)
$password = ""; // Database password (default is empty for local MySQL)
$dbname = "your_database_name"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connected successfully";
}
?>
