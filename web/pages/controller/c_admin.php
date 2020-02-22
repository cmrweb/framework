<?php
if(isset($_POST['init'])){
    $route = preg_replace("/home/","init",file_get_contents("web/module/route.php"));
    file_put_contents("web/module/route.php", $route);
    header("Location: ./");
}
$db = new cmrweb\DB;
$req = $db->pdo->prepare("SHOW TABLES");
$req->execute();
$tables = $req->fetchAll(PDO::FETCH_COLUMN);

if(isset($id)){
    $query = $db->pdo->prepare("SELECT * FROM $id");
    $query->execute();
    $fields = $query->fetchAll(PDO::FETCH_ASSOC);

if(isset($slug)){
    $q = $db->pdo->prepare("SELECT * FROM $id WHERE id=$slug");
    $q->execute();
    $update = $q->fetch(PDO::FETCH_ASSOC); 
}
}
if(isset($_POST['update'])){

    $postid = $_POST['id'];
    $_POST = array_slice($_POST,1,-1);
    $postedField="";
    foreach ($_POST as $key => $value) {
       $postedField .= "`{$key}`='{$value}',";
    }
    $postedField=substr($postedField,0,-1);
    $upReq =  $db->pdo->prepare("UPDATE $id SET $postedField WHERE id=$postid");
    $upReq->execute();
    $_SESSION['message']['success'] = "mise à jour confirmer";
    header("Location: ./");
}
