<!-- Advisor homepage.
Created for CSC 355WI 020 -->

<!DOCTYPE html>
<html>
	<head>
		<title>Advisor Homepage - GMOOH</title>
		<link rel = "stylesheet" type = "text/css" href = "Styles/gmoohMasterStyle.css"/>	
		<script src = "Scripts/jquery-1.12.0.min.js"></script>
		<script>
			$(document).ready(function(){
				$("#master").load("MasterPages/masterPage.html", function() {
					$("#mainSection")
						.append("<div style='text-align:right'><form action='advisor_home.php' method='post' id='search'> <input type='text'/><input type='submit' value='Search' /> </form></div>"
							+ "<table class='adviseeList' id = 'advisorList'>"
							+ "<tr class='rowSel'><th>Advisee</th><th>Major</th></tr>"
							+ "<tr class='rowSel' ><td><span class='box'>NAME</span></td><td>MAJOR</td><td>BUTTON</td></tr>"
							+ "</table>"
							);
					$("advisorList").append("<tr class='rowSel'><td>Advisee2</td><td>Major2</td><td>Button2</td></tr>"
						);
				});
			});
		</script>
	</head>
	<body id = "master">
	
	</body>
</html>