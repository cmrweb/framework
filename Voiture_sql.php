<?php
$db = new PDO("mysql:host=localhost;dbname=db_cmrfw;","root","",[PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION]);
$query=" CREATE TABLE IF NOT EXISTS Voiture
(
    id INT PRIMARY KEY AUTO_INCREMENT,
nom varchar(150),
couleur varchar(100),
porte int)";

$req=$db->prepare($query);

$req->execute();

/*
*   Quick test
*/
//$Voiture=new Voiture();
//$Voiture->setData([]);
//dump($Voiture->getData());