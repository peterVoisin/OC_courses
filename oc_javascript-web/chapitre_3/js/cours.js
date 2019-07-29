//Modifier un élément existant

//Le contenu HTML

// Modificatioin du contenu HTML de la liste : ajout d'un languge
document.getElementById("langages").innerHTML += '<li id="c">C</li>';

// Suppression du contenu HTML de la liste
//document.getElementById("langages").innerHTML = "";


// Le contenu textuel

//Modification du contenu textuel de premier titre
document.querySelector("h1").textContent += " de programmation";

// Les attributs

// Définition de l'attribut "id" du premier titre
document.querySelector("h1").setAttribute("id", "titre");
// équivalent
// document.querySelector("h1").id = "titre";

// Les classes

// ajouter / supprimer des classes avec "classList"
var titreElt = document.querySelector("h1"); //Accès au premier titre h1
titreElt.classList.remove("debut"); // Suppression de la classe "debut"
titreElt.classList.add("titre"); // Ajout de la classe "titre"
console.log(titreElt);


//Ajouter un nouvel élément

// ajouter le langage "Python" à la liste des langages de notre page
var pythonElt = document.createElement("li"); // Création d'un élément li
pythonElt.id = "python"; // définition de son identifiant
pythonElt.textContent = "Python"; // Défifnition de son contenu
document.getElementById("langages").appendChild(pythonElt); // Insertion du nouvel élément


// Variantes pour ajouter un élément

// Création d'un noeud textuel avec "createTextNode"
var rubyElt = document.createElement("li"); // Creation d'un élément "li"
rubyElt.id = "ruby"; // Définition de son identifiant
rubyElt.appendChild(document.createTextNode("Ruby")); // Définition de son contenu textuel
document.getElementById("langages").appendChild(rubyElt); // Insertion de nuvel élément

// Ajout d'un noeud avant un autre noeud

// ajoute le langage Perl avant le langage PHP dans la liste
var perlElt = document.createElement("li"); // Création d'un élément "li"
perlElt.id = "perl"; // définition de sonidentifiant
perlElt.textContent = "Perl"; //Définition de son contenu textuel
// Ajout du nouvel élément avant l'identifiant identifié par "php"
document.getElementById("langages").insertBefore(perlElt, document.getElementById("php"));

// Choix de la position exacte du nouveau noeud

// Ajout d'un élément au tout début de la liste
document.getElementById('langages').insertAdjacentHTML("afterBegin", '<li id="javascript">JavaScript</li>');


// Remplacer ou supprimer un noeud
// Remplacer le langage Perl par un nouvel élément correspondant au langage Bash
var bashElt = document.createElement("li"); // Création d'un élément "li"
bashElt.id = "bash";
bashElt.textContent = "Bash";
document.getElementById("langages").replaceChild(bashElt, document.getElementById("perl"));

// Supprimer un noeud existant
document.getElementById("langages").removeChild(document.getElementById("bash"));


// Exercice

document.getElementById('contenu').insertAdjacentHTML("beforeend", '<p id="exercice1">En voici une <a href="https://fr.wikipedia.org/wiki/Liste_des_langages_de_programmation">liste</a> plus compète.</p>');
