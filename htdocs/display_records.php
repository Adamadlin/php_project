<?php
include 'db_connect.php';

$sql = "SELECT a.name, a.habitat, a.lifespan, t.type_name 
        FROM animals a
        JOIN types t ON a.type_id = t.type_id";
$result = $conn->query($sql);

echo "<h3>All Animals:</h3>";
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "Name: " . $row["name"] . " - Habitat: " . $row["habitat"] . 
             " - Lifespan: " . $row["lifespan"] . " years - Type: " . $row["type_name"] . "<br>";
    }
} else {
    echo "No records found.";
}
?>

<?php
include 'db_connect.php';

$sql = "SELECT a.name, d.diet_name 
        FROM animals a
        JOIN animal_diets ad ON a.animal_id = ad.animal_id
        JOIN diets d ON ad.diet_id = d.diet_id";
$result = $conn->query($sql);

echo "<h3>Animal Diets:</h3>";
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "Animal: " . $row["name"] . " - Diet: " . $row["diet_name"] . "<br>";
    }
} else {
    echo "No records found.";
}
?>
