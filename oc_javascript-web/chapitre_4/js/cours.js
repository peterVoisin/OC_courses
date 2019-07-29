//Le code ci-dessous sélectionne le premier paragraphe (balise <p> ) de la page, puis modifie la couleur du texte et les marges de ce paragraphe.﻿﻿
var pElt = document.querySelector("p");
pElt.style.color = "red";
pElt.style.margin = "50px";

// L'exemple ci-dessous modifie les propriétés CSS font-family et background-color du paragraphe sélectionné plus haut.﻿﻿
pElt.style.fontFamily = "Arial";
pElt.style.backgroundColor = "Black";


// Modifier le style d'un élément

// Récupérer des styles
var paragraphesElt = document.getElementsByTagName("p");
console.log(paragraphesElt[0].style.color);
console.log(paragraphesElt[1].style.color);
console.log(paragraphesElt[2].style.color); // n'affiche rien car dans fichier externe

// La fonction getComputedStyle
// L'exemple suivant affiche certaines propriétés CSS du troisième paragraphe.
var stylePara = getComputedStyle(document.getElementById("para"));
console.log(stylePara.fontStyle); // affiche "italic"
console.log(stylePara.color); // affiche la couleur vleue en valeurs RGB
