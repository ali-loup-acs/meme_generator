<?php

class meme
{
  protected $imgsource;
  protected $imgName;

  function __construct()
  {
    // charge l'image d'un type prédéfini, ici jpeg
    $this->imgsource= imagecreatefromjpeg("images/156v5z.jpg");
    // uniqid() génère un identifiant unique
    $this->imgName = uniqid().'.jpg';
  }

  function generateImg()
  {
    // list() assigne des variables comme si elles étaient un tableau
    // getimagesize () retourne la taille d'une image
    list($width, $height)=getimagesize("images/156v5z.jpg");

    // ici, on donne une taille par défaut (réduite à 10%)
    $percentreduce = 0.4;
    $newwidth = $width * $percentreduce;
    $newheight = $height * $percentreduce;

    // imagecreatetruecolor() crée une nouvelle image en couleurs vraies
    $newimage = imagecreatetruecolor($newwidth, $newheight);

    // imagecopyresized() copie et redimensionne une partie d'une image
    imagecopyresized($newimage, $this->imgsource, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

    // $type = image_type_to_mime_type(IMAGETYPE_JPEG);
    $imgName = $this->imgName;
    // Sauvegarde de l'image générée avec un id unique = toujours à place à la fin des lignes de code des paramètres
    $displayImg = imagejpeg($newimage, $imgName);

    $affichageId = $newimage.$imgName;
    echo $affichageId;

    return $displayImg;

  }

  function generateTxt()
  {

    $police = 100;
    $angle = 0;
    $x = 100;
    $y = 200;

    $newtxt = $this->imgsource;
    // imagecolorallocate() alloue une couleur pour une image
    $red = imagecolorallocate($newtxt, 210, 2, 2);
    $color = $red;
    // chemin vers le fichier de police ttf
    putenv('GDFONTPATH=' . realpath('.'));
    $font = 'impact';

    $txtWritten = "COUCOU !!!";

    // Dessine le texte 'PHP Manual' en utilisant une police de taille 13
    $txtEntered = imagettftext($this->imgsource, $police, $angle, $x, $y, $color, $font, $txtWritten);

    return $txtEntered;
  }

}
