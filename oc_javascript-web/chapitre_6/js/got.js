// Liste de quelques maisons de Game of Thrones. Chaque maison a un code et un nom
var maisons = [
    {
        code: "ST",
        nom: "Stark"
    },
    {
        code: "LA",
        nom: "Lannister"
    },
    {
        code: "BA",
        nom: "Baratheon"
    },
    {
        code: "TA",
        nom: "Targaryen"
    }
];

// Renvoie un tableau contenant quelques personnages d'une maison
function getPersonnages(codeMaison) {
    switch (codeMaison) {
    case "ST":
        return ["Eddard", "Catelyn", "Robb", "Sansa", "Arya", "Jon Snow"];
    case "LA":
        return ["Tywin", "Cersei", "Jaime", "Tyrion"];
    case "BA":
        return ["Robert", "Stannis", "Renly"];
    case "TA":
        return ["Aerys", "Daenerys", "Viserys"];
    default:
        return [];
    }
}

for (var i = 0; i < maisons.length; i++) {
  document.getElementById("maison").innerHTML += '<option value="'+
    maisons[i].code+'">'+maisons[i].nom+'</option>';
}

document.getElementById("maison").addEventListener("change", function(e){
  var getMaison = getPersonnages(e.target.value);
  var ulElt = document.getElementById("persos");
  ulElt.innerHTML = "";
  for (var i = 0; i < getMaison.length; i++) {
    var liElt = document.createElement("li");
    liElt.textContent = getMaison[i];
    ulElt.appendChild(liElt);
  }
});
