
<?php

/*
SQL Part
    *launch page and remove the following code
*/

$db = new DB;
$query = " CREATE TABLE IF NOT EXISTS utilisateur
(
    id INT PRIMARY KEY AUTO_INCREMENT,
`nom` varchar(150) NOT NULL,
`prenom` varchar(150) NOT NULL,
`email` varchar(250) NOT NULL,
`age` int NOT NULL)";

$req = $db->pdo->prepare($query);

$req->execute();

/*
Quick test 
    *add route in web\includes\main.php
    *launch page for create table
    *comment or remove the sql part
*/
$utilisateur = new Utilisateur();
if (isset($_POST['send'])) {
    $utilisateur->setData([
        "nom" => $_POST['nom'],
        "prenom" => $_POST['prenom'],
        "email" => $_POST['email'],
        "age" => $_POST['age']
    ]);

    header("Location: ./users");
}
if (isset($_POST['update'])) {
    $utilisateur->update([
        "nom" => $_POST['nom'],
        "prenom" => $_POST['prenom'],
        "email" => $_POST['email'],
        "age" => $_POST['age']
    ], "id=" . $_POST['id']);

    header("Location: ./users");
}
if (isset($_POST['delete'])) {
    $utilisateur->delete($_POST['id']);
    header("Location: ./users");
}

echo $html->h('1', 'Create') .
    $html->formOpen('', 'post', 'large primary') . $html->input("text", "nom", "nom") .
    $html->input("text", "prenom", "prenom") .
    $html->input("text", "email", "email") .
    $html->input("number", "age", "age") .

    $html->button('submit', 'success center', 'envoyer', 'send') .
    $html->formClose();

if ($utilisateur->getData()) {
    echo $html->h('1', 'Read Update Delete');
    foreach ($utilisateur->getData() as $key => $value) :
        echo $html->formOpen('', 'post', 'small primary') .
            $html->input("hidden", "id", "", "", $value['id'], $value['id']) . $html->input("text", "nom", "nom", "", $value['nom'], $value['nom']) .
            $html->input("text", "prenom", "prenom", "", $value['prenom'], $value['prenom']) .
            $html->input("text", "email", "email", "", $value['email'], $value['email']) .
            $html->input("number", "age", "age", "", $value['age'], $value['age']) .
            $html->button('submit', 'success center', 'mettre a jour', 'update') .
            $html->button('delete', 'danger center', 'supprimer', 'delete') .
            $html->formClose();
    endforeach;
}
