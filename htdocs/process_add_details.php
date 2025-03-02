<?php
// Enable error reporting (for development)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include the database connection file
include 'db_connect.php';

// Check if the form was submitted via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Retrieve and sanitize form data
    $animal_id = (int) $_POST['animal_id'];
    
    // Retrieve optional fields; if empty, we'll set them to null
    $fur_type    = isset($_POST['fur_type']) ? trim($_POST['fur_type']) : '';
    $wing_span   = isset($_POST['wing_span']) ? trim($_POST['wing_span']) : '';
    $scales_type = isset($_POST['scales_type']) ? trim($_POST['scales_type']) : '';
    
    // Convert empty strings to null
    $fur_type    = ($fur_type === '') ? null : $fur_type;
    $wing_span   = ($wing_span === '') ? null : $wing_span;
    $scales_type = ($scales_type === '') ? null : $scales_type;
    
    // Prepare the SQL statement to insert data into the 'details' table
    $sql = "INSERT INTO details (animal_id, fur_type, wing_span, scales_type)
            VALUES (?, ?, ?, ?)";
    
    if ($stmt = $conn->prepare($sql)) {
        // Bind parameters: "i" for integer, "s" for string.
        // Note: Passing null values as strings is acceptable because MySQLi will handle them.
        $stmt->bind_param("isss", $animal_id, $fur_type, $wing_span, $scales_type);
        
        // Execute the statement and check for success
        if ($stmt->execute()) {
            echo "<p>Details added successfully!</p>";
        } else {
            echo "<p>Error executing query: " . $stmt->error . "</p>";
        }
        
        // Close the statement
        $stmt->close();
    } else {
        echo "<p>Error preparing query: " . $conn->error . "</p>";
    }
    
    // Close the database connection
    // $conn->close();
    
} else {
    echo "<p>No form data submitted.</p>";
}
?>
