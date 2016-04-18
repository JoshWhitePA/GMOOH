var lastSection; //Retains the location of the last checksheet section selected
var showWelcomeNotes = true;
var initialChecksheetLoaded = false;
var thisItem;
var spanIdIdx = 1;
var termCourseIdIdx = 1;

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
			+ "<p>At least 18 sh must be 500-level courses.</p></div>"
			
			+ "<div id = 'chooseSemester' title = 'Choose A Semester' class = 'popupDialog' style = 'text-align: center'>"
			+ "Drag and Drop Your Choice Into The Sequence Box"
			+ "<p><span id = 'unassignedSem'>Unassigned</span><br/>"
			+ "<span id = 'sp16'>Spring 16</span><br/>"
			+ "<span id = 'sum16'>Summer 16</span><br/>"
			+ "<span id = 'f16'>Fall 16</span><br/>"
			+ "<span id = 'w17'>Winter 17</span></p></div>");
	
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
				+ "<input id = 'trashButton' type = 'image' src = 'Images/trashIcon.png' class = 'trashImg'"
				+ "title = 'Clear the checksheet currently being edited' onclick = 'clearAlert()'/>");
		//Place content inside the left section of the master page
		$("#left")
			.append("<br/><div id = 'leftInnerSection' class = 'leftInnerSection'"
				+ "title = 'The course section you select and its related courses will appear here'>"
				+ "<div id = 'sectionTitle' class = 'titleBox'>"	
				+ "<label class = 'sectionLabel'></label></div><div id = 'sectionCourseList' class = 'sectionCourses'></div></div>"
				+ "<div class = 'newSection'><br/></div>"
				+ "<div id = 'leftInnerSection2' class = 'leftInnerSection' "
				+ "title = 'Prepare for the future by creating a course sequence'>"
				+ "<div id = 'termBar' class = 'titleBox'>"
				+ "<input type = 'image' src = 'Images/plusImg.png' class = 'addImg' onclick = 'termSemesters()'"
				+ "title = 'Add a semester to the course sequence'/></div>"
				+ "<div id = 'termList' class = 'sectionCourses'>"
 				+ "<ul class = 'semFormat' id = 'userCourseSequence'>"
 				+ "</ul></div></div>");
				
		//Place content inside the right section of the master page
		$("#right")
			.append("<br/><div id = 'rightInnerSection' class = 'rightInnerSection' "
				+ "title = 'Search for a course by using keywords such as course name or number'>"
				+ "<div class = 'searchBox'>"
				+ "<input type = 'text' onkeyup = 'searchBox()' id = 'searchInput' placeholder = 'Search Courses...' class = 'searchTextBox'/>"
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
					$("#innerSection").load(lPage);
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
			$("#innerSection").load(lPage+"?chkID="+chkID+"&AIDID="+AIDID);
			currentChecksheet = "it";
		}
	});

	if(showWelcomeNotes)
	{	
		startUpNotes();
		showWelcomeNotes = false;
	}
	
	$.getScript("Scripts/jquery-ui.min.js", function() {
		makeTermItemDraggable();
		makeTermDraggable();
		makeChecksheetSpansDraggable();
		$("#userCourseSequence").sortable({ cancel: "li div" });
	});
     loadSchedule();
}

//This function shows the tile of the section selected and what classes fit there			
function findCourses(item) {
	 $.post( "./Scripts/SearchCourseByBox.php", { courseKey: $(item).attr("id") })
                  .done(function( data ) {
                     $("#sectionCourseList").html(String(data));
                        console.log(String(data));
                  });
    
	$("#sectionTitle label").text($(item).attr("id")); //place section id into the label
    
//	$("#sectionCourseList") //replace span content with courses
//		.replaceWith("<div id = 'sectionCourseList' class = 'sectionCourses'>"
//			+ "<div id = 'draggableCourse' class = 'courseBox'>"
//			+ $(item).attr("id") + " Course</div>");
			
			
				
	thisItem = item;
	
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
		makeTermDraggable();
		makeDeptSpansDraggable();
		$("#draggableCourse").draggable({
			revert: "invalid",
			scroll: false,
			helper: function() { return $(this).clone().appendTo("#left").show(); },
			containment: "body",
			distance: 5,
			opacity: 0.5,
			addClasses: false,
			start : function() {
				this.style.display = "none";
				makeItemDroppable(item);
				makeTermDroppable();
			},
			stop: function() {
				this.style.display = "";
				$(item).droppable("destroy");
				$("#termList ul li").droppable("destroy");
				makeChecksheetSpansDraggable();
				makeTermDraggable();
			}
		});
	});
}

function makeItemDroppable(item) {
	$(item).droppable({
		activate: function() {
		addClasses: false,
			$(item).effect("pulsate", 2000); 
		},
		drop: function(event, ui) {
			$(item).html("&emsp;");
			$(item).append("<span id = 'checksheetSection" + spanIdIdx 
			+ "' class = 'noWrap'>" + $("#" + ui.draggable.prop("id")).text() + "</span>");
			spanIdIdx++;
		}
	});
}

function makeTermDroppable() {
	var el = document.getElementById("termList");
	$("#termList ul li").droppable({
		hoverClass: "termHover",
		addClasses: false,
		drop: function(event, ui) {
			if(el.innerHTML.indexOf($("#" + ui.draggable.prop("id")).text()) != -1) {
				return;
			}
			$(this).append("<div id = '" + termCourseIdIdx 
			+"'class = 'courseBox'>" + $("#" + ui.draggable.prop("id")).text() + "</div>");
			termCourseIdIdx++;
		}
	});
}

function makeTermSwitchable() {
	$("#termList ul li").droppable({
		hoverClass: "termHover",
		addClasses: false,
		drop: function(event, ui) {
			$(this).append("<div id = '" + termCourseIdIdx 
			+"'class = 'courseBox'>" + $("#" + ui.draggable.prop("id")).text() + "</div>");
			termCourseIdIdx++;
			$(temp).replaceWith("");
			makeTermDraggable();
		}
	});
}

function makeTrashDroppable() {
	$("#trashButton").droppable({
		tolerance: "pointer",
		hoverClass: "trashHover",
		addClasses: false,
		drop: function(event, ui) {
			$(temp).replaceWith("");
		}
	});
}

function makeSequenceDroppable() {
	var el = document.getElementById("termList");
	$("#termList").droppable({
		hoverClass: "trashHover",
		addClasses: false,
		drop: function(event, ui) {
			if(el.innerHTML.indexOf($("#" + ui.draggable.prop("id")).text()) == -1) {
				$("#termList ul").append("<li class = 'semFormat'><label class = 'termLabel'>*"
				+ $("#" + ui.draggable.prop("id")).text() + "*</label></li>");
			}
			makeTermDraggable();
			makeTermItemDraggable();
		}
	});
}

function makeTermDraggable() {
	$("#termList ul li div").draggable({
		revert: "invalid",
		scroll: false,
		helper: function() { return $(this).clone().appendTo("#left").show(); },
		containment: "body",
		distance: 5,
		opacity: 0.5,
		addClasses: false,
		start : function() {
			this.style.display = "none";
			temp = this;
			if(thisItem)
				makeItemDroppable(thisItem);
			temp = this;
			makeTermSwitchable();
			makeTrashDroppable();
		},
		stop: function() {
			this.style.display = "";
			if(thisItem)
				$(thisItem).droppable("destroy");
			makeChecksheetSpansDraggable();
			$("#trashButton").droppable("destroy");	
			$("#termList ul li").droppable("destroy");
		}
	});
}

function makeTermItemDraggable() {
	$("#termList ul li").draggable({
		scroll: false,
		helper: function() { return $("<span style = 'white-space: nowrap'/>")
			.text($(this).children("label").clone().text()).appendTo("#left").show(); },
		containment: "body",
		distance: 5,
		handle: "label",
		zIndex: 3,
		opacity: 0.5,
		addClasses: false,
		start : function() {
			this.style.display = "none";
			temp = this;
			makeTrashDroppable();
		},
		stop: function() {
			this.style.display = "";
			$("#trashButton").droppable("destroy");
		}
	});
}

function makeChecksheetSpansDraggable() {
	$("#mainSection span").draggable({
		revert: "invalid",
		scroll: false,
		helper: function() { return $(this).clone().appendTo("body").show(); },
		containment: "body",
		distance: 5,
		opacity: 0.5,
		addClasses: false,
		start : function() {
			this.style.display = "none";
			temp = this;
			makeTermDroppable();
			makeTrashDroppable();
		},
		stop: function() {
			this.style.display = "";
			$("#termList ul li").droppable("destroy");
			$("#trashButton").droppable("destroy");
			makeTermDraggable();
		}
	});
}

function makeDeptSpansDraggable() {
	$("#right span").draggable({
		revert: "invalid",
		scroll: false,
		helper: function() { return $(this).clone().appendTo("body").show(); },
		containment: "body",
		distance: 5,
		opacity: 0.5,
		addClasses: false,
		start : function() {
			this.style.display = "none";
			if(thisItem)
				makeItemDroppable(thisItem);
			makeTermDroppable();
		},
		stop: function() {
			this.style.display = "";
			if(thisItem)
				$(thisItem).droppable("destroy");
			$("#termList ul li").droppable("destroy");
			makeTermDraggable();
			makeChecksheetSpansDraggable();
		}
	});
}

function makeNewTermsDraggable() {
	$("#chooseSemester span").draggable({
		revert: "invalid",
		scroll: false,
		helper: function() { return $(this).clone().appendTo("body").show(); },
		containment: "body",
		distance: 5,
		zIndex: 9999,
		opacity: 0.5,
		addClasses: false,
		start : function() {
			this.style.display = "none";
			makeSequenceDroppable();
		},
		stop: function() {
			this.style.display = "";
			$("#termList").droppable("destroy");
		}
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
    var curAIDID = scrapeTheSucka();
    saveSchedule(curAIDID)
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

function termSemesters() {
	makeNewTermsDraggable();
	$.getScript("Scripts/jquery-ui.min.js", function() {
		$("#chooseSemester").dialog({
			width: 535,
			height: 325,
			buttons: {
				"Close": function() { 
					$(this).dialog("destroy"); 
				}
			}
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
			$("#resetDialog").dialog({
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
		url: "./Scripts/DBSearchWAJAX.php?search=" + $("#searchInput").val(),
		success: function (data) {
			$("#searchResults").html(String(data));
		}
	});
    return true;
}

function searchByDept(){
	var sel = $("#deptDD").find(":selected").text()
    sel = sel.substr(0,sel.indexOf(" "));
    
    $.ajax({
		url: "./Scripts/DBSearchWAJAX.php?deptSearch=" + sel.trim(),
		success: function (data) {
			$("#deptS").html(String(data));
		}
	});
    return true;
}
     
function scrapeTheSucka(){
    var xmlSaveData = "<GMOOH><Student><GenEd>";
    $.each($('.courseNameBoxGen'), function (index, value) { 
        xmlSaveData += "<Class>";
        
        xmlSaveData += "<ClassName>" + $(value).text().trim() + "</ClassName>";
        idStr = "#genGrade" + index;
        var catToText = "" + $(idStr).val();
        xmlSaveData += "<ClassGrade>" + catToText + "</ClassGrade>";
        xmlSaveData += "</Class>";
        
});
    xmlSaveData += "</GenEd>";
    xmlSaveData += "<Program>";
    
    
     $.each($('.courseNameBoxPro'), function (idx, valuez) { 
        xmlSaveData += "<Class>";
        
        xmlSaveData += "<ClassName>" + $(valuez).text().trim() + "</ClassName>";
        idStr = "#proGrade" + idx;
         var catToText = "" + $(idStr).val();
        xmlSaveData += "<ClassGrade>" + catToText.toUpperCase() + "</ClassGrade>";
        xmlSaveData += "</Class>";
    });
    
    xmlSaveData += "</Program>";
    xmlSaveData += "</Student></GMOOH>";
    var chkID = $('#programID').val();
       
     console.log(xmlSaveData);
    $.ajaxSetup({
        async: false
    });
     $.post( "./Scripts/DBSearchWAJAX.php", { id: chkID, Save: xmlSaveData, AIDID:AIDID })
              .done(function( data ) {
                 console.log("classInfo: "+String(data));
                 AIDID = data.trim();
                curAIDID = AIDID;
              });

    $.ajaxSetup({
        async: true
    });
    
    return curAIDID;
}

function loadSchedule(){

    //magic ajax
     $.ajax({
                url: "./Scripts/DBSearchWAJAX.php?AIDID=" + AIDID,
                success: function (data) {
                    $('#termList').html(String(data));
                }
            });
    return true;
    
}
function saveSchedule(curAIDID){
//    var sel =  $('#termDD').find(":selected").text();
    
//        var list = $("#termList").children().html();
            var list = $("#termList").html();

//     console.log(list);
//        var newList = list.split('<br>'); //$(newList[1]).text()
////        console.log($(newList[1]).text());
//        var listOfClass = $('#termList').find('span').toArray();
//        console.log("curAIDID before send: "+curAIDID);
//            alert("AIDID:"+AIDID+"classInfo: "+classInfo);
            
            $.post( "./Scripts/DBSearchWAJAX.php", { AIDID: AIDID, classInfo: list })
              .done(function( data ) {
                 console.log("classInfo: "+String(data));
              });
//        $.ajax({
//                     url: "./Scripts/DBSearchWAJAX.php?AIDID=" + curAIDID +"&classInfo="+list ,
//                     success: function (data) {
//                         console.log("classInfo: "+String(data));
//                         }
//                  });
////    
}
