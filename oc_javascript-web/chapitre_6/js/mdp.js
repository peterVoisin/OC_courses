var form = document.querySelector("form");
form.addEventListener("submit", function(e) {
  var mdp1 = form.elements.mdp1.value;
  var mdp2 = form.elements.mdp2.value;
  var regexMdp = /[0-9]+/;
  if (mdp1.length < 6) {
    document.getElementById("infoMdp").textContent = "Erreur : la longueur minimale du mot de passe est de 6 caractères";
  } else if (!regexMdp.test(mdp1)) {
    document.getElementById("infoMdp").textContent = "Erreur : le mot de passe doit contenir au moins un chiffre";
  } else if (mdp1 !== mdp2) {
    document.getElementById("infoMdp").textContent = "Erreur : les mots de passe doivent être identiques";
  }
  e.preventDefault(); // Annulation de l'envoi des données
});
