<?php
session_start();
foreach ($_SESSION as $key=>$val){
    echo $key." ".$val."<br/>";
}
session_destroy();
header('location: login.php');
?>