/*
Créez ensuite le fichier js/instruments.js. Dans ce fichier, créez une fonction infosLiens qui doit afficher :

le nombre total de liens dans la page web ;
la cible du premier et du dernier lien.
Cette fonction doit afficher un résultat correct quel que soit le nombre de liens présents dans la page.
*/

function infosLiens(tagName) {
  var query = document.getElementsByTagName(tagName);
  var nbLinks = query.length;
  console.log(nbLinks);
  console.log(query[0].getAttribute("href"));
  console.log(query[(nbLinks-1)].getAttribute("href"));
}

function possede(objId, type) {
  var getId = document.getElementById(objId);
  if (getId) {
    var getClass = getId.classList.contains(type);
    if (!getClass) {
      console.log("false");
    } else {
      console.log("true");
    }
  } else {
    console.log(`Aucun élément ne possède l'identifiant "${objId}"`);
  }
}

infosLiens("a");

possede("saxophone", "bois"); // Doit afficher true
possede("saxophone", "cuivre"); // Doit afficher false
possede("trompette", "cuivre"); // Doit afficher true
possede("contrebasse", "cordes"); // Doit afficher une erreur
