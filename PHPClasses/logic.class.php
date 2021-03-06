<?php
	#Session is started on login page since it is where we call validate user.
	class Logic {
		function __construct() {
  			require_once 'meekrodb.2.3.class.php';
   		}
        
            /*This method returns saved credits from CHECKSHEETSAVE table*/
          public function progressPagePop($stuID){
              $results = DB::query("SELECT NumCredits,CheckSheetId FROM CHECKSHEETSAVE WHERE StudentId = %s and CheckSheetOfficial = 1;", $stuID);
            return $results;
          }
        
        /*This method searches for the advisors Students based on the advisors ID*/
        public function adviseeSearch($ID){
             $results = DB::query("SELECT s.FirstName,s.LastName,s.StudentId FROM STUDENT s WHERE AdvisorId = %s;", $ID);
            return $results;
            
        }
        
        /*returns information about the student based on the students ID*/
        function getStudentInfo($StuID){
            $results = DB::query("SELECT s.FirstName,s.LastName,s.Email,s.Major,s.StudentId FROM STUDENT s WHERE StudentId = %s;", $StuID);
            return $results;
        }
        
        /*returns data based on the info provided by the ID of the div when the user click*/
        public function searchBasedOnKey($courseKey){
            //loose coupling be darned
            $query = "select * from `COURSE` where 1=2;";
            if($courseKey == "Oral Communication"){
               $query = "SELECT `CourseID`,`CourseName`,`Credits` from `COURSE` where `CoursePrefix`='COM' and `CourseNum`>=010 ORDER BY `CourseNum`;"; 
            }elseif($courseKey == "Written Communication"){
                $query = "SELECT `CourseID`,`CourseName`,`Credits` from `COURSE` where `CoursePrefix`='ENG' and `CourseNum` in(023,024,025) ORDER BY `CourseNum`;";
            }elseif($courseKey == "Mathematics"){
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
        	}elseif($courseKey == "II. E. Free Elective"){
                 $query = "SELECT * from `COURSE`;";
            }elseif($courseKey == "Natural Science with Lab"){
                 $query = "SELECT `CourseID`,`CourseName`,`Credits` from `COURSE` where (`CoursePrefix` IN ('AST','BIO','CHM','ENV','GEL','MAR','PHY') AND `Credits`=4) OR (`CoursePrefix`='GEG' and `CourseNum` in(040,322,323)) ORDER BY `CourseNum`;";
            }elseif($courseKey == "Writing Intensive"){
            		$query = "SELECT `CourseID`,`CourseName`,`Credits` from `COURSE` where `SuffixWI`;";
        	}elseif($courseKey == "QL or CP"){
            		$query = "SELECT `CourseID`,`CourseName`,`Credits` from `COURSE` where SuffixQL OR SuffixCP;";
            }elseif($courseKey == "VL or CM"){
            		$query = "SELECT `CourseID`,`CourseName`,`Credits` from `COURSE` where SuffixVL OR SuffixCM;";
            }elseif($courseKey == "Cultural Diversity"){
            		$query = "SELECT `CourseID`,`CourseName`,`Credits` from `COURSE` where SuffixCD;";
            }elseif($courseKey == "Critical Thinking"){
            		$query = "SELECT `CourseID`,`CourseName`,`Credits` from `COURSE` where SuffixCT;";
            }elseif($courseKey == "IV. A. 2. Elective"){
                 $query = "SELECT `CourseID`,`CourseName`,`Credits` from `COURSE` where (`CoursePrefix` IN ('AST','BIO','CHM','CSC','ENV','GEL','MAR','MAT','NSE','PHY')) OR (`CoursePrefix`='GEG' and `CourseNum` in(040,322,323)) ORDER BY `CourseNum`;";
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
            }elseif($courseKey == "BS CSC:IT Elective 1"){
            	$query = "SELECT `CourseID`,`CourseName`,`Credits` FROM `COURSE` WHERE `CoursePrefix`='CSC' AND `CourseNum`>200 AND `CourseNum` NOT IN(242,253,311,341,356,354,355,280,380) ORDER BY `CourseNum`;";
            }elseif($courseKey == "BS CSC:IT Elective 2"){
            	$query = "SELECT `CourseID`,`CourseName`,`Credits` FROM `COURSE` WHERE `CoursePrefix`='CSC' AND `CourseNum`>200 AND `CourseNum` NOT IN(242,253,311,341,356,354,355,280,380) ORDER BY `CourseNum`;";
            }elseif($courseKey == "BS CSC:IT Concomitant"){
            	$query = "SELECT `CourseID`,`CourseName`,`Credits` FROM `COURSE` WHERE `CoursePrefix`='MAT' AND `CourseNum`>104 ORDER BY `CourseNum`;";
            }elseif(($courseKey == "BS CSC:IT Internship") or ($courseKey == "BS CSC:SD Internship")){
            	$query = "SELECT `CourseID`,`CourseName`,`Credits` FROM `COURSE` WHERE `CoursePrefix`='CSC' AND `CourseNum` IN(280,380) ORDER BY `CourseNum`;";
            }elseif($courseKey == "MS CSC:IT Thesis"){
            	$query = "SELECT `CourseID`,`CourseName`,`Credits` FROM `COURSE` WHERE `CoursePrefix`='CSC' AND `CourseNum`=599;";
            }elseif($courseKey == "MS CSC:IT Elective"){
            	$query = "SELECT `CourseID`,`CourseName`,`Credits` FROM `COURSE` WHERE `CoursePrefix`='CSC' AND `CourseNum` IN(402,415,425,447,480,520,526,540,548,555,580) ORDER BY `CourseNum`;";
            }elseif(($courseKey == "CSC:IT Minor Elective 1") or ($courseKey == "CSC: SD Minor Elective 1")){
            	$query = "SELECT `CourseID`,`CourseName`,`Credits` FROM `COURSE` WHERE `CoursePrefix`='CSC' AND `CourseNum` BETWEEN 200 AND 500 ORDER BY `CourseNum`;";
            }elseif(($courseKey == "CSC:IT Minor Elective 2") or ($courseKey == "CSC: SD Minor Elective 2")){
            	$query = "SELECT `CourseID`,`CourseName`,`Credits` FROM `COURSE` WHERE `CoursePrefix`='CSC' AND `CourseNum` BETWEEN 300 AND 500 ORDER BY `CourseNum`;";
            }elseif($courseKey == "BS CSC:SD Elective"){
            	$query = "SELECT `CourseID`,`CourseName`,`Credits` FROM `COURSE` WHERE `CoursePrefix`='CSC' AND `CourseNum`>200 ORDER BY `CourseNum`;";
            }elseif($courseKey == "BS CSC:SD Concomitant"){
            	$query = "SELECT `CourseID`,`CourseName`,`Credits` FROM `COURSE` WHERE `CoursePrefix`='MAT' AND `CourseNum`>=181 ORDER BY `CourseNum`;";            
            }elseif($courseKey == "MS CSC:SD 400-Level"){
            	    $query = "SELECT `CourseID`,`CourseName`,`Credits` FROM `COURSE` WHERE (`CourseID`='CSC554') OR `CoursePrefix`='CSC' AND `CourseNum` BETWEEN 400 AND 500 ORDER BY `CourseNum`;";
            }elseif($courseKey == "MS CSC:SD 500-Level"){
            	    $query = "SELECT `CourseID`,`CourseName`,`Credits` FROM `COURSE` WHERE `CoursePrefix`='CSC' AND `CourseNum`>500 ORDER BY `CourseNum`;";
            }elseif($courseKey == ""){
            }elseif($courseKey == ""){
                $query = "";
            }elseif($courseKey == ""){
                $query = "select * from `COURSE` where 1=2;";
            }
            
            $results = DB::query($query);
            return $results;
            
        }
        /*Deletes a checksheet based on the student's ID and the checksheets AIDID*/
        public function deleteSavedChecksheet($ID, $checkID){
            $results = DB::delete('CHECKSHEETSAVE', "StudentID=%s and AIDID=%s", $ID,$checkID);

            return $results;
        }
        
	/*Changes the official checksheet and removes official bit from all of the other records for that student*/
	public function changeOfficialChecksheet($ID, $checkID){
		DB::update('CHECKSHEETSAVE', array('CheckSheetOfficial' => 0), "StudentId = %s", $ID);
        
		DB::update('CHECKSHEETSAVE', array('CheckSheetOfficial' => 1), "StudentId = %s AND AIDID = %i", $ID,$checkID);
        
    }
        
    /*Returns the XML from the DB based on the student or advisor ID but noone else */
    public function displaySaveFromCheck($ID, $AIDID){
        //checks if the user is the advisor
        if ($ID == "" || $ID == null || strlen($ID) == 8){
             $results = DB::query("SELECT SaveData FROM CHECKSHEETSAVE WHERE AIDID = %i;",$AIDID);
        }else{
            //person is a student
            $results = DB::query("SELECT SaveData FROM CHECKSHEETSAVE WHERE StudentId = %s and AIDID = %i;", $ID,$AIDID);
        }
        return $results;
    }
		
		/*Gets the official checksheet based on the student ID*/
		public function getOfficialChecksheet($ID){
			$results = DB::query("SELECT AIDID FROM CHECKSHEETSAVE WHERE StudentID = %s and CheckSheetOfficial = true;", $ID);
			return $results;
		}
        
        /*Select the students major based on the student ID*/
		public function grabUserMajor($ID){
			$results = DB::query("SELECT Major from STUDENT where StudentID = %s;", $ID);
		}
		
		/* Finds which checksheet to display according to the user ID.
			If they have an official checksheet, loads and displays that.
			If they don't have an official checksheet, displays their major's checksheet.
			If they don't have a major or it can't be found in the list of checksheets, displays the CSC IT checksheet.
			If they have an official checksheet but it cannot be associated with a checksheet file, displays an error
				stating that their official checksheet cannot be retrieved. */
		public function findChecksheetToDisplay($ID){
			
			//The below is no longer a horrible hack.
			$hasOfficalCheck = DB::query("SELECT CheckSheetId FROM CHECKSHEETSAVE WHERE StudentID = %s and CheckSheetOfficial = true;", $ID);
			if($hasOfficalCheck == null){
				//Since they've got no official checksheet to go on, grab their major.
				$major = "";
				$grabbedMajor = DB::query("SELECT Major from STUDENT where StudentID = %s;", $ID);
				foreach ($grabbedMajor as $row) {
				   $major = $row['Major'];
				}
				if($major == "CS: IT"){
					$results = "Checksheets/v1.1/min/cscITChecksheet.php";
				} else if($major == "CS: SD"){
					$results = "Checksheets/v1.1/min/cscSDChecksheet.php";
				} else{ //Default to IT checksheet if no valid results.
					$results = "Checksheets/v1.1/min/cscITChecksheet.php";
				}
			}else{
				foreach ($hasOfficalCheck as $row) {
					$checksheetMajor = $row['CheckSheetId'];
				}
				//Since we DO have an official checksheet, use that checksheet's ID to determine which file to display.
				if($checksheetMajor == "ULASCSCIT"){
					$results = "Checksheets/v1.1/min/cscITChecksheetSaved.php";
				}else if($checksheetMajor == "ULASCSCSD"){
					$results = "Checksheets/v1.1/min/cscSDChecksheetSaved.php";
				}else{ //Last ditch 'I don't know what happen' value - error page.
					$results = "error_bad_checksheet.html";
				}
			}
			return $results;
		}
		
        /*Searches for term schedule based on the checksheets ID*/
        public function termSearch($AIDID,$sID){
            $results = DB::query("SELECT ScheduleRaw  FROM CHECKSHEETSAVE WHERE AIDID = %s and StudentID = %s;", $AIDID, $sID);
            return $results;
        }
        
        /*Saves the specific terms HTML*/
        public function termSave($studentID,$classInfo,$AIDID){
             DB::query("SELECT AIDID FROM CHECKSHEETSAVE WHERE AIDID=%s", $AIDID);
            $counter = DB::count();
            
            if ($counter > 0){
                DB::query("UPDATE CHECKSHEETSAVE SET ScheduleRaw=%s WHERE AIDID=%s", $classInfo,$AIDID);
            } else{
                DB::update('CHECKSHEETSAVE', array('ScheduleRaw' => $classInfo), "AIDID=%i", $AIDID);
            }
            return true;
        }
        
        /*Show all of the saved checksheets for that specific student based on studnet ID */
        public function displaySave($ID){
              $results = DB::query("SELECT CheckSheetOfficial,CheckSheetID,Date,AIDID FROM CHECKSHEETSAVE WHERE StudentID = %s;", $ID);
            return $results;
        }
        
        /*Save the checksheet xml and number of credits, checks if info is already in the DB, if it is update it*/
        /*Returns the ID of inserted table*/
        public function saveChecksheet($ID,$xml,$chkID,$AIDID,$NumCredits){
            DB::query("SELECT AIDID FROM CHECKSHEETSAVE WHERE AIDID=%s", $AIDID);
            $counter = DB::count();
             $fancyID = $AIDID;
            if ($counter > 0){
                DB::query("UPDATE CHECKSHEETSAVE SET SaveData=%s, NumCredits =%i WHERE AIDID=%s", $xml,$NumCredits,$AIDID);
            } else{
            DB::insert('CHECKSHEETSAVE', array(
                          'StudentID' => $ID,
                          'CheckSheetID' => $chkID,
                            'SaveData' => $xml,
                            'NumCredits' => $NumCredits,
                            'Date' => DB::sqleval("NOW()")
                        ));
               $fancyID = DB::insertId();
            }
            return $fancyID;
        }
        
        /*Get the info about the user used for log in*/
        public function getUserInfo($ID){
            $results = DB::query("SELECT FirstName,LastName,Email,Major,StudentId as ID from STUDENT where StudentId = %s;", $ID);
            if($results == null){
                 $results = DB::query("SELECT FirstName,LastName,Email,FacultyID as ID from FACULTY where FacultyID = %s;", $ID);
            }
            return $results;
        }
        
        /*Seaches based on text for the textbox*/
        public function searchBoxQuery($searchParam){
            $results = DB::query("SELECT CourseID,CourseName,Credits,CourseNum FROM COURSE WHERE CourseID like %ss OR CourseName like %ss;", $searchParam,$searchParam);
            return $results;
        }
        
        /*Gets the courses based on the item select from the drop down menu*/
        public function searchByDept($searchParam){
            $results = DB::query("SELECT CourseID,CourseName,Credits, CourseNum FROM COURSE WHERE CoursePrefix= %s ORDER BY CourseNum,CourseName;", $searchParam);
            return $results;
        }
		
        /*verify user based on email and password*/
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
		
        /*Makes a user from validated user input*/
		function createUser($studentId, $email, $password, $firstName, $lastName, $major){
			DB::insert('STUDENT', array(
  			'StudentId' => $studentId,
  			'Email' => $email,
  			'Password' => $password,
  			'FirstName' => $firstName,
  			'LastName' => $lastName,
            'Major' => $major
			));
		}
		
        /*Compares password, one is hashed one is not, we hash the one and compare the hashes*/
		function verifyPassword($password, $hashedPassword) {
			// example call $logic -> verifyPassword("L33t",$hashedPassword);
            // echo crypt($password, $hashedPassword);
			
			if( crypt($password, $hashedPassword) == $hashedPassword){
                echo "true";
				return true;
			}else{
                echo "false";
				return false;
			}
		}
		
        /*Sets the session after they have been authenticated*/
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
		
        /*Creates hash of password with a salt*/
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
