<?php if (!$userid && !$admin) :
    $nav = $html->menu(
        [
            'Home' => ROOT_DIR . "/",
            'Dev' => ROOT_DIR . "/dev",
            'Articles' => ROOT_DIR . "/post"
        ],
        ''
    );
elseif ($userid) :
    $nav = $html->menu(
        [
            'Home' => ROOT_DIR . "/",
            'Dev' => ROOT_DIR . "/dev",
            'Articles' => ROOT_DIR . "/post",
            'Articles Editor' => ROOT_DIR . "/edit",
            'Profil' => ROOT_DIR . "/profil",
            //'Chat'=> ROOT_DIR."/chat"
        ],
        ''
    );
elseif ($userid && $admin) :
    $nav = $html->menu(
        [
            'Home' => ROOT_DIR . "/",
            'Dev' => ROOT_DIR . "/dev",
            'Articles' => ROOT_DIR . "/post",
            'Articles Editor' => ROOT_DIR . "/edit",
            'Profil' => ROOT_DIR . "/profil",
            //'Chat'=> ROOT_DIR."/chat"
        ],
        ''
    );
endif ?>
<nav class="nav navClassic">
    <?= $nav ?>
<<<<<<< Updated upstream
</nav>
=======
</nav>
<script>
    var pageName = "<?= ucfirst($page) ?>";
    document.getElementById(pageName).style.borderBottom = "none";
</script>
>>>>>>> Stashed changes
