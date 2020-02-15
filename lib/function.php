<?php
function needLog(){
    if(!isset($_SESSION['user'])){
      $_SESSION['message']['danger'] ="connexion requise";
      return  header('Location: ./');
    }
}

function needAdmin(){
  if($_SESSION['user']['admin']!=1){
    $_SESSION['message']['danger'] = "connexion requise";
  return  header('Location: ./');
}
}


function dump($var){
  echo "<p class='btn success small dumpBtn' onclick='openModal(\"dump\")'>dump</p>";
  echo "<pre id='dump' class='dump hide'><code class='language-js'>". preg_replace("/}\,\"/","},\n\"",preg_replace("/{\"/","{\n\"",preg_replace("/\,\"/",",\n\t\"",json_encode($var,true))))."</code></pre>";
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
  $_SESSION['message']['danger'] = "l'image est trop lourde";
}

function message($message){
  if(isset($message))
  foreach ($message as $key => $value)
  echo "<p class=\"$key p4\">$value</p>";
}