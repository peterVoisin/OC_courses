var form = document.querySelector("form");
form.addEventListener("submit", function(e){
  e.preventDefault();
  // Récupération des champs du formulaire dans l'objet FormData
  var data = new FormData(form);
  //data.append(form.titre);
  //data.append(form.contenu);
  // Envoi des données du formulaire au serveur
  // La fonction callback est ici vide
  ajaxPost("https://oc-jswebsrv.herokuapp.com/article", data, function(response){
    // Affichage dans la console en cas de succès
    var notifElt = document.createElement("p");
    notifElt.textContent = "L'article a bien été ajouté.";
    document.body.appendChild(notifElt);
  });
});
