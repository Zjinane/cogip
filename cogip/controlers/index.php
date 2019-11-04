<?php
require("controleur.php");



// recupére les elements du formulair page login
$username = $_POST['username'];
$email = $_POST['email'];
$password = crypt($_POST['password']);


if ($_SERVER['REQUEST_METHOD']=="POST"){
	if (sanitizeInput($username) == $username) {
		$sql = "SELECT password, name, usertype FROM login WHERE name = '$username';";
		$result = mysqli_query(connectionDB(),$sql);
		$row=mysqli_fetch_assoc($result);


	if(password_verify($password,$row['password'])){
			session_start();
			$_SESSION['name'] = $row['name'];
			$_SESSION['logged'] = true;
			if($row['usertype'] == "superuser"){
				$_SESSION['user'] = "superUser"; 
				header('views/assets/page_Welcome.php');
				}else{
					$_SESSION['user']=" user";
					header('views/assets/page_Welcome.php');
			
		}
	}
	}
}else{
	error("erreur");
}




?>
