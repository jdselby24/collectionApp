<?php
session_start();
require_once('functions.php');
$formData = $_POST;

$valid = validateAddData($formData);

if ($valid[0] === true) {
    echo "The form was valid";
} else {
    $formError = formError($valid);
    $_SESSION["formError"] = $formError;
    header("addToCollection.php");
}

