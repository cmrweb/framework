<?php

$loader = new \Twig\Loader\FilesystemLoader('web/templates');
$twig = new \Twig\Environment($loader, [
    'cache' => false//'/tmp',
]);

switch ($url) {
    case '':
    require 'web/pages/home.php';
    break;

    case $url[0]=='docs'AND empty($url[1]):
    require 'web/pages/docs.php';
    break;

    case $url[0]=='edit'AND empty($url[1]):
    require 'web/pages/Post.php';
    break;

    case $url[0]=='post'AND empty($url[1]):
    require 'web/pages/PostRender.php';
    break;
    case $url[0]=='post'AND !empty($url[1]):
    $id=$url[1];
    require 'web/pages/PostRender.php';
    break;

    case $url[0]=='chat'AND empty($url[1]):
    require 'web/pages/chat.php';
    break;

    case $url[0]=='ajax':
    require 'web/pages/ajax.php';
    break;

    default:
     echo 'ERREUR 404';
     break;
}
