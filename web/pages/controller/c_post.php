<?php
//controller
needLog();
needAdmin();
$msg = "";
$Post = new Post();
if (isset($_POST['addPost'])) {
    if (!empty($_FILES['img']["size"])) {
        $fileDbName = uploadImg($_FILES['img']);
        if (move_uploaded_file($_FILES['img']["tmp_name"], "../" . ROOT_DIR . IMG_DIR."upload/" . $fileDbName)) {
            $Post->setData(["user_id" => $userid, "title" => $_POST['title'], "post" => $_POST['post'], "img" => "$fileDbName"]);
        }else{
            echo "une erreur est survenu";
        }
    } else {
        $Post->setData(["user_id" => $userid, "title" => $_POST['title'], "post" => $_POST['post']]);
    }
    header("Location: edit");
}
if (isset($_POST['update'])) {
    if (!empty($_FILES['img']["size"])) {
        $fileDbName = uploadImg($_FILES['img']);
        if (move_uploaded_file($_FILES['img']["tmp_name"],  "../" . ROOT_DIR . IMG_DIR."upload/" . $fileDbName)) {
            $Post->update(["user_id" => $userid, "title" => $_POST['title'], "post" => $_POST['post'], "img" => "$fileDbName"], "id=" . $_POST['id']);
        }else{
            echo "une erreur est survenu";
        }
    } else {
        $Post->update(["user_id" => $userid, "title" => $_POST['title'], "post" => $_POST['post']], "id=" . $_POST['id']);
    }
    header("Location: edit");
}
if (isset($_POST['delete'])) {
    $Post->delete($_POST['id']);
    header("Location: edit");
}
