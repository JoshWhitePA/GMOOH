<?php

// Load XML file
//$doc = new DOMDocument();
//$doc->load('../../../../BLPlayground/StudentData.xml');
// $doc->saveXML();


$xml_doc = new DOMDocument();
$xml_doc->load("../../../../BLPlayground/StudentData.xml");


$xsl_doc = new DOMDocument();
$xsl_doc->load("ChecksheetProto.xsl");


$proc = new XSLTProcessor();
$proc->importStylesheet($xsl_doc);
$newdom = $proc->transformToDoc($xml_doc);

print $newdom->saveXML();
?>
