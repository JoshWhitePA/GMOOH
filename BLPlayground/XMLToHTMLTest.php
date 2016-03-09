<?php
// Load XML file
include("../PHPClasses/buildXML.class.php");
$xmlB = new XMLBuilder();
$genXML = $xmlB -> buildGenEd();
//echo $genXML;
$x2 = file_get_contents("genEdXMLTest.xml");
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
