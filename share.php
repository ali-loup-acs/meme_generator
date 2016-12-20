<?php
    ini_set("display_errors",1);
    if(isset($_REQUEST['id'])){
    require_once("db.php");
    require_once("Mustache/Autoloader.php");
    Mustache_Autoloader::register();
    $m = new Mustache_Engine;
    $db = new DataBase();
    $meme = $db->getMeme($_REQUEST['id']);

    $header = file_get_contents('template/header.html');
    $share = file_get_contents('template/viewShare.html');

    echo $m->render($header, $meme[0]);
    echo $m->render($share, $meme[0]);
  }
  else {
    require("header.php");
    echo('Votre même n\'existe plus !');
  }
    require "footer.php";
?>
