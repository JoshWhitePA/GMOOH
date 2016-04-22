<?php 
session_start();
    require("../../PHPClasses/logic.class.php");
    $logic = new Logic();
	if(isset($_SESSION["userID"])){
		$userID = $_SESSION["userID"];
	}
	else{
		$userID = NULL;
	}
	$results = $logic->getUserInfo($userID);
    $name = "";
    foreach ($results as $row) {
       $name = $row['FirstName'];
       $name .= " " . $row['LastName'];
    }
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Welcome to GMOOH</title>
		<link rel = "stylesheet" type = "text/css" href = "Styles/gmoohMasterStyle.css"/>
		<script src = "Scripts/jquery-1.12.0.min.js"></script>
		<script>
			$(document).ready(function(){
				if($(window).width() >= 966) {
					$("#master").css("min-height", window.innerHeight);
					$("#master").css("min-width", window.innerWidth);
					$("#header").css("min-width", window.innerWidth);
					$("#headerBar").css("min-width", window.innerWidth);
					$("#background").css("min-width", window.innerWidth);
					$("#footer").css("min-width", window.innerWidth);
				}
			});
		</script>
	</head>
	<body>	
		<div id = "header" class = "mainHeader">Welcome <?php echo json_encode($name); ?> (<a class = "logout" href = "logout.php">Log out</a>)</div>
		<div class = "newSection"></div>
		<div id = "headerBar" class = "headerBar">
			<a href = "advisor_home.php"><img src = "Images/gmoohLogo.png" class = "logo"/></a>
			<div class = "menu">
				<ul>
					<li><a class = "active verticalAlign" href = "advisor_home.php">Home</a></li>
					<li class = "dropdown">
						<a class = "dropButton verticalAlign" href = "account.php">Account</a>
						<div class= "dropdownContent">
							<a href= "account.php">View Your Account</a>
							<a href= "changePassword.php">Change Your Password</a>
						</div>
					</li>
					<li><a class = "active verticalAlign" href = "help.php">Help</a></li>
				<ul>
			</div>
		</div>
		<div class = "newSection"></div>
		<div id = "background" class = "background">
			<div id = "leftSave" class = "leftViewSaved"></div>
			<div id = "left" class = "leftSection"></div>
			<div id = "mainSection" class = "mainSection"></div>
			<div id = "right" class = "rightSection"></div>
			<div id = "rightSave" class = "rightViewSaved"></div>
		</div>	
		<div class = "newSection"></div>
		<div id = "footer" class = "footer">
			<div class = "verticalAlign">&copy; copyright 2016 Kutztown University</div>
		</div>
	</body>
</html>
