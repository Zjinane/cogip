<?php
require('../models/database.php');
require('../models/contact_DB.php');
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


//################################### Admin ####################################"


function Admin_nav(){

if($_SESSION['usertype'] == "superuser"){
echo	$btn ='
      <li class="nav-item dropdown d-flex justify-content-end">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          ⚬ Admin
        </a>
        <div class="dropdown-menu " aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="page_Add_User.php">New Cogip user</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="page_Add_Contact.php">New contact</a>
          <a class="dropdown-item" href="page_Add_Invoice.php">New invoice</a>
          <a class="dropdown-item" href="page_Add_Compagny.php">New compagny</a>
        </div>
        <i class="nav-link fa fa-user" aria-hidden="true"></i>
      </li>
' ;
	}
};


function Admin_btn(){
if($_SESSION['usertype'] == "superuser"){
echo	$btn = '<div class="row">
					<div class="col-10 offset-1 buttonbox">
						<button type="button" class="btn newContact">New Contact</button>
						<button type="button" class="btn newInvoice">New Invoice</button>
						<button type="button" class="btn newCompagny">New Compagny</button> </div> </div>';
	}
}

//################################ add user  #################################################

$createUsername = sanitizeInput($_POST["usernamereg"]);
$createPassword = crypt($_POST["passwordreg"]);
$createUsertype = $_POST["usertype"];
$btncreateUser = $_POST['creatUser'];

if(isset($btncreateUser)){
createUser("$createUsername","$createPassword","$createUsertype");
echo "<p>Ok User register </p>";
}

//##########################################    #################################################
?>
