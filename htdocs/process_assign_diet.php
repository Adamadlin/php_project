<?php
// Enable error reporting (for development)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include the database connection file
include 'db_connect.php';

// Check if the form was submitted via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Retrieve and sanitize the form data
    $animal_id = (int) $_POST['animal_id'];
    $diet_id   = (int) $_POST['diet_id'];

    // Optionally, validate that the IDs are valid (greater than zero)
    if ($animal_id <= 0 || $diet_id <= 0) {
        echo "<p>Error: Invalid animal or diet ID.</p>";
        exit;
    }

    // Prepare the SQL statement to insert data into the join table 'animal_diets'
    $sql = "INSERT INTO animal_diets (animal_id, diet_id) VALUES (?, ?)";

    if ($stmt = $conn->prepare($sql)) {
        // Bind parameters: "ii" means two integers
        $stmt->bind_param("ii", $animal_id, $diet_id);

        // Execute the statement and check for success
        if ($stmt->execute()) {
            echo "<p>Diet assignment successful!</p>";
        } else {
            echo "<p>Error executing query: " . $stmt->error . "</p>";
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "<p>Error preparing query: " . $conn->error . "</p>";
    }

    // Close the database connection
    $conn->close();

} else {
    echo "<p>No form data submitted.</p>";
}
?>
