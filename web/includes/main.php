<?php
switch ($url) {
    case '':
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
        require 'web/pages/ajax.php';
        break;

    

    default:
        echo 'ERREUR 404';
        break;
}
