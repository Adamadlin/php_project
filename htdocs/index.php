<?php
// Include the database connection and other required files
include 'db_connect.php';
include 'insert_records.php';
include 'display_records.php';
include 'update_records.php';
include 'delete_records.php';
include 'add_animal.html';
include 'add_details.html';
include 'assign_diet.html';
include 'update_animal.html';
include 'process_delete_animal.php';
include 'delete_animal.html';
// The rest of your code (your classes and object instantiation)
  
// Parent class
class Animals {
    public $name;
    public $age;
    public $habitat;
    public $lifespan;
    public $diet;
    public $birthYear;

    public function __construct($name, $birthYear, $habitat, $lifespan, $diet) {
        $this->name = $name;
        $this->birthYear = $birthYear;
        $this->habitat = $habitat;
        $this->lifespan = $lifespan;
        $this->diet = $diet;
        $this->age = $this->calculateAge();
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getAge() {
        return $this->age;
    }

    public function setAge($age) {
        $this->age = $age;
    }

    public function getHabitat() {
        return $this->habitat;
    }

    public function setHabitat($habitat) {
        $this->habitat = $habitat;
    }

    public function getLifespan() {
        return $this->lifespan;
    }

    public function setLifespan($lifespan) {
        $this->lifespan = $lifespan;
    }

    public function getDiet() {
        return $this->diet;
    }

    public function setDiet($diet) {
        $this->diet = $diet;
    }

    public function calculateAge() {
        $currentYear = date("Y");
        return $currentYear - $this->birthYear;
    }

    public static function getLongestLifespanAnimal($animals) {
        $longestLifespanAnimal = $animals[0];
        foreach ($animals as $animal) {
            if ($animal->getLifespan() > $longestLifespanAnimal->getLifespan()) {
                $longestLifespanAnimal = $animal;
            }
        }
        return $longestLifespanAnimal;
    }
}





class Mammals extends Animals {
    public $furType;
    public $sDomesticated;
    
    public function __construct($name, $birthYear, $habitat, $lifespan, $diet, $furType, $sDomesticated) {
        parent::__construct($name, $birthYear, $habitat, $lifespan, $diet);
        $this->furType = $furType;
        $this->sDomesticated = $sDomesticated;
    }

    public function getFurType() {
        return $this->furType;
    }

    public function setFurType($furType) {
        $this->furType = $furType;
    }
    
    // Getter for is domesticated
    public function getIsDomesticated() {
        return $this->sDomesticated;
    }

    // Setter for is domesticated
    public function setIsDomesticated($sDomesticated) {
        $this->sDomesticated = $sDomesticated;
    }

    public function giveBirth() {
        $babyName = $this->name . "'s Baby";
        $baby = new Mammal($babyName, 0, $this->furColor, $this->isDomesticated);
        echo "{$this->name} has given birth to a baby named {$baby->name}!\n";
        return $baby;
    }

    public function is_new_milenium() {
        if ($this->$birthYear >2001) {
            echo "born in the new milenium";
        }
    } 
}


// Child class 2: Birds
class Birds extends Animals {
    public $wingSpan;
    public $wingColor; // New property for wing color

    public function __construct($name, $birthYear, $habitat, $lifespan, $diet, $wingSpan, $wingColor) {
        parent::__construct($name, $birthYear, $habitat, $lifespan, $diet);
        $this->wingSpan = $wingSpan;
        $this->wingColor = $wingColor;
    }

    public function getWingSpan() {
        return $this->wingSpan;
    }

    public function setWingSpan($wingSpan) {
        $this->wingSpan = $wingSpan;
    }

    public function getWingColor() {
        return $this->wingColor;
    }

    public function setWingColor($wingColor) {
        $this->wingColor = $wingColor;
    }

    

    public function sing() {
        echo "{$this->name} is singing a melody.\n";
    }
}




class Reptiles extends Animals {
    public $scalesType;
    public $isdangerous;

    public function __construct($name, $birthYear, $habitat, $lifespan, $diet, $scalesType) {
        parent::__construct($name, $birthYear, $habitat, $lifespan, $diet);
        $this->scalesType = $scalesType;
        $this->isdangerous = false;

    }

    public function getScalesType() {
        return $this->scalesType;
    }

    public function setScalesType($scalesType) {
        $this->scalesType = $scalesType;
    }

    public function isdangerous() {
        if($scalesType == 'hard'){
            echo "{$this->name} is dangerous .\n";
            $this->isdangerous = true;
        }
    }

    public function is_snake() {
        if (strtolower($this->name) == 'snake') {
            echo "Careful, might have venom";
        }
    }
    
    
}



$sql_find_animals = "SELECT * FROM animals ORDER BY lifespan DESC LIMIT 1";
$result_animals = $conn->query($sql_find_animals);

echo "<h3>Animal with the Longest Lifespan:</h3>";

if ($result_animals && $result_animals->num_rows > 0) {
    $animal = $result_animals->fetch_assoc();
    echo "Name: " . htmlspecialchars($animal['name']) . "<br>";
    echo "Lifespan: " . htmlspecialchars($animal['lifespan']) . " years<br>";
    echo "Habitat: " . htmlspecialchars($animal['habitat']) . "<br>";
    // Display additional fields as needed
} else {
    echo "<p>No animals found.</p>";
}

// $conn->close();




?>



