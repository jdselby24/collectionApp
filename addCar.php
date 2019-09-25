<?php
session_start();
require_once('functions.php');
$formData = $_POST;
$db = connectDB();
$valid = validateAddData($formData);

if ($valid[0] === true) {
    addToDB($formData,$db);
} else {
    echo "The form was invalid";
}