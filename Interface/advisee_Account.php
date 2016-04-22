<?php
    require_once("../PHPClasses/logic.class.php");	
	$logic = new Logic();
    session_start();
    $results = $logic->getStudentInfo($_POST['StudentID']);
    $name = "";
    $ID = "";
    $major = "";
    $email = "";
    foreach ($results as $row) {
       $name = $row['FirstName'];
       $name .= " " . $row['LastName'];
       $ID = $row['StudentId'];
       $major = $row['Major'];
       $email = $row['Email'];
        
       
    }
?> 
<!DOCTYPE html>
<html>
	<head>
		<title>Advisee Account</title>
		<link rel = "stylesheet" type = "text/css" href = "Styles/gmoohMasterStyle.css"/>
		<script src = "Scripts/jquery-1.12.0.min.js"></script>
		<script>
			$( document ).ready(function() {
				$("#master").load("MasterPages/advisorMasterPage.php", function() {
					
                    $("#mainSection").append("<div class = 'boxed'>"
							+ "<form method='post' id='adviseeInfo'>"
							+ "<table class = 'tableCenter' >"
							+ "<tr><td class = 'labelAlign' >Name:</td><td class = 'dataTD'><span class = 'box'><?php echo $name; ?></span></td></tr>"
							+ "<tr><td class = 'labelAlign' >Student ID:</td><td class = 'dataTD'><span class = 'box'><?php echo $ID; ?></span></td></tr>"
							+ "<tr><td class = 'labelAlign' >Major:</td><td class = 'dataTD'><span class = 'box'><?php echo $major; ?></span></td></tr>"
							+ "<tr><td class = 'labelAlign' >Email:</td><td class = 'dataTD'><span class = 'box'><?php echo $email; ?></span></td></tr>"
							+ "</table><input type='hidden' name='StudentID' id='<?php echo $ID; ?>' value='<?php echo $ID; ?>' />"
							+ "<input type='button' value='ViewStudentChecksheet' name='viewChecksheet' onclick=' goViewChecksheet();'>"
							+ "<input type='button' value='ViewStudentProgress' name='viewProgress' onclick=' goViewProgress();'>"
							+ "</form></div>")
                });  
			
            });
		<!--
			function goViewChecksheet()
			{
				document.getElementById("adviseeInfo").action = "advisorViewChecksheet.php" //change the form's action
				document.getElementById("adviseeInfo").submit();               // Submit the page
				return true;
			}

			function goViewProgress()
			{
				document.getElementById("adviseeInfo").action = "progress.php"
				document.getElementById("adviseeInfo").submit();             // Submit the page
				return true;
			}
            
		</script>
	</head>
	<body id = "master">
	</body>
</html>
