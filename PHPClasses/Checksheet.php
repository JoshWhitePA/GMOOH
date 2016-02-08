<?php
	require_once("chkDisp.class.php");
	require_once 'meekrodb.2.3.class.php';
	
	DB::$user = 'jwhit159';
	DB::$password = 'W@ckyRace5';
	DB::$dbName = 'jwhit159_bookstore';
	
 	$chk = new Chksheet();
		
	$Dept = array();
	$ClassNo = array();
	$LowRange = array();
	$HighRange = array();
	$retrived = false;
	
	$select = "select Dept, ClassNo, LowRange, HighRange 
				from PID p
				INNER JOIN Restrictions r
				ON p.CompID = r.CompID";
	
	$results = DB::query($select);
	foreach ($results as $row) {
  		 	array_push($Dept,$row["Dept"]);
			array_push($ClassNo, $row["ClassNo"]);
			array_push($LowRange,$row["LowRange"]);
			array_push($HighRange,$row["HighRange"]);
			$retrived = true;
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
