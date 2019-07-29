var styleDivContenu = getComputedStyle(document.getElementById("contenu"));

document.getElementById('contenu').insertAdjacentHTML("beforebegin", '<p id="infos">Informations sur l\'élément</p>');
document.getElementById('infos').insertAdjacentHTML("afterend", '<ul id="ulInfos"></ul>');
document.getElementById('ulInfos').insertAdjacentHTML("beforeend", `<li>Hauteur : ${styleDivContenu.height}</li><li>Longueur : ${styleDivContenu.width}</li>`);
