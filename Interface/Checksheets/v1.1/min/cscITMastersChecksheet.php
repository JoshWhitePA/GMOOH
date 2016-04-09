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
					<th class = "tableHeader" colspan = "3"><u title = "Click for notes" onclick = "showDialog('#msCSCNotes', 550, true)">
						Master Program: 30 sh</u></th>
				</tr>
				<tr>
					<th colspan = "1">&emsp;1. Core Courses <b>(18-24 sh)</b></th>
					<td class = "tableGrade">Gr</td>
					<td class = "tableGrade">SH</td>
				</tr>
		<!-- CSC ITM CORE COURSES SECTION -->
				
				<?php
					for($i = 0; $i < 8; $i++)
						echo"<tr>	
								<th class = 'courseBox'><div id = 'MS CSC:IT Required' onclick = 'findCourses(this)' class = 'courseNameBox'>&emsp;</div></th>
								<td  class = 'tableGrade'><input class = 'gradeBox' id = 'gradeBox' type = 'text' maxlength = '2' /></td>
								<td  class = 'tableGrade'></td>
							</tr>";
				?>
		<!-- Thesis (optional) -->
				<tr>
					<th colspan = "1">&emsp;2. Thesis <b>(0 or 6 sh)</b></th>
					<td class = "tableGrade">Gr</td>
					<td class = "tableGrade">SH</td>
				</tr>
				<!-- Since there can only be ONE thesis (or, if multiple, only one can count!), no need to have multiple columns -->
				<tr>
					<th class = 'courseBox'><div id = 'MS CSC:IT Thesis' onclick = 'findCourses(this)' class = 'courseNameBox'>&emsp;</div></th>
					<td  class = 'tableGrade'><input class = 'gradeBox' id = 'gradeBox' type = 'text' maxlength = '2' /></td>
					<td  class = 'tableGrade'></td>
				</tr>
		<!-- ELECTIVE COURSES SECTION -->
				<tr>
					<th colspan = "1">&emsp;3. Elective Courses <b>(0-6 sh)</b></th>
					<td class = "tableGrade">Gr</td>
					<td class = "tableGrade">SH</td>
				</tr>				
				<?php
					for($i = 0; $i < 2; $i++)
						echo"<tr>	
								<th class = 'courseBox'><div id = 'MS CSC:IT Elective' onclick = 'findCourses(this)' class = 'courseNameBox'>&emsp;</div></th>
								<td class = 'tableGrade'><input class = 'gradeBox' id = 'gradeBox' type = 'text' maxlength = '2' /></td>
								<td class = 'tableGrade'></td>
							</tr>";
				?>
			</table>
		</div>
	</body>
</html>
			
