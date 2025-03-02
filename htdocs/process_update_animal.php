<?php
// Enable error reporting (for development)
// error_reporting(E_ALL);
// ini_set('display_errors', 1);

// // Include the database connection file
// include 'db_connect.php';

// // Check if the form was submitted via POST
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {

//     // Retrieve and sanitize form data
//     $animal_name = (int) $_POST['animal_name'];
//     $name      = trim($_POST['name']);
//     $habitat   = trim($_POST['habitat']);

//     // Validate the inputs
//     if ($animal_name <= 0) {
//         echo "<p>Error: Invalid animal ID.</p>";
//         exit;
//     }
//     if (empty($name) || empty($habitat) ) {
//         echo "<p>Error: Name and Habitat fields are required.</p>";
//         exit;
//     }

//     // Prepare the SQL statement to update the 'animals' table
//     $sql = "UPDATE animals SET name = ?, habitat = ? WHERE animal_name = ?";

//     if ($stmt = $conn->prepare($sql)) {
//         // Bind parameters: "s" for string and "i" for integer
//         $stmt->bind_param("ssi", $name, $habitat, $animal_name);

//         // Execute the statement and provide feedback
//         if ($stmt->execute()) {
//             echo "<p>Animal updated successfully!</p>";
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


<?php
// Enable error reporting (for development)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include the database connection file
include 'db_connect.php';

// Check if the form was submitted via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Retrieve and sanitize form data
    $animal_name = trim($_POST['animal_name']);
    $name        = trim($_POST['name']);
    $habitat     = trim($_POST['habitat']);

    // Validate the inputs
    if (empty($animal_name)) {
        echo "<p>Error: Invalid animal name.</p>";
        exit;
    }
    if (empty($name) || empty($habitat)) {
        echo "<p>Error: Name and Habitat fields are required.</p>";
        exit;
    }

    // Prepare the SQL statement to update the 'animals' table.
    // Adjust the column names if necessary.
    $sql = "UPDATE animals SET name = ?, habitat = ? WHERE name = ?";

    if ($stmt = $conn->prepare($sql)) {
        // Bind parameters: all three are strings
        $stmt->bind_param("sss", $name, $habitat, $animal_name);

        // Execute the statement and provide feedback
        if ($stmt->execute()) {
            echo "<p>Animal updated successfully!</p>";
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
