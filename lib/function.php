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


function dump($var){
  echo "<pre>";var_dump($var);echo"</pre>";
}

function uploadImg($img){
  if ($img["size"] <= 500000) {
    $bytes = random_bytes(5);
    $ext = pathinfo(basename($img["name"]), PATHINFO_EXTENSION);
    $target_file = bin2hex($bytes);
    $uploadName = strtolower($target_file . '.' . $ext);
    if (is_uploaded_file($img["tmp_name"]))
    return $uploadName;
  }else
  return "l'image est trop lourde";
}