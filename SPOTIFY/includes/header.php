<!-- PHP PORTION HERE IS FOR SESSIONS -->
<!-- An id can only identify one element, while a class can identify multiple-->
<?php 

//For Creating Sessions
include("includes/config.php"); 

include("includes/classes/Artist.php");
include("includes/classes/Album.php");
include("includes/classes/Song.php");

if(isset($_SESSION['userLoggedIn'])){ //if user is logged in/session variable is set, either by logging in/registering:
		$userLoggedIn = $_SESSION['userLoggedIn']; //modifying session variable as userLoggedIn and set it to the $username (seen in login-handler/register-handler)
} 

else{
	header("Location: register.php"); //otherwise if not logged in, redirect back to register.php, dont let them go to index.php
}


?>

<!DOCTYPE html>
<html>
<head>
	<title>♫ nato - Music Player</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="assets/js/script.js"></script>
</head>
<body>
	Welcome to Nato Music Player

	<script>
		var audioElement = new Audio; 
		audioElement.setTrack('assets/music/BewhY-ALGORITHM.mp3');
		audioElement.audio.play();

	</script>

	<div id="mainContainer">

		<div id="topContainer">

			<?php include("includes/navbarcontainer.php"); ?>

			<div id="mainViewContainer">
				<div id="mainContent">