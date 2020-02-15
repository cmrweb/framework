<?php
class Router
{
    private static $url;
    function __construct()
    {
        if (isset($_GET['url'])) {
            self::$url = explode('/', $_GET['url']);
        }
    }
    public static function route($route, $file)
    {
        
        switch (self::$url) {
            case self::$url[0] == "{$route}" and empty(self::$url[1]):
                require "web/pages/controller/c_$file.php";
                require "web/pages/$file.php";
                break;
            case '':
                require 'web/pages/controller/c_home.php';
                require 'web/pages/home.php';
                break;
            default:
                echo 'ERREUR 404';
                break;
        }
    }
}
