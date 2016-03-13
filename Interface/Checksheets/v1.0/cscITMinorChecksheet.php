<!--
*	File: 			cscITMinorChecksheet.php
*	Created:		02/21/2016
*	Author:			Micheal Para
*	Organization:	Kutztown University CSC 355 Spring
*	Purpose:		This php file creates a skeleton course minor checksheet
*					as visually close as possible to an official checksheet.
*					This file will be used by the database and business logic
*					teams to test inserting classes into a checksheet.
-->
<?php
?>
<!DOCTYPE html>
<html>
	<head>
	<title> BS Computer Science: IT Minor Checksheet</title>
	</head>
	<link rel = "stylesheet" type = "text/css" href = "Styles/checksheetStyleV1p0.css"/>
	<body>
<!----- HEADER -->
	<div class = "header">Compter Science Minor in Information Technology</div>
<!-----Table 1 -->
	<div class = "section1">
	  <table>
	    <tr>
	      <th>Minor Program: 21sh</th>
	    </tr>
	    <tr>
	      <td>1. Required Courses - 15sh</td>
	       <td>Gr</td>
	       <td>SH</td>
	    </tr>
	    <tr>
	      <td>CSC125 Discrete Math for Computing I</td>
	      <?php
	        echo"
	      <td class = 'tableGrade'><b></b></th>
	      <td class = 'tableGrade'><b></b></th>"
	      ?>
	    </tr>
       <tr>
        <td>CSC130 IT Fnamentals</td>
        <?php
					echo"
				<td class = 'tableGrade'><b></b></th>
				<td class = 'tableGrade'><b></b></th>"
			 	?>
			 </tr>
        <tr>
	        <td>CSC135 Compter Science I</td>
			    <?php
					echo"
					<td class = 'tableGrade'><b></b></th>
					<td class = 'tableGrade'><b></b></th>"
			  	?>
			  </tr>
			  <tr>
			    <td>CSC136 Computer Science II</td>
			    <?php
					echo"
					<td class = 'tableGrade'><b></b></th>
					<td class = 'tableGrade'><b></b></th>"
			  	?>
			  </tr>
			  <tr>
			  	<td>CSC253 IT Systems</td>
			  	<?php
					echo"
					<td class = 'tableGrade'><b></b></th>
					<td class = 'tableGrade'><b></b></th>"
			  	?>
			  </tr>
			  <tr>
			  	<th>2. Elective Course - 3sh</th>
			  	<td>Gr</td>
			  	<td>SH</td>
			  </tr>
			  <tr>
			   <td>Any 200-level or higher CSC course</td>
			   <?php
					echo"
			   <td class = 'tableGrade'><b></b></th>
		     <td class = 'tableGrade'><b></b></th>"
			    ?>
			  </tr>
			 	<tr>
			  	<th>3. Elective Course - 3sh</th>
			  	<td>Gr</td>
			    <td>SH</td>
			  </tr>
			  <tr>
			  	<td>Any 300-level or higher CSC course</td>
			  	<?php
					echo"
					<td class = 'tableGrade'><b></b></th>
					<td class = 'tableGrade'><b></b></th>"
			  	?>
			  	</tr>
	    </table>
	  </div>
	 <div class ="section1">
	   <table>
	     <tr>
	       <th>Total Semester Hours</th>
	     </tr>
	    <tr>
	       <td>Required Courses</td>
	       <td>15</td>
	    </tr>
	    <tr>
	       <td>Elective Courses</td>
	       <td>6</td>
	    </tr>
	    <tr>
	       <td>TOTAL</td>
	       <td>21</td>
	     </tr>
	   </table>
	 <table>
	   <tr>
	     <th>Information Technology Minor</th>
	   </tr>
	   <tr>
	     <td>Program: ULASCISIT2</td>
	   </tr>
	   <tr>
	     <td>Version #2118</td>
	   </tr>
	   <tr>
	     <td>Effective Date: Fall 2011, revised Fall 2011</td>
	   </tr>
	   <tr>
	     <td> Approved</td>
	   </tr>
	 </table>
	 </div>
	 <div class = "newSection">
			<div class = "notes2">
				**If you are considering a MS in Information Technology yoshould take one of the following: CSC311, CSC341, or CSC352
			</div>
		</div>
	    
	</body>
</html>