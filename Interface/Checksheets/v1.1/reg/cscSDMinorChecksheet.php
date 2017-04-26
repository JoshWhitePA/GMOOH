<!--
*	File: 			cscSDMinorChecksheet.php
*	Created:		02/21/2016
*	Version:		1.1 (02/28/2016)
*	Authors:		Micheal Para, Christian Carreras
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
	<title>Computer Science: SD Minor Checksheet</title>
	<link rel = "stylesheet" type = "text/css" href = "../../../Styles/checksheetStyleV1p1reg.css"/>
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
			<img src = "../../../Images/KU_Logo.jpg">
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
		<div class = "header">Compter Science Minor in Software Development</div>
		<div class = "newSection"></div>
<!-- #CSC SOFTWARE DEVELOPMENT MINOR PROGRAM TABLE# -->
		<div class = "buffer">&nbsp;</div>
		<div class = "section">
			<table>
				<tr>
					<th class = "tableHeader" colspan = "3">Minor Program: 21 sh</th>
				</tr>
				<tr>
					<th>&emsp;1. Required Courses: <b>15 sh</b></th>
					<td class = "tableGrade">Gr</td>
					<td class = "tableGrade">SH</td>
				</tr>
				<?php
					for($i = 0; $i < 5; $i++)
						echo"<tr>
								<td>&emsp;&emsp;</td>
								<td class = 'tableGrade'><b></b></td>
								<td class = 'tableGrade'><b></b></td>
							</tr>"
				?>
				<tr>
					<th>&emsp;2. Elective Course: <b>3 sh (any 200-level or higher CSC* course)</b></th>
					<td class = "tableGrade">Gr</td>
					<td class = "tableGrade">SH</td>
				</tr>
				<?php
					echo"<tr>
							<td>&emsp;&emsp;</td>
							<td class = 'tableGrade'><b></b></td>
							<td class = 'tableGrade'><b></b></td>
						</tr>"
				?>
				<tr>
					<th>&emsp;3. Elective Course: <b>3 sh (Any 300-level or higher CSC** course)</b></th>
					<td class = "tableGrade">Gr</td>
					<td class = "tableGrade">SH</td>
				</tr>
				<?php
					echo"<tr>
							<td>&emsp;&emsp;</td>
							<td class = 'tableGrade'><b></b></td>
							<td class = 'tableGrade'><b></b></td>
						</tr>"
				?>
				<tr><th class = "tableSpace"></th></tr>
				<tr><th class = "tableSpace"></th></tr>
			</table>
		 </div>
		 <div class ="section">
			<table>
				<tr>
					<th class = "tableHeader" colspan = "2">Total Semester Hours</th>
				</tr>
				<tr>
					<th>&emsp;Required Courses</th>
					<th class = "tableGrade">15</th>
				</tr>
				<tr>
					<th>&emsp;Elective Courses</th>
					<th class = "tableGrade">6</th>
				</tr>
				<tr>
					<th>&emsp;TOTAL</th>
					<th class = "tableGrade">21</th>
				</tr>
			</table>
			<table>
				<tr><th class = "tableSpace"></th></tr>
				<tr>
					<th class = "tableHeader">Software Development Minor</th>
				</tr>
				<tr>
					<td>&emsp;Program: ULASCOMSD2</td>
				</tr>
				<tr>
					<td>&emsp;Version #2118</td>
				</tr>
			</table>
		</div>
		<div class = "buffer">&nbsp;</div>
		<div class = "newSection"></div>
		<div class = "noteBuffer">&nbsp;</div>
		<div class = "notes3">
			*If you are considering a MS in Computer Science (Software Development) you should take CSC 235<br/>
			** If you are considering a MS in Computer Science (Software Development) you should take CSC 310
		</div>
		<div class = "noteBuffer">&nbsp;</div>
	</body>
</html>
