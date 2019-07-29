var form = document.querySelector("form");
// Gestion de la soumission du formulaire
form.addEventListener("submit", function (e) {
    e.preventDefault();
    // Récupération des champs du formulaire dans l'objet FormData
    var temoignage = {
      pseudo: e.target.elements.pseudo.value,
      evaluation: e.target.elements.note.value,
      message: e.target.elements.message.value
    };
    //console.log(data);
    // Envoi des données du formulaire au serveur
    // La fonction callback est ici vide
    ajaxPost("https://oc-jswebsrv.herokuapp.com/api/temoignage", temoignage, function (reponse) {
      var notifElt = document.createElement("p");
      notifElt.textContent = "Le témoignage a bien été ajouté.";
      document.body.appendChild(notifElt);
    },
    true
  );
});
//http://localhost:8888/OpenClassrooms/javascript-web/chapitre_10/javascript-web-srv/post_json.php
//https://oc-jswebsrv.herokuapp.com/api/temoignage
