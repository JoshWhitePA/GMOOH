<!DOCTYPE html>
<html>
	<head>
		<title>jQuery Checksheet Test</title>
		<link rel = "stylesheet" type = "text/css" href = "Styles/test.css"/>	
		<script src = "Scripts/jquery-1.12.0.js">
		</script> 
		<script> 
		//jQuery code
		$(document).ready(function(){
			$("select").change(function() {
				if($("select option:selected").val() == "sd") 
				{
					$("#loadChecksheet").load("Checksheets/cscSDChecksheet.php");
					$("#checksheetHolder").animate({ scrollTop: 0 }, "fast"); 
				}
				else if($("select option:selected").val() == "Msd") 
				{
					$("#loadChecksheet").load("Checksheets/cscSDMastersChecksheet.php");
					$("#checksheetHolder").animate({ scrollTop: 0 }, "fast"); 
				}
				else if($("select option:selected").val() == "it") 
				{
					$("#loadChecksheet").load("Checksheets/cscITChecksheet.php");
					$("#checksheetHolder").animate({ scrollTop: 0 }, "fast"); 
				}
				else 
				{
					$("#loadChecksheet").load("Checksheets/cscITMastersChecksheet.php");
					$("#checksheetHolder").animate({ scrollTop: 0 }, "fast"); 
				}
			}) .change();
		});
		
		function drag(ev) {
			ev.dataTransfer.setData("text", ev.target.id);
		}
		function allowDrop(ev) {
			ev.preventDefault();
		}
		function drop(ev) {
			ev.preventDefault();
			var data = ev.dataTransfer.getData("text");
			ev.target.appendChild(document.getElementById(data));
		}
		function popup() {
			alert("This is a clickable area of the checksheet!");
		}
		</script> 
	</head>
	<body>
		<h1>jQuery Checksheet Test</h1>
		<div class = "newSection">
			<select name = "currentChecksheet">
				<option value = "sd" selected = "selected">CSC SD</option>
				<option value = "Msd">CSC SD Masters</option>
				<option value = "it">CSC IT</option>
				<option value = "Mit">CSC IT Masters</option>
			</select>
		</div>
		<div style = "float: left; border: solid; border-width: 1px; padding: 5px; position: relative" width = "300px" height = "500px">
			<input id = "class1" type = "button" value = "CSC 135 Computer Science I" draggable = "true"
				ondragstart = "drag(event)" style = "background-color: white; border: none;
					font-family: Arial, Helvetica, sans-serif; font-size: 16px; font-weight: normal"/>
			<br/>
			<input id = "class2" type = "button" value = "CSC 237 Data Structures I" draggable = "true"
				ondragstart = "drag(event)" style = "background-color: white; border: none;
					font-family: Arial, Helvetica, sans-serif; font-size: 16px; font-weight: normal"/>
		</div>
		<div class = "newSection"></div>
		<div id = "checksheetHolder" class = "a">
			<div id = "loadChecksheet"></div>
		</div>	
	</body>
</html>
