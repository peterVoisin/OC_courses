var articlesElt = document.getElementById("articles");
ajaxGet("https://oc-jswebsrv.herokuapp.com/api/articles", function(reponse){
  // Transforme la réponse en un tableau d'articles
  var articles = JSON.parse(reponse);
  articles.forEach(function(article){
    // Ajout du titre et du contenu de chaque article
    var titreElt = document.createElement("h2");
    titreElt.textContent = article.titre;
    var contenuElt = document.createElement("p");
    contenuElt.textContent = article.contenu;
    articlesElt.appendChild(titreElt);
    articlesElt.appendChild(contenuElt);
  });
});
