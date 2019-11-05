<?php
session_start();
require("controleur.php");


		$username = $_POST['username'];
		$password = $_POST['password'];

if ($_SERVER['REQUEST_METHOD']=="POST"){
	if (isset($username) and isset($password)) {
		// recupére les elements du formulair page login
		$sql = "SELECT password, name FROM login WHERE name = '$username';";
		$result = mysqli_query($conn,$sql);
		$row=mysqli_fetch_assoc($result);
	
	if ($username == $row['name'] ){
	session_start();
			$_SESSION['name'] = $row['name'];
			$_SESSION['logged'] = true;
	header("../views/page_Welcome.php");		
	}
	}
}


?>
