<?xml version="1.0" encoding="utf-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<!-- Login page for GMOOH. Currently a skeleton of what it should be.
Created for CSC 355WI 020
2/11/2016 -->

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
   <HEAD>
      <TITLE>Create an Account</TITLE>
	  <link rel="stylesheet" type="text/css" href="gmooh_style.css" />
	  <script type="text/javascript">
			function checkPassword(){
				var pass1 = document.getElementById("password").value;
				var pass2 = document.getElementById("confirmPassword").value;
				document.write(pass1);
				document.write(pass2);

				if(pass1 == pass2){
					return true;
				}else{
					window.alert("Passwords do not match!");
					return false;
				}
			}
	  </script>
   </HEAD>
<BODY>

	<div class="center"> <!-- Doesn't work for some reason. Didn't have time to fix, doesn't cause errors. -->
	<!-- Another how-ya-doin form. -->
	<form action="account_created.php" onsubmit="event.preventDefault(); return checkPassword();" method="post" > 
	<fieldset>
		<p>Name: <br /> <input type="text" name="studentName" id="studentName" required="required" /> </p>
		<p>Student ID: <br /> <input type="text" name="studentID" id="studentID" required="required" /> </p>
		<p>E-Mail: <br /> <input type="email" name="email" id="email" required="required" /> </p>
		<p>Password: <br /> <input type="password" name="password" id="password" required="required" /> </p>
		<p>Confirm Password: <br /> <input type="password" name="confirmPassword" id="confirmPassword" required="required" /> </p>
		<input type="submit" value="Submit" /> <input type="reset" value="Reset" />
	</fieldset>
	</form>
	</div>
	
	<!-- Kill renegade comments -->
</BODY>
</html>