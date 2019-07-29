var test1 = document.body.childNodes[0].childNodes[1];
var test2 = document.body.childNodes[1].childNodes[3];
var test3 = document.body.childNodes[1].childNodes[3].childNodes[0];
var test4 = document.body.childNodes[2];
console.log(test1);
console.log(test2);
console.log(test3);
console.log(test4);

var test5 = document.getElementById("cible");
var test6 = document.getElementById("#cible");
var test7 = document.getElementsByTagName("li")[1];
var test8 = document.getElementsByClassName("li")[1];
var test9 = document.querySelector("cible");
var test10 = document.querySelector("#cible");
console.log(test5);
console.log(test6);
console.log(test7);
console.log(test8);
console.log(test9);
console.log(test10);

var farine = document.createElement("li");
farine.id = "Farine";
farine.textContent = "farine";
document.getElementById("courses").appendChild(farine);
