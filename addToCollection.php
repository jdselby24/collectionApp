<?php
session_start();
require_once('functions.php');

if(isset($_SESSION["formError"])) {
    echo "<h2>" . $_SESSION["formError"] . "</h2>";
    session_destroy();
}
?>
<html>

<head>
    <title>Josh's Car Collection - Add</title>
    <link rel="stylesheet" type="text/css" href="normalize.css"/>
    <link rel="stylesheet" type="text/css" href="styles.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>

<body>

<h1> Josh's Car Collection</h1>
<h3><a href="index.php">Back to Collection</a></h3>

<div class="newCar">
    <h3>Add Car:</h3>
    <form method="post" action="addCar.php?authenticated=true">
        <div class="tableRow">
            <div class="dataElement tableHeader">Manufacturer:</div>
            <div class="dataElement"><input name="manufacturer" type="text" maxlength="255" placeholder="e.g. Volkswagen" required/></div>
        </div>
        <div class="tableRow">
            <div class="dataElement tableHeader">Model:</div>
            <div class="dataElement"><input name="model" type="text" maxlength="255" placeholder="e.g. Golf Mk4" required/></div>
        </div>
        <div class="tableRow">
            <div class="dataElement tableHeader">Type:</div>
            <div class="dataElement"><input name="type" type="text" maxlength="255" placeholder="e.g. Hatchback" required/></div>
        </div>
        <div class="tableRow">
            <div class="dataElement tableHeader">Year:</div>
            <div class="dataElement"><input type="number" name="year" maxlength="4" min="0" max="9999" required/></div>
        </div>
        <div class="tableRow">
            <div class="dataElement tableHeader">Registration:</div>
            <div class="dataElement"><input name="regNo" type="text" maxlength="16" placeholder="e.g. AA54 BCD" required/></div>
        </div>
        <div class="tableRow">
            <div class="dataElement tableHeader">Colour:</div>
            <div class="dataElement"><input name="color" type="text" maxlength="255" placeholder="e.g. Blue" required/></div>
        </div>
        <div class="tableRow">
            <div class="dataElement tableHeader">Fuel:</div>
            <div class="dataElement"><input name="fuel" type="text" maxlength="127" placeholder="e.g. Petrol" required/></div>
        </div>
        <div class="tableRow">
            <div class="dataElement tableHeader">Engine Layout:</div>
            <div class="dataElement"><input name="engineLayout" type="text" maxlength="4" placeholder="e.g. V8" required/></div>
        </div>
        <div class="tableRow">
            <div class="dataElement tableHeader">Engine Displacement (cc):</div>
            <div class="dataElement"><input name="engineDisplacement" maxlength="5" type="number" min="0" max="99999" required/></div>
        </div>
        <div class="tableRow">
            <div class="dataElement tableHeader">Drivetrain:</div>
            <div class="dataElement">
                <select name="driveTrain">
                    <option value="FWD">FWD</option>
                    <option value="RWD">RWD</option>
                    <option value="AWD">AWD</option>
                    <option value="4WD">4WD</option>
                </select>
            </div>
        </div>
        <div class="tableRow">
            <div class="dataElement tableHeader">0 to 60MPH time (seconds):</div>
            <div class="dataElement"><input name="accel" type="number" step="0.1" min="0.1" max="999" required/></div>
        </div>
        <div class="tableRow">
            <div class="dataElement tableHeader">Power (HP):</div>
            <div class="dataElement"><input name="power" type="number" maxlength="16" min="1" max="9999" required/></div>
        </div>
        <div class="tableRow">
            <div class="dataElement tableHeader">Torque (NM):</div>
            <div class="dataElement"><input name="torque" type="number" maxlength="16" min="1" max="9999" required/></div>
        </div>
        <div class="tableRow">
            <div class="dataElement tableHeader">Number of Doors:</div>
            <div class="dataElement"><input type="number" name="numberOfDoors" maxlength="16" min="1" max="99" required/></div>
        </div>
        <div class="tableRow" id="hidden">
            <div class="dataElement"><input type="text" name="formSubmitted" value="true"/></div>
        </div>

        <div class="tableRow">
            <div class="dataElement"><input type="submit"/></div>
        </div>
</div>

</body>

</html>
