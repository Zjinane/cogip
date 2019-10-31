<?php

//connection à la Base de données
function connectionDB(){

// var de connection necéssaire à la db
	$serverName = "database";
	$userName = "root";
	$password = "root";
	$dbName = "cogip";

// connection à la DB
	$conn= mysqli_connect($servername,$username,$password,$dbName);
	return $conn;


//verification de la connection de la Db au php files.

//	if (!$conn){
//		die("connection impossible: " . mysqli_connect_errno());
//	}
//	echo "connection Réussie";

};


//creer un utilisateur
function createUser($userName,$password,$usertype){

	// Ajouter dans la DB un utilisateur.
	$sql = INSERT INTO login (name,password,usertype)
	VALUE ($username, $password, $usertype)
	return $sql;
};


//afficher un utilisateur ( lire un utilisateur)
function readUser($id){

};

//mettre/modifier les infos de l'utilisateur
function upDate($username, $password,$usertype){

};


//supprimer une instance ( supprimer une row de la DB)
function deleteUser($id){

};

?>
