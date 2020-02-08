
<header class="fixhead xlarge light header">

<?php
echo $html->h('1','CMRWEB<span>Camara</span><span>Enrique</span>','title');
if(isset($_POST['disc'])){
    $_SESSION['user']=NULL;
    header("Location: index.php");
}
?>
<i class="fas fa-bars menu"></i>
<?php
if(!isset($_SESSION['user'])){
echo 
$html->code('nav',
$html->menu([
    'Inscription' => '',
    'Connexion'=> '' 
],
'primary popupBtn'),
'nav navConn');
    require_once '../'.ROOT_DIR.MOD_DIR.'mod_signin.php';
    require_once '../'.ROOT_DIR.MOD_DIR.'mod_login.php';  
    echo $msg;
}else{
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

