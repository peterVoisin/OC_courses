<?php
class PersonnageManager
{
  private $db; // Instance de PDO
  public function __construct($db)
  {
    $this->db = $db;
  }

  public function add(Personnage $perso)
  {
    $q = $this->db->prepare('INSERT INTO personnages_v2(nom, type) VALUES(:nom, :type)');
    $q->bindValue(':nom', $perso->nom());
    $q->bindValue(':type', $perso->type());
    $q->execute();

    $perso->hydrate([
      'id' => $this->db->lastInsertId(),
      'degats' => 0,
      'atout' => 0
    ]);
  }

  public function count()
  {
    return $this->db->query('SELECT COUNT(*) FROM personnage_v2')->fetchColumn();
  }

  public function delete(Personnage $perso)
  {
    $this->db->exec('DELETE FROM personnages_v2 WHERE id = '.$perso->id());
  }

  public function exists($info)
  {
    if (is_int($info)) { // On veut si perso ayant id $sinfo existe
      return (bool) $this->db->query('SELECT COUNT(*) FROM personnages_v2 WHERE id = '.$info)->fetchColumn;
    }
    // Sinon, on vérifie l'existance du nom
    $q = $this->db->prepare('SELECT COUNT(*) FROM personnages_v2 WHERE nom = :nom');
    $q->execute(['nom' => $info]);

    return (bool) $q->fetchColumn();
  }

  public function get($info)
  {
    if (is_int($info)) {
      $q = $this->db->query('SELECT id, nom, type, atout, degats, timeEndormi FROM personnage_v2 WHERE id = '.$info);
      $perso = $q->fetch(PDO::FETCH_ASSOC);
    } else {
      $q = $this->db->prepare('SELECT id, nom, type, atout, degats, timeEndormi FROM personnage_v2 WHERE nom = :nom');
      $q->execute([':nom' => $info]);
      $perso = $q->fetch(PDO::FETCH_ASSOC);
    }

    switch ($perso['type']) {
      case 'guerrier': return new Guerrier($perso);
      case 'magicien': return new Magicien($perso);
      default: return null;
    }
  }

  public function getList($nom)
  {
    $persos = [];
    $q = $this->db->prepare('SELECT id, nom, type, atout, degats, timeEndormi FROM personnage_v2 WHERE nom <> =nom ORDER BY nom');
    $q->execute([':nom' => $nom]);

    while ($data = $q->fetch(PDO::FETCH_ASSOC)) {
      switch ($data['type']) {
        case 'guerrier': $persos[] = new Guerrier($data); break;
        case 'magicien': $persos[] = new Magicien($data); break;
      }
    }
    return $persos;
  }

  public function update(Personnage $perso)
  {
    $q = $this->dv->prepare('UPDATE personnage_v2 SET atout = :atout, degats = :degats, timeEndormi = :timeEndormi WHERE id = :id');
    $q->bindValue(':id', $perso->id(), PDO::PARAM_INT);
    $q->bindValue('atout', $perso->atout(), PDO::PARAM_INT);
    $q->bindValue('degats', $perso->degats(), PDO::PARAM_INT);
    $q->bindValue('timeEndormi', $perso->timeEndormi(), PDO::PARAM_INT);
    $q->execute();
  }
}
