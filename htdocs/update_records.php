<?php
include 'db_connect.php';

// Update 1: Change the lifespan of the 'Elephant'
$sql = "UPDATE animals SET lifespan = 65 WHERE name = 'Elephant'";
$conn->query($sql);

// Update 2: Update the details record (e.g., change fur_type for Elephant)


// $elephantAnimalId =  (int)$conn->query("SELECT animal_id FROM animals WHERE name = 'Elephant'")->fetch_object()->animal_id;
// $sql = "UPDATE details SET fur_type = 'Very Thick' WHERE animal_id = $elephantAnimalId";
// $conn->query($sql);

echo "Records updated successfully.";
// $conn->close();
?>

