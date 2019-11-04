<?php

/*#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#*/

//creer une entrepise
function createEntreprise($name,$vat,$country,$fk_types){

		//insertion data dans la database

		$sql = "INSERT INTO login (name,vat,coutry,fk_types) VALUES ('$name','$vat','$country','$fk_types')";
		$result = mysqli_query($conn, $sql);
		return $result;
		};
//createEntreprise("Biscuit petit beure","F12341","Bali","1");



/*#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#*/

//afficher les entreprises ( lire les entreprises)
function readAllEntreprise(){

		$sql = "SELECT name,vat,country  FROM companies";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				echo "name is   :  " . $row["name"]. "   vat is  : " . $row["vat"]. "country is  : " .$row["coutry"]. "<br>";
				}
		}else{
			echo "0 results";
		}

};

/*#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#*/

// afficher une entreprise (Lire une entreprise)

		function readEntreprise($name){
		$sql = "SELECT name,vat,country  FROM companies WHERE name = '$name'";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				echo "name is   :  " . $row["name"]. "   vat is  : " . $row["vat"]. "country is  : " .$row["coutry"]. "<br>";
				}
			}else{
				echo "0 results";
			}
};
/*#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#*/

//mettre/modifier les infos de l'entreprise
	function upDateEntreprise($name,$vat,$country,$fk_types,$id){
		//$id = $_GET["id"];
		$sql ="UPDATE companies SET name ='$name', vat ='$vat', country ='$country', fk_types ='$fk_types'  WHERE id = '$id' " ;
		$result = mysqli_query($conn, $sql);
			return $result;
};

/*#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#*/


//supprimer une instance ( supprimer une row de la DB)


	function deleteEntreprise($id){
		$id = $_GET["id"];
		$sql = "DELETE FROM companies WHERE  id = ' $id ' ";
		$result = mysqli_query($conn,$sql);
		return $result;
};
?>
