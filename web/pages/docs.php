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
