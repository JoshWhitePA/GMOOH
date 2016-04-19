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



    $results = $logic->displaySaveFromCheck($_SESSION['userID'],"",$_GET['AIDID']);
    foreach ($results as $row) {
//        echo $row["SaveData"] ;
        $sData = xml2array($row["SaveData"]);
        break;
        
    }

    
    $indexOGen = 0;
    $indexOPro = 0;
//    echo $sData["Student"][0]["Program"][0]["Class"][23]["ClassName"][0];
    //echo $sData["Student"][0]["GenEd"][0]["Class"][2]["ClassName"][0];

?>
<!DOCTYPE html>
<html>
	<head>
	<title>MS Computer Science: SD Checksheet</title>
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
		<div class = "headerBox">DEPARTMENT OF COMPUTER SCIENCE & INFORMATION TECHNOLOGY
		</div>		
<!-- #MS CSC SOFTWARE DEVELOPMENT MAJOR PROGRAM TABLE# -->
		<div class = "header">MS in Computer Science: Software Development (30 sh)</div>
		<div class = "newSection"></div>
		<div class = "buffer">&nbsp;</div>
		<div class = "section">
			<table>
				<tr>
					<th class = "tableHeader" colspan = "1">
						400-level courses: 0-12 sh</th>
						<td class = "tableGrade">Gr</td>
						<td class = "tableGrade">SH</td>
				</tr>
		<!-- 400 level courses -->			
				<?php
					for($i = 0; $i < 4; $i++){
						echo"<tr>	
								<td>&emsp;&emsp;"."<span id='proGrade" .$indexOPro."'>&#8195;".$sData["Student"][0]["Program"][0]["Class"][$indexOPro]["ClassName"][0] . "</span>" ."</td>
								<td  class = 'tableGrade'>"."<span id='proGrade" .$indexOPro."'>&#8195;".$sData["Student"][0]["Program"][0]["Class"][$indexOPro]["ClassGrade"][0] . "</span>" ."</td>
								<td  class = 'tableGrade'></td>
							</tr>";$indexOPro++;}
				?>	
			</table>
		</div>
<!-- Second Half -->
		<div class = "section">
			<table>
		<!-- 500 level courses -->
				<tr>	
					<th class = "tableHeader" colspan = "1">
						500-level courses: 18-30 sh
					</th>
					<td class = "tableGrade">Gr</td>
					<td class = "tableGrade">SH</td>
				</tr>			
				<?php
					for($i = 0; $i < 10; $i++){
						echo"<tr>	
								<td>&emsp;&emsp;"."<span id='proGrade" .$indexOPro."'>&#8195;".$sData["Student"][0]["Program"][0]["Class"][$indexOPro]["ClassName"][0] . "</span>" ."</td>
								<td class = 'tableGrade'>"."<span id='proGrade" .$indexOPro."'>&#8195;".$sData["Student"][0]["Program"][0]["Class"][$indexOPro]["ClassGrade"][0] . "</span>" ."</td>
								<td class = 'tableGrade'></td>
							</tr>";$indexOPro++;}
				?>	
			</table>
		<!-- Program code, version number, possibly additional stuff. Should be able to grab this from the database. -->
			<table>
				<tr><th class = "tableSpace"></th></tr>
				<tr>
					<th><b>Program Code: GLASCSC</b></th>
				</tr>
				<tr>
					<th><b>Version Number: 2122</b></th> 
				</tr>
			</table>
		</div>
		<div class = "buffer">&nbsp;</div>
	</body>
</html>
			
