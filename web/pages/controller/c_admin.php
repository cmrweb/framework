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
    $fields = $query = $db->select("*",$id);
    $emptyfield = null;
    if(!$fields){
        $query = $db->pdo->prepare("DESCRIBE $id");
        $query->execute();
        $emptyfield = $query->fetchAll(PDO::FETCH_COLUMN);
    }

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
    $_SESSION['message']['success'] = "Mise à jour confirmer";
    header("Location: ./");
}
if(isset($_POST['delete'])){
    $postid = $_POST['id'];
    $db->delete($id,"id=$postid");
    header("Location: ./");
}

if(isset($_POST['addField'])){
    $_POST = array_slice($_POST,1,-1);
    $data = $_POST;
    $db->insert($id,$data);
    $_SESSION['message']['success'] = "Donnée Ajouter";
    header("Location: ./$id");
}

