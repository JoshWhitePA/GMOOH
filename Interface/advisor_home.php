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
						$("#mainSection")
						.append("<div style='text-align:right'><form action='advisor_home.php' method='post' id='search'> <input type='text'/><input type='submit' value='Search' /> </form></div>"
							+ "<table class='adviseeList' id = 'advisorList'>"
							+ "<tr class='rowSel'><th>Advisee</th><th>Major</th></tr>"
							+ "<tr class='rowSel' ><td><span class='box'>NAME</span></td><td>MAJOR</td><td>BUTTON</td></tr>"
							+ "</table>"
							);
						$("advisorList").append("<!-- This is a test -->"
							+ "<tr class='rowSel'><td>Advisee2</td><td>Major2</td><td>Button2</td></tr>"
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