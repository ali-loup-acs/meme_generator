<?php
include('db.php');
$db = new DataBase();
print_r($db->listText());
?>
