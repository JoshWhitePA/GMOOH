<?php
	require_once("../PHPClasses/logic.class.php");
	session_start();	
	$email = $_POST["password"];
	$password = $_POST["email"];
	$logic = new Logic();
	if(!is_null($password) && !is_null($email)){
		$loggedIn = $logic -> validateUser($email, $password);
	}

?>
<!DOCTYPE html>
<html>
	<head>
	<title>Log In To GMOOH</title>
	<link rel = "stylesheet" type = "text/css" href = "Styles/gmoohStyle.css"/>
	</head>
	<body>
		<div class = "one">
			<div class = "special">			
				<form action="login.php" method="post" >
					<table align = "center" width = "450px">
						<tr>
							<td rowspan = "6" align = "left" style = "vertical-align: middle">
								<img src = "Images/kutztownLogo.png" width = "100px"/>
							</td>
							<td rowspan = "10" width = "50px"/>
							<th align="right">Email &nbsp;</th>
							<td align="right"><input type="email" required/></td>
						</tr>
						<tr>
							<th align = "right">Password &nbsp;</th>
							<td align = "right"><input type="password" required/></td>
						</tr>
						<tr height = "10px"></tr>
						<tr>
							<td colspan = "2" align = "center">
							<button class="button1" type="submit" value="Submit">Submit</button>
							<button class="button1" type="reset" value="Reset">Clear</button>
							</td>
						</tr>		
						<tr height = "10px"></tr>
						<tr>
							<td colspan = "2" align = "center">
								<input type = "button" class = "button1" 
									onclick = "location.href='createAccount.html'" 
									value = "Create New Account"/>
							</td>
						</tr>
					</table>
				</form>
			</div>
		</div>
	</body>
</html>
