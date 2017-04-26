<!--
* Author:			Christian Carreras
* Contributor(s):	Business Logic Team
* File Name:		login.php
* Date:				04/04/2016
* Company:			CSC 355 GMOOH
* Organization:		Kutztown University of Pennsylvania
* Purpose:			This page prompts the user to enter an email and password
					if they already have an account. If the user does not have
					an account they can click a button to be directed to a page
					to create an account. If the user tries to access any page
					on the system without being logged in they will be rerouted
					to this page and be prompted to log in before proceeding.
-->

<?php 
	require_once("../PHPClasses/logic.class.php");
	session_start();	
?>
<!DOCTYPE html>
<html>
	<head>
	<link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon" />
	<title>Log In To GMOOH</title>
	<link rel = "stylesheet" type = "text/css" href = "Styles/gmoohLoginStyle.css"/>
	</head>
	<body>
		<!-- This div hold the form so the user can log on to GMOOH -->
		<div class = "one">	
			<!-- Set up the form to receive input and send to the server -->
			<form action="login.php" method="post" >
				<!-- A table is used to align elements -->
				<table>
					<tr>
						<!-- Display a Kutztown logo for familiarity -->
						<td rowspan = "6" align = "left" style = "vertical-align: middle">
							<img src = "Images/kutztownLogo.png" width = "150px"/>
						</td>
						<td rowspan = "10" width = "50px"></td>
						<!-- User will enter the email associated with their profile here -->
						<th>Email &nbsp;</th>
						<!-- HTML5 checks the input field for a standard form email -->
						<td><input type="email" name="email" id="email" required/></td>
					</tr>
					<tr>
						<!-- User will enter the password associated with their profile here -->
						<th>Password &nbsp;</th>
						<!-- HTML5 will block out the password as it is entered -->
						<td><input type="password" name="password" id="password" required/></td>
					</tr>
					<tr height = "10px"></tr>
					<tr>
						<!-- Add buttons to sumbit the reform and clear the form -->
						<th colspan = "2" align = "center">
							<button class="button1" type="submit" value="submit">Submit</button>
							<button class="button1" type="reset" value="Reset">Clear</button>
						</th>
					</tr>		
					<tr>
						<!-- If the user does not have an account allow them to create one -->
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
        echo "if 1: loggedinis set" . $_SESSION["loggedIn"];
        //Should redirect to the home page - gmoohHome.php
        //header('location: ../Interface/gmoohHome.php');
		$email = $_SESSION['email'];
        $userID = $logic -> setSession($email);
        $_SESSION["userID"] = $userID;
        header('location: gmoohHome.php');
        exit();
	}
	//This code will only execute if you've never logged in or you've tried to log in incorrectly(wrong password/username)
	//Logout code will have to unset session variable loggedIn or set it to false
	if(!isset($_POST['submit']) && (!isset($_SESSION["loggedIn"]) || $_SESSION["loggedIn"] == false)&& !is_null($password) && !is_null($email)){
        echo "if 2";
		$loggedIn = $logic -> validateUser($email, $password);
		//Uncomment the line below and log in with "password" to reset all the passwords to a hashed "password"
		//$loggedIn = $logic -> setDBPass($password);
		$_SESSION["loggedIn"] = $loggedIn;
		//If your password/Username is wrong execute this code
		if($_SESSION["loggedIn"] == false){
			$_SESSION["loggedIn"] = NULL;
			echo '<script language="javascript">';
			echo 'window.alert("Incorrect username/password please try again")';
			echo '</script>';
			
		}
		//If your password/Username are correct execute this code
		if($_SESSION["loggedIn"] == true) {
            echo "if 3 loggedIn: " . $_SESSION["loggedIn"];
			$userID = $logic -> setSession($email);
			$_SESSION["userID"] = $userID;
			$_SESSION["email"] = $email;
			//should redirect to the home page - gmoohHome.php
			//header('location: ../Interface/gmoohHome.php'); - not sure what this link will be
			if( isset($_SESSION["facID"]) ) {
				header('location: advisor_home.php');
			}
			else{
				header('location: gmoohHome.php');
			}
			exit();
		}
	}
	?>
