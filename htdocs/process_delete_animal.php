<?php
// Enable error reporting (for development)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include your database connection file
include 'db_connect.php';

// Check if the form was submitted via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve and sanitize the animal ID
    $animal_id = (int) $_POST['animal_id'];
    
    if ($animal_id <= 0) {
        die("Invalid animal ID provided.");
    }
    
    // Prepare the SQL statement to delete the animal record
    $sql = "DELETE FROM animals WHERE animal_id = ?";
    
    if ($stmt = $conn->prepare($sql)) {
        // Bind the parameter as an integer
        $stmt->bind_param("i", $animal_id);
        
        // Execute the statement
        if ($stmt->execute()) {
            echo "Animal deleted successfully.";
        } else {
            echo "Error executing deletion: " . $stmt->error;
        }
        
        // Close the statement
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
    
    // Close the connection
    $conn->close();
} else {
    echo "No form data submitted.";
}
?>
