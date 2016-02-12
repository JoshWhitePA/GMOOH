<?php
	require_once("PHPCLasses/logic.class.php");
	session_start();	
	$email = $_POST["password"];
	$password = $_POST["email"];
	$logic = new Logic();
	$loggedIn = $logic -> validateUser($email, $password);
	

?>
<?xml version="1.0" encoding="utf-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<!-- Login check page.
Created for CSC 355WI 020
2/11/2016 -->

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
   <HEAD>
      <TITLE>Login processing</TITLE>
	  <link rel="stylesheet" type="text/css" href="gmooh_style.css" />
   </HEAD>
<BODY>
	<!-- Most of the following stuff should be handled by PHP logic. -->
	<p>You have been logged in!</p>
	
	<!-- Kill renegade comments -->
</BODY>
</html>