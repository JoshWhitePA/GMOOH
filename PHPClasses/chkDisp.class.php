<?php
class Chksheet {
  	//global instance of these classes
	
  	function __construct() {
  		require_once 'meekrodb.2.3.class.php';
  		session_start();
  		
   }
   
    public function displayRow($classID, $classDesc, $classGrade){
      echo '<tr><td>'. $classID .'</td><td>' . $classDesc . '</td><td>' . $classGrade . '</td></tr>';
    }
	
      function displaySingleRecs($SecID,$PosID){
		$select = "select Dept, ClassNo, LowRange, HighRange 
					from PID p
					INNER JOIN Restrictions r
					ON p.CompID = r.CompID
					where SecID = '". $SecID ."' and PosID = '" . $PosID ."' ";
	
		$results = DB::query($select);
		foreach ($results as $row) {
			$Dept = $row["Dept"];
			$ClassNo = $row["ClassNo"];
			$LowRange = $row["LowRange"];
			$HighRange = $row["HighRange"];
			if(!is_null($HighRange) || !is_null($ClassNo) || $LowRange != 0){
				echo $Dept . ": "; 
			}
				if(!is_null($ClassNo)){
					echo $ClassNo . " ";
				} elseif(!is_null($HighRange)){
					echo $LowRange . " - " . $HighRange;
				}
				 elseif(is_null($HighRange) && is_null($ClassNo) && $LowRange == 0){
					echo "Any $Dept Course";
				}
				else{
					echo $LowRange . " or Above.";
				}
		}
      }
     

}
?>