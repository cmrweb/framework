<?php

/*
SQL Part
    *launch page and remove the following code
*/

$db = new DB;
$query=" CREATE TABLE IF NOT EXISTS demo
(
    id INT PRIMARY KEY AUTO_INCREMENT,
`name` varchar(50) NOT NULL,
`count` int NOT NULL,
`color` varchar(50) NOT NULL,
`image` varchar(255) NOT NULL)";

$req=$db->pdo->prepare($query);

$req->execute();

/*
Quick test 
    *add route in web\includes\main.php
    *launch page for create table
    *comment or remove the sql part
*/
$demo=new Demo();
if (isset($_POST['send'])) {
$demo->setData(["name" => $_POST['name'],
"count" => $_POST['count'],
"color" => $_POST['color'],
"image" => $_POST['image']]); 

header("Location: ./demo");
}
if (isset($_POST['update'])) {$demo->update(["name" => $_POST['name'],
"count" => $_POST['count'],
"color" => $_POST['color'],
"image" => $_POST['image']],"id=".$_POST['id']);

header("Location: ./demo");
}
if (isset($_POST['delete'])) {
    $demo->delete($_POST['id']);
    header("Location: ./demo");
}

echo $html->h('1', 'Create') .
    $html->formOpen('', 'post', 'large primary') .$html->input("text", "name", "name") .
$html->input("number", "count", "count") .
$html->input("color", "color", "color") .
$html->input("text", "image", "image") .

    $html->button('submit', 'success center', 'envoyer', 'send') .
    $html->formClose();

if($demo->getData()){
    echo $html->h('1', 'Read Update Delete');
    foreach ($demo->getData() as $key => $value) :
    echo $html->formOpen('', 'post', 'small primary') .
            $html->input("hidden", "id", "", "", $value['id'],$value['id']) . $html->input("text", "name", "name", "", $value['name'],$value['name']) .
 $html->input("number", "count", "count", "", $value['count'],$value['count']) .
 $html->input("color", "color", "color", "", $value['color'],$value['color']) .
 $html->input("text", "image", "image", "", $value['image'],$value['image']) .
 $html->button('submit', 'success center', 'mettre a jour', 'update') .
            $html->button('delete', 'danger center', 'supprimer', 'delete') .
            $html->formClose();
    endforeach;
}
