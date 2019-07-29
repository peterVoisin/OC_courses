<?php
function chargerClasse($classe)
{
  require $classe . '.php';
}

spl_autoload_register('chargerClasse');

$perso = new Personnage(Personnage::FORCE_GRANDE);
$perso->parler();
