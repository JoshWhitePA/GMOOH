<?php
	#Session is started on login page since it is where we call validate user.
	class Logic {
		function __construct() {
  			require_once 'meekrodb.2.3.class.php';
   		}
   		
#		public function setDBPass($Password){
#			$newPass = $this -> generateHashWithSalt($Password);
#			
#			DB::update('STUDENT', array(
#		  'Password' => $newPass
#		  ), "1 = %i", '1');
#			 return $newPass;
#		}
		
		public function validateUser($email, $password){
			$mysqli_result = DB::queryRaw("SELECT Password,Email,StudentId FROM STUDENT WHERE Email= %s", $email);
			$row = $mysqli_result->fetch_assoc();
			
			$hashPass = $row['Password'];
			$mail = $row['Email'];
			$ID = $row['StudentId'];
			
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
		
		function changePassword($oldPassword, $newPassword1, $newPassword2){
			// newPassword1 is first, newPassword2 is verifying new password
			// This function will allow the user to change their password
			// prerequisites - user is logged on and knows their password
			// First - Verify oldPassword is correct
			// Second - Verify password1&2 match
			// Third - Verify that new password is not the old password
			// Final - Update user's password in DB
			
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
	}
?>