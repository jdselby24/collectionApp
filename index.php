<?php
require_once('functions.php');

$db = connectDB();
$collection = getCollection($db);

?>

<!DOCTYPE html>
<html>
<title>Josh's Car Collection</title>
<link rel="stylesheet" type="text/css" href="styles.css">

<head>

</head>

<body>
<h1> Josh's Car Collection</h1>
<div class="tableRow" id="tableHeader">
    <div class="dataElement">Type</div>
    <div class="dataElement">Manufacturer</div>
    <div class="dataElement">Model</div>
    <div class="dataElement">Year</div>
    <div class="dataElement">Registration</div>
    <div class="dataElement">Colour</div>
    <div class="dataElement">Fuel Type</div>
    <div class="dataElement">Fuel Type</div>
    <div class="dataElement">Engine Layout</div>
    <div class="dataElement">Engine Displacement</div>
    <div class="dataElement">Drivetrain</div>
    <div class="dataElement">0 to 60 time</div>
    <div class="dataElement">Power</div>
    <div class="dataElement">Torque</div>
    <div class="dataElement">Number of Doors</div>
</div>
</body>

</html>
