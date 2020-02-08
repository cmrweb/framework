<?php
$msg = "";
if (isset($_POST['send'])) {
    if (!empty($_POST['username_Sign']) && !empty($_POST['password_Sign'])) {
    if(preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/",$_POST['password_Sign'])){
        if($_POST['password_Sign']==$_POST['password_Verif']){
            $name = $_POST['username_Sign'];
            $pass = password_hash($_POST['password_Sign'], PASSWORD_BCRYPT);
            $user = new User("username='{$name}'");
            if ($user->getData()) {
                $msg= 'Ce nom est deja pris !!!';
            } else {
    
                try {
                    $db = new DB;
                    $db->insert('cmr_user',["username"=>$name,"password"=>$pass]);
                    $msg = "Bienvenu(e)!";
                } catch (Exception $e) {
                    $msg= $e->getMessage();
                }
            } 
        }else{
            $msg = "les mots de passes ne sont pas identique ???";
        }

    }else{
        $msg ="le mot de passe doit contenir au moins 8 character, une Majuscule et un chiffre";
    }
    } else {
        $msg = "heu! tu ne comprend pas ???";
    }
}


$form = $html->formOpen('', 'post', 'medium dark formSign') .
    $html->input('text', 'username_Sign', 'Nom d\'utilisateur','nameSecure') .
    $html->input('password', 'password_Sign', 'mot de passe','pass passSecure') .
    $html->input('password', 'password_Verif','confirmer mot de passe','passConfirm') .
    $html->button('submit', 'primary center', 's\'inscrire', 'send') .
    $html->p($msg).
    $html->formClose();
echo $form;