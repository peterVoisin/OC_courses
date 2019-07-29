var compteurElt = document.getElementById("compteur");
// Diminue le compte jusqu'à 0
function diminuerCompteur(){
  // Conversion en nombre du texte du compteur
  var compteur = Number(compteurElt.textContent);
  if (compteur > 1) {
    compteurElt.textContent = compteur -1;
  } else {
    // Annule l'exécution répétée
    clearInterval(intervalId);
    //Modifier le titre de la page
    var titre = document.getElementById("titre");
    titre.textContent = "BOUM !!!";
    // Modification du titre  au bout de 2 secondes
    setTimeout(function(){
      titre.textContent = "Tout est cassé :(";
    }, 2000);
  }
}
// Appelle le fonction diminuerCompteur toutes les secondes (1000 millisecondes)
var intervalId = setInterval(diminuerCompteur, 1000);

// Déplacer un élément
var bloc = document.getElementById("bloc");
var cadre = document.getElementById("cadre");
var vitesse = 7; // Valeur en pixels
// Conversion en nombre de la largeur du bloc (valeur de la forme XXpx)
var largeurBloc = parseFloat(getComputedStyle(bloc).width);
var animationId = null; // identifiant de l'animation
// Déplace le bloc sur sa gauche
function deplacerBloc(){
  // Conversion en nombre de la position gauche du bloc (valeur de la forme "XXpx")
  var xBloc = parseFloat(getComputedStyle(bloc).left);
  // Conversion en nombre de la largeur du cadre
  var xMax = parseFloat(getComputedStyle(cadre).width);
  if (xBloc + largeurBloc <= xMax) {
    // Déplacement du bloc
    bloc.style.left = (xBloc + vitesse) + "px";
    // Demande au navigateur d'appeler "deplacerBloc" dès que possible
    animationId = requestAnimationFrame(deplacerBloc);
  } else {
    // Annulation de l'animation
    cancelAnimationFrame(animationId);
  }
}
//requestAnimationFrame(deplacerBloc); // Début de l'animation
