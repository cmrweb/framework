<?php
namespace cmr\autoload;
class Autoloader{

    static function register(){
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }


    static function autoload($className)
    {
    $directory = array('', 'web/Entity/','lib/');
    $fileFormat = array('%s.php');

    foreach ($directory as $current_dir)
    {
        foreach ($fileFormat as $current_format)
        {

            $path = $current_dir.sprintf($current_format, $className);
            if (file_exists($path))
            {
                include $path;
                //dump($path);
                return ;
            }
        }
    }
    }

}