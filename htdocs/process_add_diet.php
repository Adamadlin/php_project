<?php
// Enable error reporting (for development)
// error_reporting(E_ALL);
// ini_set('display_errors', 1);

// // Include the database connection file
// include 'db_connect.php';

// // Check if the form was submitted using the POST method
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {

//     // Retrieve and sanitize the form data
//     $diet_name = trim($_POST['diet_name']);

//     // Check that the diet name is not empty
//     if (empty($diet_name)) {
//         echo "<p>Error: Diet name cannot be empty.</p>";
//         exit;
//     }

//     // Prepare the SQL statement to insert data into the 'diets' table
//     $sql = "INSERT INTO diets (diet_name) VALUES (?)";
    
//     if ($stmt = $conn->prepare($sql)) {
//         // Bind parameters: "s" indicates that $diet_name is a string.
//         $stmt->bind_param("s", $diet_name);
        
//         // Execute the statement
//         if ($stmt->execute()) {
//             echo "<p>Diet added successfully!</p>";
//         } else {
//             echo "<p>Error executing query: " . $stmt->error . "</p>";
//         }
        
//         // Close the statement
//         $stmt->close();
//     } else {
//         echo "<p>Error preparing query: " . $conn->error . "</p>";
//     }
    
//     // Close the database connection
//     $conn->close();
    
// } else {
//     echo "<p>No form data submitted.</p>";
// }
?>
