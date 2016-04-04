var lastSection; //Retains the location of the last checksheet section selected
var startup;

//Call this function within the jquery document ready function
function pageLoadPrototype() {
	$("#behindTheScenes")
		.append("<div id = 'startUpDialog' title = 'Time to Create A Checksheet!' class = 'popupDialog'>"
			+ "<p>It looks like it's your first time here so let me tell you about creating a checksheet! "
			+ "Just click on a section to display courses that would go there or you can search for courses "
			+ "by keyword or department. Once you find a course you like, drag and drop it into the appropriate "
			+ "section or semester. Please note that you take all responsibility for picking courses that you have or have not "
			+ "met the prerequisites for. Now that the formalities are out of the way, let's get to filling that "
			+ "checksheet!</p></div>"
			
			+ "<div id = 'draggableHelper'></div>"
			
			+ "<div id = 'bsCSCNotes' title = 'Notes on BS in Computer Science' class = 'popupDialog'>"
			+ "<p>Before taking any 300-level course you must have completed 18 credit hours in CSC courses "
			+ "numbered 125 or above with a GPA of 2.25 in the CSC courses.</p>"
			+ "<p>CSC-prefix courses below 125-level, CSC 130, CSC 280 and CSC 380 do not count towards the BS in CSC.</p></div>"
			
			+ "<div id = 'msCSCNotes' title = 'Notes on MS in Computer Science' class = 'popupDialog'>"
			+ "<p>You can take one of the following options:<br/>"
			+ "&emsp;&bull; 30 sh of courses + comprehensive exam<br/>"
			+ "&emsp;&bull; 24 sh of courses + 6 sh of CSC 599: Thesis</p>"
			+ "<p>At least 18 sh must be 500-level courses.</p></div>"
		
			+"<div id = 'clearThis' title = 'Save Checksheet?' class = 'popupDialog'>"
			+ "<p>Do you wish to save your checksheet before clearing it?</p></div>"
			
			+ "<div id = 'saveThis' title = 'Save Complete' class = 'popupDialog'>"
			+ "<p>Your checksheet was successfully saved. You can find it on the view saved checksheets page.</p></div>"
			
			+ "<div id = 'cleared' title = 'Checksheet Cleared' class = 'popupDialog'>"
			+ "<p>Your checksheet is now empty. Get to filling it!</p></div>"
			
			+ "<div id = 'printThis' title = 'Print Alert' class = 'popupDialog'>"
			+ "<p>You are about to navigate away from your checksheet</p></div>"
			
			+ "<div id = 'notes1' title = 'University Distribution Notes' class = 'popupDialog'>"
			+ "<p>GEG courses with a lab and GEG 40, 322 and 323 may be used in II.A. "
			+ "GEG courses 40, 204, 274, 304, 322, 323, 324, 347, 380 and 394 may NOT be used in II.B.</p></div>"
			
			+ "<div id = 'notes2' title = 'Competancy Across the Curriculum Notes' class = 'popupDialog'>"
			+ "<p>A Competency Across the Curriculum (CAC) course in not a separate course, but rather an overlay that is "
			+ "'double counted' as fulfilling both the CAC requirement and another requirement in either General Eduacation "
			+ "(except for the University Core) the major, or the minor</p></div>"
			
			+ "<div id = 'notes3' title = 'College of Liberal Arts and Sciences Notes' class = 'popupDialog'>"
			+ "<p>Students in the College of Liberal Arts and Sciences are required to take at least one course in "
			+ "Biological Science (BIO) and at least one course in Physical Science (AST, CHM, ENV, GEL, PHY, MAR, GEG "
			+ "with a lab, or GEG 40, 322 or 323) and at least one of which must be a lab "
			+ "(each course may be counted in either II.A or IV.A).</p></div>"
			
			+ "<div id = 'notes4' title = 'College Distribution Notes' class = 'popupDialog'>"
			+ "<p>GEG courses with a lab and GEG 40, 322 and 323 may be used in IV.A. "
			+ "GEG courses 40, 204, 274, 304, 322, 323, 324, 347, 380 and 394 may NOT be used in IV.B.</p></div>"
			
			+ "<div id = 'notes5' title = 'Pennsylvania German Studies Notes' class = 'popupDialog'>"
			+ "<p>Excludes PAG 11 and 12</p></div>");
			
	//Load master page into current page's body
	$("#master").load("MasterPages/masterPage.html", function() {
	//Make the side sections visible
	$("#left").css("visibility", "visible");
	$("#right").css("visibility", "visible");
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
                
			+ "</select>"
			+ "<div id = 'innerSection' class = 'innerSection'></div>"
			+ "<input type = 'image' src = 'Images/printImage.png' class = 'printImg'"
			+ "title = 'Print the checksheet currently being edited' onclick = 'printChecksheet()'/>"
			+ "<input type = 'image' src = 'Images/saveImage.png' class = 'saveImg'"
			+ "title = 'Save the checksheet currently being edited' onclick = 'saveChecksheet()'/>"
			+ "<input type = 'image' src = 'Images/trashIcon.png' class = 'trashImg' id = 'clearCheck'"
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
				+ "<select id = 'termDD' name = 'courseDropdown' class = 'courseSelect'>"	
				+ "<option>Select A Semester</option>"
				+ "</select>"
				+ "<div id = 'termList' class = 'sectionCourses'></div></div>");
		//Place content inside the right section of the master page
///////////////
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
		
		//Whenever the select dropdrown menu is changed
		$("#currentChecksheet").change(function() {
			if($("#currentChecksheet option:selected").val() == "it") 
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
			else if($("#currentChecksheet option:selected").val() == "Mit") 
			{
				$("#innerSection").load("Checksheets/v1.1/min/cscITMastersChecksheet.php");
				$("#sectionTitle label").text("");
				$("#leftInnerSection span").replaceWith("<span></span>");
				$("#innerSection").animate({ scrollTop: 0 }, "fast");
				currentChecksheet = $("#currentChecksheet option:selected").val();
			}
			else if($("#currentChecksheet option:selected").val() == "itm") 
			{
				$("#innerSection").load("Checksheets/v1.1/min/cscITMinorChecksheet.php");
				$("#sectionTitle label").text("");
				$("#leftInnerSection span").replaceWith("<span></span>");
				$("#innerSection").animate({ scrollTop: 0 }, "fast");
				currentChecksheet = $("#currentChecksheet option:selected").val();
			}
			else if($("#currentChecksheet option:selected").val() == "sd") 
			{
				$("#innerSection").load("Checksheets/v1.1/min/cscSDChecksheet.php");
				$("#sectionTitle label").text("");
				$("#leftInnerSection span").replaceWith("<span></span>");
				$("#innerSection").animate({ scrollTop: 0 }, "fast"); 
				currentChecksheet = $("#currentChecksheet option:selected").val();
			}
			else if($("#currentChecksheet option:selected").val() == "Msd") 
			{
				$("#innerSection").load("Checksheets/v1.1/min/cscSDMastersChecksheet.php");
				$("#sectionTitle label").text("");
				$("#leftInnerSection span").replaceWith("<span></span>");
				$("#innerSection").animate({ scrollTop: 0 }, "fast"); 
				currentChecksheet = $("#currentChecksheet option:selected").val();
			}
            else if($("#currentChecksheet option:selected").val() == "sdm") 
			{
				$("#innerSection").load("Checksheets/v1.1/min/cscSDMinorChecksheet.php");
				$("#sectionTitle label").text("");
				$("#leftInnerSection span").replaceWith("<span></span>");
				$("#innerSection").animate({ scrollTop: 0 }, "fast"); 
				currentChecksheet = $("#currentChecksheet option:selected").val();
			}
			else 
			{
				$("#innerSection").load("Checksheets/v1.1/min/cscITChecksheetSaved.php");
				$("#sectionTitle label").text("");
				$("#leftInnerSection span").replaceWith("<span></span>");
				$("#innerSection").animate({ scrollTop: 0 }, "fast"); 
				currentChecksheet = $("#currentChecksheet option:selected").val();
			}
		}) .change(); //This makes sure it happens every time
	});
	/*
	if(!startup)
	{
		startUpNotes();
		startup = true;
	}*/
}

//This function shows the tile of the section selected and what classes fit there			
function findCourses(item) {
	$("#sectionTitle label").text($(item).attr("id")); //place section id into the label
	$("#sectionCourseList") //replace span content with courses
		.replaceWith("<div id = 'sectionCourseList' class = 'sectionCourses'>"
			+" <div id = 'draggableCourse' class = 'courseBox' draggable = 'true' ondragstart = 'dragstart_handler(event)'>"
			+ $(item).attr("id") + " Course</div></div>");
	
	if(!lastSection) //If lastSection == NULL (has not been initialized yet)
		lastSection = item;
		
	else if(item == lastSection)
		return;
		
	else
	{	//Replace the last section selected back to normal
		$(lastSection).css("border-color", "transparent");
		lastSection = item; //Make lastSection point to the new section
	}	
	//Change the current selected section to stand out to the user
	$(item).css("border-color", "#6699ee");
	$.getScript("Scripts/jquery-ui.min.js", function() {
		$(item).effect("pulsate", 5000); 
	});
	
	addEvent($(item), 'dragstart', function (event) {
		// store the ID of the element, and collect it on the drop later on

		event.dataTransfer.setData('Text', this.id);
	});
}

function startUpNotes() {
	$.getScript("Scripts/jquery.blockUI.js", function() {
		$.blockUI.defaults.overlayCSS = { backgroundColor: "#000", opacity: 0.6, cursor: "default" };
		$("#master").block({ message: null, baseZ: 2 });
		$.getScript("Scripts/jquery-ui.min.js", function() {
			$.ui.dialog.prototype._focusTabbable = function(){};
			$("#startUpDialog").dialog({
				dialogClass: "no-close",
				resizable: false,
				draggable: false,
				width: 535,		
				buttons: {
					"Got it!": function() { 
						$("#master").unblock();
						$( this ).dialog( "close" );
					}
				}
			});
		});
	});
}

//Function to direct the user to the current selected checksheet in its proper
//two column form to make it easier to print		
function printChecksheet() {
	$.getScript("Scripts/jquery.blockUI.js", function() {
		$.blockUI.defaults.overlayCSS = { backgroundColor: "#000", opacity: 0.6, cursor: "default" };
		$("#master").block({ message: null, baseZ: 2 });
		$.getScript("Scripts/jquery-ui.min.js", function() {
			$.ui.dialog.prototype._focusTabbable = function(){};
			$("#printThis").dialog({
				dialogClass: "no-close",
				resizable: false,
				draggable: false,
				width: 535,		
				buttons: {
					"I Want To Print!": function() {
						$("#master").unblock();
						$( this ).dialog( "close" );
						printThis();	
					},
					"Stay Here!": function() {
						$("#master").unblock();
						$( this ).dialog( "close" );
					}
				}
			});
		});
	});
}

function printThis() {
	if(currentChecksheet == "it")
		window.open("Checksheets/v1.1/cscITChecksheet.php", "_blank");
	else if(currentChecksheet == "Mit")
		window.open("Checksheets/v1.1/cscITMastersChecksheet.php", "_blank");
	else if(currentChecksheet == "itm")
		window.open("Checksheets/v1.1/cscITMinorChecksheet.php", "_blank");
	else if(currentChecksheet == "sd")
		window.open("Checksheets/v1.1/cscSDChecksheet.php", "_blank");
	else if(currentChecksheet == "Msd")
		window.open("Checksheets/v1.1/OutputProto.php", "_blank");
    else if(currentChecksheet == "savIT")
		window.open("Checksheets/v1.1/cscITChecksheetSaved.php", "_blank");
	else
		window.open("Checksheets/v1.1/cscSDMinorChecksheet.php", "_blank");
}

//Function to save the checksheet		
function saveChecksheet() {
	$.getScript("Scripts/jquery.blockUI.js", function() {
		$.blockUI.defaults.overlayCSS = { backgroundColor: "#000", opacity: 0.6, cursor: "default" };
		$("#master").block({ message: null, baseZ: 2 });
		$.getScript("Scripts/jquery-ui.min.js", function() {
			$("#saveThis").dialog({
				dialogClass: "no-close",
				resizable: false,
				draggable: false,
				width: 535,		
				buttons: {
					"Got it!": function() { $("#master").unblock();
						$( this ).dialog( "close" ); }
				}
			});
		});
	});
}

//Function to alert the user they are about to clear the checksheet
function clearAlert() {
	$.getScript("Scripts/jquery.blockUI.js", function() {
		$.blockUI.defaults.overlayCSS = { backgroundColor: "#000", opacity: 0.6, cursor: "default" };
		$("#master").block({ message: null, baseZ: 2 });
		$.getScript("Scripts/jquery-ui.min.js", function() {
			$.ui.dialog.prototype._focusTabbable = function(){};
			$("#clearThis").dialog({
				dialogClass: "no-close",
				resizable: false,
				draggable: false,
				width: 535,		
				buttons: {
					"Save & Clear": function() {
						$( this ).dialog( "close" );
						saveChecksheet();
						clearChecksheet();
					},
					"Clear Without Saving": function() {
						$( this ).dialog( "close" );
						clearChecksheet();
						clearDialog();
					},
					Cancel: function() {
						$("#master").unblock();
						$( this ).dialog( "close" );
					}
				}
			});
		});
	});
}

//Function to clear the checksheet
function clearChecksheet() {
	if(lastSection) //If lastSection != NULL (has not been initialized yet)
	{
		$(lastSection).css("border-color", "transparent");
		$(lastSection).css("border-width", "1px");
		lastSection = null;
		$("#sectionTitle label").text("");
		$("#sectionCourseList")
			.replaceWith("<div id = 'sectionCourseList' class = 'sectionCourses'></div>");
	}
}
	
function clearDialog() {
	$.blockUI.defaults.overlayCSS = { backgroundColor: "#000", opacity: 0.6, cursor: "default" };
	$("#master").block({ message: null, baseZ: 2 });
	$.ui.dialog.prototype._focusTabbable = function(){};
	$("#cleared").dialog({
		dialogClass: "no-close",
		resizable: false,
		draggable: false,
		width: 535,		
		buttons: {
			"Got it!": function() { $("#master").unblock();
			$( this ).dialog( "close" ); }
		}
	});
}

function geNotes1() {
	$.getScript("Scripts/jquery.blockUI.js", function() {
		$.blockUI.defaults.overlayCSS = { backgroundColor: "#000", opacity: 0.6, cursor: "default" };
		$("#master").block({ message: null, baseZ: 2 });
		$.getScript("Scripts/jquery-ui.min.js", function() {
			$.ui.dialog.prototype._focusTabbable = function(){};
			$("#notes1").dialog({
				dialogClass: "no-close",
				resizable: false,
				draggable: false,
				width: 535,		
				buttons: {
					"Got it!": function() { $("#master").unblock();
					$( this ).dialog( "close" ); }
				}
			});
		});
	});
}

function geNotes2() {
	$.getScript("Scripts/jquery.blockUI.js", function() {
		$.blockUI.defaults.overlayCSS = { backgroundColor: "#000", opacity: 0.6, cursor: "default" };
		$("#master").block({ message: null, baseZ: 2 });
		$.getScript("Scripts/jquery-ui.min.js", function() {
			$.ui.dialog.prototype._focusTabbable = function(){};
			$("#notes2").dialog({
				dialogClass: "no-close",
				resizable: false,
				draggable: false,
				width: 600,		
				buttons: {
					"Got it!": function() { $("#master").unblock();
					$( this ).dialog( "close" ); }
				}
			});
		});
	});
}

function geNotes3() {
	$.getScript("Scripts/jquery.blockUI.js", function() {
		$.blockUI.defaults.overlayCSS = { backgroundColor: "#000", opacity: 0.6, cursor: "default" };
		$("#master").block({ message: null, baseZ: 2 });
		$.getScript("Scripts/jquery-ui.min.js", function() {
			$.ui.dialog.prototype._focusTabbable = function(){};
			$("#notes3").dialog({
				dialogClass: "no-close",
				resizable: false,
				draggable: false,
				width: 550,		
				buttons: {
					"Got it!": function() { $("#master").unblock();
					$( this ).dialog( "close" ); }
				}
			});
		});
	});
}

function geNotes4() {
	$.getScript("Scripts/jquery.blockUI.js", function() {
		$.blockUI.defaults.overlayCSS = { backgroundColor: "#000", opacity: 0.6, cursor: "default" };
		$("#master").block({ message: null, baseZ: 2 });
		$.getScript("Scripts/jquery-ui.min.js", function() {
			$.ui.dialog.prototype._focusTabbable = function(){};
			$("#notes4").dialog({
				dialogClass: "no-close",
				resizable: false,
				draggable: false,
				width: 550,		
				buttons: {
					"Got it!": function() { $("#master").unblock();
					$( this ).dialog( "close" ); }
				}
			});
		});
	});
}

function geNotes5() {
	$.getScript("Scripts/jquery.blockUI.js", function() {
		$.blockUI.defaults.overlayCSS = { backgroundColor: "#000", opacity: 0.6, cursor: "default" };
		$("#master").block({ message: null, baseZ: 2 });
		$.getScript("Scripts/jquery-ui.min.js", function() {
			$.ui.dialog.prototype._focusTabbable = function(){};
			$("#notes5").dialog({
				dialogClass: "no-close",
				resizable: false,
				draggable: false,
				width: 550,		
				buttons: {
					"Got it!": function() { $("#master").unblock();
					$( this ).dialog( "close" ); }
				}
			});
		});
	});
}

function bsCSCNotes() {
	$.getScript("Scripts/jquery.blockUI.js", function() {
		$.blockUI.defaults.overlayCSS = { backgroundColor: "#000", opacity: 0.6, cursor: "default" };
		$("#master").block({ message: null, baseZ: 2 });
		$.getScript("Scripts/jquery-ui.min.js", function() {
			$("#bsCSCNotes").dialog({
				dialogClass: "no-close",
				resizable: false,
				draggable: false,
				width: 550,		
				buttons: {
					"Got it!": function() { $("#master").unblock();
					$( this ).dialog( "close" ); }
				}
			});
		});
	});
}

function msCSCNotes() {
	$.getScript("Scripts/jquery.blockUI.js", function() {
		$.blockUI.defaults.overlayCSS = { backgroundColor: "#000", opacity: 0.6, cursor: "default" };
		$("#master").block({ message: null, baseZ: 2 });
		$.getScript("Scripts/jquery-ui.min.js", function() {
			$("#msCSCNotes").dialog({
				dialogClass: "no-close",
				resizable: false,
				draggable: false,
				width: 550,		
				buttons: {
					"Got it!": function() { $("#master").unblock();
					$( this ).dialog( "close" ); }
				}
			});
		});
	});
}

function displaySectionNotes(id) {
	$("#" + id + " div").toggle();
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
     
function dragstart_handler(ev) {
	ev.dataTransfer.setData("text/plain", ev.target.id);
	ev.dataTransfer.dropEffect = "copy";
}

function dragover_handler(ev) {
	ev.preventDefault();
	ev.dataTransfer.dropEffect = "copy"
}
function drop_handler(ev) {
	ev.preventDefault();
	// Get the id of the target and add the moved element to the target's DOM
	var data = ev.dataTransfer.getData("text");
	ev.target.appendChild(document.getElementById(data));
}