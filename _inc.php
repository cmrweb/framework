<?php
session_start();
require 'vendor/autoload.php';
require 'Autoload.php';
use cmr\autoload\Autoloader;
use cmrweb\Router;
use cmrweb\Html;
use cmrweb\Form;
Autoloader::register(); 
$router = new Router;
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

$useremail = isset($_SESSION['user']['email'])?$_SESSION['user']['email']:false;
$userprenom = isset($_SESSION['user']['prenom'])?$_SESSION['user']['prenom']:false;
$username = isset($_SESSION['user']['nom'])?$_SESSION['user']['nom']:false;
$userid = isset($_SESSION['user']['id'])?$_SESSION['user']['id']:false;
$admin = isset($_SESSION['user']['admin'])?$_SESSION['user']['admin']:false;
