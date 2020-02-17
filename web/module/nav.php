<?php if (!$userid && !$admin) :
    $nav = $html->menu(
        [
            'Home' => ROOT_DIR . "/",
            'Dev' => ROOT_DIR . "/dev",
            'Articles' => ROOT_DIR . "/post",
            'Articles Editor' => ROOT_DIR . "/edit"
        ],
        ''
    );
elseif ($admin) :
    $nav = $html->menu(
        [
            'Home' => ROOT_DIR . "/",
            'Dev' => ROOT_DIR . "/dev",
            'Demo' => ROOT_DIR . "/post",
            'Article Editor' => ROOT_DIR . "/edit",
            // 'Chat'=> ROOT_DIR."/chat"
        ],
        ''
    );
elseif ($userid && !$admin) :
    $nav = $html->menu(
        [
            'Home' => ROOT_DIR . "/",
            'Dev' => ROOT_DIR . "/dev",
            'Demo' => ROOT_DIR . "/post",
            // 'Chat'=> ROOT_DIR."/chat"
        ],
        ''
    );
endif ?>
<nav class="nav navClassic">
    <?= $nav ?>
</nav>