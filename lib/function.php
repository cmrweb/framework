<?php
function needLog(){
    if(!isset($_SESSION['user'])){
        $msg="connexion requise";
      return  header('Location: ./');
    }
}
