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
	<link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon" />
	<title>Create An Account</title>
	<link rel = "stylesheet" type = "text/css" href = "Styles/gmoohLoginStyle.css"/>
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
			<form action="createAccount.php" onsubmit="event.preventDefault(); return formSubmit();" method="post" id="UserForm">
				<table>
					<tr>
						<th>First Name &nbsp;</th>
						<td><input type="text" title="Please Enter Your First Name" pattern="[A-Za-z]{1,}" required/></td>
					</tr>
					<tr>
						<th>Last Name &nbsp;</th>
						<td><input type="text" title="Please Enter Your Last Name" pattern="[A-Za-z]{1,}" required/></td>
					</tr>
					<tr>
						<th>Email &nbsp;</th>
						<td><input type="email" required/></td>
					</tr>
					<tr>
						<th>Student Id &nbsp;</th>
						<td><input id ="studentID" title="9 Digit Student ID Only" pattern="[0-9]{9}" required/></td>
					</tr>
					<tr>
						<th>Password &nbsp;</th>
						<td><input id="password" type="password" title="Please Enter an 8 or More Character Password" pattern="[A-Za-z0-9]{8,}" required/></td>
					</tr>
					<tr>
						<th>Confirm Password &nbsp;</th>
						<td><input id="confirmPassword" type="password" title="Please Enter an 8 or More Character Password" pattern="[A-Za-z0-9]{8,}" required/></td>
					</tr>
					<tr height = "10px"></tr>
					<tr>
						<th colspan = "2" align = "center">
							<button class = "button1" type="submit" value="Submit">Submit</button>
							<button class = "button1" type="reset" value="Reset">Clear</button>
						</th>
						</tr>
					<tr height = "10px"></tr>
					<tr>
						<th colspan = "2" align = "center">
							<input type = "button" class = "button1" 
								onclick = "location.href='login.php'" 
								value = "Cancel"/>
						</th>
					</tr>
				</table>
			</form>
		</div>
	</body>
</html>
