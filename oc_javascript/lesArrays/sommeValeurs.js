/*Somme des valeurs

Complétez le programme pour calculer puis afficher la somme des valeurs du tableau nombres.

*/


const nombres = [11, 3, 7, 2, 9, 10];

// Ajoutez votre code ici
let somme = 0;
for (let i = 0; i < nombres.length; i++){
  somme += nombres[i];
}
console.log(somme);
