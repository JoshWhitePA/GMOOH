<?php
	require_once("chkDisp.class.php");
	require_once("logic.class.php");
	$chk = new Chksheet();
	$logic = new Logic();

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
						$chk->displaySingleRecs(1,1);
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
			  <tr>
			  
			  <th>Written Communication: 
					<?php 
						$chk->displaySingleRecs(1,2);
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
			  
			  <th>Mathematics: 
					<?php 
						$chk->displaySingleRecs(1,3);
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
	
			 <th>Wellness: 
					<?php 
						$chk->displaySingleRecs(1,4);
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
		</table>
	</body>
</html>
