<?php
function needLog(){
    if(!isset($_SESSION['user'])){
        $msg="connexion requise";
      return  header('Location: ./');
    }
}
function needAdmin(){
  if($_SESSION['user']['admin']!=1){
    $msg="connexion requise";
  return  header('Location: ./');
}
}