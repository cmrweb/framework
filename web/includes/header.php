<header class="fixhead xlarge light header">
<?php
$userModule=true;
echo $html->h('1','CMRWEB<span>Camara</span><span>Enrique</span>','title');
if(isset($_POST['disc'])){
    $_SESSION['user']=NULL;
    header("Location: index.php");
}
?>
<i class="fas fa-bars menu"></i>
<?php
if(empty($_SESSION['user'])&&$userModule){
echo 
$html->code('nav',
$html->menu([
    'Inscription' => '',
    'Connexion'=> '' 
],
'primary popupBtn'),
'nav navConn'); 
}elseif(!empty($_SESSION['user'])){
    $form = $html->formOpen('', 'post') .
    $html->button('submit', 'primary navConn', '<i class="fas fa-times-circle"></i>', 'disc') .
    $html->formClose();
    
echo $form;
}
include 'web/module/nav.php';
?>
<p id="AppInstall" class="btn-gold">PWA <i class="fas fa-cloud-download-alt"></i></p>
</header>

<main>

<?php
    require 'web/pages/controller/c_user.php';
    require 'web/pages/user.php';
    ?>