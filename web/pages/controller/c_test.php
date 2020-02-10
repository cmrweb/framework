<?php

/*
Partie SQL
    *supprimer le code ci dessous apres le lancement de la page
*/

$db = new DB;
$query="CREATE TABLE IF NOT EXISTS user
(
    id INT PRIMARY KEY AUTO_INCREMENT,
`email` varchar(255) NOT NULL,
`password` varchar(255) NOT NULL),
`admin_lvl` int(11) NULL)";

/*
* READ
*/
$req=$db->pdo->prepare($query);
$req->execute();
$user=new User();
/*
* CREATE
*/
if (isset($_POST['send'])) {

    if(!empty($_POST["email"]) &&!empty($_POST["password"]) ){
    $user->setData([
        "email" => $_POST['email'],
        "password" => password_hash($_POST['password'],PASSWORD_BCRYPT)
        ]); 
    header("Location: user");
}
}
/*
* UPDATE
*/
if (isset($_POST['update'])) {    
    if(!empty($_POST["email"]) &&!empty($_POST["password"]) ){
        $user->update([
        "email" => $_POST['email'],
        "password" => password_hash($_POST['password'],PASSWORD_BCRYPT)
        ],
        "id=".$_POST['id']);
        header("Location: user");
}
}
/*
* DELETE
*/
if (isset($_POST['delete'])) {
    if(!empty($_POST["email"]) &&!empty($_POST["password"]) ){
    $user->delete($_POST['id']);
    header("Location: user");
    }
}
/**
 * CONNEXION
 */
if(isset($_POST['conn'])){
    if(!empty($_POST["email"]) &&!empty($_POST["password"]) ){
        $user = new User("email='{$_POST['email']}'");
        dump($user->getData());
        if($user->getData()){
            foreach ($user->getData() as $key => $value) {
                if(password_verify($_POST['password'],$value['password'])){
                    $_SESSION['user']['name'] = $value['email'];
                    $_SESSION['user']['id'] = $value['id'];
                    $_SESSION['user']['admin'] = 0;
                }else{
                    $_SESSION['message'] = "mot de passe ou email incorrect";
                }
            }
        }
        header("Location: user");
        }
}

//dump($_SESSION);
