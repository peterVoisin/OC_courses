/*
Reprenons le contexte des comptes en banque issu d'un précédent exercice.
Un compte bancaire sera modélisé par une classe définie comme suit :

Une propriété titulaire initialisée par le constructeur.
Une propriété solde valant initialement 0.
Une méthode crediter() ajoutant le montant passé en paramètre (éventuellement négatif) au solde du compte.
Une méthode decrire() renvoyant la description du compte.

Ecrivez un programme qui crée 3 comptes bancaires,
l'un appartenant à Alex, le deuxième à CLovis et le troisième à Marco.
Stockez ces comptes dans un tableau.

Ensuite, le programme crédite 1000 € et affiche la description de chacun des comptes.
*/


// Ajoutez votre code ici
class CompteBancaire {
  constructor(titulaire) {
    this.titulaire = titulaire;
    this.solde = 0;
  }

  crediter(montant, op) {
    if (op === "+") {
      this.solde += montant;
      console.log(`Le compte de ${this.titulaire} a été crédité de ${montant}`);
    } else if (op === "-") {
      this.solde -= montant;
      console.log(`Le compte de ${this.titulaire} a été débité de ${montant}`);
    } else {
      console.log("Le deuxième argument doit être \"+\" ou \"-\" !");
    }
  }

  decrire() {
    return `Le compte de ${this.titulaire} a un solde de ${this.solde}`;
  }
}

const listeComptes = [];

// Ajoute 3 comptes bancaires à la liste
listeComptes.push(new CompteBancaire("Alex"));
listeComptes.push(new CompteBancaire("Clovis"));
listeComptes.push(new CompteBancaire("Marco"));

// Crédite et décrit chaque compte
listeComptes.forEach(compte => {
  compte.crediter(1000,"+");
  console.log(compte.decrire());
});
