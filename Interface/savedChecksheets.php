<?php 
    session_start();
    require("../PHPClasses/logic.class.php");
    $logic = new Logic();
    $results = $logic->displaySave($_SESSION["userID"]);

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Your Saved Checksheets</title>
		<link rel = "stylesheet" type = "text/css" href = "Styles/gmoohMasterStyle.css"/>	
		<script src = "Scripts/jquery-1.12.0.min.js"></script>
		<script src = "Scripts/viewSavedChecksheets.js"></script>
		<script>
			$(document).ready(function(){
                
                var str = "<div class='changepass'><table class='tableCenter'> <!-- These fields will need to be filled via PHP -->";
                
               str +="<?php  
                        $counter = 1;
                            foreach ($results as $row) {


                            echo "<tr><td class = 'paddedTD'>Checksheet $counter - ".$row['CheckSheetDescr']."</td><td><input type='submit' onClick='load_Click(this.id)' value='submit' id='load_".$row['CheckSheetDescr']."' /><td><input type='submit' onClick='del_Click(this.id)' value='Delete' id='del_".$row['CheckSheetDescr']."' /></td></tr>";
                                $counter++;
                            }
                   ?>";
                    
                    str+="</table>";
				$("#master").load("MasterPages/masterPage.html", function() {
					$("#mainSection")
						.append(str); 
				});
			});
		</script>
	</head>
	<body id = "master">
	</body>
</html>