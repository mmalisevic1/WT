<?php
  session_start();

  if (isset($_SESSION['usernamePrijava'])) {
    if (isset($_POST['submitFeedback'])) {
      try {
        $conn = new PDO("mysql:host=localhost;dbname=wtspirala4", "admin", "pass");
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->exec("set names utf8");

        $stmt = $conn->prepare("SELECT id FROM clanak ORDER BY id DESC LIMIT 1");
        $stmt->execute();
        $idClanak = 0;
        foreach ($stmt->fetch() as $id) {
          //echo $naslov;
          $idClanak = $id;
          break;
        }


        $conn = null;
        $conn = new PDO("mysql:host=localhost;dbname=wtspirala4", "admin", "pass");
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->exec("set names utf8");

        $stmt = $conn->prepare("INSERT INTO komentar (id, clanak, autor, tekst, vrijeme) VALUES (NULL, :clanak, :autor, :tekst, :vrijeme)");
        $stmt->bindParam(':clanak', $idClanak);
        $stmt->bindParam(':autor', $_SESSION['usernamePrijava']);
        $stmt->bindParam(':tekst', $_POST['komentar']);
        $stmt->bindParam(':vrijeme', $vr);

        // insert a row
        $vr = date("Y-m-d h:i:s");
        $stmt->execute();
      }
      catch(PDOException $e)
      {
          echo "Konekcija nije uspjela: " . $e->getMessage();
      }
    }
  }
?>

<!DOCTYPE html>
<html>
<head>
  <title>wtInfo</title>
  <meta name="viewport" charset="utf-8" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="feedback.css">
  <script src="feedback.js"></script>
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
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" name="formFeedback" id="fFeedback"
  onsubmit="return validacijaFeedback()" method="post">
  <div class="red">
    <div class="kolona margina"></div>
    <div class="kolona lsadrzaj">
      <label>Ostavite Vaš komentar na članak.<br>Vaše mišljenje nam je bitno.</label>
    </div>
    <div class="kolona dsadrzaj">
      <textarea name="komentar" id="komentar" rows="5"></textarea>
    </div>
    <div class="kolona margina"></div>
  </div>
  <div class="red">
    <div class="kolona margina"></div>
    <div class="kolona lsadrzaj">
    </div>
    <div class="kolona dsadrzaj">
      <p id="komentarVal"></p>
    </div>
    <div class="kolona margina"></div>
  </div>
  <div class="red zadnji">
    <div class="kolona margina"></div>
    <div class="kolona lsadrzaj">
      <input type="submit" value="Pošalji" name="submitFeedback">
    </div>
    <div class="kolona dsadrzaj"></div>
    <div class="kolona margina"></div>
  </div>
</form>
</body>
</html>
