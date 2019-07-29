/*Carré d'un nombre
Complétez le programme pour que les fonctions carre1() et carre2() calculent et renvoient le carré du nombre passé en paramètre.
*/

// Renvoie le carré de x
function carre1(x) {
  // Ajoutez votre code ici
  const calcul = x * x;
  return calcul;
}

// Renvoie le carré de x
const carre2 = x => x * x ; // Ajoutez votre code ici

console.log(carre1(0)); // 0
console.log(carre1(2)); // 4
console.log(carre1(5)); // 25

console.log(carre2(0)); // 0
console.log(carre2(2)); // 4
console.log(carre2(5)); // 25
