<html>

<head>
    <title>Josh's Car Collection - Add</title>
    <link rel="stylesheet" type="text/css" href="normalize.css"/>
    <link rel="stylesheet" type="text/css" href="styles.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>

<body>

<h1> Josh's Car Collection</h1>

<div class="newCar">
    <h3>Add Car:</h3>
    <form method="post" target="addToDB.php">
        <div class="tableRow">
            <div class="dataElement tableHeader">Manufacturer:</div>
            <div class="dataElement"><input name="manufacturer" type="text"/></div>
        </div>
        <div class="tableRow">
            <div class="dataElement tableHeader">Model:</div>
            <div class="dataElement"><input name="model" type="text"/></div>
        </div>
        <div class="tableRow">
            <div class="dataElement tableHeader">Type:</div>
            <div class="dataElement"><input name="type" type="text"/></div>
        </div>
        <div class="tableRow">
            <div class="dataElement tableHeader">Year:</div>
            <div class="dataElement"><input type="number" name="year" min="0" max="9999"/></div>
        </div>
        <div class="tableRow">
            <div class="dataElement tableHeader">Registration:</div>
            <div class="dataElement"><input name="regNo" type="text"/></div>
        </div>
        <div class="tableRow">
            <div class="dataElement tableHeader">Colour:</div>
            <div class="dataElement"><input name="color" type="text"/></div>
        </div>
        <div class="tableRow">
            <div class="dataElement tableHeader">Fuel:</div>
            <div class="dataElement"><input name="petrol" type="text"/></div>
        </div>
        <div class="tableRow">
            <div class="dataElement tableHeader">Engine Layout:</div>
            <div class="dataElement"><input name="engineLayout" type="text"/></div>
        </div>
        <div class="tableRow">
            <div class="dataElement tableHeader">Engine Displacement (cc):</div>
            <div class="dataElement"><input name="engineDisplacement" type="number" min="0" max="99999"/></div>
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
            <div class="dataElement"><input name="accel" type="number" step="0.1" min="0.1" max="999"/></div>
        </div>
        <div class="tableRow">
            <div class="dataElement tableHeader">Power (HP):</div>
            <div class="dataElement"><input name="power" type="number" min="1" max="9999"/></div>
        </div>
        <div class="tableRow">
            <div class="dataElement tableHeader">Torque (NM):</div>
            <div class="dataElement"><input name="torque" type="number" min="1" max="9999"/></div>
        </div>
        <div class="tableRow">
            <div class="dataElement tableHeader">Number of Doors:</div>
            <div class="dataElement"><input type="number" name="numberOfDoors" min="1" max="99"/></div>
        </div>
        <div class="tableRow">
            <div class="dataElement"><input type="submit"/></div>
        </div>
</div>

</body>

</html>
