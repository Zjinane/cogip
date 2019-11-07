<?php

//connection à la Base de données
function connectionDB(){

		//variable de connexion pour la database
	
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

/*#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#*/


//creer une facture
		function createInvoice($numb,$date,$fk_contacts){

		//insertion data dans la database
		
		$sql = "INSERT INTO invoices (num,date,fk_contacts) VALUES ('$num', '$date', '$fk_contacts')";
		$result = mysqli_query(connectionDB(), $sql);
		return $result;
		};
//createUser("test","test","user");

/*#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#*/

//afficher des factures ( lire des factures)
function readAllInvoice(){

		$sql = "SELECT  num,date,name,type FROM invoices,contacts, companies,types ";

		$result = mysqli_query(connectionDB(), $sql);

		if (mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				echo "<tr><td>" . $row["num"]. "</td><td>" . $row["date"]."</td><td>" .$row["name"]."</td><td>" . $row["type"] . "</td><td><a href='../views/page_View_Invoice.php?id=".$row['id']."'><i class='fa fa-eye' aria-hidden='true'></i></a></td><td><a href='../views/page_Update_Invoice.php?id=".$row['id']."'><i class='fa fa-pencil' aria-hidden='true'></i></a></td><td><a href='../views/page_Delete_Invoice.php?id=".$row['id']."'><i class='fa fa-trash-o' aria-hidden='true'></i></a></td></tr>";
				}
		}else{
			echo "0 results";
			
		}
};

/*#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#*/

		//afficher une facture (lire une facture)


		function readInvoice($num,$date){
			$sql = "SELECT num,date  FROM invoices ";
			$result = mysqli_query(connectionDB(), $sql);

			if (mysqli_num_rows($result) > 0) {
				while($row = mysqli_fetch_assoc($result)) {
				echo "num invoice is   :  " . $row["num"]. "  date invoice is : ". $row["date"] . "<br>";
				}
			}else{
				echo "0 results";
			}
		};

/*#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#*/

//mettre/modifier les infos d'une facture

function upDateInvoice($num,$date,$fk_contacts,$id){

			//$id = $_GET["id"];
			$sql ="UPDATE contacts SET num  ='$num', date='$date', fk_contacts ='$fk_contacts' WHERE id = '$id' " ;
			$result = mysqli_query(connectionDB(), $sql);
			return $result ;
};

/*#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#*/

//supprimer une instance ( supprimer une row de la DB)
function deleteInvoice($id){
		$id = $_GET["id"];
		$sql = "DELETE FROM invoices WHERE  id = ' $id  ' ";
		$result = mysqli_query(connectionDB(),$sql);
		return $result;

};

?>
