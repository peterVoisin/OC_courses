/*Maximum d'un tableau

Complétez le programme pour qu'il calcule et affiche ensuite la plus grande valeur présente dans le tableau.

*/

const valeurs = [3, 11, 7, 2, 15, 9, 10];

// Ajoutez votre code ici
let max = 0;
for (valeur of valeurs) {
  if (valeur > max){
    max = valeur;
  }
}
console.log(max);
