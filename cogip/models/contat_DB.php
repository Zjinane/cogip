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
	//	// Fonction de menu déroulant pour le choix de pays dans la page contact
		
	//	$sql= "SELECT name FROM compagnies";
	//	array = ["$sql"];
	//	foreach

//#################################################################################

		//creer un contact

		function createContac($firstname,$lastname,$email,$type){
	
		//insertion data dans la database

		$sql = "INSERT INTO contacts (firstname,lastname,email,fk_companies) VALUES ('$firstname', '$lastname', '$email',$type)";
		if (mysqli_query(connectionDB(), $sql)) {
			echo "New record created successfully";
		}else{
			echo "Error: " . $sql . "<br>" . mysqli_error(connectionDB());
		}
	return $sql;
};

//#################################################################################

		//permets de lire tous les contacts et de les afficher
		function readAllContact(){
		$sql = "SELECT firstname, lastname, email  FROM contacts";
		$result = mysqli_query(connectionDB(), $sql);

		if (mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				echo "NAME: " . $row["firstname"]. "  ".$row["lastname"]. " EMAIL : " . $row["email"]. "<br>";
				}
		}else{
			echo "0 results";
		}
	};


//#################################################################################

		//lire un contact 
		function readContact($firstname, $lastname){
		$sql = "SELECT firstname, lastname, email  FROM contacts WHERE firstname = '$firstname' && lastname = '$lastname'";
		$result = mysqli_query(connectionDB(), $sql);

		if (mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				echo "le contact selectionner est: " . $row["firstname"]. "  ".$row["lastname"]. " e-mail  : " . $row["email"]. "<br>";
				}
		}else{
			echo "0 results";
		}
	};
		//modifie un contact 
		function upDateContact($firstname,$lastname,$email,$fk,$id){
		//$id = $_GET["id"];
		$sql ="UPDATE contacts SET firstname ='$firstname', lastname='$lastname', email ='$email', fk_companies ='$fk' WHERE id = '$id' " ;
		$result = mysqli_query(connectionDB(), $sql);
		return $result ;
	};	

//upDateContact("test" , "test","okok","1","10" );



///###///###///###///###///###///###///###///###///###///###_! ICI Il faut check !_###///###///###///###///###///###///###///###///###///###///

		//afficher un contact ( lire un contact) dans un tableau et permettant via un lien d'acceder au infos en détails mais aussi au Tools (Update/Delete ou juste read les infos)

//		function ListContact($firstname,$lastname){

		// ici on selectione la partie qui va etre traité pour là mettre dans la fonction suivante

//		$sql= "SELECT * FROM contacts";
//		$result= mysqli_query(connectionDB(),$sql) or die(mysqli_error(connectionDB()));
//		$row = mysqli_fetch_assoc($result);
		
		// ici on crée la boucle;
		//verifier la
//				foreach($row as $element){
	//ici on insert les données de la DB dans le tableau de mathieu, pour chaque colonne à chaque row on y insert les données
			//	echo "<tr><td>". $firstname . "</td><td>" . $lastname . "</td><td>" . $email "</td></tr>";

				//--> voir le process pour traitez les infos avant de les renvoyées dans le tableau.
				//--> ici ce sont les liens a add plus tard quii renveront au formulaire de modification comme, just voir ["view"]
				//    mettre à jour ["Update"] et supprimer ["Delete"].

	//				<td> <a href= "contact.php?id="/***/" & action= view"</a></td>
	//				<td> <a href= "contact.php?id="/***/" & action= Update"</a></td>
	//				<td> <a href= "contact.php?id="/***/" & action = Delete"</a><td>

			//	})
//		};
			//--> rappel la fonction qui renvera les donnés dans le tableau "contact" avec les liens evoqué plus haut.
				
//	 ListContact("lala","lolo");

//#################################################################################



		//modifier les infos du contact fonction a utilisé avec readContact();

//		function upDateContact($firstname,$lastname,$email,$compagnies){

		//recupere l'id dans l'url

//		$id = $_GET['id'];
//		$sql = "SELECT * FROM contacts WHERE id ='". $id ."' limit 1";
//		$result = mysqli_query(connectionDB(),$sql);
//		$resulta = mysqli_num_rows($result);
//		$row = mysqli_fetch_assoc($result);
	
		//donner au parametre une valeur
		
//		$lastname = $row["lastname"] ;
//		$firstname = $row["firstname"] ; 
//		$email = $row["email"];
	
		// recupere les valeurs des colonnes -->  Name,  du tableau --> fk_companies

//		$fk = $_GET["fk_companies"];
//		$sqll = "SELECT name FROM companies WHERE fk_companies = '" . $fk ."' limit 1"; 
//		$compagnies = mysqli_query(connectionDB(),$sqll);
//};

//#################################################################################

		//supprimer une instance ( supprimer une row de la DB)
		function deleteContact($firstname, $lastname){

		$sql = "DELETE FROM contacts WHERE  firstname = '" . $firstname . "' && lastname = '" . $lastname. "' limit 1 ";
		$result = mysqli_query(connectionDB(),$sql);
		return $result;
		};

	//deleteContact("lala","lolo")



?>
