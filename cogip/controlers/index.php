<?php
session_start();
require("controleur.php");


		$username = $_POST['username'];
		$password = $_POST['password'];

if ($_SERVER['REQUEST_METHOD']=="POST"){
	if (isset($username) and isset($password)) {
		// recupére les elements du formulair page login
		$conn = mysqli_connect("database","root","root","cogip");
		$sql = "SELECT password, name,usertype FROM login WHERE name = '$username';";
		$result = mysqli_query($conn,$sql);
		$row=mysqli_fetch_assoc($result);
	
	if (password_verify($password,$row['password'])){
	session_start();
			$_SESSION['name'] = $row['name'];
			$_SESSION['logged'] = true;
			$_SESSION['usertype'] = $row['usertype'];
			header('location:page_Welcome.php');
	}
	}
}


?>
