<?php
class Personnage
{
  private $_id,
          $_nom,
          $_degats,
          $_experience,
          $_niveau,
          $_forcePerso,
          $_kickOfDay,
          $_lastConnect;

  const CEST_MOI = 1;
  const PERSONNAGE_TUE = 2;
  const PERSONNAGE_FRAPPE = 3;
  const AUJOURDHUI = 4;
  const LIMIT_KICK = 5;

  public function __construct(array $data)
  {
    $this->hydrate($data);
  }

  public function hydrate(array $data)
  {
    foreach ($data as $key => $value)
    {
      $method = 'set'.ucfirst($key);

      if (method_exists($this, $method))
      {
        $this->$method($value);
      }
    }
  }

  public function nomValide()
  {
    return !empty($this->_nom);
  }

  public function frapper(Personnage $perso)
  {
    if ($perso->id() == $this->_id) {
      return self::CEST_MOI;
    }

    $now = (new DateTime('NOW'))->format('Y-m-d');
    if ($this->kickOfDay() >= 3 && $this->lastConnect()->format('Y-m-d') == $now) {
      return self::LIMIT_KICK;
    }
    $this->_kickOfDay++;

    // ADD XP+ AND NIVEAU UP
    $this->_experience++;
    if ($this->_experience >= 5)
    {
      $this->_niveau++;
      $this->_forcePerso++;
      $this->_experience = 0;
    }

    // Perso frappe ou tue
    return $perso->recevoirDegats($this->_forcePerso);
  }

  public function recevoirDegats($force)
  {
    $this->_degats += $force;
    // Si les degats atteignent 100, on doit supprimer le perso
    if ($this->_degats >= 100)
    {
      return self::PERSONNAGES_TUE;
    }
    // Sinon, on retourne perso frappé
    return self::PERSONNAGE_FRAPPE;
  }

  // getters
  public function id() { return $this->_id; }
  public function nom() { return $this->_nom; }
  public function degats() { return $this->_degats; }
  public function experience() { return $this->_experience; }
  public function niveau() { return $this->_niveau; }
  public function forcePerso() { return $this->_forcePerso; }
  public function kickOfDay() { return $this->_kickOfDay; }
  public function lastConnect() { return $this->_lastConnect; }

  //setters
  public function setId($id)
  {
    $id = (int) $id;

    if ($id > 0)
    {
      $this->_id = $id;
    }
  }

  public function setNom($nom)
  {
    if (is_string($nom))
    {
      $this->_nom = $nom;
    }
  }

  public function setDegats($degats)
  {
    $degats = (int) $degats;
    if ($degats >= 0 && $degats <= 100)
    {
      $this->_degats = $degats;
    }
  }

  public function setExperience($experience)
  {
    $experience = (int) $experience;
    $this->_experience = $experience;
  }

  public function setNiveau($niveau)
  {
    $niveau = (int) $niveau;
    $this->_niveau = $niveau;
  }

  public function setForcePerso($forcePerso)
  {
    $forcePerso = (int) $forcePerso;
    $this->_forcePerso = $forcePerso;
  }

  public function setKickOfDay($kickOfDay)
  {
    $kickOfDay = (int) $kickOfDay;
    $this->_kickOfDay = $kickOfDay;
  }

  public function setLastConnect($lastConnect)
  {
    $lastConnect = DateTime::createFromFormat('Y-m-d H:i:s', $lastConnect);
    //$lastConnect = DateTime::createFromFormat('Y-m-d', $lastConnect);
    $this->_lastConnect = $lastConnect;
  }
}
