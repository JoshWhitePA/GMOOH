<!DOCTYPE html>
<html>
	<head>
		<title>Create New Checksheet</title>
		<link rel = "stylesheet" type = "text/css" href = "Styles/gmoohMasterStyle.css"/>	
		<script src = "Scripts/jquery-1.12.0.min.js"></script>
		<script>
			$(document).ready(function(){
				$("#master").load("MasterPages/masterPage.html", function() {
					//I think it would be better if this only appeared when a section
					//in the checksheet is selected
					//$("#left").css("visibility", "visible");
					$("#right").css("visibility", "visible");
					$("#mainSection")
						.append("<select name = 'currentChecksheet'>"
							+ "<option value = 'sd' selected = 'selected'>CSC SD</option>"
							+ "<option value = 'Msd'>CSC SD Master</option>"
							+ "<option value = 'msd'>CSC SD Minor</option>"
							+ "<option value = 'it'>CSC IT</option>"
							+ "<option value = 'Mit'>CSC IT Master</option>"
							+ "<option value = 'mit'>CSC IT Minor</option>"
							+ "</select>"
							+ "<div id = 'innerSection' class = 'innerSection'></div>");
					$("#left")
						.append("<br/><div id = 'leftInnerSection' class = 'leftInnerSection' style = 'color: green'>Prerequesites Met</div>"
							+ "<div class = 'newSection'><br/></div>"
							+ "<div id = 'leftInnerSection2' class = 'leftInnerSection' style = 'color: red'>Prerequesites Not Met</div>");
					$("#right")
						.append("<br/><div id = 'rightInnerSection' class = 'rightInnerSection'>"
							+ "<div style = 'background-color: white; border-style: none none solid none; border-width: 2px; border-color: #dddddd; padding: 0; width: 100%; height: 25px; right: 0; left: 0; margin: auto'>"
							+ "<input type = 'text' placeholder = 'Search For Courses...' style = 'border: none; width: 82%; height: 15px; float: left; padding: 5px' title = 'Search for a course by using keywords such as course name or number'/>"
							+ "<input type = 'image' src = 'Images/searchIcon.png' style = 'background-color: #dddddd; width: 11%; height: 25px; float: right'/></div>"
							+ "</div><div class = 'newSection'></div><br/><div id = 'rightInnerSection2' class = 'rightInnerSection'>"
							+ "<select name = 'courseDropdown' style = 'width: 100%; border-style: none none solid none; border-width: 2px; border-color: #dddddd' title = 'Find courses related to a specific major from the dropdown menu'>"
							+ "<option>***Choose By Major***</option>"
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
						
					$("select").change(function() {
						if($("select option:selected").val() == "sd") 
						{
							$("#innerSection").load("Checksheets/v1.1/cscSDChecksheet.php");
							$("#innerSection").animate({ scrollTop: 0 }, "fast"); 
						}
						else if($("select option:selected").val() == "Msd") 
						{
							$("#innerSection").load("Checksheets/v1.1/cscSDMasterChecksheet.php");
							$("#innerSection").animate({ scrollTop: 0 }, "fast"); 
						}
						else if($("select option:selected").val() == "msd") 
						{
							$("#innerSection").load("Checksheets/v1.1/cscSDMinorChecksheet.php");
							$("#innerSection").animate({ scrollTop: 0 }, "fast"); 
						}
						else if($("select option:selected").val() == "it") 
						{
							$("#innerSection").load("Checksheets/v1.1/cscITChecksheet.php");
							$("#innerSection").animate({ scrollTop: 0 }, "fast"); 
						}
						else if($("select option:selected").val() == "Mit") 
						{
							$("#innerSection").load("Checksheets/v1.1/cscITMasterChecksheet.php");
							$("#innerSection").animate({ scrollTop: 0 }, "fast"); 
						}
						else 
						{
							$("#innerSection").load("Checksheets/v1.1/cscITMinorChecksheet.php");
							$("#innerSection").animate({ scrollTop: 0 }, "fast"); 
						}
					}) .change();
				});
			});
		</script>
	</head>
	<body id = "master">
	</body>
</html>
