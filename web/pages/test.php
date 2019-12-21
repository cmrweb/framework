<?php

/*
SQL Part
    *launch page and remove the following code
*/

$db = new DB;
$query=" CREATE TABLE IF NOT EXISTS test
(
    id INT PRIMARY KEY AUTO_INCREMENT,
`name` varchar(255) NOT NULL,
`count` int NOT NULL)";

$req=$db->pdo->prepare($query);

$req->execute();

/*
Quick test 
    *add route in web\includes\main.php
    *launch page for create table
    *comment or remove the sql part
*/
$test=new Test();
if (isset($_POST['send'])) {
$test->setData(["name" => $_POST['name'],
"count" => $_POST['count']]); 

header("Location: ./");
}
if (isset($_POST['update'])) {$test->update(["name" => $_POST['name'],
"count" => $_POST['count']],"id=".$_POST['id']);

header("Location: ./");
}
if (isset($_POST['delete'])) {
    $test->delete($_POST['id']);
    header("Location: ./");
}

echo $html->h('1', 'Create') .
    $html->formOpen('', 'post', 'large primary') .$html->input("text", "name", "name") .
$html->input("number", "count", "count") .

    $html->button('submit', 'success center', 'envoyer', 'send') .
    $html->formClose();

if($test->getData()){
    echo $html->h('1', 'Read Update Delete');
    foreach ($test->getData() as $key => $value) :
    echo $html->formOpen('', 'post', 'small primary') .
            $html->input("hidden", "id", "", "", $value['id'],$value['id']) . $html->input("text", "name", "name", "", $value['name'],$value['name']) .
 $html->input("number", "count", "count", "", $value['count'],$value['count']) .
 $html->button('submit', 'success center', 'mettre a jour', 'update') .
            $html->button('delete', 'danger center', 'supprimer', 'delete') .
            $html->formClose();
    endforeach;
}
