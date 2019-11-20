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
						<a type="button" href="../views/page_Add_Contact.php" class="btn newContact">New Contact</a>
						<a type="button" href="../views/page_Add_Invoice.php" class="btn newInvoice">New Invoice</a>
						<a type="button" href="../views/page_Add_Compagny.php" class="btn newCompagny">New Compagny</a> </div> </div>';
	}
}


//afficher View btn user
function table(){
	if($_SESSION['usertype'] == "user"){

		echo "<tr>
								<th>Name</th>
								<th>VAT</th>
                                <th>Contry</th>
								<th>View</th>
							</tr>";
	}

}





//afficher les View/Update/Delete btn superuser
function table_A(){
	if($_SESSION['usertype'] == "superuser"){
		echo "	<tr>
								<th>Name</th>
								<th>VAT</th>
                                <th>Contry</th>
								<th>View</th>
                                <th>Update</th>
                                <th>Delete</th>
							</tr>";
	}
};





//afficher les View/Update/Delete btn superuser
function table_A_Invoice(){
	if($_SESSION['usertype'] == "superuser"){
		echo "	<tr>
								<th>Num</th>
								<th>Date</th>
                                <th>Name</th>
								<th>Type</th>
								<th>View</th>
                                <th>Update</th>
                                <th>Delete</th>
							</tr>";
	}
};



//afficher les View/Update/Delete btn superuser
function table_Invoice(){
	if($_SESSION['usertype'] == "user"){
		echo "	<tr>
								<th>Num</th>
								<th>Date</th>
                                <th>Name</th>
								<th>Type</th>
								<th>View</th>
							</tr>";
	}
};








//afficher les View/Update/Delete btn superuser
function table_A_Contact(){
	if($_SESSION['usertype'] == "superuser"){
		echo "	<tr>
								<th>Name</th>
								<th>Email</th>
                                <th>Compagny</th>
								<th>View</th>
                                <th>Update</th>
                                <th>Delete</th>
							</tr>";
	}
};



//afficher les View/Update/Delete btn superuser
function table_Contact(){
	if($_SESSION['usertype'] == "user"){
		echo "	<tr>
								<th>Name</th>
								<th>Email</th>
                                <th>Compagny</th>
								<th>View</th>
							</tr>";
	}
};








//################################ add user  #################################################

$createUsername = sanitizeInput($_POST["usernamereg"]);
$createPassword = crypt($_POST["passwordreg"]);
$createUsertype = $_POST["usertype"];
$btncreateUser = $_POST['creatUser'];

if(isset($btncreateUser)){
createUser("$createUsername","$createPassword","$createUsertype");
echo "<p>Ok User register </p>";
}

//##########################################   read All Contact from companies#################################################

function readAllContactCompanies(){
	$id = $_GET['id'];
	$conn = mysqli_connect("database","root","root","cogip");
	$sql = "SELECT firstname,lastname,email  FROM contacts  WHERE fk_companies = '$id'";

$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				echo "<tr><td> " . $row["firstname"]. $row["lastname"]. " </td><td>" . $row["email"]. "</td></tr>";
				}
		}else{
			echo "0 results";
		}
	};





function readAllInvoiceCompanies(){
	$id = $_GET['id'];
	$conn = mysqli_connect("database","root","root","cogip");
	$sql = "SELECT num,date,email  FROM invoices INNER JOIN contacts ON invoices.fk_contacts = contacts.id WHERE contacts.fk_companies = '$id'";

$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				echo "<tr><td> " . $row["num"]."</td><td> ". $row["date"]. " </td><td>" . $row["email"]. "</td></tr>";
				}
		}else{
			echo "0 results";
		}
	};


#######################Up date compagny ########################


function viewUpDateCompanies(){

	$id = $_GET['id'];
	$conn = mysqli_connect("database","root","root","cogip");

	$sql = "SELECT name,vat,country  FROM companies  WHERE id = '$id'";
	$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				echo "  Companies : " . $row["name"]. " <br>  V.A.T  : " . $row["vat"]." <br> Country : " . $row["country"] . "<br>";
				}
			}else{
				echo "0 results";
			}


}

$updatename = $_POST['updatename'];
$updatevat = $_POST['updatevat'];
$updatecontry = $_POST['updatecontry'];
$btnupdate = $_POST['btnupdate'];

if(isset($btnupdate)){
upDateEntreprise("$updatename","$updatevat","$updatecontry");
echo "Update done";
}


############################### Bienvenu ###############################

function Bienvenu(){
	if($_SESSION['usertype'] == "superuser"){
	$name = $_SESSION['name'];
	echo "Welcome ".$name ;
	}else{
	echo "Welcome";
	}
}
#############################Affichage Superuser ########################################

//la liste des 5 dernières factures, classées par date
//la liste des 5 dernières personnes encodées dans la base de données
//la liste des 5 dernières entreprises encodées dans la base de données
//un lien vers la page des fournisseurs
//un lien vers la page du client

function last_Invoice(){
		$conn = mysqli_connect("database","root","root","cogip");


		$sql = "SELECT date, num FROM invoices ORDER BY date DESC";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
		$row = mysqli_fetch_assoc($result);
				echo " Date invoice  : ".$row["date"]."<br>"."  Num invoice  :  " .$row["num"]  ;
				
		}else{
			echo "0 results";
		}
}


function last_contact(){
		$conn = mysqli_connect("database","root","root","cogip");


		$sql = "SELECT  firstname, lastname, email FROM contacts ORDER BY id DESC ";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
		$row = mysqli_fetch_assoc($result);
				echo " Name : ". $row["firstname"] . $row["lastname"]."<br>". "  Email  :  " .$row["email"]  ;
				
		}else{
			echo "0 results";
	}
};

function last_company(){
		$conn = mysqli_connect("database","root","root","cogip");

		$sql = "SELECT  name, vat, country FROM companies ORDER BY id DESC ";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
		$row = mysqli_fetch_assoc($result);
				echo " Name  : " .$row["name"]."<br>". "  VAT  :  ".$row["vat"] ."<br>"."  Country : ".$row["country"] ;
		}else{
			echo "0 results";
			
		}

}
?>
