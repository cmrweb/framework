<?php
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
        $html->formClose(),
    'light small formBall'
);
echo "<p class='newMsg'>Create <i class=\"far fa-comment-alt\"></i></p>";

if ($Post->getData()) : ?>
    <section class="large light">
        <?= $html->h('1', 'Read Update Delete');
            foreach ($Post->getData() as $key => $value) :
                echo $html->formOpen('', 'post', 'large light articles') .
                    $html->input("hidden", "id", "", "", $value['id'], $value['id']) .
                    $html->img(ROOT_DIR . IMG_DIR."upload/" . $value['img'], $value['img'], "medium center") .
                    $html->input("text", "title", "title", "", $value['title'], $value['title']) .
                    $html->textarea(5, "post", "post", "", $value['post']) .
                    $html->input("file", "img", "img", "") .
                    $html->button('submit', 'success center', 'mettre a jour', 'update') .
                    $html->button('delete', 'danger center', 'supprimer', 'delete') .
                    $html->formClose();
            endforeach; ?>
    </section>
<?php endif;?>
<script>
        $(document).ready(()=>{
            $('.imgpreview').hide();
        });
        function readURL(input) {
            if (input.files && input.files[0]) {
                
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('.imgpreview').attr('src', e.target.result);
                }
                if (input.files[0]) {
                reader.readAsDataURL(input.files[0]);
                }
            }

        }

        $("#img:file").change(function() {
            $('.imgpreview').show();
            readURL(this);
        });

    </script>