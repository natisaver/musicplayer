<?php
//class must start with capital letter
//construct is the constructor, the private indicates the variable or function can only be called within this class, public can be included elsewhere via include("directory")

	class Account {
		private $con; //variable, $this->con
		private $errorArray; //variable, $this->errorArray

//Constructor (innate Account properties)
		public function __construct($con) {
			$this->con = $con; //equating the variable of Account to $con in config.php (the database connector)
			$this->errorArray = array(); //setting an empty array to store errors
		}


//Login Function (used in login-handler)
		public function login($un, $pw) {
			$pw = md5($pw); //to compare with registration func $encryptedPw
			$query = mysqli_query($this->con, "SELECT * FROM users WHERE username='$un' AND password = '$pw'");
			//if username and pass matches that in db, then return true
			if(mysqli_num_rows($query) == 1) {
				return True;
			}
			else{
				array_push($this->errorArray, Constants::$loginFailed);
				return False;
			}
		}
//Register Function: Overall function to validate all data fields & input data to DB once ok
//$this-> is used to call out variables/functions of THIS class i.e Account
//for each validation func, they use sanitised as inputs, refer to register-handler.php for actual parameters used
		public function register($un, $fn, $ln, $em, $em2, $pw, $pw2) {
			$this->validateUsername($un);
			$this->validateFirstName($fn);
			$this->validateLastName($ln);
			$this->validateEmails($em, $em2);
			$this->validatePasswords($pw, $pw2);

			if(empty($this->errorArray)) { //if no error stored in array

				return $this->inputUserDetails($un, $fn, $ln, $em, $pw); //insert into db
			}
			else {
				return false;
			}
			
		}

//GetError Function: Outputs the error messages to the user, see register.php in html
		public function getError($error) {
			if(!in_array($error, $this->errorArray)) { //if no error, return blank
				$error = "";
			}
			return "<span class='errorMessage'>$error</span>";
		}

//InputUserDetails Function: inputs field data into database
		private function inputUserDetails($un, $fn, $ln, $em, $pw) {
		$encryptedPw = md5($pw); //using md5 encryption 	
		$profilePic = "assets/images/profile-pics/profile2.png";
		$date = date("Y-m-d");

		$result = mysqli_query($this->con, "INSERT INTO users VALUES ('', '$un', '$fn', '$ln', '$em', '$encryptedPw', '$date', '$profilePic')"); 
		//This is in order with the values of our sql table, where we are inserting (INSERT INTO) them, id is left blank because Autoincrement
		return $result; //mysqli query returns true or false

		}

//VALIDATION FUNCTIONS AFTER SANITISATION
// || is or, This checks the username length
		private function validateUsername($un) {
			if(strlen($un) > 25 || strlen($un) < 4) {
				array_push($this->errorArray, "Your username must be 4 to 25 characters"); 
				return;
			}
			//checks db if username is taken
			$checkUsernameQuery = mysqli_query($this->con, "SELECT username FROM users WHERE username='$un'");
			if(mysqli_num_rows($checkUsernameQuery) != 0) {
				array_push($this->errorArray, Constants::$usernameTaken); 
				return;
			}

		}

		private function validateFirstName($fn) {
			if(strlen($fn) > 25 || strlen($fn) < 1) {
				array_push($this->errorArray, "Your First Name must be 1 to 25 characters"); 
				return;
			}
		}

		private function validateLastName($ln) {
			if(strlen($ln) > 25 || strlen($ln) < 1) {
				array_push($this->errorArray, "Your Last Name must be 1 to 25 characters"); 
				return;
			}
		}

		private function validateEmails($em,$em2) {
			if($em != $em2) {
				array_push($this->errorArray, Constants::$emailsDoNotMatch);
				return;
			}
			if(!filter_var($em, FILTER_VALIDATE_EMAIL)) {
				array_push($this->errorArray, "Invalid Email");
				return;
			} //check db if email is taken
			$checkEmailQuery = mysqli_query($this->con, "SELECT email FROM users WHERE email='$em'");
			if(mysqli_num_rows($checkEmailQuery) != 0) {
				array_push($this->errorArray, Constants::$emailTaken);
				return;
			}

		}

		private function validatePasswords($pw, $pw2) {
			if($pw != $pw2) {
				array_push($this->errorArray, Constants::$passwordsDoNotMatch);
				return;
			}
		// In preg_match, the forward slash is the delimiter (can be other symbol *#@), followed by the pattern, ^ means isnt, google reg ex for more
			//here we basically say the password must have uppercase, number and symbol
			$uppercase = preg_match('/[A-Z]/', $pw);
			$lowercase = preg_match('/[a-z]/', $pw);
			$number    = preg_match('/[0-9]/', $pw);
			$specialChars = preg_match('/[^\w]/', $pw); //w is a word character, a to z, numbers and _

			if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($pw) < 8) {
			    array_push($this->errorArray, Constants::$passwordNotValid);
			    return;
			}
		}


	}

?>