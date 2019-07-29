/*Calculatrice
Complétez le programme pour que la fonction
calculer() gère les 4 opérations mathématiques
de base : addition, soustraction, multiplication et division.
*/


// Ajoutez votre code ici
function calculer (a,b,c){
  let op = "";
  switch (b) {
    case "/" && 0:
      op = "Infinity";
      return op;
      break;
    case "+":
      op = a + c;
      return op;
      break;
    case "-":
      op = a - c;
      return op;
      break;
    case "*":
      op = a * c;
      return op;
    case "/":
      op = a / c;
      return op;
      break;
  }
}


console.log(calculer(4, "+", 6));  // 10
console.log(calculer(4, "-", 6));  // -2
console.log(calculer(2, "*", 0));  // 0
console.log(calculer(12, "/", 0)); // Infinity
