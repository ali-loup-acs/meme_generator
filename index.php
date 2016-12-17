<?php
require_once('header.php');
require_once('main.php');
require_once('footer.php');


require_once("db.php");
require_once("functionGd.php");

// annonce que le contenu envoyé sera une image
//header ("Content-type: image/jpeg");

// LISTER LES IMAGES DE LA BDD
$mydb= new DataBase();
$recoveredImg= $mydb->listImage();

foreach($recoveredImg as $list)
{
  $idImage=$list['id'];
  $nameImage=$list['name'];
  $typeImage=$list['type'];
  $dateImage=$list['date_upload'];
  $path='img/'.$idImage.'.'.$nameImage.'.'.$typeImage.'.'.$dateImage;

  echo "<img src=$path /><br/>";
}


// LISTER LES IMAGES DE LA BDD

// INSERER LES IMAGES GENEREE DANS LA BDD
$insertImg = new DataBase();
$insertImg->setImage(uniqid(), '.jpg');
// INSERER LES IMAGES GENEREE DANS LA BDD

// GENERER UNE IMAGE & TEXTE + SAUVEGARDE DANS FICHIER
$imagenew = new meme();
$imagenew->generateTxt();
$imagenew->generateImg();
// GENERER UNE IMAGE & TEXTE + SAUVEGARDE DANS FICHIER

// LISTER LES TEXTES DE LA BDD
$listingtxt = new DataBase();
$allTxt = $listingtxt->listText();
echo "<select>";

foreach($allTxt as $txt)
{
  $idTxt = $txt['id'];
  $nameTxt = $txt['text'];
//  $txtdef = $idTxt.$nameTxt;
  echo "<option value=$idTxt>".$nameTxt."</option>";
}
echo "</select>";
// FIN LISTER LES TEXTES DE LA BDD
