<?php

	class Song {
		private $con; //variable, $this->con
		private $id; 
		private $mysqliData;
		private $title;
		private $artist;
		private $album;
		private $duration;
		private $genre;
		private $path;

//Constructor (innate Song properties)

		public function __construct($con, $id) {
			$this->con = $con; 
			$this->id = $id; 

			$query = mysqli_query($this->con, "SELECT * FROM songs WHERE id='$this->id'");
			$this->mysqliData = mysqli_fetch_array($query); /*fetches a row*/

			$this->title = $this->mysqliData['title'];
			$this->artist = $this->mysqliData['artist'];
			$this->album = $this->mysqliData['album'];
			$this->duration = $this->mysqliData['duration'];
			$this->genre = $this->mysqliData['genre'];
			$this->path = $this->mysqliData['path'];
		}

		public function getTitle() {
			return $this->title;
		}

		public function getArtist() {
			return new Artist($this->con, $this->artist);
		}

		public function getAlbum() {
			return new Album($this->con, $this->album);
		}

		public function getDuration() {
			return $this->duration;
		}

		public function getGenre() {
			return $this->genre;
		}

		public function getPath() {
			return $this->path;
		}		

		public function getmysqliData() {
			return $this->mysqliData;
		}	

	}

?>		