<?php
	#Session is started on login page since it is where we call validate user.
	class Logic {
		function __construct() {
  			require_once 'meekrodb.2.3.class.php';
   		}
   		
		function validateUser($email, $password){
			$results = DB::query("SELECT Password,Email,ID FROM User where Email = %s",$email);
			
			foreach ($results as $row) {
				$hashPass = $row['Password'];
				$Email = $row['Email'];
				$ID = $row['ID'];
			}
			if(is_null($hashPass)){
				return false;
			}
			$_SESSION['Email'] = $Email;
			$_SESSION['ID'] = $ID;

			return verifyPassword($password, $hashPass);
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
		
		function generateHashWithSalt($Password) {
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