<?php
require("connection.php");

		//creer un utilisateur ( un nouveau utilisateur ) 
		function createUser($userName,$password,$usertype){
		//insertion data dans la database
		$sql = "INSERT INTO login (name,password,usertype) VALUES ('$userName', '$password', '$usertype')";
		$result = mysqli_query($conn, $sql);
		return $result;
		};
//createUser("test","test","user");


/*#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#*/

		//afficher tout les  utilisateurs ( lire tous les  utilisateur)
		function readAllUser(){
			$sql = "SELECT name,usertype  FROM login";
			$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				echo "Userna is   :  " . $row["name"]. "   Usertype is  : " . $row["usertype"]. "<br>";
				}
		}else{
			echo "0 results";
		}
	};

/*#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#*/

		//lire un contact 


		function readUser($userName){
			$sql = "SELECT name,usertype  FROM login WHERE name = '$userName'";
			$result = mysqli_query($conn, $sql);

			if (mysqli_num_rows($result) > 0) {
				while($row = mysqli_fetch_assoc($result)) {
					echo "User selectionner : " . $row["name"]. " Type  : " . $row["usertype"]. "<br>";
					}
			}else{
				echo "0 results";
			}
		};


/*#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#*/

		//mettre/modifier les infos de l'utilisateur


		function upDateUser($username, $password,$usertype,$id){
			//$id = $_GET["id"];
			$sql ="UPDATE contacts SET firstname ='$username', password='$password', usertype ='$usertype' WHERE id = '$id' " ;
			$result = mysqli_query($conn, $sql);
			return $result ;
		};	


/*#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#*/

		// Delete un user selon son ID ( seul élément unique à chacun )


		function deleteUser($id){
		$id = $_GET["id"];
		$sql = "DELETE FROM contacts WHERE  id = ' $id' ";
		$result = mysqli_query($conn,$sql);
		return $result;
		};
?>
