// clanak

  var slideIndex = 1;
  function initClanak(){
    slideIndex = 1;
    showSlides(slideIndex);
  }
  function plusSlides(n)
  {
    showSlides(slideIndex += n);
  }

  function currentSlide(n)
  {
    showSlides(slideIndex = n);
  }

  function showSlides(n)
  {
    var i;
    var slides = document.getElementsByClassName("mojeSlike");
    var dots = document.getElementsByClassName("tacka");
    if (n > slides.length) {
      slideIndex = 1;
    }
    if (n < 1) {
      slideIndex = slides.length;
    }
    for (var i = 0; i < slides.length; i++) {
      //alert("Sakrivam");
      slides[i].style.display = "none";
    }
    for (var i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex - 1].style.display = "block";
    dots[slideIndex - 1].className += " active";
  }
// prijava.js

function validacijaPrijava()
{
  var emailVal = document.getElementById('emailVal');
  emailVal.innerHTML = "";
  var formPrijava = document.getElementById('fPrijava')
  var emailRegEx = /^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+)*\.(aero|arpa|biz|com|coop|edu|gov|info|int|mil|museum|name|net|org|pro|travel|mobi|[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/i;
  var re = /^\w+$/;
  if (!emailRegEx.test(formPrijava['korImeEmail'].value) && !re.test(formPrijava["korImeEmail"].value))
  {
    emailVal.innerHTML += "Unesite email ili korisničko ime";
    document.getElementById('korImeEmail').focus();
    return false;
  }

  // password mora da se sastoji iz slova i brojeva, i min duzina 6
  var rePass = /(?=.*\d)(?=.*[a-z]).{6,20}/;
  var lozinkaVal = document.getElementById('lozinkaVal');
  lozinkaVal.innerHTML = "";
  if(!rePass.test(formPrijava["lozinka"].value))
  {
    lozinkaVal.innerHTML += "Lozinka mora sadržavati samo slova i brojeve, minimalna dužina 6 znakova";
    document.getElementById('lozinka').focus();
    return false;
  }

  // LOCAL STORAGE
  if (typeof(Storage) !== "undefined") {
    // Spasi
    localStorage.setItem("korImeEmail", document.getElementById('korImeEmail').value);
    localStorage.setItem("lozinka", document.getElementById('lozinka').value);
  }
  else {
    alert("Napomena: Vaš pretraživač ne podržava Web Storage");
  }
}

function initPrijave() {
  // Vrati podatke
  //alert(localStorage.getItem("email"));
  document.getElementById('korImeEmail').value = localStorage.getItem("korImeEmail");
  //alert(localStorage.getItem("lozinka"));
  document.getElementById('lozinka').value = localStorage.getItem("lozinka");
};
// registracija.js



function validacijaRegistracija()
{
  var emailVal = document.getElementById('emailVal');
  emailVal.innerHTML = "";
  var formRegistracija = document.getElementById('fRegistracija')
  var emailRegEx = /^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+)*\.(aero|arpa|biz|com|coop|edu|gov|info|int|mil|museum|name|net|org|pro|travel|mobi|[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/i;
  if(!emailRegEx.test(formRegistracija['email'].value))
  {
    emailVal.innerHTML += "Pogrešno unesen email";
    document.getElementById('email').focus();
    return false;
  }


  var korImeVal = document.getElementById('korImeVal');
  korImeVal.innerHTML = "";
  if(formRegistracija["korIme"].value == null || formRegistracija["korIme"].value == "")
  {
    korImeVal.innerHTML += "Unesite korisničko ime";
    document.getElementById('korIme').focus();
    return false;
  }
  var re = /^\w+$/;
  if(!re.test(formRegistracija["korIme"].value))
  {
    korImeVal.innerHTML += "Korisničko ime može sadržavati samo slova, brojeve i donje crtice";
    document.getElementById('korIme').focus();
    return false;
  }

  // password mora da se sastoji iz slova i brojeva, i min duzina 6
  var rePass = /(?=.*\d)(?=.*[a-z]).{6,20}/;
  var lozinkaVal = document.getElementById('lozinkaVal');
  lozinkaVal.innerHTML = "";
  if(!rePass.test(formRegistracija["lozinka"].value))
  {
    lozinkaVal.innerHTML += "Lozinka mora sadržavati samo slova i brojeve, minimalna dužina 6 znakova";
    document.getElementById('lozinka').focus();
    return false;
  }

  var lozinkaProvjera = document.getElementById('lozinka').value;
  var ponLozinkaProvjera = document.getElementById('ponLozinka').value;
  var ponLozinkaVal = document.getElementById('ponLozinkaVal');
  ponLozinkaVal.innerHTML = "";
  if(lozinkaProvjera != ponLozinkaProvjera)
  {
    ponLozinkaVal.innerHTML += "Lozinke se ne poklapaju";
    return false;
  }

  var spolVal = document.getElementById('spolVal');
  spolVal.innerHTML = "";
  if(!document.getElementById('spolM').checked && !document.getElementById('spolZ').checked)
  {
    spolVal.innerHTML += "Odaberite spol";
    return false;
  }

  // LOCAL STORAGE
  if (typeof(Storage) !== "undefined") {
    // Spasi
    localStorage.setItem("email", document.getElementById('email').value);
    localStorage.setItem("korIme", document.getElementById('korIme').value);
    localStorage.setItem("lozinka", document.getElementById('lozinka').value);
    localStorage.setItem("ponLozinka", document.getElementById('ponLozinka').value);
    var spolovi = document.getElementsByName('spol');
    if (spolovi[0].checked) {
      localStorage.setItem("spol", spolovi[0].value);
    }
    else {
      localStorage.setItem("spol", spolovi[1].value);
    }
  }
  else {
    alert("Napomena: Vaš pretraživač ne podržava Web Storage");
  }
}

 function initRegistracija() {
  // Vrati podatke
  //alert(localStorage.getItem("email"));
  document.getElementById('email').value = localStorage.getItem("email");
  document.getElementById('korIme').value = localStorage.getItem("korIme");
  //alert(localStorage.getItem("lozinka"));
  document.getElementById('lozinka').value = localStorage.getItem("lozinka");
  document.getElementById('ponLozinka').value = localStorage.getItem("ponLozinka");
  var spolovi1 = document.getElementsByName('spol');
  if (localStorage.getItem("spol") === "muški") {
    spolovi1[0].checked = true;
  }
  else {
    spolovi1[1].checked = true;
  }
};

//feedback.js
function validacijaFeedback()
{
  //alert(typeof(document.getElementById('komentar').value));
  var brojZnakova = (document.getElementById('komentar').value).length;
  var komentarVal = document.getElementById('komentarVal');
  komentarVal.innerHTML = "";
  if (brojZnakova < 10 || brojZnakova > 200) {
    komentarVal.innerHTML += "Komentar mora sadržavati između 10 i 200 znakova";
    return false;
  }

  // LOCAL STORAGE
  if (typeof(Storage) !== "undefined") {
    // Spasi
    localStorage.setItem("komentar", document.getElementById('komentar').value);
  }
  else {
    alert("Napomena: Vaš pretraživač ne podržava Web Storage");
  }
}
function initFeedback() {
  // Vrati podatke
  //alert(localStorage.getItem("email"));
  document.getElementById('komentar').value = localStorage.getItem("komentar");
};



// index.js
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

  function prikaziSadrzaj(naziv) {
    var ajax = new XMLHttpRequest();
    ajax.onreadystatechange = function() {
      if (ajax.readyState == 4 && ajax.status == 200) {
        document.getElementById('polje').innerHTML = ajax.responseText;

        switch (naziv) {
          case 'clanak.html':
              initClanak();
          break;
          case 'prijava.html':
            initPrijave();
          break;
          case 'registracija.html':
            initRegistracija();
          break;
          case 'feedback.html':
          initFeedback();
          break;
        }
      }

      if (ajax.readyState == 4 && ajax.status == 404) {
        document.getElementById('polje').innerHTML = "Greška: nepoznat URL";
      }

    }
    ajax.open("GET", naziv, true);
    ajax.send();

  }
