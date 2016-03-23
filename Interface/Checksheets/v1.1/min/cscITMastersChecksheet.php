<!--
*	File: 			cscITMChecksheet.php
*	Created:	  	02/18/2016
*	Version:		1.1 (02/28/2016)
*	Authors:			Christian Carreras, Christopher Steckhouse
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
	<title>MS Computer Science: IT Checksheet</title>
	<link rel = "stylesheet" type = "text/css" href = "Styles/checksheetStyleV1p1min.css"/>
	</head>
	<body>
<!-- #MS CSC INFORMATION TECHNOLOGY MAJOR PROGRAM TABLE# -->
		<div class = "section">
			<table>
				<tr>
					<th class = "tableHeader" colspan = "1">
						Core Courses (18-24 sh)</th>
						<td class = "tableGrade">Gr</td>
						<td class = "tableGrade">SH</td>
				</tr>
		<!-- CSC ITM CORE COURSES SECTION -->
				
				<?php
					for($i = 0; $i < 8; $i++)
						echo"<tr>	
								<th id = 'MS CSC:IT Required' onclick = 'findCourses(this)'><input class = 'courseNameBox' readonly/></th>
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
					<th id = 'MS CSC:IT Thesis' onclick = 'findCourses(this)'><input class = 'courseNameBox' readonly/></th>
					<td  class = 'tableGrade'></td>
					<td  class = 'tableGrade'></td>
				</tr>
			</table>
<!-- Second half -->
			<table>
		<!-- ELECTIVE COURSES SECTION -->
				<tr><td class = "tableSpace"></td></tr>
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
								<th id = 'MS CSC:IT Elective' onclick = 'findCourses(this)'><input class = 'courseNameBox' readonly/></th>
								<td class = 'tableGrade'></td>
								<td class = 'tableGrade'></td>
							</tr>";
				?>
			</table>
		</div>
	</body>
</html>
			