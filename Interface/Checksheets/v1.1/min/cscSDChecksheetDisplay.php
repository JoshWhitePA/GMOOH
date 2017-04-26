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
      $sxi = new SimpleXmlIterator($fname, null, true);
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
    $results = $logic->displayOfficialChecksheet($_SESSION['userID']);
	if($results != null){
		foreach ($results as $row) {
			$sData = xml2array($row["SaveData"]);
		}
	}
	else{
		//Failsafe data
		$sData = xml2array('BlankData.xml');
	}
    //print_r($sData);
    //echo "<br><br>";
    $indexOGen = 0;
    $indexOPro = 0;
    
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
					<th id = "oc" class = "topSection"><a class = "sectionNoteStyle">
						A. Oral Communication</a>
					</th>
				</tr>
				<?php
					echo"<tr>
							<th class = 'courseBox'><div id = 'Oral Communication'  class = 'courseNameBox'>&emsp;"."<span id='genClass" .$indexOGen."'>&#8195;".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassName"][0] . "</span>" ."</div></th>
							<th class = 'tableGrade'><b>3</b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'><b>"."<span id='genGrade" .$indexOGen."'>&#8195;".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassGrade"][0] . "</span>" ."
							</b></th>
						</tr>"; $indexOGen++;
                        
				?>
		<!-- B. WRITTEN COMMUNICATION SECTION -->
				<tr>
					<th id = "wc" class = "topSection"><a class = "sectionNoteStyle">
						B. Written Communication</a>
					</th>
				</tr>
				<?php
					echo"<tr>
							<th class = 'courseBox'><div id = 'Written Communication'  class = 'courseNameBox'>&emsp;"."<span id='genClass" .$indexOGen."'>&#8195;".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassName"][0] . "</span>" ."</div></th>
							<th class = 'tableGrade'><b>3</b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'><b></b></th>
						</tr>"; $indexOGen++;
				?>
		<!-- C. MATHEMATICS SECTION -->
				<tr>
					<th id = "mat" class = "topSection"><a class = "sectionNoteStyle">
						C. Mathematics</a>
					</th>
				</tr>
				<?php
					echo"<tr>
							<th class = 'courseBox'><div id = 'Mathematics'  class = 'courseNameBox'>&emsp;"."<span id='genClass" .$indexOGen."'>&#8195;".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassName"][0] . "</span>" ."</div></th>
							<th class = 'tableGrade'><b>3</b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'><b>"."<span id='genGrade" .$indexOGen."'>&#8195;".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassGrade"][0] . "</span>" ."</b></th>
						</tr>"; $indexOGen++;
				?>
		<!-- D. WELLNESS SECTION -->
				<tr>
					<th id = "well" class = "topSection"><a class = "sectionNoteStyle">
						D. Wellness</a>
					</th>
				</tr>
				<?php
					echo"<tr>
							<th class = 'courseBox'><div id = 'Wellness'  class = 'courseNameBox'>&emsp;"."<span id='genClass" .$indexOGen."'>&#8195;".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassName"][0] . "</span>" ."</div></th>
							<th class = 'tableGrade'><b>3</b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'><b>"."<span id='genGrade" .$indexOGen."'>&#8195;".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassGrade"][0] . "</span>" ."</b></th>
						</tr>"; $indexOGen++;
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
					<th id = "ns" class = "topSection"><a class = "sectionNoteStyle">
						A. Natural Sciences</a>
					</th>
				</tr>
				<?php
					echo"<tr>
							<th class = 'courseBox'><div id = 'Natural Sciences'  class = 'courseNameBox'>&emsp;"."<span id='genClass" .$indexOGen."'>&#8195;".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassName"][0] . "</span>" ."</div></th>
							<th class = 'tableGrade'><b>3</b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'><b>"."<span id='genGrade" .$indexOGen."'>&#8195;".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassGrade"][0] . "</span>" ."</b></th>
							<th class = 'tableGrade'></th>
						</tr>"; $indexOGen++;
				?>
		<!-- B. SOCIAL SCIENCES SECTION -->
				<tr>
					<th id = "ss" class = "topSection"><a class = "sectionNoteStyle">
						B. Social Sciences</a>
					</th>
				</tr>
				<?php
					echo"<tr>
							<th class = 'courseBox'><div id = 'Social Sciences'  class = 'courseNameBox'>&emsp;"."<span id='genClass" .$indexOGen."'>&#8195;".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassName"][0] . "</span>" ."</div></th>
							<th class = 'tableGrade'><b>3</b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'><b>"."<span id='genGrade" .$indexOGen."'>&#8195;".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassGrade"][0] . "</span>" ."</b></th>
							<th class = 'tableGrade'></th>
						</tr>"; $indexOGen++;
				?>
		<!-- C. HUMANITIES SECTION -->
				<tr>
					<th id = "hum" class = "topSection"><a class = "sectionNoteStyle">
						C. Humanities</a>
					</th>
				</tr>
				<?php
					echo"<tr>
							<th class = 'courseBox'><div id = 'Humanities'  class = 'courseNameBox'>&emsp;"."<span id='genClass" .$indexOGen."'>&#8195;".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassName"][0] . "</span>" ."</div></th>
							<th class = 'tableGrade'><b>3</b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'><b>"."<span id='genGrade" .$indexOGen."'>&#8195;".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassGrade"][0] . "</span>" ."</b></th>
							<th class = 'tableGrade'></th>
						</tr>"; $indexOGen++;
				?>
		<!-- D. ARTS SECTION -->
				<tr>
					<th id = "art" class = "topSection"><a class = "sectionNoteStyle">
						D. Arts</a>
					</th>
				</tr>
				<?php
					echo"<tr>
							<th class = 'courseBox'><div id = 'Arts'  class = 'courseNameBox'>&emsp;"."<span id='genClass" .$indexOGen."'>&#8195;".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassName"][0] . "</span>" ."</div></th>
							<th class = 'tableGrade'><b>3</b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'></th>
						</tr>"; $indexOGen++;
				?>
		<!-- E. FREE ELECTIVE SECTION -->
				<tr>
					<th id = "fel" class = "topSection"><a class = "sectionNoteStyle">
						E. Free Elective</a>
					</th>
				</tr>
				<?php
					echo"<tr>
							<th class = 'courseBox'><div id = 'II. E. Free Elective'  class = 'courseNameBox'>&emsp;"."<span id='genClass" .$indexOGen."'>&#8195;".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassName"][0] . "</span>" ."</div></th>
							<th class = 'tableGrade'><b>3</b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'><b>"."<span id='genGrade" .$indexOGen."'>&#8195;".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassGrade"][0] . "</span>" ."</b></th>
							<th class = 'tableGrade'></th>
						</tr>"; $indexOGen++;
				?>
			</table>
<!-- III. COMPETENCIES ACROSS THE CURRICULUM TABLE-->
			<table>
				<tr><th class = "tableSpace"></th></tr>
				<tr>
					<th class = "tableCaption"><u>
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
								<th class = 'courseBox'><div id = 'Writing Intensive'  class = 'courseNameBox'>&emsp;"."<span id='genClass" .$indexOGen."'>&#8195;".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassName"][0] . "</span>" ."</div></th>
								<th class = 'tableGrade'><b>3</b></th>
								<th class = 'tableGrade'><b></b></th>
								<th class = 'tableGrade'><b>"."<span id='genGrade" .$indexOGen."'>&#8195;".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassGrade"][0] . "</span>" ."</b></th>
								<th class = 'tableGrade'>WI</th>
							</tr>"; $indexOGen++;;
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
							<th class = 'courseBox'><div id = 'QL or CP'  class = 'courseNameBox'>&emsp;"."<span id='genClass" .$indexOGen."'>&#8195;".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassName"][0] . "</span>" ."</div></th>
							<th class = 'tableGrade'><b>3</b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'><b>"."<span id='genGrade" .$indexOGen."'>&#8195;".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassGrade"][0] . "</span>" ."</b></th>
							<th class = 'tableGrade'></th>
						</tr>"; $indexOGen++;
				?>
		<!-- C. VISUAL LITERACY / COMMUNICATION-INTENSIVE SECTION -->
				<tr>
					<th>C. Visual Literacy <i>OR</i>
						<br/>&emsp; Communication-Intensive
					</th>
				</tr>
				<?php
					echo"<tr>
							<th class = 'courseBox'><div id = 'VL or CM'  class = 'courseNameBox'>&emsp;"."<span id='genClass" .$indexOGen."'>&#8195;".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassName"][0] . "</span>" ."</div></th>
							<th class = 'tableGrade'><b>3</b></th>
							<th class = 'tableGrade'><b>						
							</b></th>
							<th class = 'tableGrade'><b>
							</b></th>
							<th class = 'tableGrade'></th>
						</tr>"; $indexOGen++;
				?>
		<!-- D. CULTURAL DIVERSITY SECTION -->
				<tr>
					<th>D. Cultural Diversity</th>
				</tr>
				<?php
					echo"<tr>
							<th class = 'courseBox'><div id = 'Cultural Diversity'  class = 'courseNameBox'>&emsp;"."<span id='genClass" .$indexOGen."'>&#8195;".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassName"][0] . "</span>" ."</div></th>
							<th class = 'tableGrade'><b>3</b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'><b>"."<span id='genGrade" .$indexOGen."'>&#8195;".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassGrade"][0] . "</span>" ."</b></th>
							<th class = 'tableGrade'>CD</th>
						</tr>"; $indexOGen++;
				?>
		<!-- E. CRITICAL THINKING SECTION -->
				<tr>
					<th>E. Critical Thinking</th>
				</tr>
				<?php
					echo"<tr>
							<th class = 'courseBox'><div id = 'Critical Thinking'  class = 'courseNameBox'>&emsp;"."<span id='genClass" .$indexOGen."'>&#8195;".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassName"][0] . "</span>" ."</div></th>
							<th class = 'tableGrade'><b>3</b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'><b>"."<span id='genGrade" .$indexOGen."'>&#8195;".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassGrade"][0] . "</span>" ."</b></th>
							<th class = 'tableGrade'>CT</th>
						</tr>"; $indexOGen++;
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
					<th>A. Natural Science, Mathematics, and Computer Science</th>
				</tr>
				<!-- 1. NATURAL SCIENCES WITH LAB SUBSECTION -->
				<tr>
					<th id = "nslab" class = "topSection"><a class = "sectionNoteStyle">
						&nbsp; 1. Natural Science with Lab</a>
					</th>
				</tr>
				<?php
					echo"<tr>
							<th class = 'courseBox'><div id = 'Natural Science with Lab'  class = 'courseNameBox'>&emsp;"."<span id='genClass" .$indexOGen."'>&#8195;".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassName"][0] . "</span>" ."</div></th>
							<th class = 'tableGrade'><b>3</b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'><b>"."<span id='genGrade" .$indexOGen."'>&#8195;".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassGrade"][0] . "</span>" ."</b></th>
							<th class = 'tableGrade'></th>
						</tr>"; $indexOGen++;
				?>
				<!-- 2. NATURAL SCIENCES ELECTIVE SUBSECTION -->
				<tr>
					<th id = "nsel" class = "topSection"><a class = "sectionNoteStyle">
						&nbsp; 2. Elective</a>
					</th>
				</tr>
				<?php
					echo"<tr>
							<th class = 'courseBox'><div id = 'IV. A. 2. Elective'  class = 'courseNameBox'>&emsp;"."<span id='genClass" .$indexOGen."'>&#8195;".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassName"][0] . "</span>" ."</div></th>
							<th class = 'tableGrade'><b>3</b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'><b>"."<span id='genGrade" .$indexOGen."'>&#8195;".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassGrade"][0] . "</span>" ."</b></th>
							<th class = 'tableGrade'></th>
						</tr>"; $indexOGen++;
				?>
		<!-- B. SOCIAL SCIENCE SECTION -->
				<tr>
					<th>B. Social Science</th>
				</tr>
				<!-- 1. SOCIAL SCIENCE ELECTIVE 1 SUBSECTION -->
				<tr>
					<th id = "ssel1" class = "topSection"><a class = "sectionNoteStyle">
						&nbsp; 1. Elective</a>
					</th>
				</tr>
				<?php
					echo"<tr>
							<th class = 'courseBox'><div id = 'IV. B. 1. Elective'  class = 'courseNameBox'>&emsp;"."<span id='genClass" .$indexOGen."'>&#8195;".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassName"][0] . "</span>" ."</div></th>
							<th class = 'tableGrade'><b>3</b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'><b>"."<span id='genGrade" .$indexOGen."'>&#8195;".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassGrade"][0] . "</span>" ."</b></th>
							<th class = 'tableGrade'></th>
						</tr>"; $indexOGen++;
				?>
				<!-- 2. SOCIAL SCIENCE ELECTIVE 2 SUBSECTION -->
				<tr>
					<th id = "ssel2" class = "topSection"><a class = "sectionNoteStyle">
						&nbsp; 2. Elective</a>
					</th>
				</tr>
				<?php
					echo"<tr>
							<th class = 'courseBox'><div id = 'IV. B. 2. Elective'  class = 'courseNameBox'>&emsp;"."<span id='genClass" .$indexOGen."'>&#8195;".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassName"][0] . "</span>" ."</div></th>
							<th class = 'tableGrade'><b>3</b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'><b>"."<span id='genGrade" .$indexOGen."'>&#8195;".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassGrade"][0] . "</span>" ."</b></th>
							<th class = 'tableGrade'></th>
						</tr>"; $indexOGen++;
				?>
				<!-- 3. SOCIAL SCIENCE ELECTIVE 3 SUBSECTION -->
				<tr>
					<th id = "ssel3" class = "topSection"><a class = "sectionNoteStyle">
						&nbsp; 3. Elective</a>
					</th>
				</tr>
				<?php
					echo"<tr>
							<th class = 'courseBox'><div id = 'IV. B. 3. Elective'  class = 'courseNameBox'>&emsp;"."<span id='genClass" .$indexOGen."'>&#8195;".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassName"][0] . "</span>" ."</div></th>
							<th class = 'tableGrade'><b>3</b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'><b>"."<span id='genGrade" .$indexOGen."'>&#8195;".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassGrade"][0] . "</span>" ."</b></th>
							<th class = 'tableGrade'></th>
						</tr>"; $indexOGen++;
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
					<th id = "humel1" class = "topSection"><a class = "sectionNoteStyle">
						&emsp;1. Elective</a>
					</th>
				</tr>
				<?php
					echo"<tr>
							<th class = 'courseBox'><div id = 'IV. C. 1. Elective'  class = 'courseNameBox'>&emsp;"."<span id='genClass" .$indexOGen."'>&#8195;".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassName"][0] . "</span>" ."</div></th>
							<th class = 'tableGrade'><b>3</b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'><b>"."<span id='genGrade" .$indexOGen."'>&#8195;".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassGrade"][0] . "</span>" ."</b></th>
							<th class = 'tableGrade'></th>
						</tr>"; $indexOGen++;
				?>
				<!-- 2. HUMANITIES ELECTIVE 2 SUBSECTION -->
				<tr>
					<th id = "humel2" class = "topSection"><a class = "sectionNoteStyle">
						&emsp;2. Elective</a>
					</th>
				</tr>
				<?php
					echo"<tr>
							<th class = 'courseBox'><div id = 'IV. C. 2. Elective'  class = 'courseNameBox'>&emsp;"."<span id='genClass" .$indexOGen."'>&#8195;".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassName"][0] . "</span>" ."</div></th>
							<th class = 'tableGrade'><b>3</b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'><b>"."<span id='genGrade" .$indexOGen."'>&#8195;".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassGrade"][0] . "</span>" ."</b></th>
							<th class = 'tableGrade'></th>
						</tr>"; $indexOGen++;
				?>
				<!-- 3. SOCIAL SCIENCE ELECTIVE 3 SUBSECTION -->
				<tr>
					<th id = "humel3" class = "topSection"><a class = "sectionNoteStyle">
						&emsp;3. Elective</a>
					</th>
				</tr>
				<?php
					echo"<tr>
							<th class = 'courseBox'><div id = 'IV. C. 3. Elective'  class = 'courseNameBox'>&emsp;"."<span id='genClass" .$indexOGen."'>&#8195;".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassName"][0] . "</span>" ."</div></th>
							<th class = 'tableGrade'><b>3</b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'><b>"."<span id='genGrade" .$indexOGen."'>&#8195;".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassGrade"][0] . "</span>" ."</b></th>
							<th class = 'tableGrade'></th>
						</tr>"; $indexOGen++;
				?>
		<!-- D. FREE ELECTIVES SECTION -->
				<tr>
					<th id = "fel2" class = "topSection"><a class = "sectionNoteStyle">
						D. Free Electives</a>
					</th>
				</tr>
				<?php
					for($i = 0; $i < 3; $i++)
					{
						echo"<tr>
								<th class = 'courseBox'><div id = 'IV. D. Elective'  class = 'courseNameBox'>&emsp;"."<span id='genClass" .$indexOGen."'>&#8195;".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassName"][0] . "</span>" ."</div></th>
								<th class = 'tableGrade'><b>3</b></th>
								<th class = 'tableGrade'><b></b></th>
								<th class = 'tableGrade'><b>"."<span id='genGrade" .$indexOGen."'>&#8195;".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassGrade"][0] . "</span>" ."</b></th>
								<th class = 'tableGrade'></th>
							</tr>"; $indexOGen++;
					}
				?>
			</table>
			<br/><hr/><br/>
<!-- #BS CSC SOFTWARE DEVELOPMENT MAJOR PROGRAM TABLE# -->
			<table>
				<tr>
					<th class = "tableHeader" colspan = "3">B. Major Program: 51 sh</th>
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
								<th class = 'courseBox'><div id = 'BS CSC:SD Required' class = 'courseNameBox'>&emsp;"."<span id='proClass" .$indexOPro."'>&#8195;".$sData["Student"][0]["Program"][0]["Class"][$indexOPro]["ClassName"][0] . "</span>" ."</div></th>
								<td  class = 'tableGrade'>"."<span id='proGrade" .$indexOPro."'>&#8195;".$sData["Student"][0]["Program"][0]["Class"][$indexOPro]["ClassGrade"][0] . "</span>" ."</td>
								<td  class = 'tableGrade'></td>
							</tr>"; $indexOPro++;}
				?>
		<!-- CSC SD ELECTIVE COURSES SECTION -->
				<tr>
					<th id = "fel2" class = "topSection"><a class = "sectionNoteStyle">
						&emsp;2. Elective Courses: <b>18 sh</b></a>
					</th>
					<td class = "tableGrade">Gr</td>
					<td class = "tableGrade">SH</td>
				</tr>
				<?php
					for($i = 0; $i < 6; $i++){
						echo"<tr>	
								<th class = 'courseBox'><div id = 'BS CSC:SD Elective' class = 'courseNameBox'>"."<span id='proClass" .$indexOPro."'>&#8195;".$sData["Student"][0]["Program"][0]["Class"][$indexOPro]["ClassName"][0] . "</span>" ."</div></th>
								<td  class = 'tableGrade'>"."<span id='proGrade" .$indexOPro."'>&#8195;".$sData["Student"][0]["Program"][0]["Class"][$indexOPro]["ClassGrade"][0] . "</span>" ."</td>
								<td  class = 'tableGrade'></td>
							</tr>"; $indexOPro++;}
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
					for($i = 0; $i < 3; $i++){
						echo"<tr>	
								<th class = 'courseBox'><div id = 'BS CSC:SD Concomitant' class = 'courseNameBox'>&emsp;"."<span id='proClass" .$indexOPro."'>&#8195;".$sData["Student"][0]["Program"][0]["Class"][$indexOPro]["ClassName"][0] . "</span>" ."</div></th>
								<td class = 'tableGrade'>"."<span id='proGrade" .$indexOPro."'>&#8195;".$sData["Student"][0]["Program"][0]["Class"][$indexOPro]["ClassGrade"][0] . "</span>" ."</td>
								<td class = 'tableGrade'></td>
							</tr>"; $indexOPro++;}
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
								<th class = 'courseBox'><div id = 'BS CSC:SD Internship' class = 'courseNameBox'>&emsp;"."<span id='proClass" .$indexOPro."'>&#8195;".$sData["Student"][0]["Program"][0]["Class"][$indexOPro]["ClassName"][0] . "</span>" ."</div></th>
								<td  class = 'tableGrade'>"."<span id='proGrade" .$indexOPro."'>&#8195;".$sData["Student"][0]["Program"][0]["Class"][$indexOPro]["ClassGrade"][0] . "</span>" ."</td>
								<td  class = 'tableGrade'>3-6</td>
							</tr>"; $indexOPro++;}
				?>
			</table>
		</div>
	</body>
</html>		
