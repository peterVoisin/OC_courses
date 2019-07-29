<?php
// On commence par inclure les fichiers nécessaires
require 'addendum/annotations.php';
require 'MyAnnotations.php';
require 'Personnage.php';

$reflectedClass = new ReflectionAnnotatedClass('Personnage');

$reflectedAttr = new ReflectionAnnotatedProperty('Personnage', 'force');
$reflectedMethod = new ReflectionAnnotatedMethod('Personnage', 'deplacer');

echo 'Infos concernant l\'attribut :';
var_dump($reflectedAttr->getAnnotation('AttrInfos'));

echo 'Infos concernant les paramètres de la méthode :';
var_dump($reflectedMethod->getAllAnnotations('ParamInfo'));

echo 'Infos concernant la méthode :';
var_dump($reflectedMethod->getAnnotation('MethodInfos'));
