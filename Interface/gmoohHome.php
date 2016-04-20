<?php 
	session_start();
	require("../PHPClasses/logic.class.php");
	if(!isset($_SESSION["loggedIn"]) || $_SESSION["loggedIn"] == false || $_SESSION["loggedIn"] == null){
	header('location: login.php');
	}	
	
	//This should eventually be rolled into its own script.
	$logic = new Logic();
	if(isset($_SESSION["userID"])){
		$userID = $_SESSION["userID"];
	}
	else{
		$userID = NULL;
	}
	$checkURL = $logic->findChecksheetToDisplay($userID);
	
	$major = $logic->grabUserMajor($userID);
	$AIDID = $logic->getOfficialChecksheet($userID);
	//CONCAT THE VARIBLES TO THE PAGE ADDRESS!
	$checksheet = $checkURL . "&AIDID=" . $AIDID //format help remove when sure it works: &chkID=ULASCSCIT&AIDID=119
	
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
				$("#master").load("MasterPages/masterPage.html", function() {
					$("#mainSection").append("<div id ='innerSection' class ='innerSection'></div>");
					$("#innerSection").load(<?php echo json_encode($checksheet); ?>); 
				});
			});
		</script>
	</head>
	<body id = "master"> 
	</body>
</html>
