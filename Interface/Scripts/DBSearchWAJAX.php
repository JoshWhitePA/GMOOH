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
    
	if(isset($_GET['Save']) && $_GET['Save'] != "" && $_GET['Save'] != " "){
        $logic = new Logic();
        $result = $logic->saveChecksheet($_SESSION["userID"],$_GET['Save'],$_GET['id']);
        echo $_GET['Save'];
    }    

    
         
    if(isset($_GET['termSearch']) && $_GET['termSearch'] != "" && $_GET['termSearch'] != " "){
     $logic = new Logic();
     $termTxt = $_GET['termSearch'];
 
     $results = $logic->termSearch($termTxt ,$_SESSION["userID"]);
     foreach ($results as $row) {
           echo '<span>'. $row['ClassInfo']. '</span><br/>';
         
         }
      echo "";
     
 }
 
 if(isset($_GET['classInfo']) && $_GET['classInfo'] != "" && $_GET['classInfo'] != " "){
     $logic = new Logic();
     $results = $logic->termSave($_SESSION["userID"],$_GET['classInfo'],$_GET['currentTerm']);
 
 }
?>


