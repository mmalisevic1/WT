<?php
$xmlDoc=new DOMDocument();
$xmlDoc->load("registracija.xml");

$x=$xmlDoc->getElementsByTagName('Korisnik');

//get the q parameter from URL
$q=$_GET["q"];

//Potrazi sve Korisnike iz xml fajla ako je duzina od q, q>0
if (strlen($q)>0) {
  $hint="";
  for($i=0; $i<($x->length); $i++) {
    $y=$x->item($i)->getElementsByTagName('korisnickoIme');
    $z=$x->item($i)->getElementsByTagName('spol');
    if ($y->item(0)->nodeType==1 && $z->item(0)->nodeType==1) {
      //find a link matching the search text
      if (stristr($y->item(0)->childNodes->item(0)->nodeValue,$q) || stristr($z->item(0)->childNodes->item(0)->nodeValue,$q)) {
        if ($hint=="") {
          $hint="korisničko ime: " .
          $y->item(0)->childNodes->item(0)->nodeValue .
          " spol: " .
          $z->item(0)->childNodes->item(0)->nodeValue . "";
        } else {
          $hint=$hint . "<br />korisničko ime: " .
          $y->item(0)->childNodes->item(0)->nodeValue .
          " spol: " .
          $z->item(0)->childNodes->item(0)->nodeValue . "";
        }
      }
    }
  }
}

// Set output to "no suggestion" if no hint was found
// or to the correct values
if ($hint=="") {
  $response="no suggestion";
} else {
  $response=$hint;
}

//output the response
echo $response;
?>
