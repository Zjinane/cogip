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
			<META NAME= »Author » CONTENT= »Gajwak, Mathieu Kruk »>
			<!-- Publisher meta -->
			<META NAME= »Publisher » CONTENT= »Gajwak »>
			<!-- Category meta -->
			<META NAME= »Category » CONTENT= »MainSubject, tag01, tag02 »>
			<!-- Content meta -->
			<META NAME= »Description » CONTENT= »Description of the content here »>
			<!-- Tags meta -->
			<META NAME= »Keywords » CONTENT= »PHP, Forms, Data»>

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
				Cogip | New compagny
			</title>

	</head>

<!-- XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->


<!-- TO VISITORS | VISIBLE -->
	<body>
	
		<!-- HEADER -->
		<header>	
			<?php include 'bloc_Navbar.php' ?>
			<!--<?php include 'bloc_Jumbotron.php' ?> -->

			<div class="container-fluid header">
				<div class="row">
					<div class="col-12 d-flex justify-content-center">
						<h3>Add a new compagny</h3>
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
								<div class="name col-md-6 col-12">
									<!-- 💬 Name -->
									<label for="formName">Name:</label>
									<input  class="form-control shadow p-1" type="text" size="20" name="name" id="formName" alt="Name of the compagny input"  placeholder="Type the name of the compagny here" value="<?php echo $name ?>"  />
									<span class="error"><?php echo $name_err;?></span>
								</div>

								<div class="vat col-md-6 col-12">
									<!-- 💬 VAT -->
									<label for="formVat">VAT:</label>
									<input  class="form-control shadow p-1" type="text" name="vat" id="formVat" alt="Vat of the compagny input" placeholder="Type the VAT of the compagny here" value="<?php echo $vat ?>"  />
									<span class="error"><?php echo $vat_err;?></span>
								</div>	
							</div>

							<!-- [2] ROW -->
							<div class="row">
								<div class="country col-md-6 col-12 ">	
									<!-- ✳️ Country -->
									<fieldset>
										<label>Country:</label>
											<select name="countries" class="form-control shadow p-1">
												<?php
													include 'array_Countries.php';
												?>
											</select>
									</fieldset>
									<span class="error"><?php echo $country_err;?></span>
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

		<!-- ASIDE -->
		<aside>

		</aside>

		<!-- SECTION -->
		<section>
				<h2></h2>
					<p></p>			
		</section>
		
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
