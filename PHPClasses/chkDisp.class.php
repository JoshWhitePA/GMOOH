<?php
class Chksheet {
  	
  	function __construct() {
  		require_once 'meekrodb.2.3.class.php';
       	DB::$user = 'jwhit159';
		DB::$password = '';
		DB::$dbName = 'jwhit159_bookstore';
   }
   		#call where you want class reqs to display in gen ed page
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