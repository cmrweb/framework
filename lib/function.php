<?php
function needLog(){
    if(!isset($_SESSION['user'])){
      $_SESSION['message']['danger'] ="connexion requise";
      header('Location: ./');
    }
}

function needAdmin(){
  if($_SESSION['user']['admin']!=1){
    $_SESSION['message']['danger'] = "connexion requise";
    header('Location: ./');
}
}


function dump($vars){
  if(gettype($vars)=="array")
  foreach ($vars as $key => $var) {
    array_push($vars,$var);
  }  
    echo "<p class='btn success small dumpBtn' onclick='openModal(\"dump\")'>dump</p>";
    echo "<pre id='dump' class='dump hide'><code class='language-js'>". preg_replace("/}\,\"/","},\n\"",preg_replace("/{\"/","{\n\"",preg_replace("/\,\"/",",\n\t\"",json_encode($vars,true))))."</code></pre>";
 
}

function token($length){
  return bin2hex(random_bytes($length));
}

function uploadImg($img){
  if ($img["size"] <= 5000000) {
    $ext = pathinfo(basename($img["name"]), PATHINFO_EXTENSION);
    $target_file = token(5);
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
  unset($_SESSION['message']);
}