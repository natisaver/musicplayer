<?php
//LOGIN BUTTON HANDLER 

//If "login button was pressed" - isset sees if its declared or null
//$_POST is used to call the html (found in register.php) via its name="..." 

//here we equate html names input(POST) to the sanitised output
if(isset($_POST['loginButton'])) {
	$username = $_POST['loginUsername']; 
	$password = $_POST['loginPassword'];

//calling Login fuction from object $account which sees if user has an account
	$result = $account->login($username,$password); 

//once ok, create session & redirect
	if($result == true) {
		$_SESSION['userLoggedIn'] = $username; //$_SESSION creates a session variable called userLoggedIn, we then set it to username
		header("Location: index.php"); //redirect 		
	}


}

?>