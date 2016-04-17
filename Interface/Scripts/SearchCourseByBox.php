<?php
     session_start();
    require("../../PHPClasses/logic.class.php");

    if(isset($_POST['courseKey']) && $_POST['courseKey'] != "" && $_POST['courseKey'] != " "){
        $logic = new Logic();
        $courseKey = $_POST['courseKey'];
        $results = $logic->searchBasedOnKey($courseKey);
        $i = 3000;
        foreach ($results as $row) {
			echo "<div  class = 'courseBox' style = 'font-weight: bold'>";
			echo "<span class='ui-draggable-handle' id = 'searchCourse" . $i . "' style = 'white-space: nowrap'>" . $row['CourseID'];
			echo "<b> " . $row['CourseName'] . "</b></span></div>";
			$i = $i + 1;
        }
//        echo "<script>makeDeptSpansDraggable();</script>"; 
    }


?>