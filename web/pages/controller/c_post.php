<?php
//controller
needLog();
needAdmin();
$msg = "";
$Post = new Post();
if (isset($_POST['addPost'])) {
    if (!empty($_FILES['img']["size"])) {
        if ($_FILES['img']["size"] <= 500000) {
            $target_dir =  "../" . ROOT_DIR . IMG_DIR."upload/";
            $bytes = random_bytes(5);
            $ext = pathinfo(basename($_FILES['img']["name"]), PATHINFO_EXTENSION);
            $target_file = bin2hex($bytes);
            $uploadName = strtolower($target_file . '.' . $ext);
            $fileDbName = strtolower($target_file . '.' . $ext);
            if (is_uploaded_file($_FILES['img']["tmp_name"]))
                if (move_uploaded_file($_FILES['img']["tmp_name"],  $target_dir . $uploadName)) {
                    $Post->setData(["user_id" => $userid, "title" => $_POST['title'], "post" => $_POST['post'], "img" => "$fileDbName"]);
                }
        } else {
            $msg = "image trop lourde";
        }
    } else {
        $Post->setData(["user_id" => $userid, "title" => $_POST['title'], "post" => $_POST['post']]);
    }
    header("Location: ./edit");
}
if (isset($_POST['update'])) {
    if (!empty($_FILES['img']["size"])) {
        if ($_FILES['img']["size"] <= 500000) {
            $target_dir =  "../" . ROOT_DIR . IMG_DIR."upload/";
            $bytes = random_bytes(5);
            $ext = pathinfo(basename($_FILES['img']["name"]), PATHINFO_EXTENSION);
            $target_file = bin2hex($bytes);
            $uploadName = strtolower($target_file . '.' . $ext);
            $fileDbName = strtolower($target_file . '.' . $ext);
            if (is_uploaded_file($_FILES['img']["tmp_name"]))
                if (move_uploaded_file($_FILES['img']["tmp_name"],  $target_dir . $uploadName)) {
                    $Post->update(["user_id" => $userid, "title" => $_POST['title'], "post" => $_POST['post'], "img" => "$fileDbName"], "id=" . $_POST['id']);
                }
        } else {
            $msg = "image trop lourde";
        }
    } else {
        $Post->update(["user_id" => $userid, "title" => $_POST['title'], "post" => $_POST['post']], "id=" . $_POST['id']);
    }
    header("Location: ./edit");
}
if (isset($_POST['delete'])) {
    $Post->delete($_POST['id']);
    header("Location: ./edit");
}
