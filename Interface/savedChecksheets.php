<!DOCTYPE html>
<html>
	<head>
		<title>Your Saved Checksheets</title>
		<link rel = "stylesheet" type = "text/css" href = "Styles/gmoohMasterStyle.css"/>	
		<script src = "Scripts/jquery-1.12.0.min.js"></script>
		<script src = "Scripts/viewSavedChecksheets.js"></script>
		<script>
			$(document).ready(function(){
				$("#master").load("MasterPages/masterPage.html", function() {
					$("#mainSection")
						.append("<div class=\"changepass\">"
							+ "<table class=\"interface\"> <!-- These fields will need to be filled via PHP -->"
							+ "<form action=\"saved_checksheets_response.php\" method=\"post\" id=\"main\">"
							+ "<tr><td>Checksheet 1 - Major: <span class = 'box' >PLACEHOLDER</span>, Date Created: <span class = 'box' >PLACEHOLDER</span> </td> <td><input type=\"submit\" value=\"Open\" id=\"chksht1_open\" /></td> <td><input type=\"submit\" value=\"Delete\" id=\"chksht1_delete\" /></td></tr>"
							+ "<tr><td>Checksheet 2 - Major: <span class = 'box' >PLACEHOLDER</span>, Date Created: <span class = 'box' >PLACEHOLDER</span> </td> <td><input type=\"submit\" value=\"Open\" id=\"chksht2_open\" /></td> <td><input type=\"submit\" value=\"Delete\" id=\"chksht1_delete\" /></td> </tr>"
							+ "<tr><td>Checksheet 3 - Major: <span class = 'box' >PLACEHOLDER</span>, Date Created: PLACEHOLDER </td> <td><input type=\"submit\" value=\"Open\" id=\"chksht3_open\" /></td> <td><input type=\"submit\" value=\"Delete\" id=\"chksht1_delete\" /></td> </tr>"
							+ "</table>"
							+ "<hr />"
							+ "<input type=\"submit\" value=\"Submit\" /> <input type=\"reset\" value=\"Reset\" /> <button type=\"submit\" form=\"Cancel\" value=\"Cancel\">Cancel</button>"
							+ "</div>"
							+ "</form>"
							+ "<form action=\"account_page.php\" method=\"post\" id=\"Cancel\"></form>"
							); 
				});
			});
		</script>
	</head>
	<body id = "master">
	</body>
</html>
