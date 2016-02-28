<!--
*	File: 			cscITMChecksheet.php
*	Created:	  	02/18/2016
*	Version:		1.1 (02/28/2016)
*	Author:			Christian Carreras, Christopher Steckhouse
*	Organization:	Kutztown University CSC 355 Spring
*	Purpose:		This php file creates a skeleton course checksheet
*					as visually close as possible to an official checksheet.
*					**THIS FILE IS FOR READ ONLY PURPOSES**
*					This file will be used only to view/print a checksheet.
-->
<?php
?>
<!DOCTYPE html>
<html>
	<head>
	<title>Computer Science: IT Master's Checksheet</title>
	<link rel = "stylesheet" type = "text/css" href = "Styles/checksheetStyle.css"/>
	</head>
	<body>
<!-- HEADER -->
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
		<div class = "newSection"></div>
		<div class = "headerBox">DEPARTMENT OF COMPUTER SCIENCE & INFORMATION TECHNOLOGY
		</div>
		
<!-- #MS CSC SOFTWARE DEVELOPMENT MAJOR PROGRAM TABLE# -->
		<div class = "header">MS in Computer Science: Information Technology (30 sh)</div>
		<div class = "newSection"></div>
		<div class = "buffer">&nbsp;</div>
		<div class = "section">
			<table>
				<tr>
					<th class = "tableHeader" colspan = "1">
						Core Courses (18-24 sh)</th>
						<td class = "tableGrade">Gr</td>
						<td class = "tableGrade">SH</td>
				</tr>
		<!-- CSC SDM CORE COURSES SECTION -->
				
				<?php
					for($i = 0; $i < 8; $i++)
						echo"<tr>	
								<td>&emsp;&emsp;</td>
								<td  class = 'tableGrade'></td>
								<td  class = 'tableGrade'></td>
							</tr>";
				?>
		<!-- Thesis (optional) -->
				<tr>
					<th class = "tableHeader" colspan = "1">
						Thesis (0 or 6 SH)</th>
						<td class = "tableGrade">Gr</td>
						<td class = "tableGrade">SH</td>
				</tr>
				<!-- Since there can only be ONE thesis (or, if multiple, only one can count!), no need to have multiple columns -->
				<tr>
					<td>&emsp;&emsp;</td>
					<td  class = 'tableGrade'></td>
					<td  class = 'tableGrade'></td>
				</tr>
			</table>
		</div>
<!-- Second half -->
		<div class = "section">
			<table>
		<!-- ELECTIVE COURSES SECTION -->
				<tr>	
					<th class = "tableHeader" colspan = "1">
						Elective Courses (0-6 sh)
					</th>
					<td class = "tableGrade">Gr</td>
					<td class = "tableGrade">SH</td>
				</tr>				
				<?php
					for($i = 0; $i < 2; $i++)
						echo"<tr>	
								<td>&emsp;&emsp;</td>
								<td class = 'tableGrade'></td>
								<td class = 'tableGrade'></td>
							</tr>";
				?>
			</table>
		<!-- Program code, version number, possibly additional stuff. Should be able to grab this from the database. -->
			<table>
				<tr><th class = "tableSpace"></th></tr>
				<tr>
					<th><b>Program Code: GLASCSCIT</b></th>
				</tr>
				<tr>
					<th><b>Version Number: 2138</b></th>
				</tr>			
			</table>
		</div>
		<div class = "buffer">&nbsp;</div>
	</body>
</html>
			