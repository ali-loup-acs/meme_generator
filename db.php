<?php
class DataBase{
  private $dbh;
  /*
    initialisation de la connexion à la bdd lors de la création de l'objet et initialisation de la variable dbh
  */
  function __construct(){
    require '.init.php';
    $this->dbh = new PDO('mysql:host='.$hostname.';dbname='.$dbname.';charset=utf8mb4', $username, $password);
  }

  /*
    fonction qui execute une requête sql sur la bdd
  */
  private function query($sql){
        try {
        $sth = $this->dbh->prepare($sql);
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        $sth = null;
      } catch (PDOException $e) {
          die();
      }
      return $result;
  }

  function listImage(){
    $sql = 'SELECT * FROM `MM1_IMAGE`';
    return $this->query($sql);
  }

  function listText(){
    $sql ='SELECT * FROM `MM1_TEXT`';
    return $this->query($sql);
  }

  function listMeme(){
    $sql ='SELECT * FROM `MM1_MEME`';
    return $this->query($sql);
  }

  function setImage($name, $type){
    $sql = "INSERT INTO `MM1_IMAGE`(name, type, date_upload)
    VALUES($name, $type, NOW());";
    return $this->query($sql);
  }

  function setText($text){
    $sql = "INSERT INTO `MM1_TEXT`(text)
    VALUES($text);";
    return $this->query($sql);
  }
  /*
    setMeme permet d'ajouter un meme à la bdd
    @name : nom de l'image
    @url : adresse de l'acces à la page de visualisation du meme
    @image : id de l'image
    @text : texte du meme
  */

  function setMeme($name, $url, $image, $text){
    $sql = "INSERT INTO `MM1_MEME`(name, url, date_generation, id_image, text)
    VALUES($name, $url, NOW(), $image, $text;";
    return $this->query($sql);
  }
}
