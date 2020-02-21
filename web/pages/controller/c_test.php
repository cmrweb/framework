<?php

/*
Partie SQL
    *supprimer le code ci dessous apres le lancement de la page
*/
use cmrweb\DB;
$db = new DB;
$query="CREATE TABLE IF NOT EXISTS test
(
    id INT PRIMARY KEY AUTO_INCREMENT,
`nom` varchar(255) NOT NULL,
`images` varchar(255) NOT NULL)";

$req=$db->pdo->prepare($query);

$req->execute();

/*
* READ
*/
$test=new Test();
//dump($test->getData());
/*
* CREATE
*/
if (isset($_POST['send'])) {

    if(!empty($_POST["nom"]) ){
if (!empty($_FILES["images"]["size"])) {
                $fileDbName = uploadImg($_FILES["images"]);
                if (move_uploaded_file($_FILES["images"]["tmp_name"], ".." . ROOT_DIR . IMG_DIR."upload/" . $fileDbName)) {$test->setData([

"nom" => $_POST['nom'],

"images" => "$fileDbName"
]);
}}header("Location: test");
}
}
/*
* UPDATE
*/
if (isset($_POST['update'])) {    
    if(!empty($_POST["nom"]) ){
if (!empty($_FILES["images"]["size"])) {
                    $fileDbName = uploadImg($_FILES["images"]);
                    if (move_uploaded_file($_FILES["images"]["tmp_name"], ".." . ROOT_DIR . IMG_DIR."upload/" . $fileDbName)) {$test->update([

"nom" => $_POST['nom'],

"images" => "$fileDbName"
],
"id=".$_POST['id']);
}}header("Location: test");
}
}
/*
* DELETE
*/
if (isset($_POST['delete'])) {

    $test->delete($_POST['id']);
    header("Location: test");
}
?>