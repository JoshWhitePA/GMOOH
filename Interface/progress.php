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


?>
<!DOCTYPE html>
<html>
	<head>
		<title>Your Progress</title>
		<link rel = "stylesheet" type = "text/css" href = "Styles/gmoohMasterStyle.css"/>	
		<script src = "Scripts/jquery-1.12.0.min.js"></script>
		<script src = "Scripts/fusioncharts.js"></script>
		<script>
			$(document).ready(function(){
				$("#master").load("MasterPages/masterPage.html", function() {
					$("#left").css("visibility", "visible");
					$("#left").append("<div class = 'innerSectionLong'>"
						+ "<div class = 'titleBox'>"	
						+ "<label class = 'sectionLabel'>Taken Courses</label></div>"
						+ "<div id = 'takenCoursesList' class = 'sectionCourses'></div></div>");
						
					$("#right").css("visibility", "visible");
					$("#right").append("<div class = 'innerSectionLong'>"
						+ "<div class = 'titleBox'>"	
						+ "<label class = 'sectionLabel'>Courses To Take</label></div>"
						+ "<div id = 'coursesToTake' class = 'sectionCourses'></div></div>");
						
					$("#mainSection").append("<div id = 'innerSection' class = 'innerSection'></div>");
					
					var officialChecksheet = '<?php echo $checksheetID;?>';
					var totalCredits = <?php echo $numCreds; ?>; //Total user credits
					var gradCredits = 120; //Credits towards graduation

					if(officialChecksheet == "ULASCSCIT" || officialChecksheet == "ULASCSCSD") {
					
						if(totalCredits > 120)
							totalCredits = 120;
						else if(totalCredits < 0)
							totalCredits = 0;
							
						if(gradCredits != 120)
							gradCredits = 120;
					
						if(totalCredits < 30)
							$("#mainSection").append("<div class = 'progressStatus'>You are currently a freshman, " + (gradCredits - totalCredits) + " credits to go!</div>");
							
						else if(totalCredits < 60)
							$("#mainSection").append("<div class = 'progressStatus'>You are currently a sophomore, " + (gradCredits - totalCredits) + " credits to go!</div>");
						
						else if(totalCredits < 90)
							$("#mainSection").append("<div class = 'progressStatus'>You are currently a junior, " + (gradCredits - totalCredits) + " credits to go!</div>");
							
						else if(totalCredits < 120)
							$("#mainSection").append("<div class = 'progressStatus'>You are currently a senior, " + (gradCredits - totalCredits) + " credits to go!</div>");
							
						else
							$("#mainSection").append("<div class = 'progressStatus'>You made it! You can graduate!</div>");
					
						FusionCharts.ready(function() {
							var progress = new FusionCharts({
								type: "bar2d",
								renderAt: "innerSection",
								width: "100%",
								height: "90%",
								dataFormat: "json",
								dataSource: {
									"chart": {
										"caption": "Your Progress",
										"subCaption": "Credits Towards Graduation",
										"yAxisName": "Total Credits",
										"yAxisMaxValue": gradCredits, //Checksheet credits needed will be put here
										"numDivLines": "3",
										"divLineThickness": "2",
										"useEllipsesWhenOverflow": "true",
										"baseFont": "Futura, 'Trebuchet MS', Arial, sans-serif",
										"baseFontSize": "14",
										"numberSuffix": "cr",
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
									
									 "annotations": {
										"width": "500",
										"height": "300",
										"autoScale": "1",
										"groups": [
											{
												"id": "progressLvl",
												"items": [
													{
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
													
													{
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
													
													{
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
					
					else {
						if(totalCredits > 30)
							totalCredits = 30;
						else if(totalCredits < 0)
							totalCredits = 0;
							
						if(gradCredits != 30)
							gradCredits = 30;
						
						if(totalCredits < 30)
							$("#mainSection").append("<div class = 'progressStatus'>" + (gradCredits - totalCredits) + " credits to go!</div>");
						else
							$("#mainSection").append("<div class = 'progressStatus'>You made it! You can graduate!</div>");
							
						FusionCharts.ready(function() {
							var progress = new FusionCharts({
								type: "bar2d",
								renderAt: "innerSection",
								width: "100%",
								height: "90%",
								dataFormat: "json",
								dataSource: {
									"chart": {
										"caption": "Your Progress",
										"subCaption": "Credits Towards Graduation",
										"yAxisName": "Total Credits",
										"yAxisMaxValue": gradCredits, //Checksheet credits needed will be put here
										"numDivLines": "3",
										"divLineThickness": "2",
										"useEllipsesWhenOverflow": "true",
										"baseFont": "Futura, 'Trebuchet MS', Arial, sans-serif",
										"baseFontSize": "14",
										"numberSuffix": "cr",
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
							.render();
						});
					}
				});
			});
		</script>
	</head>
	<body id = "master">
	</body>
</html>
