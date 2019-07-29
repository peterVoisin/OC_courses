/*
Complétez ce programme issu du cours pour
y ajouter la gestion de l'inventaire des personnages.

Voici les améliorations à intégrer :

L'inventaire d'un personnage se compose d'un nombre
de pièces d'or et d'un nombre de clés.
Tous les personnages possèdent initialement 10 pièces d'or et une clé.
L'inventaire doit être affiché dans la description d'un joueur.
Lorsqu'un personnage tue un adversaire, il récupère dans son
propre inventaire le nombre de pièces d'or et de clés de cet adversaire.
*/

// Ajoutez votre code ici
class Personnage {
  constructor(nom, sante, force) {
    this.nom = nom;
    this.sante = sante;
    this.force = force;
    this.xp = 0;
    this.pieces = 10;
    this.cles = 1;
  }
  attaquer(cible) {
    if (this.sante > 0) {
      const degats = this.force;
      const bonusXP = 10;
      cible.sante -= degats;
      if (cible.sante <= 0) {
        cible.sante = 0;
        console.log(`${cible.nom} est tué`);
        this.xp += bonusXP;
        this.pieces += cible.pieces;
        cible.pieces = 0;
        this.cles += cible.cles;
        cible.cles = 0;
      }
    }
  }
  decrire() {
    return `${this.nom} a ${this.sante} point de vie, ${this.force} en force, ${this.xp} points d'expérience, ${this.pieces} pièces d'or et ${this.cles} clé(s)`;
  }
}

// "Aurora a 150 points de vie, 25 en force et 0 points d'expérience, 10 pièces d'or et 1 clé(s)"
const aurora = new Personnage("Aurora", 150, 25);

console.log(aurora.decrire());

const monstre = new Personnage("ZogZog", 20, 10);
monstre.attaquer(aurora);
aurora.attaquer(monstre); // Le monstre est tué

// "Aurora a 140 points de vie, 25 en force et 10 points d'expérience, 20 pièces d'or et 2 clé(s)"
console.log(aurora.decrire());
