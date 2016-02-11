<?php
	class Logic {
		
		function verify($password, $hashedPassword) {
			// example call $logic -> verify("L33t",$hashedPassword);
			
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