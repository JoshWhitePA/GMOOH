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

session_start();
require("../../../../PHPClasses/logic.class.php");

 function xml2array($fname){
//      $sxi = new SimpleXmlIterator($fname, 0, true);
     $sxi = simplexml_load_string($fname, 'SimpleXMLIterator');
      return sxiToArray($sxi);
    }

    function sxiToArray($sxi){
      $a = array();
      for( $sxi->rewind(); $sxi->valid(); $sxi->next() ) {
        if(!array_key_exists($sxi->key(), $a)){
          $a[$sxi->key()] = array();
        }
        if($sxi->hasChildren()){
          $a[$sxi->key()][] = sxiToArray($sxi->current());
        }
        else{
          $a[$sxi->key()][] = strval($sxi->current());
        }
      }
      return $a;
    }
    $logic = new Logic();
    $sData = "";
    


    $results = $logic->displaySaveFromCheck($_SESSION['userID'],"",$_GET['AIDID']);
    foreach ($results as $row) {
        $sData = xml2array($row["SaveData"]);

        
    }

    
    $indexOGen = 0;
    $indexOPro = 0;
?>
<!DOCTYPE html>
<html>
	<head>
	<title>BS Computer Science: SD Checksheet</title>
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
		<div class = "headerBox">COLLEGE OF LIBERAL ARTS & SCIENCES &bull; BS &bull; 
			COMPUTER SCIENCE: SD
		</div>
		<div class = "newSection"></div>
<!-- #GENERAL EDUCATION# -->
		<div class = "header">GENERAL EDUCATION</div>
	<!-- I. UNIVERSITY CORE TABLE -->
	<div class = "buffer">&nbsp;</div>
	<div class = "section">
		<table>
			<tr>
				<th class = "tableCaption">I. UNIVERSITY CORE (12 Credits)</th>
				<th class = "tableGradeCaption">RC</th>
				<th class = "tableGradeCaption">CR</th>
				<th class = "tableGradeCaption">GR</th>
			</tr>
	<!-- A. ORAL COMMUNICATION SECTION -->
			<tr>
				<th>A. Oral Communication: <b class = "smaller">COM 10 or above</b></th>
			</tr>
			<?php
				echo"<tr>
						<th><b>&emsp;&emsp;COURSE:"."<span id='genGrade" .$indexOGen."'>&#8195;".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassName"][0] . "</span>" ."</b></th>
						<th class = 'tableGrade'><b>3</b></th>
						<th class = 'tableGrade'><b></b></th>
						<th class = 'tableGrade'><b>"."<span id='genGrade" .$indexOGen."'>&#8195;".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassGrade"][0] . "</span>" ."
						</b></th>
					</tr>";
					$indexOGen++;
			?>
	<!-- B. WRITTEN COMMUNICATION SECTION -->
			<tr>
				<th>B. Written Communication: <b class = "smaller">ENG 23, 24, or 25</b></th>
			</tr>
			<?php
				echo"<tr>
						<th><b>&emsp;&emsp;COURSE:"."<span id='genGrade" .$indexOGen."'>&#8195;".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassName"][0] . "</span>" ."</b></th>
						<th class = 'tableGrade'><b>3</b></th>
						<th class = 'tableGrade'><b></b></th>
						<th class = 'tableGrade'><b>"."<span id='genGrade" .$indexOGen."'>&#8195;".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassGrade"][0] . "</span>" ."</b></th>
					</tr>";
			$indexOGen++;
			?>
	<!-- C. MATHEMATICS SECTION -->
			<tr>
				<th>C. Mathematics: <b class = "smaller">MAT 17 or above</b></th>
			</tr>
			<?php
				echo"<tr>
						<th><b>&emsp;&emsp;COURSE:"."<span id='genGrade" .$indexOGen."'>&#8195;".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassName"][0] . "</span>" ."</b></th>
						<th class = 'tableGrade'><b>3</b></th>
						<th class = 'tableGrade'><b></b></th>
						<th class = 'tableGrade'><b>"."<span id='genGrade" .$indexOGen."'>&#8195;".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassGrade"][0] . "</span>" ."</b></th>
					</tr>";
			$indexOGen++;
			?>
	<!-- D. WELLNESS SECTION -->
			<tr>
				<th>D. Wellness: <b class = "smaller">Any 3-credit HEA course</b></th>
			</tr>
			<?php
				echo"<tr>
						<th><b>&emsp;&emsp;COURSE:"."<span id='genGrade" .$indexOGen."'>&#8195;".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassName"][0] . "</span>" ."</b></th>
						<th class = 'tableGrade'><b>3</b></th>
						<th class = 'tableGrade'><b></b></th>
						<th class = 'tableGrade'><b>"."<span id='genGrade" .$indexOGen."'>&#8195;".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassGrade"][0] . "</span>" ."</b></th>
					</tr>";
			$indexOGen++;
			?>
		</table>
	<!-- II. UNIVERSITY DISTRIBUTION TABLE -->
		<table>
			<tr><th class = "tableSpace"></th></tr>
			<tr>
				<th class = "tableCaption">II. UNIVERSITY DISTRIBUTION (15 Credits)</th>
				<th class = "tableGradeCaption">RC</th>
				<th class = "tableGradeCaption">CR</th>
				<th class = "tableGradeCaption">GR</th>
				<th class = "tableGradeCaption">CAC</th>
			</tr>
	<!-- A. NATURAL SCIENCES SECTION -->
			<tr>
				<th>A. Natural Sciences: 
					<b class = "smaller">Any lab or non-lab course with prefix
						AST, BIO, CHM, ENV, GEL, MAR, NSE, or PHY; 
						or certain GEG courses
						<br/>(see notes at right)
					</b>
				</th>
			</tr>
			<?php
				echo"<tr>
						<th><b>&emsp;&emsp;COURSE:"."<span id='genGrade" .$indexOGen."'>&#8195;".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassName"][0] . "</span>" ."</b></th>
						<th class = 'tableGrade'><b>3</b></th>
						<th class = 'tableGrade'><b></b></th>
						<th class = 'tableGrade'><b>"."<span id='genGrade" .$indexOGen."'>&#8195;".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassGrade"][0] . "</span>" ."</b></th>
						<th class = 'tableGrade'></th>
					</tr>";
			$indexOGen++;
			?>
	<!-- B. SOCIAL SCIENCES SECTION -->
			<tr>
				<th>B. Social Sciences: 
					<b class = "smaller">Any course with prefix ANT, CRJ,
						ECO, HIS, INT, MCS, PSY, POL, SOC, SSE, or SWK; 
						or certain GEG courses
						<br/>(see notes at right)
					</b>
				</th>
			</tr>
			<?php
				echo"<tr>
						<th><b>&emsp;&emsp;COURSE:"."<span id='genGrade" .$indexOGen."'>&#8195;".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassName"][0] . "</span>" ."</b></th>
						<th class = 'tableGrade'><b>3</b></th>
						<th class = 'tableGrade'><b></b></th>
						<th class = 'tableGrade'><b>"."<span id='genGrade" .$indexOGen."'>&#8195;".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassGrade"][0] . "</span>" ."</b></th>
						<th class = 'tableGrade'></th>
					</tr>";
			$indexOGen++;
			?>
	<!-- C. HUMANITIES SECTION -->
			<tr>
				<th>C. Humanities: 
					<b class = "smaller">Any course with prefix ENG, HUM, PAG, PHI,
						WRI, WGS, or Modern Language
					</b>
				</th>
			</tr>
			<?php
				echo"<tr>
						<th><b>&emsp;&emsp;COURSE:"."<span id='genGrade" .$indexOGen."'>&#8195;".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassName"][0] . "</span>" ."</b></th>
						<th class = 'tableGrade'><b>3</b></th>
						<th class = 'tableGrade'><b></b></th>
						<th class = 'tableGrade'><b>"."<span id='genGrade" .$indexOGen."'>&#8195;".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassGrade"][0] . "</span>" ."</b></th>
						<th class = 'tableGrade'></th>
					</tr>";
			$indexOGen++;
			?>
	<!-- D. ARTS SECTION -->
			<tr>
				<th>D. Arts: 
					<b class = "smaller">Any course with prefix ARC, ARH, ART, CDE, CDH,
						CFT, DAN, FAR, FAS, MUP, MUS, or THE
					</b>
				</th>
			</tr>
			<?php
				echo"<tr>
						<th><b>&emsp;&emsp;COURSE:"."<span id='genGrade" .$indexOGen."'>&#8195;".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassName"][0] . "</span>" ."</b></th>
						<th class = 'tableGrade'><b>3</b></th>
						<th class = 'tableGrade'><b></b></th>
						<th class = 'tableGrade'><b>"."<span id='genGrade" .$indexOGen."'>&#8195;".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassGrade"][0] . "</span>" ."</b></th>
						<th class = 'tableGrade'></th>
					</tr>";
			$indexOGen++;
			?>
	<!-- E. FREE ELECTIVE SECTION -->
			<tr>
				<th>E. Free Elective: 
					<b class = "smaller">Any course carrying university credit</b>
				</th>
			</tr>
			<?php
				echo"<tr>
						<th><b>&emsp;&emsp;COURSE:"."<span id='genGrade" .$indexOGen."'>&#8195;".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassName"][0] . "</span>" ."</b></th>
						<th class = 'tableGrade'><b>3</b></th>
						<th class = 'tableGrade'><b></b></th>
						<th class = 'tableGrade'><b>"."<span id='genGrade" .$indexOGen."'>&#8195;".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassGrade"][0] . "</span>" ."</b></th>
						<th class = 'tableGrade'></th>
					</tr>";
			$indexOGen++;
			?>
		</table>
	</div>
	<!-- III. COMPETENCIES ACROSS THE CIRRICULUM TABLE-->
	<div class = "section">
		<table>
			<tr>
				<th class = "tableCaption">III. COMPETENCIES ACROSS THE CIRRICULUM</th>
				<th class = "tableGradeCaption">RC</th>
				<th class = "tableGradeCaption">CR</th>
				<th class = "tableGradeCaption">GR</th>
				<th class = "tableGradeCaption">CAC</th>
			</tr>
	<!-- A. WRITING INTENSIVE SECTION -->
			<tr>
				<th>A. Writing Intensive (WI) <b class = "smaller">(9 credits)</b></th>
			</tr>
			<?php
				for($i = 0; $i < 3; $i++)
				{
					echo "<tr>
							<th><b>&emsp;&emsp;COURSE:"."<span id='genGrade" .$indexOGen."'>&#8195;".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassName"][0] . "</span>" ."</b></th>
							<th class = 'tableGrade'><b>3</b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'><b>"."<span id='genGrade" .$indexOGen."'>&#8195;".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassGrade"][0] . "</span>" ."</b></th>
							<th class = 'tableGrade'>WI</th>
						</tr>";
					$indexOGen++;
				}
			?>
	<!-- B. QUATNTITAVE LEARNING / COMPUTER-INTENSIVE SECTION -->
			<tr>
				<th>B. Quantitative Learning (QL) <b class = "smaller">(3 credits) </b>OR
					<br/>&emsp; Computer-Intensive (CP)
					<b class = "smaller">(3 credits)</b>
				</th>
			</tr>
			<?php
				echo"<tr>
						<th><b>&emsp;&emsp;COURSE:"."<span id='genGrade" .$indexOGen."'>&#8195;".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassName"][0] . "</span>" ."</b></th>
						<th class = 'tableGrade'><b>3</b></th>
						<th class = 'tableGrade'><b></b></th>
						<th class = 'tableGrade'><b>"."<span id='genGrade" .$indexOGen."'>&#8195;".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassGrade"][0] . "</span>" ."</b></th>
						<th class = 'tableGrade'></th>
					</tr>";
			$indexOGen++;
			?>
	<!-- C. VISUAL LITERACY / COMMUNICATION-INTENSIVE SECTION -->
			<tr>
				<th>C. Visual Literacy (VL) <b class = "smaller">(3 credits) </b>OR
					<br/>&emsp; Communication-Intensive (CM)
					<b class = "smaller">(3 credits)</b>
				</th>
			</tr>
			<?php
				echo"<tr>
						<th><b>&emsp;&emsp;COURSE:"."<span id='genGrade" .$indexOGen."'>&#8195;".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassName"][0] . "</span>" ."</b></th>
						<th class = 'tableGrade'><b>3</b></th>
						<th class = 'tableGrade'><b>						
						</b></th>
						<th class = 'tableGrade'><b>"."<span id='genGrade" .$indexOGen."'>&#8195;".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassGrade"][0] . "</span>" ."
						</b></th>
						<th class = 'tableGrade'></th>
					</tr>";
			$indexOGen++;
			?>
			
	<!-- D. CULTURAL DIVERSITY SECTION -->
			<tr>
				<th>D. Cultural Diversity <b class = "smaller">(3 credits) </b></th>
			</tr>
			<?php
				echo"<tr>
						<th><b>&emsp;&emsp;COURSE:"."<span id='genGrade" .$indexOGen."'>&#8195;".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassName"][0] . "</span>" ."</b></th>
						<th class = 'tableGrade'><b>3</b></th>
						<th class = 'tableGrade'><b></b></th>
						<th class = 'tableGrade'><b>"."<span id='genGrade" .$indexOGen."'>&#8195;".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassGrade"][0] . "</span>" ."</b></th>
						<th class = 'tableGrade'>CD</th>
					</tr>";
			$indexOGen++;
			?>
	<!-- E. CRITICAL THINKING SECTION -->
			<tr>
				<th>E. Critical Thinking <b class = "smaller">(3 credits) </b></th>
			</tr>
			<?php
				echo"<tr>
						<th><b>&emsp;&emsp;COURSE:"."<span id='genGrade" .$indexOGen."'>&#8195;".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassName"][0] . "</span>" ."</b></th>
						<th class = 'tableGrade'><b>3</b></th>
						<th class = 'tableGrade'><b></b></th>
						<th class = 'tableGrade'><b>"."<span id='genGrade" .$indexOGen."'>&#8195;".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassGrade"][0] . "</span>" ."</b></th>
						<th class = 'tableGrade'>CT</th>
					</tr>";
			$indexOGen++;
			?>
		</table>
	<!-- GENERAL EDUCATION CHECKSHEET NOTES PT.1 -->
		<div class = "notes1"><br/><b>
			A Competency Across the Curriculum (CAC) course is not a separate
			course, but rather an overlay that is 'double counted' as fulfilling both the
			CAC requirement and another requirement in either General Education
			(except for the University Core) the major, or the minor.</b><br/><br/>
			<table>
				<tr>
					<th class = "noteTable">RC</th>
					<td class = "noteTable">= Minimum required number of credits</td>
				</tr>
				<tr>
					<th class = "noteTable">CR</th>
					<td class = "noteTable">= Credits earned</td>
				</tr>
				<tr>
					<th class = "noteTable">GR</th>
					<td class = "noteTable">= Grade earned</td>
				</tr>
				<tr>
					<th class = "noteTable">CAC</th>
					<td class = "noteTable">= Competency Across the Curriculum</td>
				</tr>
			</table>
			<br/>
			<div class = "noteBox">
				NOTE:
				<b>
					GEG courses with a lab and 40, 322, and 323 may be used in II.A.
					GEG courses 40, 204, 274, 304, 322, 323, 324, 347, 380, and 394
					may NOT be used in II.B.
				</b>
			</div>
		</div>
	</div>
	<div class = "buffer">&nbsp;</div>
	<!-- Create horizontal break in page -->
	<div class = "newSection"></div>
	<div class = "header">
		<hr/>
	</div>
	<div class = "newSection"></div>
	<!-- IV. COLLEGE DISTRIBUTION TABLE -->
	<div class = "buffer">&nbsp;</div>
	<div class = "section">
		<table>
			<tr>
				<th class = "tableCaption">IV. COLLEGE DISTRIBUTION (33 Credits)</th>
				<th class = "tableGradeCaption">RC</th>
				<th class = "tableGradeCaption">CR</th>
				<th class = "tableGradeCaption">GR</th>
				<th class = "tableGradeCaption">CAC</th>
			</tr>
	<!-- A. NATURAL SCIENCES SECTION -->
			<tr>
				<th>A. Natural Science, Mathematics, and Computer Science# (6 credits):
					<b class = "smaller">Choose one course in each subcategory.</b>
				</th>
			</tr>
			<!-- 1. NATURAL SCIENCES WITH LAB SUBSECTION -->
			<tr>
				<th>&nbsp; 1. Natural Science with Lab:
					<b class = "smaller">AST, BIO, CHM, ENV, GEL, PHY,
						<br/>&emsp;or MAR; or GEG
						(see notes at right)
					</b>
				</th>
			</tr>
			<?php
				echo"<tr>
						<th><b>&emsp;&emsp;COURSE:"."<span id='genGrade" .$indexOGen."'>&#8195;".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassName"][0] . "</span>" ."</b></th>
						<th class = 'tableGrade'><b>3</b></th>
						<th class = 'tableGrade'><b></b></th>
						<th class = 'tableGrade'><b>"."<span id='genGrade" .$indexOGen."'>&#8195;".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassGrade"][0] . "</span>" ."</b></th>
						<th class = 'tableGrade'></th>
					</tr>";
			$indexOGen++;
			?>
			<!-- 2. NATURAL SCIENCES ELECTIVE SUBSECTION -->
			<tr>
				<th>&nbsp; 2. Elective:
					<b class = "smaller">MAT, CSC, AST, BIO, CHM, ENV, GEL, PHY, or 
						<br/>&emsp;MAR; or GEG
						(see notes at right)
					</b>
				</th>
			</tr>
			<?php
				echo"<tr>
						<th><b>&emsp;&emsp;COURSE:"."<span id='genGrade" .$indexOGen."'>&#8195;".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassName"][0] . "</span>" ."</b></th>
						<th class = 'tableGrade'><b>3</b></th>
						<th class = 'tableGrade'><b></b></th>
						<th class = 'tableGrade'><b>"."<span id='genGrade" .$indexOGen."'>&#8195;".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassGrade"][0] . "</span>" ."</b></th>
						<th class = 'tableGrade'></th>
					</tr>";
			$indexOGen++;
			?>
	<!-- B. SOCIAL SCIENCE SECTION -->
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
						<th><b>&emsp;&emsp;COURSE:"."<span id='genGrade" .$indexOGen."'>&#8195;".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassName"][0] . "</span>" ."</b></th>
						<th class = 'tableGrade'><b>3</b></th>
						<th class = 'tableGrade'><b></b></th>
						<th class = 'tableGrade'><b>"."<span id='genGrade" .$indexOGen."'>&#8195;".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassGrade"][0] . "</span>" ."</b></th>
						<th class = 'tableGrade'></th>
					</tr>";
			$indexOGen++;
			?>
			<!-- 2. SOCIAL SCIENCE ELECTIVE 2 SUBSECTION -->
			<tr>
				<th>&nbsp; 2. Elective: 
					<b class = "smaller">PSY, SOC, CRJ, or SWK</b>
				</th>
			</tr>
			<?php
				echo"<tr>
						<th><b>&emsp;&emsp;COURSE:"."<span id='genGrade" .$indexOGen."'>&#8195;".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassName"][0] . "</span>" ."</b></th>
						<th class = 'tableGrade'><b>3</b></th>
						<th class = 'tableGrade'><b></b></th>
						<th class = 'tableGrade'><b>"."<span id='genGrade" .$indexOGen."'>&#8195;".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassGrade"][0] . "</span>" ."</b></th>
						<th class = 'tableGrade'></th>
					</tr>";
			$indexOGen++;
			?>
			<!-- 3. SOCIAL SCIENCE ELECTIVE 3 SUBSECTION -->
			<tr>
				<th>&nbsp; 3. Elective: 
					<b class = "smaller">ANT, HIS, ECO, GEG (see note at right), PSY, POL, 
						<br/>&emsp;SOC, CRJ, or SWK
					</b>
				</th>
			</tr>
			<?php
				echo"<tr>
						<th><b>&emsp;&emsp;COURSE:"."<span id='genGrade" .$indexOGen."'>&#8195;".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassName"][0] . "</span>" ."</b></th>
						<th class = 'tableGrade'><b>3</b></th>
						<th class = 'tableGrade'><b></b></th>
						<th class = 'tableGrade'><b>"."<span id='genGrade" .$indexOGen."'>&#8195;".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassGrade"][0] . "</span>" ."</b></th>
						<th class = 'tableGrade'></th>
					</tr>";
			$indexOGen++;
			?>
		</table>
	</div>
	<!-- IV. COLLEGE DISTRIBUTION TABLE CONTINUED -->
	<div class = "section">
		<table>
			<tr>
				<th class = "tableCaption"></th>
				<th class = "tableGradeCaption">RC</th>
				<th class = "tableGradeCaption">CR</th>
				<th class = "tableGradeCaption">GR</th>
				<th class = "tableGradeCaption">CAC</th>
			</tr>
	<!-- C. HUMANITIES SECTION -->
			<tr>
				<th>C. Humanities (9 credits):
					<b class = "smaller">Choose one course in each subcategory.</b>
				</th>
			</tr>
			<!-- 1. HUMANITIES ELECTIVE 1 SUBSECTION -->
			<tr>
				<th>&emsp;1. Elective:
					<b class = "smaller">PAG*, ENG, WRI, or HUM</b>
				</th>
			</tr>
			<?php
				echo"<tr>
						<th><b>&emsp;&emsp;COURSE:"."<span id='genGrade" .$indexOGen."'>&#8195;".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassName"][0] . "</span>" ."</b></th>
						<th class = 'tableGrade'><b>3</b></th>
						<th class = 'tableGrade'><b></b></th>
						<th class = 'tableGrade'><b>"."<span id='genGrade" .$indexOGen."'>&#8195;".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassGrade"][0] . "</span>" ."</b></th>
						<th class = 'tableGrade'></th>
					</tr>";
			$indexOGen++;
			?>
			<!-- 2. HUMANITIES ELECTIVE 2 SUBSECTION -->
			<tr>
				<th>&emsp;2. Elective:
					<b class = "smaller">Modern Language (103 or above) or PHI</b>
				</th>
			</tr>
			<?php
				echo"<tr>
						<th><b>&emsp;&emsp;COURSE:"."<span id='genGrade" .$indexOGen."'>&#8195;".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassName"][0] . "</span>" ."</b></th>
						<th class = 'tableGrade'><b>3</b></th>
						<th class = 'tableGrade'><b></b></th>
						<th class = 'tableGrade'><b>"."<span id='genGrade" .$indexOGen."'>&#8195;".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassGrade"][0] . "</span>" ."</b></th>
						<th class = 'tableGrade'></th>
					</tr>";
			$indexOGen++;
			?>
			<!-- 3. SOCIAL SCIENCE ELECTIVE 3 SUBSECTION -->
			<tr>
				<th>&emsp;3. Elective: 
					<b class = "smaller">PAG*, ENG, WRI, HUM, Modern Language 
						<br/>&emsp; (103 or above), or PHI
					</b>
				</th>
			</tr>
			<?php
				echo"<tr>
						<th><b>&emsp;&emsp;COURSE:"."<span id='genGrade" .$indexOGen."'>&#8195;".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassName"][0] . "</span>" ."</b></th>
						<th class = 'tableGrade'><b>3</b></th>
						<th class = 'tableGrade'><b></b></th>
						<th class = 'tableGrade'><b>"."<span id='genGrade" .$indexOGen."'>&#8195;".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassGrade"][0] . "</span>" ."</b></th>
						<th class = 'tableGrade'></th>
					</tr>";
			$indexOGen++;
			?>
	<!-- D. FREE ELECTIVES SECTION -->
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
							<th><b>&emsp;&emsp;COURSE:"."<span id='genGrade" .$indexOGen."'>&#8195;".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassName"][0] . "</span>" ."</b></th>
							<th class = 'tableGrade'><b>3</b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'><b>"."<span id='genGrade" .$indexOGen."'>&#8195;".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassGrade"][0] . "</span>" ."</b></th>
							<th class = 'tableGrade'></th>
						</tr>";
					$indexOGen++;
				}
			?>
		</table>
		<!-- GENERAL EDUCATION CHECKSHEET NOTES PT.2 -->
			<div class = "notes1"><br/>	
				<div class = "noteBox">
					NOTE: 
					<b>GEG courses with a lab and 40, 322, and 323 may be used
						in IV.A. and GEG courses 40, 204, 274, 304, 322, 323, 324, 347,
						380, and 394 may NOT be used in IV.B.
					</b>
				</div>
			</div>
		</div>
		<div class = "buffer">&nbsp;</div>
		<!-- GENERAL EDUCATION CHECKSHEET NOTES PT.3 -->
		<div class = "newSection"></div>
		<div class = "noteBuffer">&nbsp;</div>
		<div class = "notes2"><br/>
			# Students in the College of Liberal Arts and Sciences are required 
			to take at least one course in Biological Science (BIO) and at least 
			one course in Physical Science (AST, CHM, ENV, GEL, PHY, MAR, GEG 
			with lab, or GEG 40, GEG 322, or GEG 323), and at least one of which 
			must be a lab (each course may be counted in either sections II.A
			or IV.A).
			<br/>* Excludes PAG 011 and PAG 012
		</div>
		<div class = "noteBuffer">&nbsp;</div>
		<!-- Create break in page -->
		<div class = "newSection"></div>
		<div class = "header">
			<hr/>
		</div>
		<div class = "newSection"></div>
<!-- #BS CSC SOFTWARE DEVELOPMENT MAJOR PROGRAM TABLE# -->
		<div class = "header">BS Computer Science: Software Development (60 SH)</div>
		<div class = "newSection"></div>
		<div class = "buffer">&nbsp;</div>
		<div class = "section">
			<table>
				<tr>
					<th class = "tableHeader" colspan = "3">
						B. Major Program: 51 sh</th>
				</tr>
		<!-- CSC SD REQUIRED COURSES SECTION -->
				<tr>
					<th>&emsp;1. Required Courses: <b>33 sh</b></th>
					<td class = "tableGrade">Gr</td>
					<td class = "tableGrade">SH</td>
				</tr>
				<?php
					for($i = 0; $i < 11; $i++){
						echo"<tr>	
								<td>&emsp;&emsp;"."<span id='proGrade" .$indexOPro."'>&#8195;".$sData["Student"][0]["Program"][0]["Class"][$indexOPro]["ClassName"][0] . "</span>" ."</td>
								<td  class = 'tableGrade'>"."<span id='proGrade" .$indexOPro."'>&#8195;".$sData["Student"][0]["Program"][0]["Class"][$indexOPro]["ClassGrade"][0] . "</span>" ."</td>
								<td  class = 'tableGrade'></td>
							</tr>";$indexOPro++;}
				?>
		<!-- CSC SD ELECTIVE COURSES SECTION -->
				<tr>
					<th>&emsp;2. Elective Courses: 
						<b>18 sh (no more than two 200-level)</b></th>
					<td class = "tableGrade">Gr</td>
					<td class = "tableGrade">SH</td>
				</tr>
				<?php
					for($i = 0; $i < 6; $i++){
						echo"<tr>	
								<td>&emsp;&emsp;"."<span id='proGrade" .$indexOPro."'>&#8195;".$sData["Student"][0]["Program"][0]["Class"][$indexOPro]["ClassName"][0] . "</span>" ."</td>
								<td  class = 'tableGrade'>"."<span id='proGrade" .$indexOPro."'>&#8195;".$sData["Student"][0]["Program"][0]["Class"][$indexOPro]["ClassGrade"][0] . "</span>" ."</td>
								<td  class = 'tableGrade'></td> 
							</tr>";$indexOPro++;}
				?>
				<tr><th class = "tableSpace"></th></tr>
			</table>
		</div>
<!-- CSC SOFTWARE DEVELOPMENT CONCOMITANT COURSE TABLE -->
		<div class = "section">
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
					for($i = 0; $i < 3; $i++){
						echo"<tr>	
								<td>&emsp;&emsp;"."<span id='proGrade" .$indexOPro."'>&#8195;".$sData["Student"][0]["Program"][0]["Class"][$indexOPro]["ClassName"][0] . "</span>" ."</td>
								<td class = 'tableGrade'>"."<span id='proGrade" .$indexOPro."'>&#8195;".$sData["Student"][0]["Program"][0]["Class"][$indexOPro]["ClassGrade"][0] . "</td>
								<td class = 'tableGrade'></td>
							</tr>";$indexOPro++;}
				?>
		<!-- CSC SD INTERNSHIP SECTION -->
				<tr>
					<th>&emsp;2. Internship - optional (free elective)</th>
					<td class = "tableGrade">Gr</td>
					<td class = "tableGrade">SH</td>
				</tr>
				<?php
					for($i = 0; $i < 2; $i++){
						echo"<tr>	
								<td>&emsp;&emsp;"."<span id='proGrade" .$indexOPro."'>&#8195;".$sData["Student"][0]["Program"][0]["Class"][$indexOPro]["ClassName"][0] . "</span>" ."</td>
								<td  class = 'tableGrade'>"."<span id='proGrade" .$indexOPro."'>&#8195;".$sData["Student"][0]["Program"][0]["Class"][$indexOPro]["ClassGrade"][0] . "</span>" ."</td>
								<td  class = 'tableGrade'>3-6</td>
							</tr>";$indexOPro++;}
				?>
		<!-- BS COMPUTER SCIENCE NOTES -->
				<tr>
					<td>&nbsp;</td>
					<td></td><td></td>
				</tr>
				<tr>
					<td class = "bsNotes">Notes on BS in Computer Science</td>
					<td></td><td></td>
				</tr>
				<tr>
					<td>Before taking any 300-level course a student must have 
						completed 18 credit hours in CSC courses numbered 125 or 
						above with a GPA of 2.25 in the CSC courses.
					</td>
					<td></td><td></td>
				</tr>
				<tr>
					<td>Students minoring in Math should take MAT 301</td>
					<td></td><td></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td></td><td></td>
				</tr>
				<tr>
					<td>CSC-prefix courses below 125-level, CSC 130, CSC 280 and 
						CSC 380 do not count toward the BS in Software Development
					</td>
					<td></td><td></td>
				</tr>
			</table>
			<table>
				<tr><th class = "tableSpace"></th></tr>
				<tr>
					<th><b>Internal Transfer: 2.25 GPA needed</b></th>
				</tr>
				<tr>
					<th><b>Graduation requirement: 2.25 GPA Overall, 2.25 GPA Major</b></th>
				</tr>
				<tr>
					<th><b>Program Code: ULASCSCSD</b></th>
				</tr>
				<tr>
					<th><b>Version Number: 2118</b></th>
				</tr>
			</table>
		</div>
		<div class = "buffer">&nbsp;</div>
	</body>
</html>		
