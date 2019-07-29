class Contact {
    constructor(nom,prenom) {
        this.nom = nom;
        this.prenom = prenom;
    }
decrire() {
    return `${Contact.nom} ${Contact.prenom}`;
}
};

const contactUn = new Contact("Lévisse","Carole");
const contactDeux = new Contact("Nelsonne","Mélodie");

let contacts=[];
contacts.push(contactUn);
contacts.push(contactDeux);

let options= ["1 : Lister les contacts", "2  Ajouter un contact", "0 : Quitter"];
console.log ("Bienvenue dans le gestionnaire de contacts !");
let choix = Number;
while (choix !== 0) {
    for(let i = 0; i <options.length;i++) {
        console.log(options[i]);
    };
    choix = Number(prompt("Choisissez une option :"));
    switch(choix) {
        case 1:
            console.log("Vos Contacts");
        for(let i = 0; i < contacts.length; i++) {
            console.log(`Nom du contact: ${contacts[i].nom}, Prénom du contact: ${contacts[i].prenom}.`);
        }
        break;
        case 2:
        let nom= prompt("Entrez le nom du nouveau contact");
        let prenom= prompt("Entrez le prénom du nouveau contact");
        const newContact = new Contact(nom, prenom);
        contacts.push(newContact);
        console.log(`${newContact.prenom} a bien été ajouté à vos contacts`);
        break;
        case 0:
        console.log(" Au revoir :)");
        break;
        default:
        console.log("Vous devez rentrer un chiffre entre 0 et 2");
    }
       
}



