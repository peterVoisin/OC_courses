<?php
/**
 * @Table("Personnages")
 * @ClassInfos(author = "vyk12", version = "1.0")
 */
class Personnage
{
  /**
   * @AttrInfos(description = 'Contient la force du personnage, de 0 à 100', type = 'int')
  */
  protected $force;

  /**
   * @ParamInfo(name = 'destination', description = 'La destination du personnage')
   * @ParamInfo(name = 'vitesse', description = 'La vitesse à laquelle se déplace le personnage')
   * @MethodInfos(description = 'Déplace le personnage à un autre endroit', return = true, returnDescription = 'Retourne true si le personnage peut se déplacer')
  */
  public function deplacer($destination, $vitesse)
  {
    // ...
  }
}
