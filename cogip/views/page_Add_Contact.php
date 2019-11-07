<?PHP
session_start();
if (!$_SESSION['logged']){
	header('location:page_Login.php');
}
require("../controlers/controleur.php");
?>
<!DOCTYPE html>
<html lang="en" xml:lang="en" xmlns="http://www.w3.org/1999/xhtml">
<!-- TO NAVIGATOR | INVISIBLE -->
	<head>

		<!-- METAS DECLARING -->
		<!-- ########################################################################### -->
		<!-- Responsive meta -->
			<META NAME="viewport" CONTENT="width=device-width, initial-scale=1.0" />
			<!-- IE9 & IE8 compatibility meta -->
			<META http-equiv="X-UA-Compatible" CONTENT="ie=edge" />
			<!-- Charset meta -->
			<META http-equiv= »Content-Type »
			CONTENT= »text/html; charset=utf-8″>
			<!-- Language meta -->
			<META NAME= »Language » CONTENT= »en »>

			<!-- Author meta -->
			<META NAME= »Author » CONTENT= »Zjinane, Jeremy, Mathieu»>
			<!-- Publisher meta -->
			<META NAME= »Publisher » CONTENT= »BeCode »>
			<!-- Category meta -->
			<META NAME= »Category » CONTENT= »Database, invoices, forms »>
			<!-- Content meta -->
			<META NAME= »Description » CONTENT= »Website that giving information about a database, CRUD forms»>
			<!-- Tags meta -->
			<META NAME= »Keywords » CONTENT= »PHP, Forms, DataManaging, SQL»>

		<!-- BOOTSTRAP INSERTION -->
		<!-- ########################################################################### -->
		<!-- BOOTSTRAP CSS -->
			<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
			rel="stylesheet" 
			integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" 
			crossorigin="anonymous">


		<!-- CSS INSERTION -->
			<link rel="stylesheet" type="text/css" href="assets\css\style.css">


		<!-- FONT AWESOME 4.7 ICONS -->
			<script src="https://use.fontawesome.com/c5aedf01c1.js"></script>

		<!-- FAVICON -->
		<link rel="icon" type="image/png" href="assets/img/logo.png"/>

		<!-- WEB PAGE TITLE -->
			<title>
				Cogip | New contact
			</title>

	</head>

<!-- XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->


<!-- TO VISITORS | VISIBLE -->
	<body>
	
		<!-- HEADER -->
		<header>	
			<?php include 'bloc_Navbar.php' ?>

			<div class="container-fluid header">
				<div class="row">
					<div class="col-12 d-flex justify-content-center">
						<h3>Add a new contact</h3>
					</div>
				</div>
			</div>
		</header>
		
		<!-- MAIN -->
		<main>

			<div class="container">
				<div class="row">
					<div class="form rounded-lg col-10 offset-1">
					
						<form method="post" action="" autocomplete="on" id="form">

							<!-- [1] ROW -->
							<div class="row">
								<div class="firstname col-md-6 col-12">
									<!-- 💬 firstname -->
									<label for="formFirstname">Firstname:</label>
									<input  class="form-control shadow p-1" type="text" size="20" name="firstname" id="formFirstname" alt="Your firstname input"  placeholder="Type your firstname here" />
								</div>

								<div class="lastname col-md-6 col-12">
									<!-- 💬 lastname -->
									<label for="formLastname">Lastname:</label>
									<input  class="form-control shadow p-1" type="text" name="lastname" id="formLastname" alt="Your lastname input" placeholder="Type your lastame here" />
								</div>	
							</div>

							<!-- [2] ROW -->
							<div class="row">
								<div class="email col-md-6 col-12">
									<!-- 💬 Email -->
									<label for="formEmail">E-mail:</label>
									<input  class="form-control shadow p-1" type="text" name="email" id="formEmail" alt="Your email input" placeholder="email@example.com"/>
								</div>

								<div class="compagny col-md-6 col-12 ">	
									<!-- ✳️ Companies -->
									<fieldset>
										<label>Compagny:</label>
											<select name="compagny" class="form-control shadow p-1">
												<?php
													include 'array_Countries.php';
												?>
											</select>
									</fieldset>
								</div>
							</div>
									
							<!-- [3] ROW -->
							<div class="container-fluid d-flex justify-content-center">
								<div class="row">
									<div class="col-10 offset-1 buttonbox">
										<button type="button" class="btn reset">Reset</button>
										<button type="button" class="btn submit">Submit</button>
									</div>
								</div>
							</div>
									
						</form>
					</div>
				</div>
			</div>

		</main>

		<!-- FOOTER -->
		<footer>
			<?php include 'bloc_Footer.php' ?>	
		</footer>		
		
	<!-- BOOTSTRAP JQUERY AND JS INSERTION -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" 
			integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" 
			crossorigin="anonymous"></script>
	<script src="./script.js"></script>
	</body>
</html>
