/****************************************
  Activit 2 en dessous de l'activité 1
****************************************/

//////////////////////////////////////////////////////////////
// Activité 1 - 25/06/2019
//////////////////////////////////////////////////////////////
var listeLiens = [
    {
        titre: "So Foot",
        url: "http://sofoot.com",
        auteur: "yann.usaille"
    },
    {
        titre: "Guide d'autodéfense numérique",
        url: "http://guide.boum.org",
        auteur: "paulochon"
    },
    {
        titre: "L'encyclopédie en ligne Wikipedia",
        url: "http://Wikipedia.org",
        auteur: "annie.zette"
    }
];

// Création d'un fonction nommée "liens"
function liens(titre, url, auteur) {

  // Création d'un élément "p"
  var pElt = document.createElement("p");
  pElt.classList.add("lien");

  // Création d'un élément "a"
  var aElt = document.createElement("a");
  aElt.href = url;
  aElt.textContent = titre;
  aElt.style.color = "#428bca";
  aElt.style.fontSize = "100%";
  aElt.style.fontWeight = "bold";
  aElt.style.textDecoration = "none";

  // Création d'un élément "span url"
  var spanUrlElt = document.createElement("span");
  spanUrlElt.textContent = " " + url;

  // Création d'un élément "br"
  var brElt = document.createElement("br");

  // Création d'un élément "span auteur"
  var spanAuteurElt = document.createElement("span");
  spanAuteurElt.textContent = "Ajouté par " + auteur;

  // Insertion de chaque éléments
  document.getElementById("contenu").appendChild(pElt);
  pElt.appendChild(aElt);
  pElt.appendChild(spanUrlElt);
  pElt.appendChild(brElt);
  pElt.appendChild(spanAuteurElt);
}

// Pour chaque entrée du tableau listeLiens, appelle la fonction "lien"
for (var i = 0, c = listeLiens.length; i < c; i++) {
  liens(listeLiens[i].titre, listeLiens[i].url, listeLiens[i].auteur);
}


//////////////////////////////////////////////////////////////
// Activité 2 - 20/07/2019
//////////////////////////////////////////////////////////////

// fonction "addLink"
function addLink(){

  // div "zoneAdd" dans une variable
  var zoneAddElt = document.getElementById("zoneAdd");
  // Création d'un élément formulaire "form"
  var formElt = document.createElement("form");
  // Ajout d'un id "form"
  formElt.id = "form";

  // Remplacer le bouton par le formulaire
  zoneAddElt.replaceChild(formElt, buttonElt);

  // insérer dans le formulaire les élément input
  document.getElementById("form").innerHTML += '<input type="text" id="nom" placeholder="Entrez votre nom" required><input type="text" style="width:230px;margin-right:2px" id="titre" placeholder="Entrez le titre du lien" required><input type="text" style="width:230px;margin-right:2px" id="lien" placeholder="Entrez l\'url du lien" required><input type="submit" value="Ajouter">';

  // Activer le focus sur le premier input
  document.getElementById("nom").focus();

  // Ajout d'un événement "submit" sur le formulaire
  form.addEventListener("submit", function(e){
    // Récupérer les saisies
    var nom = form.elements.nom.value;
    var titre = form.elements.titre.value;
    var lien = form.elements.lien.value;

    // Vérification du lien
    // Création des regex
    var http = /http:\/\/.+/;
    var https = /https:\/\/.+/;
    // Si "lien" ne commence pas par l'un ou l'autre des motifs, on ajoute "http://" au début
    if (!http.test(lien) && !https.test(lien)) {
      lien = "http://" + lien;
    }

    // Insérer les données dans le tableau "listeLiens"
    listeLiens.unshift({
      titre: titre,
      url: lien,
      auteur: nom
    });
    // Remplacer le formulaire par le bouton
    zoneAddElt.replaceChild(buttonElt, formElt);
    // Vider le contenu de la div contenu
    contenuElt.innerHTML = "";
    // Nouvelle boucle pour chaque entée d'un tableau, appel de "liens"
    for (var i = 0, c = listeLiens.length; i < c; i++) {
      liens(listeLiens[i].titre, listeLiens[i].url, listeLiens[i].auteur);
    }

    // Ajout d'un élément "p" qui sera supprimer après 2 secondes
    zoneAddElt.insertAdjacentHTML("afterBegin", '<p id="info" style="background-color:#D7ECF5;color:#2874A0;padding:20px;border-radius:5px">Le lien "' + titre + '" a bien été ajouté.</p>');
    setTimeout(function () {
        zoneAddElt.removeChild(document.getElementById("info"));
    }, 2000);

    // Annuler l'envoie des données du formulaire
    e.preventDefault();
  });
}

// Element d'id "contenu" dans variable
var contenuElt = document.getElementById("contenu");

// Insertion d'une div et d'un bouton AVANT la div "contenu"
contenuElt.insertAdjacentHTML("beforeBegin", '<div id="zoneAdd"><button id="button">Ajouter un lien</button></div>');

// Element bouton dans une variable
var buttonElt = document.getElementById("button");
// Ajout d'un événement "click" sur le bouton et appel de la fonction "addLink"
buttonElt.addEventListener("click", addLink);
