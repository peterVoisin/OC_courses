document.addEventListener("keypress", function(e) {
  //console.log(String.fromCharCode(e.charCode));
  var letter = String.fromCharCode(e.charCode);
  var divElt = [];
  divElt = document.getElementsByTagName("div")
  for (var i = 0, c = divElt.length; i < c; i++) {
    switch (letter) {
      case "r":
        divElt[i].style.backgroundColor = "red";
        break;
      case "j":
        divElt[i].style.backgroundColor = "yellow";
        break;
      case "v":
        divElt[i].style.backgroundColor = "green";
        break;
      case "b":
        divElt[i].style.backgroundColor = "white";
        break;
    }
  }
});
