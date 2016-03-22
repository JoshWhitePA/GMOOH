//I salvaged some functionality from the edit checksheet page to assemble the parts of this one
//only issue I still have is trying to get the load fnction to work properly
var lastSection;

function pageLoad() {	
	$("#master").load("MasterPages/masterPage.html", function() {
	//Make the side sections visible and main section invisible
	$("#leftSave").css("visibility", "visible");
	$("#rightSave").css("visibility", "visible");
	$("#mainSection").css("visibility", "hidden");
	$("#rightSave")
		//Place content inside the main section of the master page
		.append(
			+ "<div id = 'innerSection' class = 'innerSection'></div>"
			+ "<input type = 'image' src = 'Images/printImage.png' class = 'printImg'"
			+ "title = 'Print the checksheet currently being edited' onclick = 'printChecksheet()'/>"
			+ "<input type = 'image' src = 'Images/trashIcon.png' class = 'trashImg'"
			+ "title = 'Delete Saved Checksheet' onclick = 'clearAlert()'/>");
		//Place content inside the left section of the master page
		$("#leftSave")
			.append("<select id = 'currentChecksheet' class = 'checksheetSelect'"
			+ "title = 'Select a saved checksheet'>"
			+ "<option value = 's1'>Save 1</option>"
			+ "<option value = 's2'>Save 2</option>"
			+ "<option value = 's3'>Save 3</option>"								
			+ "</select>");
		
		});
}
		//Whenever the select dropdrown menu is changed
		$("#currentChecksheet").change(function() {
			if($("#currentChecksheet option:selected").val() == "s1") 
			{
				//load chosen checksheet into the inner section of the master page
				$("#innerSection").load("Checksheets/v1.1/min/cscITChecksheet.php");
				$("#sectionTitle label").text(""); //Clear the current title and course list
				$("#leftInnerSection span").replaceWith("<span></span>");
				$("#innerSection").animate({ scrollTop: 0 }, "fast"); //Scroll to the top of the checksheet
				//This holds the value of the current checksheet in order to direct the
				//user to the correct checksheet whent the print button is pressed
				currentChecksheet = $("#currentChecksheet option:selected").val();
			}
			else if($("#currentChecksheet option:selected").val() == "s2") 
			{
				$("#innerSection").load("Checksheets/v1.1/min/cscITMastersChecksheet.php");
				$("#sectionTitle label").text("");
				$("#leftInnerSection span").replaceWith("<span></span>");
				$("#innerSection").animate({ scrollTop: 0 }, "fast");
				currentChecksheet = $("#currentChecksheet option:selected").val();
			}
			else if($("#currentChecksheet option:selected").val() == "s3") 
			{
				$("#innerSection").load("Checksheets/v1.1/min/cscSDChecksheet.php");
				$("#sectionTitle label").text("");
				$("#leftInnerSection span").replaceWith("<span></span>");
				$("#innerSection").animate({ scrollTop: 0 }, "fast");
				currentChecksheet = $("#currentChecksheet option:selected").val();
			}
			else 
			{
				$("#innerSection").load("Checksheets/v1.1/min/cscSDMinorChecksheet.php");
				$("#sectionTitle label").text("");
				$("#leftInnerSection span").replaceWith("<span></span>");
				$("#innerSection").animate({ scrollTop: 0 }, "fast"); 
				currentChecksheet = $("#currentChecksheet option:selected").val();
			}
		}) .change(); //This makes sure it happens every time


//Function to direct the user to the current selected checksheet in its proper
//two column form to make it easier to print		
function printChecksheet() {
	if(currentChecksheet == "s1")
		window.location.assign("Checksheets/v1.1/cscITChecksheet.php");
	else if(currentChecksheet == "s2")
		window.location.assign("Checksheets/v1.1/cscITMastersChecksheet.php");
	else if(currentChecksheet == "s3")
		window.location.assign("Checksheets/v1.1/cscSDChecksheet.php");
	else
		window.location.assign("Checksheets/v1.1/cscSDMinorChecksheet.php");
}
