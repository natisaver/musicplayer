<?php

	class Album {
		private $con; //variable, $this->con
		private $id; 
		private $artist;
		private $artworkPath;
		private $title;
		private $genre;

//Constructor (innate Album properties)
		//here we are equating 
		public function __construct($con, $id) {
			$this->con = $con; 
			$this->id = $id; 

			$query = mysqli_query($this->con, "SELECT * FROM albums WHERE id='$this->id'");
			$album = mysqli_fetch_array($query); /*fetches a row*/
			
			$this->artist = $album['artist'];
			$this->artworkPath = $album['artworkPath'];
			$this->title = $album['title'];
			$this->genre = $album['genre'];
			
		}

		public function getTitle() {
			return $this->title;
		}

		public function getGenre() {
			return $this->genre;
		}
			
		public function getartworkPath() {
			return $this->artworkPath;
		}

		public function getArtist() {
			return new Artist($this->con, $this->artist);
		}

		public function getNumberOfSongs() {
			$query = mysqli_query($this->con, "SELECT id FROM songs WHERE album='$this->id'");
			return mysqli_num_rows($query);
		}

		public function getSongids() {
			$query = mysqli_query($this->con, "SELECT id FROM songs WHERE album='$this->id' ORDER BY albumOrder ASC");
			#creating array
			$array = array();
			#while loop to get each row via query, then push each column id from each row onto array
			while($row = mysqli_fetch_array($query)) {
				array_push($array, $row['id']);
			}
			return $array;
		}

	}
?>