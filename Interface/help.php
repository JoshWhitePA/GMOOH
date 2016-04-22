<!--
Question/Answer Format
+ "<br/>Q. <b></b>"
+ "<br/>A. <br/>"
-->
<?php 
	session_start();
	if(!isset($_SESSION["loggedIn"]) || $_SESSION["loggedIn"] == false || $_SESSION["loggedIn"] == null){
	header('location: login.php');
	}	
	
	$userMaster = "";
	if(isset($_SESSION["facID"])){
		$userMaster = "MasterPages/advisorMasterPage.html";
	}
	else{
		$userMaster = "MasterPages/masterPage.html";
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>GMOOH Help</title>
		<link rel = "stylesheet" type = "text/css" href = "Styles/gmoohMasterStyle.css"/>	
		<script src = "Scripts/jquery-1.12.0.min.js"></script>
		<script>
			$(document).ready(function(){
				$("#master").load(<?php echo json_encode($userMaster); ?>, function() {
					$("#mainSection")
						.append("<div id = 'innerSection' class = 'innerSection'>FAQs<br/>"
							+ "<br/>Q. <b>Why is this interface so terrible?</b>"
							+ "<br/>A. We are terrible computer scientists<br/>"
							+ "<br/>Q. <b>What does GMOOH stand for?</b>"
							+ "<br/>A. Gravy Mustard Or Old Horseradish<br/>"
							+ "<br/>Q. <b>Will you add (insert functionality here) to your site?</b>"
							+ "<br/>A. Ain't nobody got time for that<br/>"
							+ "<br/>Q. <b>Where's the maroon and gold?!</b>"
							+ "<br/>A. Your school pride's ego is too much for this site to handle<br/>"
							+ "<br/>Q. <b>Help! I am color blind and I cannot fully understand the beauty that is your site!</b>"
							+ "<br/>A. Curse your parents for your bad genes<br/>"
							+ "<br/>Q. <b>I am taking CSC 136 with Spiegel and I was wondering if you can help me?</b>"
							+ "<br/>A. Pray<br/>"
							+ "<br/>Q. <b>Your website needs more cats</b>"
							+ "<br/>A. Although I agree with you, 1: that is not a question, 2: our server is allergic<br/>"
							+ "<br/>Q. <b>What's your favorite flavor of ice cream?</b>"
							+ "<br/>A. I'm more of a frozen yogurt man myself<br/>"
							+ "<br/>Q. <b>Why isn't Pluto a planet?! It's totally a planet!!!!!!1</b>"
							+ "<br/>A. *Sigh* Please argure with the Physical Sciences Department, not me<br/>"
							+ "<br/>Q. <b>All other inquiries</b>"
							+ "<br/>A. Blame Josh<br/></div>"
					); 
				});
			});
		</script>
	</head>
	<body id = "master">
	</body>
</html>
