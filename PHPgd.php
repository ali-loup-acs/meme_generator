<?php

// annonce que le contenu envoyé sera une image
header ("Content-type: image/jpeg");

// $type = image_type_to_extension(IMAGETYPE_JPEG);   A UTILISER PLUS TARD

// indiquer le chemin/nom de l'image
$image = "img/01.jpg";

 // charger l'image d'un type prédéfini
$imgsource = imagecreatefromjpeg($image);

// DEBUT CODE POUR REDIMENSIONNER L'IMAGE

// list() assigne des variables comme si elles étaient un tableau
// getimagesize () retourne la taille d'une image
list($width, $height) = getimagesize($image);

// ici, on donne une taille par défaut
$percent = 0.1;
$newwidth = $width * $percent;
$newheight = $height * $percent;

// imagecreatetruecolor — Crée une nouvelle image en couleurs vraies
$newimage = imagecreatetruecolor($newwidth, $newheight);

// imagecopyresized() copie et redimensionne une partie d'une image
imagecopyresized($newimage, $imgsource, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
// FIN DU CODE POUR REDIMENSIONNER L'IMAGE

// DEBUT CODE POUR SAISIE DE TEXTE SUR IMAGE

$police = 15;
$angle = 0;
$x = 50;
$y = 10;
$text_written = "COUCOU";
// imagecolorallocate() alloue une couleur pour une image
$blanc = imagecolorallocate($newimage, 0, 0, 0);
$couleur = $blanc;

// permettre la saisie du texte sur l'image
// Imagestring($newimage, $police, $x, $y, $text_written, $couleur);

putenv('GDFONTPATH=' . realpath('.'));
// Chemin vers notre fichier de police ttf
$font = 'impact';

// Dessine le texte 'PHP Manual' en utilisant une police de taille 13
$test =imagettftext($newimage, $police, $angle, $x, $y, $couleur, $font, $text_written);


// FIN CODE POUR SAISIE DE TEXTE SUR IMAGE

// Affichage de l'image générée, toujours à place à la fin des lignes de code des paramètres
imagejpeg($newimage);
