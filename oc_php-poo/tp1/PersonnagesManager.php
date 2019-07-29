<?php
class PersonnagesManager
{
  private $_db; // Instance de PDO

  public function __construct($db)
  {
    $this->setDb($db);
  }

  public function add(Personnage $perso)
  {
    $q = $this->_db->prepare('INSERT INTO personnages(nom, lastConnect) VALUES(:nom, NOW())');
    $q->bindValue(':nom', $perso->nom());
    return $q->execute();
    $now = new DateTime('NOW');
    $perso->hydrate([
      'id' => $this->_db->lastInsertId(),
      'degats' => 0,
      'experience' => 0,
      'niveau' => 0,
      'forcePerso' => 5,
      'kickOfDay' => 0,
      'lastConnect' => $now->format('Y-m-d H:i:s')
    ]);
  }

  public function count()
  {
    return $this->_db->query('SELECT COUNT(*) FROM personnages')->fetchColumn();
  }

  public function delete(Personnage $perso)
  {
    $this->_db->exec('DELETE FROM personnages WHERE id = '.$perso->id());
  }

  public function exists($info)
  {
    if (is_int($info))
    {
      return (bool) $this->_db->query('SELECT COUNT(*) FROM personnages WHERE id = '.$info)->fetchColumn();
    }

    $q = $this->_db->prepare('SELECT COUNT(*) FROM personnages WHERE nom = :nom');
    $q->execute([':nom' => $info]);

    return (bool) $q->fetchColumn();
  }

  public function get($info)
  {
    if (is_int($info))
    {
      $q = $this->_db->query('SELECT id, nom, degats, experience, niveau, forcePerso, kickOfDay, lastConnect FROM personnages WHERE id = '.$info);
      $data = $q->fetch(PDO::FETCH_ASSOC);

      return new Personnage($data);
    }
    else {
      $q = $this->_db->prepare('SELECT id, nom, degats, experience, niveau, forcePerso, kickOfDay, lastConnect FROM personnages WHERE nom = :nom');
      $q->execute([':nom' => $info]);

      return new Personnage($q->fetch(PDO::FETCH_ASSOC));
    }
  }

  public function getList($nom)
  {
    $persos = [];

    $q = $this->_db->prepare('SELECT id, nom, degats, niveau FROM personnages WHERE nom <> :nom ORDER BY nom');
    $q->execute([':nom' => $nom]);

    while ($data = $q->fetch(PDO::FETCH_ASSOC))
    {
      $persos[] = new Personnage($data);
    }
    return $persos;
  }

  public function update(Personnage $perso)
  {
    $q = $this->_db->prepare('UPDATE personnages SET degats = :degats, experience = :experience, niveau = :niveau, forcePerso = :forcePerso, kickOfDay = :kickOfDay, lastConnect = :lastConnect WHERE id = :id');
    $q->bindValue(':id', $perso->id(), PDO::PARAM_INT);
    $q->bindValue(':degats', $perso->degats(), PDO::PARAM_INT);
    $q->bindValue(':experience', $perso->experience(), PDO::PARAM_INT);
    $q->bindValue(':niveau', $perso->niveau(), PDO::PARAM_INT);
    $q->bindValue(':forcePerso', $perso->forcePerso(), PDO::PARAM_INT);
    $q->bindValue(':kickOfDay', $perso->kickOfDay(), PDO::PARAM_INT);
    $q->bindValue(':lastConnect', $perso->lastConnect()->format('Y-m-d H:i:s'), PDO::PARAM_STR);
    return $q->execute();
  }

  public function setDb(PDO $db)
  {
    $this->_db = $db;
  }
}
