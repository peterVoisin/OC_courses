/*Table de multiplication
Complétez le programme pour afficher
la table de multiplication du nombre choisi.
*/

const nombre = 7; // Faites varier cette variable entre 1 et 10

console.log(`Table de multiplication de ${nombre}`);

// Ajoutez votre code ici
for (let i = 1; i <= 10; i++) {
  console.log(`${nombre} x ${i} = ${nombre * i}`);
}

let i = 1
while (i <= 10){
  console.log(`${nombre} x ${i} = ${nombre * i}`);
  i++;
}
