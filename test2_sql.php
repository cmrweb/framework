<?php
// $db = new PDO("mysql:host=localhost;dbname=db_cmrfw;","root","",[PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION]);
// $query=" CREATE TABLE IF NOT EXISTS test2
// (
//     id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
// nom varchar(100),
// prenom varchar(100))";

// $req=$db->prepare($query);

// $req->execute();
$test = new test2();
if (isset($_POST['send'])) {
    $test->setData(["nom" => $_POST['nom'], "prenom" => $_POST['prenom']]);
    header("Location: ./");
}
if (isset($_POST['update'])) {
    $test->update(["nom" => $_POST['nom'], "prenom" => $_POST['prenom']],"id=".$_POST['id']);
    header("Location: ./");
}
if (isset($_POST['delete'])) {
    $test->delete($_POST['id']);
    header("Location: ./");
}
//dump($test->getData());
/**
 * CREATE
 */
echo $html->h('1', 'Create') .
    $html->formOpen('', 'post', 'large primary') .
    $html->input("text", "nom", "nom") .
    $html->input("text", "prenom", "prenom") .
    $html->button('submit', 'success center', 'envoyer', 'send') .
    $html->formClose();

/**
 * READ UPDATE DELETE
 */
if($test->getData()){
    echo $html->h('1', 'Read Update Delete');
    foreach ($test->getData() as $key => $value) :
    echo $html->formOpen('', 'post', 'small primary') .
            $html->input("hidden", "id", "", "", $value['id'],$value['id']) . 
            $html->input("text", "nom", "nom", "", $value['nom'],$value['nom']) . 
            $html->input("text", "prenom", "prenom", "", $value['prenom'],$value['prenom']) . 
            $html->button('submit', 'success center', 'mettre a jour', 'update') .
            $html->button('delete', 'danger center', 'supprimer', 'delete') .
            $html->formClose();
    endforeach;
}

