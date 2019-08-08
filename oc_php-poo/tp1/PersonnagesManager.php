<?php
class PersonnagesManager
{
  private $_db;

  public function __construct($db){
    $this->setDb($db);
  }

  public function add(Personnage $perso){
    $q = $this->_db->prepare('INSERT INTO personnages(nom, lastConnect, lastKick) VALUES(:nom, NOW(), NOW())');
    $q->bindValue(':nom', $perso->nom());
    $q->execute();

    $perso->hydrate([
      'id' => $this->_db->lastInsertId(),
      'forcePerso' => 5,
      'degats' => 0,
      'niveau' => 1,
      'experience' => 0,
      'kicksDay' => 0,
    ]);
  }

  public function count(){
    return $this->_db->query('SELECT COUNT(*) FROM personnages')->fetchColumn();
  }

  public function delete(Personnage $perso){
    $this->_db->exec('DELETE FROM personnages WHERE id = '.$perso->id());
  }

  public function exists($info){
    if (is_int($info)) {
      return (bool) $this->_db->query('SELECT COUNT(*) FROM personnages WHERE id ='.$info)->fetchColumn();
    }
    $q = $this->_db->prepare('SELECT COUNT(*) FROM personnages WHERE nom = :nom');
    $q->execute([':nom' => $info]);

    return (bool) $q->fetchColumn();
  }

  public function get($info){
    if (is_int($info)) {
      $q = $this->_db->query('SELECT id, nom, forcePerso, degats, niveau, experience, lastConnect, kicksDay, lastKick FROM personnages WHERE id = '.$info);
      $datas = $q->fetch(PDO::FETCH_ASSOC);

      return new Personnage($datas);
    } else {
      $q = $this->_db->prepare('SELECT id, nom, forcePerso, degats, niveau, experience, lastConnect, kicksDay, lastKick FROM personnages WHERE nom = :nom');
      $q->execute([':nom' => $info]);

      return new Personnage($q->fetch(PDO::FETCH_ASSOC));
    }
  }

  public function getList($nom){
    $persos = [];
    $q = $this->_db->prepare('SELECT id, nom, forcePerso, degats, niveau, experience FROM personnages WHERE nom <> :nom ORDER BY nom');
    $q->execute([':nom' => $nom]);

    while ($datas = $q->fetch(PDO::FETCH_ASSOC)) {
      $persos[] = new Personnage($datas);
    }
    return $persos;
  }

  public function update(Personnage $perso){
    $q = $this->_db->prepare('UPDATE personnages SET forcePerso = :forcePerso, degats = :degats, niveau = :niveau, experience = :experience, lastConnect = :lastConnect, kicksDay = :kicksDay, lastKick = :lastKick WHERE id = :id');
    $q->bindValue(':id', $perso->id(), PDO::PARAM_INT);
    $q->bindValue(':forcePerso', $perso->forcePerso(), PDO::PARAM_INT);
    $q->bindValue(':degats', $perso->degats(), PDO::PARAM_INT);
    $q->bindValue(':niveau', $perso->niveau(), PDO::PARAM_INT);
    $q->bindValue(':experience', $perso->experience(), PDO::PARAM_INT);
    $q->bindValue(':lastConnect', $perso->lastConnect()->format('Y-m-d H:i:s'), PDO::PARAM_STR);
    $q->bindValue(':kicksDay', $perso->kicksDay(), PDO::PARAM_INT);
    $q->bindValue(':lastKick', $perso->lastKick()->format('Y-m-d H:i:s'), PDO::PARAM_STR);
    $q->execute();
  }

  public function setDb(PDO $db){
    $this->_db = $db;
  }
}
