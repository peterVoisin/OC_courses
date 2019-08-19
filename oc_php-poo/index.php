<?php
// Implémentation du pattern observer avec des closures
class Observer implements SplObserver
{
  protected $name;
  protected $closure;

  public function __construct(Closure $closure, $name)
  {
    // On lie la closure à l'objet ectuel et on lui spécifie le contexte à utiliser
    // Ici, il s'agit du même contenxte que $htis
    $this->closure = $closure->bindTo($this, $this);
    $this->name = $name;
  }

  public function update(SplSubject $subject)
  {
    // En cas de notification, on récupère la closure et on l'appelle
    $closure = $this->closure;
    $closure($subject);
  }
}

$o = new Observed;

$observer1 = function(SplSubject $subject)
{
  echo $this->name.' a été notifié ! Nouvell evaleur de name : '.$subject->name()."\n";
};

$observer2 = function(SplSubject $subject)
{
  echo $this->name.' a été notifié ! Nouvelle valeur de name : '.$subject->name()."\n";
};

$o->attach(new Observer($observer1, 'Obersver1'))
  ->attach(new Observer($observer2, 'Observer2'));

  $o->setName('Victor');


// Lier un Closure
$additionneur = function()
{
  $this->_nbr += 5;
};

class MaClasse
{
  private $_nbr = 0;

  public function nbr()
  {
    return $this->_nbr;
  }
}

$obj = new MaClasse;

// On obtient une copie de notre closure qui sera liée à notre objet $obj
// Cette nouvelle closure sera appelée en tant que m"thode de MaClasse
// On aurait tout aussi pu passer $obj en second argument
$additionneur = $additionneur->bindTo($obj, 'MaClasse');
$additionneur();

// L'appel de nbr générera une eurreur stipulant que vous accédez à $_nbr alors que vous n'avez pas le droit
echo $obj->nbr();
echo '<br/>';
echo '<br/>';


// Les closures
$maFonction = function()
{
  echo 'Hello world!';
};

var_dump($maFonction); // On découvre ici qu'il s'gait bien d'un objet de type Closure.
echo '<br/>';
echo '<br/>';
