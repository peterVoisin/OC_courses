// Liste des pays
var listePays = [
    "Afghanistan",
    "Afrique du Sud",
    "Albanie",
    "Algérie",
    "Allemagne",
    "Andorre",
    "Angola",
    "Anguilla",
    "Antarctique",
    "Antigua-et-Barbuda",
    "Antilles néerlandaises",
    "Arabie saoudite",
    "Argentine",
    "Arménie",
    "Aruba",
    "Australie",
    "Autriche",
    "Azerbaïdjan"
];

var divElt = document.getElementById("suggestions");
document.getElementById("pays").addEventListener("input", function(e) {
  var saisie = e.target.value;
var suggestions = [];
  divElt.innerHTML = "";
  for (var i = 0; i < listePays.length; i++) {
    if (listePays.indexOf(saisie)) {
      console.log(listePays[i]);
    }
  }
  //document.getElementById("aideCourriel").textContent = validiteCourriel;
});

// Correction
var paysElt = document.querySelector("input");
var suggestionsElt = document.getElementById("suggestions");

// Gère le changement de valeur saisie
paysElt.addEventListener("input", function () {
    suggestionsElt.innerHTML = ""; // Vidage de la liste des suggestions
    listePays.forEach(function (pays) {
        // Si valeur en cours de saisie correspond au début du pays
        if (pays.indexOf(paysElt.value) === 0) {
            var suggestionElt = document.createElement("div");
            suggestionElt.classList.add("suggestion");
            suggestionElt.textContent = pays;
            // Gère le lic sur une suggestion
            suggestionElt.addEventListener("click", function (e) {
                // Remplacement de la valeur saisie par la suggestion
                paysElt.value = e.target.textContent;
                // Vidage de la liste des suggestions
                suggestionsElt.innerHTML = "";
            });
            suggestionsElt.appendChild(suggestionElt);
        }
    });
});
