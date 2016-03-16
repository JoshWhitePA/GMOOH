<!--
*	File: 			cscITMinorChecksheet.php
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
	<title>Computer Science: IT Minor Checksheet</title>
	<link rel = "stylesheet" type = "text/css" href = "Styles/checksheetStyleV1p1min.css"/>
	</head>	
	<body>
<!-- #CSC SOFTWARE DEVELOPMENT MINOR PROGRAM TABLE# -->
		<div class = "section">
			<table>
				<tr>
					<th class = "tableHeader" colspan = "3">Minor Program: 21sh</th>
				</tr>
				<tr>
					<th>&emsp;1. Required Courses: <b>15 sh</b></th>
					<td class = "tableGrade">Gr</td>
					<td class = "tableGrade">SH</td>
				</tr>
				<?php
					for($i = 0; $i < 5; $i++)
						echo"<tr>
								<th id = 'CSC:IT Minor 1. Required' onclick = 'findCourses(this.id)'><input class = 'courseNameBox' readonly/></th>
								<td class = 'tableGrade'><b></b></td>
								<td class = 'tableGrade'><b></b></td>
							</tr>"
				?>
				<tr>
					<th>&emsp;2. Elective Course: <b>3 sh</b></th>
					<td class = "tableGrade">Gr</td>
					<td class = "tableGrade">SH</td>
				</tr>
				<?php
					echo"<tr>
							<th id = 'CSC:IT Minor 2. Elective' onclick = 'findCourses(this.id)'><input class = 'courseNameBox' readonly/></th>
							<td class = 'tableGrade'><b></b></td>
							<td class = 'tableGrade'><b></b></td>
						</tr>"
				?>
				<tr>
					<th>&emsp;3. Elective Course: <b>3 sh</b></th>
					<td class = "tableGrade">Gr</td>
					<td class = "tableGrade">SH</td>
				</tr>
				<?php
					echo"<tr>
							<th id = 'CSC:IT Minor 3. Elective' onclick = 'findCourses(this.id)'><input class = 'courseNameBox' readonly/></th>
							<td class = 'tableGrade'><b></b></td>
							<td class = 'tableGrade'><b></b></td>
						</tr>"
				?>
				<tr><th class = "tableSpace"></th></tr>
				<tr><th class = "tableSpace"></th></tr>
			</table>
		</div>
	</body>
</html>
