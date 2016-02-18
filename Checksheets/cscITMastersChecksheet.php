<!--
*	File: 			    cscSDMChecksheet.php
*	Created:	    	02/18/2016
*	Author:			    Christian Carreras, Christopher Steckhouse
*	Organization: 	Kutztown University CSC 355 Spring
*	Purpose:	  	  This php file creates a skeleton course checksheet
*				        	as visually close as possible to an official checksheet.
*				         	**THIS FILE IS FOR TESTING PURPOSES ONLY**
*				         	This file will be used by the database and business logic
*				        	teams to test inserting classes into a checksheet.
-->
<?php
?>
<!DOCTYPE html>
<html>
	<head>
	<title> Computer Science: SD Master's Checksheet</title>
	</head>
	<link rel = "stylesheet" type = "text/css" href = "Styles/checksheetStyle.css"/>
	<body>
<!----- HEADER -->
		<div class = "sectionTop">
			<br/><br/>
			STUDENT:
			<br/><br/>
			______________________________
		</div>
		<div class = "sectionTop">
			<img src = "Images/KU_Logo.jpg">
		</div>
		<div class = "sectionTop">
			<br/><br/>
			STUDENT ID NUMBER:
			<br/><br/>
			______________________________
		</div>
		<div class = "newSection"/>
		<div class = "headerBox">Department of Computer Science & Information Technology
		</div>
		
<!----- #MS CSC SOFTWARE DEVELOPMENT MAJOR PROGRAM TABLE# -->
		<div class = "header">MS in Computer Science: Software Development (30 sh)</div>
		<div class = "newSection"/>
		<div class = "section3">
			<table>
				<tr>
					<th class = "tableHeader" colspan = "1">
						400-level courses: 0-12 SH</th>
						<td class = "tableGrade">Gr</td>
						<td class = "tableGrade">SH</td>
				</tr>
		<!----- 400 level courses -->
				
				<?php
					for($i = 0; $i < 11; $i++)
						echo"<tr>	
								<td>&nbsp;&nbsp;&nbsp; </td>
								<td  class = 'tableGrade'></td>
								<td  class = 'tableGrade'></td>
							</tr>";
				?>
		
			</table>
		</div>
		
<!----- Second Half -->
		<div class = "section3">
			<table>
		<!----- 500 level courses -->
				<tr>	
					<th class = "tableHeader" colspan = "1">
						500-level courses: 18-30 sh
					</th>
					<td class = "tableGrade">Gr</td>
					<td class = "tableGrade">SH</td>
				</tr>
				
				<?php
					for($i = 0; $i < 3; $i++)
						echo"<tr>	
								<td>&nbsp;&nbsp;&nbsp; </td>
								<td class = 'tableGrade'></td>
								<td class = 'tableGrade'></td>
							</tr>";
				?>	
			</table>
		<!-- Program code, version number, possibly additional stuff. Should be able to grab this from the database. -->
			<br/>
			<table>
				<tr>
					<th><b>Program Code: GLASCSC</b></th>
				</tr>
				<tr>
					<th><b>Version Number: 2122</b></th> 
				</tr>
				
			</table>
		</div>
	</body>
</html>
			
