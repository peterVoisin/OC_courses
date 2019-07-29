/*Leet Speak
Le leet speak est un système d'écriture où certains caractères sont remplacés par d'autres afin de produire un résultat différent mais visuellement proche. Il est ou était souvent utilisé dans certaines communautés hackers et gamers.

Il existe de nombreuses variantes de l'alphabet leet. Je vous propose d'utiliser au minimum le suivant, que vous pourrez enrichir si vous le souhaitez.

Lettre	Equivalent leet
a	4
b	8
e	3
l	1
o	0
s	5
La conversion doit fonctionner indifféremment pour une lettre minuscule ou majuscule.
Complétez le programme en définissant la fonction convertirMotLeet() qui prend en paramètre un mot et renvoie son équivalent leet.

Afin d'alléger le code de la fonction convertirMotLeet(), vous pouvez créez une autre fonction convertirLettreLeet() qui prend en paramètre une lettre et renvoie son équivalent leet. Cette fonction sera appelée pour chaque lettre du mot initial.

let tabLetter = ["a","b","e","l","o","s"];
let tabLeet = ["4","8","3","1","0","5"];

//function afficher(index)

for (let i of tabLetter){
for (let j of tabLeet){
  //index = tabLeet.indexOf(j)
  //console.log(j);
  if (i != j){
    console.log(i);
    console.log(j);
  }
}
}


*/

// Ajoutez votre code ici

/*function convertirLettreLeet(letterToLeet){
  let tabLetter = ["a","b","e","l","o","s"];
  let tabLeet = ["4","8","3","1","0","5"];

  for (const i of letterToLeet){
    for (const j of tabLetter){
      if (i === j){
        let index = tabLetter.indexOf(j)
        //letterToLeet = tabLeet[index];
        //return letterToLeet;
      }
    }
  }
}

function convertirMotLeet(motToLeet){
  for (let letter of motToLeet){
    letter = convertirLettreLeet(letter);
  }
}*/

/*function convertirLettreLeet(letterToLeet){
  let aplha = "abelos";
  let num = "483105";

  for (let i of letterToLeet){
    for (let j of aplha){
      if (j === i){
        i = j;
        return i;
      }
      //console.log(j);
    }
    //console.log("##");
    //console.log(i);
  }
}*/
//console.log(convertirLettreLeet("Hello World!")); // "H3110 W0r1d!"


function convertirLettreLeet(letterToLeet){
  for (let i of letterToLeet){
    switch (i){
      case "a":
        return i = 4;
        break;
      case "b":
        return i = 8;
        break;
      case "e":
        return i = 3;
        break;
      case "l":
        return i = 1;
        break;
      case "o":
        return i = 0;
        break;
      case "s":
        return i = 5;
        break;
      default:
        return letterToLeet;
        break;
    }
  }
}

function convertirMotLeet(wordToLeet){
  const alpha = "abelos";
  let stock = "";
  let letterToLeet = "";

  for (let eachLetter of wordToLeet){
    for (let eachAlpha of alpha){
      if (eachLetter == eachAlpha){
        toLeet = convertirLettreLeet(eachLetter.toLowerCase());
        eachLetter = toLeet;
      }
    }
    stock = stock + eachLetter;
  }
  return stock;
}


//console.log(convertirMotLeet("o"));


console.log(convertirMotLeet("Hello World!")); // "H3110 W0r1d!"
console.log(convertirMotLeet("Noob")); // "N008"
console.log(convertirMotLeet("Hacker")); // "H4ck3r"
