<?php
abstract class NewsManager
{
  // Méthode permettant d'ajouter une news
  abstract protected function add(News $news);

  // Méthode renvoyant le nombre de news total
  abstract public function count();

  // Méthode permettant de supprimer une news
  abstract public function delete($id);

  // Méthode retournant une list de news demandée
  abstract public function getList($debut = -1,$limite = -1);

  // Méthode retournant une news précise
  abstract public function getunique($id);

  // Méthode permettant d'enregistrer une news
  public function save(News $news)
  {
    if ($news->isValid()) {
      $news->isNew() ? $this->add($news) : $this->update($news);
    } else {
      throw new RuntimeException('La news doit être valide pour être enregistrée');
    }
  }

  // Méthode permettant de modifier un news
  abstract protected function update(News $news);
}
