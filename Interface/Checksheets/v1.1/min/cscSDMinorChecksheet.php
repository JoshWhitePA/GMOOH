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
    $indexOGen=0;
    $indexOPro=0;
?>
<!DOCTYPE html>
<html>
	<head>
	<title>Computer Science: SD Minor Checksheet</title>
	<link rel = "stylesheet" type = "text/css" href = "Styles/checksheetStyleV1p1min.css"/>
	</head>
	<body>
<!-- #CSC SOFTWARE DEVELOPMENT MINOR PROGRAM TABLE# -->
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
						echo"<tr>
								<th class = 'courseBox'><div id = 'CSC: SD Minor Required' onclick = 'findCourses(this)' class = ' courseNameBoxPro'>CSC 125: Discrete Math for Computing I</div></th>
								<td class = 'tableGrade'><b><input class = 'gradeBox' id = 'gradeBox' type = 'text' maxlength = '2' /></b></td>
								<td class = 'tableGrade'><b></b></td>
							</tr>";
							$indexOPro++;
						echo"<tr>
								<th class = 'courseBox'><div id = 'CSC: SD Minor Required' onclick = 'findCourses(this)' class = ' courseNameBoxPro'>CSC 225: Discrete Math for Computing II</div></th>
								<td class = 'tableGrade'><b><input class = 'gradeBox' id = 'gradeBox' type = 'text' maxlength = '2' /></b></td>
								<td class = 'tableGrade'><b></b></td>
							</tr>";
							$indexOPro++;
						echo"<tr>
								<th class = 'courseBox'><div id = 'CSC: SD Minor Required' onclick = 'findCourses(this)' class = ' courseNameBoxPro'>CSC 135: Computer Science I</div></th>
								<td class = 'tableGrade'><b><input class = 'gradeBox' id = 'gradeBox' type = 'text' maxlength = '2' /></b></td>
								<td class = 'tableGrade'><b></b></td>
							</tr>";
							$indexOPro++;
						echo"<tr>
								<th class = 'courseBox'><div id = 'CSC: SD Minor Required' onclick = 'findCourses(this)' class = ' courseNameBoxPro'>CSC 136: Computer Science II</div></th>
								<td class = 'tableGrade'><b><input class = 'gradeBox' id = 'gradeBox' type = 'text' maxlength = '2' /></b></td>
								<td class = 'tableGrade'><b></b></td>
							</tr>";
							$indexOPro++;
						echo"<tr>
								<th class = 'courseBox'><div id = 'CSC: SD Minor Required' onclick = 'findCourses(this)' class = ' courseNameBoxPro'>CSC 237: Data Structures</div></th>
								<td class = 'tableGrade'><b><input class = 'gradeBox' id = 'gradeBox' type = 'text' maxlength = '2' /></b></td>
								<td class = 'tableGrade'><b></b></td>
							</tr>";
							$indexOPro++;							
				?>
				<tr>
					<th id = "cscmel1" class = "dropdownSection" onclick = 'displaySectionNotes(this.id)'><a class = "dropButtonNotes">
						&emsp;2. Elective Course: <b>3 sh</b></a>
						<div class = "dropdownSectionNotes">Any 200-level or higher CSC course</div>
					</th>
					<td class = "tableGrade">Gr</td>
					<td class = "tableGrade">SH</td>
				</tr>
				<?php
					echo"<tr>
							<th class = 'courseBox'><div id = 'CSC: SD Minor Elective 1' onclick = 'findCourses(this)' class = 'courseNameBox courseNameBoxPro'>&emsp;</div></th>
							<td class = 'tableGrade'><b><input class = 'gradeBox' id = 'gradeBox' type = 'text' maxlength = '2' /></b></td>
							<td class = 'tableGrade'><b></b></td>
						</tr>";
						$indexOPro++;
				?>
				<tr>
					<th id = "cscmel2" class = "dropdownSection" onclick = 'displaySectionNotes(this.id)'><a class = "dropButtonNotes">
						&emsp;3. Elective Course: <b>3 sh</b></a>
						<div class = "dropdownSectionNotes">Any 300-level or higher CSC course</div>
					</th>
					<td class = "tableGrade">Gr</td>
					<td class = "tableGrade">SH</td>
				</tr>
				<?php
					echo"<tr>
							<th class = 'courseBox'><div id = 'CSC: SD Minor Elective 2' onclick = 'findCourses(this)' class = 'courseNameBox courseNameBoxPro'>&emsp;</div></th>
							<td class = 'tableGrade'><b><input class = 'gradeBox' id = 'gradeBox' type = 'text' maxlength = '2' /></b></td>
							<td class = 'tableGrade'><b></b></td>
						</tr>";
						$indexOPro++;
				?>
				<tr><th class = "tableSpace"></th></tr>
				<tr><th class = "tableSpace"></th></tr>
			</table>
            <input type="hidden" id="programID" value="ULASCSCIT" />
            <?php 
                echo "<input type='hidden' id='programCount' value='".$indexOPro."'  />";
            ?>			
		 </div>
		</div>
	</body>
</html>
