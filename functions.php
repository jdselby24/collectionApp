<?php

/**
 * Creates a database object and sets fetch mode to FETCH_ASSOC
 *
 * @return PDO Returns a PDO database connection object
 */
function connectDB() :PDO {
    $db = new PDO('mysql:host=db; dbname=joshCollection', 'root', 'password');
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $db;
}

/**
 * Returns an array of associative arrays holding the collection data from the DB specified
 *
 * @param PDO $db A database PDO object
 *
 * @return array Returns an array of associative arrays holding the collection data
 */
function getCollection(PDO $db) :array {
    $SQLStatement = "SELECT `manufacturer`,`model`, `type`, `year`, `regNo`, `color`, 
    `fuel`,`engineLayout`, `engineDisplacement`, `driveTrain`, `accel`, `power`, `torque`,
     `numberOfDoors` FROM `cars`";
    $query = $db->prepare($SQLStatement);
    $query->execute();
    $collection = $query->fetchAll();
    return $collection;
}

/**
 * This function generates the HTML to display the collection visually and generates headers
 *
 * @param array $collection The array of collection data
 *
 * @return string Returns the HTML to display the collection data in rows and columns inside a string
 */
function displayCollection(array $collection) :string {
    $htmlOut = "";
    $rowNames = ["type" => "Type:",
        "manufacturer" => "Manufacturer:",
        "model" => "Model:",
        "year" => "Year:",
        "regNo" => "Registration:",
        "color" => "Colour:",
        "fuel" => "Fuel:",
        "engineLayout" => "Engine Layout:",
        "engineDisplacement" => "Engine Displacement (cc):",
        "driveTrain" => "Drivetrain:",
        "accel" => "0 to 60MPH time (seconds):",
        "power" => "Power (HP):",
        "torque" => "Torque (NM):",
        "numberOfDoors" => "Number of Doors:"];

    foreach ($collection as $car) {
        $htmlOut .= "<div class=\"car\">";
        foreach ($car as $key => $attribute) {
            $htmlOut .= "<div class=\"tableRow\">";
            $htmlOut .= "<div class=\"dataElement tableHeader\">$rowNames[$key]</div>";
            $htmlOut .= "<div class=\"dataElement\">". $car[$key] ."</div>";
            $htmlOut .= "</div>";
        }
        $htmlOut .= "</div>";
    }
    return $htmlOut;
}

function validateAddData(array $formData) :array{
    $valid = true;
    $stage = "";
    $strings = ["manufacturer","model","type","regNo","color","fuel","engineLayout"];
    $integers = ["engineDisplacement","power","torque","numberOfDoors"];
    foreach ($formData as $key => $data) {
        if ($valid !== false) {
            if (in_array($key, $strings)) {
                if ((is_string($data)) && (strlen($data) < 256)) {
                    $valid = true;
                } else {
                    $valid = false;
                    $stage = $key;
                }
            } elseif (in_array($key, $integers)) {
                if ((is_integer((int)$data)) && (strlen($data) <= 16)) {
                    $valid = true;
                } else {
                    $valid = false;
                    $stage = $key;
                }
            } elseif ($key == "year") {
                if ((is_integer((int)$data))) {
                    $valid = true;
                } else {
                    $valid = false;
                    $stage = $key;
                }
            } elseif ($key == "driveTrain") {
                if ((is_string($data)) && ($data === "FWD" || $data === "RWD" ||$data === "AWD" || $data === "4WD")) {
                    $valid = true;
                } else {
                    $valid = false;
                    $stage = $key;
                }
            } elseif ($key == "accel") {
                if ((is_float((float)$data)) && (strlen($data) <= 4)) {
                    $valid = true;
                } else {
                    $valid = false;
                    $stage = $key;
                }
            }
        }
    }

    return [$valid,$stage];
}
