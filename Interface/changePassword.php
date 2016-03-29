<?php
	require_once("../PHPClasses/logic.class.php");
	session_start();	
	$logic = new Logic();

	$oldPassword = $_POST["oldPassword"];
	$newPassword = $_POST["newPassword"];
	$confirmPassword = $_POST["confirmPassword"];
	$userID = $_SESSION["userID"];
	$passwordValid = NULL;
	echo hello;
	echo $oldPassword;
	echo $newPassword;
	echo $confirmPassword;
	if(!is_null($oldPassword) && !is_null($newPassword) && !is_null($confirmPassword) && !is_null($userID) && ($newPassword == $confirmPassword)){
		$passwordValid = $logic -> changePassword($oldPassword, $newPassword, $userID);
		echo hello0;
		echo $passwordValid;
		//If your old password is wrong execute this code
		if($passwordValid == false) {
			echo hello1;
			echo '<script language="javascript">';
			echo 'window.alert("Incorrect password please try again")';
			echo '</script>';
		}
		//If your password is correct execute this code
		if($passwordValid) {
			echo hello2;
			echo '<script language="javascript">';
			echo 'window.alert("Success! Your password has been changed")';
			echo '</script>';
		}
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
						.append("<div id = 'two' style = 'top: 0; bottom: 0; left: 0; right: 0; margin: auto; height: 100%; position: relative'>"
							+ "<form action='changePassword.php' onsubmit='event.preventDefault(); return formSubmit();' method='post' id='UserForm'>"
							+ "<table style = 'left: 25%; top: 35%; position: absolute'>"
							+ "<tr>"
							+ "<th>Old Password &nbsp;</th>"
							+ "<td><input id='oldPassword' name='oldPassword' type='password' title='Please enter your current password' pattern='[A-Za-z0-9]{8,}' required/></td>"
							+ "</tr>"
							+ "<tr>"
							+ "<th>New Password &nbsp;</th>"
							+ "<td><input id='newPassword' name='newPassword' type='password' title='Please enter a new password' pattern='[A-Za-z0-9]{8,}' required/></td>"
							+ "</tr>"
							+ "<tr>"
							+ "<th>Confirm New Password &nbsp;</th>"
							+ "<td><input id='confirmPassword' name='confirmPassword' type='password' title='Please confirm your new password' pattern='[A-Za-z0-9]{8,}' required/></td>"
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
	</head>
	<body id = "master">
	</body>
</html>
