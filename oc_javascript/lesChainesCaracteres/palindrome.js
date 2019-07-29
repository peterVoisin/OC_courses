/*Complétez le programme pour définir la fonction estPalindrome() qui renvoie vrai ou faux selon que le mot soit un palindrome ou non.

Il existe deux techniques pour construire le mot inversé :

Parcourir le mot initial lettre à lettre en ajoutant chaque lettre au début (et non à la fin) du mot inversé.
Parcourir le mot initial lettre à lettre, mais à l'envers (de la fin vers le début).
La vérification ne doit pas tenir compte des distinctions entre majuscules et minuscules : "RADAR" est un palindrome, "Radar" aussi.
*/


// AJoutez votre code ici

function estPalindrome(word){
  let stock = "";
  for (let i of word){
    stock = i + stock;
  }
  if (stock.toLowerCase() === word.toLowerCase()){
    return true;
  } else {
    return false;
  }
}

console.log(estPalindrome("RadAr")); // true
console.log(estPalindrome("KAYAk")); // true
console.log(estPalindrome("Bora-Bora")); // false
