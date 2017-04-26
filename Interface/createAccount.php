<!--
* Author:			Christian Carreras
* Contributor(s)	Michael Para, Business Logic Team
* File Name:		createAccount.php
* Date:				04/04/2016
* Company:			CSC 355 GMOOH
* Organization:		Kutztown University of Pennsylvania
* Purpose:			This page allows the user to create an account for GMOOH
					by entering all the necessary information to get them
					started and ready to create checksheets. An email and
					password is needed for user authentication. The user will
					also have to enter their name, id number, specify whether
					they are a student or an advisor and if they are a student
					their current major.
-->

<?php
	//Business logic magic: get the data from the fields and create an account
	require_once("../PHPClasses/logic.class.php");	
	$logic = new Logic();

	if(isset($_POST['firstName'])){
		$firstName = $_POST['firstName'];
	}
	else{
		$firstName = NULL;
	}	
	
	if(isset($_POST['lastName'])){
		$lastName = $_POST['lastName'];
	}
	else{
		$lastName = NULL;
	}	
	
	if(isset($_POST['studentId'])){
		$studentId = $_POST['studentId'];
	}
	else{
		$studentId = NULL;
	}	
	
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

    if(isset($_POST['major'])){
		$major = $_POST['major'];
	}else{
     $major = NULL;
    }

	// if page is not submitted to itself echo the form
	if(!isset($_POST['submit']) && !is_null($password) && !is_null($lastName) && !is_null($studentId) && !is_null($email) && !is_null($firstName)) {
		//hash password
		$hashedPassword = $logic -> generateHashWithSalt($password);
		
		$logic -> createUser($studentId, $email, $hashedPassword, $firstName, $lastName);
		header('location: login.php');
		//needs to be directed to login or home. probably login to login in with new account
		}
	?>
<!DOCTYPE html>
<html>
	<head>
	<link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon" />
	<title>Create An Account</title>
	<link rel = "stylesheet" type = "text/css" href = "Styles/gmoohLoginStyle.css"/>
		<script type="text/javascript">

			/*
			* Function Name:	formSubmit
			* Function Type:	inspector
			* Parameters:		N/A
			* Return Value:		boolean (false if passwords do not match)
			* Purpose:			Checks the entered password and the confirm
								value fields in the document form to make sure
								the fields match. If they match submit the form.
								Else return false and go back.
			*/
		    function formSubmit() {
				var pass1 = document.getElementById("password").value;
 				var pass2 = document.getElementById("confirmPassword").value;
				//Check if the first password is an exact match to the second
				if (pass1 != pass2)
				{
					alert("Passwords do not match!");
					return false;
				}
				//Submit the form an create the account
				document.getElementById("UserForm").submit();
			}
			
			/*
			* Function Name:	changeDisplay
			* Function Type:	mutator
			* Parameters:		N/A
			* Return Value:		void
			* Purpose:			Deactivates the choose major drop down list if
								the advisor checkbox is checked or activates
								the drop down list if it is not checked. This
								will also change the label for ID from Student
								to Faculty and vice versa.
			*/
			function changeDisplay() {
				if(advisor.checked == true) {
					//Deactivate the choose major drop down list
					var accountDisplayShow = document.getElementById("studentIdDisplay"); 
					//Change the ID label to Faculty ID
					accountDisplayShow.innerHTML = "Faculty ID &nbsp;";
					document.getElementById("major").disabled = true;
				}
				
				else {
					//Activate the choose major drop down list
					var accountDisplayShow = document.getElementById("studentIdDisplay");
					//Change the ID label to Student ID
					accountDisplayShow.innerHTML = "Student ID &nbsp;";	
					document.getElementById("major").disabled = false;	
				}
			};
	  </script>
	</head>
	<body>
		<div class = "two">
			<form action="createAccount.php" method="post">
				<table>
					<!-- First Name Field -->
					<tr>
						<th>First Name &nbsp;</th>
						<!-- User enters their first name, alphabetical characters only (minimum 1 character) -->
						<td><input type = "text" name = "firstName" title = "Please Enter Your First Name" pattern = "[A-Za-z]{1,}" required/></td>
					</tr>
					<!-- Last Name Field -->
					<tr>
						<th>Last Name &nbsp;</th>
						<!-- User enters their last name, alphabetical characters only (minimum one character) -->
						<td><input type = "text" name = "lastName" title = "Please Enter Your Last Name" pattern = "[A-Za-z]{1,}" required/></td>
					</tr>
					<!-- Email Field -->
					<tr>
						<th>Email &nbsp;</th>
						<!-- User enters their email as their username, standard form emails only -->
						<td><input type = "email" name = "email" required/></td>
					</tr>
					<!-- Advisor Checkbox -->
					<tr>
						<th>Adviser? &nbsp;</th>
						<!-- Call change display when checked or unchecked -->
						<td><input type = "checkbox" id = "advisor" value = "advisor" onclick = "changeDisplay()"/>
					</tr>
					<!-- Student/Faculty ID Field -->
					<tr>
						<th>Student Id &nbsp;</th>
						<!-- User enters their ID, numerical characters only (exactly 9 characters) -->
						<td><input type = "numeric" name = "studentId" title = "9 Digit Student ID Only" pattern = "[0-9]{9}" required/></td>
					</tr>
					<!-- Select Major Field (only available to students) -->
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
					<!-- Password Field -->
					<tr>
						<th>Password &nbsp;</th>
						<!-- User enters their password and it will be displayed as a character, alphanumerical characters only (minimum 8 characters) -->
						<td><input id = "password" name = "password" type = "password" title = "Please Enter an 8 or More Character Password" pattern = "[A-Za-z0-9]{8,}" required/></td>
					</tr>
					<!-- Confirm Password Field -->
					<tr>
						<th>Confirm Password &nbsp;</th>
						<!-- User confirms their password, alphanumerical characters only (minimum 8 characters) -->
						<td><input id = "confirmPassword" type = "password" title ="Please Enter an 8 or More Character Password" pattern = "[A-Za-z0-9]{8,}" required/></td>
					</tr>
					<tr height = "10px"></tr>
					<!-- Form Sumbit and Rest Buttons -->
					<tr>
						<th colspan = "2" align = "center">
							<button class = "button1" type = "submit" value = "Submit">Submit</button>
							<button class = "button1" type = "reset" value = "Reset">Clear</button>
						</th>
						</tr>
					<tr height = "10px"></tr>
					<!-- Back Button (take user back to login page) -->
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

