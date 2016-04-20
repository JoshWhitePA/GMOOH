<?php 
	session_start();
	require("../PHPClasses/logic.class.php");
	if(!isset($_SESSION["loggedIn"]) || $_SESSION["loggedIn"] == false || $_SESSION["loggedIn"] == null){
	header('location: login.php');
	}	
	
	//This should eventually be rolled into its own script.
	$logic = new Logic();
	if(isset($_POST["StudentID"])){
		$userID = $_POST["StudentID"];
	}
	else{
		$userID = NULL;
	}
	$checkURL = $logic->findChecksheetToDisplay($studentID);
	
	$major = $logic->grabUserMajor($studentID);
	$rawAIDID = $logic->getOfficialChecksheet($studentID);
	$AIDID = "";
	foreach ($rawAIDID as $row) {
        $AIDID = $row["AIDID"];
    }
	//CONCAT THE VARIBLES TO THE PAGE ADDRESS!
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
			$(document).ready(function(){
				$("#master").load("MasterPages/advisorMasterPage.php", function() {
					$("#mainSection").append("<div id ='innerSection' class ='innerSection'></div>");
					$("#innerSection").load(<?php echo json_encode($checksheet); ?>, function() {
						$('#section :input').attr('readonly', true);
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
