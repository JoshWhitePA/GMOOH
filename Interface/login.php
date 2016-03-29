
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
<?php
	require_once("../PHPClasses/logic.class.php");
	session_start();	
    echo "All passwords are password";
	if(isset($_POST['email'])){
		$email = $_POST['email'];
	}
	else{
		$email = NULL;
	}
	if(isset($_POST['password'])){
		$password = $_POST['password'];
	}
	else{
		$password = NULL;
	}
	if(isset($_SESSION['loggedIn'])){
		$loggedIn = $_SESSION['loggedIn'];
	}
	else{
		$loggedIn = NULL;
	}
	$logic = new Logic();
	$userID = NULL;
	
	//If you've already logged in previously execute this code
	if(isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] == true){
	//Should redirect to the home page - gmoohHome.php
	//header('location: ../Interface/gmoohHome.php');
	header('location: gmoohHome.php');
	$userID = $logic -> setSession($email);
	$_SESSION["userID"] = $userID;
	}
	//This code will only execute if you've never logged in or you've tried to log in incorrectly(wrong password/username)
	//Logout code will have to unset session variable loggedIn or set it to false
	if(!isset($_POST['submit']) && (!isset($_SESSION["loggedIn"]) || $_SESSION["loggedIn"] == false)&& !is_null($password) && !is_null($email)){
		$loggedIn = $logic -> validateUser($email, $password);
		$_SESSION["loggedIn"] = $loggedIn;
		//If your password/Username is wrong execute this code
		if($_SESSION["loggedIn"] == false) {
			echo '<script language="javascript">';
			echo 'window.alert("incorrect username/password please try again")';
			echo '</script>';
		}
		//If your password/Username are correct execute this code
		if($_SESSION["loggedIn"]) {
			$userID = $logic -> setSession($email);
			$_SESSION["userID"] = $userID;
			//should redirect to the home page - gmoohHome.php
			//header('location: ../Interface/gmoohHome.php'); - not sure what this link will be
			header('location: gmoohHome.php');
		}
	}
	?>