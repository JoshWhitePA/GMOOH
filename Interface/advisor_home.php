<!-- Advisor homepage.
File Name: advisor_home.php
Date Created: 4/17/2016
Created by Christopher Steckhouse
Contributors: Christian Carreras, Michael Para
Created for CSC 355WI 020 -->
<?php 
session_start();
    require("../PHPClasses/logic.class.php");
    $logic = new Logic();
    $results = $logic->adviseeSearch($_SESSION['facID']);


    
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Advisor Homepage - GMOOH</title>
		<link rel = "stylesheet" type = "text/css" href = "Styles/gmoohMasterStyle.css"/>	
		<script src = "Scripts/jquery-1.12.0.min.js"></script>
		<script>

			$(document).ready(function(){
				$("#master").load("MasterPages/advisorMasterPage.php", function() {
					$("#mainSection")
						.append("<div style='text-align:right'><form action='advisor_home.php' method='get' id='search'> <input type='text'/><input type='submit' value='Search' /> </form></div><br /><div class='boarderedTable'><table class='adviseeList' id = 'advisorList'><tr class='rowSel'><th>Advisee</th><th>Major</th><th></th></tr>"+
                               "<?php  foreach ($results as $row) { echo "<tr class='rowSel' ><td><span class='box'>". $row['FirstName'] ." ".$row['LastName']."</span></td><td>".$row['StudentId']."</td><td><form action='advisee_Account.php' method='post' id='selectAdvisee'><input type='hidden' value='".$row['StudentId']."' id='StudentID' name='StudentID' /><input type='submit' name='".$row['StudentId']."' value='Load'/></form></td></tr>";} ?>"+"</table></div>"
							);

				});
			});
		</script>
	</head>
	<body id = "master">
	
	</body>
</html>