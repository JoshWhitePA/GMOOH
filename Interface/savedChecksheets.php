<?php 
    session_start();
    require("../PHPClasses/logic.class.php");
	
	if(!isset($_SESSION["loggedIn"]) || $_SESSION["loggedIn"] == false || $_SESSION["loggedIn"] == null){
	header('location: login.php');
	}	
	
	$logic = new Logic();
    $results = $logic->displaySave($_SESSION["userID"]);
	
	$userMaster = "";
	if(isset($_SESSION["facID"])){
		$userMaster = "MasterPages/advisorMasterPage.html";
	}
	else{
		$userMaster = "MasterPages/masterPage.html";
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Your Saved Checksheets</title>
		<link rel = "stylesheet" type = "text/css" href = "Styles/gmoohMasterStyle.css"/>	
		<script src = "Scripts/jquery-1.12.0.min.js"></script>
		<script src = "Scripts/viewSavedChecksheets.js"></script>
        <script>
            function load_Click(clicked_id){
                var trid = $("#"+clicked_id).closest('tr').attr('id');
                console.log("tr id: "+trid);
                 clicked_id = clicked_id.split('_');
                
                       if("ULASCSCIT" == clicked_id[0]){
                           window.location='./joshsTestChecksheet.php?pae=Checksheets/v1.1/min/cscITChecksheetSaved.php&chkID=ULASCSCIT&AIDID='+clicked_id[1];
                           
                       }else if ("ULASCSCSD"==clicked_id[0]){
                           window.location='./joshsTestChecksheet.php?pae=Checksheets/v1.1/min/cscSDChecksheetSaved.php&chkID=ULASCSCSD&AIDID='+clicked_id[1];
                           
                       }else if ("ULASCOMSD2"==clicked_id[0]){
                           window.location='./joshsTestChecksheet.php?pae=Checksheets/v1.1/min/cscSDMinorChecksheetSaved.php&chkID=ULASCOMSD2&AIDID='+clicked_id[1];
                           
                       }else if ("ULASCISIT2"==clicked_id[0]){
                           window.location='./joshsTestChecksheet.php?pae=Checksheets/v1.1/min/cscITMinorChecksheetSaved.php&chkID=ULASCISIT2&AIDID='+clicked_id[1];
                           
                       }else if ("GLASCSC"==clicked_id[0]){
                           window.location='./joshsTestChecksheet.php?pae=Checksheets/v1.1/min/cscSDMastersChecksheetSaved.php&chkID=GLASCSC&AIDID='+clicked_id[1];
                           
                       }else if ("GLASCSCIT"==clicked_id[0]){
                           window.location='./joshsTestChecksheet.php?pae=Checksheets/v1.1/min/cscITMastersChecksheetSaved.php&chkID=GLASCSCIT&AIDID='+clicked_id[1];
                           
                       }
                
                
            }
            
            function del_Click(clicked_id){
                $.ajax({
                url: "./Scripts/DBSearchWAJAX.php?delID="+clicked_id,
                success: function (data) {
                    location.reload();
                    }
                });
                
                      
                
            }
	    
	    function off_Click(clicked_id){
		$.ajax({
		url: "./Scripts/DBSearchWAJAX.php?offID="+AIDID,
		success: function (data) {
			location.reload();
			}
		});
		
		}
        </script>
		<script>
			$(document).ready(function(){
				//$(':radio').change(function(){
				//	$.ajax({
				//	url: "./Scripts/DBSearchWAJAX.php?offID="+AIDID,
				//	success: function (data) {
				//		location.reload();
				//		}
				//		});
				//	DB::update('CHECKSHEETSAVE', array(
				//	'CheckSheetOfficial' => 0
				//	) "StudentId = %s, $ID);
				//	DB::update('CHECKSHEETSAVE', array(
				//	'CheckSheetOfficial' => 1
				//	) "AIDID = %i", $AIDID);
                var str = "<div class='changepass'><table class='tableCenter'> <!-- These fields will need to be filled via PHP -->";
                
               str +="<?php  
                        $counter = 1;
                            foreach ($results as $row) {
                                $check = "checked";
                                if ($row['CheckSheetOfficial'] == 1){
                                    $check = "true";
                                }else{
                                     $check = "";
                                }

                            echo "<tr><td class = 'paddedTD' ><label for='real_" .$row['CheckSheetID'] ."'>Official? </label><input type='radio' name='official' ".$check." disabled id='real_" .$row['CheckSheetID'] ."' />Checksheet $counter - ".$row['CheckSheetID']." Date: ".$row['Date'] . "</td><td><input type='submit' onClick='load_Click(this.id)' value='Load' id='".$row['CheckSheetID']."_".$row['AIDID']."' /><td><input type='submit' onClick='off_Click(this.id)' value='Make Official' id='".$row['AIDID']."' /><td><input type='submit' onClick='del_Click(this.id)' value='Delete' id='".$row['AIDID']."' /></td></tr>";
                                $counter++;
                            }
                   ?>";
                    
                    str+="</table>";
				$("#master").load(<?php echo json_encode($userMaster); ?>, function() {
					$("#mainSection")
						.append(str); 
				});
			});
		</script>
	</head>
	<body id = "master">
	</body>
</html>