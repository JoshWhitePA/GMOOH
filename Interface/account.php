<?php
    require_once("../PHPClasses/logic.class.php");	
	$logic = new Logic();
    session_start();
    $results = $logic->getUserInfo($_SESSION['ID']);
    $name = "";
    $ID = "";//could get from session but I want to keep data source the same.
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
		<title>Your Account</title>
		<link rel = "stylesheet" type = "text/css" href = "Styles/gmoohMasterStyle.css"/>
		<link rel="stylesheet" type="text/css" href="spork.css" />
		<script src = "Scripts/jquery-1.12.0.min.js"></script>
		<script>
			$(document).ready(function(){
				$("#master").load("MasterPages/masterPage.html", function() {
					$("#mainSection")
						.append("<div class = 'boxed'>"
							+ "<table class = 'tableCenter' >"
							+ "<tr><td class = 'labelAlign' >Name:</td><td class = 'paddedTD'><span class = 'box'><?php echo $name; ?></span></td></tr>"
							+ "<tr><td class = 'labelAlign' >Student/Faculty ID:</td><td class = 'paddedTD'><span class = 'box'><?php echo $ID; ?></span></td></tr>"
							+ "<tr><td class = 'labelAlign' >Email:</td><td class = 'paddedTD'><span class = 'box'><?php echo $email; ?></span></td></tr>"
							+ "</table>"
							+ "<p><a href = 'changePassword.php'>Change your password</a></p></div>");
				});
			});
		</script>
	</head>
	<body id = "master">
	</body>
</html>
