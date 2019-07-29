/*// Création d'une requête HTTP synchrone
var req = new XMLHttpRequest();
// Requête HTTP GET synchrone vers le fichier langages.txt publié localement
req.open("GET", "http://localhost:8888/OpenClassrooms/javascript-web/chapitre_8/javascript-web-srv/data/langages.txt", false);
// Envoi de la requête
req.send(null);
// Affiche la réponse reçue pour la requête
console.log(req.responseText);*/

/*// Création d'une requête HTTP asynchrone
var req = new XMLHttpRequest();
// la requête est asynchrone lorsque le 3ème paramètre vaut true ou est absent
req.open("GET", "http://localhost:8888/OpenClassrooms/javascript-web/chapitre_8/javascript-web-srv/data/langages.txt");
req.addEventListener("load", function(){
  if (req.status >= 200 && req.status < 400) {// Le serveur a réussi à traiter la requête
    console.log(req.responseText);
  } else {
    // Affiche des informations sur l'échec du tratitement de la requête
    console.error(req.status + " " + req.statustext);
  }
});
req.addEventListener("error", function(){
  // La requête n'a pas réussi à atteindre le serveur
  console.error("Erreur réseau");
});
req.send(null);*/

// Exécute un appel AJAX GET

// Fonction "ajaxGet" déplacée dans le fichier "ajax.js"

/*function afficher(reponse){
  console.log(reponse);
}
//ajaxGet("http://localhost:8888/OpenClassrooms/javascript-web/chapitre_8/javascript-web-srv/data/langages.txt", afficher);

ajaxGet("http://localhost:8888/OpenClassrooms/javascript-web/chapitre_8/javascript-web-srv/data/langages.txt", function(reponse){
  console.log(reponse);
});

var avion = {
  marque: "Airbus",
  couleur: "A320"
};
console.log(avion);
// Transforme l'objet en chaine de caractères JSON
var texteAvion = JSON.stringify(avion);
console.log(texteAvion);
// Transforme la chaine de caractères JSON en objet JavaScript
console.log(JSON.parse(texteAvion));

var avions = [
    {
        marque: "Airbus",
        couleur: "A320"
    },
    {
        marque: "Airbus",
        couleur: "A380"
    }
];
console.log(avions);
// Transforme le tableau d'objets JS en chaîne de caractères JSON
var texteAvions = JSON.stringify(avions);
console.log(texteAvions);
// Transforme la chaîne de caractères JSON en tableaux d'objets JavaScript
console.log(JSON.parse(texteAvions));*/


/*// Récupérer des données JSON depuis un serveur
ajaxGet("http://localhost:8888/OpenClassrooms/javascript-web/chapitre_8/javascript-web-srv/data/langages.txt", function (reponse) {
  // Transforme la réponse en tableau d'objets JavaScript
  var langages = reponse;
  langages = JSON.parse(reponse);
  // Affiche le titre de chaque film
  //films.forEach(function (film) {
  //  console.log(film.titre);
  //})
});*/

// ajouter
ajaxGet("http://localhost:8888/OpenClassrooms/javascript-web/chapitre_8/javascript-web-srv/data/langages.txt", function(reponse){
  var listeLangage = reponse.split(";");
  console.log(listeLangage);
  listeLangage.forEach(function(langage){
    var newElt = document.createElement("li");
    newElt.id = "python";
    newElt.textContent = langage;
    document.getElementById("langages").appendChild(newElt);
  });
});
