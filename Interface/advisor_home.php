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
						.append("<div style='text-align:right'><form action='advisor_home.php' method='get' id='search'> <input type='text'/><input type='submit' value='Search' /> </form></div>"
							+ "<br />"
							+ "<form action='advisor_student_page_placeholder.php' method='post' id='selectAdvisee'>"
							+ "<div class='boarderedTable'>"
							+ "<table class='adviseeList' id = 'advisorList'>"
							+ "<tr class='rowSel'><th>Advisee</th><th>Major</th><th></th></tr>"
							+ "<tr class='rowSel' ><td><span class='box'>Jeb Kerman</span></td><td>Science!</td><td><input type='submit' name='SID110' value='View'/></td></tr>"
							+ "<tr class='rowSel' ><td><span class='box'>Kurt Kerman</span></td><td>Science!</td><td><input type='submit' name='SID111' value='View'/></td></tr>"
							+ "</table>"
							+ "</div>"
							+ "</form>"
							);
						$("advisorList").append("<!-- This is a test -->"
							+ "<tr class='rowSel'><td>Advisee2</td><td>Major2</td><td>Button2</td></tr>"
							);
				});
			});
		</script>
	</head>
	<body id = "master">
	
	</body>
</html>