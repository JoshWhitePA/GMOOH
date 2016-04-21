<?php
    require_once("../PHPClasses/logic.class.php");	
    session_start();

	if(!isset($_SESSION["loggedIn"]) || $_SESSION["loggedIn"] == false || $_SESSION["loggedIn"] == null){
	header('location: login.php');
	}	
	
	$logic = new Logic();
	if(isset($_SESSION["userID"])){
		$userID = $_SESSION["userID"];
	}
	else{
		$userID = NULL;
	}
    $results = $logic->getUserInfo($userID);
    $name = "";
    $ID = "";//could get from session but I want to keep data source the same.
    $email = "";
    $major = "";
    foreach ($results as $row) {
       $name = $row['FirstName'];
       $name .= " " . $row['LastName'];
       $ID = $row['ID'];
       $email = $row['Email'];
       $major = $row['Major'];
    }
	
	$userMaster = "";
	if(isset($_SESSION["facID"])){
		$userMaster = "MasterPages/advisorMasterPage.html";
	}
	else{
		$userMaster = "MasterPages/masterPage.html";
		var $row = document.getElementById(majorRow);
		$row.style.display = 'none';
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
				$("#master").load(<?php echo json_encode($userMaster); ?>, function() {
					$("#mainSection")
						.append("<div class = 'boxed'>"
							+ "<table class = 'tableCenter' >"
							+ "<tr><td class = 'labelAlign' >Name:</td><td class = 'dataTD'><span class = 'box'><?php echo $name; ?></span></td></tr>"
							+ "<tr><td class = 'labelAlign' >Student/Faculty ID:</td><td class = 'dataTD'><span class = 'box'><?php echo $ID; ?></span></td></tr>"
							+ "<tr><td class = 'labelAlign' >Email:</td><td class = 'dataTD'><span class = 'box'><?php echo $email; ?></span></td></tr>"
							+ "<tr id = 'majorRow'><td class = 'labelAlign' >Major:</td><td class = 'dataTD'><span class = 'box'><?php echo $major; ?></span></td></tr>"
							+ "</table>"
							+ "<p><a href = 'changePassword.php'>Change your password</a></p></div>");
				});
			});
		</script>
	</head>
	<body id = "master">
	</body>
</html>
