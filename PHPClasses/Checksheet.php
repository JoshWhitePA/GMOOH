<?php
require('ChkDisp.php');

$testID = "CSC355";
$testDesc = "SoftEngine";
$testGrade = "A";
$creditHour = "3";


 ?>



 <!DOCTYPE html>
<html>
<head>

</head>
<body>
<table>
  <?php
    echo function displayRow($testID,$testDesc,$testGrade);
   ?>
</table>
</body>
</html>
