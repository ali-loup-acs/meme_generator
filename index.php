<?php
  ini_set("display_errors",1);
  require_once('header.php');
  require_once("db.php");
  require_once("Mustache/Autoloader.php");

  Mustache_Autoloader::register();
    $mustache_options =  array('extension' => '.html');

    $m = new Mustache_Engine;
    $db = new DataBase();
    $data['images'] = $db->listImage();
    $data['textes'] = $db->listText();
    $template = file_get_contents('template/main.html');
    echo $m->render($template, $data);

    require_once('footer.php');
// // annonce que le contenu envoyé sera une image
// //header ("Content-type: image/jpeg");
//
// // LISTER LES IMAGES DE LA BDD
// $mydb= new DataBase();
// $recoveredImg= $mydb->listImage();
//
// foreach($recoveredImg as $list)
// {
//   $idImage=$list['id'];
//   $nameImage=$list['name'];
//   $typeImage=$list['type'];
//   $dateImage=$list['date_upload'];
//   $path='images/'.$idImage.'.'.$typeImage;
//
//   echo "<img src=$path /><br/>";
//   echo "<br/>";
// }


// LISTER LES IMAGES DE LA BDD

// INSERER LES IMAGES GENEREE DANS LA BDD
$insertImg = new DataBase();
$insertImg->setImage(uniqid(), '.jpg');
// INSERER LES IMAGES GENEREE DANS LA BDD
// $insertMeme= new DataBase();
$insertImg->setMeme("name","url","image","text");


// // GENERER UNE IMAGE & TEXTE + SAUVEGARDE DANS FICHIER
// echo "<br/><br/>";
// // LISTER LES TEXTES DE LA BDD
// $listingtxt = new DataBase();
// $allTxt = $listingtxt->listText();
//
// echo "<form name='form1' method='get' onclick='selectTxt();'>";
// echo "<select id='selectionTxt'>";
// foreach($allTxt as $txt)
// {
//   $idTxt = $txt['id'];
//   $nameTxt = $txt['text'];
// //  $txtdef = $idTxt.$nameTxt;
//   echo "<option id='txtSelect' value=$idTxt>".$nameTxt."</option>";
// }
// echo "</select>";
// echo "</form><br/>";
//
// // FIN LISTER LES TEXTES DE LA BDD
// echo "<br/>";
// echo "<form name='form2' onclick='return txtWritten();' method='get' >";
// echo "<input id='text' name='text'/>";
// echo "<button id='validate'>ENVOYER</button><br/><br/>";
?>
