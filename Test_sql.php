<?php
$db = new PDO("mysql:host=localhost;dbname=db_cmrfw;","root","",[PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION]);
    $array["nom"]="camara";
    $array["prenom"]="enrique";
    $query="INSERT INTO test(";
foreach ($array as $key => $value) {
    $query.="$key,";
}
$query=substr($query,0,-1);
$query.=") VALUES (";
foreach ($array as $key => $value) {
    $query.="$key=:$key,";
}
$query=substr($query,0,-1);
$query.=")\"";

echo $query;
$params="[";
foreach ($array as $key => $value) {
    $params.="'$key'=>'$value',";
}
$params=substr($params,0,-1);
$params.="]";
echo $params;
// $req=$db->prepare($query);
// $req->execute($params);