<?php
require_once('functions.php');

$db = connectDB();
$collection = getCollection($db);

$htmlCollection = displayCollection($collection);
echo $htmlCollection;

?>

<!DOCTYPE html>
<html>
<title>Josh's Car Collection</title>
<link rel="stylesheet" type="text/css" href="styles.css">

<head>

</head>

<body>

</body>

</html>
