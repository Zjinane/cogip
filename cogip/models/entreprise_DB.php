<?php

/*#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#*/

//creer une entrepise
function createEntreprise($name,$vat,$country,$fk_types){
	$conn = mysqli_connect("database","root","root","cogip");

		//insertion data dans la database

		$sql = "INSERT INTO login (name,vat,coutry,fk_types) VALUES ('$name','$vat','$country','$fk_types')";
		$result = mysqli_query($conn, $sql);
		return $result;
		};
createEntreprise("Biscuit petit beure","F12341","Bali","1");



/*#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#*/

//afficher les entreprises ( lire les entreprises)
function readAllEntrepriseClient(){
	$conn = mysqli_connect("database","root","root","cogip");
	$sql = "SELECT name,vat,country,id  FROM companies WHERE fk_types = 1";
	$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				echo "<tr><td>" . $row["name"]. "</td><td>" . $row["vat"]."</td><td>" .$row["country"]. "</td><td><a href='../views/page_View_Company.php?id=".$row['id']."'><i class='fa fa-eye' aria-hidden='true'></i></a></td><td><a href='../views/page_Update_Compagny.php?id=".$row['id']."'><i class='fa fa-pencil' aria-hidden='true'></i></a></td><td><a href='../views/page_Delete_Company.php?id=".$row['id']."'><i class='fa fa-trash-o' aria-hidden='true'></i></a></td></tr>";
				}
		}else{
			echo "0 results";
		}

};





//afficher les entreprises ( lire les entreprises)
function readAllEntreprisePro(){
	$conn = mysqli_connect("database","root","root","cogip");
	$sql = "SELECT name,vat,country,id  FROM companies WHERE fk_types = 2";
	$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				echo "<tr><td>" . $row["name"]. "</td><td>" . $row["vat"]."</td><td>" .$row["country"]. "</td><td><a href='../views/page_View_Company.php?id=".$row['id']."'><i class='fa fa-eye' aria-hidden='true'></i></a></td><td><a href='../views/page_Update_Compagny.php?id=".$row['id']."'><i class='fa fa-pencil' aria-hidden='true'></i></a></td><td><a href='../views/page_Delete_Company.php?id=".$row['id']."'><i class='fa fa-trash-o' aria-hidden='true'></i></a></td></tr>";
				}
		}else{
			echo "0 results";
		}

};






/*#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#*/

// afficher une entreprise (Lire une entreprise)

		function readEntreprise(){
		$id = $_GET['id'];
		$conn = mysqli_connect("database","root","root","cogip");

		$sql = "SELECT name,vat,type  FROM companies INNER JOIN types ON companies.fk_types = types.id WHERE companies.id = '$id'";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				echo " <h1> " . $row["name"]. "</h1><br><p> VAT : " . $row["vat"]."<br>" . $row["type"] . "<br>";
				}
			}else{
				echo "0 results";
			}
};
/*#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#*/



/*#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#*/


/*#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#*/


/*#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#*/

//mettre/modifier les infos de l'entreprise
	function upDateEntreprise($name,$vat,$country){
	$conn = mysqli_connect("database","root","root","cogip");
	$id = $_GET["id"];
	$sql ="UPDATE companies SET name ='$name', vat ='$vat', country ='$country' WHERE id = '$id' " ;
	$result = mysqli_query($conn, $sql);
			return $result;
};



/*#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#*/


//supprimer une instance ( supprimer une row de la DB)


	function deleteEntreprise($btn){
	$id = $_GET["id"];
	if(isset($btn)){

		$conn = mysqli_connect("database","root","root","cogip");
		$sql = "DELETE FROM companies WHERE  id = ' $id ' ";
		$result = mysqli_query($conn,$sql);

		echo "Companie is Delete";
} 
	return $result;
};
?>
