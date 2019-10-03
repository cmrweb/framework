<?php

switch ($url) {
    case '':
    require 'web/pages/home.php';
    break;

    case $url[0]=='docs'AND empty($url[1]):
    require 'web/pages/docs.php';
    break;

    case $url[0]=='produit'AND empty($url[1]):
    require 'web/pages/produit.php';
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
 
    case $url[0]=='demo'AND empty($url[1]):
    require 'web/pages/demo.php';
    break;

    case $url[0]=='resa'AND empty($url[1]):
    require 'web/pages/reservation.php';
    break;

    case $url[0]=='traitement':
    require 'web/pages/traitement.php';
    break;

    default:
     echo 'ERREUR 404';
     break;
}
