<!DOCTYPE html>
<html lang="en-GB">

<head>
    <title>Josh's Car Collection</title>
    <link rel="stylesheet" type="text/css" href="normalize.css">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <h1> Josh's Car Collection</h1>
</body>

</html>

<?php
require_once('functions.php');

$db = connectDB();
$collection = getCollection($db);

$htmlCollection = displayCollection($collection);
echo $htmlCollection;
?>
