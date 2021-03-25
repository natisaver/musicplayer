<?php 
//REGISTER HANDLER

//sanitize functions, $means variable
function sanitizeFormUsername($inputText) {
	$inputText = strip_tags($inputText); //prevents them from putting html elements
	$inputText = str_replace(" ", "", $inputText);
	return $inputText;
}

function sanitizeFormString($inputText) {
	$inputText = strip_tags($inputText); 
	$inputText = str_replace(" ", "", $inputText); 
	$inputText = ucfirst(strtolower($inputText)); //uppercase the first letter
	return $inputText;
}

function sanitizeFormPassword($inputText) {
	$inputText = strip_tags($inputText); 
	return $inputText;

}

//if register button is pressed:
//1) SANITISE THE DATA and output them as the following variables
if(isset($_POST['registerButton'])) {
	$username = sanitizeFormUsername($_POST['username']);
	$firstName = sanitizeFormString($_POST['firstName']);
	$lastName = sanitizeFormString($_POST['lastName']);
	$email = sanitizeFormString($_POST['email']);
	$email2 = sanitizeFormString($_POST['email2']);

	$password = sanitizeFormPassword($_POST['password']);
	$password2 = sanitizeFormPassword($_POST['password2']);

//2) IF REGISTRATION was successful, aka fields were VALIDATED in register func, redirect to index page
//THIS IS CALLING the register function with the sanitised data as inputs
	$wasSuccessful = $account->register($username, $firstName, $lastName, $email, $email2, $password, $password2);

//once ok, create session & redirect
	if($wasSuccessful == true) {
		$_SESSION['userLoggedIn'] = $username; //session portion, creates session variable userloggedin
		header("Location: index.php"); //redirect
	}






}

?>