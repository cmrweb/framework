<?php
// $db = new PDO("mysql:host=localhost;dbname=db_cmrfw;","root","",[PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION]);
// $query=" CREATE TABLE IF NOT EXISTS test2
// (
//     id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
// nom varchar(100),
// prenom varchar(100))";

// $req=$db->prepare($query);

// $req->execute();
$test=new test2();
$test->setData(["nom"=>"yo","prenom"=>"hello"]);
dump($test->getData());
