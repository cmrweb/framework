<?php
if(isset($id)){
    $Post = new Post("id=".$id); 
    $comments = new Post("parent_id=".$id);
    $db = new DB;
    $db->select("parent_id,COUNT(id) as comm","post",null,false,"parent_id");
    $countComm = $db->result;
}else{
    $Post = new Post();
    $comments = null;//SELECT parent_id,COUNT(id) as comm FROM `post` GROUP BY parent_id
    $db = new DB;
    $db->select("parent_id,COUNT(id) as comm","post",null,false,"parent_id");
    $countComm = $db->result;
}
if (isset($_POST['reponse'])) {
    if(!empty($_POST['title'])&&!empty($_POST['parent_id'])&&!empty($_POST['post'])){
        if (!empty($_FILES['img']["size"])) {
            $fileDbName = uploadImg($_FILES['img']);
            if (move_uploaded_file($_FILES['img']["tmp_name"], "../" . ROOT_DIR . IMG_DIR."upload/" . $fileDbName)) {
                $Post->setData(["parent_id" => $_POST['parent_id'],"user_id" => 0, "title" => $_POST['title'], "post" => nl2br($_POST['post']), "img" => "$fileDbName"]);
                $_SESSION['message']['success'] = "Message envoyer";
            }else{
                $_SESSION['message']['danger'] =  "une erreur est survenu";
            }
        } else {
            $Post->setData(["parent_id" => $_POST['parent_id'],"user_id" => 0, "title" => $_POST['title'], "post" => nl2br($_POST['post'])]);
            $_SESSION['message']['success'] = "Message envoyer";
        }
    }else{
        $_SESSION['message']['danger'] = "Veuillez remplir les champs";
    }
 
    header("Location: ./$id");
}  