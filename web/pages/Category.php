<?php

/*
SQL Part
    *launch page and remove the following code
*/

$db = new PDO("mysql:host=localhost;dbname=db_cmrfw;","root","",[PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION]);
$query=" CREATE TABLE IF NOT EXISTS Category
(
    id INT PRIMARY KEY AUTO_INCREMENT,
name varchar(255),
owner int)";

$req=$db->prepare($query);

$req->execute();

/*
Quick test 
    *add route in web\includes\main.php
    *launch page for create table
    *comment or remove the sql part
    *uncomment the following code
    *replace "name" by your input name
*/
//$Category=new Category();
//$Category->setData([]);
//if (isset($_POST['send'])) {
//    $Category->setData(["name" => $_POST['name']]);
//    header("Location: ./");
//}
//if (isset($_POST['update'])) {
//    $Category->update(["name" => $_POST['name']],"id=".$_POST['id']);
//    header("Location: ./");
//}
//if (isset($_POST['delete'])) {
//    $Category->delete($_POST['id']);
//    header("Location: ./");
//}
//
//echo $html->h('1', 'Create') .
//    $html->formOpen('', 'post', 'large primary') .
//    $html->input("text", "name", "name") .
//    $html->button('submit', 'success center', 'envoyer', 'send') .
//    $html->formClose();
//
//if($Category->getData()){
//    echo $html->h('1', 'Read Update Delete');
//    foreach ($Category->getData() as $key => $value) :
//    echo $html->formOpen('', 'post', 'small primary') .
//            $html->input("hidden", "id", "", "", $value['id'],$value['id']) . 
//            $html->input("text", "name", "name", "", $value['name'],$value['name']) . 
//            $html->button('submit', 'success center', 'mettre a jour', 'update') .
//            $html->button('delete', 'danger center', 'supprimer', 'delete') .
//            $html->formClose();
//    endforeach;
//}
