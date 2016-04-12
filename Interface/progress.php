<?php 
	session_start();
	if(!isset($_SESSION["loggedIn"]) || $_SESSION["loggedIn"] == false || $_SESSION["loggedIn"] == null){
	header('location: login.php');
	}	
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Your Progress</title>
		<link rel = "stylesheet" type = "text/css" href = "Styles/gmoohMasterStyle.css"/>	
		<script src = "Scripts/jquery-1.12.0.min.js"></script>
		<script>
			$(document).ready(function(){
				$("#master").load("MasterPages/masterPage.html", function() {
					$("#left").css("visibility", "visible");
					$("#right").css("visibility", "visible");
				});
			});
		</script>
	</head>
	<body id = "master">
	</body>
</html>
