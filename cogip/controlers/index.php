<?php

/* On connecte à la database*/
/* ensuite méthode pour demander le mdp et verifier si il correspond  et commencer notre session sur l'app ( on est connecter en gros*/

if ($_SERVER['REQUEST_METHOD']=="POST"){

	if (isset($_POST['username']) and isset($_POST['password']) ) {
		include('sqlPack.php'); //code is given below (used for database connection)
		$username=$_POST['username'];
		$password=$_POST['password'];

		$sql = "SELECT password, username FROM student WHERE username = '$username';";
		$result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
		$row=mysqli_fetch_assoc($result);

		print_r($row);

		if(password_verify($password,$row['password'])){
			session_start();
			$_SESSION['username'] = $row['username'];
			$_SESSION['logged'] = true;
			header('Location: index.php');
		}

	}
}

/*#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#*/

/*definition de variable pour les btn "submite" des formulaires*/

$send = $_POST["send"];
$btnlog = $_POST["btnlog"];

/*#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#*/


/*variable pour recup de login*/

$passwordlog = $_POST['passwordlog'];
$usernamelog = $_POST['usernamelog'];

/*#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#*/


/*récupérer les elements du formulair register*/

$username = $_POST['username'];
$email = $_POST['email'];
$password = crypt($_POST['password']);
$signout = $_POST['signout'];

/*#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#*/

/*function qui autorise que [AZaz]*/

function cleanusernam($string){
	return htmlspecialchars(strip_tags( $string));
};

/*#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#*/

/*function message d erreur coloré*/

function error($message,$color){
	return "<small class = '$color'>$color: $message</small><br />";
};

/*#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#*/


/*function qui laisse pas passer un champs vide*/

function vide($is){
	if(empty($is)&& isset($send) && isset($btnlog)){
}
return $is;
}

/*#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#*/

/*recuperation de data dans la database au click sur btnlog*/

if(isset($_POST['btnlog'])){

	/*va chercher $usernamlog dans la db*/
	$sql = "SELECT * FROM student WHERE username='". $usernamelog ."' limit 1 ";
	$result = mysqli_query($conn,$sql);
	$resulta = mysqli_num_rows($result);

if ($resulta > 0 ) {
		 while($row = mysqli_fetch_assoc($result)) {

		if (password_verify($passwordlog, $row['password'])){
			session_start();
			$_SESSION["username"] = $usernamelog;
			header('Location: welcome.php');

			}else{
				echo error("your password is not valid","Hey");
				}
		}
}else {
echo "<a href='register.php'> Enregistrez vous ici</a>";
	}
}

/*#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#*/

/*insertion de data dans la database au click sur btn send*/

if(isset($_POST['send'])){

	/*comparer dans la database si le username exist*/
	$sql = "SELECT * FROM student WHERE username='". $username ."' limit 1 ";
	$result = mysqli_query($conn,$sql);
	$resulta = mysqli_num_rows($result);

if ($resulta > 0 ) {
	$user_not_valid =  error('Choose another username please','Ho');
}else{

/*#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#*/

/*sanitize du username*/

	if($username = cleanusernam($username)){

/*#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#*/

/*insere dans la database les donnes*/

	$sql = "INSERT INTO student (username, email, password)
	VALUES ('$username', '$email', '$password')";

/*#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#*/

// verifier la connexion a la database

	if ($conn->query($sql) === TRUE) {
		echo "";
		} else {
		 echo "Error: " . $sql . "<br>" . $conn->error;
	}
}else{
	$erroruser = error('your username is not valid','Hey');
	}
}
}
?>
