<?php
// Classe représentant une news, TP3 PHP-POO
class News
{
  protected $erreurs = [],
            $id,
            $auteur,
            $titre,
            $contenu,
            $dateAjout,
            $dateModif;

  // Constantes pour gérer les erreurs
  const AUTEUR_INVALIDE = 1;
  const TITRE_INVALIDE = 2;
  const CONTENU_INVALIDE = 3;

  // Constructeur
  public function __construct($valeur = [])
  {
    if(!empty($valeur)) { // Si $valeurs n'est pas vide, on hydrate
      $this->hydrate($valeur);
    }
  }

  // Hydratation avec en paramètre le array $valeur
  public function hydrate($donnees)
  {
    foreach ($donnees as $attribut => $valeur) {
      $methode = 'set'.ucfirst($attribut);

      if (is_callable([$this,$methode])) {
        $this->$methode($valeur);
      }
    }
  }

  // Méthode vérifiant s'il s'agit d'une nouvelle news
  public function isNew()
  {
    return empty($this->id);
  }

  // Méthode vérifiant si la news est valide
  public function isValid()
  {
    return !(empty($this->auteur) || empty($this->titre) || empty($this->contenu));
  }

  // SETTERS //

  public function setId($id)
  {
    $this->id = (int) $id;
  }

  public function setAuteur($auteur)
  {
    if (!is_string($auteur) || empty($auteur)) {
      $this->erreurs[] = self::AUTEUR_INVALIDE;
    } else {
      $this->auteur = $auteur;
    }
  }

  public function setTitre($titre)
  {
    if (!is_string($titre) || empty($titre)) {
      $this->erreurs[] = self::TITRE_INVALIDE;
    } else {
      $this->titre = $titre;
    }
  }

  public function setContenu($contenu)
  {
    if (!is_string($contenu) || empty($contenu)) {
      $this->erreurs[] = self::CONTENU_INVALIDE;
    } else {
      $this->contenu = $contenu;
    }
  }

  public function setDateAjout(DateTime $dateAjout)
  {
    $this->$dateAjout = $dateAjout;
  }

  public function setDateModif(DateTime $dateModif)
  {
    $this->dateModif = $dateModif;
  }

  // GETTERS //

  public function erreurs() { return $this->erreurs; }
  public function id() { return $this->id; }
  public function auteur() { return $this->auteur; }
  public function titre() { return $this->titre; }
  public function contenu() { return $this->contenu; }
  public function dateAjout() { return $this->dateAjout; }
  public function dateModif() { return $this->dateModif; }
}
