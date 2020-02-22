<?php if (!$userid && !$admin) :
    $nav = $html->menu(
        [
            'Home' => ROOT_DIR . "/",
            "admin"=>ROOT_DIR."/admin",
            'Dev' => ROOT_DIR . "/dev",
            'Articles' => ROOT_DIR . "/post",
            
        ],
        ''
    );
elseif ($userid) :
    $nav = $html->menu(
        [
            'Home' => ROOT_DIR . "/",
            "admin"=>ROOT_DIR."/admin",
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
            "admin"=>ROOT_DIR."/admin",
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
</nav>