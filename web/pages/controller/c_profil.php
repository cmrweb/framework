<?php
needLog();
/*
* READ
*/
$profil=new Profil("user_id=".$userid);

$user = new User("id=".$userid);
//dump($user->getData());
/*
* CREATE
*/
if (isset($_POST['send'])) {

    if(!empty($_POST["user_id"]) &&!empty($_POST["nom"]) &&!empty($_POST["prenom"]) &&!empty($_POST["age"]) &&!empty($_POST["adresse"]) &&!empty($_POST["cp"]) ){
    $profil->setData([

"user_id" => $_POST['user_id'],

"nom" => $_POST['nom'],

"prenom" => $_POST['prenom'],

"age" => $_POST['age'],

"adresse" => $_POST['adresse'],

"cp" => $_POST['cp']
]); 

header("Location: profil");
}
}
/*
* UPDATE
*/
if (isset($_POST['update'])) {    
    if(!empty($_POST["user_id"]) &&!empty($_POST["nom"]) &&!empty($_POST["prenom"]) &&!empty($_POST["age"]) &&!empty($_POST["adresse"]) &&!empty($_POST["cp"]) ){
$profil->update([

"user_id" => $_POST['user_id'],

"nom" => $_POST['nom'],

"prenom" => $_POST['prenom'],

"age" => $_POST['age'],

"adresse" => $_POST['adresse'],

"cp" => $_POST['cp']
],
"id=".$_POST['id']);
$user->update([
    "email" => $_POST['email']
    ],
    "id=".$_POST['user_id']);
header("Location: profil");
}
}
/*
* DELETE
*/
if (isset($_POST['delete'])) {

    $profil->delete($_POST['id']);
    header("Location: profil");
}
?>