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
	$checksheet = $logic->findChecksheetToDisplay($userID);
	
	$major = $logic->grabUserMajor($_SESSION["userID"]);
	
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Your Official Checksheet</title>
		<link rel = "stylesheet" type = "text/css" href = "Styles/gmoohMasterStyle.css"/>	
	        <link rel = "stylesheet" type = "text/css" href = "//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.min.css">
		<script src = "Scripts/jquery-1.12.0.min.js"></script>
		<script>
			
			$.post( "./Scripts/DBSearchWAJAX.php", { id: chkID, Save: xmlSaveData, AIDID:AIDID })
             .done(function( data ) {
                console.log("classInfo: "+String(data));
                AIDID = data.trim();
               curAIDID = AIDID;
             });
			
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
