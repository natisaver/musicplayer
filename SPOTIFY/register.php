<?php
	include("includes/config.php");

	//Creating an object $account via Account Class, to call ANY function $account->function
	include("includes/classes/Account.php");
	$account = New Account($con); //$con in Account() is so that $con can be used in Account.php

	//To access full error Messages
	include("includes/classes/Constants.php");


	//include means we copy paste that code here, just that it doesnt take up the space here
	include("includes/handlers/register-handler.php");
	include("includes/handlers/login-handler.php");

	//This function takes an input name field, (e.g username) and remember the form value after inputted (isset)
	//See <?php getInputValue below in html to see it used
	function getInputValue($name) {
		if(isset($_POST[$name])){
			echo $_POST[$name];
		}
	}
	
?>


<!DOCTYPE html>

<html>
<head>
	<title>Login to nato Music</title>
	<link rel="stylesheet" type="text/css" href="assets/css/register.css"> <!-- link then press tab, then href type css location -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="assets/js/register.js"></script>

</head>
<body> <!-- Adding the first background div then another div with form, label for username and password, then finish with submit button -->
	
	<?php  
	if(isset($_POST['registerButton'])){
		echo '<script>
				$(document).ready(function(){
					$("#loginForm").hide();
					$("#registerForm").show();
				});	
			</script>';	
	}
	else{
		echo '<script>
				$(document).ready(function(){
					$("#loginForm").show();
					$("#registerForm").hide();
				});
			</script>';
	}

	?>

	<div id='background'>

		<div id ='loginContainer'>

			<div id="inputContainer">
				<form id="loginForm" action="register.php" method="POST">
					<h2>Login to your account</h2>
					<p>
						<?php echo $account->getError(Constants::$loginFailed); ?>
						<label for="loginUsername">Username</label>
						<input id="loginUsername" name="loginUsername" type="text" placeholder ="e.g username here" value = "<?php getInputValue('loginUsername')?>" required>
					</p>
					<p>			
						<label for="loginPassword">Password</label>
						<input id="loginPassword" name="loginPassword" type="password" required>	
					</p>
					<button type="submit" name="loginButton">LOG IN</button>
					<!-- press a and tab for anchor #, to make it a link-->
					<div class="hasAccountText"><a href="#">
						<span id="hideLogin"> Don't have an account yet? Sign up here.
							
						</span>
					</a>	
					</div>
					
				</form>

				<!-- Adding the form for registration, username, firstname,lastname, emailx2,password x2 & submit button -->
				<form id="registerForm" action="register.php" method="POST">
					<h2>Create your free account</h2>
					<p>
						<?php echo $account->getError("Your username must be 4 to 25 characters"); ?>
						<?php echo $account->getError("This username already exists"); ?>
						<label for="username">Username</label>
						<input id="username" name="username" type="text" placeholder ="username here" value = "<?php getInputValue('username')?>" required> 
					</p>

					<p>
						<?php echo $account->getError("Your First Name must be 1 to 25 characters"); ?>
						<label for="firstName">First Name</label>
						<input id="firstName" name="firstName" type="text" placeholder ="e.g Nat" value = "<?php getInputValue('firstName')?>" required>
					</p>

					<p>
						<?php echo $account->getError("Your First Name must be 1 to 25 characters"); ?>
						<label for="lastName">Last Name</label>
						<input id="lastName" name="lastName" type="text" placeholder ="e.g Chin" value = "<?php getInputValue('lastName')?>" required>
					</p>

					<p>
						<?php echo $account->getError(Constants::$emailsDoNotMatch); ?>
						<?php echo $account->getError("Invalid Email"); ?>
						<?php echo $account->getError("This email already exists"); ?>
						<label for="email">Email</label>
						<input id="email" name="email" type="email" placeholder ="e.g nat@gmail.com" value = "<?php getInputValue('email')?>" required>
					</p>

					<p>
						<label for="email2">Confirm Email</label>
						<input id="email2" name="email2" type="email" placeholder ="e.g nat@gmail.com again" value = "<?php getInputValue('email2')?>" required>
					</p>


					<p>
						<?php echo $account->getError(Constants::$passwordsDoNotMatch); ?>
						<?php echo $account->getError(Constants::$passwordNotValid); ?>
						<label for="password">Password</label>
						<input id="password" name="password" type="password" placeholder="your password" required>	
					</p>


					<p>
						<label for="password2">Confirm Password</label>
						<input id="password2" name="password2" type="password" placeholder="confirm password" required>	
					</p>
					<button type="submit" name="registerButton">SIGN UP</button>
					<!-- press a and tab for anchor #, to make it a link-->
					<div class="hasAccountText"><a href="#">
						<span id="hideRegister"> Already have an account? Log in here.
							
						</span>
					</a>	
					</div>
					
					
				</form>

			</div>
			<div id="homepageText">
				<h1>Listen to some chill music, right now.</h1>
				<h2>sit back, relax and just ride the sounds</h2>
				<ul>
					<li>Discover new artists</li>
					<li>Personalise your playlists</li>
					<li>Find new music to enjoy</li>
				</ul>
				<h6> Curated by Nathaniel 2020 © </h6>
			
			</div>
		</div>
	
	</div>
		

</body>
</html>