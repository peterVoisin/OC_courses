// Sélectionner des éléments
console.log(document.body.childNodes[5].childNodes[1]);

// Sélection d'éléments selon leur balise
// getElementsByTagName()
var titresElts = document.getElementsByTagName("h2");
console.log(titresElts[0]); // Affiche le premier titre h2
console.log(titresElts.length); // Affiche le nombre de h2

// Sélection d'éléments selon leur classe
// getElementsByClassName()
// Tous les éléments ayant la classe "merveilles"
var merveillesElts = document.getElementsByClassName("merveilles");
for (var i = 0; i < merveillesElts.length; i++) {
  console.log(merveillesElts[i]);
}

// Sélection d'un élément selon son identifiant
// getElementById
// Elément portant l'identifiant "nouvelles"
console.log(document.getElementById("nouvelles"));

// Sélection d'éléments à partir d'un sélecteur CSS
// Tous les éléments fils de l'élément d'indentifiant "antiques" ayant la classe "existe"
console.log(document.getElementById("antiques").getElementsByClassName("existe").length);

// Tous les paragraphes
console.log(document.querySelectorAll("p").length); // Affiche 3
// Tous les paragraphes à l'intérieur de l'élément identifié par "contenu"
console.log(document.querySelectorAll("#contenu p").length); // Affiche 2
// Tous les éléments ayant la classe "existe"
console.log(document.querySelectorAll(".existe").length); // Affiche 8

// Tous les éléments fils de l'élément identifié par "antiques" ayant la classe "existe"
console.log(document.querySelectorAll("#antiques > .existe").length); // Affiche 1

// Le premier paragraphe
console.log(document.querySelector("p"));


// Obtenir des informations sur les éléments

// Le contenu HTML
// innerHTML
// Le contenu HTML de l'élément identifié par "contenu"
console.log(document.getElementById("contenu").innerHTML);

// Le contenu textuel
// textContent
// Le contenu textuel de l'élément identifié par "contenu"
console.log(document.getElementById("contenu").textContent);

// Les attributs
// getAttribute
// L'attribut href de premier lien
console.log(document.querySelector("a").getAttribute("href"));

// L'identifiant de la première liste
console.log(document.querySelector("ul").id);

// L'attribut href du premier lien
console.log(document.querySelector("a").href);

// Vérifier la présence d'un attribut sur un élément avec hasAttribute
if (document.querySelector("a").hasAttribute("target")) {
  console.log("Le premier lien possède l'attribut target");
} else {
  console.log("Le premier lien ne possède pas l'attribut target");
}

// Les classes
// Liste des classes de l'élément identifié par "antiques"
var classes = document.getElementById("antiques").classList;
console.log(classes.length); // Affiche 1 : l'élément possède une seule classe
console.log(classes[0]); // Affiche "merveilles"

// Avec contains
if (document.getElementById("antiques").classList.contains("merveille")) {
    console.log("L'élément identifié par antiques possède la classe merveille");
} else {
    console.log("L'élément identifié par antiques ne possède pas la classe merveille");
}
