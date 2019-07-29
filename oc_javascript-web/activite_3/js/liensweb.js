//////////////////////////////
/////     Activité 3     /////
//////////////////////////////

/////>> Fonctions AJAX ----------------------------------------

// Appel AJAX GET
function ajaxGet(url, callback) {
  var req = new XMLHttpRequest();
  req.open("GET", url);
  req.addEventListener("load", function () {
    if (req.status >= 200 && req.status < 400) {
      // Appelle la fonction callback en lui passant la réponse de la requête
      callback(req.responseText);
    } else {
      console.error(req.status + " " + req.statusText + " " + url);
    }
  });
  req.addEventListener("error", function () {
    console.error("Erreur réseau avec l'URL " + url);
  });
  req.send(null);
}

// Appel AJAX POST
function ajaxPost(url, data, callback, isJson) {
  var req = new XMLHttpRequest();
  req.open("POST", url);
  req.addEventListener("load", function () {
      if (req.status >= 200 && req.status < 400) {
        // Appelle la fonction callback en lui passant la réponse de la requête
        callback(req.responseText);
      } else {
        console.error(req.status + " " + req.statusText + " " + url);
      }
  });
  req.addEventListener("error", function () {
    console.error("Erreur réseau avec l'URL " + url);
  });
  if (isJson) {
    // Définit le contenu de la requête comme étant du JSON
    req.setRequestHeader("Content-Type", "application/json");
    // Transforme la donnée du format JSON vers le format texte avant l'envoi
    data = JSON.stringify(data);
  }
  req.send(data);
}

/////>> Récupérer les liens ----------------------------------------

// Crée et renvoie un élément DOM affichant les données d'un lien
// Le paramètre lien est un objet JS représentant un lien
function creerElementLien(lien) {
  var titreElt = document.createElement("a");
  titreElt.href = lien.url;
  titreElt.style.color = "#428bca";
  titreElt.style.textDecoration = "none";
  titreElt.style.marginRight = "5px";
  titreElt.appendChild(document.createTextNode(lien.titre));

  var urlElt = document.createElement("span");
  urlElt.appendChild(document.createTextNode(lien.url));

  // Cette ligne contient le titre et l'URL du lien
  var ligneTitreElt = document.createElement("h4");
  ligneTitreElt.style.margin = "0px";
  ligneTitreElt.appendChild(titreElt);
  ligneTitreElt.appendChild(urlElt);

  // Cette ligne contient l'auteur
  var ligneDetailsElt = document.createElement("span");
  ligneDetailsElt.appendChild(document.createTextNode("Ajouté par " + lien.auteur));

  var divLienElt = document.createElement("div");
  divLienElt.classList.add("lien");
  divLienElt.appendChild(ligneTitreElt);
  divLienElt.appendChild(ligneDetailsElt);

  return divLienElt;
}

// Utilisation de la fonction AJAX GET pour afficher les liens du serveur
var contenuElt = document.getElementById("contenu");
// Récupérer les liens avec la fonction AJAX GET
ajaxGet("https://oc-jswebsrv.herokuapp.com/api/liens", function(reponse){
  // Transforme la réponse en un tableau d'articles
  var listeLiens = JSON.parse(reponse);
  // Parcours de la liste des liens et ajout d'un élément au DOM pour chaque lien
  listeLiens.forEach(function (lien) {
    var lienElt = creerElementLien(lien);
    contenuElt.appendChild(lienElt);
  });
});


/////>> Envoyer et ajouter un nouveau lien -----------------------------------

// Crée et renvoie un élément DOM de type input
function creerElementInput(name, placeholder, taille) {
  var inputElt = document.createElement("input");
  inputElt.type = "text";
  inputElt.setAttribute("name", name);
  inputElt.setAttribute("placeholder", placeholder);
  inputElt.setAttribute("size", taille);
  inputElt.setAttribute("required", "true");
  return inputElt;
}

var ajouterLienElt = document.getElementById("ajoutLien");
// Gère l'ajout d'un nouveau lien
ajouterLienElt.addEventListener("click", function () {
  var auteurElt = creerElementInput("auteur", "Entrez votre nom", 20);
  var titreElt = creerElementInput("titre", "Entrez le titre du lien", 40);
  var urlElt = creerElementInput("url", "Entrez l'URL du lien", 40);

  var ajoutElt = document.createElement("input");
  ajoutElt.type = "submit";
  ajoutElt.value = "Ajouter";

  var formAjoutElt = document.createElement("form");
  formAjoutElt.appendChild(auteurElt);
  formAjoutElt.appendChild(titreElt);
  formAjoutElt.appendChild(urlElt);
  formAjoutElt.appendChild(ajoutElt);

  var p = document.querySelector("p");
  // Remplace le bouton d'ajout par le formulaire d'ajout
  p.replaceChild(formAjoutElt, ajouterLienElt);

  var form = document.querySelector("form");
  form.addEventListener("submit", function(e){
    e.preventDefault();

    var url = urlElt.value;
    // Si l'URL ne commence ni par "http://" ni par "https://"
    if ((url.indexOf("http://") !== 0) && (url.indexOf("https://") !== 0)) {
      // On la préfixe par "http://"
      url = "http://" + url;
    }

    // Création de l'objet contenant les données du nouveau lien
    var lien = {
      titre: titreElt.value,
      url: url,
      auteur: auteurElt.value
    };

    // Envoi des données du formulaire au serveur
    ajaxPost("https://oc-jswebsrv.herokuapp.com/api/lien", lien, function(response){
        var lienElt = creerElementLien(lien);
        // Ajoute le nouveau lien en haut de la liste
        contenuElt.insertBefore(lienElt, contenuElt.firstChild);

        // Création du message d'information
        var infoElt = document.createElement("div");
        infoElt.classList.add("info");
        infoElt.textContent = "Le lien \"" + lien.titre + "\" a bien été ajouté.";
        p.insertBefore(infoElt, ajouterLienElt);
        // Suppresion du message après 2 secondes
        setTimeout(function () {
          p.removeChild(infoElt);
        }, 2000);
      },true // Valeur du paramètre isJson
    );
    // Remplace le formulaire d'ajout par le bouton d'ajout
    p.replaceChild(ajouterLienElt, formAjoutElt);
  });
});
