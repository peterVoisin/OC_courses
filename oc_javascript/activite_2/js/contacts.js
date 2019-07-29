/*
Activité : gestion des contacts
*/

// TODO : complétez le programme

// Classe création contact avec une méthode.
class Contact {
  constructor(nom,prenom) {
    this.nom = nom;
    this.prenom = prenom;
  }
  // Méthode qui retourne les propriétées de l'objet.
  decrire(){
    return `Nom : ${this.nom}, prénom : ${this.prenom}`;
  }
}

// Déclaration d'un tableau "carnet"
const carnet = [];
// Création des deux contacts demandés + stockage dans "carnet"
carnet.push(new Contact("Lévisse", "Carole"));
carnet.push(new Contact("Nelsonne", "Mélodie"));

// Déclaration des variables qui stockeront les saisies
let saisie = "";
let saisieNom = "";
let saisiePrenom = "";

// Message de Bienvenue
console.log(`Bienvenue dans le gestionnaire des contacts !`);

// Tant que "saisie" ne vaut pas "0"
while (saisie !== "0"){
  // Afficher la liste des actions possibles
  console.log(`
    1 : Lister les contacts
    2 : Ajouter un contact
    0 : Quiter`);
  // Popup de saisie
  saisie = prompt("Choisissez une option :");

  switch (saisie) {
    case "0":
      // Si "saisie" vaut "0" on quitte le script
      console.log("Fin du script");
      break;
    case "1":
      // Si "saisie" vaut "1" on affiche la liste des contacts
      console.log("Voici la liste de tous vos contacts :");
      carnet.forEach(list => {
        console.log(list.decrire());
      });
      break;
    case "2":
      // Si "saisie" vaut "2" on demande le contact à créer
      saisieNom = prompt("Entrez le nom du nouveau contact :");
      saisiePrenom = prompt("Entrez le prénom du nouveau contact :");
      carnet.push(new Contact(saisieNom,saisiePrenom));
      console.log("Le nouveau contact a bien été ajouté !");
      break;
    default:
      // Messge pour une saisie hors des actions possibles
      console.log("Il faut saisir 1, 2 ou 0 !");
  }
}
