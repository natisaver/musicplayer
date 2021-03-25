<?php 
class Constants {
//static means dont need create instance of class e.g $account = new Account(), instead you access them e.g Class::$variable, where :: is to access staic
	public static $passwordsDoNotMatch = "Your passwords do not match.";

	public static $emailsDoNotMatch = "Your emails do not match";

	public static $passwordNotValid = 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';

	public static $usernameTaken = "This username already exists";

	public static $emailTaken = "This email already exists";

	public static $loginFailed = "Your username or password is incorrect";


}	


 ?>