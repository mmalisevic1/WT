<?php
  session_start();
  $novineXMLfile = "novine.xml";
  $postojiN = file_exists($novineXMLfile);
  if ($postojiN == FALSE) {
    $novineInfo = new SimpleXMLElement("<?xml version=\"1.0\" encoding=\"utf-8\" ?><Adrese>
</Adrese>");
    $novineInfo->asXML($novineXMLfile);
  }
  else {
    $novineInfo = simplexml_load_file($novineXMLfile);
  }

  if (isset($_POST['registracijaSubmit'])) {
    //echo "desavanje";
    try {
      $conn = new PDO("mysql:host=localhost;dbname=wtspirala4", "admin", "pass");
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $conn->exec("set names utf8");

      $stmt = $conn->prepare("INSERT INTO korisnik (username, password, email, spol) VALUES (:username, :password, :email, :spol)");
      $stmt->bindParam(':username', $_POST['korIme']);
      $stmt->bindParam(':password', $_POST['lozinka']);
      $stmt->bindParam(':email', $_POST['email']);
      $stmt->bindParam(':spol', $_POST['spol']);

      // insert a row
      $stmt->execute();
    } catch (PDOException $e) {
      echo "Konekcija nije uspjela: " . $e->getMessage();
    }

  }
  if (isset($_POST['adreseSubmit'])) {
    $novineInfo->addChild('Adresa', $_POST['adresa']);
    $novineInfo->asXML($novineXMLfile);
  }
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>wtInfo</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">
  <link rel="stylesheet" href="registracija.css">
  <script src="registracija.js"></script>
  <script>
    var rezultati;
    function showResult(str) {
      if (str.length==0) {
        document.getElementById("livesearch").innerHTML="";
        document.getElementById("livesearch").style.border="0px";
        return;
      }
      if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
      } else {  // code for IE6, IE5
          xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
      }
      xmlhttp.onreadystatechange=function() {
        if (this.readyState==4 && this.status==200) {
          rezultati = this.responseText;
          var niz = rezultati.split("<br />");
          document.getElementById("livesearch").innerHTML = "";
          for (var i = 0; i < niz.length; i++) {
            var redak = niz[i] + "<br>";
            if (i < 10) {
              document.getElementById("livesearch").innerHTML += redak;
              document.getElementById("livesearch").style.border="1px solid #A5ACB2";
            }

          }
        }
      }
      xmlhttp.open("GET","livesearch.php?q="+str,true);
      xmlhttp.send();
    }

    function prikaziRezultate() {

    document.getElementById("rezultatiFill").innerHTML = rezultati;
    }
</script>
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
<body>
  <form>
    <div class="red">
      <div class="kolona margina"></div>
      <div class="kolona lsadrzaj">
        <label style="color: #66ccff;">Pretražite korisnike:</label>
      </div>
      <div class="kolona dsadrzaj">
        <input type="text" size="30" onkeyup="showResult(this.value)">
        <div id="livesearch"></div>
      </div>
      <div class="kolona validacija">
        <input type="button" name="pretraziButton" onclick="prikaziRezultate()" value="Pretraga">
      </div>
      <div class="kolona margina"></div>
    </div>
    <div class="red">
      <div class="kolona margina"></div>
      <div class="kolona lsadrzaj"></div>
      <div class="kolona dsadrzaj">
        <p id="rezultatiFill"></p>
      </div>
    </div>

  </form>
  <form name="formRegistracija" id="fRegistracija" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"
  onsubmit="return validacijaRegistracija()" method="post">
  <div class="red">
    <div class="kolona margina"></div>
    <div class="kolona lsadrzaj">
      <label>E-mail adresa</label>
    </div>
    <div class="kolona dsadrzaj">
      <input type="text" name="email" id="email">
    </div>
    <div class="kolona validacija">
      <p id="emailVal"></p>
    </div>
    <div class="kolona margina"></div>
  </div>
  <div class="red">
    <div class="kolona margina"></div>
    <div class="kolona lsadrzaj">
      <label>Korisničko ime</label>
    </div>
    <div class="kolona dsadrzaj">
      <input type="text" name="korIme" id="korIme">
    </div>
    <div class="kolona validacija">
      <p id="korImeVal"></p>
    </div>
    <div class="kolona margina"></div>
  </div>
  <div class="red">
    <div class="kolona margina"></div>
    <div class="kolona lsadrzaj">
      <label>Lozinka</label>
    </div>
    <div class="kolona dsadrzaj">
      <input type="password" name="lozinka" id="lozinka">
    </div>
    <div class="kolona validacija">
      <p id="lozinkaVal"></p>
    </div>
    <div class="kolona margina"></div>
  </div>
  <div class="red">
    <div class="kolona margina"></div>
    <div class="kolona lsadrzaj">
      <label>Ponovi lozinku</label>
    </div>
    <div class="kolona dsadrzaj">
      <input type="password" name="ponLozinka" id="ponLozinka">
    </div>
    <div class="kolona validacija">
      <p id="ponLozinkaVal"></p>
    </div>
    <div class="kolona margina"></div>
  </div>
  <div class="red zadnji">
    <div class="kolona margina"></div>
    <div class="kolona lsadrzaj">
      <label>Spol</label>
    </div>
    <div class="kolona dsadrzaj">
      <input type="radio" name="spol" value="muški" id="spolM"> Muški<br>
      <input type="radio" name="spol" value="ženski" id="spolZ"> Ženski
    </div>
    <div class="kolona validacija">
      <p id="spolVal"></p>
    </div>
    <div class="kolona margina"></div>
  </div>
  <div class="red zadnji">
    <div class="kolona margina"></div>
    <div class="kolona lsadrzaj">
      <input type="submit" name="registracijaSubmit" value="Registruj se">
    </div>
    <div class="kolona dsadrzaj"></div>
    <div class="kolona margina"></div>
  </div>
</form>
<?php if(isset($_SESSION['stanje']) && $_SESSION['stanje'] === "mijenjanje"): ?>
<form action="csv.php" method="post">
  <div class="red zadnji">
    <div class="kolona margina"></div>
    <div class="kolona lsadrzaj">
      <input type="submit" name="csvButton" value="Preuzmi CSV">
    </div>
    <div class="kolona dsadrzaj"></div>
    <div class="kolona margina"></div>
  </div>
</form>
<?php endif; ?>
<form name="formAdrese" id="fAdrese" onsubmit="return adreseValidacija()" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"
   method="post">
   <div class="red zadnji">
     <div class="kolona margina"></div>
     <div class="kolona lsadrzaj">
       <label style="color: #66ccff;">Prijavite se za naše novine</label>

     </div>
     <div class="kolona dsadrzaj">
       <input type="text" name="adresa" id="adresa">

     </div>
     <div class="kolona validacija">
       <p style="margin:0" id="proradi"></p>
     </div>
     <div class="kolona margina"></div>
   </div>
   <div class="red zadnji">
     <div class="kolona margina"></div>
     <div class="kolona lsadrzaj">
       <input type="submit" name="adreseSubmit" value="Prijavi se">
     </div>
     <div class="kolona dsadrzaj"></div>
     <div class="kolona margina"></div>
   </div>
</form>
<?php if(isset($_SESSION['stanje']) && $_SESSION['stanje'] === "mijenjanje"): ?>
<form action="novine.php" method="post">
  <div class="red zadnji">
    <div class="kolona margina"></div>
    <div class="kolona lsadrzaj">
      <input type="submit" name="novineButton" value="Pošalji u BP">
    </div>
    <div class="kolona dsadrzaj"></div>
    <div class="kolona margina"></div>
  </div>
</form>
<?php endif; ?>
</body>
</html>
