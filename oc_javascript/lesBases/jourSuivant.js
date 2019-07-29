const jourActuel = "mer";
let jourSuivant = "";

// Ajoutez votre code ici pour définir jourSuivant en fonction de jourActuel

switch (jourActuel) {
  case "lundi":
    jourSuivant = "mardi";
    console.log(`Demain, nous serons ${jourSuivant}`);
    break;
  case "mardi":
    jourSuivant = "mercredi";
    console.log(`Demain, nous serons ${jourSuivant}`);
    break;
  case "mercredi":
    jourSuivant = "jeudi";
    console.log(`Demain, nous serons ${jourSuivant}`);
    break;
  case "jeudi":
    jourSuivant = "vendredi";
    console.log(`Demain, nous serons ${jourSuivant}`);
    break;
  case "vendredi":
    jourSuivant = "samedi";
    console.log(`Demain, nous serons ${jourSuivant}`);
    break;
  case "samedi":
    jourSuivant = "dimanche";
    console.log(`Demain, nous serons ${jourSuivant}`);
    break;
  case "dimanche":
    jourSuivant = "lundi";
    console.log(`Demain, nous serons ${jourSuivant}`);
    break;
  default :
    console.log("Ce jour n'existe pas !");
}
