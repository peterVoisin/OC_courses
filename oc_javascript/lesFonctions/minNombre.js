/*Minimum de deux nombres
En supposant que la fonction JavaScript Math.min()n'existe pas, complétez le programme pour que la fonction min() renvoie le plus petit des deux nombres passés en paramètres.
*/

// Ajoutez votre code ici
function min (a,b){
  if (a > b) {
    return b;
  } else {
    return a;
  }
}

console.log(min(4.5, 5)); // 4.5
console.log(min(19, 9));  // 9
console.log(min(1, 1));   // 1
