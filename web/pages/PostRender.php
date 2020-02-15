<?php

dump($Post->getData());
if ($Post->getData()) : ?>
    <section class="large light">
        <?= $html->h('1', 'Read');
            foreach ($Post->getData() as $key => $value) :
                echo $html->code("section",
                    $html->img(ROOT_DIR . IMG_DIR."upload/" . $value['img'], $value['img'], "medium center") .
                    $html->a((isset($id))?"":"post/". $value['id'],$html->h(2, $value['title'])).
                    $html->p(trim($value['post'])),
                    (isset($id))?"article large light":"articles large light");
                    if($comments)if($comments->getData())
                    foreach ($comments->getData() as $comment){
                        echo $html->code("section",
                        $html->img(ROOT_DIR . IMG_DIR."upload/" . $comment['img'], $comment['img'], "medium center") .
                        $html->a("./".$comment['id'],$html->h(2, $comment['title'])).
                        $html->p(trim($comment['post'])),
                        "articles large light");
                     } if(isset($id)):?>
                      <form method="post" class="form large light" enctype="multipart/form-data">
                          <input type="hidden" name="parent_id" value="<?=$value['id']?>">
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
