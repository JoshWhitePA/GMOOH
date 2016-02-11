<?xml version="1.0" encoding="utf-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<!-- Login page for GMOOH. Currently a skeleton of what it should be.
Created for CSC 355WI 020
2/11/2016 -->

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
   <HEAD>
      <TITLE>Login to GMOOH</TITLE>
	  <link rel="stylesheet" type="text/css" href="gmooh_style.css" />
   </HEAD>
<BODY>
	
	<div class="center">
	<!-- Really basic how-ya-doin form below. -->
	<form action="login_check.php" method="post" > 
	<fieldset>
		<p>EMail: <br /> <input type="email" name="email" id="email" required="required" /> </p>
		<p>Password: <br /> <input type="password" name="password" id="password" required="required" /> </p>
		<input type="submit" value="Submit" /> <input type="reset" value="Reset" />
	</fieldset>
	</form>
	<p>No account? <a href="new_account.php">Sign up</a>.</p>
	</div>
	
	<!-- Kill renegade comments -->
</BODY>
</html>