<?php
    if(!isset($_SESSION['user'])){
        $msg="connexion requise";
        header('Location: ./');
    }
?> 
<section class="large light articles">
<h1>Article <?= isset($id) ? $id  : '' ?></h1>

<?php if (isset($id)) : ?>
    <?php require_once '../' . ROOT_DIR . MOD_DIR . 'shopping/mod_shopping.php'; ?>
<?php else : ?>
    <?php require_once '../' . ROOT_DIR . MOD_DIR . 'shopping/mod_shopping.php'; ?>
<?php endif;?>
   </section>