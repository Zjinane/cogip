<?php 


?>
<div class="container">
	<div class="row">
		<div class="form rounded-lg col-10 offset-1">
          
			<form method="post" action="" autocomplete="on" id="form">

				<!-- [1] ROW -->
				<div class="row">
					<div class="username col-md-6 col-12">
						<!-- 💬 Username -->
						<label for="formUsername">Username:</label>
						<input  class="form-control shadow p-1" type="text" size="20" name="username" id="formUsername" alt="Your username input"  placeholder="Type your Username here" value="<?php echo $username ?>"  />
						<span class="error"><?php echo $username_err;?></span>
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
