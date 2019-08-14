<?php
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

foreach (readLines('lorem.txt') as $line) {
  echo '<br/>'.$line;
}

function generator()
{
  for ($i=0; $i < 10; $i++) {
    yield 'Itération n°'.$i;
  }
}

foreach (generator() as $key => $value) {
  echo '<br/>'.$key.' => '.$value;
}
