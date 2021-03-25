<?php include("includes/header.php"); ?>

<h1 class="bigText">You might also enjoy the following albums:</h1>
<div class="gridViewContainer">
	<?php 
		$albumQuery = mysqli_query($con, "SELECT * FROM albums ORDER BY RAND() LIMIT 10");
		while ($row = mysqli_fetch_array($albumQuery)) {

			/* here, there is 3 strings we gna echo and concatenate, 'is for the actual html' and "is for the echo php strings" 
			same as:
			echo "<div class='gridViewItem'> <img src=' ";
			echo $row['artworkPath'];
			echo "'> </div>";
			*/

			echo "<div class='gridViewItem'>
					<a href='album.php?id=" . $row['id'] . "'>
					<img src='" . $row['artworkPath'] . "'> 
					
					<div class='gridViewInfo'>"
						. $row['title'] .
					"</div>
					</a>

				</div>";


			
		}
	 ?>

</div>

<?php include("includes/footer.php"); ?>