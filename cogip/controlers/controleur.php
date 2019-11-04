<?php

require('models/database.php');
require('models/contat_DB.php');//a modifier
require('models/entreprise_DB.php');
require('models/facture_DB.php');


// recupére les elements du formulair page login
$username = $_POST['username'];
$email = $_POST['email'];
$password = crypt($_POST['password']);



function sanitizeNames($field){
$field = filter_var(trim($field), FILTER_SANITIZE_STRING);

    if(filter_var($field, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        return $field;
    } else{
        return FALSE;
    }
}

function sanitizeEmail($field){
    $field = filter_var(trim($field), FILTER_SANITIZE_EMAIL);
    if(filter_var($field, FILTER_VALIDATE_EMAIL)){
        return $field;
    } else{
        return FALSE;
    }
}

function uniqueUsername($username, $conn){
    $sql = "SELECT * FROM student WHERE username = '$username';";
    $result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
    $row = mysqli_num_rows($result);

    return $row;
    }





?>
