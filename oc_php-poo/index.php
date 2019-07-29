<?php
class MonException extends Exception
{
  public function __construct($message, $code = 0)
  {
    parent::__construct($message, $code);
  }

  public function __toString()
  {
    return $this->message;
  }
}

function additionner($a, $b)
{
  if (!is_numeric($a) || !is_numeric($b)) {
    // On lance une nouvelle exception grâce à throw et on instancie directement un objet de la classe Exception.
    throw new MonException('Les deux paramètres doivent être des nombres');
  }

  if (func_num_args() > 2) {
    throw new Exception('Pas plus de deux arguments ne doivent $etre passés à la fonction');
  }

  return $a + $b;
}

try {
  echo additionner(12, 3), '<br />';
  echo additionner(15, 54, 45), '<br />';
} catch (MonException $e) {
  echo '[MonException] : '.$e;
} catch (Exception $e) {
  echo '[Exception] : '.$e->getMessage();
}

echo '<br/>Fin du script';
