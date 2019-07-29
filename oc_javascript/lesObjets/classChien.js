/*
Complétez le programme en ajoutant la définition
de la classe Chien afin d'obtenir le résultat d'exécution désiré.

Les chiens mesurant plus de 50 cm aboient
en faisant "Grrr ! Grrr !", les autres font "Wouaf ! Wouaf !"
*/

// Ajoutez votre code ici

class Chien {
  constructor(nom, race, taille) {
    this.nom = nom;
    this.race = race;
    this.taille = taille;
  }

  decrire() {
    return `${this.nom} est un ${this.race} mesurant ${this.taille} cm`;
  }

  aboyer() {
    if (this.taille > 50){
      return "Grrr ! Grrr !";
    } else {
      return "Wouaf ! Wouaf !";
    }
  }
}

const crockdur = new Chien("Crockdur", "mâtin de Naples", 75);
// "Crockdur est un mâtin de Naples mesurant 75 cm"
console.log(crockdur.decrire());
// "Tiens, un chat ! Crockdur aboie : Grrr ! Grrr !"
console.log(`Tiens, un chat ! ${crockdur.nom} aboie : ${crockdur.aboyer()}`);

const milou = new Chien("Milou", "fox-terrier", 26);
// "Milou est un fox-terrier mesurant 26 cm"
console.log(milou.decrire());
// "Tiens, un chat ! Milou aboie : Wouaf ! Wouaf !"
console.log(`Tiens, un chat ! ${milou.nom} aboie : ${milou.aboyer()}`);
