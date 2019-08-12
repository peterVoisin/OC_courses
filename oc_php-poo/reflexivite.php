<?php
$magicien = new Magicien(['nom' => 'vyk12', 'type' => 'magicien']);
$classMagicien = new ReflectionClass('Magicien');

if ($classMagicien->hasProperty('magie')) {
  echo 'La classe Magicien possèfde un attribut $magie';
} else {
  echo 'La classe Magicien ne possèfde pas d\'attribut $magie';
}
?>
<br/>
<br/>

<?php

$classMagicien = new ReflectionClass('Magicien');
$magicien = new magicien(['nom' => 'vyk12','type' => 'magicien']);

foreach ($classMagicien->getProperties() as $attribut) {
  echo $attribut->getName(),' => '.$attribut->getValue($magicien);
}
