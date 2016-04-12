<?php 
	session_start();
	if(!isset($_SESSION["loggedIn"]) || $_SESSION["loggedIn"] == false || $_SESSION["loggedIn"] == null){
	header('location: login.php');
	}	
?>
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
						.append("<div id = 'two' class = 'innerSection'>"
							+ "<form action='changePassword.php' onsubmit='event.preventDefault(); return formSubmit();' method='post' id='UserForm'>"
							+ "<table class = 'tableCenter'>"
							+ "<tr>"
							+ "<th>Old Password &nbsp;</th>"
							+ "<td class = 'paddedTD'><input id='oldPassword' name='oldPassword' type='password' title='Please enter your current password' pattern='[A-Za-z0-9]{8,}' required/></td>"
							+ "</tr>"
							+ "<tr>"
							+ "<th>New Password &nbsp;</th>"
							+ "<td class = 'paddedTD'><input id='newPassword' name='newPassword' type='password' title='Please enter a new password' pattern='[A-Za-z0-9]{8,}' required/></td>"
							+ "</tr>"
							+ "<tr>"
							+ "<th>Confirm New Password &nbsp;</th>"
							+ "<td class = 'paddedTD'><input id='confirmPassword' name='confirmPassword' type='password' title='Please confirm your new password' pattern='[A-Za-z0-9]{8,}' required/></td>"
							+ "</tr>"
							+ "<tr height = '10px'></tr>"
							+ "<tr>"
							+ "<th colspan = '2' align = 'center'>"
							+ "<button class = 'button1' type='submit' value='Submit'>Submit</button>"
							+ "<button class = 'button1' type='reset' value='Reset'>Clear</button>"
							+ "</th>"
							+ "</tr>"
							+ "<tr height = '10px'></tr>"
							+ "<tr>"
							+ "<th colspan ='2' align = 'center'>"
							+ "<input type = 'button' class = 'button1' onclick = 'cancel()' value = 'Cancel'/>"
							+ "</th></tr></table></form></div>");
						});
			});
			
			function cancel() {
				window.location.assign("account.php");
			}
			
			// client side verifying done here
		    function formSubmit(){
				var pass = document.getElementById("oldPassword").value;
				var pass1 = document.getElementById("newPassword").value;
 				var pass2 = document.getElementById("confirmPassword").value;
				if (pass1 != pass2){
					  alert("Passwords do not match!");
					  return false;
				  }
				  //if choose same password as old one
				else if (pass==pass1 && pass==pass2) {
					alert("Must pick a new password!");
					return false;
				}
					//Everything checked out
				  document.getElementById("UserForm").submit();
				    //alert("Password Successfully Changed!");
			 }
						 
		</script>
<?php
	require_once("../PHPClasses/logic.class.php");
	$logic = new Logic();
	
	if(isset($_POST["oldPassword"])){
		$oldPassword = $_POST["oldPassword"];
	}
	else{
		$oldPassword = NULL;
	}
	if(isset($_POST["newPassword"])){
		$newPassword = $_POST["newPassword"];
	}
	else{
		$newPassword = NULL;
	}
	if(isset($_POST["confirmPassword"])){
		$confirmPassword = $_POST["confirmPassword"];
	}
	else{
		$confirmPassword = NULL;
	}
	if(isset($_SESSION["userID"])){
		$userID = $_SESSION["userID"];
	}
	else{
		$userID = NULL;
	}
	
	$passwordValid = NULL;
	
	if(!is_null($oldPassword) && !is_null($newPassword) && !is_null($confirmPassword) && !is_null($userID) && ($newPassword == $confirmPassword)){
		$passwordValid = $logic -> changePassword($oldPassword, $newPassword, $userID);
		//If your old password is wrong execute this code
		if($passwordValid == false) {
			echo '<script language="javascript">';
			echo 'window.alert("Incorrect password please try again")';
			echo '</script>';
		}
		//If your password is correct execute this code
		if($passwordValid) {
			echo '<script language="javascript">';
			echo 'window.alert("Success! Your password has been changed")';
			echo '</script>';
		}
	 } 
?>
	</head>
	<body id = "master">
	</body>
</html>

