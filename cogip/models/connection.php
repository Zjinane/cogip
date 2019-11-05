<?php

		//connection à la Base de données
		$serverName = "database";
		$dbUserName = "root";
		$dbPassword = "root";
		$dbName = "cogip";
	
		//connection a la database 
		$conn = mysqli_connect("$serverName","$dbUserName","$dbPassword","$dbName");
		if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
			}

?>
