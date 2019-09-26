<?php
if(isset($_POST))
switch ($url) {
    case $url[0]=='traitement'AND $url[1]=="insert":
    $data = json_encode($_POST);
    echo $data;
        break;
    
    default:
        # code...
        break;
}