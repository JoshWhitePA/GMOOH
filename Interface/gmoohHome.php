<!--
Author: Christopher Steckhouse
Contributors: Christian Carreras, Michael Para
File Name: gmoohHome.html
Date: 3/12/2016
Organization: CSC 355 GMOOH Interface Team
Kutztown University
Purpose: Home page for students.
-->

<?php 
	session_start();
	require("../PHPClasses/logic.class.php");
	if(!isset($_SESSION["loggedIn"]) || $_SESSION["loggedIn"] == false || $_SESSION["loggedIn"] == null){
	header('location: login.php');
	}	
	
	//This might be better off as its own script.
	$logic = new Logic();
	if(isset($_SESSION["userID"])){
		$userID = $_SESSION["userID"];
	}
	else{
		$userID = NULL;
	}
	$checkURL = $logic->findChecksheetToDisplay($userID);
	
	$major = $logic->grabUserMajor($userID);
	$rawAIDID = $logic->getOfficialChecksheet($userID);
	$AIDID = "";
	foreach ($rawAIDID as $row) {
        $AIDID = $row["AIDID"];
    }
	//Concatinates the variables to the page address so that it can be displayed.
	$checksheet = $checkURL . "?AIDID=" . $AIDID ;	
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Your Official Checksheet</title>
		<link rel = "stylesheet" type = "text/css" href = "Styles/gmoohMasterStyle.css"/>	
	        <link rel = "stylesheet" type = "text/css" href = "//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.min.css">
		<script src = "Scripts/jquery-1.12.0.min.js"></script>
		<script>
			//The below operates thanks to JQuery using Monads. 
			//These allow dynamically calling functions on the returns of other functions.
			$(document).ready(function(){
				$("#master").load("MasterPages/masterPage.html", function() {
					$("#mainSection").append("<div id ='innerSection' class ='innerSection'></div>");
					$("#innerSection").load(<?php echo json_encode($checksheet); ?>, function() { //Appends the checksheet from the PHP logic.
						$('#section :input').attr('readonly', true); //Makes all input fields read-only
						//Append a style into the checksheet to disable certain UI-related highlights.
						$('#styleJack').append("th a:hover, .dropdownSection:hover .dropButtonNotes {"
							+ "opacity: 1;"
							+ "}"
							+ "th.dropdownSection {"
							+ "cursor: default;"
							+ "}"
						);
					}); 
				});
			});
		</script>
	</head>
	<body id = "master"> 
	</body>
</html>
