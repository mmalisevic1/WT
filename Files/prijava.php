<?php
  session_start();
  if (isset($_SESSION['usernamePrijava'])) {
    $username = $_SESSION['usernamePrijava'];
  }
  elseif (isset($_POST['submitPrijava'])) {
    $username = $_REQUEST['korImeEmail'];
    $password = $_REQUEST['lozinka'];


    try {
      $conn = new PDO("mysql:host=localhost;dbname=wtspirala4", "admin", "pass");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM korisnik WHERE username=:username AND password=:password");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->execute();

    $kolona = $stmt->fetchColumn();
    if ($kolona == $username) {
      $_SESSION['usernamePrijava'] = $username;
      //echo $username;
    }
    }
    catch(PDOException $e)
    {
        echo "Konekcija nije uspjela: " . $e->getMessage();
    }
    $conn = null;
  }

  if (isset($_POST['submitOdjava'])) {
    $_SESSION['usernamePrijava'] = "";
  }

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>wtInfo</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="prijava.css">
  <script src="prijava.js"></script>
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
  <form name="formPrijava" id="fPrijava" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"
  onsubmit="return validacijaPrijava()" method="post">
  <div class="red">
    <div class="kolona margina"></div>
    <div class="kolona lsadrzaj">
      <label>Korisničko ime ili e-mail</label>
    </div>
    <div class="kolona dsadrzaj">
      <input type="text" name="korImeEmail" id="korImeEmail">
    </div>
    <div class="kolona validacija">
      <p id="emailVal"></p>
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
  <div class="red zadnji">
    <div class="kolona margina"></div>
    <div class="kolona lsadrzaj">
      <input type="submit" value="Prijavi se" name="submitPrijava">
      <script src="prijava.js"></script>
    </div>
    <div class="kolona dsadrzaj"></div>
    <div class="kolona margina"></div>
  </div>
  <div class="red zadnji">
    <div class="kolona margina"></div>
    <div class="kolona lsadrzaj">
      <input type="submit" value="Odjavi se" name="submitOdjava">
      <script src="prijava.js"></script>
    </div>
    <div class="kolona dsadrzaj"></div>
    <div class="kolona margina"></div>
  </div>
</form>
</body>
</html>
