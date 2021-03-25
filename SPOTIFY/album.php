<!-- HEADER -->
<?php include("includes/header.php"); 

if(isset($_GET['id'])) {
	$albumId = $_GET['id'];
}

else {
	header("Location: index.php");
}

/*CREATING THE ALBUM.PHP OBJECT*/
$album = new Album($con, $albumId);
// echo $album->getTitle() . "<br>";

/*CREATING THE ARTIST.PHP OBJECT*/
/*then calling the function getName*/
$artist = $album->getArtist();
// echo $artist->getName();
?>

<div class="entityInfo">
	<div class="leftSection">
		<img src="<?php echo $album->getartworkPath(); ?>">
	</div>

	<div class="rightSection">
		<h1> <?php echo $album->getTitle();?> </h1>
		<span class="artistee"> <?php echo $artist->getName();?> </span>
		<span> ∘ <?php echo $album->getNumberOfSongs();?> Tracks</span>
	</div>
</div>

<div class='tracklistContainer'>
	<ul class='tracklist'>
		<?php 
			$songIdArray = $album->getSongids();
			$i = 1;

			foreach($songIdArray as $songId) { #loop over the array with each being songid
				$songObj = new Song($con, $songId);
				$songTitle = $songObj->getTitle();
				$songArtist = $songObj->getArtist();
				$songDuration = $songObj->getDuration();

				echo "<li class='trackRow'> 
						<div class='track'>
							<div class='tracks'>
								<img class='play' src='assets/images/icons/play-24.png'>
								<span class='trackItem'> $i. </span> 	
							</div>

							<div class='tracks2'>	
								<span class='trackTitle'> $songTitle </span>
								<span class='trackArtist'>" . $songArtist->getName() . "</span>
							</div>

							<div class='tracks3'>
								<span class='trackDuration'> $songDuration </span>
							</div>

							<div class='tracks4'>
								<img class='more' src='assets/images/icons/more.png'>
							</div>		
						</div>				
					</li>";

				 $i = $i + 1;
			}								

		 ?>
	</ul>
	

</div>


<!-- FOOTER -->
<?php include("includes/footer.php"); ?>