<?php
    session_start();
    require("../../PHPClasses/logic.class.php");
    if(isset($_GET['search']) && $_GET['search'] != "" && $_GET['search'] != " "){
        $logic = new Logic();
        $searchTxt = $_GET['search'];
        $results = $logic->searchBoxQuery($searchTxt);
        foreach ($results as $row) {
          echo "<span>CourseName: " . $row['CourseName'] . "</span>";
          echo "<span>CourseID: " . $row['CourseID'] . "</span";
          echo "<span>Credits: " . $row['Credits'] . "</span>";
          echo "<span> CourseNum: " . $row['CourseNum'] . "</span><br>";
        }
        
       
        echo "";

    }

     
 if(isset($_GET['deptSearch']) && $_GET['deptSearch'] != "" && $_GET['deptSearch'] != " "){
        $logic = new Logic();
        $searchTxt = $_GET['deptSearch'];
//     echo $searchTxt;
        $results = $logic->searchByDept($searchTxt);
        foreach ($results as $row) {
          echo "<span>CourseName: " . $row['CourseName'] . "</span>";
          echo "<span>CourseID: " . $row['CourseID'] . "</span";
          echo "<span>Credits: " . $row['Credits'] . "</span>";
          echo "<span> CourseNum: " . $row['CourseNum'] . "</span><br>";
        }
     echo "";
     
    }
    
 if(isset($_GET['Save']) && $_GET['Save'] != "" && $_GET['Save'] != " "){
        $logic = new Logic();
        $result = $logic->saveChecksheet($_SESSION["userID"],$_GET['Save'],$_GET['id']);
    }

if(isset($_GET['termSearch']) && $_GET['termSearch'] != "" && $_GET['termSearch'] != " "){
    $logic = new Logic();
    $termTxt = $_GET['termSearch'];

    $results = $logic->termSearch($termTxt ,$_SESSION["userID"]);
    foreach ($results as $row) {
          echo '<div id="draggableCourse" class="courseBox"><span>'. $row['ClassPrefix']." ". $row['ClassNum'] . '</span></div><br/>';
        
        }
     echo "";
    
}
//if(isset($_GET['termSearch']) && $_GET['termSearch'] != "" && $_GET['termSearch'] != " "){
//    $logic = new Logic();
//    $termTxt = $_GET['termSearch'];
//    
//    $results = $logic->termSearch($term,$_SESSION["userID"]);
//    foreach ($results as $row) {
//          echo "<span>ClassID: " . $row['ClassID'] . "</span>";
//        }
//     echo "";
//    
//}
        
?>


