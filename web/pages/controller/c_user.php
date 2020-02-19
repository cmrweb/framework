<?php
/*
Partie SQL
    *supprimer le code ci dessous apres le lancement de la page
*/

$db = new DB;
$query="
CREATE TABLE IF NOT EXISTS `user` (
    `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    `email` varchar(30) NOT NULL,
    `password` varchar(255) NOT NULL,
    `admin_lvl` int(11) DEFAULT NULL,
    PRIMARY KEY (`id`)
  ) ENGINE=MyISAM DEFAULT CHARSET=utf8;";
$req=$db->pdo->prepare($query);
$req->execute();
/*
* READ
*/
$user=new User();
//dump($user->getData());
/*
* CREATE
*/
if (isset($_POST['insc'])) {

    if(!empty($_POST["email"]) &&!empty($_POST["password"]) ){
    $user->setData([
        "email" => $_POST['email'],
        "password" => password_hash($_POST['password'],PASSWORD_BCRYPT)
        ]); 
    header("Location: ./");
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
        header("Location: ./");
}
}
/*
* DELETE
*/
if (isset($_POST['delete'])) {
    if(!empty($_POST["email"]) &&!empty($_POST["password"]) ){
    $user->delete($_POST['id']);
    header("Location: ./");
    }
}
/**
 * CONNECT
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
                    $_SESSION['user']['admin'] = $value['admin_lvl'];
                }else{
                    $_SESSION['message'] = "mot de passe ou email incorrect";
                }
            }
        }
        header("Location: ./");
        }
}
