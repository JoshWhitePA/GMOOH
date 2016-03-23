<!--
*	File: 			cscSDMChecksheet.php
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
	<title>MS Computer Science: SD Checksheet</title>
	<link rel = "stylesheet" type = "text/css" href = "Styles/checksheetStyleV1p1min.css"/>
	</head>
	<body>	
<!-- #MS CSC SOFTWARE DEVELOPMENT MAJOR PROGRAM TABLE# -->
		<div class = "section">
			<table>
				<tr>
					<th class = "tableHeader" colspan = "3"><u title = "Click for notes" onclick = "msCSCNotes()">
						Master Program: 30 sh</u></th>
				</tr>
				<tr>
					<th colspan = "1">&emsp;1. 400-level Courses: <b>(0-12 sh)</b></th>
						<td class = "tableGrade">Gr</td>
						<td class = "tableGrade">SH</td>
				</tr>
		<!-- 400 level courses -->			
				<?php
					for($i = 0; $i < 4; $i++)
						echo"<tr>	
								<th class = 'courseBox'><div id = 'MS CSC:SD 400-Level' onclick = 'findCourses(this)' class = 'courseNameBox'>&emsp;</div></th>
								<td  class = 'tableGrade'></td>
								<td  class = 'tableGrade'></td>
							</tr>";
				?>	
		<!-- 500 level courses -->
				<tr>	
					<th colspan = "1">&emsp;2. 500-level Courses: <b>(18-30 sh)</b></th>
					<td class = "tableGrade">Gr</td>
					<td class = "tableGrade">SH</td>
				</tr>			
				<?php
					for($i = 0; $i < 10; $i++)
						echo"<tr>	
								<th class = 'courseBox'><div id = 'MS CSC:SD 500-Level' onclick = 'findCourses(this)' class = 'courseNameBox'>&emsp;</div></th>
								<td class = 'tableGrade'></td>
								<td class = 'tableGrade'></td>
							</tr>";
				?>	
			</table>
		</div>
	</body>
</html>
			
