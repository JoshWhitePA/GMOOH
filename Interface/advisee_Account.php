<?php
    require_once("../PHPClasses/logic.class.php");	
	$logic = new Logic();
    session_start();
    $results = $logic->getUserInfo($_SESSION['userID']);
    $name = "";
    $ID = "";
    $email = "";
    foreach ($results as $row) {
       $name = $row['FirstName'];
       $name .= " " . $row['LastName'];
       $ID = $row['ID'];
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
			$(document).ready(function(){
				$("#master").load("MasterPages/advisorMasterPage.html", function() {
					$("#mainSection")
						.append("<div class = 'boxed'>"
							+ "<form method='post' id='adviseeInfo'>"
							+ "<table class = 'tableCenter' >"
							+ "<tr><td class = 'labelAlign' >Name:</td><td class = 'dataTD'><span class = 'box'><?php echo $_POST["name"]; ?></span></td></tr>"
							+ "<tr><td class = 'labelAlign' >Student ID:</td><td class = 'dataTD'><span class = 'box'><?php echo $_POST["ID"]; ?></span></td></tr>"
							+ "<tr><td class = 'labelAlign' >Email:</td><td class = 'dataTD'><span class = 'box'><?php echo $_POST["email"]; ?></span></td></tr>"
							+ "</table>"
							+ "<input type="button" value="View Student Checksheet" name="viewChecksheet" onclick="return goViewChecksheet();">"
							+ "<input type="button" value="View Student Progress" name="viewProgress" onclick="return goViewProgress();">"
							+ "</form></div>"
				});    //once we get around to building the scheduler page, I'll change the function to point there, for now it points to the progress page for the sake of testing
			});
		<!--
			function goViewChecksheet()
			{
				document.adviseeInfo.action = "gmoohHome.php" //change the form's action
				document.adviseeInfo.submit();               // Submit the page
				return true;
			}

			function goViewProgress()
			{
				document.adviseeInfo.action = "progress.php"
				document.adviseeInfo.submit();             // Submit the page
				return true;
			}
		</script>
	</head>
	<body id = "master">
	</body>
</html>
