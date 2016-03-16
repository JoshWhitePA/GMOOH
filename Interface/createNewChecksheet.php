<!DOCTYPE html>
<html>
	<head>
		<title>Create New Checksheet</title>
		<link rel = "stylesheet" type = "text/css" href = "Styles/gmoohMasterStyle.css"/>	
		<script src = "Scripts/jquery-1.12.0.min.js"></script>
		<script>
			$(document).ready(function(){
				$("#master").load("MasterPages/masterPage.html", function() {
					$("#left").css("visibility", "visible");
					$("#right").css("visibility", "visible");
					$("#mainSection")
						.append("<select id = 'currentChecksheet' class = 'checksheetSelect'"
							+ "title = 'Select a major or minor to start editing a checksheet'>"
							+ "<option value = 'it'>CSC IT - Computer Science: Information Technology</option>"
							+ "<option value = 'Mit'>CSC IT(M) - Computer Science: Information Technology Masters</option>"
							+ "<option value = 'itm'>CSC IT(m) - Computer Science: Information Technology Minor</option>"
							+ "<option value = 'sd'>CSC SD - Computer Science: Sofware Development</option>"
							+ "<option value = 'Msd'>CSC SD(M) - Computer Science: Software Development Masters</option>"
							+ "<option value = 'sdm'>CSC SD(m) - Computer Science: Software Developement Minor</option>"								
							+ "</select>"
							+ "<div id = 'innerSection' class = 'innerSection'></div>");
					$("#left")
						.append("<br/><div id = 'leftInnerSection' class = 'leftInnerSection'>"
							+ "<div id = 'sectionTitle' class = 'titleBox'><label class = 'sectionLabel'>Checksheet Section</label></div><span></span></div>"
							+ "<div class = 'newSection'><br/></div>"
							+ "<div id = 'leftInnerSection2' class = 'leftInnerSection'>"
							+ "<select name = 'courseDropdown' class = 'courseSelect'"
							+ "title = 'Find courses related to a specific major from the dropdown menu'>"
							+ "<option>***Select A Term***</option>"
							+ "</select></div>");
					$("#right")
						.append("<br/><div id = 'rightInnerSection' class = 'rightInnerSection'>"
							+ "<div class = 'searchBox'>"
							+ "<input type = 'text' placeholder = 'Search For A Course...' class = 'searchTextBox'"
							+ "title = 'Search for a course by using keywords such as course name or number'/>"
							+ "<input type = 'image' src = 'Images/searchIcon.png' class = 'searchImg'/></div>"
							+ "</div><div class = 'newSection'></div><br/><div id = 'rightInnerSection2' class = 'rightInnerSection'>"
							+ "<select name = 'courseDropdown' class = 'courseSelect'"
							+ "title = 'Find courses related to a specific major from the dropdown menu'>"
							+ "<option>***Select A Major***</option>"
							
							//Temporary, should be filled by database at a later time
							+ "<option>ACC - Accounting</option>"
							+ "<option>ANT - Anthropology</option>"
							+ "<option>ARA - Arabic</option>"
							+ "<option>ARC - Art Criticism</option>"
							+ "<option>ARH - Art History</option>"
							+ "<option>ART - Art</option>"
							+ "<option>ARU - Art Education</option>"
							+ "<option>AST - Astronomy</option>"
							+ "<option>BIO - Biology</option>"
							+ "<option>BUS - Business</option>"
							+ "<option>CDE - Communication Design</option>"
							+ "<option>CDH - Communication Design History</option>"
							+ "<option>CFT - Crafts</option>"
							+ "<option>CHI - Chinese</option>"
							+ "<option>CHM - Chemistry</option>"
							+ "<option>COM - Communication</option>"
							+ "<option>CRJ - Criminal Justice</option>"
							+ "<option>CSC - Computer Science</option>"
							+ "<option>ECO - Economics</option>"
							+ "<option>EDU - Education</option>"
							+ "<option>EEU - Elementary Education: Pre-K 4</option>"
							+ "<option>EGR - Engineering</option>"
							+ "<option>ELU - Elementary Education</option>"
							+ "<option>ENG - English</option>"
							+ "<option>ENV - Environmental Science</option>"
							+ "<option>FAR - Fine Arts</option>"
							+ "<option>FAS - Fine Arts Studio</option>"
							+ "<option>FIN - Finance</option>"
							+ "<option>FRE - French</option>"
							+ "<option>GEG - Geography</option>"
							+ "<option>GEL - Geology</option>"
							+ "<option>GER - German</option>"
							+ "<option>HEA - Health</option>"
							+ "<option>HIS - History</option>"
							+ "<option>HUM - Humanities</option>"
							+ "<option>INT - International Studies</option>"
							+ "<option>ITC - Instructional Technology</option>"
							+ "<option>LIB - Library Science</option>"
							+ "<option>MAR - Marine Science</option>"
							+ "<option>MAT - Mathematics</option>"
							+ "<option>MGM - Management</option>"
							+ "<option>MIL - Military Science</option>"
							+ "<option>MKT - Marketing</option>"
							+ "<option>MLS - Modern Language Studies</option>"
							+ "<option>MUP - Music Performance</option>"
							+ "<option>MUS - Music</option>"
							+ "<option>MUU - Music Education</option>"
							+ "<option>PAG - Pennsylvania German Studies</option>"
							+ "<option>PEC - Physical Education Class</option>"
							+ "<option>PHI - Philosophy</option>"
							+ "<option>PHY - Physics</option>"
							+ "<option>PLG - Paralegal Studies</option>"
							+ "<option>POL - Political Science</option>"
							+ "<option>PRO - Professional Studies</option>"
							+ "<option>PSY - Psychology</option>"
							+ "<option>RUS - Russian</option>"
							+ "<option>SEU - Secondary Education</option>"
							+ "<option>SOC - Sociology</option>"
							+ "<option>SPA - Spanish</option>"
							+ "<option>SPT - Sport</option>"
							+ "<option>SPU - Special Education</option>"
							+ "<option>SWK - Social Work</option>"
							+ "<option>THE - Theatre</option>"
							+ "<option>TVE - Electronic Media</option>"
							+ "<option>WGS - Women's and Gender Studies</option>"
							+ "<option>WRI - Writing</option>"
							+ "</select>"
							+ "</div>");
						
					$("#currentChecksheet").change(function() {
						if($("#currentChecksheet option:selected").val() == "it") 
						{
							$("#innerSection").load("Checksheets/v1.1/min/cscITChecksheet.php");
							$("#sectionTitle label").text("Checksheet Section");
							$("#leftInnerSection span").replaceWith("<span></span>");
							$("#innerSection").animate({ scrollTop: 0 }, "fast"); 
						}
						else if($("#currentChecksheet option:selected").val() == "Mit") 
						{
							$("#innerSection").load("Checksheets/v1.1/min/cscITMastersChecksheet.php");
							$("#sectionTitle label").text("Checksheet Section");
							$("#leftInnerSection span").replaceWith("<span></span>");
							$("#innerSection").animate({ scrollTop: 0 }, "fast"); 
						}
						else if($("#currentChecksheet option:selected").val() == "itm") 
						{
							$("#innerSection").load("Checksheets/v1.1/min/cscITMinorChecksheet.php");
							$("#sectionTitle label").text("Checksheet Section");
							$("#leftInnerSection span").replaceWith("<span></span>");
							$("#innerSection").animate({ scrollTop: 0 }, "fast"); 
						}
						else if($("#currentChecksheet option:selected").val() == "sd") 
						{
							$("#innerSection").load("Checksheets/v1.1/min/cscSDChecksheet.php");
							$("#sectionTitle label").text("Checksheet Section");
							$("#leftInnerSection span").replaceWith("<span></span>");
							$("#innerSection").animate({ scrollTop: 0 }, "fast"); 
						}
						else if($("#currentChecksheet option:selected").val() == "Msd") 
						{
							$("#innerSection").load("Checksheets/v1.1/min/cscSDMastersChecksheet.php");
							$("#sectionTitle label").text("Checksheet Section");
							$("#leftInnerSection span").replaceWith("<span></span>");
							$("#innerSection").animate({ scrollTop: 0 }, "fast"); 
						}
						else 
						{
							$("#innerSection").load("Checksheets/v1.1/min/cscSDMinorChecksheet.php");
							$("#sectionTitle label").text("Checksheet Section");
							$("#leftInnerSection span").replaceWith("<span></span>");
							$("#innerSection").animate({ scrollTop: 0 }, "fast"); 
						}
					}) .change();
				});
			});
			
			function findCourses(id) {
				$("#sectionTitle label").text(id);
				$("#leftInnerSection span")
					.replaceWith("<span><button class = 'courseBox'>Course Name Here</button></span>");
			}
		</script>
	</head>
	<body id = "master">
	</body>
</html>
