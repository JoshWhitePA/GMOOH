<?php
	require_once("../PHPClasses/logic.class.php");	
	$logic = new Logic();

	
	$firstName = $_POST["firstName"];
	$lastName = $_POST["lastName"];
	$studentId = $_POST["studentId"];
	$email = $_POST["email"];
	$password = $_POST["password"];
	
	if (!isset($_POST['submit']) && !is_null($password) && !is_null($lastName) && !is_null($studentId) && !is_null($email) && !is_null($firstName)) { // if page is not submitted to itself echo the form
		$logic -> createUser($studentId, $email, $password, $firstName, $lastName);
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
			<form action="createAccount.php" method="post">
				<table>
					<tr>
						<th>First Name &nbsp;</th>
						<td><input type="text" name="firstName" title="Please Enter Your First Name" pattern="[A-Za-z]{1,}" required/></td>
					</tr>
					<tr>
						<th>Last Name &nbsp;</th>
						<td><input type="text" name="lastName" title="Please Enter Your Last Name" pattern="[A-Za-z]{1,}" required/></td>
					</tr>
					<tr>
						<th>Email &nbsp;</th>
						<td><input type="email" name="email" required/></td>
					</tr>
					<tr>
						<th>Student Id &nbsp;</th>
						<td><input type="numeric" name="studentId" title="9 Digit Student ID Only" pattern="[0-9]{9}" required/></td>
					</tr>
					<tr>
						<th>Major &nbsp;</th>
						<td>
							<select id = "major" name="major">
								<option>***Choose Major***</option>
								<option value = "it">BS CSC:IT</option>
								<option value = "sd">BS CSC:SD</option>
								<option value = "itm">CSC:IT Minor</option>
								<option value = "sdm">CSC:SD Minor</option>
								<option value = "Mit">MS CSC:IT</option>	
								<option value = "Msd">MS CSC:SD</option>
								
							</select>
						</td>
					</tr>
					<tr>
						<th>Password &nbsp;</th>
						<td><input id="password"name="password" type="password" title="Please Enter an 8 or More Character Password" pattern="[A-Za-z0-9]{8,}" required/></td>
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

