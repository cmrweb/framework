<?php

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
        if($user->getData()){
            foreach ($user->getData() as $key => $value) {
                if(password_verify($_POST['password'],$value['password'])){
                    $profil = new Profil("user_id=".$value['id']);
                    if($profil->getData())
                    foreach ($profil->getData() as $pf) {
                        $_SESSION['user']['nom'] = $pf['nom'];
                        $_SESSION['user']['prenom'] = $pf['prenom'];
                    }
                    $_SESSION['user']['email'] = $value['email'];
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
