<!--
* Author:			Christian Carreras
* File Name:		editOfficialChecksheet.php
* Date:				04/04/2016
* Company:			CSC 355 GMOOH
* Organization:		Kutztown University of Pennsylvania
* Purpose:			This page was meant to let the student view and edit their
					official checksheet. As of the final edition this page is
					deprecated and will not be supported until any continuance
					of the system. To edit their official checksheet the user
					has to travel the the view saved checksheets page, find
					their official checksheet and load it.
-->

<?php 
	session_start();
	if(!isset($_SESSION["loggedIn"]) || $_SESSION["loggedIn"] == false || $_SESSION["loggedIn"] == null){
	header('location: login.php');
	}	
	
	$userMaster = "";
	$userIsStudent = true;
	if(isset($_SESSION["facID"])){
		$userMaster = "MasterPages/advisorMasterPage.html";
		$userIsStudent = false;
	}
	else{
		$userMaster = "MasterPages/masterPage.html";
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Create New Checksheet</title>
		<link rel = "stylesheet" type = "text/css" href = "Styles/gmoohMasterStyle.css"/>
		<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.min.css">
		<script src = "Scripts/jquery-1.12.0.min.js"></script>
		<script src = "Scripts/prototypeChecksheet.js"></script>
		<script>
			$(window).load(function() {
				$(".blank").show();
				$(document).ready(pageLoad(false, <?php echo json_encode($userIsStudent); ?>));
				$(".blank").delay(500).fadeOut(1000);
			});	
		</script>
	</head>
	<body id = "behindTheScenes">
		<div class = 'blank'><div class = "loadingImg"></div><div class = "loadingText">Loading</div></div>
		<div id = "master" class = "pageBody"></div>
	</body>
</html>
