<?php
session_start();
require 'vendor/autoload.php';
require 'Autoload.php';
use cmr\autoload\Autoloader;
Autoloader::register(); 
$router = new Router;
$html = new Html();
include 'lib/function.php';
$dotenv = Dotenv\Dotenv::create(__DIR__);;
$dotenv->overload();

define('ROOT_DIR',$_ENV['ROOT_PATH']);
define('CSS_DIR', '/asset/css/');
define('JS_DIR', '/asset/js/');
define('IMG_DIR', '/asset/img/');
define('MOD_DIR', '/web/module/');
define('PAGES_DIR', '/web/pages/');

if(isset($_SESSION['user']['id'])){
    $username = $_SESSION['user']['name'];
    $userid = $_SESSION['user']['id'];
    $admin = $_SESSION['user']['admin'];
}else{
    $username=false;$userid =false;$admin=false;
}