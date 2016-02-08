<?php
	#hi
	require_once("db.class.php");
	require_once("chkDisp.class.php");
 	$chk = new Chksheet();
	
	$db = new Database();
	$db -> connect();
	
	$Dept = array();
	$ClassNo = array();
	$LowRange = array();
	$HighRange = array();
	$retrived = true;

	$select = "select Dept, ClassNo, LowRange, HighRange 
				from PID p
				INNER JOIN Restrictions r
				ON p.CompID = r.CompID";
	$db -> query($select);
	if ($db->numRows() > 0) {
		while($db->nextRecord()) {
			array_push($Dept,$db->Record["Dept"]);
			array_push($ClassNo, $db->Record["ClassNo"]);
			array_push($LowRange,$db->Record["LowRange"]);
			array_push($HighRange,$db->Record["HighRange"]);
		}
	} else {
		$retrived = false;
		echo "0 results";
	}
 	 
 ?>
 
<!DOCTYPE html>
<html>
<head>
<style>
table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    text-align: left;
    padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
    background-color: #4CAF50;
    color: white;
}
</style>
</head>
</head>
	<body>
		<table>
			  <tr>
				<th>Oral Communication: 
					<?php 
						if($retrived){
							$chk -> displayGenReqs(0, $Dept, $ClassNo, $LowRange, $HighRange);
						}
					?>
				</th>
				<th></th> 
				<th></th>
				<th></th>
			  </tr>
			  <tr>
				<td></td>
				<td></td> 
				<td></td>
				<td></td>
			  </tr>
			<?php

			?>
		</table>
	</body>
</html>
