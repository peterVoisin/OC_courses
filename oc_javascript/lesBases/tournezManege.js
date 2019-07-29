/* Tournez manège
Complétez ce programme pour qu'il fasse 10 tours de manège
en affichant le numéro du tour à chaque tour :
*/

const nbTours = 10;

console.log("Le manège démarre");

let tour = 1
while (tour <= nbTours){
  console.log(`C'est le tour numéro ${tour}`);
  tour++;
}

for (let i = 1; i <= nbTours; i++) {
  console.log(`C'est le tour numéro ${i}`);
}

console.log("Le manège s'arrête");
