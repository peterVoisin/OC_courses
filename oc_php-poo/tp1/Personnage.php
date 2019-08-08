<?php
class Personnage
{
  private $_id,
          $_nom,
          $_forcePerso,
          $_degats,
          $_niveau,
          $_experience,
          $_lastConnect,
          $_kicksDay,
          $_lastKick;

  const CEST_MOI = 1;
  const PERSONNAGE_TUE = 2;
  const PERSONNAGE_FRAPPE = 3;

  public function __construct(array $datas){
    $this->hydrate($datas);
  }

  public function hydrate(array $datas){
    foreach ($datas as $key => $value) {
      $method = 'set'.ucfirst($key);

      if (method_exists($this,$method)) {
        $this->$method($value);
      }
    }
  }

  public function nomValide(){
    return !empty($this->_nom);
  }

  public function frapper(Personnage $perso){
    if ($perso->id() == $this->_id) {
      return self::CEST_MOI;
    }
    $this->_experience += 10;
    if ($this->_experience >= 100) {
      $this->_niveau++;
      $this->_forcePerso += $this->_niveau;
      $this->_experience = 0;
    }
    $this->_kicksDay++;
    return $perso->recevoirDegats($this->_forcePerso);
  }

  public function recevoirDegats($force){
    $this->_degats += $force;

    if ($this->_degats >= 100) {
      return self::PERSONNAGE_TUE;
    }
    return self::PERSONNAGE_FRAPPE;
  }

  // Getters
  public function id() { return $this->_id; }
  public function nom() { return $this->_nom; }
  public function forcePerso() { return $this->_forcePerso; }
  public function degats() { return $this->_degats; }
  public function niveau() { return $this->_niveau; }
  public function experience() { return $this->_experience; }
  public function lastConnect() { return $this->_lastConnect; }
  public function kicksDay() { return $this->_kicksDay; }
  public function lastKick() { return $this->_lastKick; }

  // Setters
  public function setId($id){
    $this->_id = (int) $id;
    if ($id > 0) {
      $this->_id = $id;
    }
  }

  public function setNom($nom){
    if (is_string($nom)) {
      $this->_nom = $nom;
    }
  }

  public function setForcePerso($forcePerso){
    $forcePerso = (int) $forcePerso;

    if ($forcePerso >= 0 && $forcePerso <= 100) {
      $this->_forcePerso += $forcePerso;
    }
  }

  public function setDegats($degats){
    $degats = (int) $degats;

    if ($degats > 0 && $degats <= 100) {
      $this->_degats = $degats;
    } elseif ($degats == 0) {
      if (($this->_degats - 50) <= 0) {
        $this->_degats = 0;
      } else {
        $this->_degats -= 50;
      }
    }
  }

  public function setNiveau($niveau){
    $niveau = (int) $niveau;

    if ($niveau >= 0) {
      $this->_niveau = $niveau;
    }
  }

  public function setExperience($experience){
    $experience = (int) $experience;

    if ($experience >= 0 && $experience <= 100) {
      $this->_experience = $experience;
    }
  }

  public function setLastConnect($lastConnect){
    $lastConnect = DateTime::createFromFormat('Y-m-d H:i:s', $lastConnect);
    //$lastKick = DateTime::createFromFormat('Y-m-d', $lastKick);
    $this->_lastConnect = $lastConnect;
  }

  public function setKicksDay($kicksDay){
    $kicksDay = (int) $kicksDay;

    if ($kicksDay >= 0) {
      $this->_kicksDay = $kicksDay;
    }
  }

  public function setLastKick($lastKick){
    $lastKick = DateTime::createFromFormat('Y-m-d H:i:s', $lastKick);
    //$lastKick = DateTime::createFromFormat('Y-m-d', $lastKick);
    $this->_lastKick = $lastKick;
  }
}
