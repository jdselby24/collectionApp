<?php
session_start();
require_once('functions.php');

if(!isset($_GET['authenticated'])) {
    header('Location: addToCollection.php');
}


$formData = $_POST;
$db = connectDB();
$valid = validateAddData($formData);

if ($valid["valid"] === true) {
    $addState = addToDB($formData,$db);
    if ($addState) {
        header('Location: index.php');
    } else {
        header('Location: addToCollection.php');
    }

} else {
    $formError = formError($valid);
    $_SESSION["formError"] = $formError;
    unset($_POST);
    header("Location: addToCollection.php");
}
?>