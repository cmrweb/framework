<?php if (!$userid && !$admin) :
    $nav = $html->navMenu(
        [
            'Home' => ROOT_DIR . "/",
            "Admin"=>ROOT_DIR."/admin",
            'Dev' => ROOT_DIR . "/dev",
            'Articles' => ROOT_DIR . "/post",
            
        ],
        ''
    );
elseif ($userid) :
    $nav = $html->navMenu(
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
    $nav = $html->navMenu(
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
endif;

$page = isset($_GET['url'])?explode("/",$_GET['url'])[0]:"home";?>
<nav class="nav navClassic">
    <?= $nav ?>
</nav>

<script>
    var pageName = "<?= ucfirst($page) ?>";
    document.getElementById(pageName).style.borderBottom = "none";
</script>

