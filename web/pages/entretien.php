
<?php

/*
SQL Part
    *launch page and remove the following code
*/

$db = new DB;
$query=" CREATE TABLE IF NOT EXISTS entretien
(
    id INT PRIMARY KEY AUTO_INCREMENT,
`num` int NOT NULL,
`question` varchar(255) NOT NULL,
`reponse` varchar(255) NOT NULL,
`page` int NOT NULL)";

$req=$db->pdo->prepare($query);

$req->execute();

/*
Quick test 
    *add route in web\includes\main.php
    *launch page for create table
    *comment or remove the sql part
*/
$entretien=new Entretien();
if (isset($_POST['send'])) {
$entretien->setData(["num" => $_POST['num'],
"question" => $_POST['question'],
"reponse" => $_POST['reponse'],
"page" => $_POST['page']]); 

header("Location: ./entretien");
}
if (isset($_POST['update'])) {$entretien->update(["num" => $_POST['num'],
"question" => $_POST['question'],
"reponse" => $_POST['reponse'],
"page" => $_POST['page']],"id=".$_POST['id']);

header("Location: ./entretien");
}
if (isset($_POST['delete'])) {
    $entretien->delete($_POST['id']);
    header("Location: ./entretien");
}

echo $html->h('1', 'Create') .
    $html->formOpen('', 'post', 'large primary') .$html->input("number", "num", "num") .
$html->input("text", "question", "question") .
$html->input("text", "reponse", "reponse") .
$html->input("number", "page", "page") .

    $html->button('submit', 'success center', 'envoyer', 'send') .
    $html->formClose();

if($entretien->getData()){
    echo $html->h('1', 'Read Update Delete');
    foreach ($entretien->getData() as $key => $value) :
    echo $html->formOpen('', 'post', 'small primary') .
            $html->input("hidden", "id", "", "", $value['id'],$value['id']) . $html->input("number", "num", "num", "", $value['num'],$value['num']) .
 $html->input("text", "question", "question", "", $value['question'],$value['question']) .
 $html->input("text", "reponse", "reponse", "", $value['reponse'],$value['reponse']) .
 $html->input("number", "page", "page", "", $value['page'],$value['page']) .
 $html->button('submit', 'success center', 'mettre a jour', 'update') .
            $html->button('delete', 'danger center', 'supprimer', 'delete') .
            $html->formClose();
    endforeach;
}
