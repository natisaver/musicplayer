<?php

	class Artist {
		private $con; //variable, $this->con
		private $id; 

//Constructor (innate Artist properties)
		public function __construct($con, $id) {
			$this->con = $con; 
			$this->id = $id; /*equating property $id to $id*/
		}

		public function getName() {
			
			$artistQuery = mysqli_query($this->con, "SELECT name FROM artists WHERE id='$this->id'");
			$artist = mysqli_fetch_array($artistQuery); /*fetches a row*/
			return $artist['name'];
		}
	}
?>