<?php
class A
{
  protected $nom;
  private $_force;

  public function __construct()
  {
    $this->protected = "Bob";
    $this->private = "5";
  }

  public function setNom($nom)
  {
    if (is_string($nom))
    {
      $this->_nom = $nom;
    }
  }

}

class B extends A {

  public function setNom($nom)
  {
    if (is_string($nom))
    {
      $this->_nom = $nom;
    }
  }
}

$b = new B;
echo $b->setNom("Remi");
echo $b->nom.'<br/>';
echo $b->_force;
