<?php
$msg = "";
$user_id = $userid;
if (isset($_FILES['upload']))
    $file = array_filter($_FILES['upload']);
//dump($file);

if (isset($_POST['send']) && !isset($file["error"])) {

        if ($_FILES['upload']["size"] <= 5000000) {
            // $check = getimagesize($_FILES['upload']["tmp_name"]);
            // if ($check) {
                $target_dir = '../' . ROOT_DIR . IMG_DIR;
                $bytes = random_bytes(5);
                $ext = pathinfo(basename($_FILES['upload']["name"]), PATHINFO_EXTENSION);
                $target_file = bin2hex($bytes);
                $uploadName = strtolower($target_file . '.' . $ext);
                $fileDbName = strtolower($target_file . '.' . $ext);
                if(is_uploaded_file($_FILES['upload']["tmp_name"]))
                if (move_uploaded_file($_FILES['upload']["tmp_name"],  $target_dir.$uploadName)) {
                    
                    try {
                        if (isset($id)) {
                            $db = new DB;
                            $db->insert('cmr_post(user_id,parent_id,titre,post,img)', "{$user_id},$id,'{$_POST['title']}','{$_POST['msg']}','$fileDbName'");
                        header('Refresh: 0');
                        } else {
                            $db = new DB;
                            $db->insert('cmr_post(user_id,titre,post,img)', "{$user_id},'{$_POST['title']}','{$_POST['msg']}','$fileDbName'");
                        header('Refresh: 0');
                        }
                    } catch (Exception $e) {
                        echo $e->getMessage();
                    }
                    $msg = "image envoyer";
                } else {
                    $msg = "Erreur";
                }
            // } else {
            //     $msg = "ce n'est pas une image.";
            // }
        } else {
            $msg = "fichier trop lourd";
        }
}
if (isset($_POST['send']) && isset($file["error"])) {
    if (!empty($_POST['title']) && !empty($_POST['msg'])) {
        try {
            $db = new DB;
            if (isset($id)) {
                $db->insert('cmr_post(user_id,parent_id,titre,post)', "{$user_id},$id,'{$_POST['title']}','{$_POST['msg']}'");
                $msg = "Message envoyer";
            header('Refresh: 0');
            } else {
                $db->insert('cmr_post(user_id,titre,post)', "{$user_id},'{$_POST['title']}','{$_POST['msg']}'");
                $msg = "Message envoyer";
            header('Refresh: 0');
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    } else {
        $msg = "Bah alors! tu ne veux rien écrire ???";
    }
}
// if (isset($_POST['sendVid'])) {
//     dump($_FILES['video']);
// }
// dump($_FILES['video']);

$form = $html->code('section',
    $html->h('1','Message') .
    $html->formOpen('', 'post', 'large dark') .
    $html->input('text', 'title', 'Titre') .
    $html->textarea('6', 'msg', 'Message', 'msg') .
    $html->input('file', 'upload', 'file') .
    $html->img('#','imgpreview','img'). 
    $html->button('submit', 'primary center', 'envoyer', 'send') .
    $html->formClose() .
    $html->p($msg),
    'dark small formArticle');
echo "<p class='newMsg'>nouveau message <i class=\"far fa-comment-alt\"></i></p>";
echo $form;

?>

<!-- <form action="" method="post" enctype="multipart/form-data">
  <input type="file" name="video" accept="video/*" capture="environment">
  <input type="submit" value="sendVid">
</form> -->
