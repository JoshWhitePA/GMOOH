<?php
class Chksheet
  {

    public function displayRow($classID, $classDesc, $classGrade){
      echo '<tr><td>'. $classID .'</td><td>' . $classDesc . '</td><td>' . $classGrade . '</td></tr>';
    }
	
	 function displayGenReqs($idx, $Dept, $ClassNo, $LowRange, $HighRange) {
				echo $Dept[$idx] . " "; 
				if(!is_null($ClassNo[$idx])){
					echo $ClassNo[$idx] . " ";
				} elseif(!is_null($HighRange[$idx])){
					echo $LowRange[$idx] . " - " . $HighRange[$idx];
				} else{
					echo $LowRange[$idx] . " or Above.";
				}
    } 

  }



?>