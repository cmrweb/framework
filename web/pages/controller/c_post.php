<?php
//controller
// needLog();
// needAdmin();
$msg = "";
$Post = new Post("parent_id IS NULL");
dump($Post->getData());
if (isset($_POST['addPost'])) {
    if(!empty($_POST['title'])&&!empty($_POST['post'])){
        if (!empty($_FILES['img']["size"])) {
            $fileDbName = uploadImg($_FILES['img']);
            if (move_uploaded_file($_FILES['img']["tmp_name"], "../" . ROOT_DIR . IMG_DIR."upload/" . $fileDbName)) {
                $Post->setData(["user_id" => 0, "title" => $_POST['title'], "post" => nl2br($_POST['post']), "img" => "$fileDbName"]);
                $_SESSION['message']['success'] = "Message envoyer";
            }else{
                $_SESSION['message']['danger'] =  "une erreur est survenu";
            }
        } else {
            $Post->setData(["user_id" => 0, "title" => $_POST['title'], "post" => nl2br($_POST['post'])]);
            $_SESSION['message']['success'] = "Message envoyer";
        }
    }else{
        $_SESSION['message']['danger'] = "Veuillez remplir les champs";
    }
    header("Location: edit");
}
if (isset($_POST['update'])) {
    if (!empty($_FILES['img']["size"])) {
        $fileDbName = uploadImg($_FILES['img']);
        if (move_uploaded_file($_FILES['img']["tmp_name"],  "../" . ROOT_DIR . IMG_DIR."upload/" . $fileDbName)) {
            $Post->update(["user_id" => 0, "title" => $_POST['title'], "post" => nl2br($_POST['post']), "img" => "$fileDbName"], "id=" . $_POST['id']);
            $_SESSION['message']['success'] = "Message mis à jour";
        }else{
            $_SESSION['message']['danger'] =  "une erreur est survenu";
        }
    } else {
        $Post->update(["user_id" => 0, "title" => $_POST['title'], "post" => nl2br($_POST['post'])], "id=" . $_POST['id']);
        $_SESSION['message']['success'] = "Message mis à jour";
    }
    header("Location: edit");
}
if (isset($_POST['delete'])) {
    $Post->delete($_POST['id']);
    header("Location: edit");
}
