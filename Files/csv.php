<?php
$xmlDoc=new DOMDocument();
$xmlDoc->load("registracija.xml");

$x=$xmlDoc->getElementsByTagName('Korisnik');
file_put_contents('CSVIzvjestaj.csv',"Korisnicka imena i njihovi spolovi su:\n",FILE_APPEND);
for($i=0; $i<($x->length); $i++)
{
  $y=$x->item($i)->getElementsByTagName('korisnickoIme');
  $z=$x->item($i)->getElementsByTagName('spol');
  if ($y->item(0)->nodeType==1 && $z->item(0)->nodeType==1) {
    $ime = $y->item(0)->childNodes->item(0)->nodeValue;
    if ($z->item(0)->childNodes->item(0)->nodeValue == "muški") {
      $spol = "muski";
    }
    else {
      $spol = "zenski";
    }
    file_put_contents('CSVIzvjestaj.csv',(string)$ime.','.(string)$spol."\n",FILE_APPEND);
  }
}

	$file = "CSVIzvjestaj.csv";
	// Quick check to verify that the file exists
	if( !file_exists($file) ) die("File not found");
	// Force the download
	header("Content-Disposition: attachment; filename=".basename($file)." ");
	header("Content-Length: " . filesize($file));
	header("Content-Type: application/octet-stream;");
	readfile($file);
	unlink($file);
 ?>
