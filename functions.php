<?php
/**
 * Connects to the database holding the collections and sets fetch mode to FETCH_ASSOC
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
 * @param PDO $db A database PDO object holding a collection
 * @return array Returns an array of associative arrays holding the collection data
 */
function getCollection(PDO $db) {
    $query = $db->prepare("SELECT `type`, `manufacturer`,`model`, `year`, `regNo`, `color`, `fuel`,`engineLayout`, `engineDisplacement`, `driveTrain`, `accel`, `power`, `torque`, `numberOfDoors` FROM `cars`");
    $query->execute();
    $collection = $query->fetchAll();
    return $collection;
}


