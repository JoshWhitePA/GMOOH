<?php
	#Session is started on login page since it is where we call validate user.
	class Logic {
		function __construct() {
  			require_once 'meekrodb.2.3.class.php';
   		}
        
    
        public function deleteSavedChecksheet($ID, $checkID){
            $results = DB::delete('CHECKSHEETSAVE', "StudentID=%s and AIDID=%s", $ID,$checkID);

            return $results;
        }
        
        
        public function displaySaveFromCheck($ID, $checkID,$AIDID){
            $results = DB::query("SELECT SaveData FROM CHECKSHEETSAVE WHERE StudentID = %s and AIDID = %i;", $ID,$AIDID);
            return $results;
        }
        
        public function termSearch($term,$sID){
             $results = DB::query("SELECT ClassInfo  FROM TERMSAVE WHERE Term = %s and StudentID = %s;", $term, $sID);
            return $results;
            
        }
        public function termSave($studentID,$classInfo,$term){
             DB::insert('TERMSAVE', array(
                          'StudentID' => $studentID,
                          'Term' => $term,
                        'ClassInfo' => $classInfo
                        ));
            return true;
            
        }
        
        public function displaySave($ID){
              $results = DB::query("SELECT CheckSheetOfficial,CheckSheetID,Date,AIDID FROM CHECKSHEETSAVE WHERE StudentID = %s;", $ID);
            return $results;
        }
        
        public function saveChecksheet($ID,$xml,$chkID,$AIDID){
            DB::query("SELECT AIDID FROM CHECKSHEETSAVE WHERE AIDID=%s", $AIDID);
            $counter = DB::count();
            if ($counter >0){
                DB::query("UPDATE CHECKSHEETSAVE SET SaveData=%s WHERE AIDID=%s", $xml,$AIDID);
            }
            else{
            DB::insert('CHECKSHEETSAVE', array(
                          'StudentID' => $ID,
                          'CheckSheetID' => $chkID,
                            'SaveData' => $xml,
                            'Date' => DB::sqleval("NOW()")
                        ));
            }
            return true;
        }
        
        public function getUserInfo($ID){
            $results = DB::query("SELECT FirstName,LastName,Email,StudentId as ID from STUDENT where StudentId = %s;", $ID);
            if($results == null){
                 $results = DB::query("SELECT FirstName,LastName,Email,FacultyID as ID from FACULTY where FacultyID = %s;", $ID);
            }
            return $results;
        }
        
        public function searchBoxQuery($searchParam){
            $results = DB::query("SELECT CourseID,CourseName,Credits,CourseNum FROM COURSE WHERE CourseID like %ss OR CourseName like %ss;", $searchParam,$searchParam);
            return $results;
        }
        
        public function searchByDept($searchParam){
            $results = DB::query("SELECT CourseID,CourseName,Credits, CourseNum FROM COURSE WHERE CoursePrefix= %s ORDER BY CourseNum;", $searchParam);
            return $results;
        }
		
		//This function will set all of the passwords in the db to 
		//whatever parameter you pass it. Be currful
//		public function setDBPass($Password){
//			$newPass = $this -> generateHashWithSalt($Password);
//			
//			DB::update('STUDENT', array(
//		  'Password' => $newPass
//		  ), "1 = %i", '1');
//			 return $newPass;
//		}

		public function validateUser($email, $password){
			$mysqli_result = DB::queryRaw("SELECT Password,Email,StudentId FROM STUDENT WHERE Email= %s", $email);
			$row = $mysqli_result->fetch_assoc();
			
			$hashPass = $row['Password'];
			$mail = $row['Email'];
			$ID = $row['StudentId'];
			$_SESSION['stuID'] = $ID;
			if($mail == null){
				$mysqli_result = DB::queryRaw("SELECT Password,Email,FacultyId FROM FACULTY WHERE Email= %s", $email);
				$row = $mysqli_result->fetch_assoc();
				$hashPass = $row['Password'];
				$mail = $row['Email'];
				$ID = $row['FacultyId'];
				$_SESSION['facID'] = $ID;
			}
			if(is_null($hashPass)){
				return false;
			}
			
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
        
        public function createGenEdXML(){
            
        }
	}
?>