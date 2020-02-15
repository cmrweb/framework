<?php
session_start();
require 'vendor/autoload.php';
require 'Autoload.php';
use cmr\autoload\Autoloader;
Autoloader::register(); 
$html = new Html();
include 'lib/function.php';
$dotenv = Dotenv\Dotenv::create(__DIR__);;
$dotenv->overload();
//dump($_ENV);
define('ROOT_DIR',$_ENV['ROOT_PATH']);
define('CSS_DIR', '/asset/css/');
define('JS_DIR', '/asset/js/');
define('IMG_DIR', '/asset/img/');
define('MOD_DIR', '/web/module/');
define('PAGES_DIR', '/web/pages/');
$dev = $_ENV['APP_ENV']=="dev"?true:false;
$url="";
if (isset($_GET['url'])) {
    $url = explode('/', $_GET['url']);
}
if(isset($_SESSION['user']['id'])){
    $username = $_SESSION['user']['name'];
    $userid = $_SESSION['user']['id'];
    $admin = $_SESSION['user']['admin'];
}else{
    $username=false;$userid =false;$admin=false;
}
