<!--
*	File: 			cscITChecksheetTest.php
*	Created:		02/18/2016
*	Author:			Christian Carreras
*	Organization:	Kutztown University CSC 355 Spring
*	Purpose:		This php file creates a skeleton course checksheet
*					as visually close as possible to an official checksheet.
*					**THIS FILE IS FOR TESTING PURPOSES ONLY**
*					This file will be used by the database and business logic
*					teams to test inserting classes into a checksheet.
-->
<?php
?>
<!DOCTYPE html>
<html>
	<head>
	<title> BS Computer Science: IT Checksheet</title>
	</head>
	<link rel = "stylesheet" type = "text/css" href = "Styles/checksheetStyle.css"/>
	<body>
<!----- HEADER -->
		<div class = "sectionTop">
			<br/><br/>
			STUDENT:
			<br/><br/>
			____________________
		</div>
		<div class = "sectionTop">
			<br/><img src = "Images/KU_Logo.jpg">
		</div>
		<div class = "sectionTop">
			<br/><br/>
			STUDENT ID NUMBER:
			<br/><br/>
			____________________
		</div>
		<div class = "newSection"/>
		<div class = "headerBox">COLLEGE OF LIBERAL ARTS & SCIENCES * BS * 
			COMPUTER SCIENCE: IT
		</div>
		<div class = "newSection"/><br/>
<!----- #GENERAL EDUCATION# -->
		<div class = "header">GENERAL EDUCATION</div>
<!----- I. UNIVERSITY CORE TABLE -->
		<div class = "section1">
			<table>
				<tr>
					<th class = "tableCaption">I. UNIVERSITY CORE (12 Credits)</th>
					<th class = "tableGradeCaption">RC</th>
					<th class = "tableGradeCaption">CR</th>
					<th class = "tableGradeCaption">GR</th>
				</tr>
		<!----- A. ORAL COMMUNICATION SECTION -->
				<tr>
					<th>A. Oral Communication: <b class = "smaller">COM 10 or above</b></th>
				</tr>
				<?php
					echo"<tr>
							<th><b>&nbsp;&nbsp;&nbsp; COURSE:</b></th>
							<th class = 'tableGrade'><b>3</b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'><b>
							</b></th>
						</tr>"
				?>
		<!----- B. WRITTEN COMMUNICATION SECTION -->
				<tr>
					<th>B. Written Communication: <b class = "smaller">ENG 23, 24, or 25</b></th>
				</tr>
				<?php
					echo"<tr>
							<th><b>&nbsp;&nbsp;&nbsp; COURSE:</b></th>
							<th class = 'tableGrade'><b>3</b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'><b></b></th>
						</tr>"
				?>
		<!----- C. MATHEMATICS SECTION -->
				<tr>
					<th>C. Mathematics: <b class = "smaller">MAT 17 or above</b></th>
				</tr>
				<?php
					echo"<tr>
							<th><b>&nbsp;&nbsp;&nbsp; COURSE:</b></th>
							<th class = 'tableGrade'><b>3</b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'><b></b></th>
						</tr>"
				?>
		<!----- D. WELLNESS SECTION -->
				<tr>
					<th>D. Wellness: <b class = "smaller">Any 3-credit HEA course</b></th>
				</tr>
				<?php
					echo"<tr>
							<th><b>&nbsp;&nbsp;&nbsp; COURSE:</b></th>
							<th class = 'tableGrade'><b>3</b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'><b></b></th>
						</tr>"
				?>
			</table>
			<br/>
			
<!----- II. UNIVERSITY DISTRIBUTION TABLE -->
			<table>
				<tr>
					<th class = "tableCaption">II. UNIVERSITY DISTRIBUTION (15 Credits)</th>
					<th class = "tableGradeCaption">RC</th>
					<th class = "tableGradeCaption">CR</th>
					<th class = "tableGradeCaption">GR</th>
					<th class = "tableGradeCaption">CAC</th>
				</tr>
		<!----- A. NATURAL SCIENCES SECTION -->
				<tr>
					<th>A. Natural Sciences: 
						<b class = "smaller">Any lab or non-lab course with prefix
							AST, BIO, CHM, ENV, GEL, MAR, NSE, or PHY; 
							or certain GEG courses (see note at right)
						</b>
					</th>
				</tr>
				<?php
					echo"<tr>
							<th><b>&nbsp;&nbsp;&nbsp; COURSE:</b></th>
							<th class = 'tableGrade'><b>3</b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'></th>
						</tr>"
				?>
		<!----- B. SOCIAL SCIENCES SECTION -->
				<tr>
					<th>B. Social Sciences: 
						<b class = "smaller">Any course with prefix ANT, CRJ,
							ECO, HIS, INT, MCS, PSY, POL, SOC, SSE, or SWK; 
							or certain GEG courses (see note at right)
						</b>
					</th>
				</tr>
				<?php
					echo"<tr>
							<th><b>&nbsp;&nbsp;&nbsp; COURSE:</b></th>
							<th class = 'tableGrade'><b>3</b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'></th>
						</tr>"
				?>
		<!----- C. HUMANITIES SECTION -->
				<tr>
					<th>C. Humanities: 
						<b class = "smaller">Any course with prefix ENG, HUM, PAG, PHI,
							WRI, WGS, or Modern Language
						</b>
					</th>
				</tr>
				<?php
					echo"<tr>
							<th><b>&nbsp;&nbsp;&nbsp; COURSE:</b></th>
							<th class = 'tableGrade'><b>3</b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'></th>
						</tr>"
				?>
		<!----- D. ARTS SECTION -->
				<tr>
					<th>D. Arts: 
						<b class = "smaller">Any course with prefix ARC, ARH, ART, CDE, CDH,
							CFT, DAN, FAR, FAS, MUP, MUS, or THE
						</b>
					</th>
				</tr>
				<?php
					echo"<tr>
							<th><b>&nbsp;&nbsp;&nbsp; COURSE:</b></th>
							<th class = 'tableGrade'><b>3</b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'></th>
						</tr>"
				?>
		<!----- E. FREE ELECTIVE SECTION -->
				<tr>
					<th>E. Free Elective: 
						<b class = "smaller">Any course carrying university credit</b>
					</th>
				</tr>
				<?php
					echo"<tr>
							<th><b>&nbsp;&nbsp;&nbsp; COURSE:</b></th>
							<th class = 'tableGrade'><b>3</b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'></th>
						</tr>"
				?>
			</table>
		</div>
		
<!----- III. COMPETENCIES ACROSS THE CIRRICULUM TABLE-->
		<div class = "section1b">
			<table>
				<tr>
					<th class = "tableCaption">III. COMPETENCIES ACROSS THE CIRRICULUM</th>
					<th class = "tableGradeCaption">RC</th>
					<th class = "tableGradeCaption">CR</th>
					<th class = "tableGradeCaption">GR</th>
					<th class = "tableGradeCaption">CAC</th>
				</tr>
		<!----- A. WRITING INTENSIVE SECTION -->
				<tr>
					<th>A. Writing Intensive (WI) <b class = "smaller">(9 credits)</b></th>
				</tr>
				<?php
					for($i = 0; $i < 3; $i++)
					{
						echo "<tr>
								<th><b>&nbsp;&nbsp;&nbsp; COURSE:</b></th>
								<th class = 'tableGrade'><b>3</b></th>
								<th class = 'tableGrade'><b></b></th>
								<th class = 'tableGrade'><b></b></th>
								<th class = 'tableGrade'>WI</th>
							</tr>";
					}
				?>
		<!----- B. QUATNTITAVE LEARNING / COMPUTER-INTENSIVE SECTION -->
				<tr>
					<th>B. Quantitative Learning (QL) <b class = "smaller">(3 credits) </b>OR
						<br/>Computer-Intensive (CP)
						<b class = "smaller">(3 credits)</b>
					</th>
				</tr>
				<?php
					echo"<tr>
							<th><b>&nbsp;&nbsp;&nbsp; COURSE:</b></th>
							<th class = 'tableGrade'><b>3</b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'></th>
						</tr>"
				?>
		<!----- C. VISUAL LITERACY / COMMUNICATION-INTENSIVE SECTION -->
				<tr>
					<th>C. Visual Literacy (VL) <b class = "smaller">(3 credits) </b>OR
						<br/>Communication-Intensive (CM)
						<b class = "smaller">(3 credits)</b>
					</th>
				</tr>
				<?php
					echo"<tr>
							<th><b>&nbsp;&nbsp;&nbsp; COURSE:</b></th>
							<th class = 'tableGrade'><b>3</b></th>
							<th class = 'tableGrade'><b>						
							</b></th>
							<th class = 'tableGrade'><b>
							</b></th>
							<th class = 'tableGrade'></th>
						</tr>"
				?>
		<!----- D. CULTURAL DIVERSITY SECTION -->
				<tr>
					<th>D. Cultural Diversity <b class = "smaller">(3 credits) </b></th>
				</tr>
				<?php
					echo"<tr>
							<th><b>&nbsp;&nbsp;&nbsp; COURSE:</b></th>
							<th class = 'tableGrade'><b>3</b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'>CD</th>
						</tr>"
				?>
		<!----- E. CRITICAL THINKING SECTION -->
				<tr>
					<th>E. Critical Thinking <b class = "smaller">(3 credits) </b></th>
				</tr>
				<?php
					echo"<tr>
							<th><b>&nbsp;&nbsp;&nbsp; COURSE:</b></th>
							<th class = 'tableGrade'><b>3</b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'>CT</th>
						</tr>"
				?>
			</table>
			
			<!-- CHECKSHEET GENERAL EDUCATION NOTES PT.1 -->
			<div class = "notes1"><b>
				A Competency Across the Curriculum (CAC) course is not a separate course, but
				rather an overlay that is "double counted" as fulfilling both the CAC requirement and
				another requirement in either General Education (except for the University Core),
				the major, or the minor.
				<br/><br/>
				</b>&nbsp;&nbsp;RC <b>= Minimum required number of credits<br/>
				</b>&nbsp;&nbsp;CR <b>= Credits earned (fill in number of credits)<br/>
				</b>&nbsp;&nbsp;GR <b>= Grade earned (fill in letter grade)<br/>
				</b>CAC <b>= Competency Across the Curriculum (fill in designation)<br/>
				<br/>
				<div class = "noteBox">
					NOTE: 
					<b>GEG courses with a lab and 40, 322, and 323 may be used
						in II.A. and GEG courses 40, 204, 274, 304, 322, 323, 324, 347,
						380, and 394 may NOT be used in II.B.
					</b>
				</div>
			</div>
		</div>
		
		<!-- Create horizontal break in page -->
		<div class = "newSection">
			<hr/>
		</div>
		
<!----- IV. COLLEGE DISTRIBUTION TABLE -->
		<div class = "section2">
			<table>
				<tr>
					<th class = "tableCaption">IV. COLLEGE DISTRIBUTION (33 Credits)</th>
					<th class = "tableGradeCaption">RC</th>
					<th class = "tableGradeCaption">CR</th>
					<th class = "tableGradeCaption">GR</th>
					<th class = "tableGradeCaption">CAC</th>
				</tr>
		<!----- A. NATURAL SCIENCES SECTION -->
				<tr>
					<th>A. Natural Science, Mathematics, and Computer Science# (6 credits):
						<b class = "smaller">Choose one course in each subcategory.</b>
					</th>
				</tr>
				<!-- 1. NATURAL SCIENCES WITH LAB SUBSECTION -->
				<tr>
					<th>&nbsp; 1. Natural Science with Lab:
						<b class = "smaller">AST, BIO, CHM, ENV, GEL, PHY, 
							&nbsp;&nbsp;or MAR; or GEG (see note at right)
						</b>
					</th>
				</tr>
				<?php
					echo"<tr>
							<th><b>&nbsp;&nbsp;&nbsp; COURSE:</b></th>
							<th class = 'tableGrade'><b>3</b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'></th>
						</tr>"
				?>
				<!-- 2. NATURAL SCIENCES ELECTIVE SUBSECTION -->
				<tr>
					<th>&nbsp; 2. Elective:
						<b class = "smaller">MAT, CSC, AST, BIO, CHM, ENV, GEL, PHY, or
							&nbsp;&nbsp;MAR; or GEG (see note at right)
						</b>
					</th>
				</tr>
				<?php
					echo"<tr>
							<th><b>&nbsp;&nbsp;&nbsp; COURSE:</b></th>
							<th class = 'tableGrade'><b>3</b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'></th>
						</tr>"
				?>
		<!----- B. SOCIAL SCIENCE SECTION -->
				<tr>
					<th>B. Social Science (9 credits): 
						<b class = "smaller">Choose one course in each subcategory.</b>
					</th>
				</tr>
				<!-- 1. SOCIAL SCIENCE ELECTIVE 1 SUBSECTION -->
				<tr>
					<th>&nbsp; 1. Elective: 
						<b class = "smaller">HIS, ANT, GEG (see note at right), or POL</b>
					</th>
				</tr>
				<?php
					echo"<tr>
							<th><b>&nbsp;&nbsp;&nbsp; COURSE:</b></th>
							<th class = 'tableGrade'><b>3</b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'></th>
						</tr>"
				?>
				<!-- 2. SOCIAL SCIENCE ELECTIVE 2 SUBSECTION -->
				<tr>
					<th>&nbsp; 2. Elective: 
						<b class = "smaller">PSY, SOC, CRJ, or SWK</b>
					</th>
				</tr>
				<?php
					echo"<tr>
							<th><b>&nbsp;&nbsp;&nbsp; COURSE:</b></th>
							<th class = 'tableGrade'><b>3</b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'></th>
						</tr>"
				?>
				<!-- 3. SOCIAL SCIENCE ELECTIVE 3 SUBSECTION -->
				<tr>
					<th>&nbsp; 3. Elective: 
						<b class = "smaller">ANT, HIS, ECO, GEG (see note at right), PSY, POL, 
							&nbsp;&nbsp;SOC, CRJ, or SWK
						</b>
					</th>
				</tr>
				<?php
					echo"<tr>
							<th><b>&nbsp;&nbsp;&nbsp; COURSE:</b></th>
							<th class = 'tableGrade'><b>3</b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'></th>
						</tr>"
				?>
			</table>
		</div>
		
<!----- IV. COLLEGE DISTRIBUTION TABLE CONTINUED -->
		<div class = "section2">		
			<table>
				<tr>
					<th class = "tableCaption"/>
					<th class = "tableGradeCaption">RC</th>
					<th class = "tableGradeCaption">CR</th>
					<th class = "tableGradeCaption">GR</th>
					<th class = "tableGradeCaption">CAC</th>
				</tr>
		<!----- C. HUMANITIES SECTION -->
				<tr>
					<th>C. Humanities (9 credits):
						<b class = "smaller">Choose one course in each subcategory.</b>
					</th>
				</tr>
				<!-- 1. HUMANITIES ELECTIVE 1 SUBSECTION -->
				<tr>
					<th>&nbsp; 1. Elective:
						<b class = "smaller">PAG*, ENG, WRI, or HUM</b>
					</th>
				</tr>
				<?php
					echo"<tr>
							<th><b>&nbsp;&nbsp;&nbsp; COURSE:</b></th>
							<th class = 'tableGrade'><b>3</b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'></th>
						</tr>"
				?>
				<!-- 2. HUMANITIES ELECTIVE 2 SUBSECTION -->
				<tr>
					<th>&nbsp; 2. Elective:
						<b class = "smaller">Modern Language (103 or above) or PHI</b>
					</th>
				</tr>
				<?php
					echo"<tr>
							<th><b>&nbsp;&nbsp;&nbsp; COURSE:</b></th>
							<th class = 'tableGrade'><b>3</b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'></th>
						</tr>"
				?>
				<!-- 3. SOCIAL SCIENCE ELECTIVE 3 SUBSECTION -->
				<tr>
					<th>&nbsp; 3. Elective: 
						<b class = "smaller">PAG*, ENG, WRI, HUM, Modern Language 
							<br/>&nbsp;&nbsp;(103 or above), or PHI
						</b>
					</th>
				</tr>
				<?php
					echo"<tr>
							<th><b>&nbsp;&nbsp;&nbsp; COURSE:</b></th>
							<th class = 'tableGrade'><b>3</b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'></th>
						</tr>"
				?>
		<!----- D. FREE ELECTIVES SECTION -->
				<tr>
					<th>D. Free Electives (9 credits):
						<b class = "smaller">Choose any university
							courses that count toward graduation.
						</b>
					</th>
				</tr>
				<?php
					for($i = 0; $i < 3; $i++)
					{
						echo"<tr>
								<th><b>&nbsp;&nbsp;&nbsp; COURSE:</b></th>
								<th class = 'tableGrade'><b>3</b></th>
								<th class = 'tableGrade'><b></b></th>
								<th class = 'tableGrade'><b></b></th>
								<th class = 'tableGrade'></th>
							</tr>";
					}
				?>
			</table>
		<!-- GENERAL EDUCATION CHECKSHEET NOTES PT.2 -->
			<div class = "notes1"><b>	
				<div class = "noteBox">
					NOTE: 
					<b>GEG courses with a lab and 40, 322, and 323 may be used
						in IV.A. and GEG courses 40, 204, 274, 304, 322, 323, 324, 347,
						380, and 394 may NOT be used in IV.B.
					</b>
				</div>
			</div>
		</div>
		
		<!-- GENERAL EDUCATION CHECKSHEET NOTES PT.3 -->
		<div class = "newSection">
			<div class = "notes2">
				# Students in the College of Liberal Arts and Sciences are required 
				to take at least one course in Biological Science (BIO) and at least 
				one course in Physical Science (AST, CHM, ENV, GEL, PHY, MAR, GEG 
				with lab, or GEG 40, GEG 322, or GEG 323), and at least one of which 
				must be a lab (each course may be counted in either sections II.A
				or IV.A).
				<br/>* Excludes PAG 011 and PAG 012
			</div>
		</div>
		
		<!-- Create horizontal break in page -->
		<div class = "newSection">
			<hr/>
		</div><br/>
		
<!----- #BS CSC INFORMATION TECHNOLOGY MAJOR PROGRAM TABLE# -->
		<div class = "header">BS Computer Science: Information Technology</div>
		<div class = "newSection"/>
		<div class = "section3IT">
			<table>
				<tr>
					<th class = "tableHeader" colspan = "3">
						B. Major Program: 57 sh</th>
				</tr>
		<!----- CSC IT REQUIRED COURSES SECTION -->
				<tr>
					<th>&nbsp; 1. Required Courses: <b>33 sh</b></th>
					<td class = "tableGrade">Gr</td>
					<td class = "tableGrade">SH</td>
				</tr>
				<?php
					for($i = 0; $i < 11; $i++)
						echo"<tr>	
								<td>&nbsp;&nbsp;&nbsp; </td>
								<td  class = 'tableGrade'></td>
								<td  class = 'tableGrade'></td>
							</tr>";
				?>
		<!----- CSC IT ELECTIVE COURSES SECTION -->
				<tr>
					<th>&nbsp; 2. Elective Courses: <b>15-24 sh</b></th>
					<td class = "tableGrade">Gr</td>
					<td class = "tableGrade">SH</td>
				</tr>
				<?php
					for($i = 0; $i < 8; $i++)
						echo"<tr>	
								<td>&nbsp;&nbsp;&nbsp; </td>
								<td  class = 'tableGrade'></td>
								<td  class = 'tableGrade'></td>
							</tr>";
				?>
		<!----- CSC IT ELECTIVE COURSES SECTION CONTINUED -->
				<tr>
					<th>&nbsp; 2. Elective Courses: <b>0-9 sh</b></th>
					<td class = "tableGrade">Gr</td>
					<td class = "tableGrade">SH</td>
				</tr>
				<?php
					for($i = 0; $i < 3; $i++)
						echo"<tr>	
								<td>&nbsp;&nbsp;&nbsp; </td>
								<td  class = 'tableGrade'></td>
								<td  class = 'tableGrade'></td>
							</tr>";
				?>
			</table>
		</div>
		
<!----- CSC INFORMATION TECHNOLOGY CONCOMITANT COURSE TABLE -->
		<div class = "section3IT2">
			<table>
		<!----- CSC IT CONCOMITANT COURSES SECTION -->
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
								<td>&nbsp;&nbsp;&nbsp; </td>
								<td class = 'tableGrade'></td>
								<td class = 'tableGrade'></td>
							</tr>";
				?>
		<!----- CSC IT INTERNSHIP SECTION -->
				<tr>
					<th>&nbsp; 2. Internship - optional (free elective)</th>
					<td class = "tableGrade">Gr</td>
					<td class = "tableGrade">SH</td>
				</tr>
				<?php
					for($i = 0; $i < 2; $i++)
						echo"<tr>	
								<td>&nbsp;&nbsp;&nbsp; </td>
								<td  class = 'tableGrade'></td>
								<td  class = 'tableGrade'>3-6</td>
							</tr>";
				?>
		<!----- BS INFORMATION TECH NOTES -->
				<tr>
					<td>&nbsp;</td>
					<td/><td/>
				</tr>
				<tr>
					<td class = "bsNotes">Notes on the BS Information Tech</td>
					<td/><td/>
				</tr>
				<tr>
					<td>Consider taking a Minor in an Application Domain such as 
						Math, Psychology, Sociology, Economics, Biology, or any Science
					</td>
					<td/><td/>
				</tr>
				<tr>
					<td>Consider taking a second speech course in II E</td>
					<td/><td/>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td/><td/>
				</tr>
				<tr>
					<td>CSC-prefix courses below 125-level, CSC 280 and CSC 380 
						do not count toward the BS in Information Technology
					</td>
					<td/><td/>
				</tr>
				<tr>
					<td>Before taking any 300-level course a student must have 
						completed 18 credit hours in CSC courses numbered 125 or 
						above with a GPA of 2.25 in the CSC courses.
					</td>
					<td/><td/>
				</tr>
			</table>
			<br/>
			<table>
				<tr>
					<th><b>Internal Transfer: 2.25 GPA needed</b></th>
				</tr>
				<tr>
					<th><b>Graduation requirement: 2.25 GPA Overall, 2.25 GPA Major</b></th>
				</tr>
				<tr>
					<th><b>Program Code: ULASCSCIT</b></th>
				</tr>
				<tr>
					<th><b>Version Number: 2118</b></th>
				</tr>
			</table>
		</div>
	</body>
</html>
			
