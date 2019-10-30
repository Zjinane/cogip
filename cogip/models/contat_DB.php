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


//creer un contact
function createContac($firstname,$lastname,$email,$type){
	//insertion data dans la database
	$sql = "INSERT INTO contacts (firstname,lastname,email,fk_companies) VALUES ('$firstname', '$lastname', '$email',$type)";

	if (mysqli_query(connectionDB(), $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error(connectionDB());
}
	return $sql;
};


function readAllContact(){
	$sql = "SELECT firstname, lastname, email  FROM contacts";
	$result = mysqli_query(connectionDB(), $sql);

	if (mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)) {
			echo "NAME: " . $row["firstname"]. "  ".$row["lastname"]. " EMAIL : " . $row["email"]. "<br>";
		}
	} else {
		echo "0 results";
	}
};

// faut verifier ici :)
//afficher un contact ( lire un contact)
function readContact($firstname,$lastname){
	$sql = "SELECT firstname, lastname, email FROM contacts = '$firstname' , '$lastname' , '$email' ";
	$result = mysqli_query(connectionDB(),$sql);
	$array = mysqli_fetch_assoc($result);
	return $array;

};
readContact("lala","lolo");
//mettre/modifier les infos du contact fonction a utilisé avec readContact();
function upDateContact($firstname,$lastname,$email,$compagnies){
	//recupere l'id dans l'url
	$id = $_GET['id'];
	$sql = "SELECT * FROM contacts WHERE id ='". $id ."' limit 1";
	$result = mysqli_query(connectionDB(),$sql);
	$resulta = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);
	//donner au parametre une valeur 
	$lastname = $row["lastname"] ;
	$firstname = $row["firstname"] ; 
	$email = $row["email"];
	// recupere  fk_companies name
	$fk = $_GET["fk_companies"];
	$sqll = "SELECT name FROM companies WHERE fk_companies = '" . $fk ."' limit 1"; 
	$compagnies = mysqli_query(connectionDB(),$sqll);

};


//supprimer une instance ( supprimer une row de la DB)
function deleteContact($id){

};



readContact("lala", "lolo");

?>
