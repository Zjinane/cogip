<?php

		//connection à la Base de données

		
	
		//connection a la database 
		$conn = mysqli_connect("database","root","root","cogip");
		if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
			}
		return $conn;
?>
