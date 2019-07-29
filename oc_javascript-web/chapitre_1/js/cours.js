// Accéder au DOM avec la variable document
var h = document.head;
console.log(h);

var b = document.body;
console.log(b);

// Découvrir le type d'un nœud
if (document.body.nodeType === document.ELEMENT_NODE) {
  console.log("Body est un nœud élément");
} else {
  console.log("Body est un nœud textuel");
}

// Accéder aux enfants d'un nœud élément
console.log(document.body.childNodes[0]);
console.log(document.body.childNodes[1]);

// Parcourir la liste des nœuds enfants
for (var i = 0; i < document.body.childNodes.length; i++) {
    console.log(document.body.childNodes[i]);
}

// Accéder au parent d'un nœud
var h1 = document.body.childNodes[1];
console.log(h1.parentNode); // Affiche le nœud Body

console.log(document.parentNode); // Affichce null : document n'a aucun nœud parent
