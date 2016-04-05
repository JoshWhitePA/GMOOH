<!DOCTYPE html>
<html>
	<head>
		<title>Create New Checksheet</title>
		<link rel = "stylesheet" type = "text/css" href = "Styles/gmoohMasterStyle.css"/>
		<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.min.css">
		<script src = "Scripts/jquery-1.12.0.min.js"></script>
		<script src = "Scripts/editOfficial.js"></script>
		<script>
			$(window).load(function() {
				$(".blank").show();
				$(document).ready(pageLoadEditOfficial);
				$(".blank").delay(500).fadeOut(1000);
				startUpNotes();
			});	
		</script>
	</head>
	<body id = "behindTheScenes">
		<div class = 'blank'><div class = "loadingImg"></div><div class = "loadingText">Loading</div></div>
		<div id = "master" class = "pageBody"></div>
	</body>
</html>
