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

$objet1 = new Compteur();
$objet2 = new Compteur();
$objet3 = new Compteur();
$objet4 = new Compteur();

echo Compteur::getCompteur();
