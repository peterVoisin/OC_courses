<?php
class MaClasse implements SeekableIterator, ArrayAccess, Countable
{
  private $position = 0;
  private $tableau = ['Premier élément', 'Deuxième élément', 'Troisième élément', 'Quatrième élément', 'Cinquième élément'];

  // Méthode de l'interface SeekableIterator

  public function current()
  {
    return $this->tableau[$this->position];
  }

  public function key()
  {
    return $this->position;
  }

  public function next()
  {
    $this->position++;
  }

  public function rewind()
  {
    $this->position = 0;
  }

  public function seek($position)
  {
    $oldPosition = $this->position;
    $this->position = $position;

    if (!$this->valid()) {
      trigger_error('La position spécifiée n\'est pas valide', E_USER_WARNING);
      $this->position = $oldPosition;
    }
  }

  public function valid()
  {
    return isset($this->tableau[$this->position]);
  }

  // Méthode de l'interface ArrayAccess

  public function offsetExists($key)
  {
    return isset($this->tableau[$key]);
  }

  public function offsetGet($key)
  {
    return $this->tableau[$key];
  }

  public function offsetSet($key,$value)
  {
    $this->tableau[$key] = $value;
  }

  public function offsetUnset($key)
  {
    unset($this->tableau[$key]);
  }

  // Méthode de l'interface Countable

  public function count()
  {
    return count($this->tableau);
  }
}

$objet = new MaClasse;

foreach ($objet as $key => $value) {
  echo $key.' => '.$value.'<br/>';
}

echo '<br/>Remise du curseur en troisième position...>br/>';
$objet->seek(2);
echo 'Élément courant : '.$objet->current().'<br/>';

echo '<br/>Affichage du troisième élément : '.$objet[2].'<br/>';
echo 'Modification du troisième élément... ';
$objet[2] = 'Hello world!';
echo 'Nouvelle valeur : '.$objet[2].'<br/><br/>';

echo 'Actuellement, mon tableau comporte '.count($objet).' entrées<br/><br/>';

echo 'Destruction du quatrième élément...<br/>';
unset($objet[3]);

if (isset($objet[3])) {
  echo '$objet[3] existe toujours... Bizarre...';
} else {
  echo 'Tout se passe bien, $objet[3] n\'existe plus !';
}

echo '<br/><br/>Maintenant, il n\'en comporte plus que '.count($objet).' !';
