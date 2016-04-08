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
						.append("<form action='advisor_response.php' method='post' id='main'>"
							+ "<div class='changepass'>"
							+ "<table class='advisorOptions'>"
							+ "<tr><td>Advisee: <select name = 'advisee'>"
							+ "<option value = 'PlaceholdA'>John Carmack</option>"
							+ "<option value = 'PlaceholdB'>John Romaro</option>"
							+ "<option value = 'PlaceholdC'>Dave Taylor</option>"
							+ "<option value = 'PlaceholdD'>Adrian Carmack</option>"
							+ "<option value = 'PlaceholdE'>Kevin Cloud</option>"
							+ "<option value = 'PlaceholdF'>Sandy Petersen</option>"
							+ "</select></td><td class='majorData'>Major: <span class='box'>PLACEHOLDER</span></td></tr>"
							+ "<tr><td class='labelAlign'>Select Option: </td><td class='optionSelect'>"
							+ "<input type='radio' name='selectedAction' value='viewAdviseeOffical'>View selected Advisee's offical checksheet</input><br />"
							+ "<input type='radio' name='selectedAction' value='createProto'>Create a prototype checksheet for the selected Advisee</input><br />"
							+ "<input type='radio' name='selectedAction' value='viewAdviseeSaved'>View selected Advisee's saved checksheets</input>"
							+ "</td></tr>"
							+ "</table>"
							+ "<hr />"
							+ "<table class='tableCenter'><tr><td><input type='submit' value='Submit' /></td> <td><input type='reset' value='Reset' /></td></tr></table>"
							+ "</div>"
							+ "</form>"
							); 
				});
			});
		</script>
	</head>
	<body id = "master">
	
	<!-- Notes on some implementation bits:
			Original concept used a table with each advisee listed.
				Seemed like it wouldn't work that well in practice (advisor may have quite a few advisees).
			Dropdown needs to be populated from list of advisees. 
			Do we actually need a reset button? I left it there because I figured it MIGHT be handy,
				but I could easily see it being removed.
			Radio buttons to select action means that the page it's submitted to needs to redirect to the correct action. -->
	</body>
</html>