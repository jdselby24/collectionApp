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
function getCollection(PDO $db): array
{
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
function displayCollection(array $collection): string
{
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
            $htmlOut .= "<div class=\"dataElement\">" . $car[$key] . "</div>";
            $htmlOut .= "</div>";
        }
        $htmlOut .= "</div>";
    }
    return $htmlOut;
}

/**
 * Checks to see if the inputted form data is valid or not
 *
 * @param array $formData Data from the users input form
 *
 * @return array Returns an array containing a bool representing wether or not the form was valid
 * and which item in the form was invalid
 */
function validateAddData(array $formData): array
{
    $valid = true;
    $stage = "";
    $strings = ["manufacturer", "model", "type", "regNo", "color", "fuel", "engineLayout"];
    $integers = ["engineDisplacement", "power", "torque", "numberOfDoors"];
    foreach ($formData as $formItem) {
        if ($valid === true) {
            if(strlen($formItem) !== 0) {
                $valid = true;
            } else {
                $valid = false;
                $stage = "Form is incomplete!";
                return [$valid,$stage];
            }

            foreach ($formData as $key => $data) {
                if ($valid !== false) {
                    if (in_array($key, $strings)) {
                        if ((is_string((string)$data)) && (strlen($data) < 256)) {
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
                        if ((is_string((string)$data)) && ($data === "FWD" || $data === "RWD" || $data === "AWD" || $data === "4WD")) {
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
        }
    }


    return ["valid" => $valid, "failedAt" => $stage];
}

/**
 * Generates a error message for an invalid form
 *
 * @param array $formValidity Array containing a bool representing the validity of a form and the part of the form
 * that caused invalidity.
 *
 * @return string The error message for a invalid form
 */
function formError(array $formValidity): string
{
    $rowNames = ["type" => "Type",
        "manufacturer" => "Manufacturer",
        "model" => "Model",
        "year" => "Year",
        "regNo" => "Registration",
        "color" => "Colour",
        "fuel" => "Fuel",
        "engineLayout" => "Engine Layout",
        "engineDisplacement" => "Engine Displacement (cc)",
        "driveTrain" => "Drivetrain",
        "accel" => "0 to 60MPH time (seconds)",
        "power" => "Power (HP)",
        "torque" => "Torque (NM)",
        "numberOfDoors" => "Number of Doors"];

    if(key_exists($formValidity[1], $rowNames)) {
        $errorMsg = "Data in '" . $rowNames[$formValidity[1]] . "' is invalid or is of the wrong type";
    } else {
        $errorMsg = "Data in '" . $formValidity[1] . "' is invalid or is of the wrong type";
    }

    return $errorMsg;

}

/**
 * Inserts data from an array into a database
 *
 * @param array $formData An associative array containing the data from a form
 *
 * @param PDO $db A PDO database connection object
 *
 * @return string A string containing a status message
 */
function addToDB(array $formData, PDO $db): string
{
    $statement = "INSERT INTO `cars` (`manufacturer`,`model`, `type`, `year`, `regNo`, `color`, 
    `fuel`,`engineLayout`, `engineDisplacement`, `driveTrain`, `accel`, `power`, `torque`,
     `numberOfDoors`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?);";

    $query = $db->prepare($statement);
    $state = $query->execute([filter_var($formData['manufacturer'], FILTER_SANITIZE_STRING),
    filter_var($formData['model'], FILTER_SANITIZE_STRING),
    filter_var($formData['type'], FILTER_SANITIZE_STRING),
    filter_var($formData['year'], FILTER_SANITIZE_STRING),
    filter_var($formData['regNo'], FILTER_SANITIZE_STRING),
    filter_var($formData['color'], FILTER_SANITIZE_STRING),
    filter_var($formData['fuel'], FILTER_SANITIZE_STRING),
    filter_var($formData['engineLayout'], FILTER_SANITIZE_STRING),
    filter_var($formData['engineDisplacement'], FILTER_SANITIZE_STRING),
    filter_var($formData['driveTrain'], FILTER_SANITIZE_STRING),
    filter_var($formData['accel'], FILTER_SANITIZE_STRING),
    filter_var($formData['power'], FILTER_SANITIZE_STRING),
    filter_var($formData['torque'], FILTER_SANITIZE_STRING),
    filter_var($formData['numberOfDoors'], FILTER_SANITIZE_STRING)]);

    return $state;
}
?>