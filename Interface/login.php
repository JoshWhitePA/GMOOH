<?php
	require_once("../PHPClasses/logic.class.php");
	session_start();	
    echo "All passwords are password";
	$email = $_POST["email"];
	$password = $_POST["password"];
	$logic = new Logic();
	$loggedIn = NULL;
	$userID = NULL;
	if(!isset($_POST['submit']) && !is_null($password) && !is_null($email) 
			&& $_SESSION["loggedIn"] == false){
		$loggedIn = $logic -> validateUser($email, $password);
		$_SESSION["loggedIn"] = $loggedIn;
		if(($_SESSION['loggedIn'] == false)) {
			//Figure out which one of these methods for alerting the user their password is wrong will work best
			echo 'incorrect username/ password please try again.' ;
			echo '<script language="javascript">';
			echo 'alert("incorrect username/ password please try again")';
			echo '</script>';
			//Should redirect to the login page
			header('location: ../login.php');
		}
		if(($_SESSION['loggedIn'])) {
			$userID = $logic -> setSession($email);
			$_SESSION["userID"] = $userID;
		}
	}
	if($_SESSION["loggedIn"]){
		//Should redirect to the home page
		header('location: ../Interface/gmoohHome.php');
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
							<button class="button1" type="submit" value="submit">Submit</button>
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
