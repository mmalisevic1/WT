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

window.onload = function() {
  // Vrati podatke
  //alert(localStorage.getItem("email"));
  document.getElementById('komentar').value = localStorage.getItem("komentar");
};
