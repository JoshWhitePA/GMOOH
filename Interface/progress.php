<?php 
	session_start();
	if(!isset($_SESSION["loggedIn"]) || $_SESSION["loggedIn"] == false || $_SESSION["loggedIn"] == null){
	header('location: login.php');
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
					$("#left").append("<div class = 'leftInnerSectionLong'>"
						+ "<div class = 'titleBox'>"	
						+ "<label class = 'sectionLabel'>Taken Courses</label></div>"
						+ "<div id = 'takenCoursesList' class = 'sectionCourses'></div></div>");
						
					$("#right").css("visibility", "visible");
					$("#mainSection").append("<div id = 'innerSection' class = 'innerSection'></div>");
				
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
									"yAxisMaxValue": "130", //Checksheet credits needed will be put here
									"baseFont": "Futura, 'Trebuchet MS', Arial, sans-serif",
									"baseFontSize": "14",
									"numberSuffix": "cr",
									"paletteColors": "#cccccc",
									"bgImage": "Images/loadThisCat.gif",
									"bgImageVAlign": "bottom",
									"bgImageHAlign": "middle",
									"bgImageScale": "90",
									"showShadow": "1",
									"useRoundEdges": "1",
									"showBorder": "1",
									"showCanvasBorder": "1",
									"canvasBorderThickness": "1",
									"canvasBorderColor": "#aaaaaa",
									"canvasBgAlpha": "60",
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
										"value": "95" //the users current progress
									}
								]
							}
						})
						.render();
					});
				});
			});
		</script>
	</head>
	<body id = "master">
	</body>
</html>
