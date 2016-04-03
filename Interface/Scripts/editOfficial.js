var lastSection; //Retains the location of the last checksheet section selected
var startup;

//Call this function within the jquery document ready function
function pageLoadEditOfficial() {	
	$("#behindTheScenes")
		.append("<div id = 'startUp' title = 'Time to Create A Checksheet!' style = 'display: none; z-index: 3'>"
			+ "<p>It looks like it's your first time here so let me tell you about creating a checksheet! "
			+ "Just click on a section to display courses that would go there or you can search for courses "
			+ "by keyword or department. Once you find a course you like, drag and drop it into the appropriate "
			+ "section or semester. Please note that you take all responsibility for picking courses that you have or have not "
			+ "met the prerequisites for. Now that the formalities are out of the way, let's get to filling that "
			+ "checksheet!</p></div>"
			
			+ "<div id = 'bsCSCNotes' title = 'Notes on BS in Computer Science' style = 'display: none; z-index: 3'>"
			+ "<p>Before taking any 300-level course you must have completed 18 credit hours in CSC courses "
			+ "numbered 125 or above with a GPA of 2.25 in the CSC courses.</p>"
			+ "<p>CSC-prefix courses below 125-level, CSC 130, CSC 280 and CSC 380 do not count towards the BS in CSC.</p></div>"
			
			+ "<div id = 'msCSCNotes' title = 'Notes on MS in Computer Science' style = 'display: none; z-index: 3'>"
			+ "<p>You can take one of the following options:<br/>"
			+ "&emsp;&bull; 30 sh of courses + comprehensive exam<br/>"
			+ "&emsp;&bull; 24 sh of courses + 6 sh of CSC 599: Thesis</p>"
			+ "<p>At least 18 sh must be 500-level courses.</p></div>"
			
			+"<div id = 'clearThis' title = 'Save Checksheet?' style = 'display: none; z-index: 3'>"
			+ "<p>Do you wish to save your checksheet before clearing it?</p></div>"
			
			+ "<div id = 'saveThis' title = 'Save Complete' style = 'display: none; z-index: 3'>"
			+ "<p>Your checksheet was successfully saved. You can find it on the view saved checksheets page.</p></div>"
			
			+ "<div id = 'cleared' title = 'Checksheet Cleared' style = 'display: none; z-index: 3'>"
			+ "<p>Your checksheet is now empty. Get to filling it!</p></div>"
			
			+ "<div id = 'printThis' title = 'Print Alert' style = 'display: none; z-index: 3'>"
			+ "<p>You are about to navigate away from your checksheet</p></div>"
			
			+ "<div id = 'resetThis' title = 'Save Checksheet?' style = 'display: none; z-index: 3'>"
			+ "<p>Do you wish to save your checksheet before reseting it to your official checksheet?</p></div>"
			
			+ "<div id = 'wasReset' title = 'Your Checksheet Was Reset' style = 'display: none; z-index: 3'>"
			+ "<p>Your checksheet was reset to your official checksheet. Get to filling it!</p></div>"
			
			+ "<div id = 'notes1' title = 'University Distribution Notes' style = 'display: none; z-index: 3'>"
			+ "<p>GEG courses with a lab and GEG 40, 322 and 323 may be used in II.A. "
			+ "GEG courses 40, 204, 274, 304, 322, 323, 324, 347, 380 and 394 may NOT be used in II.B.</p></div>"
			
			+ "<div id = 'notes2' title = 'Competancy Across the Curriculum Notes' style = 'display: none; z-index: 3'>"
			+ "<p>A Competency Across the Curriculum (CAC) course in not a separate course, but rather an overlay that is "
			+ "'double counted' as fulfilling both the CAC requirement and another requirement in either General Eduacation "
			+ "(except for the University Core) the major, or the minor</p></div>"
			
			+ "<div id = 'notes3' title = 'College of Liberal Arts and Sciences Notes' style = 'display: none; z-index: 3'>"
			+ "<p>Students in the College of Liberal Arts and Sciences are required to take at least one course in "
			+ "Biological Science (BIO) and at least one course in Physical Science (AST, CHM, ENV, GEL, PHY, MAR, GEG "
			+ "with a lab, or GEG 40, 322 or 323) and at least one of which must be a lab "
			+ "(each course may be counted in either II.A or IV.A).</p></div>"
			
			+ "<div id = 'notes4' title = 'College Distribution Notes' style = 'display: none; z-index: 3'>"
			+ "<p>GEG courses with a lab and GEG 40, 322 and 323 may be used in IV.A. "
			+ "GEG courses 40, 204, 274, 304, 322, 323, 324, 347, 380 and 394 may NOT be used in IV.B.</p></div>"
			
			+ "<div id = 'notes5' title = 'Pennsylvania German Studies Notes' style = 'display: none; z-index: 3'>"
			+ "<p>Excludes PAG 11 and 12</p></div>");
			
	//Load master page into current page's body
	$("#master").load("MasterPages/masterPage.html", function() {
	//Make the side sections visible
	$("#left").css("visibility", "visible");
	$("#right").css("visibility", "visible");
	$("#mainSection")
		//Place content inside the main section of the master page
		.append("<div class = 'officialHeaderBox'>Editing will create a new checksheet NOT change your official one</div>"
			+ "<div id = 'innerSection' class = 'innerSection'></div>"
			+ "<input type = 'image' src = 'Images/printImage.png' class = 'printImg'"
			+ "title = 'Print the checksheet currently being edited' onclick = 'printChecksheet()'/>"
			+ "<input type = 'image' src = 'Images/saveImage.png' class = 'saveImg'"
			+ "title = 'Save the checksheet currently being edited' onclick = 'saveChecksheet()'/>"
			+ "<input type = 'image' src = 'Images/trashIcon.png' class = 'trashImg'"
			+ "title = 'Clear the checksheet currently being edited' onclick = 'clearAlert()'/>"
			+ "<input type = 'image' src = 'Images/resetIcon.png' class = 'resetImg'"
			+ "title = 'Resets checksheet to your official checksheet' onclick = 'resetChecksheet()'/>");
		$("#innerSection").load("Checksheets/v1.1/min/cscITChecksheet.php");
		//Place content inside the left section of the master page
		$("#left")
			.append("<br/><div id = 'leftInnerSection' class = 'leftInnerSection'"
				+ "title = 'The course section you select and its related courses will appear here'>"
				+ "<div id = 'sectionTitle' class = 'titleBox'>"	
				+ "<label class = 'sectionLabel'></label></div><span></span></div>"
				+ "<div class = 'newSection'><br/></div>"
				+ "<div id = 'leftInnerSection2' class = 'leftInnerSection' "
				+ "title = 'See courses from previous semesters and schedule for future ones'>"
				+ "<select name = 'courseDropdown' class = 'courseSelect'>"	
				+ "<option>Select A Semester</option>"
				+ "</select>"
				+ "</div>");
		//Place content inside the right section of the master page
		$("#right")
			.append("<br/><div id = 'rightInnerSection' class = 'rightInnerSection' "
				+ "title = 'Search for a course by using keywords such as course name or number'>"
				+ "<div class = 'searchBox'>"
				+ "<input type = 'text' onkeyup='searchBox()' id='searchInput' placeholder = 'Search Courses...' class = 'searchTextBox'/>"
				+ "<input type = 'image' src = 'Images/searchIcon.png' class = 'searchImg'/></div>"
                +"<div id='searchResults' style=' overflow: scroll;white-space: pre;'></div>"
				+ "</div><div class = 'newSection'></div><br/><div id = 'rightInnerSection2' class = 'rightInnerSection' "
				+ "title = 'Find courses related to a specific major from the dropdown menu'>"
				+ "<select name = 'courseDropdown'  id='deptDD' onchange='searchByDept()' class = 'courseSelect'>"
				+ "<option>Select A Department</option>"
								
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
				+ "<div id='deptS' style=' overflow: scroll;white-space: pre;'></div></div>");
	});
	if(!startup)
	{
		startUpNotes();
		startup = true;
	}
}

//This function shows the tile of the section selected and what classes fit there			
function findCourses(item) {
	$("#sectionTitle label").text($(item).attr("id")); //place section id into the label
	$("#leftInnerSection span") //replace span content with courses
		.replaceWith("<span><button class = 'courseBox'>" + $(item).attr("id") + " Course</button></span>");
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
	$(item).css("border-width", "3px");
	$.getScript("Scripts/jquery-ui.min.js", function() {
		$(item).effect("pulsate", 5000); 
	});
}

function startUpNotes() {
	$.getScript("Scripts/jquery.blockUI.js", function() {
		$.blockUI.defaults.overlayCSS = { backgroundColor: "#000", opacity: 0.6, cursor: "default" }
		$("#master").block({ message: null, baseZ: 2 });
		$.getScript("Scripts/jquery-ui.min.js", function() {
			$.ui.dialog.prototype._focusTabbable = function(){};
			$("#startUp").dialog({
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

//Function to direct the user to the current selected checksheet in its proper
//two column form to make it easier to print		
function printChecksheet() {
		$.getScript("Scripts/jquery.blockUI.js", function() {
		$.blockUI.defaults.overlayCSS = { backgroundColor: "#000", opacity: 0.6, cursor: "default" }
		$("#master").block({ message: null, baseZ: 2 });
		$.getScript("Scripts/jquery-ui.min.js", function() {
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
		window.location.assign("Checksheets/v1.1/cscITChecksheet.php");
	else if(currentChecksheet == "Mit")
		window.location.assign("Checksheets/v1.1/cscITMastersChecksheet.php");
	else if(currentChecksheet == "itm")
		window.location.assign("Checksheets/v1.1/cscITMinorChecksheet.php");
	else if(currentChecksheet == "sd")
		window.location.assign("Checksheets/v1.1/cscSDChecksheet.php");
	else if(currentChecksheet == "Msd")
		window.location.assign("Checksheets/v1.1/cscSDMastersChecksheet.php");
	else
		window.location.assign("Checksheets/v1.1/cscSDMinorChecksheet.php");
}

//Function to save the checksheet		
function saveChecksheet() {
	$.getScript("Scripts/jquery.blockUI.js", function() {
		$.blockUI.defaults.overlayCSS = { backgroundColor: "#000", opacity: 0.6, cursor: "default" }
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
		$.blockUI.defaults.overlayCSS = { backgroundColor: "#000", opacity: 0.6, cursor: "default" }
		$("#master").block({ message: null, baseZ: 2 });
		$.getScript("Scripts/jquery-ui.min.js", function() {
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
		$("#leftInnerSection span")
			.replaceWith("<span><button class = 'courseBox'></button></span>");
	}
}
	
function clearDialog() {
	$.blockUI.defaults.overlayCSS = { backgroundColor: "#000", opacity: 0.6, cursor: "default" }
	$("#master").block({ message: null, baseZ: 2 });
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

function resetChecksheet() {
		$.getScript("Scripts/jquery.blockUI.js", function() {
		$.blockUI.defaults.overlayCSS = { backgroundColor: "#000", opacity: 0.6, cursor: "default" }
		$("#master").block({ message: null, baseZ: 2 });
		$.getScript("Scripts/jquery-ui.min.js", function() {
			$("#resetThis").dialog({
				dialogClass: "no-close",
				resizable: false,
				draggable: false,
				width: 535,		
				buttons: {
					"Save & Reset": function() {
						$( this ).dialog( "close" );
						saveChecksheet();
						reset();
					},
					"Reset Without Saving": function() {
						$( this ).dialog( "close" );
						reset();
						resetDialog();
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

function reset() {
		if(lastSection) //If lastSection != NULL (has not been initialized yet)
	{
		$(lastSection).css("border-color", "transparent");
		$(lastSection).css("border-width", "1px");
		lastSection = null;
		$("#sectionTitle label").text("");
		$("#leftInnerSection span")
			.replaceWith("<span><button class = 'courseBox'></button></span>");
	}
}

function resetDialog() {
	$.blockUI.defaults.overlayCSS = { backgroundColor: "#000", opacity: 0.6, cursor: "default" }
	$("#master").block({ message: null, baseZ: 2 });
	$("#wasReset").dialog({
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

//CHECKSHEET NOTES
//
//
//
////////////////////
function geNotes1() {
	$.getScript("Scripts/jquery.blockUI.js", function() {
		$.blockUI.defaults.overlayCSS = { backgroundColor: "#000", opacity: 0.6, cursor: "default" }
		$("#master").block({ message: null, baseZ: 2 });
		$.getScript("Scripts/jquery-ui.min.js", function() {
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
		$.blockUI.defaults.overlayCSS = { backgroundColor: "#000", opacity: 0.6, cursor: "default" }
		$("#master").block({ message: null, baseZ: 2 });
		$.getScript("Scripts/jquery-ui.min.js", function() {
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
		$.blockUI.defaults.overlayCSS = { backgroundColor: "#000", opacity: 0.6, cursor: "default" }
		$("#master").block({ message: null, baseZ: 2 });
		$.getScript("Scripts/jquery-ui.min.js", function() {
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
		$.blockUI.defaults.overlayCSS = { backgroundColor: "#000", opacity: 0.6, cursor: "default" }
		$("#master").block({ message: null, baseZ: 2 });
		$.getScript("Scripts/jquery-ui.min.js", function() {
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
		$.blockUI.defaults.overlayCSS = { backgroundColor: "#000", opacity: 0.6, cursor: "default" }
		$("#master").block({ message: null, baseZ: 2 });
		$.getScript("Scripts/jquery-ui.min.js", function() {
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
		$.blockUI.defaults.overlayCSS = { backgroundColor: "#000", opacity: 0.6, cursor: "default" }
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
		$.blockUI.defaults.overlayCSS = { backgroundColor: "#000", opacity: 0.6, cursor: "default" }
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
