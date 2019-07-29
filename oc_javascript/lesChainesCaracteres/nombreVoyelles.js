/*Nombre de voyelles
Complétez le programme en y ajoutant
une fonction compterVoyelles() qui prend
un mot en paramètre et renvoie son nombre de voyelles.

Une voyelle en majuscules reste une voyelle...
A vous d'en tenir compte. En revanche,
vous n'êtes pas obligé.e de gérer les accents.
*/

// Ajoutez votre code ici
function compterVoyelles(mot){
  let voyelles = ["a","e","i","o","u","y"];
  let compteur = 0;
  for (const letters of mot.toLowerCase()){
    for (const voyelle of voyelles){
      if (voyelle === letters){
        compteur++;
      }
    }
  }
  return compteur;
}


console.log(compterVoyelles("RadAr")); // 2
console.log(compterVoyelles("Tic et Tac")); // 3
console.log(compterVoyelles("Oasis Oasis Oh")); // 7
