// Liste des mots du dictionnaire
var mots = [
    {
        terme: "Procrastination",
        definition: "Tendance pathologique à remettre systématiquement au lendemain"
    },
    {
        terme: "Tautologie",
        definition: "Phrase dont la formulation ne peut être que vraie"
    },
    {
        terme: "Oxymore",
        definition: "Figure de style qui réunit dans un même syntagme deux termes sémantiquement opposés"
    }
];

// TODO : créer le dictionnaire sur la page web, dans la div "contenu"
function dico(terme, definition) {
  var dtElt = document.createElement("dt");
  var ddElt = document.createElement("dd");
  dtElt.id = "dt";
  ddElt.id = "dd";
  dtElt.textContent = terme;
  ddElt.textContent = definition;
  document.getElementById("dl").insertAdjacentHTML("beforeend", `<strong>${terme}</strong>`);
  document.getElementById("dl").appendChild(ddElt);
}

var dlElt = document.createElement("dl");
dlElt.id = "dl";
document.getElementById("contenu").appendChild(dlElt);

for (var i = 0, c = mots.length; i < c; i++) {
  var def = mots[i];
  dico(def.terme, def.definition);
}
