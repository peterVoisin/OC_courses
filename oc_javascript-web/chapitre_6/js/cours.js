var pseudoElt = document.getElementById("pseudo");
pseudoElt.value = "MonPseudo";

// Affichage d'un message contextuel pour la saisie du pseudo
pseudoElt.addEventListener("focus", function() {
  document.getElementById("aidePseudo").textContent = "Entrez votre pseudo";
});
// Suppression du message contextuel pour la saisie du pseudo
pseudoElt.addEventListener("blur", function(e) {
  document.getElementById("aidePseudo").textContent = "";
});

// Focus sur la zone de saisie du pseudo
pseudoElt.focus();

// Affichage de la demande de confirmation d'inscription
document.getElementById("confirmation").addEventListener("change", function(e) {
  console.log("Demande de confirmation : " + e.target.checked);
});

// Affichage de type d'abonnemet choisi
var aboElts = document.getElementsByName("abonnement");
for (var i = 0; i < aboElts.length; i++) {
  aboElts[i].addEventListener("change", function(e) {
    console.log("Formule d'abonnement choisie : " + e.target.value);
  });
}

//Affichage du code de nationalité choisi
document.getElementById("nationalite").addEventListener("change", function(e) {
  console.log("code de nationalité : " + e.target.value);
});

// informations sur les champs de saisie du formulaire
var form = document.querySelector("form");
console.log("Nombre de champs de saisie : " + form.elements.length);
console.log(form.elements[0].name);
console.log(form.elements.mdp.type);

// Affichage de toutes les données saisies ou choisies
form.addEventListener("submit", function(e) {
  var pseudo = form.elements.pseudo.value;
  var mdp = form.elements.mdp.value;
  var courriel = form.elements.courriel.value;
  console.log("Vous avez choisi le pseudo " + pseudo + ", le mot de passe " +
    mdp + " et le courriel " + courriel);
  if (form.elements.confirmation.checked) {
    console.log("Vous avez demandé une confirmation d'inscription par courriel");
  } else {
    console.log("Vous n'avez pas demandé de confirmation d'inscription par courriel");
  }
  switch (form.elements.abonnement.value) {
    case "abonewspromo":
      console.log("Vous êtes abonné(e) à la newsletter et aux promotions");
      break;
    case "abonews":
      console.log("Vous êtes abonné(e) à la newsletter");
      break;
    case "aborien":
      console.log("Vous n'êtes abonné(e) à rien");
      break;
    default:
      console.log("Erreur : code d'abonnement non reconnu");
  }
  switch (form.elements.nationalite.value) {
    case "FR":
      console.log("Vous êtes français(e)");
      break;
    case "BE":
      console.log("Vous êtes belge");
      break;
    case "SUI":
      console.log("Vous n'êtes suisse");
      break;
    default:
      console.log("Erreur : code nationalité non reconnu");
  }
  e.preventDefault(); // Annulation de l'envoi des données
});

// Vérification de la longueur du mot de passe saisie
document.getElementById("mdp").addEventListener("input", function(e) {
  var mdp = e.target.value; // Valeur saisie dan sle champ mdp
  var longueurMdp = "faible";
  var couleurMsg = "red"; // Longueur faible => couleur rouge
  if (mdp.length >= 8) {
    longueurMdp = "suffisante";
    couleurMsg = "green";
  } else if (mdp.length >= 4) {
    longueurMdp = "moyenne";
    couleurMsg = "orange";
  }
  var aideMdpElt = document.getElementById("aideMdp");
  aideMdpElt.textContent = "Longueur : " + longueurMdp; // Texte de l'aide
  aideMdpElt.style.color = couleurMsg; // Couleur de texte de l'aide
});

// Contrôle du courriel en fin de saisie
/*document.getElementById("courriel").addEventListener("blur", function(e) {
  var validiteCourriel = "";
  if (e.target.value.indexOf("@") === -1) {
    // Le courriel saisi ne contient pas le caractère "@"
    validiteCourriel = "Adresse invalide";
  }
  document.getElementById("aideCourriel").textContent = validiteCourriel;
});*/

// Expression régulière
// présence du caractère "@" dans un chaine
var regex = /@/; // La chaine doit contenir le caractère "@"
console.log(regex.test("")); // affiche false
console.log(regex.test("@")); // affiche true
console.log(regex.test("sophie&mail.fr")); // affiche false
console.log(regex.test("sophie@mail.fr")); // affiche true

// Contrôle du courriel en fin de saisie
document.getElementById("courriel").addEventListener("blur", function(e){
  // Correspond à une chaine de la forme "xxx@yyy.zzz"
  var regexCourriel = /.+@.+\..+/;
  var validiteCourriel = "";
  if (!regexCourriel.test(e.target.value)) {
    validiteCourriel = "Adresse invalide";
  }
  document.getElementById("aideCourriel").textContent = validiteCourriel;
});
