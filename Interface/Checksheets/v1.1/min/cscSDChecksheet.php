<!--
*	File: 		cscSDChecksheetTest.php
*	Created:	02/13/2016
*	Version:	1.1 (02/27/2016)
*	Author:		Christian Carreras
*	Organization:	Kutztown University CSC 355 Spring
*	Purpose:	This php file creates a skeleton course checksheet
*			as visually close as possible to an official checksheet.
*			**THIS FILE IS FOR READ ONLY PURPOSES**
*			This file will be used only to view/print a checksheet.
-->
<?php
?>
<!DOCTYPE html>
<html>
	<head>
	<title>BS Computer Science: SD Checksheet</title>
	<link rel = "stylesheet" type = "text/css" href = "Styles/checksheetStyleV1p1min.css"/>
	</head>
	<body>
<!-- #GENERAL EDUCATION# -->
<!-- I. UNIVERSITY CORE TABLE -->
		<div class = "section">
			<table>
				<tr>
					<th class = "tableCaption">I. UNIVERSITY CORE</th>
					<th class = "tableGradeCaption" title = "Minimum required number of credits">RC</th>
					<th class = "tableGradeCaption" title = "Credits earned">CR</th>
					<th class = "tableGradeCaption" title = "Grade earned">GR</th>
				</tr>
		<!-- A. ORAL COMMUNICATION SECTION -->
				<tr>
					<th id = "oc" class = "dropdownSection" onclick = 'displaySectionNotes(this.id)'><a class = "dropButtonNotes">
						A. Oral Communication</a>
						<div class = "dropdownSectionNotes">COM 010 or above</div>
					</th>
				</tr>
				<?php
					echo"<tr>
							<th class = 'courseBox'><div id = 'Oral Communication' onclick = 'findCourses(this)' class = 'courseNameBox'>&emsp;</div></th>
							<th class = 'tableGrade'><b>3</b></th>
							<th class = 'tableGrade'><b><input class = 'gradeBox' id = 'gradeBox' type = 'text' maxlength = '2' /></b></th>
							<th class = 'tableGrade'><b>
							</b></th>
						</tr>"
				?>
		<!-- B. WRITTEN COMMUNICATION SECTION -->
				<tr>
					<th id = "wc" class = "dropdownSection" onclick = 'displaySectionNotes(this.id)'><a class = "dropButtonNotes">
						B. Written Communication</a>
						<div class = "dropdownSectionNotes">ENG 23, 24 or 25</div>
					</th>
				</tr>
				<?php
					echo"<tr>
							<th class = 'courseBox'><div id = 'Written Communication' onclick = 'findCourses(this)' class = 'courseNameBox'>&emsp;</div></th>
							<th class = 'tableGrade'><b>3</b></th>
							<th class = 'tableGrade'><b><input class = 'gradeBox' id = 'gradeBox' type = 'text' maxlength = '2' /></b></th>
							<th class = 'tableGrade'><b></b></th>
						</tr>"
				?>
		<!-- C. MATHEMATICS SECTION -->
				<tr>
					<th id = "mat" class = "dropdownSection" onclick = 'displaySectionNotes(this.id)'><a class = "dropButtonNotes">
						C. Mathematics</a>
						<div class = "dropdownSectionNotes">MAT 17 or above</div>
					</th>
				</tr>
				<?php
					echo"<tr>
							<th class = 'courseBox'><div id = 'Mathematics' onclick = 'findCourses(this)' class = 'courseNameBox'>&emsp;</div></th>
							<th class = 'tableGrade'><b>3</b></th>
							<th class = 'tableGrade'><b><input class = 'gradeBox' id = 'gradeBox' type = 'text' maxlength = '2' /></b></th>
							<th class = 'tableGrade'><b></b></th>
						</tr>"
				?>
		<!-- D. WELLNESS SECTION -->
				<tr>
					<th id = "well" class = "dropdownSection" onclick = 'displaySectionNotes(this.id)'><a class = "dropButtonNotes">
						D. Wellness</a>
						<div class = "dropdownSectionNotes">Any 3-credit HEA course</div>
					</th>
				</tr>
				<?php
					echo"<tr>
							<th class = 'courseBox'><div id = 'Wellness' onclick = 'findCourses(this)' class = 'courseNameBox'>&emsp;</div></th>
							<th class = 'tableGrade'><b>3</b></th>
							<th class = 'tableGrade'><b><input class = 'gradeBox' id = 'gradeBox' type = 'text' maxlength = '2' /></b></th>
							<th class = 'tableGrade'><b></b></th>
						</tr>"
				?>
			</table>
<!-- II. UNIVERSITY DISTRIBUTION TABLE -->
			<table>
				<tr><th class = "tableSpace"></th></tr>
				<tr>
					<th class = "tableCaption">II. UNIVERSITY DISTRIBUTION</th>
					<th class = "tableGradeCaption" title = "Minimum required number of credits">RC</th>
					<th class = "tableGradeCaption" title = "Credits earned">CR</th>
					<th class = "tableGradeCaption" title = "Grade earned">GR</th>
					<th class = "tableGradeCaption" title = "Competency Across the Curriculum">CAC</th>
				</tr>
		<!-- A. NATURAL SCIENCES SECTION -->
				<tr>
					<th id = "ns" class = "dropdownSection" onclick = 'displaySectionNotes(this.id)'><a class = "dropButtonNotes">
						A. Natural Sciences</a>
						<div class = "dropdownSectionNotes">Any
							AST, BIO, CHM, ENV, GEL, PHY, MAR, or <u title = "Click for notes" onclick = "showDialog('#geNotes1', 535, true)">GEG*</u></div>
					</th>
				</tr>
				<?php
					echo"<tr>
							<th class = 'courseBox'><div id = 'Natural Sciences' onclick = 'findCourses(this)' class = 'courseNameBox'>&emsp;</div></th>
							<th class = 'tableGrade'><b>3</b></th>
							<th class = 'tableGrade'><b><input class = 'gradeBox' id = 'gradeBox' type = 'text' maxlength = '2' /></b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'></th>
						</tr>"
				?>
		<!-- B. SOCIAL SCIENCES SECTION -->
				<tr>
					<th id = "ss" class = "dropdownSection" onclick = 'displaySectionNotes(this.id)'><a class = "dropButtonNotes">
						B. Social Sciences</a>
						<div class = "dropdownSectionNotes">Any ANT, CRJ, ECO, HIS, INT,
							PSY, POL, SOC, SSE, SWK, or <u title = "Click for notes" onclick = "showDialog('#geNotes1', 535, true)">GEG*</u></div>
					</th>
				</tr>
				<?php
					echo"<tr>
							<th class = 'courseBox'><div id = 'Social Sciences' onclick = 'findCourses(this)' class = 'courseNameBox'>&emsp;</div></th>
							<th class = 'tableGrade'><b>3</b></th>
							<th class = 'tableGrade'><b><input class = 'gradeBox' id = 'gradeBox' type = 'text' maxlength = '2' /></b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'></th>
						</tr>"
				?>
		<!-- C. HUMANITIES SECTION -->
				<tr>
					<th id = "hum" class = "dropdownSection" onclick = 'displaySectionNotes(this.id)'><a class = "dropButtonNotes">
						C. Humanities</a>
						<div class = "dropdownSectionNotes">Any ENG, HUM, PAG, PHI, WGS,
							WRI, or Modern Language</div>
					</th>
				</tr>
				<?php
					echo"<tr>
							<th class = 'courseBox'><div id = 'Humanities' onclick = 'findCourses(this)' class = 'courseNameBox'>&emsp;</div></th>
							<th class = 'tableGrade'><b>3</b></th>
							<th class = 'tableGrade'><b><input class = 'gradeBox' id = 'gradeBox' type = 'text' maxlength = '2' /></b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'></th>
						</tr>"
				?>
		<!-- D. ARTS SECTION -->
				<tr>
					<th id = "art" class = "dropdownSection" onclick = 'displaySectionNotes(this.id)'><a class = "dropButtonNotes">
						D. Arts</a>
						<div class = "dropdownSectionNotes">Any ARC, ARH, ART, CDE, CDH,
							CFT, FAR, FAS, MUP, MUS, or THE</div>
					</th>
				</tr>
				<?php
					echo"<tr>
							<th class = 'courseBox'><div id = 'Arts' onclick = 'findCourses(this)' class = 'courseNameBox'>&emsp;</div></th>
							<th class = 'tableGrade'><b>3</b></th>
							<th class = 'tableGrade'><b><input class = 'gradeBox' id = 'gradeBox' type = 'text' maxlength = '2' /></b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'></th>
						</tr>"
				?>
		<!-- E. FREE ELECTIVE SECTION -->
				<tr>
					<th id = "fel" class = "dropdownSection" onclick = 'displaySectionNotes(this.id)'><a class = "dropButtonNotes">
						E. Free Elective</a>
						<div class = "dropdownSectionNotes">Any course carrying university credit</div>
					</th>
				</tr>
				<?php
					echo"<tr>
							<th class = 'courseBox'><div id = 'II. E. Free Elective' onclick = 'findCourses(this)' class = 'courseNameBox'>&emsp;</div></th>
							<th class = 'tableGrade'><b>3</b></th>
							<th class = 'tableGrade'><b><input class = 'gradeBox' id = 'gradeBox' type = 'text' maxlength = '2' /></b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'></th>
						</tr>"
				?>
			</table>
<!-- III. COMPETENCIES ACROSS THE CURRICULUM TABLE-->
			<table>
				<tr><th class = "tableSpace"></th></tr>
				<tr>
					<th class = "tableCaption"><u title = "Click for notes" onclick = "showDialog('#geNotes2', 600, true)">
						III. COMPETENCIES ACROSS THE CURRICULUM</u></th>
					<th class = "tableGradeCaption" title = "Minimum required number of credits">RC</th>
					<th class = "tableGradeCaption" title = "Credits earned">CR</th>
					<th class = "tableGradeCaption" title = "Grade earned">GR</th>
					<th class = "tableGradeCaption" title = "Competency Across the Curriculum">CAC</th>
				</tr>
		<!-- A. WRITING INTENSIVE SECTION -->
				<tr>
					<th>A. Writing Intensive</th>
				</tr>
				<?php
					for($i = 0; $i < 3; $i++)
					{
						echo "<tr>
								<th class = 'courseBox'><div id = 'Writing Intensive' onclick = 'findCourses(this)' class = 'courseNameBox'>&emsp;</div></th>
								<th class = 'tableGrade'><b>3</b></th>
								<th class = 'tableGrade'><b><input class = 'gradeBox' id = 'gradeBox' type = 'text' maxlength = '2' /></b></th>
								<th class = 'tableGrade'><b></b></th>
								<th class = 'tableGrade'>WI</th>
							</tr>";
					}
				?>
		<!-- B. QUATNTITAVE LEARNING / COMPUTER-INTENSIVE SECTION -->
				<tr>
					<th>B. Quantitative Learning <i>OR</i>
						<br/>&emsp; Computer-Intensive
					</th>
				</tr>
				<?php
					echo"<tr>
							<th class = 'courseBox'><div id = 'QL or CP' onclick = 'findCourses(this)' class = 'courseNameBox'>&emsp;</div></th>
							<th class = 'tableGrade'><b>3</b></th>
							<th class = 'tableGrade'><b><input class = 'gradeBox' id = 'gradeBox' type = 'text' maxlength = '2' /></b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'></th>
						</tr>"
				?>
		<!-- C. VISUAL LITERACY / COMMUNICATION-INTENSIVE SECTION -->
				<tr>
					<th>C. Visual Literacy <i>OR</i>
						<br/>&emsp; Communication-Intensive
					</th>
				</tr>
				<?php
					echo"<tr>
							<th class = 'courseBox'><div id = 'VL or CM' onclick = 'findCourses(this)' class = 'courseNameBox'>&emsp;</div></th>
							<th class = 'tableGrade'><b>3</b></th>
							<th class = 'tableGrade'><b><input class = 'gradeBox' id = 'gradeBox' type = 'text' maxlength = '2' />						
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
							<th class = 'courseBox'><div id = 'Cultural Diversity' onclick = 'findCourses(this)' class = 'courseNameBox'>&emsp;</div></th>
							<th class = 'tableGrade'><b>3</b></th>
							<th class = 'tableGrade'><b><input class = 'gradeBox' id = 'gradeBox' type = 'text' maxlength = '2' /></b></th>
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
							<th class = 'courseBox'><div id = 'Critical Thinking' onclick = 'findCourses(this)' class = 'courseNameBox'>&emsp;</div></th>
							<th class = 'tableGrade'><b>3</b></th>
							<th class = 'tableGrade'><b><input class = 'gradeBox' id = 'gradeBox' type = 'text' maxlength = '2' /></b></th>
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
					<th class = "tableGradeCaption" title = "Minimum required number of credits">RC</th>
					<th class = "tableGradeCaption" title = "Credits earned">CR</th>
					<th class = "tableGradeCaption" title = "Grade earned">GR</th>
					<th class = "tableGradeCaption" title = "Competency Across the Curriculum">CAC</th>
				</tr>
		<!-- A. NATURAL SCIENCES SECTION -->
				<tr>
					<th><u title = "Click for notes" onclick = "showDialog('#geNotes3', 550, true)">
						A. Natural Science, Mathematics, and Computer Science</u></th>
				</tr>
				<!-- 1. NATURAL SCIENCES WITH LAB SUBSECTION -->
				<tr>
					<th id = "nslab" class = "dropdownSection" onclick = 'displaySectionNotes(this.id)'><a class = "dropButtonNotes">
						&nbsp; 1. Natural Science with Lab</a>
						<div class = "dropdownSectionNotes">Any course with a lab in AST, BIO, CHM, ENV, GEL,
							PHY, MAR, or <u title = "Click for notes" onclick = "showDialog('#geNotes4', 550, true)">GEG*</u></div>
					</th>
				</tr>
				<?php
					echo"<tr>
							<th class = 'courseBox'><div id = 'Natural Science with Lab' onclick = 'findCourses(this)' class = 'courseNameBox'>&emsp;</div></th>
							<th class = 'tableGrade'><b>3</b></th>
							<th class = 'tableGrade'><b><input class = 'gradeBox' id = 'gradeBox' type = 'text' maxlength = '2' /></b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'></th>
						</tr>"
				?>
				<!-- 2. NATURAL SCIENCES ELECTIVE SUBSECTION -->
				<tr>
					<th id = "nsel" class = "dropdownSection" onclick = 'displaySectionNotes(this.id)'><a class = "dropButtonNotes">
						&nbsp; 2. Elective</a>
						<div class = "dropdownSectionNotes">Any AST, BIO, CHM, CSC, ENV,
							GEL, PHY, MAR, MAT or <u title = "Click for notes" onclick = "showDialog('#geNotes4', 550, true)">GEG*</u></div>
					</th>
				</tr>
				<?php
					echo"<tr>
							<th class = 'courseBox'><div id = 'IV. A. 2. Elective' onclick = 'findCourses(this)' class = 'courseNameBox'>&emsp;</div></th>
							<th class = 'tableGrade'><b>3</b></th>
							<th class = 'tableGrade'><b><input class = 'gradeBox' id = 'gradeBox' type = 'text' maxlength = '2' /></b></th>
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
					<th id = "ssel1" class = "dropdownSection" onclick = 'displaySectionNotes(this.id)'><a class = "dropButtonNotes">
						&nbsp; 1. Elective</a>
						<div class = "dropdownSectionNotes">Any ANT, HIS, POL or 
						<u title = "Click for notes" onclick = "showDialog('#geNotes4', 550, true)">GEG*</u></div>
					</th>
				</tr>
				<?php
					echo"<tr>
							<th class = 'courseBox'><div id = 'IV. B. 1. Elective' onclick = 'findCourses(this)' class = 'courseNameBox'>&emsp;</div></th>
							<th class = 'tableGrade'><b>3</b></th>
							<th class = 'tableGrade'><b><input class = 'gradeBox' id = 'gradeBox' type = 'text' maxlength = '2' /></b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'></th>
						</tr>"
				?>
				<!-- 2. SOCIAL SCIENCE ELECTIVE 2 SUBSECTION -->
				<tr>
					<th id = "ssel2" class = "dropdownSection" onclick = 'displaySectionNotes(this.id)'><a class = "dropButtonNotes">
						&nbsp; 2. Elective</a>
						<div class = "dropdownSectionNotes">Any CRJ, PSY, SOC or SWK</div>
					</th>
				</tr>
				<?php
					echo"<tr>
							<th class = 'courseBox'><div id = 'IV. B. 2. Elective' onclick = 'findCourses(this)' class = 'courseNameBox'>&emsp;</div></th>
							<th class = 'tableGrade'><b>3</b></th>
							<th class = 'tableGrade'><b><input class = 'gradeBox' id = 'gradeBox' type = 'text' maxlength = '2' /></b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'></th>
						</tr>"
				?>
				<!-- 3. SOCIAL SCIENCE ELECTIVE 3 SUBSECTION -->
				<tr>
					<th id = "ssel3" class = "dropdownSection" onclick = 'displaySectionNotes(this.id)'><a class = "dropButtonNotes">
						&nbsp; 3. Elective</a>
						<div class = "dropdownSectionNotes">Any ANT, CRJ, ECO, HIS, POL, 
							PSY, SOC, SWK or <u title = "Click for notes" onclick = "showDialog('#geNotes4', 550, true)">GEG*</u></div>
					</th>
				</tr>
				<?php
					echo"<tr>
							<th class = 'courseBox'><div id = 'IV. B. 3. Elective' onclick = 'findCourses(this)' class = 'courseNameBox'>&emsp;</div></th>
							<th class = 'tableGrade'><b>3</b></th>
							<th class = 'tableGrade'><b><input class = 'gradeBox' id = 'gradeBox' type = 'text' maxlength = '2' /></b></th>
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
					<th class = "tableGradeCaption" title = "Minimum required number of credits">RC</th>
					<th class = "tableGradeCaption" title = "Credits earned">CR</th>
					<th class = "tableGradeCaption" title = "Grade earned">GR</th>
					<th class = "tableGradeCaption" title = "Competency Across the Curriculum">CAC</th>
				</tr>
		<!-- C. HUMANITIES SECTION -->
				<tr>
					<th>C. Humanities</th>
				</tr>
				<!-- 1. HUMANITIES ELECTIVE 1 SUBSECTION -->
				<tr>
					<th id = "humel1" class = "dropdownSection" onclick = 'displaySectionNotes(this.id)'><a class = "dropButtonNotes">
						&emsp;1. Elective</a>
						<div class = "dropdownSectionNotes">Any ENG, HUM, WRI or 
							<u title = "Click for notes" onclick = "showDialog('#geNotes5', 550, true)">PAG*</u></div>
					</th>
				</tr>
				<?php
					echo"<tr>
							<th class = 'courseBox'><div id = 'IV. C. 1. Elective' onclick = 'findCourses(this)' class = 'courseNameBox'>&emsp;</div></th>
							<th class = 'tableGrade'><b>3</b></th>
							<th class = 'tableGrade'><b><input class = 'gradeBox' id = 'gradeBox' type = 'text' maxlength = '2' /></b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'></th>
						</tr>"
				?>
				<!-- 2. HUMANITIES ELECTIVE 2 SUBSECTION -->
				<tr>
					<th id = "humel2" class = "dropdownSection" onclick = 'displaySectionNotes(this.id)'><a class = "dropButtonNotes">
						&emsp;2. Elective</a>
						<div class = "dropdownSectionNotes">Any Modern Language (103 or above) or PHI</div>
					</th>
				</tr>
				<?php
					echo"<tr>
							<th class = 'courseBox'><div id = 'IV. C. 2. Elective' onclick = 'findCourses(this)' class = 'courseNameBox'>&emsp;</div></th>
							<th class = 'tableGrade'><b>3</b></th>
							<th class = 'tableGrade'><b><input class = 'gradeBox' id = 'gradeBox' type = 'text' maxlength = '2' /></b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'></th>
						</tr>"
				?>
				<!-- 3. SOCIAL SCIENCE ELECTIVE 3 SUBSECTION -->
				<tr>
					<th id = "humel3" class = "dropdownSection" onclick = 'displaySectionNotes(this.id)'><a class = "dropButtonNotes">
						&emsp;3. Elective</a>
						<div class = "dropdownSectionNotes">Any ENG, HUM, PHI, WRI, 
							Modern Language (103 or above) or <u title = "Click for notes" onclick = "showDialog('#geNotes5', 550, true)">PAG*</u></div>
					</th>
				</tr>
				<?php
					echo"<tr>
							<th class = 'courseBox'><div id = 'IV. C. 3. Elective' onclick = 'findCourses(this)' class = 'courseNameBox'>&emsp;</div></th>
							<th class = 'tableGrade'><b>3</b></th>
							<th class = 'tableGrade'><b><input class = 'gradeBox' id = 'gradeBox' type = 'text' maxlength = '2' /></b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'></th>
						</tr>"
				?>
		<!-- D. FREE ELECTIVES SECTION -->
				<tr>
					<th id = "fel2" class = "dropdownSection" onclick = 'displaySectionNotes(this.id)'><a class = "dropButtonNotes">
						D. Free Electives</a>
						<div class = "dropdownSectionNotes">Choose any university courses
							that count toward graduation</div>
					</th>
				</tr>
				<?php
					for($i = 0; $i < 3; $i++)
					{
						echo"<tr>
								<th class = 'courseBox'><div id = 'IV. D. Elective' onclick = 'findCourses(this)' class = 'courseNameBox'>&emsp;</div></th>
								<th class = 'tableGrade'><b>3</b></th>
								<th class = 'tableGrade'><b><input class = 'gradeBox' id = 'gradeBox' type = 'text' maxlength = '2' /></b></th>
								<th class = 'tableGrade'><b></b></th>
								<th class = 'tableGrade'></th>
							</tr>";
					}
				?>
			</table>
			<br/><hr/><br/>
<!-- #BS CSC SOFTWARE DEVELOPMENT MAJOR PROGRAM TABLE# -->
			<table>
				<tr>
					<th class = "tableHeader" colspan = "3"><u title = "Click for notes" onclick = "showDialog('#bsCSCNotes', 550, true)">
						B. Major Program: 51 sh</u></th>
				</tr>
		<!-- CSC SD REQUIRED COURSES SECTION -->
				<tr>
					<th>&emsp;1. Required Courses: <b>33 sh</b></th>
					<td class = "tableGrade">Gr</td>
					<td class = "tableGrade">SH</td>
				</tr>
				<?php
					for($i = 0; $i < 11; $i++)
						echo"<tr>	
								<th class = 'courseBox'><div id = 'BS CSC:SD Required' onclick = 'findCourses(this)'class = 'courseNameBox'>&emsp;</div></th>
								<td  class = 'tableGrade'><input class = 'gradeBox' id = 'gradeBox' type = 'text' maxlength = '2' /></td>
								<td  class = 'tableGrade'></td>
							</tr>";
				?>
		<!-- CSC SD ELECTIVE COURSES SECTION -->
				<tr>
					<th id = "fel2" class = "dropdownSection" onclick = 'displaySectionNotes(this.id)'><a class = "dropButtonNotes">
						&emsp;2. Elective Courses: <b>18 sh</b></a>
						<div class = "dropdownSectionNotes">No more than two 200-level</div>
					</th>
					<td class = "tableGrade">Gr</td>
					<td class = "tableGrade">SH</td>
				</tr>
				<?php
					for($i = 0; $i < 6; $i++)
						echo"<tr>	
								<th class = 'courseBox'><div id = 'BS CSC:SD Elective' onclick = 'findCourses(this)'class = 'courseNameBox'>&emsp;</div></th>
								<td  class = 'tableGrade'><input class = 'gradeBox' id = 'gradeBox' type = 'text' maxlength = '2' /></td>
								<td  class = 'tableGrade'></td>
							</tr>";
				?>
				<tr><th class = "tableSpace"></th></tr>
			</table>
<!-- CSC SOFTWARE DEVELOPMENT CONCOMITANT COURSE TABLE -->
			<table>
		<!-- CSC SD CONCOMITANT COURSES SECTION -->
				<tr>	
					<th class = "tableHeader" colspan = "3">
						C. Concomitant Courses: 9 sh
					</th>
				</tr>
				<tr>
					<th>&emsp;1. Required Courses: <b>9 sh</b></th>
					<td class = "tableGrade">Gr</td>
					<td class = "tableGrade">SH</td>
				</tr>
				<?php
					for($i = 0; $i < 3; $i++)
						echo"<tr>	
								<th class = 'courseBox'><div id = 'BS CSC:SD Concomitant' onclick = 'findCourses(this)'class = 'courseNameBox'>&emsp;</div></th>
								<td class = 'tableGrade'><input class = 'gradeBox' id = 'gradeBox' type = 'text' maxlength = '2' /></td>
								<td class = 'tableGrade'></td>
							</tr>";
				?>
		<!-- CSC SD INTERNSHIP SECTION -->
				<tr>
					<th>&emsp;2. Internship - optional (free elective)</th>
					<td class = "tableGrade">Gr</td>
					<td class = "tableGrade">SH</td>
				</tr>
				<?php
					for($i = 0; $i < 2; $i++)
						echo"<tr>	
								<th class = 'courseBox'><div id = 'BS CSC:SD Internship' onclick = 'findCourses(this)'class = 'courseNameBox'>&emsp;</div></th>
								<td  class = 'tableGrade'><input class = 'gradeBox' id = 'gradeBox' type = 'text' maxlength = '2' /></td>
								<td  class = 'tableGrade'>3-6</td>
							</tr>";
				?>
			</table>
		</div>
	</body>
</html>		
