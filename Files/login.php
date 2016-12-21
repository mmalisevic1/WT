
  <?php
  $imeErr = $lozinkaErr = "";
  $ime = $lozinka = "";



  if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $ime = test_input($_POST["uname"]);
  if (!preg_match("/^\w+$/",$ime)) {
    $imeErr = "Korisničko ime može sadržavati samo slova, brojeve i donje crtice";
  }

  $lozinka = test_input($_POST["psw"]);
  if (!preg_match("/(?=.*\d)(?=.*[a-z]).{6,20}/",$lozinka)) {
    $lozinkaErr = "Lozinka mora sadržavati samo slova i brojeve, minimalna dužina 6 znakova";
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
  ?>

  <form class="modal-content animate" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Izlaz">&times;</span>
    </div>

    <div class="container">
      <label><b>Korisničko ime</b></label>
      <input type="text" placeholder="admin" name="uname" required>

      <label><b>Lozinka</b></label>
      <input type="password" placeholder="pass" name="psw" required>

      <button type="submit" name="login">Login</button>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      <span class="psw">Admin <a href="clanak.php?subject=logout">LOGOUT</a></span>
    </div>
  </form>
