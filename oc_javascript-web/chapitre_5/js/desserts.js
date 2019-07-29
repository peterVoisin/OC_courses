function addDessert(){
  var newD = prompt("Entrez le nom du nouveau dessert :");
  var newElt = document.createElement("li");
  newElt.id = newD;
  newElt.textContent = newD;
  document.getElementById("desserts").appendChild(newElt);
  desserts.push(newD);
  index = desserts.indexOf(newD);
  document.getElementById(newD).addEventListener("click", function(e) {
    modif = prompt("Modifiez le nom du dessert :");
    e.target.textContent = modif;
    desserts.splice(index, 1, modif);
  });
}

let desserts = [];
let index = "";
document.querySelector("button").addEventListener("click", addDessert);

// correction
/*
Exercice : modifier une liste


document.querySelector("button").addEventListener("click", function () {
    var nomDessert = prompt("Entrez le nom du nouveau dessert :");

    var dessertElt = document.createElement("li");
    dessertElt.textContent = nomDessert;
    dessertElt.addEventListener("click", function (e) {
        var nouveauNom = prompt("Modifiez le nom du dessert :", e.target.textContent);
        e.target.textContent = nouveauNom;
    });

    document.getElementById("desserts").appendChild(dessertElt);
});
*/
