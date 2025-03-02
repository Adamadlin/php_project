<?php
// Enable error reporting (for development)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include the database connection file
include 'db_connect.php';

// Check if the form was submitted using the POST method
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Retrieve form data and sanitize as needed
    $name       = trim($_POST['name']);
    $birth_year = (int) $_POST['birth_year'];
    $habitat    = trim($_POST['habitat']);
    $lifespan   = (int) $_POST['lifespan'];
    $type_id    = (int) $_POST['type_id'];

    // Optionally, validate the data further here

    // Prepare the SQL statement to insert data into the 'animals' table
    $sql = "INSERT INTO animals (name, birth_year, habitat, lifespan, type_id) VALUES (?, ?, ?, ?, ?)";
    
    // Prepare a statement
    if ($stmt = $conn->prepare($sql)) {
        // Bind parameters: s = string, i = integer
        $stmt->bind_param("sissi", $name, $birth_year, $habitat, $lifespan, $type_id);
        
        // Execute the statement
        if ($stmt->execute()) {
            echo "<p>Animal added successfully!</p>";
        } else {
            echo "<p>Error executing query: " . $stmt->error . "</p>";
        }
        
        // Close the statement
        $stmt->close();
    } else {
        echo "<p>Error preparing query: " . $conn->error . "</p>";
    }
    
    // Close the database connection (optional)
    $conn->close();
    
} else {
    echo "<p>No form data submitted.</p>";
}
?>
