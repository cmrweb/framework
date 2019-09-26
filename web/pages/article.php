<?php
    if(!isset($_SESSION['user'])){
        header('Location: ./');
    }
?> 
<section class="large light articles">
<h1>Article <?= isset($id) ? $id  : '' ?></h1>

<?php if (isset($id)) : ?>
    <?php require_once '../' . ROOT_DIR . MOD_DIR . 'mod_article.php'; ?>
<?php else : ?>
    <?php require_once '../' . ROOT_DIR . MOD_DIR . 'mod_articles.php'; ?>
<?php endif;?>
   </section>