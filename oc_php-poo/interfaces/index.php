<?php
class MaClasse implements SeekableIterator, ArrayAccess, Countable
{
  private $position = 0;
  private $tableau = ['Premier élément', 'Deuxième élément', 'Troisième élément', 'Quatrième élément', 'Cinquième élément'];


  /* MÉTHODES DE L'INTERFACE SeekableIterator */


  /**
   * Retourne l'élément courant du tableau.
   */
  public function current()
  {
    return $this->tableau[$this->position];
  }

  /**
   * Retourne la clé actuelle (c'est la même que la position dans notre cas).
   */
  public function key()
  {
    return $this->position;
  }

  /**
   * Déplace le curseur vers l'élément suivant.
   */
  public function next()
  {
    $this->position++;
  }

  /**
   * Remet la position du curseur à 0.
   */
  public function rewind()
  {
    $this->position = 0;
  }

  /**
   * Déplace le curseur interne.
   */
  public function seek($position)
  {
    $anciennePosition = $this->position;
    $this->position = $position;

    if (!$this->valid())
    {
      trigger_error('La position spécifiée n\'est pas valide', E_USER_WARNING);
      $this->position = $anciennePosition;
    }
  }

  /**
   * Permet de tester si la position actuelle est valide.
   */
  public function valid()
  {
    return isset($this->tableau[$this->position]);
  }


  /* MÉTHODES DE L'INTERFACE ArrayAccess */


  /**
   * Vérifie si la clé existe.
   */
  public function offsetExists($key)
  {
    return isset($this->tableau[$key]);
  }

  /**
   * Retourne la valeur de la clé demandée.
   * Une notice sera émise si la clé n'existe pas, comme pour les vrais tableaux.
   */
  public function offsetGet($key)
  {
    return $this->tableau[$key];
  }

  /**
   * Assigne une valeur à une entrée.
   */
  public function offsetSet($key, $value)
  {
    $this->tableau[$key] = $value;
  }

  /**
   * Supprime une entrée et émettra une erreur si elle n'existe pas, comme pour les vrais tableaux.
   */
  public function offsetUnset($key)
  {
    unset($this->tableau[$key]);
  }


  /* MÉTHODES DE L'INTERFACE Countable */


  /**
   * Retourne le nombre d'entrées de notre tableau.
   */
  public function count()
  {
    return count($this->tableau);
  }
}

$objet = new MaClasse;

echo 'Parcours de l\'objet...<br />';
foreach ($objet as $key => $value)
{
  echo $key, ' => ', $value, '<br />';
}

echo '<br />Remise du curseur en troisième position...<br />';
$objet->seek(2);
echo 'Élément courant : ', $objet->current(), '<br />';

echo '<br />Affichage du troisième élément : ', $objet[2], '<br />';
echo 'Modification du troisième élément... ';
$objet[2] = 'Hello world !';
echo 'Nouvelle valeur : ', $objet[2], '<br /><br />';

echo 'Actuellement, mon tableau comporte ', count($objet), ' entrées<br /><br />';

echo 'Destruction du quatrième élément...<br />';
unset($objet[3]);

if (isset($objet[3]))
{
  echo '$objet[3] existe toujours... Bizarre...';
}
else
{
  echo 'Tout se passe bien, $objet[3] n\'existe plus !';
}

echo '<br /><br />Maintenant, il n\'en comporte plus que ', count($objet), ' !';
