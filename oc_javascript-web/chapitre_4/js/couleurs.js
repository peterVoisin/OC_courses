//var methode = prompt("Quelle méthode de saisie ? (nom ou rgb)");

var colorText = prompt("Quelle couleur pour le texte (son nom ou ses trois valeurs séparées par uen virgule) :");
var colorFond = prompt("Quelle couleur pour le fond (son nom ou ses trois valeurs séparées par uen virgule) :");

divElt = [];
divElt = document.querySelectorAll("div");

for (var i = 0, c = divElt.length; i < c; i++) {
  divElt[i].style.color = colorText;
  divElt[i].style.backgroundColor = colorFond;
}
