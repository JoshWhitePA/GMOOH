<?php
	require_once("../PHPClasses/logic.class.php");
	session_start();	
    
	$email = $_POST["email"];
	$password = $_POST["password"];
	$logic = new Logic();
        $logic ->setDBPass("password");
	$loggedIn = NULL;
	if(!is_null($password) && !is_null($email) && $_SESSION["loggedIn"] == false){
		$loggedIn = $logic -> validateUser($email, $password);
		$_SESSION["loggedIn"] = $loggedIn;
	}
	if($_SESSION["loggedIn"]){
		header('location: ../index.php');
	}

?>
<!DOCTYPE html>
<html>
	<head>
	<link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon" />
	<title>Log In To GMOOH</title>
	<link rel = "stylesheet" type = "text/css" href = "Styles/gmoohLoginStyle.css"/>
	</head>
	<body>
	
		<div class = "one">	
			<form action="login.php" method="post" >
				<table>
					<tr>
						<td rowspan = "6" align = "left" style = "vertical-align: middle">
							<img src = "Images/kutztownLogo.png" width = "100px"/>
						</td>
						<td rowspan = "10" width = "50px"></td>
						<th>Email &nbsp;</th>
						<td><input type="email" name="email" id="email" required/></td>
					</tr>
					<tr>
						<th>Password &nbsp;</th>
						<td><input type="password" name="password" id="password" required/></td>
					</tr>
					<tr height = "10px"></tr>
					<tr>
						<th colspan = "2" align = "center">
							<button class="button1" type="submit" value="Submit">Submit</button>
							<button class="button1" type="reset" value="Reset">Clear</button>
						</th>
					</tr>		
					<tr height = "10px"></tr>
					<tr>
						<th colspan = "2" align = "center">
							<input type = "button" class = "button1" 
								onclick = "location.href='createAccount.php'" 
								value = "Create New Account"/>
						</th>
					</tr>
				</table>
			</form>
		</div>
	</body>
</html>
