<?php
session_start();
?>


<!DOCTYPE html>
<html>
	<head>
	<link rel="shortcut icon" href="./InterFace/images/favicon.ico" type="image/x-icon" />
	<title>Log In To GMOOH</title>
	<link rel = "stylesheet" type = "text/css" href = "./Interface/Styles/gmoohLoginStyle.css"/>
	</head>
	<body>
	
		<div class = "one">	
				<table>
					<tr>
						<td rowspan = "6" align = "left" style = "vertical-align: middle">
							<img src = "./Interface/Images/kutztownLogo.png" width = "100px"/>
						</td>
						<td rowspan = "10" width = "50px"></td>
						<th>Welcome to GMOOH &nbsp;</th>
					</tr>
					<tr height = "10px"></tr>
					<tr>
						<th colspan = "2" align = "center">
							<input type = "button" class = "button1" 
								onclick = "location.href='./Interface/login.php'" 
								value = "Login"/>
						</th>
					</tr>
					
					<tr height = "10px"></tr>
					<tr>
						<th colspan = "2" align = "center">
							<input type = "button" class = "button1" 
								onclick = "location.href='./Interface/createAccount.php'" 
								value = "Create New Account"/>
						</th>
					</tr>
				</table>
		</div>
	</body>
</html>