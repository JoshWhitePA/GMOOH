<?php
// Load XML file
include("../PHPClasses/buildXML.class.php");
$xmlB = new XMLBuilder();

$genXML = $xmlB -> buildFullSheet(1);
//echo $genXML;

$xml_doc = new DOMDocument();
$xml_doc->loadXML($genXML);

// XSL
$xsl_doc = new DOMDocument();
$xsl_doc->load("Checksheet.xsl");

// Proc
$proc = new XSLTProcessor();
$proc->importStylesheet($xsl_doc);
$newdom = $proc->transformToDoc($xml_doc);

print $newdom->saveXML();
?>
