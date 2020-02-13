<?php
if ($Post->getData()) : ?>
    <section class="large light">
        <?= $html->h('1', 'Read');
            foreach ($Post->getData() as $key => $value) :
                echo $html->code("section",
                    $html->img(ROOT_DIR . IMG_DIR."upload/" . $value['img'], $value['img'], "medium center") .
                    $html->a((isset($id))?"":"post/". $value['id'],$html->h(2, $value['title'])).
                    $html->p($value['post']),
                    (isset($id))?"article large light":"articles large light");
            endforeach; ?>
    </section>
<?php else : ?>
<h2>Connecter vous en administrateur pour ajouter des articles</h2>
<?php endif;
