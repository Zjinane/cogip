<div class="container">
	<div class="row">
		<div class="form rounded-lg col-10 offset-1">

			<div class="row">
				<div class="col-12 form-group">
					<u><h2>New user form:</h2></u>
				</div>
			</div>

			<form method="post" action="" autocomplete="on" id="form">

			<!-- [1] ROW -->
			<div class="row">
				<div class="username col-md-6 col-12">
					<!-- 💬 Username -->
					<label for="formUsername">Username:</label>
					<input  class="form-control shadow p-1" type="text" size="20" name="usernamereg" id="formUsername" alt="Your username input"  placeholder="Type your Username here" value="<?php echo $creatUsername ?>"  />
					<span class="error"><?php echo $username_err;?></span>
				</div>

				<div class="password col-md-6 col-12">
					<!-- 💬 Password -->
					<label for="formPassword">Password:</label>
					<input  class="form-control shadow p-1" type="password" name="passwordreg" id="formPassword" placeholder="Type your password here" value="<?php echo $password ?>"   alt="Your password input"/>
					<span class="error"><?php echo $password_err;?></span>
				</div>	
			</div>
			
			<!-- [2] ROW -->
			<div class="row">
				<div class="gender col-md-6 col-12">
					<!-- 🚻 Gender -->
					<p>Choose your user type:<br>
					<span class="error"><?php echo $gender_err;?></span>
					</div>
					<div class="gender col-md-3 col-12">	
						<label for="male">User</label>
						<input  type="radio" name="usertype" id="male" value="Male"   alt="Choose that if you are a man"> 
					</div>		
					<div class="gender col-md-3 col-12">				
						<label for="female">SuperUser</label>
						<input type="radio" name="usertype" id="female" value="Female"   alt="Choose that if you are a woman"> </p>
					</div>	
				
			</div>
			
			<!-- [3] ROW -->
			<div class="row">
				<div class="col-md-6 d-flex justify-content-center">	
					<!-- Reset button -->
					<input class="btn btn-primary" type="reset" value="RESET" onclick="forceReset();">
				</div>

				<div class="col-md-6 d-flex justify-content-center">	
					<!-- Submit button -->
					<input class="btn btn-primary" type="submit" name="creatUser"  value="SUBMIT">
				</div>
			</div>
			
			</form>
		</div>
	</div>
</div>
