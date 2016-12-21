<?php
  session_start();

  if(isset($_SESSION['uname'])){
		$username = $_SESSION['uname'];
	}
	if(isset($_REQUEST['login'])){
    //echo "ulazim";
		if(isset($_REQUEST['psw'])){
			if($_REQUEST['uname'] === "admin" && $_REQUEST['psw'] === "pass")
			{
				$username=$_REQUEST['uname'];
				$_SESSION['uname']= $username;
			}
			else {
				session_unset();
        session_destroy();
				$username="";
			}
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
      <a href="clanak.html">wtInfo</a>
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
            <a href="clanak.html">Vijest</a>
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
          <a href="registracija.html">Registracija</a>
        </li>
        <li>
          <div class="kocka biznis"></div>
          <a href="prijava.html">Prijava</a>
        </li>
        <li>
          <div>
            <div class="kocka vise"></div>
            <a href="feedback.html">Feedback</a>
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
    <div class="kolona sadrzaj">
      <h3>Dokumentarac BBC-a &quot;Planet Earth&quot;</h3>
    </div>
    <div class="kolona margina"></div>
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
          <img src="../Images/img1.jpg" style="width:100%">
          <div class="text">From Pole to Pole</div>
        </div>

        <div class="mojeSlike fade">
          <div class="brojText">2 / 3</div>
          <img src="../Images/img2.jpg" style="width:100%">
          <div class="text">Mountains</div>
        </div>

        <div class="mojeSlike fade">
          <div class="brojText">3 / 3</div>
          <img src="../Images/img3.jpg" style="width:100%">
          <div class="text">Fresh Water</div>
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
    <div class="kolona sadrzaj">
      <p>
        Aenean ut vehicula nulla. Proin eu tincidunt purus. Vivamus in feugiat neque. Duis convallis orci sapien, id pretium ante consectetur vel. Vestibulum ultricies eget metus faucibus bibendum. Sed feugiat, turpis at molestie tincidunt, lorem arcu vehicula nunc, et lobortis tellus mi mattis nibh. Duis volutpat placerat ligula vitae aliquet. Nulla ut arcu dapibus, volutpat purus sit amet, tincidunt magna. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ut felis eget dolor feugiat faucibus. Aenean malesuada mi vitae pharetra porta. Aliquam in rutrum dui. Phasellus laoreet nisi vel blandit facilisis. Praesent ac massa eget est tincidunt sollicitudin.<br>
        Integer commodo enim in massa vulputate egestas. Vestibulum consectetur arcu auctor, porttitor urna ac, viverra turpis. Mauris bibendum massa in condimentum consectetur. Mauris ac faucibus justo, ut hendrerit justo. Integer suscipit euismod sodales. Maecenas eu lobortis orci. Donec aliquam vehicula auctor. Vivamus ligula tortor, scelerisque eget nisi at, condimentum scelerisque nibh. Duis consectetur sollicitudin felis vitae finibus. Phasellus a ex id massa volutpat auctor sit amet quis nunc. Phasellus condimentum, orci et faucibus interdum, dolor nisi placerat arcu, at malesuada nunc est nec ante. Aliquam pharetra vitae tortor ut vulputate.
      </p>
    </div>
    <div class="kolona margina"></div>
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
    </div>
    <div class="kolona margina"></div>
  </div>



  <div id="id01" class="modal">
    <?php require('login.php');
          if($_GET['subject'] == "logout") {
              session_unset();
              session_destroy();
              $username="";
          }
    ?>
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
</body>
</html>
