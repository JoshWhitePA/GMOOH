<!DOCTYPE html>
<html>
	<head>
		<title>Change Your Password</title>
		<link rel = "stylesheet" type = "text/css" href = "Styles/gmoohMasterStyle.css"/>	
		<script src = "Scripts/jquery-1.12.0.min.js"></script>
		<script>
			$(document).ready(function(){
				$("#master").load("MasterPages/masterPage.html", function() {
					$("#mainSection")
						.append("<form action=\"password_changed.php\" method=\"post\" id=\"main\">"
							+ "<fieldset class=\"changepass\">"
							+ "<table>"
							+ "<tr><td>Old Password:</td> <td><input type=\"password\" name=\"old_password\" id=\"old_password\" required=\"required\" /></td> </tr>"
							+ "<tr><td>New Password:</td> <td><input type=\"password\" name=\"new_password\" id=\"new_password\" required=\"required\" /></td> </tr>"
							+ "<tr><td>Confirm Password:</td> <td><input type=\"password\" name=\"confirmPassword\" id=\"confirmPassword\" required=\"required\" /></td> </tr>"
							+ "</table>"
							+ "<hr />"
							+ "<input type=\"submit\" value=\"Submit\" /> <input type=\"reset\" value=\"Reset\" /> <button type=\"submit\" form=\"Cancel\" value=\"Cancel\">Cancel</button>"
							+ "</fieldset>"
							+ "</form>"
							+ "<form action=\"account.php\" method=\"post\" id=\"Cancel\"></form> <!-- Hidden hacky form thing for the 'return' button. -->"
							); 
				});
			});
		</script>
	</head>
	<body id = "master">
	</body>
</html>
