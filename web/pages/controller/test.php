<?php

/*
Partie SQL
    *supprimer le code ci dessous apres le lancement de la page
*/

$db = new DB;
$query="CREATE TABLE IF NOT EXISTS test
(
    id INT PRIMARY KEY AUTO_INCREMENT,
`nom` varchar(100) NOT NULL,
`prenom` varchar(200) NOT NULL,
`age` int NOT NULL)";

$req=$db->pdo->prepare($query);

$req->execute();

$test=new Test();
if (isset($_POST['send'])) {
$test->setData(["nom" => $_POST['nom'],
"prenom" => $_POST['prenom'],
"age" => $_POST['age']]); 

header("Location: test");
}
if (isset($_POST['update'])) {$test->update(["nom" => $_POST['nom'],
"prenom" => $_POST['prenom'],
"age" => $_POST['age']],"id=".$_POST['id']);

header("Location: test");
}
if (isset($_POST['delete'])) {
    $test->delete($_POST['id']);
    header("Location: test");
}
?>