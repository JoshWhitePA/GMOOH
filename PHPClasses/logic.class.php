<?php
	#Session is started on login page since it is where we call validate user.
	class Logic {
		function __construct() {
  			require_once 'meekrodb.2.3.class.php';
   		}
   		

		//Does this work? Needs to be tested.
		public function setDBPass($Password){
			$newPass = $this -> generateHashWithSalt($Password);
			
			DB::update('FACULTY', array(
		  'Password' => $newPass
		  ), "1 = %i", '1');
			 return $newPass;
		}
		

		public function validateUser($email, $password){
			$mysqli_result = DB::queryRaw("SELECT Password,Email,StudentId FROM STUDENT WHERE Email= %s", $email);
			$row = $mysqli_result->fetch_assoc();
			
			$hashPass = $row['Password'];
			$mail = $row['Email'];
			$ID = $row['StudentId'];
			if($mail == null){
				$mysqli_result = DB::queryRaw("SELECT Password,Email,FacultyId FROM FACULTY WHERE Email= %s", $email);
				$row = $mysqli_result->fetch_assoc();
				$hashPass = $row['Password'];
				$mail = $row['Email'];
				$ID = $row['FacultyId'];
			}
			if(is_null($hashPass)){
				return false;
			}
			$_SESSION["Email"] = $mail;
			$_SESSION['ID'] = $ID;
			return $this -> verifyPassword($password, $hashPass);;
		}
		
		function createUser($email, $password, $ID, $Name){
			DB::insert('Users', array(
  			'Email' => $email,
  			'Password' => $password,
  			'ID' => $ID,
  			'Name' => $Name
			));
		}
		
		function verifyPassword($password, $hashedPassword) {
			// example call $logic -> verifyPassword("L33t",$hashedPassword);
			
			if( crypt($password, $hashedPassword) == $hashedPassword){
				return true;
			}else{
				return false;
			}
		}
		
		function setSession($email){
			$mysqli_result = DB::queryRaw("SELECT Password,Email,StudentId FROM STUDENT WHERE Email= %s", $email);
			$row = $mysqli_result->fetch_assoc();
			
			$mail = $row['Email'];
			$ID = $row['StudentId'];
			if($mail == null){
				$mysqli_result = DB::queryRaw("SELECT Password,Email,FacultyId FROM FACULTY WHERE Email= %s", $email);
				$row = $mysqli_result->fetch_assoc();
				$ID = $row['FacultyId'];
			}
			return $ID;
		}
		
		// This function will allow the user to change their password
		function changePassword($oldPassword, $newPassword, $userID){
			// prerequisites - user is logged on and knows their password
			// New Password match done on client side
			// New Password does not match old password done on client side
			// Complete^^
			
			//*********** HELP  ********
			// Check old password. Are there session variables? $_SESSION[]? 
			// First - Verify oldPassword is correct
			
			$mysqli_result = DB::queryRaw("SELECT Password,Email,StudentId FROM STUDENT WHERE StudentId= %s", $userID);
			$row = $mysqli_result->fetch_assoc();
		
			$hashPass = $row['Password'];
			$mail = $row['Email'];
			$ID = $row['StudentId'];
			if($mail == null){
				$mysqli_result = DB::queryRaw("SELECT Password,Email,FacultyId FROM FACULTY WHERE FacultyId= %s", $UserID);
				$row = $mysqli_result->fetch_assoc();
				$hashPass = $row['Password'];
				$ID = $row['FacultyId'];
			}
			
			if(verifyPassword($oldPassword, $hashPass) == true){
			setDBPass($newPassword);
			}


			//Final - Update user's password in DB

			
			// First - Verify oldPassword is correct
//			if( crypt($oldPassword, $hashedPassword) == $hashedPassword){
//				
//				BAD SQL Don't use
//				DB::update(('STUDENT') 
//					set ('Password'=$hasshedPassword) 
//					where ('StudentId'=$_SESSION['StudentId'])LIMIT 1);
//				return true;
//			}else{
//				return false;
//				}
//			}
						
			//old code - $q = "UPDATE Users SET pass=SHA1('$') WHERE userId=$uid LIMIT 1";
			
		}
		
		public function generateHashWithSalt($Password) {
			//example: $hashedPassword = $logic -> generateHashWithSalt("L33t");
			
			$Salt = uniqid(mt_rand(), true); // Could use the second parameter to give it more entropy.
			$Algo = '6'; // This is CRYPT_SHA512 as shown on http://php.net/crypt
			$Rounds = '5000'; // The more, the more secure it is!
			// This is the "salt" string we give to crypt().
			$CryptSalt = '$' . $Algo . '$rounds=' . $Rounds . '$' . $Salt;
			$HashedPassword = crypt($Password, $CryptSalt);
			return $HashedPassword;
		}
        
        public function createGenEdXML(){
            
        }
	}
?>