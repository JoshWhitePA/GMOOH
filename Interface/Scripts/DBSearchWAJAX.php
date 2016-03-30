<?php
    require("../../PHPClasses/logic.class.php");
    if(isset($_GET['search']) && $_GET['search'] != "" && $_GET['search'] != " "){
        $logic = new Logic();
        $searchTxt = $_GET['search'];
        $results = $logic->searchBoxQuery($searchTxt);
        foreach ($results as $row) {
          echo "<span>CourseName: " . $row['CourseName'] . "</span>";
          echo "<span>CourseID: " . $row['CourseID'] . "</span";
          echo "<span>Credits: " . $row['Credits'] . "</span>";
        }
        echo "";

    }
?>


