// Liste des questions à afficher. Une question est définie par son énoncé et sa réponse
var questions = [
    {
        enonce: "Combien font 2+2 ?",
        reponse: "2+2 = 4"
    },
    {
        enonce: "En quelle année Christophe Colomb a-t-il découvert l'Amérique ?",
        reponse: "1492"
    },
    {
        enonce: "On me trouve 2 fois dans l'année, 1 fois dans la semaine, mais pas du tout dans le jour... Qui suis-je ?",
        reponse: "La lettre N"
    }
];


function afficherReponse(e) {
  switch (e.target.id) {
    case "b0":
      document.getElementById(e.target.id).replaceWith(reponse[0]);
      break;
    case "b1":
      document.getElementById(e.target.id).replaceWith(reponse[1]);
      break;
    case "b2":
      document.getElementById(e.target.id).replaceWith(reponse[2]);
      break;
    default:

  }
}

var numeroQ = "";
var idButton = "";
var buttons = [];
var reponse = [];

for (var i = 0, c = questions.length; i < c; i++) {
  numeroQ = i+1;
  var question = questions[i];
  var pElt = document.createElement("p");
  pElt.id = numeroQ;
  pElt.insertAdjacentHTML("afterBegin", '<strong>Question ' + numeroQ + ' :</strong> ' + question.enonce + '<br/>');
  document.getElementById("contenu").appendChild(pElt);
  var buttonElt = document.createElement("button");
  idButton = "b" + i;
  buttonElt.id = idButton;
  buttonElt.appendChild(document.createTextNode("Afficher la réponse"));
  document.getElementById(numeroQ).appendChild(buttonElt);
  reponse.push(question.reponse);
}

buttons = document.getElementsByTagName("button");
for (var i = 0, c = buttons.length; i < c; i++) {
  button = buttons[i];
  button.addEventListener("click", afficherReponse);
}


// coorection
/*
Exercice : questions de quiz
*/

// Liste des questions à afficher. Une question est définie par son énoncé et sa réponse
/*
var questions = [
    {
        enonce: "Combien font 2+2 ?",
        reponse: "2+2 = 4"
    },
    {
        enonce: "En quelle année Christophe Colomb a-t-il découvert l'Amérique ?",
        reponse: "1492"
    },
    {
        enonce: "On me trouve 2 fois dans l'année, 1 fois dans la semaine, mais pas du tout dans le jour... Qui suis-je ?",
        reponse: "La lettre N"
    }
];

var i = 1; // Permet de numéroter les questions

questions.forEach(function (question) {
    // Titre de la question
    var titreElt = document.createElement("strong");
    titreElt.textContent = "Question " + i + " : ";

    // Enoncé de la question (dans une balise <i>)
    var texteEnonceElt = document.createElement("i");
    texteEnonceElt.textContent = question.enonce;

    // Enoncé de lq question
    var enonceElt = document.createElement("div");
    enonceElt.appendChild(titreElt);
    enonceElt.appendChild(texteEnonceElt);

    // La zone de réponse contient initialement un bouton
    var zoneReponseElt = document.createElement("div");
    var boutonElt = document.createElement("button");
    boutonElt.textContent = "Afficher la réponse";
    zoneReponseElt.appendChild(boutonElt);

    boutonElt.addEventListener("click", function () {
        // Remplacement du bouton par la réponse à la question
        var reponseElt = document.createElement("div");
        reponseElt.textContent = question.reponse;
        zoneReponseElt.innerHTML = "";
        zoneReponseElt.appendChild(reponseElt);
    });

    // La question regroupe l'énoncé et la zone de réponse
    var questionElt = document.createElement("p");
    questionElt.appendChild(enonceElt);
    questionElt.appendChild(zoneReponseElt);
    document.getElementById("contenu").appendChild(questionElt);

    i++;
});*/
