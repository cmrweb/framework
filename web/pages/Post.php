<?php
needLog();

$Post = new Post();
$Post->setData([]);
if (isset($_POST['send'])) {
    $Post->setData(["user_id" => $userid, "title" => $_POST['title'], "post" => $_POST['post'], "img" => $_POST['img']]);
    header("Location: ./post");
}
if (isset($_POST['update'])) {
    dump($_FILES['img']);
    if ($_FILES['img']["size"] <= 500000) {
        $target_dir =  "../".ROOT_DIR . IMG_DIR;
        $bytes = random_bytes(5);
        $ext = pathinfo(basename($_FILES['img']["name"]), PATHINFO_EXTENSION);
        $target_file = bin2hex($bytes);
        $uploadName = strtolower($target_file . '.' . $ext);
        $fileDbName = strtolower($target_file . '.' . $ext);
        if (is_uploaded_file($_FILES['img']["tmp_name"]))
            if (move_uploaded_file($_FILES['img']["tmp_name"],  $target_dir . $uploadName)) {
                $Post->update(["user_id" => $userid, "title" => $_POST['title'], "post" => $_POST['post'], "img" => $fileDbName], "id=" . $_POST['id']);
                header("Location: ./post");
            }
    }
}
if (isset($_POST['delete'])) {
    $Post->delete($_POST['id']);
    header("Location: ./post");
}

echo $html->h('1', 'Create') .
    $html->formOpen('', 'post', 'large primary') .
    $html->input("text", "title", "title") .
    $html->textarea(5, "post", "post") .
    $html->input("file", "img", "img") .
    $html->button('submit', 'success center', 'envoyer', 'send') .
    $html->formClose();

if ($Post->getData()) {
    echo $html->h('1', 'Read Update Delete');
    foreach ($Post->getData() as $key => $value) :
        echo $html->formOpen('', 'post', 'large light articles') .
            $html->input("hidden", "id", "", "", $value['id'], $value['id']) .
            $html->img(ROOT_DIR.IMG_DIR.$value['img'], $value['img'],"medium center") .
            $html->input("text", "title", "title", "", $value['title'], $value['title']) .
            $html->textarea(5, "post", "post", "", $value['post'], $value['post']) .
            $html->input("file", "img", "img", "") .
            $html->button('submit', 'success center', 'mettre a jour', 'update') .
            $html->button('delete', 'danger center', 'supprimer', 'delete') .
            $html->formClose();
    endforeach;
}
