<?php
session_start();
require_once('functions.php');
$formData = $_POST;
$db = connectDB();
$valid = validateAddData($formData);

if ($valid[0] === true) {
    $addState = addToDB($formData,$db);
    echo "<h1>" . $addState . "</h1>";
} else {
    $formError = formError($valid);
}
?>