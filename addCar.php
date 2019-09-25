<?php
session_start();
require_once('functions.php');

if (!empty($_POST)) {
    header("Location: addToCollection.php");
}

$formData = $_POST;
$db = connectDB();
$valid = validateAddData($formData);


if ($valid["valid"] === true) {
    $addState = addToDB($formData,$db);
    if ($addState) {
        header('Location: index.php');
    } else {
        echo "<meta http-equiv='Refresh' content='0; url=index.php' />";
    }

} else {
    $formError = formError($valid);
    $_SESSION["formError"] = $formError;
    unset($_POST);
    header("Location: addToCollection.php");
}
?>