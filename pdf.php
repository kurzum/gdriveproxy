<?php

$doc = $_GET["doc"];
$debug = $_GET["debug"];

//$doc="https://docs.google.com/document/d/1V3UwB5cubk_4VkvGMyKv4bMN2e47g7_g6TQ5GRE6XTg/edit";

//strip the beginning
$id = str_replace("https://docs.google.com/document/d/", "" , 
		str_replace("https://docs.google.com/spreadsheets/d/", "", 
			$doc));
$pieces = explode("/", $id);

$id = $pieces[0]; // google id

$doc = "http://docs.google.com/document/export?format=pdf&id=" . $id;

if(isset( $_GET["debug"]) &&  $_GET["debug"] == 1){
die("<xmp>doc=\"$doc\"\nid=\"$id\"\n");
}

//print $doc;

$fp = fopen($doc, 'r');

header("Content-Type: application/pdf");
header("Content-Length: " . filesize($name));
header("Content-Disposition: attachment; filename= doc.pdf");

// dump the picture and stop the script
fpassthru($fp);

exit;



?>
