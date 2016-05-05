<!--
* Author:			Christian Carreras
* Contributor(s):	Josh White
* File Name:		joshsTestChecksheet.php
* Date:				04/04/2016
* Company:			CSC 355 GMOOH
* Organization:		Kutztown University of Pennsylvania
* Purpose:			This page's name is not accurate as it is no longer a test
					page used by Josh. It is a page formally used by the system.
					When a user goes to their saved checksheets page and selects
					a checksheet to load, this page will be called to load
					the user's saved checksheet.
-->

<?php
$page = $_GET["pae"];
$chkID = $_GET["chkID"];
$AIDID = $_GET["AIDID"];
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Create New Checksheet</title>
		<link rel = "stylesheet" type = "text/css" href = "Styles/gmoohMasterStyle.css"/>
		<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.min.css">
		<script src = "Scripts/jquery-1.12.0.min.js"></script>
		<script src = "Scripts/joshsTestScript.js"></script>
		<script>
			//Load the the master page into the page
			$(window).load(function() {
				//Show the loading cat until the page is done loading
				$(".blank").show();
				//Load all functionality into the page
				$(document).ready(pageLoad(false));
				$(".blank").delay(500).fadeOut(1000); //Goodbye cat
			});	
            var lPage = '<?php echo $page; ?>';
            var chkID = '<?php echo $chkID; ?>';
            var AIDID = '<?php echo $AIDID; ?>';
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
