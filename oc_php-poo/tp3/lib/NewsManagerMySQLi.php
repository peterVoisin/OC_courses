<?php
class NewsManagerMySQLi extends NewsManager
{
  // Attribut contenant l'instance représentant le BDD
  protected $db;

  // Constructeur chargé d'enregistrer l'instance de PDO dans l'attribut $db
  public function __construct(MySQLi $db)
  {
    $this->db = $db;
  }

  // NewsManager::add()
  protected function add(News $news)
  {
    $requete = $this->db->prepare('INSERT INTO news(auteur,titre,contenu,dateAjoute,dateModif) VALUES(?,?,?,NOW(),NOW())');

    $requete->bind_param('sss', $news->auteur(), $news->titre(), $news->contenu());

    $requete->execute();
  }

  // NewsManager::count()
  public function count()
  {
    return $this->db->query('SELECT id FROM news')->num_rows;
  }

  // NewsManager::delete()
  public function delete($id)
  {
    $id = (int) $id;
    $requete = $this->db->prepare('DELETE FROM news WHERE id = ?');
    $requete->bind_param('i', $id);
    $requete->execute();
  }

  // NewsManager::getList()
  public function getList($debut = -1,$limite = -1)
  {
    $sql = 'SELECT id,auteur,titre,contenu,dateAjout,dateModif FROM news ORDER BY id DESC';

    // Vérifier l'intégrité des paramètres fournis
    if ($debut != -1 || $limite != -1) {
      $sql .= ' LIMIT '.(int) $limite.' OFFSET '.(int) $debut;
    }

    $requete = $this->db->query($sql);

    while ($news = $requete->fetch_object('News'))
    {
      $news->setDateAjout(new DateTime($news->dateAjout()));
      $news->setDateModif(new DateTime($news->dateModif()));

      $listeNews = $news;
    }

    return $listeNews;
  }

  // NewsManager::getUnique()
  public function getunique($id)
  {
    $requete = $this->db->prepare('SELECT id,auteur,titre,contenu,dateAjout,dateModif FROM news WHERE id = ?');
    $requete->bind_param('i', $id);
    $requete->execute();

    $requete->bind_result($id,$auteur,$titre,$contenu,$dateAjout,$dateModif);

    $requete->fetch();

    $news->setDateAjout(new DateTime($news->dateAjout()));
    $news->setDateModif(new DateTime($news->dateModif()));

    return new news([
      'id' => $id,
      'auteur' => $auteur,
      'titre' => $titre,
      'contenu' => $contenu,
      'dateAjout' => new DateTime($dateAjout),
      'dateModif' => new DateTime($dateModif)
    ]);
  }

  // NewsManager::update()
  protected function update(News $news)
  {
    $requete = $this->db->prepare('UPDATE news SET auteur = ?, titre = ?, contenu = ?, dateModif = NOW() WHERE id = ?');

    $requete->bind_param('sssi', $news->auteur(), $news->titre(), $news->contenu(), $news->id());

    $requete->execute();
  }
}
