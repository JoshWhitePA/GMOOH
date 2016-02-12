<?php
	require_once("PHPCLasses/logic.class.php");	
	$logic = new Logic();

	$studentName = $_POST["studentName"];
	$studentID = $_POST["studentID"];
	$email = $_POST["email"];
	$password = $_POST["password"];

	$loggedIn = $logic -> createUser($email, $password, $studentID, $studentName);
	
?>
<?xml version="1.0" encoding="utf-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<!-- Account created page.
Created for CSC 355WI 020
2/11/2016 -->

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
   <HEAD>
      <TITLE>New Account Created</TITLE>
	  <link rel="stylesheet" type="text/css" href="gmooh_style.css" />
   </HEAD>
<BODY>
	<!-- Most of the following stuff should be handled by PHP logic. -->
	<p>Your new account has been created.</p>
	
	<!-- Kill renegade comments -->
</BODY>
</html>