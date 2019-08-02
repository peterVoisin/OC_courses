<?php
header ("Content-type: image/png");
$image = imagecreate(200,50);

$orange = imagecolorallocate($image, 255, 128, 0); // Le fond est orange (car c'est la première couleur)
$bleu = imagecolorallocate($image, 0, 0, 255);
$bleuclair = imagecolorallocate($image, 156, 227, 254);
$noir = imagecolorallocate($image, 0, 0, 0);
$blanc = imagecolorallocate($image, 255, 255, 255);

imagestring($image, 4, 35, 15, "Salut les Zéros !", $noir);
imagecolortransparent($image, $orange); // On rend le fond orange transparent

imagepng($image);
?>

<?php
//header ("Content-type: image/png");
//$image = imagecreate(200,50);

//$orange = imagecolorallocate($image, 255, 128, 0);
//$bleu = imagecolorallocate($image, 0, 0, 255);
//$bleuclair = imagecolorallocate($image, 156, 227, 254);
//$noir = imagecolorallocate($image, 0, 0, 0);
//$blanc = imagecolorallocate($image, 255, 255, 255);

//imagestring($image, 4, 35, 15, "Salut les Zéros !", $blanc);

//imagepng($image);
?>

<?php
//header ("Content-type: image/png");
//$image = imagecreate(200,50);

//$orange = imagecolorallocate($image, 255, 128, 0);
//$bleu = imagecolorallocate($image, 0, 0, 255);
//$bleuclair = imagecolorallocate($image, 156, 227, 254);
//$noir = imagecolorallocate($image, 0, 0, 0);
//$blanc = imagecolorallocate($image, 255, 255, 255);

//imagepng($image);
?>

<?php
//header ("Content-type: image/png"); // 1 : on indique qu'on va envoyer une image PNG
//$image = imagecreate(200,50); // 2 : on crée une nouvelle image de taille 200 x 50
// 3 : on s'amuse avec notre image (on va apprendre à le faire)
//imagepng($image); // 4 : on a fini de faire joujou, on demande à afficher l'image
?>