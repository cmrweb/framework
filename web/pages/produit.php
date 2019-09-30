<?php

/*
SQL Part
    *launch page and remove the following code
*/

$db = new DB;
$query=" CREATE TABLE IF NOT EXISTS produit
(
    id INT PRIMARY KEY AUTO_INCREMENT,
name varchar(255),
price int,
description text,
livraison varchar(255),
category int)";

$req=$db->pdo->prepare($query);

$req->execute();

/*
Quick test 
    *add route in web\includes\main.php
    *launch page for create table
    *comment or remove the sql part
*/
$produit=new produit();
$produit->setData([]);
if (isset($_POST['send'])) {
$produit->setData(["name" => $_POST['name'],
"price" => $_POST['price'],
"description" => $_POST['description'],
"livraison" => $_POST['livraison'],
"category" => $_POST['category']]); 

header("Location: ./");
}
if (isset($_POST['update'])) {$produit->update(["name" => $_POST['name'],
"price" => $_POST['price'],
"description" => $_POST['description'],
"livraison" => $_POST['livraison'],
"category" => $_POST['category']],"id=".$_POST['id']);

header("Location: ./");
}
if (isset($_POST['delete'])) {
    $produit->delete($_POST['id']);
    header("Location: ./");
}

echo $html->h('1', 'Create') .
    $html->formOpen('', 'post', 'large primary') .$html->input("text", "name", "name") .
$html->input("number", "price", "price") .
$html->textarea("5", "description", "description") .
$html->input("text", "livraison", "livraison") .
$html->input("number", "category", "category") .

    $html->button('submit', 'success center', 'envoyer', 'send') .
    $html->formClose();

if($produit->getData()){
    echo $html->h('1', 'Read Update Delete');
    foreach ($produit->getData() as $key => $value) :
    echo $html->formOpen('', 'post', 'small primary') .
            $html->input("hidden", "id", "", "", $value['id'],$value['id']) . $html->input("text", "name", "name", "", $value['name'],$value['name']) .
 $html->input("number", "price", "price", "", $value['price'],$value['price']) .
 $html->textarea("5", "description", "description").
$html->input("text", "livraison", "livraison", "", $value['livraison'],$value['livraison']) .
 $html->input("number", "category", "category", "", $value['category'],$value['category']) .
 $html->button('submit', 'success center', 'mettre a jour', 'update') .
            $html->button('delete', 'danger center', 'supprimer', 'delete') .
            $html->formClose();
    endforeach;
}
