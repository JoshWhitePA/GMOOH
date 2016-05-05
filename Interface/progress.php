<!--
* Author:			Christian Carreras
* Contributors(s):	Josh White
* File Name:		progress.php
* Date:				04/04/2016
* Company:			CSC 355 GMOOH
* Organization:		Kutztown University of Pennsylvania
* Purpose:			This page displays the students progress according to the
					credits in their official checksheet. It will display a
					bar graph along with the total amount of credits they have.
					With that information the system will tell the student
					whether they are a freshman, sophomore, junior or senior
					along with how many credits they need to graduate. This page
					was also meant to display the classes the student has taken
					along with the classes the student has yet to take.
					Unfortunately because of time restraints this never became
					a reality in the system.
-->

<?php 
	require_once("../PHPClasses/logic.class.php");
    $logic = new Logic();
	session_start();
	if(!isset($_SESSION["loggedIn"]) || $_SESSION["loggedIn"] == false || $_SESSION["loggedIn"] == null){
	header('location: login.php');
	}	
    $numCreds=0;
    $checksheetID="";
    if(isset($_SESSION["facID"])){
       $results = $logic->progressPagePop($_POST["StudentID"]);
         foreach ($results as $row) {
             $numCreds = $row["NumCredits"];
             $checksheetID = $row["CheckSheetId"];
            break;
         }
    }else{
        
        $results = $logic->progressPagePop($_SESSION["userID"]);
        foreach ($results as $row) {
           $numCreds = $row["NumCredits"];
           $checksheetID = $row["CheckSheetId"];
            break;
        }
    }

	$userMaster = "";
	if(isset($_SESSION["facID"])){
		$userMaster = "MasterPages/advisorMasterPage.html";
	}
	else{
		$userMaster = "MasterPages/masterPage.html";
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Your Progress</title>
		<link rel = "stylesheet" type = "text/css" href = "Styles/gmoohMasterStyle.css"/>	
		<script src = "Scripts/jquery-1.12.0.min.js"></script>
		<script src = "Scripts/fusioncharts.js"></script>
		<script>
			//Wait until the document is ready then load the master page
			$(document).ready(function(){
				$("#master").load(<?php echo json_encode($userMaster); ?>, function() {
					//Make the left section visible (invisible by default)
					//This will hold the courses the student has taken
					$("#left").css("visibility", "visible");
					$("#left").append("<div class = 'innerSectionLong'>"
						+ "<div class = 'titleBox'>"	
						+ "<label class = 'sectionLabel'>Taken Courses</label></div>"
						+ "<div id = 'takenCoursesList' class = 'sectionCourses'></div></div>");
					//Make the right section visible (invisible by default)
					//This will hold the courses the student has to take
					$("#right").css("visibility", "visible");
					$("#right").append("<div class = 'innerSectionLong'>"
						+ "<div class = 'titleBox'>"	
						+ "<label class = 'sectionLabel'>Courses To Take</label></div>"
						+ "<div id = 'coursesToTake' class = 'sectionCourses'></div></div>");
					//Add an inner section to the main section for proper formatting
					$("#mainSection").append("<div id = 'innerSection' class = 'innerSection'></div>");
					
					var officialChecksheet = '<?php echo $checksheetID;?>';
					var totalCredits = <?php echo $numCreds*3; ?>; //Total user credits
					var gradCredits = 120; //Credits towards graduation

					//If the checksheet is a Bachelor's degree checksheet (120 credits)
					if(officialChecksheet == "ULASCSCIT" || officialChecksheet == "ULASCSCSD") {
					
						//If the total user credits is a bad number, give it a new value
						if(totalCredits > 120)
							totalCredits = 120;
						else if(totalCredits < 0)
							totalCredits = 0;
						
						//If the number of credits needed to graduate is not 120 then something is wrong
						if(gradCredits != 120)
							gradCredits = 120;
					
						//Freshman level credits (0-29) Display remaining credits
						if(totalCredits < 30)
							$("#mainSection").append("<div class = 'progressStatus'>You are currently a freshman, " + (gradCredits - totalCredits) + " credits to go!</div>");
						
						//Sophomore level credits (30-59) Display remaining credits
						else if(totalCredits < 60)
							$("#mainSection").append("<div class = 'progressStatus'>You are currently a sophomore, " + (gradCredits - totalCredits) + " credits to go!</div>");
						
						//Junior level credits (60-89) Display remaining credits
						else if(totalCredits < 90)
							$("#mainSection").append("<div class = 'progressStatus'>You are currently a junior, " + (gradCredits - totalCredits) + " credits to go!</div>");
						
						//Senior level credits (90-119) Display remaining credits
						else if(totalCredits < 120)
							$("#mainSection").append("<div class = 'progressStatus'>You are currently a senior, " + (gradCredits - totalCredits) + " credits to go!</div>");
						
						//The senior is ready to graduate. Yay!
						else
							$("#mainSection").append("<div class = 'progressStatus'>You made it! You can graduate!</div>");
					
						//Create a bar graph that will display the student's progress
						//The x-value will be the total amount of credits
						//The y-value is not used
						//The x-axis will range from 0-120
						//The x-axis is in increments of 30 (freshman, sophomore, etc.)
						//Graph updates in real-time
						FusionCharts.ready(function() {
							var progress = new FusionCharts({
								type: "bar2d", //Horizontal bar graph
								renderAt: "innerSection", //Insert graph inside innerSection
								width: "100%",
								height: "90%",
								dataFormat: "json",
								dataSource: {
									"chart": {
										"caption": "Your Progress",
										"subCaption": "Credits Towards Graduation",
										"yAxisName": "Total Credits",
										"yAxisMaxValue": gradCredits, //Checksheet credits needed will be put here
										"numDivLines": "3", //This will make the increments by 30
										"numberSuffix": "cr", //Suffix to the numbers on the x-axis
										"useEllipsesWhenOverflow": "true",
										
										//Graph style
										"divLineThickness": "2",
										"baseFont": "Futura, 'Trebuchet MS', Arial, sans-serif",
										"baseFontSize": "14",
										"paletteColors": "#aaaaaa",
										"bgImage": "Images/loadThisCat.gif",
										"bgImageVAlign": "bottom",
										"bgImageHAlign": "middle",
										"bgImageScale": "90",
										"showShadow": "1",
										"showBorder": "1",
										"showCanvasBorder": "1",
										"canvasBorderThickness": "1",
										"canvasBorderColor": "#aaaaaa",
										"canvasBgAlpha": "40",
										"usePlotGradientColor": "0",
										"plotBorderAlpha": "10",
										"placeValuesInside": "1",
										"valueFontColor": "#ffffff",
										"showAxisLines": "1",
										"axisLineAlpha": "25",
										"divLineAlpha": "10",
										"alignCaptionWithCanvas": "0",
										"showAlternateVGridColor": "0",
										"captionFontSize": "14",
										"subcaptionFontSize": "14",
										"subcaptionFontBold": "0",
										"toolTipColor": "#ffffff",
										"toolTipBorderThickness": "0",
										"toolTipBgColor": "#000000",
										"toolTipBgAlpha": "80",
										"toolTipBorderRadius": "2",
										"toolTipPadding": "5"
									},
									//Annotations displays the progress level captions
									"annotations": {
										"width": "500",
										"height": "300",
										"autoScale": "1",
										"groups": [
											{
												"id": "progressLvl",
												"items": [
													{	//Display the sophomore caption by the 30 line
														"id": "sophomoreLabel",
														"type": "text",
														"fillcolor": "#000000",
														"fontsize": "11",
														"text": "Sophomore",
														"bold": "1",
														"wrap": "1",
														"wrapWidth": "350",
														"x": "$yaxis.0.label.1.x",
														"y": "$canvasStartY + 20"
													},
													
													{	//Display the junior caption by the 60 line
														"id": "JuniorLabel",
														"type": "text",
														"fillcolor": "#000000",
														"fontsize": "11",
														"text": "Junior",
														"bold": "1",
														"wrap": "1",
														"wrapWidth": "350",
														"x": "$yaxis.0.label.2.x",
														"y": "$canvasStartY + 20"
													},
													
													{	//Display the senior caption by the 90 line
														"id": "SeniorLabel",
														"type": "text",
														"fillcolor": "#000000",
														"fontsize": "11",
														"text": "Senior",
														"bold": "1",
														"wrap": "1",
														"wrapWidth": "350",
														"x": "$yaxis.0.label.3.x",
														"y": "$canvasStartY + 20"
													}
												]
											}
										]
									},
									
									"data": [
										{
											"value": totalCredits //the users current progress
										}
									]
								}
							})
							.render();
						});
					}
					
					//If the checksheet is not a Bacherlor's degree checksheet
					//it will be a masters or minor which is 30 credits
					else {
						//If the total user credits is a bad number, give it a new value
						if(totalCredits > 30)
							totalCredits = 30;
						else if(totalCredits < 0)
							totalCredits = 0;
						
						//If the number of credits needed to graduate is not 30 then something is wrong
						if(gradCredits != 30)
							gradCredits = 30;
						
						//If the total user credits is not 30 then display how many they need
						if(totalCredits < 30)
							$("#mainSection").append("<div class = 'progressStatus'>" + (gradCredits - totalCredits) + " credits to go!</div>");
						//The student has 30 credits and can graduate. Yay!
						else
							$("#mainSection").append("<div class = 'progressStatus'>You made it! You can graduate!</div>");
						
						//Create a bar graph that will display the student's progress
						//The x-value will be the total amount of credits
						//The y-value is not used
						//The x-axis will range from 0-30
						//The x-axis is in increments of 10
						//Graph updates in real-time
						FusionCharts.ready(function() {
							var progress = new FusionCharts({
								type: "bar2d", //Horizontal bar graph
								renderAt: "innerSection", //Insert graph inside innerSection
								width: "100%",
								height: "90%",
								dataFormat: "json",
								dataSource: {
									"chart": {
										"caption": "Your Progress",
										"subCaption": "Credits Towards Graduation",
										"yAxisName": "Total Credits",
										"yAxisMaxValue": gradCredits, //Checksheet credits needed will be put here
										"numDivLines": "3", //This will make the increments by 10
										"numberSuffix": "cr", //Suffix to the numbers on the x-axis
										"useEllipsesWhenOverflow": "true",
										
										//Graph style
										"divLineThickness": "2",
										"baseFont": "Futura, 'Trebuchet MS', Arial, sans-serif",
										"baseFontSize": "14",
										"paletteColors": "#aaaaaa",
										"bgImage": "Images/loadThisCat.gif",
										"bgImageVAlign": "bottom",
										"bgImageHAlign": "middle",
										"bgImageScale": "90",
										"showShadow": "1",
										"showBorder": "1",
										"showCanvasBorder": "1",
										"canvasBorderThickness": "1",
										"canvasBorderColor": "#aaaaaa",
										"canvasBgAlpha": "40",
										"usePlotGradientColor": "0",
										"plotBorderAlpha": "10",
										"placeValuesInside": "1",
										"valueFontColor": "#ffffff",
										"showAxisLines": "1",
										"axisLineAlpha": "25",
										"divLineAlpha": "10",
										"alignCaptionWithCanvas": "0",
										"showAlternateVGridColor": "0",
										"captionFontSize": "14",
										"subcaptionFontSize": "14",
										"subcaptionFontBold": "0",
										"toolTipColor": "#ffffff",
										"toolTipBorderThickness": "0",
										"toolTipBgColor": "#000000",
										"toolTipBgAlpha": "80",
										"toolTipBorderRadius": "2",
										"toolTipPadding": "5"
									},
									
									"data": [
										{
											"value": totalCredits //the users current progress
										}
									]
								}
							})
							.render(); //Required to render the graph
						});
					}
				});
			});
		</script>
	</head>
	<body id = "master">
	</body>
</html>
