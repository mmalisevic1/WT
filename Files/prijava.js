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

window.onload = function() {
  // Vrati podatke
  //alert(localStorage.getItem("email"));
  document.getElementById('korImeEmail').value = localStorage.getItem("korImeEmail");
  //alert(localStorage.getItem("lozinka"));
  document.getElementById('lozinka').value = localStorage.getItem("lozinka");
};
