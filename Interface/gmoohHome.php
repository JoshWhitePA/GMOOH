<!DOCTYPE html>
<html>
	<head>
		<title>Your Official Checksheet</title>
		<link rel = "stylesheet" type = "text/css" href = "Styles/gmoohMasterStyle.css"/>	
		<script src = "Scripts/jquery-1.12.0.min.js"></script>
		<script>
			$(document).ready(function(){
				$("#master").load("MasterPages/masterPage.html", function() {
					$("#mainSection").append("<div id ='innerSection' class ='innerSection'></div>");
					$("#innerSection").load("Checksheets/v1.1/min/cscITChecksheetDisplay.php"); 
				});
			});
		</script>
	</head>
	<body id = "master">
	</body>
</html>
