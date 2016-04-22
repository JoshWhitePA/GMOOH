<?php


    function stripInvalidXml($value) {
        $ret = "";
        $current;
        if (empty($value)) {
            return $ret;
        }
        $length = strlen($value);
        for ($i=0; $i < $length; $i++) {
            $current = ord($value{$i});
            if (($current == 0x9) || ($current == 0xA) || ($current == 0xD) || (($current >= 0x20) && ($current <= 0xD7FF)) || (($current >= 0xE000) && ($current <= 0xFFFD)) || (($current >= 0x10000) && ($current <= 0x10FFFF))) {
                    $ret .= chr($current);
            }
            else {
                $ret .= "";
            }
        }
        return $ret;
    }

    $i = 1;
    session_start();
    require("../../PHPClasses/logic.class.php");
    if(isset($_GET['search']) && $_GET['search'] != "" && $_GET['search'] != " "){
        $logic = new Logic();
        $searchTxt = $_GET['search'];
        $results = $logic->searchBoxQuery($searchTxt);
        foreach ($results as $row) {
			echo "<div  class = 'courseBox' style = 'font-weight: bold'>";
			echo "<span id = 'searchCourse" . $i . "' style = 'white-space: nowrap'>" . $row['CourseID'];
			echo "<b> " . $row['CourseName'] . "</b></span></div>";
			$i = $i + 1;
        }
        echo "<script>makeDeptSpansDraggable();</script>"; 
    }
     
	if(isset($_GET['deptSearch']) && $_GET['deptSearch'] != "" && $_GET['deptSearch'] != " ") {	
		$i = 1;
		$logic = new Logic();
		$searchTxt = $_GET['deptSearch'];
		//echo $searchTxt;
		$results = $logic->searchByDept($searchTxt);
		foreach ($results as $row) {
			echo "<div  class = 'courseBox' style = 'font-weight: bold'>";
			echo "<span id = 'deptCourse" . $i . "' style = 'white-space: nowrap'>" . $row['CourseID'];
			echo "<b> " . $row['CourseName'] . "</b></span></div>";
			$i = $i + 1;
		}
		echo "<script>makeDeptSpansDraggable();</script>";    
	}
    
	if(isset($_POST['Save']) && $_POST['Save'] != "" && $_POST['Save'] != " "){
//        echo $_POST['NumCredits'];
        $AIDID=null;
        if(empty($_POST['AIDID'])){
           $AIDID =-1;
        }else{
            $AIDID=$_POST['AIDID'];
        }
        $logic = new Logic();
        $result = $logic->saveChecksheet($_SESSION["userID"],preg_replace('/&(?!#?[a-z0-9]+;)/', '&amp;',$_POST['Save']),$_POST['id'],$AIDID, $_POST['NumCredits']);
        echo $result;
    }    

    
         
    if(isset($_GET['AIDID']) && $_GET['AIDID'] != "" && $_GET['AIDID'] != " "){
     $logic = new Logic();
     $termTxt = $_GET['AIDID'];
 
     $results = $logic->termSearch($termTxt ,$_SESSION["userID"]);
     foreach ($results as $row) {
           echo $row['ScheduleRaw'];
         
         }
//      echo "";
     
 }
 
// if(isset($_GET['classInfo']) && $_GET['classInfo'] != "" && $_GET['classInfo'] != " "){
 if(isset($_POST['classInfo']) && $_POST['classInfo'] != "" && $_POST['classInfo'] != " "){
     $logic = new Logic();
     $results = $logic->termSave($_SESSION["userID"],$_POST['classInfo'],$_POST['AIDID']);
 
 }


    if(isset($_GET['delID']) && $_GET['delID'] != "" && $_GET['delID'] != " "){
     $logic = new Logic();
     $results = $logic->deleteSavedChecksheet($_SESSION["userID"],$_GET['delID']);
 
 }
 if(isset($_GET['offID']) && $_GET['offID'] != "" && $_GET['offID'] != " "){
     $logic = new Logic();
     $results = $logic->changeOfficialChecksheet($_SESSION["userID"],$_GET['offID']);
 
 }

?>


