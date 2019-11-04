<?php

		//connection à la Base de données
		
		function connectionDB(){
		
		//variable de connexion a la database
	
		$serverName = "database";
		$userName = "root";
		$password ="root";	
		$dbName = "cogip";
		
		//connection a la database
		$conn = mysqli_connect($serverName,$userName,$password,$dbName);
		if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
			}
		return $conn;
};

		//creer un utilisateur
		function createUser($userName,$password,$usertype){
		//insertion data dans la database
		$sql = "INSERT INTO login (name,password,usertype) VALUES ('$userName', '$password', '$usertype')";
		$result = mysqli_query(connectionDB(), $sql);
		return $result;
		};
//createUser("test","test","user");

		//afficher tout les  utilisateurs ( lire un utilisateur)
		function readAllUser(){
		$sql = "SELECT name,usertype  FROM login";
		$result = mysqli_query(connectionDB(), $sql);

		if (mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				echo "Username is   :  " . $row["name"]. "   Usertype is  : " . $row["usertype"]. "<br>";
				}
		}else{
			echo "0 results";
		}
	};


		//lire un contact 
	function readUser($userName){
		$sql = "SELECT name,usertype  FROM login WHERE name = '$userName'";
		$result = mysqli_query(connectionDB(), $sql);

		if (mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				echo "User selectionner : " . $row["name"]. " Type  : " . $row["usertype"]. "<br>";
				}
		}else{
			echo "0 results";
		}
	};



//mettre/modifier les infos de l'utilisateur
	function upDateUser($username, $password,$usertype,$id){
		//$id = $_GET["id"];
		$sql ="UPDATE contacts SET firstname ='$username', password='$password', usertype ='$usertype' WHERE id = '$id' " ;
		$result = mysqli_query(connectionDB(), $sql);
		return $result ;
	};	


		function deleteUser($id){
		$id = $_GET["id"];
		$sql = "DELETE FROM contacts WHERE  id = '" . $id  "' ";
		$result = mysqli_query(connectionDB(),$sql);
		return $result;
		};




?>
