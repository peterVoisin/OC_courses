<?php


// Les coroutines

// La méthode "throw"
function generatorMethodeTrow()
{
  // On fait une voucle de 5 yield pour garder quelque chose de simple
  for ($i=0; $i < 5; $i++) {
    // On indique qu'on vient de rentrer dans lième itération
    echo "Début $i<br/>";

    // On essaie "d'attraper" la valeur qu'on nous a donnée
    try {
      yield;
    } catch (Exception $e) {
      // Si une exception a été levée, on indique son numéro
      echo "Exception $i<br/>";
    }

    // Enfin, on indique qu'on vient de finir la ième itération
    echo "Fin $i<br/>";
  }
}

$gen = generatorMethodeTrow();
foreach ($gen as $i => $value) {
  // On decide de lancer une exception pour l'itération n°3
  if ($i == 3) {
    $gen->throw(new Exception('Petit test'));
  }
}


// la méthode "send"
class TaskRunner
{
  protected $tasks;

  public function __construct()
  {
    $this->tasks = new SplQueue;
  }

  public function addTask(Generator $task)
  {
    // On ajoute la tâche à la fin de la liste
    $this->tasks->enqueue($task);
  }

  public function run()
  {
    // tant qu'il y a toujours au moins une tâche à exécuter
    while (!$this->tasks->isEmpty())
    {
      // On enlève la première tâche et on la récupère au passage
      $task = $this->tasks->dequeue();

      // On exécute la prochaine étape de la tâche
      $task->send('Helleo world!');

      // Si la tâche n'est pas finie, on la replace en fin de liste
      if ($task->valid()) {
        $this->addTask($task);
      }
    }
  }
}

$taskRunner = new TaskRunner;

function task1()
{
  for ($i=1; $i <= 2; $i++) {
    $data = yield;
    echo 'Tâche 1, itération '.$i.' valeur envoyée : '.$data.'<br/>';
  }
}
function task2()
{
  for ($i=1; $i <= 6; $i++) {
    $data = yield;
    echo 'Tâche 2, itération '.$i.' valeur envoyée : '.$data.'<br/>';
  }
}
function task3()
{
  for ($i=1; $i <= 4; $i++) {
    $data = yield;
    echo 'Tâche 3, itération '.$i.' valeur envoyée : '.$data.'<br/>';
  }
}

$taskRunner->addTask(task1());
$taskRunner->addTask(task2());
$taskRunner->addTask(task3());
echo '<br/>';
$taskRunner->run();




// Retourner une référence
class SomeClass
{
  protected $attr;

  public function __construct()
  {
    $this->attr = ['Un', 'Deux', 'Trois', 'Quatre'];
  }

  // Le "&" avant le nom du générateur indique que les valeurs retournées sont des références
  public function &generator()
  {
    // On cherche ici à obtenir les références des valeurs du tableau pour les retourner
    foreach ($this->attr as &$value) {
      yield $value;
    }
  }

  public function getAttr()
  {
    return $this->attr;
  }
}

$obj = new SomeClass;
echo '<br/>';
// On parcourt notre générateur en récupérant les entrées par références
foreach ($obj->generator() as &$value) {
  //On effectue une opération quelconque sur notre valeur
  $value = strrev($value);
}
echo '<pre>';
var_dump($obj->getAttr());
echo '</pre>';


// Les générateurs
function readLines($fileName)
{
  // Si le fichier n'existe pas, on ne continu pas
  if (!$file = fopen($fileName,'r')) {
    return;
  }

  // Tant qu'il reste des lignes à parcourir
  while (($line = fgets($file)) !== false) {
    // On dit à PHP que cette ligne du fichier fait office de "prochaine entrée du tableau"
    yield $line;
  }

  fclose($file);
}

var_dump(readLines('lorem.txt'));

/*$generator = readLines('lorem.txt');
foreach ($generator as $line) {
  echo '<br/>'.$line;
}*/

echo '<br/>';
foreach (readLines('lorem.txt') as $line) {
  echo '<br/>'.$line;
}

// retourner des clés avec des valeurs
/*function generator()
{
  for ($i=0; $i < 10; $i++) {
    yield 'Itération n°'.$i;
  }
}

echo '<br/>';
foreach (generator() as $key => $value) {
  echo '<br/>'.$key.' => '.$value;
}*/

function generator()
{
  // On retourne ici des chaines de caractères assignées à des clés
  yield 'a' => 'Itération 1';
  yield 'b' => 'Itération 2';
  yield 'c' => 'Itération 3';
  yield 'd' => 'Itération 4';
}

echo '<br/>';
foreach (generator() as $key => $value) {
  echo '<br/>'.$key.' => '.$value;
}
