var buttonElt = document.getElementById("button");
var compteurElt = document.getElementById("compteur");
var intervalId;

function modifierCompteur(){
  if (buttonElt.textContent === "Arrêter") {
    var compteur = Number(compteurElt.textContent);
    compteurElt.textContent = compteur + 1;
  } else {
    clearInterval(intervalId);
  }
}

buttonElt.addEventListener("click", function(){
  if (buttonElt.textContent === "Démarrer") {
    buttonElt.textContent = "Arrêter";
    intervalId = setInterval(modifierCompteur, 1000);
  } else {
    buttonElt.textContent = "Démarrer";
  }
});
