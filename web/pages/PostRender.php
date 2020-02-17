<?php

dump($countComm);
if ($Post->getData()) : ?>
    <section class="large light">
        <?= $html->h('1', 'Read');
        foreach ($Post->getData() as $key => $value) :  ?>
            <?php if (!isset($id) && !$value['parent_id']) : ?>
                <section class="<?= (isset($id)) ? "article large light" : "articles large light" ?>">
                    <?php
                    $post_user = new profil("user_id=" . $value['user_id']);
                    echo $html->img(ROOT_DIR . IMG_DIR . "upload/" . $value['img'], $value['img'], "medium center");
                    foreach ($post_user->getData() as $usr) echo $html->p($usr['prenom'] . " " . $usr['nom']);
                    echo $html->a((isset($id)) ? "" : "post/" . $value['id'], $html->h(2, $value['title'])) .
                        $html->p(trim($value['post']));
                    foreach ($countComm as $k => $comm) {
                        if ($comm['parent_id'] == $value['id']) {
                            echo $html->p("<small>" . $comm['comm'] . " commentaires</small>");
                        }
                    } ?>
                </section>
                <?php elseif (isset($id) && !$value['parent_id']) :?>
                    <section class="<?= (isset($id)) ? "article large light" : "articles large light" ?>">
                    <?php
                    $post_user = new profil("user_id=" . $value['user_id']);
                    echo $html->img(ROOT_DIR . IMG_DIR . "upload/" . $value['img'], $value['img'], "medium center");
                    foreach ($post_user->getData() as $usr) echo $html->p($usr['prenom'] . " " . $usr['nom']);
                    echo $html->a((isset($id)) ? "" : "post/" . $value['id'], $html->h(2, $value['title'])) .
                        $html->p(trim($value['post']));
                    foreach ($countComm as $k => $comm) {
                        if ($comm['parent_id'] == $value['id']) {
                            echo $html->p("<small>" . $comm['comm'] . " commentaires</small>");
                        }
                    } ?>
                </section>
                <?php elseif (isset($id) && $value['parent_id']) :?>
                    <section class="<?= (isset($id)) ? "article large light" : "articles large light" ?>">
                    <?php
                    $post_user = new profil("user_id=" . $value['user_id']);
                    echo $html->img(ROOT_DIR . IMG_DIR . "upload/" . $value['img'], $value['img'], "medium center");
                    foreach ($post_user->getData() as $usr) echo $html->p($usr['prenom'] . " " . $usr['nom']);
                    echo $html->a((isset($id)) ? "" : "post/" . $value['id'], $html->h(2, $value['title'])) .
                        $html->p(trim($value['post']));
                    foreach ($countComm as $k => $comm) {
                        if ($comm['parent_id'] == $value['id']) {
                            echo $html->p("<small>" . $comm['comm'] . " commentaires</small>");
                        }
                    } ?>
                </section>
            <?php endif ?>

            <?php if ($comments) if ($comments->getData())
                foreach ($comments->getData() as $comment) : ?>
                <section class="articles large light">
                    <?php
                    $post_user = new profil("user_id=" . $comment['user_id']);
                    foreach ($post_user->getData() as $usr) echo $html->p($usr['prenom'] . " " . $usr['nom']);
                    echo $html->img(ROOT_DIR . IMG_DIR . "upload/" . $comment['img'], $comment['img'], "medium center") .
                        $html->a("./" . $comment['id'], $html->h(2, $comment['title'])) .
                        $html->p(trim($comment['post'])); 
                        foreach ($countComm as $k => $comm) {
                            if ($comm['parent_id'] == $comment['id']) {
                                echo $html->p("<small>" . $comm['comm'] . " commentaires</small>");
                            }
                        }?>
                </section>
            <?php endforeach;
            if (isset($id)) : ?>
                <form method="post" class="form large light" enctype="multipart/form-data">
                    <input type="hidden" name="parent_id" value="<?= $value['id'] ?>">
                    <input type="text" class="input" name="title">
                    <textarea class="input" name="post" cols="30" rows="3"></textarea>
                    <input type="file" name="img">
                    <button class="btn primary large center" name="reponse">Envoyer</button>
                </form>
        <?php endif;
        endforeach; ?>
    </section>
<?php else : ?>
    <h2>Ajouter des articles</h2>
<?php endif;
