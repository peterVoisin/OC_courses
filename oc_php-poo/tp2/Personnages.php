<?php
abstract class Personnage
{
  protected $id,
            $nom,
            $type,
            $atout,
            $degats,
            $timeEndormi;

  // Constante renvoyée par méthode "frapper" si on se frappe
  const CEST_MOI = 1;
  // Constante renvoyée par méthode "frapper" si on a tué le perso en frappant
  const PERSO_TUE = 2;
  // Constante renvoyée par méthode "frapper" si on a bien frappé
  const PERSO_FRAPPE = 3;
  // Constante renvoyée par méthode "lancerSort" si on a bien ensorcelé
  const PERSO_ENSORCELE = 4;
  // Constante renvoyé par "lancerSort" si on a pas de magie pour ensorceler
  const PAS_DE_MAGIE = 5;
  // Constante renvoyée par "frapper" si perso qui frappe est endormi
  const PERSO_ENDORMI = 6;

  public function __construct(array $data)
  {
    $this->hydrate($data);
    $this->type = strtolower(static::class);
  }

  public function estEndormi()
  {
    return $this->timeEndormi > time();
  }

  public function frapper(Personnage $perso)
  {
    if ($perso->id == $this->id) {
      return self::CEST_MOI;
    }
    if ($this->estEndormi()) {
      return self::PERSO_ENDORMI;
    }
    return $perso->recevoirDegats();
  }

  public function hydrate(array $data)
  {
    foreach ($data as key => $value)
    {
      $method = 'set'.ucfirst($key);
      if (method_exists($this, $method)) {
        $this->$method($value);
      }
    }
  }

  public function nomValide()
  {
    return !empty($this->nom);
  }

  public function recevoirDegats()
  {
    $this->degats =+ 5;
    //Si degats >= 100, on supp le perso en BDD
    if ($this->degats >= 100) {
      return self::PERSO_TUE;
    }
    // Sinon, màj des degats perso
    return self::PERSO_FRAPPE;
  }

  public function reveil()
  {
    $secondes = $this->timeEndormi;
    $secondes -= time();

    $heures = floor($secondes / 3600);
    $secondes -= $heures * 3600;
    $minutes = floor($secondes / 60);
    $secondes -= $minutes * 60;

    $heures .= $heures <= 1 ? ' heure' : ' heures';
    $minutes .= $minutes <= 1 ? ' minute' : ' minutes';
    $secondes .= $secondes <= 1 ? ' secondes' : ' secondes';

    return $heures .', '.$minutes.' et '.$secondes;
  }

  // getters
  public function nom() { return $this->nom; }
  public function type() { return $this->type; }
  public function atout() { return $this->atout; }
  public function degats() { return $this->degats; }
  public function timeEndormi() { return $this->timeEndormi; }

  // setters
  public function setNom()
  {
    if (is_string($nom)) {
      $this->nom = $nom;
    }
  }

  public function setAtout()
  {
    $atout = (int) $atout;
    if ($atout >= 0 && $atout <= 100) {
      $this->atout = $atout;
    }
  }

  public function setDegats($degats)
  {
    $degats = (int) $degats;
    if ($degats >=0 && $degats <= 100) {
      $this->degats= $degats;
    }
  }

  public function setTimeEndormi($time)
  {
    $this->timeEndormi = (int) $time;
  }
}

class Guerrier extends Personnage
{
  public function recevoirDegats()
  {
    if($this->degats >= 0 && $this->degats <= 25) {
      $this->atout = 4;
    }
    elseif($this->degats > 25 && $this->degats <= 50) {
      $this->atout = 3;
    }
    elseif($this->degats > 50 && $this->degats <= 75) {
      $this->atout = 2;
    }
    elseif($this->degats > 75 && $this->degats <= 90) {
      $this->atout = 1;
    }
    else {
      $this->atout = 0;
    }
    $this->degats += 5 - $this->atout;
    // Si degats >= 100, on supp le perso en BDD
    if ($this->degats >= 100) {
      return self::PERSO_TUE;
    }
    // Sinon on upgrade
    return self::PERSO_FRAPPE;
  }
}

class Magicien extends Personnage
{
  public function lanerUnSort(Personnage $perso)
  {
    if ($htis->degats >= 0 && $this->degats <= 25) {
      $this->atout = 4;
    }
    elseif ($htis->degats > 25 && $this->degats <= 50) {
      $this->atout = 3;
    }
    elseif ($htis->degats > 50 && $this->degats <= 75) {
      $this->atout = 2;
    }
    elseif ($htis->degats > 75 && $this->degats <= 90) {
      $this->atout = 1;
    }
    else {
      $this->atout = 0;
    }

    if ($perso->id == $this->id) {
      return self::CEST_MOI;
    }

    if ($this->atout == 0) {
      return self::PAS_DE_MAGIE;
    }

    if ($this->estEndormi()) {
      return self::PERSO_ENDORMI;
    }

    $perso->timeEndormi = time() + ($this->atout *6) *3600;

    return self::PERSO_ENSORCELE;
  }
}
