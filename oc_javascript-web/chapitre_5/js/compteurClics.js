function clic() {
    document.getElementById("compteurClics").textContent = compteur++;
}
var compteur = 1;
// Appeler fonction clic au "click" sur l'élément d'id clic
document.getElementById("clic").addEventListener("click", clic);

document.getElementById("desactiver").addEventListener("click", function() {
  document.getElementById("clic").removeEventListener("click", clic);
});
