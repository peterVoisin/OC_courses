/*Expérience du personnage
Complétez le programme pour ajouter à l'objet
aurora défini dans le cours une propriété
nommée xp représentant son expérience.
Sa valeur initiale est de 0.

L'expérience doit apparaître dans la description du personnage.
*/


// Ajoutez votre code ici
const aurora = {
  nom: "Aurora",
  sante: 150,
  force: 25,
  xp: 0,

  // Renvoie la description du personnage
  decrire() {
    return `${this.nom} a ${this.sante} points de vie, ${this.force} en force et ${this.xp} points d'expérience`;
  }
};
// "Aurora a 150 points de vie, 25 en force et 0 points d'expérience"
console.log(aurora.decrire());

console.log("Aurora apprend une nouvelle compétence");
aurora.xp += 15;

// "Aurora a 150 points de vie, 25 en force et 15 points d'expérience"
console.log(aurora.decrire());
