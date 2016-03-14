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
						.append("Courses<br/><br/><div id = 'leftInnerSection' class = 'leftInnerSection' style = 'color: green'>Prerequesites Met</div>"
							+ "<div class = 'newSection'><br/></div><div id = 'leftInnerSection2' class = 'leftInnerSection' style = 'color: red'>Prerequesites Not Met</div>");
					$("#right")
						.append("<input type = 'text' placeholder = 'Search For Courses...'><button type = 'submit'>GO</button><br/><br/><div id = 'rightInnerSection' class = 'rightInnerSection'></div>"
							+ "<select name = 'courseDropdown'><option>***Choose By Major***</option></select>"
							+ "<div id = 'rightInnerSection2' class = 'rightInnerSection'></div>");
						
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
