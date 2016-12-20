<?php
ini_set("display_errors",1);
class img
{
  protected $imgsource;
  public $imgName;
  private $path;

  function __construct()
  {
    // charge l'image d'un type prédéfini, ici jpeg
    if (isset($_REQUEST['image'])&& $_REQUEST['image']) {
      $this->imgsource= imagecreatefromjpeg($_REQUEST['image']);
      $this->path = $_REQUEST['image'];
    }
    else {
      $this->imgsource= imagecreatefromjpeg("images/9.jpeg");
      $this->path = "images/9.jpeg";
    }
    // uniqid() génère un identifiant unique
    $this->imgName = uniqid().'.jpeg';
    // echo 'toto'.$this->imgsource;

  }

  function generateImg()
  {
    // list() assigne des variables comme si elles étaient un tableau
    // getimagesize () retourne la taille d'une image

    list($width, $height)=getimagesize($this->path);

    // ici, on donne une taille par défaut (réduite à 10%)
    $percentreduce = 1;
    $newwidth = $width * $percentreduce;
    $newheight = $height * $percentreduce;

    // imagecreatetruecolor() crée une nouvelle image en couleurs vraies
    $newimage = imagecreatetruecolor($newwidth, $newheight);

    // imagecopyresized() copie et redimensionne une partie d'une image
    imagecopyresized($newimage, $this->imgsource, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

    // $type = image_type_to_mime_type(IMAGETYPE_JPEG);

    $imgName = $this->imgName;
    $file= "newMeme/".$imgName;
    // echo $file;


    // Sauvegarde de l'image générée avec un id unique = toujours à place à la fin des lignes de code des paramètres
    $displayImg = imagejpeg($newimage, $file);

    // echo $imgName;
    // génération de l'url de l'image
    // $url = realpath($imgName);

    // echo '<img src="'.$file.'"/>';

    // $affichageId = $newimage.$imgName;

    // echo json_encode($affichageId);

    return $displayImg;

  }

  function generateTxt()
  {

    $police = 30;
    $angle = 0;
    $x = 0;
    $y = 200;

    $newimg = $this->imgsource;
    // imagecolorallocate() alloue une couleur pour une image
    $withe = imagecolorallocate($newimg, 255, 255, 255);
    $color = $withe;

    // chemin vers le fichier de police ttf
    putenv('GDFONTPATH=' . realpath('.'));
    $font = 'impact';

//    $txtWritten = "COUCOU !!!";
    $txtWritten = isset($_REQUEST["text"]) ? $_REQUEST["text"] : '';

    // echo $txtWritten;

    // Dessine le texte avec les paramètres donnés
    $txtEntered = imagettftext($this->imgsource, $police, $angle, $x, $y, $color, $font, $txtWritten);

    return $txtEntered;
  }

  function selectTxt()
  {
    $option = isset($_REQUEST["librairieTexte"]) ? $_REQUEST["librairieTexte"] : '';
    $withe = imagecolorallocate($this->imgsource, 255, 255, 255);
    $color = $withe;
    putenv('GDFONTPATH=' . realpath('.'));
    $font = 'impact';

    $selecttext = imagettftext($this->imgsource, 30, 0, 0, 200, $color, $font, $option);

    return $selecttext;
  }


}
