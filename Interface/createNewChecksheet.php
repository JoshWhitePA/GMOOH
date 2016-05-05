<!--
* Author:			Christian Carreras
* File Name:		createNewChecksheet.php
* Date:				04/04/2016
* Company:			CSC 355 GMOOH
* Organization:		Kutztown University of Pennsylvania
* Purpose:			This page will display everthing necessary for the user to
					create a new checksheet and modify however they wish. This
					page handles none of the actual functions but starts the
					pageLoad function in prototypeChecksheet.js to create all
					the functionality for the page.
-->

<?php 
	//Check to see if the user is logged in first before loading the page
	//If the user is not logged in reroute them to the login page
	session_start();
	if(!isset($_SESSION["loggedIn"]) || $_SESSION["loggedIn"] == false || $_SESSION["loggedIn"] == null){
	header('location: login.php');
	}	
	
	$userMaster = "";
	$userIsStudent = true;
	//If the user is an advisor, use the master page for advisors
	if(isset($_SESSION["facID"])){
		$userMaster = "MasterPages/advisorMasterPage.html";
		$userIsStudent = false;
	} //Else use the master page for students
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
			//Load the the master page into the page
			$(window).load(function() {
				//Show the loading cat until the page is done loading
				$(".blank").show();
				//Load all functionality into the page
				$(document).ready(pageLoad(true, <?php echo json_encode($userIsStudent); ?>));
				$(".blank").delay(500).fadeOut(1000); //Goodbye cat
			});	
            var AIDID = null;
		</script>
	</head>
	<!-- User will mostly be unaware of this but it is key to functionality -->
	<body id = "behindTheScenes">
		<!-- Hide the cat until I say so.. which will be when the page loads -->
		<div class = 'blank'><div class = "loadingImg"></div><div class = "loadingText">Loading</div></div>
		<!-- Will hold most of what the user sees -->
		<div id = "master" class = "pageBody"></div>
	</body>
</html>