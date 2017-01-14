<?php

  session_start();

  if(isset($_SESSION['uname'])){
		$username = $_SESSION['uname'];
	}
  else {
    session_unset();
    session_destroy();
  }
	if(isset($_REQUEST['login'])){
		if(isset($_REQUEST['psw'])){
			if($_REQUEST['uname'] === "admin" && $_REQUEST['psw'] === "pass")
			{
        if (session_status() == PHP_SESSION_NONE) {
          session_start();
        }

				$username=$_REQUEST['uname'];
				$_SESSION['uname']= $username;
        $_SESSION['stanje'] = "mijenjanje";

			}
			else {
				//session_unset();
        //session_destroy();
				$username="";
			}
		}

	}

  // IZMJENE 4
  // xml fajl koji sadrzi username i password admina
  /*$adminXMLfile = "admin.xml";
  $postoji = file_exists($adminXMLfile);
  if($postoji == FALSE){
     $adminInfo = new SimpleXMLElement("<?xml version=\"1.0\" encoding=\"utf-8\" ?><Admin></Admin>");
     $adminInfo->addChild('username',"admin");
     $adminInfo->addChild('password',"pass");
     $adminInfo->asXML($adminXMLfile);
   }
   else {
     $adminInfo = simplexml_load_file($adminXMLfile);
   }*/

   try {
     $conn = new PDO("mysql:host=localhost;dbname=wtspirala4", "admin", "pass");
     // set the PDO error mode to exception
     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $conn->exec("set names utf8");

     $upit = $conn->query("SELECT COUNT(*) FROM `administracija`");
     $kolona = $upit->fetchColumn();
     if ($kolona == 0) {
       $rezultat = $conn->query("INSERT INTO `administracija` (`username`, `password`) VALUES ('admin', 'pass');");
       if (!$rezultat) {
         $greska = $veza->errorInfo();
         print $greska;
         exit();
       }
     }
   }
   catch(PDOException $e)
   {
       echo "Konekcija nije uspjela: " . $e->getMessage();
   }

   // IZMJENE 4
   // XML fajl koji sadrzi sve sto treba za prvi zadatak (tuga golema)
   // to je znaci XML verzija mog clanka koji se treba serijlizirati
   /*$clanakXMLfile = "clanak.xml";
   $postoji = file_exists($clanakXMLfile);
   if($postoji == FALSE){
      $clanakInfo = new SimpleXMLElement("<?xml version=\"1.0\" encoding=\"utf-8\" ?><Clanak>
  <naslov>Dokumentarac BBC-a \"Planet Earth\"</naslov>
  <slike>
    <slika>img1.jpg</slika>
    <slika>img2.jpg</slika>
    <slika>img3.jpg</slika>
  </slike>
  <opis>
    Aenean ut vehicula nulla. Proin eu tincidunt purus. Vivamus in feugiat neque. Duis convallis orci sapien, id pretium ante consectetur vel. Vestibulum ultricies eget metus faucibus bibendum. Sed feugiat, turpis at molestie tincidunt, lorem arcu vehicula nunc, et lobortis tellus mi mattis nibh. Duis volutpat placerat ligula vitae aliquet. Nulla ut arcu dapibus, volutpat purus sit amet, tincidunt magna. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ut felis eget dolor feugiat faucibus. Aenean malesuada mi vitae pharetra porta. Aliquam in rutrum dui. Phasellus laoreet nisi vel blandit facilisis. Praesent ac massa eget est tincidunt sollicitudin.
    Integer commodo enim in massa vulputate egestas. Vestibulum consectetur arcu auctor, porttitor urna ac, viverra turpis. Mauris bibendum massa in condimentum consectetur. Mauris ac faucibus justo, ut hendrerit justo. Integer suscipit euismod sodales. Maecenas eu lobortis orci. Donec aliquam vehicula auctor. Vivamus ligula tortor, scelerisque eget nisi at, condimentum scelerisque nibh. Duis consectetur sollicitudin felis vitae finibus. Phasellus a ex id massa volutpat auctor sit amet quis nunc. Phasellus condimentum, orci et faucibus interdum, dolor nisi placerat arcu, at malesuada nunc est nec ante. Aliquam pharetra vitae tortor ut vulputate.
  </opis>
</Clanak>");
      $clanakInfo->asXML($clanakXMLfile);
    }
    else {
      $clanakInfo = simplexml_load_file($clanakXMLfile);
    }*/

    try {
      $conn = new PDO("mysql:host=localhost;dbname=wtspirala4", "admin", "pass");
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $conn->exec("set names utf8");

      $upit = $conn->query("SELECT COUNT(*) FROM `clanak`");
      $kolona = $upit->fetchColumn();
      if ($kolona == 0) {
        $nasl = 'Dokumentarac BBC-a \"Planet Earth\"';
        $sl1 = 'img1.jpg';
        $sl2 = 'img2.jpg';
        $sl3 = 'img3.jpg';
        $txt = 'Aenean ut vehicula nulla. Proin eu tincidunt purus. Vivamus in feugiat neque. Duis convallis orci sapien, id pretium ante consectetur vel. Vestibulum ultricies eget metus faucibus bibendum. Sed feugiat, turpis at molestie tincidunt, lorem arcu vehicula nunc, et lobortis tellus mi mattis nibh. Duis volutpat placerat ligula vitae aliquet. Nulla ut arcu dapibus, volutpat purus sit amet, tincidunt magna. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ut felis eget dolor feugiat faucibus. Aenean malesuada mi vitae pharetra porta. Aliquam in rutrum dui. Phasellus laoreet nisi vel blandit facilisis. Praesent ac massa eget est tincidunt sollicitudin.
        Integer commodo enim in massa vulputate egestas. Vestibulum consectetur arcu auctor, porttitor urna ac, viverra turpis. Mauris bibendum massa in condimentum consectetur. Mauris ac faucibus justo, ut hendrerit justo. Integer suscipit euismod sodales. Maecenas eu lobortis orci. Donec aliquam vehicula auctor. Vivamus ligula tortor, scelerisque eget nisi at, condimentum scelerisque nibh. Duis consectetur sollicitudin felis vitae finibus. Phasellus a ex id massa volutpat auctor sit amet quis nunc. Phasellus condimentum, orci et faucibus interdum, dolor nisi placerat arcu, at malesuada nunc est nec ante. Aliquam pharetra vitae tortor ut vulputate.';
        $dt = date("Y-m-d h:i:s");
        $rezultat = $conn->query("INSERT INTO `clanak` (`id`, `naslov`, `slika1`, `slika2`, `slika3`, `tekst`, `vrijeme`) VALUES (NULL, '$nasl', '$sl1', '$sl2', '$sl3', '$txt', '$dt');");
        if (!$rezultat) {
          $greska = $veza->errorInfo();
          print $greska;
          exit();
        }
      }
    }
    catch(PDOException $e)
    {
        echo "Konekcija nije uspjela: " . $e->getMessage();
    }


    /*if (isset($_POST['spasiNaslov'])) {
      //echo $_POST['unosNaslov'];
      $clanakInfo->naslov = $_POST['unosNaslov'];
      //echo $promjenaXML->naslov;
      $clanakInfo->asXML($clanakXMLfile);
      //echo $promjenaXML->naslov;
    }*/

    /*if (isset($_POST['spasiNaslov'])) {
      try {
        $conn = new PDO("mysql:host=localhost;dbname=wtspirala4", "admin", "pass");
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->exec("set names utf8");

        $stmt = $conn->prepare("SELECT * FROM clanak ORDER BY id DESC LIMIT 1");
        $stmt->execute();
        $rjesenje = $stmt->fetch(PDO::FETCH_ASSOC);
        $broj = $rjesenje['id'] + 1;
        //echo $broj;
        $sql = "UPDATE clanak SET naslov='".$_POST['unosNaslov']."' WHERE id=".$broj."";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
      }
      catch(PDOException $e)
      {
          echo "Konekcija nije uspjela: " . $e->getMessage();
      }
    }*/


    /*if (isset($_POST['spasiOpis'])) {
      //echo $_POST['unosNaslov'];
      $clanakInfo->opis = $_POST['unosOpis'];
      //echo $promjenaXML->naslov;
      $clanakInfo->asXML($clanakXMLfile);
      //echo $promjenaXML->naslov;
    }

    if (isset($_POST['izbrisiNaslov'])) {
      //echo $_POST['unosNaslov'];
      $clanakInfo->naslov = "";
      //echo $promjenaXML->naslov;
      $clanakInfo->asXML($clanakXMLfile);
      //echo $promjenaXML->naslov;
    }

    if (isset($_POST['izbrisiOpis'])) {
      //echo $_POST['unosNaslov'];
      $clanakInfo->opis = "";
      //echo $promjenaXML->naslov;
      $clanakInfo->asXML($clanakXMLfile);
      //echo $promjenaXML->naslov;
    }

    if (isset($_POST['izbrisi1'])) {
      //echo $_POST['unosNaslov'];
      $clanakInfo->slike->slika[0] = "imgno.jpg";
      //echo $promjenaXML->naslov;
      $clanakInfo->asXML($clanakXMLfile);
      //echo $promjenaXML->naslov;
    }

    if (isset($_POST['izbrisi2'])) {
      //echo $_POST['unosNaslov'];
      $clanakInfo->slike->slika[1] = "imgno.jpg";
      //echo $promjenaXML->naslov;
      $clanakInfo->asXML($clanakXMLfile);
      //echo $promjenaXML->naslov;
    }

    if (isset($_POST['izbrisi3'])) {
      //echo $_POST['unosNaslov'];
      $clanakInfo->slike->slika[2] = "imgno.jpg";
      //echo $promjenaXML->naslov;
      $clanakInfo->asXML($clanakXMLfile);
      //echo $promjenaXML->naslov;
    }

    if (isset($_POST['submit'])) {
      if (isset($_POST['brojSlike']) && $_POST['brojSlike'] == "1") {
        //echo "usaoGdjeTReba";
        $clanakInfo->slike->slika[0] = $_POST['submit'];
        $clanakInfo->asXML($clanakXMLfile);
      }

    }

    if (isset($_POST['submit'])) {
      if (isset($_POST['brojSlike']) && $_POST['brojSlike'] == "2") {
        //echo "usaoGdjeTReba";
        $clanakInfo->slike->slika[1] = $_POST['submit'];
        $clanakInfo->asXML($clanakXMLfile);
      }

    }

    if (isset($_POST['submit'])) {
      if (isset($_POST['brojSlike']) && $_POST['brojSlike'] == "3") {
        //echo "usaoGdjeTReba";
        $clanakInfo->slike->slika[2] = $_POST['submit'];
        $clanakInfo->asXML($clanakXMLfile);
      }

    }*/


    // logout admina
    if( isset($_GET['subject']) && isset($_SESSION['uname'])) {
        if($_GET['subject'] == "logout"){
          session_unset();
          session_destroy();
          $username="";
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>wtInfo</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="clanak.css">
  <script src="clanak.js"></script>
</head>
<header>
  <section class="navigation">
  <div class="nav-container">
    <div class="brand">
      <a href="index.php">wtInfo</a>
    </div>
    <nav>
      <div class="nav-mobile"><a id="nav-toggle" href="#!" onclick="prikaziMeni('bleh');">
        <script type="text/javascript">
        function prikaziMeni(id) {
          var e = document.getElementById(id);
          if (e.style.display == 'block' || e.style.display=='')
          {
            e.style.display = 'none';
          }
          else
          {
            e.style.display = 'block';
          }
        }
        </script>
        <span></span></a></div>
      <ul class="nav-list" id="bleh">
        <li>
          <div>
            <div class="kocka vijesti"></div>
            <a href="index.php">Vijest</a>
          </div>
          <ul class="nav-dropdown">
            <li>
              <a href="#!">Web Design</a>
            </li>
            <li>
              <a href="#!">Web Development</a>
            </li>
            <li>
              <a href="#!">Graphic Design</a>
            </li>
          </ul>
        </li>
        <li>
          <div class="kocka lifestyle"></div>
          <a href="oNama.html">O nama</a>
        </li>
        <li>
          <div class="kocka magazin"></div>
          <a href="kontakt.html">Kontakt</a>
        </li>
        <li>
          <div class="kocka sport"></div>
          <a href="registracija.php">Registracija</a>
        </li>
        <li>
          <div class="kocka biznis"></div>
          <a href="prijava.php">Prijava</a>
        </li>
        <li>
          <div>
            <div class="kocka vise"></div>
            <a href="feedback.php">Feedback</a>
          </div>

          <ul class="nav-dropdown">
            <li>
              <a href="#!">Web Design</a>
            </li>
            <li>
              <a href="#!">Web Development</a>
            </li>
            <li>
              <a href="#!">Graphic Design</a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
  </div>
</section>
</header>
<body onload="showSlides(1)">

  <div class="red">
    <div class="kolona margina"></div>
    <?php  if(isset($_SESSION['stanje']) && $_SESSION['stanje'] === "mijenjanje"):  ?>
      <div class="kolona sadrzaj">
        <?php
          //echo simplexml_load_file($clanakXMLfile)->naslov;
          //$clanakInfo = simplexml_load_file($clanakXMLfile);

          try {
            $conn = new PDO("mysql:host=localhost;dbname=wtspirala4", "admin", "pass");
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conn->exec("set names utf8");

            $stmt = $conn->prepare("SELECT naslov FROM clanak ORDER BY id DESC LIMIT 1");
            $stmt->execute();
            foreach ($stmt->fetch() as $naslov) {
              //echo $naslov;
              echo '<form method="post" action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'"><input style="margin:0 auto" type="text" name="unosNaslov" value="'.htmlspecialchars($naslov).'">';
              break;
            }

            if (isset($_POST['spasiNaslov'])) {
              /*$promjenaXML = simplexml_load_file($clanakXMLfile);
              //echo $_POST['unosNaslov'];
              $promjenaXML->naslov = $_POST['unosNaslov'];
              //echo $promjenaXML->naslov;
              $promjenaXML->asXML($clanakXMLfile);
              //echo $promjenaXML->naslov;*/

              $conn = new PDO("mysql:host=localhost;dbname=wtspirala4", "admin", "pass");
              // set the PDO error mode to exception
              $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              $conn->exec("set names utf8");

              $stmt = $conn->prepare("SELECT * FROM clanak ORDER BY id DESC LIMIT 1");
              $stmt->execute();
              $rjesenje = $stmt->fetch(PDO::FETCH_ASSOC);

              $stmt = $conn->prepare("INSERT INTO clanak (naslov, slika1, slika2, slika3, tekst, vrijeme) VALUES (:naslov, :slika1, :slika2, :slika3, :tekst, :vrijeme)");
              $stmt->bindParam(':naslov', $naslov);
              $stmt->bindParam(':slika1', $rjesenje['slika1']);
              $stmt->bindParam(':slika2', $rjesenje['slika2']);
              $stmt->bindParam(':slika3', $rjesenje['slika3']);
              $stmt->bindParam(':tekst', $rjesenje['tekst']);
              $stmt->bindParam(':vrijeme', $vr);

              // insert a row
              $naslov = $_POST['unosNaslov'];
              $vr = date("Y-m-d h:i:s");
              $stmt->execute();
            }

            if (isset($_POST['izbrisiNaslov'])) {
              /*$promjenaXML = simplexml_load_file($clanakXMLfile);
              //echo $_POST['unosNaslov'];
              $promjenaXML->naslov = "";
              //echo $promjenaXML->naslov;
              $promjenaXML->asXML($clanakXMLfile);
              //echo $promjenaXML->naslov;*/
              $conn = new PDO("mysql:host=localhost;dbname=wtspirala4", "admin", "pass");
              // set the PDO error mode to exception
              $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              $conn->exec("set names utf8");

              $stmt = $conn->prepare("SELECT * FROM clanak ORDER BY id DESC LIMIT 1");
              $stmt->execute();
              $rjesenje = $stmt->fetch(PDO::FETCH_ASSOC);

              $stmt = $conn->prepare("INSERT INTO clanak (naslov, slika1, slika2, slika3, tekst, vrijeme) VALUES (:naslov, :slika1, :slika2, :slika3, :tekst, :vrijeme)");
              $stmt->bindParam(':naslov', $naslov);
              $stmt->bindParam(':slika1', $rjesenje['slika1']);
              $stmt->bindParam(':slika2', $rjesenje['slika2']);
              $stmt->bindParam(':slika3', $rjesenje['slika3']);
              $stmt->bindParam(':tekst', $rjesenje['tekst']);
              $stmt->bindParam(':vrijeme', $vr);

              // insert a row
              $naslov = "";
              $vr = date("Y-m-d h:i:s");
              $stmt->execute();
            }

          }
          catch(PDOException $e)
          {
              echo "Konekcija nije uspjela: " . $e->getMessage();
          }
        ?>
      </div>
      <div class="kolona margina">
          <?php
            echo '<input type="submit" value="Spasi" name="spasiNaslov" style="width:100%;">
            <input type="submit" value="Izbriši" name="izbrisiNaslov" style="width:100%;"></form>';
          ?>
      </div>
    <?php else: ?>
    <div class="kolona sadrzaj">
      <h3>
        <?php
          try {
            $conn = new PDO("mysql:host=localhost;dbname=wtspirala4", "admin", "pass");
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conn->exec("set names utf8");

            $stmt = $conn->prepare("SELECT naslov FROM clanak ORDER BY id DESC LIMIT 1");
            $stmt->execute();
            foreach ($stmt->fetch() as $naslov) {
            //echo $naslov;
            echo htmlspecialchars($naslov);
            break;
            }
          }
          catch(PDOException $e)
          {
              echo "Konekcija nije uspjela: " . $e->getMessage();
          }
        ?>
      </h3>
    </div>
    <div class="kolona margina"></div>
    <?php endif; ?>
  </div>
  <div class="red">
    <div class="kolona margina"></div>
    <div class="kolona sadrzaj">

    </div>
    <div class="kolona margina"></div>
  </div>
  <div class="red">

  <div class="kolona margina"></div>
    <div class="kolona sadrzaj">
      <div class="carousel-container">
        <div class="mojeSlike fade">
          <div class="brojText">1 / 3</div>
          <?php
          $sl1 = "";
          try {
            $conn = new PDO("mysql:host=localhost;dbname=wtspirala4", "admin", "pass");
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conn->exec("set names utf8");

            $stmt = $conn->prepare("SELECT slika1 FROM clanak ORDER BY id DESC LIMIT 1");
            $stmt->execute();
            foreach ($stmt->fetch() as $slika1) {
            //echo $naslov;
            $sl1 =  $slika1;
            break;
            }
          }
          catch(PDOException $e)
          {
              echo "Konekcija nije uspjela: " . $e->getMessage();
          }
            echo "<img src='../Images/" .
            $sl1
            ."' style='width:100%' >"
          ?>

        </div>

        <div class="mojeSlike fade">
          <div class="brojText">2 / 3</div>
          <?php
          $sl2 = "";
          try {
            $conn = new PDO("mysql:host=localhost;dbname=wtspirala4", "admin", "pass");
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conn->exec("set names utf8");

            $stmt = $conn->prepare("SELECT slika2 FROM clanak ORDER BY id DESC LIMIT 1");
            $stmt->execute();
            foreach ($stmt->fetch() as $slika2) {
            //echo $naslov;
            $sl2 =  $slika2;
            break;
            }
          }
          catch(PDOException $e)
          {
              echo "Konekcija nije uspjela: " . $e->getMessage();
          }
            echo "<img src='../Images/" .
            $sl2
            ."' style='width:100%' >"
          ?>
        </div>

        <div class="mojeSlike fade">
          <div class="brojText">3 / 3</div>
          <?php
          $sl3 = "";
          try {
            $conn = new PDO("mysql:host=localhost;dbname=wtspirala4", "admin", "pass");
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conn->exec("set names utf8");

            $stmt = $conn->prepare("SELECT slika3 FROM clanak ORDER BY id DESC LIMIT 1");
            $stmt->execute();
            foreach ($stmt->fetch() as $slika3) {
            //echo $naslov;
            $sl3 =  $slika3;
            break;
            }
          }
          catch(PDOException $e)
          {
              echo "Konekcija nije uspjela: " . $e->getMessage();
          }
            echo "<img src='../Images/" .
            $sl3
            ."' style='width:100%' >"
          ?>
        </div>

        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
      </div>
      <br>

      <div style="text-align:center">
        <span class="tacka" onclick="currentSlide(1)"></span>
        <span class="tacka" onclick="currentSlide(2)"></span>
        <span class="tacka" onclick="currentSlide(3)"></span>
      </div>
    </div>
    <div class="kolona margina"></div>
  </div>
  <div class="red">
    <div class="kolona margina"></div>

    <?php  if(isset($_SESSION['stanje']) && $_SESSION['stanje'] === "mijenjanje"):  ?>
      <div class="kolona sadrzaj">
        <div id="id02" class="modal">
          <?php require('upload.php'); ?>
        </div>
        <button onclick="document.getElementById('id02').style.display='block'">Izmijeni slike</button>
        <h5>Slika 1</h5>


          <?php
            echo '<form action="index.php" method="post" style="display:inline-block">
            <input type="submit" value="Izbriši" name="izbrisi1"></form>';

            if (isset($_POST['brojSlike']) && $_POST['brojSlike'] == "1" && isset($_REQUEST['submit'])) {
              /*$promjenaXML = simplexml_load_file($clanakXMLfile);
              $promjenaXML->slike->slika[0] = $_POST['submit'];
              $promjenaXML->asXML($clanakXMLfile);*/

              try {
                $conn = new PDO("mysql:host=localhost;dbname=wtspirala4", "admin", "pass");
                // set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $conn->exec("set names utf8");

                $stmt = $conn->prepare("SELECT * FROM clanak ORDER BY id DESC LIMIT 1");
                $stmt->execute();
                $rjesenje = $stmt->fetch(PDO::FETCH_ASSOC);

                $stmt = $conn->prepare("INSERT INTO clanak (naslov, slika1, slika2, slika3, tekst, vrijeme) VALUES (:naslov, :slika1, :slika2, :slika3, :tekst, :vrijeme)");
                $stmt->bindParam(':naslov', $rjesenje['naslov']);
                $stmt->bindParam(':slika1', $sl1);
                $stmt->bindParam(':slika2', $rjesenje['slika2']);
                $stmt->bindParam(':slika3', $rjesenje['slika3']);
                $stmt->bindParam(':tekst', $rjesenje['tekst']);
                $stmt->bindParam(':vrijeme', $vr);

                // insert a row
                $sl1 = $_POST['submit'];
                $vr = date("Y-m-d h:i:s");
                $stmt->execute();
              }
              catch(PDOException $e)
              {
                  echo "Konekcija nije uspjela: " . $e->getMessage();
              }
            }

            if (isset($_POST['izbrisi1'])) {
              /*$promjenaXML = simplexml_load_file($clanakXMLfile);
              $promjenaXML->slike->slika[0] = "imgno.jpg";
              $promjenaXML->asXML($clanakXMLfile);*/

              try {
                $conn = new PDO("mysql:host=localhost;dbname=wtspirala4", "admin", "pass");
                // set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $conn->exec("set names utf8");

                $stmt = $conn->prepare("SELECT * FROM clanak ORDER BY id DESC LIMIT 1");
                $stmt->execute();
                $rjesenje = $stmt->fetch(PDO::FETCH_ASSOC);

                $stmt = $conn->prepare("INSERT INTO clanak (naslov, slika1, slika2, slika3, tekst, vrijeme) VALUES (:naslov, :slika1, :slika2, :slika3, :tekst, :vrijeme)");
                $stmt->bindParam(':naslov', $rjesenje['naslov']);
                $stmt->bindParam(':slika1', $sl1);
                $stmt->bindParam(':slika2', $rjesenje['slika2']);
                $stmt->bindParam(':slika3', $rjesenje['slika3']);
                $stmt->bindParam(':tekst', $rjesenje['tekst']);
                $stmt->bindParam(':vrijeme', $vr);

                // insert a row
                $sl1 = "imgno.jpg";
                $vr = date("Y-m-d h:i:s");
                $stmt->execute();
              }
              catch(PDOException $e)
              {
                  echo "Konekcija nije uspjela: " . $e->getMessage();
              }
            }
          ?>
          <h5>Slika 2</h5>
        <?php
          echo '<form action="index.php" method="post" style="display:inline-block">
          <input type="submit" value="Izbriši" name="izbrisi2"></form>';

          if (isset($_POST['brojSlike']) && $_POST['brojSlike'] == "2" && isset($_REQUEST['submit'])) {
            /*$promjenaXML = simplexml_load_file($clanakXMLfile);
            $promjenaXML->slike->slika[1] = $_POST['submit'];
            $promjenaXML->asXML($clanakXMLfile);*/

            try {
              $conn = new PDO("mysql:host=localhost;dbname=wtspirala4", "admin", "pass");
              // set the PDO error mode to exception
              $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              $conn->exec("set names utf8");

              $stmt = $conn->prepare("SELECT * FROM clanak ORDER BY id DESC LIMIT 1");
              $stmt->execute();
              $rjesenje = $stmt->fetch(PDO::FETCH_ASSOC);

              $stmt = $conn->prepare("INSERT INTO clanak (naslov, slika1, slika2, slika3, tekst, vrijeme) VALUES (:naslov, :slika1, :slika2, :slika3, :tekst, :vrijeme)");
              $stmt->bindParam(':naslov', $rjesenje['naslov']);
              $stmt->bindParam(':slika1', $rjesenje['slika1']);
              $stmt->bindParam(':slika2', $sl2);
              $stmt->bindParam(':slika3', $rjesenje['slika3']);
              $stmt->bindParam(':tekst', $rjesenje['tekst']);
              $stmt->bindParam(':vrijeme', $vr);

              // insert a row
              $sl2 = $_POST['submit'];
              $vr = date("Y-m-d h:i:s");
              $stmt->execute();
            }
            catch(PDOException $e)
            {
                echo "Konekcija nije uspjela: " . $e->getMessage();
            }
          }

          if (isset($_POST['izbrisi2'])) {
            /*$promjenaXML = simplexml_load_file($clanakXMLfile);
            $promjenaXML->slike->slika[1] = "imgno.jpg";
            $promjenaXML->asXML($clanakXMLfile);*/

            try {
              $conn = new PDO("mysql:host=localhost;dbname=wtspirala4", "admin", "pass");
              // set the PDO error mode to exception
              $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              $conn->exec("set names utf8");

              $stmt = $conn->prepare("SELECT * FROM clanak ORDER BY id DESC LIMIT 1");
              $stmt->execute();
              $rjesenje = $stmt->fetch(PDO::FETCH_ASSOC);

              $stmt = $conn->prepare("INSERT INTO clanak (naslov, slika1, slika2, slika3, tekst, vrijeme) VALUES (:naslov, :slika1, :slika2, :slika3, :tekst, :vrijeme)");
              $stmt->bindParam(':naslov', $rjesenje['naslov']);
              $stmt->bindParam(':slika1', $rjesenje['slika1']);
              $stmt->bindParam(':slika2', $sl2);
              $stmt->bindParam(':slika3', $rjesenje['slika3']);
              $stmt->bindParam(':tekst', $rjesenje['tekst']);
              $stmt->bindParam(':vrijeme', $vr);

              // insert a row
              $sl1 = "imgno.jpg";
              $vr = date("Y-m-d h:i:s");
              $stmt->execute();
            }
            catch(PDOException $e)
            {
                echo "Konekcija nije uspjela: " . $e->getMessage();
            }
          }
        ?>
        <h5>Slika 3</h5>
        <?php
          echo '<form action="index.php" method="post" style="display:inline-block">
          <input type="submit" value="Izbriši" name="izbrisi3"></form>';

          if (isset($_POST['brojSlike']) && $_POST['brojSlike'] == "3" && isset($_REQUEST['submit'])) {
            /*$promjenaXML = simplexml_load_file($clanakXMLfile);
            $promjenaXML->slike->slika[2] = $_POST['submit'];
            $promjenaXML->asXML($clanakXMLfile);*/

            try {
              $conn = new PDO("mysql:host=localhost;dbname=wtspirala4", "admin", "pass");
              // set the PDO error mode to exception
              $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              $conn->exec("set names utf8");

              $stmt = $conn->prepare("SELECT * FROM clanak ORDER BY id DESC LIMIT 1");
              $stmt->execute();
              $rjesenje = $stmt->fetch(PDO::FETCH_ASSOC);

              $stmt = $conn->prepare("INSERT INTO clanak (naslov, slika1, slika2, slika3, tekst, vrijeme) VALUES (:naslov, :slika1, :slika2, :slika3, :tekst, :vrijeme)");
              $stmt->bindParam(':naslov', $rjesenje['naslov']);
              $stmt->bindParam(':slika1', $rjesenje['slika1']);
              $stmt->bindParam(':slika2', $rjesenje['slika2']);
              $stmt->bindParam(':slika3', $sl3);
              $stmt->bindParam(':tekst', $rjesenje['tekst']);
              $stmt->bindParam(':vrijeme', $vr);

              // insert a row
              $sl3 = $_POST['submit'];
              $vr = date("Y-m-d h:i:s");
              $stmt->execute();
            }
            catch(PDOException $e)
            {
                echo "Konekcija nije uspjela: " . $e->getMessage();
            }
          }

          if (isset($_POST['izbrisi3'])) {
            /*$promjenaXML = simplexml_load_file($clanakXMLfile);
            $promjenaXML->slike->slika[2] = "imgno.jpg";
            $promjenaXML->asXML($clanakXMLfile);*/

            try {
              $conn = new PDO("mysql:host=localhost;dbname=wtspirala4", "admin", "pass");
              // set the PDO error mode to exception
              $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              $conn->exec("set names utf8");

              $stmt = $conn->prepare("SELECT * FROM clanak ORDER BY id DESC LIMIT 1");
              $stmt->execute();
              $rjesenje = $stmt->fetch(PDO::FETCH_ASSOC);

              $stmt = $conn->prepare("INSERT INTO clanak (naslov, slika1, slika2, slika3, tekst, vrijeme) VALUES (:naslov, :slika1, :slika2, :slika3, :tekst, :vrijeme)");
              $stmt->bindParam(':naslov', $rjesenje['naslov']);
              $stmt->bindParam(':slika1', $rjesenje['slika1']);
              $stmt->bindParam(':slika2', $rjesenje['slika2']);
              $stmt->bindParam(':slika3', $sl3);
              $stmt->bindParam(':tekst', $rjesenje['tekst']);
              $stmt->bindParam(':vrijeme', $vr);

              // insert a row
              $sl3 = "imgno.jpg";
              $vr = date("Y-m-d h:i:s");
              $stmt->execute();
            }
            catch(PDOException $e)
            {
                echo "Konekcija nije uspjela: " . $e->getMessage();
            }
          }
        ?>
        </div>
      <?php else: ?>
    <div class="kolona sadrzaj"></div>
  <?php endif; ?>
  <div class="kolona margina"></div>
</div>
<div class="red">
    <div class="kolona margina"></div>
    <?php  if(isset($_SESSION['stanje']) && $_SESSION['stanje'] === "mijenjanje"):  ?>
    <div class="kolona sadrzaj">
      <?php
        //echo simplexml_load_file($clanakXMLfile)->naslov;
        try {
          $conn = new PDO("mysql:host=localhost;dbname=wtspirala4", "admin", "pass");
          // set the PDO error mode to exception
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $conn->exec("set names utf8");

          $stmt = $conn->prepare("SELECT tekst FROM clanak ORDER BY id DESC LIMIT 1");
          $stmt->execute();
          foreach ($stmt->fetch() as $tekst) {
            //echo $naslov;
            echo '<form method="post" action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'"><textarea name="unosOpis" rows="4" style="width:100%">'.htmlspecialchars($tekst).'</textarea>';
            break;
          }
          if (isset($_POST['spasiOpis'])) {
            $conn = new PDO("mysql:host=localhost;dbname=wtspirala4", "admin", "pass");
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conn->exec("set names utf8");

            $stmt = $conn->prepare("SELECT * FROM clanak ORDER BY id DESC LIMIT 1");
            $stmt->execute();
            $rjesenje = $stmt->fetch(PDO::FETCH_ASSOC);

            $stmt = $conn->prepare("INSERT INTO clanak (naslov, slika1, slika2, slika3, tekst, vrijeme) VALUES (:naslov, :slika1, :slika2, :slika3, :tekst, :vrijeme)");
            $stmt->bindParam(':naslov', $rjesenje['naslov']);
            $stmt->bindParam(':slika1', $rjesenje['slika1']);
            $stmt->bindParam(':slika2', $rjesenje['slika2']);
            $stmt->bindParam(':slika3', $rjesenje['slika3']);
            $stmt->bindParam(':tekst', $tekst);
            $stmt->bindParam(':vrijeme', $vr);

            // insert a row
            $tekst = $_POST['unosOpis'];
            $vr = date("Y-m-d h:i:s");
            $stmt->execute();
          }

          if (isset($_POST['izbrisiOpis'])) {
            $conn = new PDO("mysql:host=localhost;dbname=wtspirala4", "admin", "pass");
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conn->exec("set names utf8");

            $stmt = $conn->prepare("SELECT * FROM clanak ORDER BY id DESC LIMIT 1");
            $stmt->execute();
            $rjesenje = $stmt->fetch(PDO::FETCH_ASSOC);

            $stmt = $conn->prepare("INSERT INTO clanak (naslov, slika1, slika2, slika3, tekst, vrijeme) VALUES (:naslov, :slika1, :slika2, :slika3, :tekst, :vrijeme)");
            $stmt->bindParam(':naslov', $rjesenje['naslov']);
            $stmt->bindParam(':slika1', $rjesenje['slika1']);
            $stmt->bindParam(':slika2', $rjesenje['slika2']);
            $stmt->bindParam(':slika3', $rjesenje['slika3']);
            $stmt->bindParam(':tekst', $tekst);
            $stmt->bindParam(':vrijeme', $vr);

            // insert a row
            $tekst = "";
            $vr = date("Y-m-d h:i:s");
            $stmt->execute();
          }
        }
        catch(PDOException $e)
        {
            echo "Konekcija nije uspjela: " . $e->getMessage();
        }
      ?>

    </div>
    <div class="kolona margina">
      <?php
        echo '<input type="submit" value="Spasi" name="spasiOpis" style="width:100%;">
        <input type="submit" value="Izbriši" name="izbrisiOpis" style="width:100%;"></form>';
      ?>
    </div>
    <?php else: ?>
      <div class="kolona sadrzaj">
        <p>
          <?php
          try {
            $conn = new PDO("mysql:host=localhost;dbname=wtspirala4", "admin", "pass");
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conn->exec("set names utf8");

            $stmt = $conn->prepare("SELECT tekst FROM clanak ORDER BY id DESC LIMIT 1");
            $stmt->execute();
            foreach ($stmt->fetch() as $tekst) {
            //echo $naslov;
            echo htmlspecialchars($tekst);
            break;
            }
          }
          catch(PDOException $e)
          {
              echo "Konekcija nije uspjela: " . $e->getMessage();
          }
          ?>
        </p>
      </div>
      <div class="kolona margina"></div>
    <?php endif; ?>
  </div>
  <div class="red">
    <div class="kolona margina"></div>
    <div class="kolona sadrzaj">
      <hr>
    </div>
    <div class="kolona margina"></div>
  </div>
  <div class="red">
    <div class="kolona margina"></div>
    <div class="kolona sadrzaj">
      <h4>Dodajte novu vijest, izmijenite ili obrišite nešto iz postojeće (samo administrator)</h4>
    </div>
    <div class="kolona margina"></div>
  </div>
  <div class="red">
    <div class="kolona margina"></div>
    <div class="kolona sadrzaj">
      <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Admin prijava</button>
      <?php  if(isset($_SESSION['uname']) && $username === "admin" ):  ?>
        <button id="dodajVijest"style="width:auto;">Dodaj vijest</button>
      <?php endif; ?>
    </div>
    <div class="kolona margina"></div>
  </div>
  <div class="red">
    <div class="kolona margina"></div>
    <div class="kolona sadrzaj">
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <input type="submit" name="preuzmiPDF" value="Generiši PDF">
      </form>
    </div>
    <div class="kolona margina"></div>
  </div>

  <?php
      if (isset($_POST['preuzmiPDF'])) {
        try {
          $conn = new PDO("mysql:host=localhost;dbname=wtspirala4", "admin", "pass");
          // set the PDO error mode to exception
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $conn->exec("set names utf8");

          $stmt = $conn->prepare("SELECT * FROM clanak ORDER BY id DESC LIMIT 1");
          $stmt->execute();
          $rjesenje = $stmt->fetch(PDO::FETCH_ASSOC);

          require('fpdf.php');
          $pdf = new FPDF();
          $pdf->AddPage();
          $pdf->SetFont('Arial','',16);
          $pdf->SetTitle('WTinfo');
          //$pdf->Write(5,$clanakInfo->naslov);
          $pdf->Cell(0,0,$rjesenje['naslov'],0,2,'C');


          $pdf->SetFont('Arial','',12);
          $pdf->Image('../Images/' . $rjesenje['slika1'] .'', 5, 20, 200);
          $pdf->Image('../Images/' . $rjesenje['slika2'] .'', 5, 150, 200);
          $pdf->AddPage();
          $pdf->Image('../Images/' . $rjesenje['slika3'] .'', 5, 10, 200);
          $pdf->Cell(0,130,"",0,2,'C');
          $pdf->MultiCell(0,5,$rjesenje['tekst'],0,'L');
          $pdf->Output('F', 'Clanak.pdf');
        }
        catch(PDOException $e)
        {
            echo "Konekcija nije uspjela: " . $e->getMessage();
        }

      }
    ?>


  <div id="id01" class="modal">
    <?php require('login.php'); ?>
  </div>
  <?php echo session_status(); ?>





<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

<script>
// Get the modal
var modal2 = document.getElementById('id02');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal2) {
        modal.style.display = "none";
    }
}
</script>
</body>
</html>
