<?php
class Compteur
{
  private static $_compteur = 0;

  public function __construct()
  {
    self::$_compteur++;
  }

  public static function getCompteur()
  {
    return self::$_compteur;
  }
}

$test1 = new Compteur;
$test2 = new Compteur;
$test3 = new Compteur;

echo Compteur::getCompteur();
