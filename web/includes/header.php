<header class="fixhead xlarge light header">
    <?php
    $dev = $_ENV['APP_ENV']=="dev"?true:false;
    $userModule = false;
    echo $html->h('1', 'CMRWEB<span>Camara</span><span>Enrique</span>', 'title');
    if (isset($_POST['disc'])) {
        unset($_SESSION['user']);
        header("Location: ./");
    }
    ?>
    <i class="fas fa-bars menu"></i>
    <?php
    if (empty($_SESSION['user']) && $userModule) {
        echo
            $html->code(
                'nav',
                $html->menu(
                    [
                        'Inscription' => '',
                        'Connexion' => ''
                    ],
                    'primary popupBtn'
                ),
                'nav navConn'
            );
    } elseif (!empty($_SESSION['user'])) {
        $form = $html->formOpen('', 'post') .
            $html->button('submit', 'primary navConn', '<i class="fas fa-times-circle"></i>', 'disc') .
            $html->formClose();

        echo $form;
    }
    include 'web/module/nav.php';
    ?>
    <p id="AppInstall" class="btn-gold">PWA <i class="fas fa-cloud-download-alt"></i></p>
</header>
<div class="message">
    <?php if(isset($_SESSION['message']))message($_SESSION['message'])?>
</div>
<main>
    <div id="bgCover" class="hide" onclick="openModal()"></div>