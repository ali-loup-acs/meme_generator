<?php
  require_once("db.php");
  require_once("functionGd.php");
  require_once("Mustache/Autoloader.php");
  require_once("header.php");
  Mustache_Autoloader::register();
      $mustache_options =  array('extension' => '.html');

      $m = new Mustache_Engine;

//  print_r($_REQUEST);

  // GENERER UNE IMAGE & TEXTE + SAUVEGARDE DANS FICHIER
    $imagenew = new img();
    $imagenew->generateTxt();
    $imagenew->selectTxt();
    $imagenew->generateImg();



  //  $name = $_REQUEST["nameMeme"];
    $name = $imagenew->imgName;
    $url = "";
    $date = date('Y-m-d h:i:s');
    $image = isset($_REQUEST['image'])? basename($_REQUEST['image'],'jpeg') : 1;
    $text = isset($_REQUEST['text'])? $_REQUEST['text']: '';
    if(isset($_REQUEST['librairieTexte'])){
      $text = $_REQUEST['librairieTexte'];
    }
    // AJOUT CONDITION TXT valeur == 0 car pas de selection des options select

    $insertMeme = new DataBase();

    $memeNew = $insertMeme->setMeme($name, $url, $date, $image, $text);
    $url = $_SERVER['SERVER_NAME'].'/GENERATOR_MEME/share.php?id='.$memeNew['ID'];
    $insertMeme->updateUrlById($url, $memeNew['ID']);
    $memeNew['URL'] = $url;

    //  print_r($memeNew);
    $template = file_get_contents('template/viewGenerate.html');
    echo $m->render($template, $memeNew);
    // header("Location: share.php");

    require_once('footer.php');
