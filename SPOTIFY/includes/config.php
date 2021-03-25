<?php 
	ob_start(); // "Start remembering everything that would normally be outputted, but don't quite do anything with it yet."
	
	session_start(); //starts a session, so that every page on the website remembers the variable $_SESSION instead of just one page.

	//CHECK index.php to see it used, must also add $_SESSION variable to login & register handlers before redirecting

	

	//Timezone
	$timezone = date_default_timezone_set("Asia/Singapore"); 

	//Connection to database (refer to Account.php to see $con used)
	$con = mysqli_connect("localhost", "root", "", "spotify"); //localhost, username, password, database

	//If there is an error with database connection, print error
	if(mysqli_connect_errno()) { 
		echo "Failed to Connect: " . mysqli_connect_errno(); // . appends the echo with the actual error message
	}

 ?>