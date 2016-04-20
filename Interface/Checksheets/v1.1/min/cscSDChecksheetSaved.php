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

//    function stripInvalidXml($value){
//        $ret = "";
//        $current;
//        if (empty($value)) {
//            return $ret;
//        }
//
//        $length = strlen($value);
//            for ($i=0; $i < $length; $i++)
//            {
//                $current = ord($value{$i});
//                if (($current == 0x9) ||
//                    ($current == 0xA) ||
//                    ($current == 0xD) ||
//                    (($current >= 0x20) && ($current <= 0xD7FF)) ||
//                    (($current >= 0xE000) && ($current <= 0xFFFD)) ||
//                    (($current >= 0x10000) && ($current <= 0x10FFFF)))
//                {
//                    $ret .= chr($current);
//                }
//                else
//                {
//                    $ret .= " ";
//                }
//            }
//        return $ret;
//    }
function stripInvalidXml($value) {
    $ret = "";
    $current;
    if (empty($value)) {
        return $ret;
    }
    $length = strlen($value);
    for ($i=0; $i < $length; $i++) {
        $current = ord($value{$i});
        if (($current == 0x9) || ($current == 0xA) || ($current == 0xD) || (($current >= 0x20) && ($current <= 0xD7FF)) || (($current >= 0xE000) && ($current <= 0xFFFD)) || (($current >= 0x10000) && ($current <= 0x10FFFF))) {
                $ret .= chr($current);
        }
        else {
            $ret .= "";
        }
    }
    return $ret;
}

$goodChars = array("", "&#47;", "&#39;","&#92;","&#94;","&#126;","&#34;");
$badChars   = array("&", "/", "'","\\","^","~",'"');


    $logic = new Logic();
    $sData = "";
    $results = $logic->displaySaveFromCheck($_SESSION['userID'], $_GET['AIDID']);
    foreach ($results as $row) {
//        echo stripInvalidXml($row["SaveData"]);
//        echo preg_replace('/&(?!#?[a-z0-9]+;)/', '&amp;',$row["SaveData"]);
//        echo str_replace("And","&", stripInvalidXml($row["SaveData"]));
        $sData = xml2array(preg_replace('/&(?!#?[a-z0-9]+;)/', '&amp;',$row["SaveData"]));
        
    }


    
    //print_r($sData);
    //echo "<br><br>";
    $indexOGen = 0;
    $indexOPro = 0;
//    echo $sData["Student"][0]["Program"][0]["Class"][23]["ClassGrade"][0];
    //echo $sData["Student"][0]["GenEd"][0]["Class"][2]["ClassName"][0];


    
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
		<div id = "section" class = "section">
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
					echo "<tr>
							<th class = 'courseBox'><div id = 'Oral Communication' onclick = 'findCourses(this)' class = 'courseNameBox courseNameBoxGen'>&emsp;"."&#8195;<span id='genClass" .$indexOGen."'>".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassName"][0] . "</span>" ."</div></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'><b><input class = 'gradeBox' id = 'genGrade" .$indexOGen."' value='".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassGrade"][0] . "' type = 'text' maxlength = '2' /></b></th>
							</b></th>
						</tr>"; 
                $indexOGen++;
                        
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
							<th class = 'courseBox'><div id = 'Written Communication' onclick = 'findCourses(this)' class = 'courseNameBox courseNameBoxGen'>&emsp;"."&#8195;<span id='genClass" .$indexOGen."'>".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassName"][0] . "</span>" ."</div></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'><b><input class = 'gradeBox' id = 'genGrade" .$indexOGen."' value='".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassGrade"][0] . "' type = 'text' maxlength = '2' /></b></th>
						</tr>"; 
						$indexOGen++;
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
							<th class = 'courseBox'><div id = 'Mathematics' onclick = 'findCourses(this)' class = 'courseNameBox courseNameBoxGen'>&emsp;"."&#8195;<span id='genClass" .$indexOGen."'>".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassName"][0] . "</span>" ."</div></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'><b><input class = 'gradeBox' id = 'genGrade" .$indexOGen."' value='".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassGrade"][0] . "' type = 'text' maxlength = '2' /></b></th>
						</tr>"; $indexOGen++;
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
							<th class = 'courseBox'><div id = 'Wellness' onclick = 'findCourses(this)' class = 'courseNameBox courseNameBoxGen'>&emsp;"."&#8195;<span id='genClass" .$indexOGen."'>".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassName"][0] . "</span>" ."</div></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'><b><input class = 'gradeBox' id = 'genGrade" .$indexOGen."' value='".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassGrade"][0] . "' type = 'text' maxlength = '2' /></b></th>
						</tr>"; 
                $indexOGen++;
				
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
							AST, BIO, CHM, ENV, GEL, PHY, MAR, or <u title = "Click for notes" onclick = "geNotes1()">GEG*</u></div>
					</th>
				</tr>
				<?php
					echo "<tr>
							<th class = 'courseBox'><div id = 'Natural Sciences' onclick = 'findCourses(this)' class = 'courseNameBox courseNameBoxGen'>&emsp;"."&#8195;<span id='genClass" .$indexOGen."'>".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassName"][0] . "</span>" ."</div></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'><b><input class = 'gradeBox' id = 'genGrade" .$indexOGen."' value='".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassGrade"][0] . "' type = 'text' maxlength = '2' /></b></th>
							<th class = 'tableGrade'></th>
						</tr>"; 
                    $indexOGen++;
				?>
		<!-- B. SOCIAL SCIENCES SECTION -->
				<tr>
					<th id = "ss" class = "dropdownSection" onclick = 'displaySectionNotes(this.id)'><a class = "dropButtonNotes">
						B. Social Sciences</a>
						<div class = "dropdownSectionNotes">Any ANT, CRJ, ECO, HIS, INT,
							PSY, POL, SOC, SSE, SWK, or <u title = "Click for notes" onclick = "geNotes1()">GEG*</u></div>
					</th>
				</tr>
				<?php
					echo"<tr>
							<th class = 'courseBox'><div id = 'Social Sciences' onclick = 'findCourses(this)' class = 'courseNameBox courseNameBoxGen'>&emsp;"."&#8195;<span id='genClass" .$indexOGen."'>".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassName"][0] . "</span>" ."</div></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'><b><input class = 'gradeBox' id = 'genGrade" .$indexOGen."' value='".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassGrade"][0] . "' type = 'text' maxlength = '2' /></b></th>
							<th class = 'tableGrade'></th>
						</tr>"; $indexOGen++;
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
							<th class = 'courseBox'><div id = 'Humanities' onclick = 'findCourses(this)' class = 'courseNameBox courseNameBoxGen'>&emsp;"."&#8195;<span id='genClass" .$indexOGen."'>".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassName"][0] . "</span>" ."</div></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'><b><input class = 'gradeBox' id = 'genGrade" .$indexOGen."' value='".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassGrade"][0] . "' type = 'text' maxlength = '2' /></b></th>
							<th class = 'tableGrade'></th>
						</tr>"; $indexOGen++;
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
							<th class = 'courseBox'><div id = 'Arts' onclick = 'findCourses(this)' class = 'courseNameBox courseNameBoxGen'>&emsp;"."&#8195;<span id='genClass" .$indexOGen."'>".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassName"][0] . "</span>" ."</div></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'><b></b></th>
							<<th class = 'tableGrade'><b><input class = 'gradeBox' id = 'genGrade" .$indexOGen."' value='".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassGrade"][0] . "' type = 'text' maxlength = '2' /></b></th>
							<th class = 'tableGrade'></th>
						</tr>"; $indexOGen++;
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
							<th class = 'courseBox'><div id = 'II. E. Free Elective' onclick = 'findCourses(this)' class = 'courseNameBox courseNameBoxGen'>&emsp;"."&#8195;<span id='genClass" .$indexOGen."'>".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassName"][0] . "</span>" ."</div></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'><b><input class = 'gradeBox' id = 'genGrade" .$indexOGen."' value='".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassGrade"][0] . "' type = 'text' maxlength = '2' /></b></th>
							<th class = 'tableGrade'></th>
						</tr>"; $indexOGen++;
				?>
			</table>
<!-- III. COMPETENCIES ACROSS THE CURRICULUM TABLE-->
			<table>
				<tr><th class = "tableSpace"></th></tr>
				<tr>
					<th class = "tableCaption"><u title = "Click for notes" onclick = "geNotes2()">
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
								<th class = 'courseBox'><div id = 'Writing Intensive' onclick = 'findCourses(this)' class = 'courseNameBox courseNameBoxGen'>&emsp;"."&#8195;<span id='genClass" .$indexOGen."'>".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassName"][0] . "</span>" ."</div></th>
								<th class = 'tableGrade'><b></b></th>
								<th class = 'tableGrade'><b></b></th>
								<th class = 'tableGrade'><b><input class = 'gradeBox' id = 'genGrade" .$indexOGen."' value='".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassGrade"][0] . "' type = 'text' maxlength = '2' /></b></th>
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
							<th class = 'courseBox'><div id = 'QL or CP' onclick = 'findCourses(this)' class = 'courseNameBox courseNameBoxGen'>&emsp;"."&#8195;<span id='genClass" .$indexOGen."'>".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassName"][0] . "</span>" ."</div></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'><b><input class = 'gradeBox' id = 'genGrade" .$indexOGen."' value='".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassGrade"][0] . "' type = 'text' maxlength = '2' /></b></th>
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
							<th class = 'courseBox'><div id = 'VL or CM' onclick = 'findCourses(this)' class = 'courseNameBox courseNameBoxGen'>&emsp;"."&#8195;<span id='genClass" .$indexOGen."'>".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassName"][0] . "</span>" ."</div></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'><b><input class = 'gradeBox' id = 'genGrade" .$indexOGen."' value='".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassGrade"][0] . "' type = 'text' maxlength = '2' /></b></th>
							<th class = 'tableGrade'></th>
						</tr>"; $indexOGen++;
				?>
		<!-- D. CULTURAL DIVERSITY SECTION -->
				<tr>
					<th>D. Cultural Diversity</th>
				</tr>
				<?php
					echo"<tr>
							<th class = 'courseBox'><div id = 'Cultural Diversity' onclick = 'findCourses(this)' class = 'courseNameBox courseNameBoxGen'>&emsp;"."&#8195;<span id='genClass" .$indexOGen."'>".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassName"][0] . "</span>" ."</div></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'><b><input class = 'gradeBox' id = 'genGrade" .$indexOGen."' value='".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassGrade"][0] . "' type = 'text' maxlength = '2' /></b></th>
							<th class = 'tableGrade'>CD</th>
						</tr>"; $indexOGen++;
				?>
		<!-- E. CRITICAL THINKING SECTION -->
				<tr>
					<th>E. Critical Thinking</th>
				</tr>
				<?php
					echo"<tr>
							<th class = 'courseBox'><div id = 'Critical Thinking' onclick = 'findCourses(this)' class = 'courseNameBox courseNameBoxGen'>&emsp;"."&#8195;<span id='genClass" .$indexOGen."'>".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassName"][0] . "</span>" ."</div></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'><b><input class = 'gradeBox' id = 'genGrade" .$indexOGen."' value='".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassGrade"][0] . "' type = 'text' maxlength = '2' /></b></th>
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
					<th><u title = "Click for notes" onclick = "geNotes3()">
						A. Natural Science, Mathematics, and Computer Science</u></th>
				</tr>
				<!-- 1. NATURAL SCIENCES WITH LAB SUBSECTION -->
				<tr>
					<th id = "nslab" class = "dropdownSection" onclick = 'displaySectionNotes(this.id)'><a class = "dropButtonNotes">
						&nbsp; 1. Natural Science with Lab</a>
						<div class = "dropdownSectionNotes">Any course with a lab in AST, BIO, CHM, ENV, GEL,
							PHY, MAR, or <u title = "Click for notes" onclick = "geNotes4()">GEG*</u></div>
					</th>
				</tr>
				<?php
					echo"<tr>
							<th class = 'courseBox'><div id = 'Natural Science with Lab' onclick = 'findCourses(this)' class = 'courseNameBox courseNameBoxGen'>&emsp;"."&#8195;<span id='genClass" .$indexOGen."'>".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassName"][0] . "</span>" ."</div></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'><b><input class = 'gradeBox' id = 'genGrade" .$indexOGen."' value='".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassGrade"][0] . "' type = 'text' maxlength = '2' /></b></th>
							<th class = 'tableGrade'></th>
						</tr>"; $indexOGen++;
				?>
				<!-- 2. NATURAL SCIENCES ELECTIVE SUBSECTION -->
				<tr>
					<th id = "nsel" class = "dropdownSection" onclick = 'displaySectionNotes(this.id)'><a class = "dropButtonNotes">
						&nbsp; 2. Elective</a>
						<div class = "dropdownSectionNotes">Any AST, BIO, CHM, CSC, ENV,
							GEL, PHY, MAR, MAT or <u title = "Click for notes" onclick = "geNotes4()">GEG*</u></div>
					</th>
				</tr>
				<?php
					echo"<tr>
							<th class = 'courseBox'><div id = 'IV. A. 2. Elective' onclick = 'findCourses(this)' class = 'courseNameBox courseNameBoxGen'>&emsp;"."&#8195;<span id='genClass" .$indexOGen."'>".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassName"][0] . "</span>" ."</div></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'><b><input class = 'gradeBox' id = 'genGrade" .$indexOGen."' value='".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassGrade"][0] . "' type = 'text' maxlength = '2' /></b></th>
							<th class = 'tableGrade'></th>
						</tr>"; $indexOGen++;
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
						<u title = "Click for notes" onclick = "geNotes4()">GEG*</u></div>
					</th>
				</tr>
				<?php
					echo"<tr>
							<th class = 'courseBox'><div id = 'IV. B. 1. Elective' onclick = 'findCourses(this)' class = 'courseNameBox courseNameBoxGen'>&emsp;"."&#8195;<span id='genClass" .$indexOGen."'>".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassName"][0] . "</span>" ."</div></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'><b><input class = 'gradeBox' id = 'genGrade" .$indexOGen."' value='".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassGrade"][0] . "' type = 'text' maxlength = '2' /></b></th>
							<th class = 'tableGrade'></th>
						</tr>"; $indexOGen++;
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
							<th class = 'courseBox'><div id = 'IV. B. 2. Elective' onclick = 'findCourses(this)' class = 'courseNameBox courseNameBoxGen'>&emsp;"."&#8195;<span id='genClass" .$indexOGen."'>".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassName"][0] . "</span>" ."</div></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'><b><input class = 'gradeBox' id = 'genGrade" .$indexOGen."' value='".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassGrade"][0] . "' type = 'text' maxlength = '2' /></b></th>
							<th class = 'tableGrade'></th>
						</tr>"; $indexOGen++;
				?>
				<!-- 3. SOCIAL SCIENCE ELECTIVE 3 SUBSECTION -->
				<tr>
					<th id = "ssel3" class = "dropdownSection" onclick = 'displaySectionNotes(this.id)'><a class = "dropButtonNotes">
						&nbsp; 3. Elective</a>
						<div class = "dropdownSectionNotes">Any ANT, CRJ, ECO, HIS, POL, 
							PSY, SOC, SWK or <u title = "Click for notes" onclick = "geNotes4()">GEG*</u></div>
					</th>
				</tr>
				<?php
					echo"<tr>
							<th class = 'courseBox'><div id = 'IV. B. 3. Elective' onclick = 'findCourses(this)' class = 'courseNameBox courseNameBoxGen'>&emsp;"."&#8195;<span id='genClass" .$indexOGen."'>".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassName"][0] . "</span>" ."</div></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'><b><input class = 'gradeBox' id = 'genGrade" .$indexOGen."' value='".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassGrade"][0] . "' type = 'text' maxlength = '2' /></b></th>
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
					<th id = "humel1" class = "dropdownSection" onclick = 'displaySectionNotes(this.id)'><a class = "dropButtonNotes">
						&emsp;1. Elective</a>
						<div class = "dropdownSectionNotes">Any ENG, HUM, WRI or 
							<u title = "Click for notes" onclick = "geNotes5()">PAG*</u></div>
					</th>
				</tr>
				<?php
					echo"<tr>
							<th class = 'courseBox'><div id = 'IV. C. 1. Elective' onclick = 'findCourses(this)' class = 'courseNameBox courseNameBoxGen'>&emsp;"."&#8195;<span id='genClass" .$indexOGen."'>".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassName"][0] . "</span>" ."</div></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'><b><input class = 'gradeBox' id = 'genGrade" .$indexOGen."' value='".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassGrade"][0] . "' type = 'text' maxlength = '2' /></b></th>
							<th class = 'tableGrade'></th>
						</tr>"; $indexOGen++;
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
							<th class = 'courseBox'><div id = 'IV. C. 2. Elective' onclick = 'findCourses(this)' class = 'courseNameBox courseNameBoxGen'>&emsp;"."&#8195;<span id='genClass" .$indexOGen."'>".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassName"][0] . "</span>" ."</div></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'><b><input class = 'gradeBox' id = 'genGrade" .$indexOGen."' value='".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassGrade"][0] . "' type = 'text' maxlength = '2' /></b></th>
							<th class = 'tableGrade'></th>
						</tr>"; $indexOGen++;
				?>
				<!-- 3. SOCIAL SCIENCE ELECTIVE 3 SUBSECTION -->
				<tr>
					<th id = "humel3" class = "dropdownSection" onclick = 'displaySectionNotes(this.id)'><a class = "dropButtonNotes">
						&emsp;3. Elective</a>
						<div class = "dropdownSectionNotes">Any ENG, HUM, PHI, WRI, 
							Modern Language (103 or above) or <u title = "Click for notes" onclick = "geNotes5()">PAG*</u></div>
					</th>
				</tr>
				<?php
					echo"<tr>
							<th class = 'courseBox'><div id = 'IV. C. 3. Elective' onclick = 'findCourses(this)' class = 'courseNameBox courseNameBoxGen'>&emsp;"."&#8195;<span id='genClass" .$indexOGen."'>".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassName"][0] . "</span>" ."</div></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'><b></b></th>
							<th class = 'tableGrade'><b><input class = 'gradeBox' id = 'genGrade" .$indexOGen."' value='".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassGrade"][0] . "' type = 'text' maxlength = '2' /></b></th>
							<th class = 'tableGrade'></th>
						</tr>"; $indexOGen++;
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
								<th class = 'courseBox'><div id = 'IV. D. Elective' onclick = 'findCourses(this)' class = 'courseNameBox courseNameBoxGen'>&emsp;"."&#8195;<span id='genClass" .$indexOGen."'>".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassName"][0] . "</span>" ."</div></th>
								<th class = 'tableGrade'><b></b></th>
								<th class = 'tableGrade'><b></b></th>
								<th class = 'tableGrade'><b><input class = 'gradeBox' id = 'genGrade" .$indexOGen."' value='".$sData["Student"][0]["GenEd"][0]["Class"][$indexOGen]["ClassGrade"][0] . "' type = 'text' maxlength = '2' /></b></th>
								<th class = 'tableGrade'></th>
							</tr>"; $indexOGen++;
					}
				?>
			</table>
			<br/><hr/><br/>
<!-- #BS CSC SOFTWARE DEVELOPMENT MAJOR PROGRAM TABLE# -->
			<table>
				<tr>
					<th class = "tableHeader" colspan = "3"><u title = "Click for notes" onclick = "bsCSCNotes()">
						B. Major Program: 51 sh</u></th>
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
								<th class = 'courseBox'><div id = 'BS CSC:SD Required' onclick = 'findCourses(this)'class = ' courseNameBoxPro'>&emsp;"."&#8195;<span id='proClass" .$indexOPro."'>".$sData["Student"][0]["Program"][0]["Class"][$indexOPro]["ClassName"][0] . "</span>" ."</div></th>
								<th class = 'tableGrade'><b><input class = 'gradeBox' id = 'proGrade" .$indexOPro."' value='".$sData["Student"][0]["GenEd"][0]["Class"][$indexOPro]["ClassGrade"][0] . "' type = 'text' maxlength = '2' /></b></th>								<td  class = 'tableGrade'></td>
							</tr>"; 
							$indexOPro++;}
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
					for($i = 0; $i < 6; $i++){
						echo"<tr>	
								<th class = 'courseBox'><div id = 'BS CSC:SD Elective' onclick = 'findCourses(this)'class = 'courseNameBox courseNameBoxPro'>"."&#8195;<span id='proClass" .$indexOPro."'>".$sData["Student"][0]["Program"][0]["Class"][$indexOPro]["ClassName"][0] . "</span>" ."</div></th>
								<th class = 'tableGrade'><b><input class = 'gradeBox' id = 'proGrade" .$indexOPro."' value='".$sData["Student"][0]["GenEd"][0]["Class"][$indexOPro]["ClassGrade"][0] . "' type = 'text' maxlength = '2' /></b></th>								<td  class = 'tableGrade'></td>
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
								<th class = 'courseBox'><div id = 'BS CSC:SD Concomitant' onclick = 'findCourses(this)'class = 'courseNameBox courseNameBoxPro'>&emsp;"."&#8195;<span id='proClass" .$indexOPro."'>".$sData["Student"][0]["Program"][0]["Class"][$indexOPro]["ClassName"][0] . "</span>" ."</div></th>
								<th class = 'tableGrade'><b><input class = 'gradeBox' id = 'proGrade" .$indexOPro."' value='".$sData["Student"][0]["GenEd"][0]["Class"][$indexOPro]["ClassGrade"][0] . "' type = 'text' maxlength = '2' /></b></th>								<td class = 'tableGrade'></td>
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
								<th class = 'courseBox'><div id = 'BS CSC:SD Internship' onclick = 'findCourses(this)'class = 'courseNameBox courseNameBoxPro'>&emsp;"."&#8195;<span id='proClass" .$indexOPro."'>".$sData["Student"][0]["Program"][0]["Class"][$indexOPro]["ClassName"][0] . "</span>" ."</div></th>
								<th class = 'tableGrade'><b><input class = 'gradeBox' id = 'proGrade" .$indexOPro."' value='".$sData["Student"][0]["Program"][0]["Class"][$indexOPro]["ClassGrade"][0] . "' type = 'text' maxlength = '2' /></b></th>								<td  class = 'tableGrade'>3-6</td>
							</tr>"; 
                        $indexOPro++;
                    }
				?>
			</table>
            <input type="hidden" id="programID" value="ULASCSCSD" />
            <?php 
                echo "<input type='hidden' id='programCount' value='".$indexOPro."'  />";
            ?>			
		</div>
	</body>
</html>		
