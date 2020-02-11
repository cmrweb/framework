<?php
//vue

echo $html->code("div", "", "background");
echo $html->code(
    'section',
    $html->formOpen('', 'post') .
        $html->h('1', 'Create') .
        $html->input("text", "title", "title") .
        $html->textarea(5, "post", "post") .
        $html->input("file", "img", "img") .
        $html->img("", "preview", "imgpreview small center") .
        $html->button('submit', 'success center', 'envoyer', 'addPost') .
        $html->formClose() .
        $html->p($msg),
    'dark small formBall'
);
echo "<p class='newMsg'>Create <i class=\"far fa-comment-alt\"></i></p>";

if ($Post->getData()) : ?>
    <section class="large light">
        <?= $html->h('1', 'Read Update Delete');
            foreach ($Post->getData() as $key => $value) :
                echo $html->formOpen('', 'post', 'large light articles') .
                    $html->input("hidden", "id", "", "", $value['id'], $value['id']) .
                    $html->img(ROOT_DIR . IMG_DIR . $value['img'], $value['img'], "medium center") .
                    $html->input("text", "title", "title", "", $value['title'], $value['title']) .
                    $html->textarea(5, "post", "post", "", $value['post']) .
                    $html->input("file", "img", "img", "") .
                    $html->button('submit', 'success center', 'mettre a jour', 'update') .
                    $html->button('delete', 'danger center', 'supprimer', 'delete') .
                    $html->formClose();
            endforeach; ?>
    </section>
<?php endif;
