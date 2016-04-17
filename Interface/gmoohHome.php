<?php 
	session_start();
	require("../PHPClasses/logic.class.php");
	if(!isset($_SESSION["loggedIn"]) || $_SESSION["loggedIn"] == false || $_SESSION["loggedIn"] == null){
	header('location: login.php');
	}	
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Your Official Checksheet</title>
		<link rel = "stylesheet" type = "text/css" href = "Styles/gmoohMasterStyle.css"/>	
	        <link rel = "stylesheet" type = "text/css" href = "//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.min.css">
		<script src = "Scripts/jquery-1.12.0.min.js"></script>
	        <script src = "Scripts/HomeViewChecksheet.js"></script>
		<script>
			/*
			$(document).ready(function(){
				$("#master").load("MasterPages/masterPage.html", function() {
					$("#mainSection").append("<div id ='innerSection' class ='innerSection'></div>");
					$("#innerSection").load("Checksheets/v1.1/min/cscITChecksheetDisplay.php"); 
				});
			});
			*/

			$(window).load(function() {
				$(".blank").show();
				$(document).ready(pageLoad(false));
				$(".blank").delay(500).fadeOut(1000);
			});	
			
		</script>
	</head>
	<body id = "behindTheScenes"> 
	     <div class = 'blank'><div class = 'loadingImg'></div><div class = 'loadingText'>Loading</div></div>
	     <div id = "master" class = 'pageBody'></div> 
	</body>
</html>
