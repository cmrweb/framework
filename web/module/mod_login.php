<?php
$msg = "";
if (isset($_POST['send'])) {
    if (!empty($_POST['username_Log']) && !empty($_POST['password_Log'])) {
        $name = $_POST['username_Log'];  
        $user = new User("username='{$name}'");
        if ($user->getData()) {
            foreach ($user->getData() as $key => $value) {
                $pass = password_verify($_POST['password_Log'], $value['password']); 
            if($pass){
                $_SESSION['user'] = [
                    "id" => $value['user_id'],
                    "name" => $value['username']
                ];
                $user_id = $_SESSION['user']['id'];
                $user_name = $_SESSION['user']['name'];
               $msg= 'connected'; 
               header("Location: index.php");
            }else{
                $msg='error mp ou pseudo';
            }
            }
        } else {
            $msg = "Mais! qui est tu ???";
        }
    } else {
        $msg = "heu! tu ne comprend pas ???";
    }
}


$form = $html->formOpen('', 'post', 'medium dark formLog') .
    $html->input('text', 'username_Log', 'Nom d\'utilisateur', 'entrer votre nom') .
    $html->input('password', 'password_Log', 'mot de passe') .
    $html->button('submit', 'primary center', 'se connecter', 'send') .
    $html->p($msg).
    $html->formClose();
    
echo $form;