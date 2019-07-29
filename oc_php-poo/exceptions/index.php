<?php
class MonException extends Exception
{
  public function __construct($message,$code=0)
  {
    parent::__construct($message,$code);
  }

  public function __toString()
  {
    return $this->message;
  }
}

function additionner($a, $b)
{
  if (!is_numeric($a) || !is_numeric($b)) {
    throw new MonException('Les deux paramètres doivent être des nombres');
  }
  if (func_num_args() > 2) {
    throw new Exception('La fonction n\'accepte que deux arguments maximum');
  }
  return $a + $b;
}

try {
  echo additionner(12,3).'<br/>';
  echo additionner(15,54,45).'<br/>';
  echo additionner('azerty',54).'<br/>';
  echo additionner(4,8).'<br/>';
}
catch (MonException $e){
  echo '(\'[MonException] : '.$e.'\')';
}

echo '<br/>Fin du script';
