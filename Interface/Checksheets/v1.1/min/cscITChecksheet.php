<!--
*	File: 			cscITChecksheetTest.php
*	Created:		02/18/2016
*	Version:		1.1 (02/28/2016)
*	Author:			Christian Carreras
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
	<title>BS Computer Science: IT Checksheet</title>
	<link rel = "stylesheet" type = "text/css" href = "Styles/checksheetStyleV1p1min.css"/>
	</head>	
	<body>
<!-- #GENERAL EDUCATION# -->
<!-- I. UNIVERSITY CORE TABLE -->
		<div class = "section">
			<table>
				<tr>
					<th class = "tableCaption">I. UNIVERSITY CORE</th>
					<th class = "tableGradeCaption">RC</th>
					<th class = "tableGradeCaption">CR</th>
					<th class = "tableGradeCaption">GR</th>
				</tr>
		<!-- A. ORAL COMMUNICATION SECTION -->
				<tr>
					<th>A. Oral Communication</th>
				</tr>
				<!--<tr><td><button style = "height: 140%; width: 100%; text-align: left; border: none; background-color: transparent">COM 010</button></td><td></td><td></td></tr>-->
				<?php
					echo"<tr>
							<th id = 'Oral Communication' onclick = 'findCourses(this)'><input class = 'courseNameBox' readonly/></th>
							<th class = 'tableGrade'><b>3</b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'><b>
							</b></th>
						</tr>"
				?>
		<!-- B. WRITTEN COMMUNICATION SECTION -->
				<tr>
					<th>B. Written Communication</th>
				</tr>
				<?php
					echo"<tr>
							<th id = 'Written Communication' onclick = 'findCourses(this)'><input class = 'courseNameBox' readonly/></th>
							<th class = 'tableGrade'><b>3</b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'><b></b></th>
						</tr>"
				?>
		<!-- C. MATHEMATICS SECTION -->
				<tr>
					<th>C. Mathematics</th>
				</tr>
				<?php
					echo"<tr>
							<th id = 'Mathematics' onclick = 'findCourses(this)'><input class = 'courseNameBox' readonly/></th>
							<th class = 'tableGrade'><b>3</b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'><b></b></th>
						</tr>"
				?>
		<!-- D. WELLNESS SECTION -->
				<tr>
					<th>D. Wellness</th>
				</tr>
				<?php
					echo"<tr>
							<th id = 'Wellness' onclick = 'findCourses(this)'><input class = 'courseNameBox' readonly/></th>
							<th class = 'tableGrade'><b>3</b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'><b></b></th>
						</tr>"
				?>
			</table>
<!-- II. UNIVERSITY DISTRIBUTION TABLE -->
			<table>
				<tr><th class = "tableSpace"></th></tr>
				<tr>
					<th class = "tableCaption">II. UNIVERSITY DISTRIBUTION</th>
					<th class = "tableGradeCaption">RC</th>
					<th class = "tableGradeCaption">CR</th>
					<th class = "tableGradeCaption">GR</th>
					<th class = "tableGradeCaption">CAC</th>
				</tr>
		<!-- A. NATURAL SCIENCES SECTION -->
				<tr>
					<th>A. Natural Sciences</th>
				</tr>
				<?php
					echo"<tr>
							<th id = 'Natural Sciences' onclick = 'findCourses(this)'><input class = 'courseNameBox' readonly/></th>
							<th class = 'tableGrade'><b>3</b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'></th>
						</tr>"
				?>
		<!-- B. SOCIAL SCIENCES SECTION -->
				<tr>
					<th>B. Social Sciences</th>
				</tr>
				<?php
					echo"<tr>
							<th id = 'Social Sciences' onclick = 'findCourses(this)'><input class = 'courseNameBox' readonly/></th>
							<th class = 'tableGrade'><b>3</b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'></th>
						</tr>"
				?>
		<!-- C. HUMANITIES SECTION -->
				<tr>
					<th>C. Humanities</th>
				</tr>
				<?php
					echo"<tr>
							<th id = 'Humanities' onclick = 'findCourses(this)'><input class = 'courseNameBox' readonly/></th>
							<th class = 'tableGrade'><b>3</b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'></th>
						</tr>"
				?>
		<!-- D. ARTS SECTION -->
				<tr>
					<th>D. Arts</th>
				</tr>
				<?php
					echo"<tr>
							<th id = 'Arts' onclick = 'findCourses(this)'><input class = 'courseNameBox' readonly/></th>
							<th class = 'tableGrade'><b>3</b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'></th>
						</tr>"
				?>
		<!-- E. FREE ELECTIVE SECTION -->
				<tr>
					<th>E. Free Elective</th>
				</tr>
				<?php
					echo"<tr>
							<th id = 'II. E. Free Elective' onclick = 'findCourses(this)'><input class = 'courseNameBox' readonly/></th>
							<th class = 'tableGrade'><b>3</b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'></th>
						</tr>"
				?>
			</table>
<!-- III. COMPETENCIES ACROSS THE CIRRICULUM TABLE-->
			<table>
				<tr><th class = "tableSpace"></th></tr>
				<tr>
					<th class = "tableCaption">III. COMPETENCIES ACROSS THE CIRRICULUM</th>
					<th class = "tableGradeCaption">RC</th>
					<th class = "tableGradeCaption">CR</th>
					<th class = "tableGradeCaption">GR</th>
					<th class = "tableGradeCaption">CAC</th>
				</tr>
		<!-- A. WRITING INTENSIVE SECTION -->
				<tr>
					<th>A. Writing Intensive</th>
				</tr>
				<?php
					for($i = 0; $i < 3; $i++)
					{
						echo "<tr>
								<th id = 'Writing Intensive' onclick = 'findCourses(this)'><input class = 'courseNameBox' readonly/></th>
								<th class = 'tableGrade'><b>3</b></th>
								<th class = 'tableGrade'><b></b></th>
								<th class = 'tableGrade'><b></b></th>
								<th class = 'tableGrade'>WI</th>
							</tr>";
					}
				?>
		<!-- B. QUATNTITAVE LEARNING / COMPUTER-INTENSIVE SECTION -->
				<tr>
					<th>B. Quantitative Learning OR
						<br/>&emsp; Computer-Intensive
					</th>
				</tr>
				<?php
					echo"<tr>
							<th id = 'QL or CP' onclick = 'findCourses(this)'><input class = 'courseNameBox' readonly/></th>
							<th class = 'tableGrade'><b>3</b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'></th>
						</tr>"
				?>
		<!-- C. VISUAL LITERACY / COMMUNICATION-INTENSIVE SECTION -->
				<tr>
					<th>C. Visual Literacy OR
						<br/>&emsp; Communication-Intensive
					</th>
				</tr>
				<?php
					echo"<tr>
							<th id = 'VL or CM' onclick = 'findCourses(this)'><input class = 'courseNameBox' readonly/></th>
							<th class = 'tableGrade'><b>3</b></th>
							<th class = 'tableGrade'><b>						
							</b></th>
							<th class = 'tableGrade'><b>
							</b></th>
							<th class = 'tableGrade'></th>
						</tr>"
				?>
		<!-- D. CULTURAL DIVERSITY SECTION -->
				<tr>
					<th>D. Cultural Diversity</th>
				</tr>
				<?php
					echo"<tr>
							<th id = 'Cultural Diversity' onclick = 'findCourses(this)'><input class = 'courseNameBox' readonly/></th>
							<th class = 'tableGrade'><b>3</b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'>CD</th>
						</tr>"
				?>
		<!-- E. CRITICAL THINKING SECTION -->
				<tr>
					<th>E. Critical Thinking</th>
				</tr>
				<?php
					echo"<tr>
							<th id = 'Critical Thinking' onclick = 'findCourses(this)'><input class = 'courseNameBox' readonly/></th>
							<th class = 'tableGrade'><b>3</b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'>CT</th>
						</tr>"
				?>
<!-- IV. COLLEGE DISTRIBUTION TABLE -->
			</table>
			<table>
				<br/><hr/><br/>
				<tr>
					<th class = "tableCaption">IV. COLLEGE DISTRIBUTION</th>
					<th class = "tableGradeCaption">RC</th>
					<th class = "tableGradeCaption">CR</th>
					<th class = "tableGradeCaption">GR</th>
					<th class = "tableGradeCaption">CAC</th>
				</tr>
		<!-- A. NATURAL SCIENCES SECTION -->
				<tr>
					<th>A. Natural Science, Mathematics, and Computer Science#</th>
				</tr>
				<!-- 1. NATURAL SCIENCES WITH LAB SUBSECTION -->
				<tr>
					<th>&nbsp; 1. Natural Science with Lab</th>
				</tr>
				<?php
					echo"<tr>
							<th id = 'Natural Science with Lab' onclick = 'findCourses(this)'><input class = 'courseNameBox' readonly/></th>
							<th class = 'tableGrade'><b>3</b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'></th>
						</tr>"
				?>
				<!-- 2. NATURAL SCIENCES ELECTIVE SUBSECTION -->
				<tr>
					<th>&nbsp; 2. Elective</th>
				</tr>
				<?php
					echo"<tr>
							<th id = 'IV. A. 2. Elective' onclick = 'findCourses(this)'><input class = 'courseNameBox' readonly/></th>
							<th class = 'tableGrade'><b>3</b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'></th>
						</tr>"
				?>
		<!-- B. SOCIAL SCIENCE SECTION -->
				<tr>
					<th>B. Social Science</th>
				</tr>
				<!-- 1. SOCIAL SCIENCE ELECTIVE 1 SUBSECTION -->
				<tr>
					<th>&nbsp; 1. Elective</th>
				</tr>
				<?php
					echo"<tr>
							<th id = 'IV. B. 1. Elective' onclick = 'findCourses(this)'><input class = 'courseNameBox' readonly/></th>
							<th class = 'tableGrade'><b>3</b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'></th>
						</tr>"
				?>
				<!-- 2. SOCIAL SCIENCE ELECTIVE 2 SUBSECTION -->
				<tr>
					<th>&nbsp; 2. Elective</th>
				</tr>
				<?php
					echo"<tr>
							<th id = 'IV. B. 2. Elective' onclick = 'findCourses(this)'><input class = 'courseNameBox' readonly/></th>
							<th class = 'tableGrade'><b>3</b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'></th>
						</tr>"
				?>
				<!-- 3. SOCIAL SCIENCE ELECTIVE 3 SUBSECTION -->
				<tr>
					<th>&nbsp; 3. Elective</th>
				</tr>
				<?php
					echo"<tr>
							<th id = 'IV. B. 3. Elective' onclick = 'findCourses(this)'><input class = 'courseNameBox' readonly/></th>
							<th class = 'tableGrade'><b>3</b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'></th>
						</tr>"
				?>
			</table>
<!-- IV. COLLEGE DISTRIBUTION TABLE CONTINUED -->
			<table>
				<tr><th class = "tableSpace"></th></tr>
				<tr>
					<th class = "tableCaption"></th>
					<th class = "tableGradeCaption">RC</th>
					<th class = "tableGradeCaption">CR</th>
					<th class = "tableGradeCaption">GR</th>
					<th class = "tableGradeCaption">CAC</th>
				</tr>
		<!-- C. HUMANITIES SECTION -->
				<tr>
					<th>C. Humanities</th>
				</tr>
				<!-- 1. HUMANITIES ELECTIVE 1 SUBSECTION -->
				<tr>
					<th>&emsp;1. Elective</th>
				</tr>
				<?php
					echo"<tr>
							<th id = 'IV. C. 1. Elective' onclick = 'findCourses(this)'><input class = 'courseNameBox' readonly/></th>
							<th class = 'tableGrade'><b>3</b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'></th>
						</tr>"
				?>
				<!-- 2. HUMANITIES ELECTIVE 2 SUBSECTION -->
				<tr>
					<th>&emsp;2. Elective</th>
				</tr>
				<?php
					echo"<tr>
							<th id = 'IV. C. 2. Elective' onclick = 'findCourses(this)'><input class = 'courseNameBox' readonly/></th>
							<th class = 'tableGrade'><b>3</b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'></th>
						</tr>"
				?>
				<!-- 3. SOCIAL SCIENCE ELECTIVE 3 SUBSECTION -->
				<tr>
					<th>&emsp;3. Elective</th>
				</tr>
				<?php
					echo"<tr>
							<th id = 'IV. C. 3. Elective' onclick = 'findCourses(this)'><input class = 'courseNameBox' readonly/></th>
							<th class = 'tableGrade'><b>3</b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'></th>
						</tr>"
				?>
		<!-- D. FREE ELECTIVES SECTION -->
				<tr>
					<th>D. Free Electives</th>
				</tr>
				<?php
					for($i = 0; $i < 3; $i++)
					{
						echo"<tr>
								<th id = 'IV. D. Elective' onclick = 'findCourses(this)'><input class = 'courseNameBox' readonly/></th>
								<th class = 'tableGrade'><b>3</b></th>
								<th class = 'tableGrade'><b></b></th>
								<th class = 'tableGrade'><b></b></th>
								<th class = 'tableGrade'></th>
							</tr>";
					}
				?>
			</table>
			<br/><hr/><br/>
<!-- #BS CSC INFORMATION TECHNOLOGY MAJOR PROGRAM TABLE# -->
			<table>
				<tr>
					<th class = "tableHeader" colspan = "3">
						B. Major Program: 57 sh</th>
				</tr>
		<!-- CSC IT REQUIRED COURSES SECTION -->
				<tr>
					<th>&emsp;1. Required Courses: <b>33 sh</b></th>
					<td class = "tableGrade">Gr</td>
					<td class = "tableGrade">SH</td>
				</tr>
				<?php
					for($i = 0; $i < 11; $i++)
						echo"<tr>	
								<th id = 'BS CSC:IT Required' onclick = 'findCourses(this)'><input class = 'courseNameBox' readonly/></th>
								<td  class = 'tableGrade'></td>
								<td  class = 'tableGrade'></td>
							</tr>";
				?>
		<!-- CSC IT ELECTIVE COURSES SECTION -->
				<tr>
					<th>&nbsp; 2. Elective Courses: <b>15-24 sh</b></th>
					<td class = "tableGrade">Gr</td>
					<td class = "tableGrade">SH</td>
				</tr>
				<?php
					for($i = 0; $i < 8; $i++)
						echo"<tr>	
								<th id = 'BS CSC:IT Elective 1' onclick = 'findCourses(this)'><input class = 'courseNameBox' readonly/></th>
								<td  class = 'tableGrade'></td>
								<td  class = 'tableGrade'></td>
							</tr>";
				?>
		<!-- CSC IT ELECTIVE COURSES SECTION CONTINUED -->
				<tr>
					<th>&nbsp; 3. Elective Courses: <b>0-9 sh</b></th>
					<td class = "tableGrade">Gr</td>
					<td class = "tableGrade">SH</td>
				</tr>
				<?php
					for($i = 0; $i < 3; $i++)
						echo"<tr>	
								<th id = 'BS CSC:IT Elective 2' onclick = 'findCourses(this)'><input class = 'courseNameBox' readonly/></th>
								<td  class = 'tableGrade'></td>
								<td  class = 'tableGrade'></td>
							</tr>";
				?>
				<tr><th class = "tableSpace"></th></tr>
			</table>	
<!-- CSC INFORMATION TECHNOLOGY CONCOMITANT COURSE TABLE -->
			<table>
		<!-- CSC IT CONCOMITANT COURSES SECTION -->
				<tr>	
					<th class = "tableHeader" colspan = "3">
						C. Concomitant Courses: 3 sh
					</th>
				</tr>
				<tr>
					<th>&nbsp; 1. Required Courses: <b>3 sh</b></th>
					<td class = "tableGrade">Gr</td>
					<td class = "tableGrade">SH</td>
				</tr>
				<?php
					for($i = 0; $i < 1; $i++)
						echo"<tr>	
								<th id = 'BS CSC:IT Concomitant' onclick = 'findCourses(this)'><input class = 'courseNameBox' readonly/></th>
								<td  class = 'tableGrade'></td>
								<td  class = 'tableGrade'></td>
							</tr>";
				?>
		<!-- CSC IT INTERNSHIP SECTION -->
				<tr>
					<th>&nbsp; 2. Internship - optional (free elective)</th>
					<td class = "tableGrade">Gr</td>
					<td class = "tableGrade">SH</td>
				</tr>
				<?php
					for($i = 0; $i < 2; $i++)
						echo"<tr>	
								<th id = 'BS CSC:IT Internship' onclick = 'findCourses(this)'><input class = 'courseNameBox' readonly/></th>
								<td  class = 'tableGrade'></td>
								<td  class = 'tableGrade'></td>
							</tr>";
				?>
			</table>
		</div>
	</body>
</html>
			
