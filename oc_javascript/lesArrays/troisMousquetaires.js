/*Les Trois Mousquetaires

Ecrivez un programme qui :

    crée un tableau nommé mousquetaires contenant les noms des trois mousquetaires, Athos, Porthos et Aramis ;
    affiche le nom de chaque mousquetaire à l'aide d'une boucle for ;
    ajoute au tableau le mousquetaire d'Artagnan ;
    affiche de nouveau le nom de chaque mousquetaire, cette fois à l'aide de la méthode forEach().
    supprime Aramis du tableau ;
    affiche le nom de chaque mousquetaire avec une boucle for-of.
*/

const mousquetaires = ["Athos", "Porthos", "Aramis"];

for (let i = 0; i < mousquetaires.length; i++){
  console.log(mousquetaire[i]);
}

mousquetaires.push("d'Artagnan");

mousquetaires.forEach(listeFilm => {
  console.log(listeFilm);
});

mousquetaires.splice(2,1);

for (const mousquetaire of mousquetaires) {
  console.log(mousquetaire);
}
