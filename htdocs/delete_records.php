<?php
include 'db_connect.php';

// Delete 1: Remove a specific record from the join table, e.g. remove one diet from Eagle
// For example, remove the 'Omnivore' diet (diet_id = 3) from Eagle.
$eagleAnimalId = (int)$conn->query("SELECT animal_id FROM animals WHERE name = 'Eagle'")->fetch_object()->animal_id;
$sql = "DELETE FROM animal_diets WHERE animal_id = $eagleAnimalId AND diet_id = 3";
$conn->query($sql);

// Delete 2: Remove an animal completely (will also remove details and join records via CASCADE)
$sql = "DELETE FROM animals WHERE name = 'Crocodile'";
$conn->query($sql);

echo "Records deleted successfully.";
// $conn->close();
?>
