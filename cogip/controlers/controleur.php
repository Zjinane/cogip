<?php
require('../models/database.php');
require('../models/contat_DB.php');//a modifier
require('../models/entreprise_DB.php');
require('../models/facture_DB.php');

//##########################################  SANITIZE  #####################################
// function message d erreur coloré
function error($message,$color){
	return "<small class = '$color'> $message . $color</small><br />";
}

function sanitizeInput($field){
$field = filter_var(trim($field), FILTER_SANITIZE_STRING);

    if(filter_var($field, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        return $field;
    } else{
        return error("input is not ","valide");
    }
}

function sanitizeEmail($field){
    $field = filter_var(trim($field), FILTER_SANITIZE_EMAIL);
    if(filter_var($field, FILTER_VALIDATE_EMAIL)){
        return $field;
    } else{
        return error("e-mail is not", "valide");
    }
}

function check_Unique_Username($username){
    $sql = "SELECT * FROM login WHERE name = '$username';";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_num_rows($result);

    return $row;
    }


//################################### USERTYPE ####################################"


function user(){










};


function superUser(){

$btn = '<div class="row">
					<div class="col-10 offset-1 buttonbox">
						<button type="button" class="btn newContact">New Contact</button>
						<button type="button" class="btn newInvoice">New Invoice</button>
						<button type="button" class="btn newCompagny">New Compagny</button>';


};




?>
