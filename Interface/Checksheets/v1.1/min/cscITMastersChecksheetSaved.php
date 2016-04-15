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

    $sData = xml2array('../../../../BLPlayground/StudentData.xml');
    //print_r($sData);
    //echo "<br><br>";
    $indexOGen = 0;
    $indexOPro = 0;
//    echo $sData["Student"][0]["Program"][0]["Class"][23]["ClassName"][0];
    //echo $sData["Student"][0]["GenEd"][0]["Class"][2]["ClassName"][0];


?>
<!DOCTYPE html>
<html>
	<head>
	<title>MS Computer Science: IT Checksheet</title>
	<link rel = "stylesheet" type = "text/css" href = "Styles/checksheetStyleV1p1.css"/>
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
		<div class = "headerBox">DEPARTMENT OF COMPUTER SCIENCE & INFORMATION TECHNOLOGY
		</div>
		
<!-- #MS CSC SOFTWARE DEVELOPMENT MAJOR PROGRAM TABLE# -->
		<div class = "header">MS in Computer Science: Information Technology (30 sh)</div>
		<div class = "newSection"></div>
		<div class = "buffer">&nbsp;</div>
		<div class = "section">
			<table>
				<tr>
					<th class = "tableHeader" colspan = "1">
						Core Courses (18-24 sh)</th>
						<td class = "tableGrade">Gr</td>
						<td class = "tableGrade">SH</td>
				</tr>
		<!-- CSC SDM CORE COURSES SECTION -->
				
				<?php
					for($i = 0; $i < 8; $i++)
						echo"<tr>	
								<td>&emsp;&emsp;"."<span id='proGrade" .$indexOPro."'>&#8195;".$sData["Student"][0]["Program"][0]["Class"][$indexOPro]["ClassName"][0] . "</span>" ."</td>
								<td  class = 'tableGrade'>"."<span id='proGrade" .$indexOPro."'>&#8195;".$sData["Student"][0]["Program"][0]["Class"][$indexOPro]["ClassName"][0] . "</span>" ."</td>
								<td  class = 'tableGrade'></td>
							</tr>";
							$indexOPro++;							
				?>
		<!-- Thesis (optional) -->
				<tr>
					<th class = "tableHeader" colspan = "1">
						Thesis (0 or 6 sh)</th>
						<td class = "tableGrade">Gr</td>
						<td class = "tableGrade">SH</td>
				</tr>
				<!-- Since there can only be ONE thesis (or, if multiple, only one can count!), no need to have multiple columns -->
				<tr>
					<td>&emsp;&emsp;</td>
					<td  class = 'tableGrade'></td>
					<td  class = 'tableGrade'></td>
				</tr>
			</table>
		</div>
<!-- Second half -->
		<div class = "section">
			<table>
		<!-- ELECTIVE COURSES SECTION -->
				<tr>	
					<th class = "tableHeader" colspan = "1">
						Elective Courses (0-6 sh)
					</th>
					<td class = "tableGrade">Gr</td>
					<td class = "tableGrade">SH</td>
				</tr>				
				<?php
					for($i = 0; $i < 2; $i++)
						echo"<tr>	
								<td>&emsp;&emsp;"."<span id='proGrade" .$indexOPro."'>&#8195;".$sData["Student"][0]["Program"][0]["Class"][$indexOPro]["ClassName"][0] . "</span>" ."</td>
								<td class = 'tableGrade'>"."<span id='proGrade" .$indexOPro."'>&#8195;".$sData["Student"][0]["Program"][0]["Class"][$indexOPro]["ClassName"][0] . "</span>" ."</td>
								<td class = 'tableGrade'></td>
							</tr>";
							$indexOPro++;	
				?>
			</table>
		<!-- Program code, version number, possibly additional stuff. Should be able to grab this from the database. -->
			<table>
				<tr><th class = "tableSpace"></th></tr>
				<tr>
					<th><b>Program Code: GLASCSCIT</b></th>
				</tr>
				<tr>
					<th><b>Version Number: 2138</b></th>
				</tr>			
			</table>
		</div>
		<div class = "buffer">&nbsp;</div>
	</body>
</html>
			