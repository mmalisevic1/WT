<?php
  try {
    $conn = new PDO("mysql:host=localhost;dbname=wtspirala4", "admin", "pass");
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->exec("set names utf8");

    if (isset($_POST['novineButton'])) {
      $novineXMLfile = "novine.xml";
      $postojiN = file_exists($novineXMLfile);
      if ($postojiN == true) {
        $novineInfo = simplexml_load_file($novineXMLfile);
        /*foreach ($novineInfo->Adresa as $adrs) {
          echo $adrs;
        }*/
        foreach ($novineInfo->Adresa as $adrs) {

          $upit = $conn->query("SELECT COUNT(*) FROM `zadatak2` WHERE `email` LIKE '$adrs'");
          $kolona = $upit->fetchColumn();
          if ($kolona == 0) {
            $rezultat = $conn->query("INSERT INTO `zadatak2` (`id`, `email`) VALUES (NULL, '$adrs');");
            if (!$rezultat) {
              $greska = $veza->errorInfo();
              print $greska;
              exit();
            }
          }
        }
      }
    }
  }
  catch(PDOException $e)
  {
      echo "Konekcija nije uspjela: " . $e->getMessage();
  }
?>
