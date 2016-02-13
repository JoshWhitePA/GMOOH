<?php
	require_once("../PHPClasses/logic.class.php");	
	$logic = new Logic();

	
	$studentName = $_POST["studentName"];
	$studentID = $_POST["studentID"];
	$email = $_POST["email"];
	$password = $_POST["password"];
	if(!is_null($password) && !is_null($studentName) && !is_null($studentID) && !is_null($email)){
		$loggedIn = $logic -> createUser($email, $password, $studentID, $studentName);
	} 
?>
<!DOCTYPE html>
<html>
	<head>
	<title>Create An Account</title>
	<link rel = "stylesheet" type = "text/css" href = "Styles/gmoohStyle.css"/>
		  <script type="text/javascript">

		    function formSubmit(){

				var pass1 = document.getElementById("password").value;
 				var pass2 = document.getElementById("confirmPassword").value;
				if (pass1 != pass2)
				  {
					  alert("Passwords do not match!");
					  return false;
				  }
				  document.getElementById("UserForm").submit();
			 }
	  </script>
	</head>
	<body>
		<div class = "two">
			<div class = "special">
				<form action="createAccount.php" onsubmit="event.preventDefault(); return formSubmit();" method="post" id="UserForm">
					<table align = "center">
						<tr>
							<th align = "right">First Name &nbsp;</th>
							<td><input type="text" required/></td>
						</tr>
						<tr>
							<th align = "right">Last Name &nbsp;</th>
							<td><input type="text" required/></td>
						</tr>
						<tr>
							<th align = "right">Email &nbsp;</th>
							<td><input type="email" required/></td>
						</tr>
						<tr>
							<th align = "right">Student Id &nbsp;</th>
							<td><input type="text" required/></td>
						</tr>
						<tr>
							<th align = "right">Password &nbsp;</th>
							<td><input id="password" type="password" required/></td>
						</tr>
						<tr>
							<th align = "right">Confirm Password &nbsp;</th>
							<td><input id="confirmPassword" type="password" required/></td>
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
									value = "Cancel"/>
							</td>
						</tr>
					</table>
				</form>
			</div>
		</div>
	</body>
</html>
