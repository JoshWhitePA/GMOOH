<?php
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
        $AIDID=null;
        if(empty($_POST['AIDID'])){
           $AIDID =-1;
        }else{
            $AIDID=$_POST['AIDID'];
        }
        $logic = new Logic();
        $result = $logic->saveChecksheet($_SESSION["userID"],$_POST['Save'],$_POST['id'],$AIDID);
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

?>


