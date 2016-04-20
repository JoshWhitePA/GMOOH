<!--
*	File: 			cscITMinorChecksheet.php
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
 require("../../../../PHPClasses/logic.class.php");
session_start();
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
    $results = $logic->displaySaveFromCheck( $_SESSION['userID'],$_GET['AIDID']);
    foreach ($results as $row) {
        $sData = xml2array($row["SaveData"]);
        
    }

    
    $indexOGen = 0;
    $indexOPro = 0;

?>
<!DOCTYPE html>

<html>
	<head id = "head">
	<title>Computer Science: IT Minor Checksheet</title>
	<link rel = "stylesheet" type = "text/css" href = "Styles/checksheetStyleV1p1min.css"/>
	</head>	
	<body>
	<style id = "styleJack" type='text/css'></style>
<!-- #CSC SOFTWARE DEVELOPMENT MINOR PROGRAM TABLE# -->
		<div id = "section" class = "section">
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
								<th class = 'courseBox'><div id = 'CSC:IT Minor Required' onclick = 'findCourses(this)' class = ' courseNameBoxPro'>"."&#8195;<span id='proGrade" .$indexOPro."'>".$sData["Student"][0]["Program"][0]["Class"][$indexOPro]["ClassName"][0] . "</span>" ."</div></th>
								<td class = 'tableGrade'><b><input class = 'gradeBox' id = 'proGrade".$indexOPro."' type = 'text' maxlength = '2' /></b></td>
								<td class = 'tableGrade'><b></b></td>
							</tr>";
							$indexOPro++;
						echo"<tr>
								<th class = 'courseBox'><div id = 'CSC:IT Minor Required' onclick = 'findCourses(this)' class = ' courseNameBoxPro'>"."&#8195;<span id='proGrade" .$indexOPro."'>".$sData["Student"][0]["Program"][0]["Class"][$indexOPro]["ClassName"][0] . "</span>" ."</div></th>
								<td class = 'tableGrade'><b><input class = 'gradeBox' id = 'proGrade".$indexOPro."' type = 'text' maxlength = '2' /></b></td>
								<td class = 'tableGrade'><b></b></td>
							</tr>";
							$indexOPro++;
						echo"<tr>
								<th class = 'courseBox'><div id = 'CSC:IT Minor Required' onclick = 'findCourses(this)' class = ' courseNameBoxPro'>"."&#8195;<span id='proGrade" .$indexOPro."'>".$sData["Student"][0]["Program"][0]["Class"][$indexOPro]["ClassName"][0] . "</span>" ."</div></th>
								<td class = 'tableGrade'><b><input class = 'gradeBox' id = 'proGrade".$indexOPro."' type = 'text' maxlength = '2' /></b></td>
								<td class = 'tableGrade'><b></b></td>
							</tr>";
							$indexOPro++;
						echo"<tr>
								<th class = 'courseBox'><div id = 'CSC:IT Minor Required' onclick = 'findCourses(this)' class = ' courseNameBoxPro'>"."&#8195;<span id='proGrade" .$indexOPro."'>".$sData["Student"][0]["Program"][0]["Class"][$indexOPro]["ClassName"][0] . "</span>" ."</div></th>
								<td class = 'tableGrade'><b><input class = 'gradeBox' id = 'proGrade".$indexOPro."' type = 'text' maxlength = '2' /></b></td>
								<td class = 'tableGrade'><b></b></td>
							</tr>";
							$indexOPro++;
						echo"<tr>
								<th class = 'courseBox'><div id = 'CSC:IT Minor Required' onclick = 'findCourses(this)' class = ' courseNameBoxPro'>"."&#8195;<span id='proGrade" .$indexOPro."'>".$sData["Student"][0]["Program"][0]["Class"][$indexOPro]["ClassName"][0] . "</span>" ."</div></th>
								<td class = 'tableGrade'><b><input class = 'gradeBox' id = 'proGrade".$indexOPro."' type = 'text' maxlength = '2' /></b></td>
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
							<th class = 'courseBox'><div id = 'CSC:IT Minor Elective 1' onclick = 'findCourses(this)' class = 'courseNameBox courseNameBoxPro'>"."&#8195;<span id='proGrade" .$indexOPro."'>".$sData["Student"][0]["Program"][0]["Class"][$indexOPro]["ClassName"][0] . "</span>" ."</div></th>
							<td class = 'tableGrade'><b><input class = 'gradeBox' id = 'proGrade".$indexOPro."' type = 'text' maxlength = '2' /></b></td>
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
					echo "<tr>
							<th class = 'courseBox'><div id = 'CSC:IT Minor Elective 2' onclick = 'findCourses(this)' class = 'courseNameBox courseNameBoxPro'>"."&#8195;<span id='proGrade" .$indexOPro."'>".$sData["Student"][0]["Program"][0]["Class"][$indexOPro]["ClassName"][0] . "</span>" ."</div></th>
							<td class = 'tableGrade'><b><input class = 'gradeBox' id = 'proGrade".$indexOPro."' type = 'text' maxlength = '2' /></b></td>
							<td class = 'tableGrade'><b></b></td>
						</tr>";
						$indexOPro++;

				?>
				<tr><th class = "tableSpace"></th></tr>
				<tr><th class = "tableSpace"></th></tr>
			</table>
            <input type="hidden" id="programID" value="ULASCISIT2" />
            <?php 
                echo "<input type='hidden' id='programCount' value='".$indexOPro."'  />";
            ?>			
		</div>
	</body>
</html>

