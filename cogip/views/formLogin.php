<!-- LOGIN FORM -->
<?php
// CONNECT TO SQL
include "sqlPack.php";
//###############################################################################################
// EMPTY VARIABLES
	$name = "";
	$password = "";	

	$name_err = $password_err = "";

//###############################################################################################

//###############################################################################################
// FUNCTIONS
//###############################################################################################

//###############################################################################################
if ($_SERVER['REQUEST_METHOD']=="POST"){

	if (isset($_POST['name']) and isset($_POST['password']) ) {
		include('sqlPack.php'); //code is given below (used for database connection)
		$username=$_POST['name'];
		$password=$_POST['password'];

		$sql = "SELECT password, name FROM student WHERE name = '$name';";
		$result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
		$row=mysqli_fetch_assoc($result);

		print_r($row);

		if(password_verify($password,$row['password'])){
			session_start();
			$_SESSION['name'] = $row['name'];
			$_SESSION['logged'] = true;
			header('Location: index.php');
		}

	}
}
//###############################################################################################
?>
<div class="container">
	<div class="row">
		<div class="form rounded-lg col-10 offset-1">

			<div class="row">
				<div class="col-12 form-group">
					<u><h2>Connexion:</h2></u>
				</div>
			</div>

			<form method="post" action="" autocomplete="on" id="form">

			<!-- [1] ROW -->
			<div class="row">
				<div class="lastname col-md-6 col-12">
					<!-- 💬 Name -->
					<label for="formName">Name:</label>
					<input  class="form-control shadow p-1" type="text" size="20" name="name" id="formName" alt="Your name input"  placeholder="Type your name here" value="<?php echo $name ?>"  />
					<span class="error"><?php echo $name_err;?></span>
				</div>

				<div class="password col-md-6 col-12">
					<!-- 💬 Password -->
					<label for="formPassword">Password:</label>
					<input  class="form-control shadow p-1" type="password" name="password" id="formPassword" placeholder="Type your password here" value="<?php echo $password ?>"   alt="Your password input"/>
					<span class="error"><?php echo $password_err;?></span>
				</div>	
			</div>
			
			<!-- [2] ROW -->
			<div class="row">
				<div class="col-md-6 d-flex justify-content-center">	
					<!-- Reset button -->
					<input class="btn btn-primary" type="reset" value="RESET" onclick="forceReset();">
				</div>

				<div class="col-md-6 d-flex justify-content-center">	
					<!-- Submit button -->
					<input class="btn btn-primary" type="submit" value="SUBMIT">
				</div>
			</div>
			
			</form>
		</div>
	</div>
</div>