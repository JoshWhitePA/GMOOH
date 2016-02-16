<?php
	require_once("../PHPClasses/logic.class.php");	
	$logic = new Logic();

	
	$password = $_POST["oldPassword"];
	$newPass1= $_POST["newPassword"];
	$newPass2 = $_POST["confirmNewPassword"];
	if(!is_null($password) && !is_null($newPass1) && !is_null($newPass2)){
		$loggedIn = $logic -> changePassword($password, $newPass1, $newPass2);
        /* variable $loggedIn ??? Is that needed? */
	} 
?>
<!DOCTYPE html>
<html>
	<head>
	<link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon" />
	<title>Change Password</title>
	<link rel = "stylesheet" type = "text/css" href = "Styles/gmoohStyle.css"/>
		  <script type="text/javascript">

		    function formSubmit(){
                
                var oldPass = document.getElementById("oldPassword").value;
				var newPass1 = document.getElementById("newPassword").value;
 				var newPass2 = document.getElementById("confirmNewPassword").value;
				
				if (newPass1 != newPass2)
				{
					  alert("Passwords do not match!");
					  return false;
				}
                  
                if((newPass1 == newPass2) && (oldPass == newPass1))
                {
                    alert("Must use new password");
                    return false;
                }
                  
				  document.getElementById("UserForm").submit();
			 }
	  </script>
	</head>
	<body>
		<div class = "two">
			<div class = "special">
				<form action="changePassword.php" onsubmit="event.preventDefault(); return formSubmit();" method="post" id="UserForm">
					<table align = "center">
						<tr>
							<th align = "right">Old Password &nbsp;</th>
							<td><input id="oldPassword" type = "password" required/></td>
						</tr>
						<tr>
							<th align = "right">New Password &nbsp;</th>
							<td><input id="newPassword" type = "password" required/></td>
						</tr>
						<tr>
							<th align = "right">Confirm New Password &nbsp;</th>
							<td><input id="confirmNewPassword" type="password" required/></td>
						</tr>
						<tr height = "10px"></tr>
						<tr>
							<td colspan = "2" align = "center">
							<button class = "button1" type="submit" value="Submit">Submit</button>
							<button class = "button1" type="reset" value="Reset">Clear</button>
							</td>
						</tr>
						<tr height = "10px"></tr>
						<tr>
							<td colspan = "2" align = "center">
								<input type = "button" class = "button1" 
									onclick = "location.href='login.html'" 
									value = "Cancel"/> <!-- location needs to be changed -->
							</td>
						</tr>
					</table>
				</form>
			</div>
		</div>
	</body>
</html>

