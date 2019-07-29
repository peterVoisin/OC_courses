
class contact {

	//initialise le contact
	constructor (nom, prenom){
		this.nom = nom;
		this.prenom = prenom;
	}

	//renvoie la description du contact
	decrire(){
		return `Nom : ${this.nom}, prénom : ${this.prenom}`;
	}
}


// Création des deux premiers contacts
const contactUn = new contact("Lévisse", "Carole");
const contactDeux = new contact("Nelsonne", "Mélodie");

// Création des tableaux contacts et options
const contacts = [];
    contacts.push(contactUn);
    contacts.push(contactDeux);
    

// Affichage du mot de bienvenue et du choix des options
console.log("Bienvenue dans le gestionnaire de contact !");
console.log("1 : Lister les contacts");
console.log("2 : Ajouter un contact");
console.log("0 : Quittez");


while (true) {

    // Saisie utilisateur
    let saisie = Number(prompt("Choisissez une option"));

    if (saisie === 0) { // Quitter
        break;

    } else if (saisie === 1) {  // Affiche liste contacts
        console.log("\nVoici la liste de tous vos contacts :");
        contacts.forEach (function (contact) {
        console.log(contact.decrire());
        });

    } else if (saisie === 2) {  // Ajout contact
        let nom = prompt("Entrez le nom du nouveau contact :");
        let prenom = prompt("Entrez le prénom du nouveau contact :");

        ajoutContact = new contact(nom, prenom);  // Initialise nouveau contact
        contacts.push(ajoutContact);            // Ajout nouveau contact au tableau

        console.log("\nLe contact a bien été ajouté !");

    } else {
        console.log("\nSaisie incorrect !");    // Si mauvaise valeur saisie
    }
}
console.log("\nAu revoir !");