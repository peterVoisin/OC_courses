/* 
Activité : gestion des contacts
*/

// TODO : complétez le programme

class Contact { // Creation de la classe Contact
    constructor(nom, prenom){
        this.nom = nom;
        this.prenom = prenom;
        }
        
    afficher(){ // Affiche le nom et le prénom d'un contact
        document.write(`<p>Nom : ${this.nom}, Prénom : ${this.prenom}</p>`);
        }
}

const contacts = [new Contact("Lévisse", "Carole"), new Contact("Nelsonne", "Mélodie")]; // Liste des contacts

function afficherContacts(){ // Affiche la liste de tous les contacts
    contacts.forEach(contact =>{
        document.write("<p>Voici la liste de vos contacts :</p>");
        contact.afficher();
        });
}

// Arrivée de l'utilisateur
document.write("Bienvenue !");
afficherContacts();

// Pour s'adapter aux actions désirées par l'utilisateur, on introduit la variable choix
let choix = 0;
while (choix === 0){
    choix = Number(prompt("Que voulez-vous faire ?\n0 : Afficher les contacts\n1 : Ajouter un nouveau contact \n2 : Quitter"));
    
    if (choix === 0) // Affiche la liste des contacts
        afficherContacts();
        
    else if (choix === 1){ // On demande à l'utilisateur le nom et prénom du contact, puis on le crée
        let nom = prompt("Entrez le nom du contact :");
        let prenom = prompt("Entrez le prénom du contact :");
        contacts.push(new Contact(nom, prenom));
        document.write("<p>Le contact a bien été ajouté</p>");
        choix = 0;
    }    
}
