var lastSection; //Retains the location of the last checksheet section selected
var showWelcomeNotes = true;
var initialChecksheetLoaded = false;

//Call this function within the jquery document ready function
function pageLoad(checksheetFlag) {
	$("#behindTheScenes")
		.append("<div id = 'startUpDialog' title = 'Time to Create A Checksheet!' class = 'popupDialog'>"
			+ "<p>It looks like it's your first time here so let me tell you about creating a checksheet! "
			+ "Just click on a section to display courses that would go there or you can search for courses "
			+ "by keyword or department. Once you find a course you like, drag and drop it into the appropriate "
			+ "section or semester. Please note that you take all responsibility for picking courses that you have or have not "
			+ "met the prerequisites for. Now that the formalities are out of the way, let's get to filling that "
			+ "checksheet!</p></div>"
			
			+ "<div id = 'startUpDialog2' title = 'Sorry.. One More Thing!' class = 'popupDialog'>"
			+ "<p>As much as I would love to give you unlimited checksheets to create and save, "
			+ "I can only give you three. Why three you ask? Well three is a nice low number that we can all "
			+ " count on our fingers, toes, paws, tentacles, or whatever you have (I apologise now if you have "
			+ "less than three digits and I'll refrain from the follow up question of why) "
			+ "Just blame Josh for your unfortunate limitations on creativity and scholarly planning.</p></div>"
		
			+"<div id = 'clearDialog' title = 'Save Checksheet?' class = 'popupDialog'>"
			+ "<p>Do you wish to save your checksheet before clearing it?</p></div>"
			
			+ "<div id = 'saveDialog' title = 'Save Complete' class = 'popupDialog'>"
			+ "<p>Your checksheet was successfully saved. You can find it on the view saved checksheets page.</p></div>"
			
			+ "<div id = 'clearedDialog' title = 'Checksheet Cleared' class = 'popupDialog'>"
			+ "<p>Your checksheet is now empty. Get to filling it!</p></div>"
			
			+ "<div id = 'resetDialog' title = 'Save Checkhsheet?' class = 'popupDialog'>"
			+ "<p>Do you wish to save your checksheet before resetting?</p></div>"
			
			+ "<div id = 'wasResetDialog' title = 'Checksheet Reset' class = 'popupDialog'>"
			+ "<p>Your checksheet was reset to the last save of your official checksheet.</p></div>"
			
			+ "<div id = 'geNotes1' title = 'University Distribution Notes' class = 'popupDialog'>"
			+ "<p>GEG courses with a lab and GEG 40, 322 and 323 may be used in II.A. "
			+ "GEG courses 40, 204, 274, 304, 322, 323, 324, 347, 380 and 394 may NOT be used in II.B.</p></div>"
			
			+ "<div id = 'geNotes2' title = 'Competancy Across the Curriculum Notes' class = 'popupDialog'>"
			+ "<p>A Competency Across the Curriculum (CAC) course in not a separate course, but rather an overlay that is "
			+ "'double counted' as fulfilling both the CAC requirement and another requirement in either General Eduacation "
			+ "(except for the University Core) the major, or the minor</p></div>"
			
			+ "<div id = 'geNotes3' title = 'College of Liberal Arts and Sciences Notes' class = 'popupDialog'>"
			+ "<p>Students in the College of Liberal Arts and Sciences are required to take at least one course in "
			+ "Biological Science (BIO) and at least one course in Physical Science (AST, CHM, ENV, GEL, PHY, MAR, GEG "
			+ "with a lab, or GEG 40, 322 or 323) and at least one of which must be a lab "
			+ "(each course may be counted in either II.A or IV.A).</p></div>"
			
			+ "<div id = 'geNotes4' title = 'College Distribution Notes' class = 'popupDialog'>"
			+ "<p>GEG courses with a lab and GEG 40, 322 and 323 may be used in IV.A. "
			+ "GEG courses 40, 204, 274, 304, 322, 323, 324, 347, 380 and 394 may NOT be used in IV.B.</p></div>"
			
			+ "<div id = 'geNotes5' title = 'Pennsylvania German Studies Notes' class = 'popupDialog'>"
			+ "<p>Excludes PAG 11 and 12</p></div>"
			
			+ "<div id = 'bsCSCNotes' title = 'Notes on BS in Computer Science' class = 'popupDialog'>"
			+ "<p>Before taking any 300-level course you must have completed 18 credit hours in CSC courses "
			+ "numbered 125 or above with a GPA of 2.25 in the CSC courses.</p>"
			+ "<p>CSC-prefix courses below 125-level, CSC 130, CSC 280 and CSC 380 do not count towards the BS in CSC.</p></div>"
			
			+ "<div id = 'msCSCNotes' title = 'Notes on MS in Computer Science' class = 'popupDialog'>"
			+ "<p>You can take one of the following options:<br/>"
			+ "&emsp;&bull; 30 sh of courses + comprehensive exam<br/>"
			+ "&emsp;&bull; 24 sh of courses + 6 sh of CSC 599: Thesis</p>"
			+ "<p>At least 18 sh must be 500-level courses.</p></div>");
	
	//Load master page into current page's body
	$("#master").load("MasterPages/masterPage.html", function() {
	//Make the side sections visible
		$("#left").css("visibility", "visible");
		$("#right").css("visibility", "visible");
		
		if(checksheetFlag) {
			$("#mainSection")
				//Place content inside the main section of the master page
				.append("<select id = 'currentChecksheet' class = 'checksheetSelect'"
					+ "title = 'Select a major or minor to start editing a checksheet'>"
					+ "<option value = 'it'>CSC IT - Computer Science: Information Technology</option>"
					+ "<option value = 'Mit'>CSC IT(M) - Computer Science: Information Technology Masters</option>"
					+ "<option value = 'itm'>CSC IT(m) - Computer Science: Information Technology Minor</option>"
					+ "<option value = 'sd'>CSC SD - Computer Science: Sofware Development</option>"
					+ "<option value = 'Msd'>CSC SD(M) - Computer Science: Software Development Masters</option>"
					+ "<option value = 'sdm'>CSC SD(m) - Computer Science: Software Developement Minor</option>"
					+ "<option value = 'savIT'>CSC IT(M) - Computer Science: Information Technology Saved</option>"
					+ "</select>");
		}
		else {
			$("#mainSection")
				.append("<input type = 'image' src = 'Images/resetIcon.png' class = 'resetImg'"
					+ "title = 'Resets checksheet to your last official checkheet save' onclick = 'resetAlert()'/>");
		}
		
		$("#mainSection")
			.append("<div id = 'innerSection' class = 'innerSection'></div>"
				+ "<input type = 'image' src = 'Images/printImage.png' class = 'printImg'"
				+ "title = 'Print the checksheet currently being edited' onclick = 'printChecksheet()'/>"
				+ "<input type = 'image' src = 'Images/saveImage.png' class = 'saveImg'"
				+ "title = 'Save the checksheet currently being edited' onclick = 'saveChecksheet()'/>"
				+ "<input type = 'image' src = 'Images/trashIcon.png' class = 'trashImg'"
				+ "title = 'Clear the checksheet currently being edited' onclick = 'clearAlert()'/>");
		//Place content inside the left section of the master page
		$("#left")
			.append("<br/><div id = 'leftInnerSection' class = 'leftInnerSection'"
				+ "title = 'The course section you select and its related courses will appear here'>"
				+ "<div id = 'sectionTitle' class = 'titleBox'>"	
				+ "<label class = 'sectionLabel'></label></div><div id = 'sectionCourseList' class = 'sectionCourses'></div></div>"
				+ "<div class = 'newSection'><br/></div>"
				+ "<div id = 'leftInnerSection2' class = 'leftInnerSection' "
				+ "title = 'See courses from previous semesters and schedule for future ones'>"
				+ "<select id = 'termDD' onchange='loadSchedule()' name = 'courseDropdown' class = 'courseSelect'>"	
				+ "<option>Select A Semester</option>"
                + "<option>Fall 2016</option>"
                + "<option>Spring 2017</option>"
                + "<option>Fall 2017</option>"
                + "<option>Spring 2018</option>"
                + "<option>Fall 2018</option>"
                + "<option>Fall 2018</option>"
                + "<option>Spring 2019</option>"
                + "<option>Fall 2019</option>"

				+ "</select>"
				+ "<div id = 'termList' ondblclick='saveSchedule()' class = 'sectionCourses'>"
				+ "<ul class = 'semFormat'><li class = 'semFormat'>*Unassigned*</li></ul></div></div>");
				
		//Place content inside the right section of the master page
		$("#right")
			.append("<br/><div id = 'rightInnerSection' class = 'rightInnerSection' "
				+ "title = 'Search for a course by using keywords such as course name or number'>"
				+ "<div class = 'searchBox'>"
				+ "<input type = 'text' onkeyup='searchBox()' id='searchInput' placeholder = 'Search Courses...' class = 'searchTextBox'/>"
				+ "<input type = 'image' src = 'Images/searchIcon.png' class = 'searchImg'/></div>"
                + "<div id = 'searchResults' class = 'sectionCourses'></div></div>"
				+ "<div class = 'newSection'></div><br/><div id = 'rightInnerSection2' class = 'rightInnerSection' "
				+ "title = 'Find courses related to a specific major from the dropdown menu'>"
				+ "<select name = 'courseDropdown' id = 'deptDD' onchange = 'searchByDept()' class = 'courseSelect'>"
				+ "<option>Select A Department</option>"
								
				//Temporary, should be filled by database at a later time
				+ "<optgroup label = 'A ------------------------------------'>"
				+ "<option>ACC - Accounting</option>"
				+ "<option>ANT - Anthropology</option>"
				+ "<option>ARA - Arabic</option>"
				+ "<option>ARC - Art Criticism</option>"
				+ "<option>ARH - Art History</option>"
				+ "<option>ART - Art</option>"
				+ "<option>ARU - Art Education</option>"
				+ "<option>AST - Astronomy</option>"
				+ "</optgroup>"
				+ "<optgroup label = 'B ------------------------------------'>"
				+ "<option>BIO - Biology</option>"
				+ "<option>BUS - Business</option>"
				+ "</optgroup>"
				+ "<optgroup label = 'C ------------------------------------'>"
				+ "<option>CDE - Communication Design</option>"
				+ "<option>CDH - Communication Design History</option>"
				+ "<option>CFT - Crafts</option>"
				+ "<option>CHI - Chinese</option>"
				+ "<option>CHM - Chemistry</option>"
				+ "<option>COM - Communication</option>"
				+ "<option>CRJ - Criminal Justice</option>"
				+ "<option>CSC - Computer Science</option>"
				+ "</optgroup>"
				+ "<optgroup label = 'E ------------------------------------'>"
				+ "<option>ECO - Economics</option>"
				+ "<option>EDU - Education</option>"
				+ "<option>EEU - Elementary Education: Pre-K 4</option>"
				+ "<option>EGR - Engineering</option>"
				+ "<option>ELU - Elementary Education</option>"
				+ "<option>ENG - English</option>"
				+ "<option>ENV - Environmental Science</option>"
				+ "</optgroup>"
				+ "<optgroup label = 'F ------------------------------------'>"
				+ "<option>FAR - Fine Arts</option>"
				+ "<option>FAS - Fine Arts Studio</option>"
				+ "<option>FIN - Finance</option>"
				+ "<option>FRE - French</option>"
				+ "</optgroup>"
				+ "<optgroup label = 'G ------------------------------------'>"
				+ "<option>GEG - Geography</option>"
				+ "<option>GEL - Geology</option>"
				+ "<option>GER - German</option>"
				+ "</optgroup>"
				+ "<optgroup label = 'H ------------------------------------'>"
				+ "<option>HEA - Health</option>"
				+ "<option>HIS - History</option>"
				+ "<option>HUM - Humanities</option>"
				+ "</optgroup>"
				+ "<optgroup label = 'I ------------------------------------'>"
				+ "<option>INT - International Studies</option>"
				+ "<option>ITC - Instructional Technology</option>"
				+ "</optgroup>"
				+ "<optgroup label = 'L ------------------------------------'>"
				+ "<option>LIB - Library Science</option>"
				+ "</optgroup>"
				+ "<optgroup label = 'M ------------------------------------'>"
				+ "<option>MAR - Marine Science</option>"
				+ "<option>MAT - Mathematics</option>"
				+ "<option>MGM - Management</option>"
				+ "<option>MIL - Military Science</option>"
				+ "<option>MKT - Marketing</option>"
				+ "<option>MLS - Modern Language Studies</option>"
				+ "<option>MUP - Music Performance</option>"
				+ "<option>MUS - Music</option>"
				+ "<option>MUU - Music Education</option>"
				+ "</optgroup>"
				+ "<optgroup label = 'P ------------------------------------'>"
				+ "<option>PAG - Pennsylvania German Studies</option>"
				+ "<option>PEC - Physical Education Class</option>"
				+ "<option>PHI - Philosophy</option>"
				+ "<option>PHY - Physics</option>"
				+ "<option>PLG - Paralegal Studies</option>"
				+ "<option>POL - Political Science</option>"
				+ "<option>PRO - Professional Studies</option>"
				+ "<option>PSY - Psychology</option>"
				+ "</optgroup>"
				+ "<optgroup label = 'R ------------------------------------'>"
				+ "<option>RUS - Russian</option>"
				+ "</optgroup>"
				+ "<optgroup label = 'S ------------------------------------'>"
				+ "<option>SEU - Secondary Education</option>"
				+ "<option>SOC - Sociology</option>"
				+ "<option>SPA - Spanish</option>"
				+ "<option>SPT - Sport</option>"
				+ "<option>SPU - Special Education</option>"
				+ "<option>SWK - Social Work</option>"
				+ "</optgroup>"
				+ "<optgroup label = 'T ------------------------------------'>"
				+ "<option>THE - Theatre</option>"
				+ "<option>TVE - Electronic Media</option>"
				+ "</optgroup>"
				+ "<optgroup label = 'W ------------------------------------'>"
				+ "<option>WGS - Women's and Gender Studies</option>"
				+ "<option>WRI - Writing</option>"
				+ "</optgroup>"
				+ "</select>"
				+ "<div id = 'deptS' class = 'sectionCourses'></div></div>");
		
		if(checksheetFlag) {
			//Whenever the select dropdrown menu is changed
			$("#currentChecksheet").change(function() {
				if(initialChecksheetLoaded)
				{
					if(!confirm("Switching checksheets will clear your current checksheet. Continue?"))
						return;
				}
				
				if($("#currentChecksheet option:selected").val() == "it") 
				{
					//load chosen checksheet into the inner section of the master page
					$("#innerSection").load("Checksheets/v1.1/min/cscITChecksheet.php");
					$("#sectionTitle label").text(""); //Clear the current title and course list
					$("#sectionCourseList").text("");
					$("#innerSection").animate({ scrollTop: 0 }, "fast"); //Scroll to the top of the checksheet
					//This holds the value of the current checksheet in order to direct the
					//user to the correct checksheet whent the print button is pressed
					currentChecksheet = $("#currentChecksheet option:selected").val();
				}
				else if($("#currentChecksheet option:selected").val() == "Mit") 
				{
					$("#innerSection").load("Checksheets/v1.1/min/cscITMastersChecksheet.php");
					$("#sectionTitle label").text("");
					$("#sectionCourseList").text("");
					$("#innerSection").animate({ scrollTop: 0 }, "fast");
					currentChecksheet = $("#currentChecksheet option:selected").val();
				}
				else if($("#currentChecksheet option:selected").val() == "itm") 
				{
					$("#innerSection").load("Checksheets/v1.1/min/cscITMinorChecksheet.php");
					$("#sectionTitle label").text("");
					$("#sectionCourseList").text("");
					$("#innerSection").animate({ scrollTop: 0 }, "fast");
					currentChecksheet = $("#currentChecksheet option:selected").val();
				}
				else if($("#currentChecksheet option:selected").val() == "sd") 
				{
					$("#innerSection").load("Checksheets/v1.1/min/cscSDChecksheet.php");
					$("#sectionTitle label").text("");
					$("#sectionCourseList").text("");
					$("#innerSection").animate({ scrollTop: 0 }, "fast"); 
					currentChecksheet = $("#currentChecksheet option:selected").val();
				}
				else if($("#currentChecksheet option:selected").val() == "Msd") 
				{
					$("#innerSection").load("Checksheets/v1.1/min/cscSDMastersChecksheet.php");
					$("#sectionTitle label").text("");
					$("#sectionCourseList").text("");
					$("#innerSection").animate({ scrollTop: 0 }, "fast"); 
					currentChecksheet = $("#currentChecksheet option:selected").val();
				}
				else if($("#currentChecksheet option:selected").val() == "sdm") 
				{
					$("#innerSection").load("Checksheets/v1.1/min/cscSDMinorChecksheet.php");
					$("#sectionTitle label").text("");
					$("#sectionCourseList").text("");
					$("#innerSection").animate({ scrollTop: 0 }, "fast"); 
					currentChecksheet = $("#currentChecksheet option:selected").val();
				}
				else 
				{
					$("#innerSection").load("Checksheets/v1.1/min/cscITChecksheetSaved.php");
					$("#sectionTitle label").text("");
					$("#sectionCourseList").text("");
					$("#innerSection").animate({ scrollTop: 0 }, "fast"); 
					currentChecksheet = $("#currentChecksheet option:selected").val();
				}
				initialChecksheetLoaded = true;
			}) .change(); //This makes sure it happens every time
		}
		else {
			$("#innerSection").load("Checksheets/v1.1/min/cscITChecksheet.php");
			currentChecksheet = "it";
		}
	});

	if(showWelcomeNotes)
	{	
		startUpNotes();
		showWelcomeNotes = false;
	}
}

//This function shows the tile of the section selected and what classes fit there			
function findCourses(item) {
	$("#sectionTitle label").text($(item).attr("id")); //place section id into the label
	$("#sectionCourseList") //replace span content with courses
		.replaceWith("<div id = 'sectionCourseList' class = 'sectionCourses'>"
			+ "<div id = 'draggableCourse' class = 'courseBox'>"
			+ $(item).attr("id") + " Course</div>"
			+ "<div id = 'draggableCourse2' class = 'courseBox'>"
			+ $(item).attr("id") + " Course2</div></div>");
	
	if(!lastSection) //If lastSection == NULL (has not been initialized yet)
		lastSection = item;
		
	else if(item == lastSection)
		return;
		
	else
	{	//Replace the last section selected back to normal
		$(lastSection).css("border-color", "transparent");
		lastSection = item; //Make lastSection point to the new section
		$.getScript("Scripts/jquery-ui.min.js", function() {
			$(lastSection).droppable("destroy");
			$("#termList ul li").droppable("destroy");
		});
	}
	//Change the current selected section to stand out to the user
	$(item).css("border-color", "#6699ee");
	$.getScript("Scripts/jquery-ui.min.js", function() {
		//$(item).effect("pulsate", 5000); 
		
		$("#draggableCourse").draggable({
			revert: "invalid",
			scroll: false,
			distance: 5,
			helper: function() { return $(this).clone().appendTo("#left").show(); },
			containment: "body",
			start : function() {
				this.style.display = "none";
			},
			stop: function() {
				this.style.display = "";
			}
		});
		
		$("#draggableCourse2").draggable({
			revert: "invalid",
			scroll: false,
			distance: 5,
			helper: function() { return $(this).clone().appendTo("#left").show(); },
			containment: "body",
			start : function() {
				this.style.display = "none";
			},
			stop: function() {
				this.style.display = "";
			}
		});
		
		$(item).droppable({
			activate: function() {
				$(item).effect("pulsate", 2000); 
			},
			drop: function(event, ui) {
				$(item).html($("#" + ui.draggable.prop("id")).text());
			}
		});
		
		$("#termList ul li").droppable({
			drop: function(event, ui) {
				$(this).append("<div class = 'courseBox'>" + $("#" + ui.draggable.prop("id")).text() + "</div>");
			}
		});
	});
}

function printChecksheet() {
	if(currentChecksheet == "it")
		window.open("Checksheets/v1.1/reg/cscITChecksheet.php", "_blank");
	else if(currentChecksheet == "Mit")
		window.open("Checksheets/v1.1/reg/cscITMastersChecksheet.php", "_blank");
	else if(currentChecksheet == "itm")
		window.open("Checksheets/v1.1/reg/cscITMinorChecksheet.php", "_blank");
	else if(currentChecksheet == "sd")
		window.open("Checksheets/v1.1/reg/cscSDChecksheet.php", "_blank");
	else if(currentChecksheet == "Msd")
		window.open("Checksheets/v1.1/reg/cscSDMastersChecksheet.php", "_blank");
    else if(currentChecksheet == "savIT")
		window.open("Checksheets/v1.1/reg/cscITChecksheetSaved.php", "_blank");
	else
		window.open("Checksheets/v1.1/reg/cscSDMinorChecksheet.php", "_blank");
}

//Function to clear the checksheet
function clearChecksheet() {
	if(lastSection) //If lastSection != NULL (has not been initialized yet)
	{
		$(lastSection).css("border-color", "transparent");
		lastSection = null;
		$.getScript("Scripts/jquery-ui.min.js", function() {
			$("#draggableCourse").draggable("destroy");
		});
		clearCheckksheetHelper();
		$("#sectionTitle label").text("");
		$("#sectionCourseList").text("");
	}
}

function clearCheckksheetHelper() {
	if(currentChecksheet == "it") 
		//load chosen checksheet into the inner section of the master page
		$("#innerSection").load("Checksheets/v1.1/min/cscITChecksheet.php");
		
	else if(currentChecksheet == "Mit") 
		$("#innerSection").load("Checksheets/v1.1/min/cscITMastersChecksheet.php");
		
	else if(currentChecksheet == "itm") 
		$("#innerSection").load("Checksheets/v1.1/min/cscITMinorChecksheet.php");
		
	else if(currentChecksheet == "sd") 
		$("#innerSection").load("Checksheets/v1.1/min/cscSDChecksheet.php");
		
	else if(currentChecksheet == "Msd") 
		$("#innerSection").load("Checksheets/v1.1/min/cscSDMastersChecksheet.php");
		
    else if(currentChecksheet == "sdm") 
		$("#innerSection").load("Checksheets/v1.1/min/cscSDMinorChecksheet.php");
		
	else 
		$("#innerSection").load("Checksheets/v1.1/min/cscITChecksheetSaved.php");
}

function resetChecksheet() {
	clearChecksheet();
}

//Function to save the checksheet		
function saveChecksheet() {
    scrapeTheSucka();
	showDialog("#saveDialog", 535, true);
}

function displaySectionNotes(id) {
	$("#" + id + " div").toggle();
}

function showDialog(id, setWidth, openDialog) {
	$.getScript("Scripts/jquery.blockUI.js", function() {
		$.blockUI.defaults.overlayCSS = { backgroundColor: "#000", opacity: 0.6, cursor: "default" };
		$("#master").block({ message: null, baseZ: 2 });
		$.getScript("Scripts/jquery-ui.min.js", function() {
			$(id).dialog({
				autoOpen: openDialog,
				dialogClass: "no-close",
				closeOnEscape: false,
				resizable: false,
				draggable: false,
				width: setWidth,		
				buttons: {
					"Got it!": function() { 
						$("#master").unblock();
						$(this).dialog("destroy"); 
					}
				}
			});
		});
	});
}

function startUpNotes() {
	$.getScript("Scripts/jquery-ui.min.js", function() {
		//showDialog("#startUpDialog", 535, false);	
		//$("#startUpDialog").dialog("open");
	});
}

//Function to alert the user they are about to clear the checksheet
function clearAlert() {
	$.getScript("Scripts/jquery.blockUI.js", function() {
		$.blockUI.defaults.overlayCSS = { backgroundColor: "#000", opacity: 0.6, cursor: "default" };
		$("#master").block({ message: null, baseZ: 2 });
		$.getScript("Scripts/jquery-ui.min.js", function() {
			$.ui.dialog.prototype._focusTabbable = function(){};
			$("#clearDialog").dialog({
				dialogClass: "no-close",
				closeOnEscape: false,
				resizable: false,
				draggable: false,
				width: 535,		
				buttons: {
					"Save & Clear": function() {
						$(this).dialog("destroy");
						saveChecksheet();
						clearChecksheet();
					},
					"Clear Without Saving": function() {
						$(this).dialog("destroy");
						clearChecksheet();
						showDialog("#clearedDialog", 535, true);
					},
					Cancel: function() {
						$("#master").unblock();
						$(this).dialog("destroy");
					}
				}
			});
		});
	});
}

function resetAlert() {
		$.getScript("Scripts/jquery.blockUI.js", function() {
		$.blockUI.defaults.overlayCSS = { backgroundColor: "#000", opacity: 0.6, cursor: "default" };
		$("#master").block({ message: null, baseZ: 2 });
		$.getScript("Scripts/jquery-ui.min.js", function() {
			$("#resetThis").dialog({
				dialogClass: "no-close",
				closeOnEscape: false,
				resizable: false,
				draggable: false,
				width: 535,		
				buttons: {
					"Save & Reset": function() {
						$(this).dialog("destroy");
						saveChecksheet();
						resetChecksheet();
					},
					"Reset Without Saving": function() {
						$(this).dialog("destroy");
						resetChecksheet();
						showDialog("#wasResetDialog", 535, true);
					},
					Cancel: function() {
						$("#master").unblock();
						$(this).dialog("destroy");
					}
				}
			});
		});
	});
}

function searchBox(){
	$.ajax({
		url: "./Scripts/DBSearchWAJAX.php?search=" + $('#searchInput').val(),
		success: function (data) {
			$('#searchResults').html(String(data));
		}
	});
    return true;
}

function searchByDept(){
	var sel =  $('#deptDD').find(":selected").text()
    sel = sel.substr(0,sel.indexOf(' '));
    
    $.ajax({
		url: "./Scripts/DBSearchWAJAX.php?deptSearch=" +sel.trim(),
		success: function (data) {
			$('#deptS').html(String(data));
		}
	});
    return true;
}
     
function scrapeTheSucka(){
    var xmlSaveData = "<GMOOH><Student><GenEd>";
    var numOGenEd = parseInt($('#genEdCount').val());
    for(idxGen = 0; idxGen < numOGenEd; idxGen++ ){
        xmlSaveData += "<Class>";
        var idStr = "#genClass" + idxGen;
        xmlSaveData += "<ClassName>" + $(idStr).text().trim() + "</ClassName>";
        idStr = "#genGrade" + idxGen;
        xmlSaveData += "<ClassGrade>" + $(idStr).text().trim() + "</ClassGrade>";
        xmlSaveData += "</Class>";
    }
    xmlSaveData += "</GenEd>";

    xmlSaveData += "<Program>";
    var numOProgram = parseInt($('#programCount').val());
    for(idxPro = 0; idxPro < numOProgram; idxPro++ ){
        xmlSaveData += "<Class>";
        var idStr = "#proClass" + idxPro;
        xmlSaveData += "<ClassName>" + $(idStr).text().trim() + "</ClassName>";
        idStr = "#proGrade" + idxPro;
        xmlSaveData += "<ClassGrade>" + $(idStr).text().trim() + "</ClassGrade>";
        xmlSaveData += "</Class>";
    }
    xmlSaveData += "</Program>";
    xmlSaveData += "</Student></GMOOH>";

    var chkID = $('#programID').val();
       
     $.ajax({
		url: "./Scripts/DBSearchWAJAX.php?id="+chkID+"&Save=" + xmlSaveData,
		success: function (data) {
			console.log(data);
		}
	});
}

function loadSchedule(){
    var sel =  $('#termDD').find(":selected").text();
    //magic ajax
     $.ajax({
                url: "./Scripts/DBSearchWAJAX.php?termSearch=" + sel,
                success: function (data) {
                    $('#termList').html(String(data));
                }
            });
    return true;
    
}
function saveSchedule(){
    var sel =  $('#termDD').find(":selected").text();
    
//       var list = $("#termList span");
        var listOfClass = $('#termList').find('span').toArray();
       console.log( $(listOfClass[1]).text());

                console.log(newerList[0] +newerList[1]);
                $.ajax({
                    url: "./Scripts/DBSearchWAJAX.php?currentTerm=" + sel +"&termClass=" ,
                    success: function (data) {
    //                    console.log(String(data));
                        }
                 });
            
            
        
        
}
