<?php
?>
<!DOCTYPE html>
<html>
	<head>
	<title>CSC SD Checksheet</title>
	</head>
	<link rel = "stylesheet" type = "text/css" href = "checksheetStyle.css"/>
	<body>
		<table>
			<caption>CSC Software Development</caption>
			<tr>
				<th class = "tableHeader" colspan = "3">
					B. Major Program: 51 sh</th>
			<tr>
				<th>&nbsp; 1. Required Courses: <b>33 sh</b></th>
				<td width = "30px" style = "text-align: center">Gr</td>
				<td width = "30px" style = "text-align: center">SH</td>
			</tr>
			<?php
				for($i = 0; $i < 11; $i++)
					echo "	<tr>	
								<td>&nbsp; &nbsp;</td>
								<td  style = 'text-align: center'></td>
								<td  style = 'text-align: center'></td>
							</tr>";
			?>
			<tr>
				<th>&nbsp; 2. Elective Courses: 
					<b>18 sh (no more than two 200-level)</b></th>
				<td style = "text-align: center">Gr</td>
				<td style = "text-align: center">SH</td>
			</tr>
			<?php
				for($i = 0; $i < 6; $i++)
					echo "	<tr>	
								<td>&nbsp; &nbsp;</td>
								<td  style = 'text-align: center'></td>
								<td  style = 'text-align: center'></td>
							</tr>";
			?>			
			<tr height = "20x" style = "border: none"/>
			<tr>
				<th class = "tableHeader" colspan = "3">
					C. Concomitant Courses: 9 sh
				</th>
			</tr>
			<tr>
				<th>&nbsp; 1. Required Courses: <b>9 sh</b></th>
				<td style = "text-align: center">Gr</td>
				<td style = "text-align: center">SH</td>
			</tr>
			<?php
				for($i = 0; $i < 3; $i++)
					echo "	<tr>	
								<td>&nbsp; &nbsp;</td>
								<td style = 'text-align: center'></td>
								<td style = 'text-align: center'></td>
							</tr>";
			?>
			<tr>
				<th>&nbsp; 2. Intership - optional (free elective)</th>
				<td style = "text-align: center">Gr</td>
				<td style = "text-align: center">SH</td>
			</tr>
			<?php
				for($i = 0; $i < 2; $i++)
					echo "	<tr>	
								<td>&nbsp; &nbsp;</td>
								<td  style = 'text-align: center'></td>
								<td  style = 'text-align: center'>3-6</td>
							</tr>";
			?>
	</body>
</html>
			
