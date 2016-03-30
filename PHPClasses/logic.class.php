<?php
	#Session is started on login page since it is where we call validate user.
	class Logic {
		function __construct() {
  			require_once 'meekrodb.2.3.class.php';
   		}
        
        
        public function searchBoxQuery($searchParam){
            $results = DB::query("SELECT CourseID,CourseName,Credits FROM COURSE WHERE CourseID like %ss OR CourseName like %ss;", $searchParam,$searchParam);
            return $results;
        }
		
		//This function will set all of the passwords in the db to 
		//whatever parameter you pass it. Be currful
		public function setDBPass($Password){
			$newPass = $this -> generateHashWithSalt($Password);
			
			DB::update('STUDENT', array(
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
			
			return $this -> verifyPassword($password, $hashPass);
		}
		
		function createUser($studentId, $email, $password, $firstName, $lastName){
			DB::insert('STUDENT', array(
  			'StudentId' => $studentId,
  			'Email' => $email,
  			'Password' => $password,
  			'FirstName' => $firstName,
  			'LastName' => $lastName
			));
		}
		
		function verifyPassword($password, $hashedPassword) {
			// example call $logic -> verifyPassword("L33t",$hashedPassword);
//            echo crypt($password, $hashedPassword);
			
			if( crypt($password, $hashedPassword) == $hashedPassword){
                echo "true";
				return true;
			}else{
                echo "false";
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
			$facultyValid = NULL;
			$studentValid = NULL;
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
				$facultyValid = $this -> verifyPassword($oldPassword, $hashPass);
				if($facultyValid == true){
					$newPassword = $this -> generateHashWithSalt($newPassword);
					DB::update('FACULTY', array(
					'Password' => $newPassword
					), "FacultyId = %s", $ID);
					return true;
				}
				else{
					return false;
				}
			}
			
			$studentValid = $this -> verifyPassword($oldPassword, $hashPass);
			if($studentValid == true){
				$newPassword = $this -> generateHashWithSalt($newPassword);
				DB::update('STUDENT', array(
				'Password' => $newPassword
				), "StudentId = %s", $ID);
				return true;
			}
			else{
				return false;
			}
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