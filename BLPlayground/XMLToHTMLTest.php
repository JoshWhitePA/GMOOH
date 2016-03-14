<?php

// Load XML file
include("../PHPClasses/buildXML.class.php");
$xmlB = new XMLBuilder();
$genXML = $xmlB -> buildFullSheet(1);
$genXML = str_replace("\t", '', $genXML); // remove tabs
$genXML = str_replace("\n", '', $genXML); // remove new lines
$genXML = str_replace("\r", '', $genXML); // remove carriage returns
$genXML = preg_replace('/[\xF0-\xF7].../s', '', $genXML);
$retVal = "";
$genXML = iconv("UTF-8","UTF-8//IGNORE",$genXML);
#echo $genXML;
//$retVal=shell_exec("python Transform.py '" . $genXML . "'");
//print $retVal;
//print $retVal2;

//echo shell_exec("ls -al");
//echo "hi";
//echo $genXML;

$xml_doc = new DOMDocument();
$xml_doc->loadXML($genXML);


$xsl_doc = new DOMDocument();
$xsl_doc->load("Checksheet.xsl");


$proc = new XSLTProcessor();
$proc->importStylesheet($xsl_doc);
$newdom = $proc->transformToDoc($xml_doc);

print $newdom->saveXML();
?>
