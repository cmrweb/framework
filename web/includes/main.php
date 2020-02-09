<?php
switch ($url) {
    case '':
        if(!empty($_SESSION['init'])){
            require 'web/pages/home.php';
        }else{
            require 'web/pages/init.php';
        }
        break;

    case $url[0] == 'home' and empty($url[1]):
        require 'web/pages/home.php';
        break;
    case $url[0] == 'docs' and empty($url[1]):
        require 'web/pages/docs.php';
        break;

    case $url[0] == 'edit' and empty($url[1]):
        require 'web/pages/Post.php';
        break;

    case $url[0] == 'post' and empty($url[1]):
        require 'web/pages/PostRender.php';
        break;
    case $url[0] == 'post' and !empty($url[1]):
        $id = $url[1];
        require 'web/pages/PostRender.php';
        break;

    case $url[0] == 'chat' and empty($url[1]):
        require 'web/pages/chat.php';
        break;


    case $url[0] == 'users' and empty($url[1]):
        require 'web/pages/utilisateur.php';
        break;

    case $url[0] == 'ajax':
        require 'web/pages/controller/ajax.php';
        break;

   

case $url[0] == 'test' and empty($url[1]):
    require 'web/pages/controller/test.php';
    require 'web/pages/test.php';
    break;

   

case $url[0] == 'test' and empty($url[1]):
    require 'web/pages/controller/test.php';
    require 'web/pages/test.php';
    break;

    default:
    echo 'ERREUR 404';
    break;
}