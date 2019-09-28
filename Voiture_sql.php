<?php
// $db = new PDO("mysql:host=localhost;dbname=db_cmrfw;","root","",[PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION]);
// $query=" CREATE TABLE IF NOT EXISTS Voiture
// (
//     id INT PRIMARY KEY AUTO_INCREMENT,
// nom varchar(150),
// couleur varchar(100),
// porte int)";

// $req=$db->prepare($query);

// $req->execute();

/*
*   Quick test
*/
$Voiture=new Voiture();
$Voiture->setData([]);
if (isset($_POST['send'])) {
   $Voiture->setData(["nom" => $_POST['nom']]);
   header("Location: ./");
}
if (isset($_POST['update'])) {
   $Voiture->update(["nom" => $_POST['nom']],"id=".$_POST['id']);
   header("Location: ./");
}
if (isset($_POST['delete'])) {
   $Voiture->delete($_POST['id']);
   header("Location: ./");
}

echo $html->h('1', 'Create') .
   $html->formOpen('', 'post', 'large primary') .
   $html->input("text", "nom", "nom") .
   $html->button('submit', 'success center', 'envoyer', 'send') .
   $html->formClose();

if($Voiture->getData()){
   echo $html->h('1', 'Read Update Delete');
   foreach ($Voiture->getData() as $key => $value) :
   echo $html->formOpen('', 'post', 'small primary') .
           $html->input("hidden", "id", "", "", $value['id'],$value['id']) . 
           $html->input("text", "nom", "nom", "", $value['nom'],$value['nom']) . 
           $html->button('submit', 'success center', 'mettre a jour', 'update') .
           $html->button('delete', 'danger center', 'supprimer', 'delete') .
           $html->formClose();
   endforeach;
}
