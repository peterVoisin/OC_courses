<?php
class ClassInfos extends Annotation
{
  public $author;
  public $version;

  public function checkConstraints($target)
  {
    if (!is_string($this->author)) {
      throw new Exception('L\'auteur doit etre une chaine de caractères');
    }

    if (!is_numeric($this->version)) {
      throw new Exception('Le numéro de version doit être un nombre valide');
    }
  }
}
