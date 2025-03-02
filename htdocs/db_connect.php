<?php
$host     = 'localhost';
$username = 'root';
$password = 'root';          // your MySQL password
$dbname   = 'animals_db';

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connection established";
}
?>
