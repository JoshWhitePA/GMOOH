<?php
	#Session is started on login page since it is where we call validate user.
	class Logic {
		function __construct() {
  			require_once 'meekrodb.2.3.class.php';
   		}
        
        
        public function searchBasedOnKey($courseKey){
            //loose coupling be darned
            $query = "select * from `COURSE` where 1=2;";
            if($courseKey == "Oral Communication"){
               $query = "SELECT `CourseID`,`CourseName`,`Credits` from `COURSE` where `CoursePrefix`='COM' and `CourseNum`>=010 ORDER BY `CourseID`;"; 
            }elseif($courseKey == "Written Communication"){
                $query = "SELECT `CourseID`,`CourseName`,`Credits` from `COURSE` where `CoursePrefix`='ENG' and `CourseNum` in(023,024,025) ORDER BY `CourseID`;";
            }
            elseif($courseKey == "Mathematics"){
                $query = "SELECT `CourseID`,`CourseName`,`Credits` from `COURSE` where `CoursePrefix`='MAT' and `CourseNum` in(140,301) ORDER BY `CourseNum`;";
            }elseif($courseKey == "Wellness"){
                 $query = "SELECT `CourseID`,`CourseName`,`Credits` from `COURSE` where `CoursePrefix`='HEA' and `Credits`>=3 ORDER BY `CourseNum`;";
            }elseif($courseKey == "Natural Sciences"){
                 $query = "SELECT `CourseID`,`CourseName`,`Credits` from `COURSE` where `CoursePrefix` IN ('AST','BIO','CHM','ENV','GEL','MAR','NSE','PHY') OR `CoursePrefix`='GEG' and `CourseNum` in(040,322,323) ORDER BY `CourseNum`;";
            }elseif($courseKey == "Social Sciences"){
                 $query = "SELECT `CourseID`,`CourseName`,`Credits` from `COURSE` where `CoursePrefix` IN ('ANT','CRJ','ECO','HIS','INT','MCS','PSY','POL','SOC','SSE','SWK') OR `CoursePrefix`='GEG' and `CourseNum` NOT in(040,322,323,204,274,304,324,347,380,394) ORDER BY `CourseNum`;";
            }elseif($courseKey == "Humanities"){
                 $query = "SELECT `CourseID`,`CourseName`,`Credits` from `COURSE` where `CoursePrefix` IN ('ENG','HUM','PAG','PHI','WGS','WRI','CHI','FRE','GER','RUS') ORDER BY `CourseNum`;";
            }elseif($courseKey == "Arts"){
                 $query = "SELECT `CourseID`,`CourseName`,`Credits` from `COURSE` where `CoursePrefix` IN ('ARC','ARH','CDE','CDH','CFT','DAN','FAR','FAS','MUP','MUS','THE') ORDER BY `CourseNum`;";
            }elseif($courseKey == "Free Elective"){
                 $query = "SELECT * from `COURSE`;";
            }elseif($courseKey == "Natural Science with Lab"){
                 $query = "SELECT `CourseID`,`CourseName`,`Credits` from `COURSE` where (`CoursePrefix` IN ('AST','BIO','CHM','ENV','GEL','MAR','PHY') AND `Credits`=4) OR (`CoursePrefix`='GEG' and `CourseNum` in(040,322,323)) ORDER BY `CourseNum`;";
            }elseif($courseKey == "IV. A. 2. Elective"){
                 $query = "SELECT `CourseID`,`CourseName`,`Credits` from `COURSE` where `CoursePrefix` IN ('AST','BIO','CHM','CSC','ENV','GEL','MAR','MAT','NSE','PHY') OR `CoursePrefix`='GEG' and `CourseNum` in(040,322,323)) ORDER BY `CourseNum`;";
            }elseif($courseKey == "IV. B. 1. Elective"){
                 $query = "SELECT `CourseID`,`CourseName`,`Credits` from `COURSE` where `CoursePrefix` IN ('HIS','ANT','POL') OR CoursePrefix ='GEG' and `CourseNum` NOT in (040,322,323,204,274,304,324,347,380,394) ORDER BY `CourseNum`;";
            }elseif($courseKey == "IV. B. 2. Elective"){
                $query = "SELECT `CourseID`,`CourseName`,`Credits` from `COURSE` where `CoursePrefix` IN ('PSY','SOC','CRJ','SWK') ORDER BY `CourseNum`;";
            }elseif($courseKey == "IV. B. 3. Elective"){
                $query = "SELECT `CourseID`,`CourseName`,`Credits` from `COURSE` where `CoursePrefix` IN ('ANT','CRJ','ECO','HIS','INT','POL','PSY','SOC','SSE','SWK') OR CoursePrefix='GEG' and `CourseNum` NOT in(040,322,323,204,274,304,324,347,380,394) ORDER BY `CourseNum`;";
            }elseif($courseKey == "IV. C. 1. Elective"){
                $query = "SELECT `CourseID`,`CourseName`,`Credits` from `COURSE` where (`CourseID`='WRI207') OR (`CoursePrefix` IN ('ENG','WRI','HUM') OR (`CoursePrefix`='PAG' and `CourseNum` NOT IN (011,012)));";
            }elseif($courseKey == "IV. C. 2. Elective"){
                $query = "SELECT `CourseID`,`CourseName`,`Credits` from `COURSE` where (`CourseID`='PHI040') OR (`CoursePrefix` IN ('CHI','FRE','GER','RUS'));";
            }elseif($courseKey == "IV. C. 3. Elective"){
                $query = "SELECT `CourseID`,`CourseName`,`Credits` from `COURSE` where (`CoursePrefix` IN ('ENG','WRI','HUM','PHI')) OR (`CoursePrefix`='PAG' and `CourseNum` NOT in(11,12)) OR (`CoursePrefix` IN ('CHI','FRE','GER','RUS') and `CourseNum` > 103) ORDER BY `CourseNum`;";
            }elseif($courseKey == "IV. D. Elective"){
                $query = "SELECT * from `COURSE` ORDER BY `CourseNum`;";
            }elseif($courseKey == "IV. D. Elective"){
                $query = "select * from `COURSE` where 1=2;";
            }elseif($courseKey == "IV. D. Elective"){
                $query = "";
            }elseif($courseKey == ""){
                $query = "";
            }elseif($courseKey == ""){
                $query = "select * from `COURSE` where 1=2;";
            }
            
            $results = DB::query($query);
            return $results;
            
        }
    
        public function deleteSavedChecksheet($ID, $checkID){
            $results = DB::delete('CHECKSHEETSAVE', "StudentID=%s and AIDID=%s", $ID,$checkID);

            return $results;
        }
        
        
        public function displaySaveFromCheck($ID, $checkID,$AIDID){
            $results = DB::query("SELECT SaveData FROM CHECKSHEETSAVE WHERE StudentID = %s and AIDID = %i;", $ID,$AIDID);
            return $results;
        }
        
        public function termSearch($AIDID,$sID){
             $results = DB::query("SELECT ScheduleRaw  FROM TERMSAVES WHERE AIDID = %s and StudentID = %s;", $AIDID, $sID);
            return $results;
            
        }
        public function termSave($studentID,$classInfo,$AIDID){
            DB::query("SELECT AIDID FROM TERMSAVES WHERE AIDID=%s", $AIDID);
            $counter = DB::count();
            
            if ($counter > 0){
                DB::query("UPDATE TERMSAVES SET ScheduleRaw=%s WHERE AIDID=%s", $classInfo,$AIDID);
            }else{
             DB::insert('TERMSAVES', array(
                          'StudentID' => $studentID,
                          'AIDID' => $AIDID,
                        'ScheduleRaw' => $classInfo
                        ));
            }
        
            return true;
            
        }
        
        public function displaySave($ID){
              $results = DB::query("SELECT CheckSheetOfficial,CheckSheetID,Date,AIDID FROM CHECKSHEETSAVE WHERE StudentID = %s;", $ID);
            return $results;
        }
        
        public function saveChecksheet($ID,$xml,$chkID,$AIDID){
            DB::query("SELECT AIDID FROM CHECKSHEETSAVE WHERE AIDID=%s", $AIDID);
            $counter = DB::count();
             $fancyID = $AIDID;
            if ($counter > 0){
                DB::query("UPDATE CHECKSHEETSAVE SET SaveData=%s WHERE AIDID=%s", $xml,$AIDID);
            }
            else{
            DB::insert('CHECKSHEETSAVE', array(
                          'StudentID' => $ID,
                          'CheckSheetID' => $chkID,
                            'SaveData' => $xml,
                            'Date' => DB::sqleval("NOW()")
                        ));
               $fancyID = DB::insertId();
            }
           
            return $fancyID;
        }
        
        //for logging in
        public function getUserInfo($ID){
            $results = DB::query("SELECT FirstName,LastName,Email,StudentId as ID from STUDENT where StudentId = %s;", $ID);
            if($results == null){
                 $results = DB::query("SELECT FirstName,LastName,Email,FacultyID as ID from FACULTY where FacultyID = %s;", $ID);
            }
            return $results;
        }
        
        //for getting student info for advisors
        public function getStudentInfo($ID){
            $results = DB::query("SELECT FirstName,LastName,Email,Major,StudentId as ID from STUDENT where StudentId = %s;", $ID);
            return $results;
        } 
        
        public function searchBoxQuery($searchParam){
            $results = DB::query("SELECT CourseID,CourseName,Credits,CourseNum FROM COURSE WHERE CourseID like %ss OR CourseName like %ss;", $searchParam,$searchParam);
            return $results;
        }
        
        public function searchByDept($searchParam){
            $results = DB::query("SELECT CourseID,CourseName,Credits, CourseNum FROM COURSE WHERE CoursePrefix= %s ORDER BY CourseNum,CourseName;", $searchParam);
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
