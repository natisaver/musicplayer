<?php 
$songQuery = mysqli_query($con, "SELECT * FROM songs ORDER BY RAND() LIMIT 10");

$resultArray = array();

while($row = mysqli_fetch_array($songQuery)) {
	array_push($resultArray, $row['id']);
}

$jsonArray = json_encode($resultArray); #convert php array to json format, turn it into js array object

?>

<script>
$(document).ready(function() {
	currentPlaylist = <?php echo $jsonArray; ?>;
	audioElement = new Audio();
	setTrack(currentPlaylist[0], currentPlaylist, false);
});

function setTrack(trackId, newPlaylist, play) {

}

</script>

<div id="nowPlayingBarContainer">
			
	<div id="nowPlayingBar">

		<!-- LEFT SIDE -->
		<div id="nowPlayingLeft">
			<div class="content">

				<span class="albumLink">
					<img src="https://images-na.ssl-images-amazon.com/images/I/61yE%2Blz04QL._AC_SY355_.jpg" class="albumArt">
				</span>

				<div class="trackInfo">
					<span class="trackName">
						<span>
							instagram
						</span>
					</span>

					<span class="artistName">
						<span>
							dean
						</span>
					</span>
					

				</div>
			</div>
		</div>
				
		<!-- MIDDLE -->
		<div id="nowPlayingMiddle">
			<div class="content playerControls"> <!-- 2 classes, content & playercrtls -->
				
				<div class="buttons">
					<button class="controlButton shuffle" title="Shuffle Button">
						<img src="assets/images/icons/shuffle.png" alt="shuffle">
					</button>

					<button class="controlButton previous" title="Previous Button">
						<img src="assets/images/icons/previous.png" alt="previous">
					</button>

					<button class="controlButton play" title="Play Button">
						<img src="assets/images/icons/play.png" alt="play">
					</button>

					<button class="controlButton pause" title="Pause Button" style="display:none;">
						<img src="assets/images/icons/pause.png" alt="pause">
					</button>

					<button class="controlButton next" title="Next Button">
						<img src="assets/images/icons/next.png" alt="next">
					</button>

					<button class="controlButton repeat" title="Repeat Button">
						<img src="assets/images/icons/repeat.png" alt="repeat">
					</button>

				</div>


				<!--span is an inline tag vs p which is a block-->	
				<div class="playbackBar">
					<span class="progressTime current">0.00</span>
					<div class="progressBar">
						<div class="progressBarBG">
							<div class="progress">
								
							</div>
						</div>
					</div>
					<span class="progressTime remaining">0.00</span>
				</div>		


			</div>
		</div>

		<!-- RIGHT -->
		<div id="nowPlayingRight">
			<div class="volumeBar">

				<button class="controlButton volume" title="volume control">
					<img src="assets/images/icons/volume.png" alt="Volume">
				</button>
				
				<div class="progressBar">
					<div class="progressBarBG">
						<div class="progress">	
						</div>
					</div>
				</div>

			</div>
		</div>
		
	</div>

	

</div>
