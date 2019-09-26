<?php
$code = new DB;
$code->select('*', 'cmr_code');
//dump($code->result);
?>
<section>
    <table class='sidenav'>

        <tr class='sideul dark'>
            <th class='btn btn-dark'><a href="#Balise">HTML</a></th>
            <?php foreach ($code->result as $key => $value) : ?>
                <?php if ($value['category_id'] == 1) : ?>
                    <td><a href="#<?= $value['titre'] ?>"><?= $value['titre'] ?></a></td>
                <?php endif ?>
            <?php endforeach ?>
            <th class='btn btn-dark'><a href="#Form">FORM</a></th>
            <?php foreach ($code->result as $key => $value) : ?>
                <?php if ($value['category_id'] == 2) : ?>
                    <td><a href="#<?= $value['titre'] ?>"><?= $value['titre'] ?></a></td>
                <?php endif ?>
            <?php endforeach ?>
            <th class='btn btn-dark'><a href="#DB">DB</a></th>
            <?php foreach ($code->result as $key => $value) : ?>
                <?php if ($value['category_id'] == 3) : ?>
                    <td><a href="#<?= $value['titre'] ?>"><?= $value['titre'] ?></a></td>
                <?php endif ?>
            <?php endforeach ?>
        </tr>
    </table>
</section>
<section class="large right">
    <?php foreach ($code->result as $key => $value) : ?>
        <article class="docs" id="<?= $value['titre'] ?>">
            <h1 class="xlarge gold"><a href="#<?= $value['titre'] ?>"><?= $value['titre'] ?></a></h1>
            <pre>
        <code class="language-php">
        <?= $value['code'] ?>
        </code>
        </pre>
            <?php if (!empty($value['demo'])) : ?>
                <h3>Usage</h3>
                <pre>
            <code class="language-php">
            <?= $value['demo'] ?>
            </code>
            </pre>
                <h3>Rendu</h3>
                <?php eval($value['demo']); ?>
            <?php endif ?>
        </article>
        <hr>
    <?php endforeach ?>
</section>
<script>
    $(window).scroll(function(event) {
        var scroll = $(window).scrollTop();
        //console.log(scroll)
        $("td [href]").css({
            'color': '#fff'
        });
        if (scroll >= 0 && scroll < 930) {
            $("td [href='#Balise']").css({
                'color': '#dfbc0e'
            });

        }
        if (scroll > 930 && scroll < 1850) {
            $("td [href='#Titre']").css({
                'color': '#dfbc0e'
            });
        }
        if (scroll > 1850 && scroll < 2660) {
            $("td [href='#Paragraphe']").css({
                'color': '#dfbc0e'
            });
        }
        if (scroll > 2660 && scroll < 3500) {
            $("td [href='#Lien']").css({
                'color': '#dfbc0e'
            });
        }
        if (scroll > 3500 && scroll < 4300) {
            $("td [href='#Menu']").css({
                'color': '#dfbc0e'
            });
        }
        if (scroll > 4300 && scroll < 5300) {
            $("td [href='#Image']").css({
                'color': '#dfbc0e'
            });
        }
        if (scroll > 5300 && scroll < 6200) {
            $("td [href='#Form']").css({
                'color': '#dfbc0e'
            });
        }
        if (scroll > 6200 && scroll < 7150) {
            $("td [href='#Input']").css({
                'color': '#dfbc0e'
            });
        }
        if (scroll > 7150 && scroll < 7900) {
            $("td [href='#Bouton']").css({
                'color': '#dfbc0e'
            });
        }
        if (scroll > 7900 && scroll < 8900) {

            $("td [href='#Checkbox']").css({
                'color': '#dfbc0e'
            });
        }
        if (scroll > 8900 && scroll < 9700) {

            $("td [href='#Option']").css({
                'color': '#dfbc0e'
            });
        }
        if (scroll > 9700 && scroll < 10000) {
            $("td [href='#Form_Select']").css({
                'color': '#dfbc0e'
            });
        }
    });
</script>