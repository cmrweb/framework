<?php

switch ($url) {
    case '':
    require 'web/pages/home.php';
    break;

    case $url[0]=='article'AND empty($url[1]):
    require 'web/pages/article.php';
    break;
    
    case $url[0]=='article' AND !empty($url[1]):
    $id = $url[1];
    require "web/pages/article.php";
    break;

    case $url[0]=='docs'AND empty($url[1]):
    require 'web/pages/docs.php';
    break;

    case $url[0]=='eshop'AND empty($url[1]):
    require 'web/pages/eshop.php';
    break;

    case $url[0]=='test'AND empty($url[1]):
    require 'web/pages/Voiture.php';
    break;

    case $url[0]=='traitement'AND $url[1]=="insert":
    $data = json_encode($_POST);
    echo $data;
   // require 'web/pages/traitement.php';
    break;

    default:
     echo 'ERREUR 404';
     break;
}
?>