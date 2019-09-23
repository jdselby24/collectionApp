<?php
/**
 * Connects to the database holding the collections and sets fetch mode to FETCH_ASSOC
 *
 * @return PDO Returns a PDO database connection object
 */
function connectDB() {
    $db = new PDO('mysql:host=db; dbname=joshCollection', 'root', 'password');
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $db;
}

/**
 * Returns an array of associative arrays holding the collection data from the DB specified
 *
 * @param PDO $db A database PDO object holding a collection
 * @return array Returns an array of associative arrays holding the collection data
 */
function getCollection(PDO $db) {
    $query = $db->prepare("SELECT `type`, `manufacturer`,`model`, `year`, `regNo`, `color`, `fuel`,`engineLayout`, `engineDisplacement`, `driveTrain`, `accel`, `power`, `torque`, `numberOfDoors` FROM `cars`");
    $query->execute();
    $collection = $query->fetchAll();
    return $collection;
}

/**
 * This function generates the HTML to display the collection visually and generates a table header
 *
 * @param array $collection The array of collection data as returned by getCollection function
 * @return string Returns the HTML to display the collection data in rows and columns
 */
function displayCollection(array $collection) {
    $htmlOut = "";
    $htmlOut .= "<h1> Josh's Car Collection</h1>";
    $htmlOut .= "<div class=\"tableRow\" id=\"tableHeader\">
    <div class=\"dataElement\">Type</div>
    <div class=\"dataElement\">Manufacturer</div>
    <div class=\"dataElement\">Model</div>
    <div class=\"dataElement\">Year</div>
    <div class=\"dataElement\">Registration</div>
    <div class=\"dataElement\">Colour</div>
    <div class=\"dataElement\">Fuel Type</div>
    <div class=\"dataElement\">Engine Layout</div>
    <div class=\"dataElement\">Engine Displacement (cc)</div>
    <div class=\"dataElement\">Drivetrain</div>
    <div class=\"dataElement\">0 to 60 time (seconds)</div>
    <div class=\"dataElement\">Power (HP)</div>
    <div class=\"dataElement\">Torque (NM)</div>
    <div class=\"dataElement\">Number of Doors</div>
</div>";

    foreach ($collection as $car) {
        $htmlOut .= "<div class=\"tableRow\">";
        foreach ($car as $attribute) {
            $htmlOut .= "<div class=\"dataElement\">$attribute</div>";
        }
        $htmlOut .= "</div>";
    }

    return $htmlOut;
}



