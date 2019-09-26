<?php
require_once '../' . ROOT_DIR . MOD_DIR . 'mod_form.php'; 
$articleById = new Article("post_id=$id");

foreach ($articleById->getData() as $key => $value) : ?>
    <article class="article medium" value="<?= $value['post_id']; ?>">
        <h4><?= $value["title"]; ?></h4>
        <p><?= $value["post"]; ?></p>
        <img src="<?= ROOT_DIR . IMG_DIR . '/' . $value["img"] ?>" alt="" width="100%">
    </article>
<?php endforeach;

    $ChildArticle = new Article("parent_id=$id");
    
    if ($ChildArticle->getData()) :
        //var_dump($ChildArticle->getData());
        foreach ($ChildArticle->getData() as $key => $value) : ?>
            <article class="article medium" value="<?= $value['post_id']; ?>">
                <h4><?= $value["title"]; ?></h4>
                <p><?= $value["post"]; ?></p>
                <img src="<?= ROOT_DIR . IMG_DIR . '/' . $value["img"] ?>" alt="" width="100%">
            </article>
<?php endforeach; endif;
