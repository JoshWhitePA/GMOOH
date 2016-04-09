<?php
    session_start();
    require("../../PHPClasses/logic.class.php");
    if(isset($_GET['search']) && $_GET['search'] != "" && $_GET['search'] != " "){
        $logic = new Logic();
        $searchTxt = $_GET['search'];
        $results = $logic->searchBoxQuery($searchTxt);
        foreach ($results as $row) {
		  echo "<div class = 'courseBox' style = 'font-weight: bold' title = '" . $row['CourseID'] . " " . $row['CourseName'] . "'>" . $row['CourseID'];
          echo "<b> " . $row['CourseName'] . "</b></div>";
        }
        
       
        echo "";

    }

     
 if(isset($_GET['deptSearch']) && $_GET['deptSearch'] != "" && $_GET['deptSearch'] != " ") {	
	$i = 1;
	$logic = new Logic();
	$searchTxt = $_GET['deptSearch'];
	//echo $searchTxt;
	$results = $logic->searchByDept($searchTxt);
	foreach ($results as $row) {
		echo "<div id = 'deptCourse" . $i . "' class = 'courseBox' style = 'font-weight: bold' title = '" . $row['CourseID'] . " " . $row['CourseName'] . "'>" . $row['CourseID'];
		echo "<b> " . $row['CourseName'] . "</b></div>";
		$i = $i + 1;
	}
    echo "";    
}
    
 if(isset($_GET['Save']) && $_GET['Save'] != "" && $_GET['Save'] != " "){
        $logic = new Logic();
        $result = $logic->saveChecksheet($_SESSION["userID"],$_GET['Save'],$_GET['id']);
    }
    
        
?>


