let heures = 14; // Faire varier cette variable entre 0 et 23
let minutes = 17; // faire varier cette variable entre 0 et 59
let secondes = 59; // faire varier cette variable entre 0 et 59


if ((heures === 23) && (minutes === 59) && (secondes === 59)) {
  secondes = 0;
  minutes = 0;
  heures = 0;
} else if ((minutes === 59) && (secondes === 59)) {
  secondes = 0;
  minutes = 0;
  heures++;
} else if (secondes === 59) {
  secondes = 0;
  minutes++;
} else {
  secondes++;
}


console.log(heures+"h"+minutes+"m"+secondes+"s");
