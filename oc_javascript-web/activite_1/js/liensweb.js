/*
Activité 1
*/

// Liste des liens Web à afficher. Un lien est défini par :
// - son titre
// - son URL
// - son auteur (la personne qui l'a publié)
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

// TODO : compléter ce fichier pour ajouter les liens à la page web

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
