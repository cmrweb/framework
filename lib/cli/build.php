<?php
function recurse_copy($src,$dst) { 
    $dir = opendir($src); 
    @mkdir($dst); 
    while(false !== ( $file = readdir($dir)) ) { 
        if (( $file != '.' ) && ( $file != '..' )) { 
            if ( is_dir($src . '/' . $file) ) { 
                recurse_copy($src . '/' . $file,$dst . '/' . $file); 
            } 
            else { 
                copy($src . '/' . $file,$dst . '/' . $file); 
            } 
        } 
    } 
    closedir($dir); 
} 
if (!mkdir("../../build/asset", 0777, true)) {
    die('Echec lors de la création des répertoires...');
}
recurse_copy("../../asset","../../build/asset");

if (!mkdir("../../build/images", 0777, true)) {
    die('Echec lors de la création des répertoires...');
}
recurse_copy("../../images","../../build/images");

if (!mkdir("../../build/web", 0777, true)) {
    die('Echec lors de la création des répertoires...');
}
recurse_copy("../../web","../../build/web");

if (!mkdir("../../build/vendor", 0777, true)) {
    die('Echec lors de la création des répertoires...');
}
recurse_copy("../../vendor","../../build/vendor");
/**
 * index .env manifest composer lib 
 * !cli !bin !init !git 
 * rewrite .env prod 
 */