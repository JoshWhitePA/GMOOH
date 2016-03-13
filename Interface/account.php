<!DOCTYPE html>
<html>
	<head>
		<title>Your Account</title>
		<link rel = "stylesheet" type = "text/css" href = "Styles/gmoohMasterStyle.css"/>	
		<script src = "Scripts/jquery-1.12.0.min.js"></script>
		<script>
			$(document).ready(function(){
				$("#master").load("MasterPages/masterPage.html", function() {
					$("#mainSection")
						.append("<div class=\"boxed\" >"
							+ "<table> <!-- These fields will need to be filled via PHP -->"
							+ "<tr><td>Name:</td> <td><span class=\"box\">PLACEHOLDER</span></td> </tr>"
							+ "<tr><td>Student/Faculty ID:</td> <td><span class=\"box\">PLACEHOLDER</span></td> </tr>"
							+ "<tr><td>Email:</td> <td><span class=\"box\">PLACEHOLDER</span></td> </tr>"
							+ "</table>"
							+ "<p><a href=\"change_password.php\">Change your password</a></p>"
							+ "</div>"
							); 
				});
			});
		</script>
	</head>
	<body id = "master">
	</body>
</html>
