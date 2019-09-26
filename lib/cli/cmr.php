<?php
if ($argc != 3 || in_array($argv[1], array('--help', '-help', '-h', 'help'))) {
    ?>
    Utilisation :
    <?php echo $argv[0]."\n";?>
    --help|-help|-h|help                    Aide
    --init|-init|-init|init|i <project>     Init project-name       
    --new|-new|-new|new|n <module>          new module    |> article|a 
                                                          |> user|u  

        
    <?php
//} elseif ($argc != 3 || in_array($argv[1], array('new','--new','-new', '-n','n'))) {
} elseif ($argc != 2 || in_array($argv[1], array('init','--init','-init', '-i','i'))) {
    echo'init '.$argv[2]."\n";
    echo 'Enter|yes|y no|n'."\n";
    echo 'Press Enter to continue: ';
    $handle = fopen ('php://stdin','r');
    $line = fgets($handle);
    if(preg_match('/no|n/',trim($line))){
        echo 'Annulé!';
        exit;
    }else if(preg_match('/yes|y|/',trim($line))){
        $pathCss = '../../'.$argv[2].'/asset/css/';
        $pathJs = '../../'.$argv[2].'/asset/js/';
        $pathLib = '../../'.$argv[2].'/lib/';
        $pathimg = '../../'.$argv[2].'/asset/img/';
        $pathWeb = '../../'.$argv[2].'/web/';
        $pathIncludes = '../../'.$argv[2].'/web/includes';
        $pathEntity = '../../'.$argv[2].'/web/Entity';
        $pathmodule = '../../'.$argv[2].'/web/module';
        $pathpages = '../../'.$argv[2].'/web/pages';
        if (!is_dir($pathpages)&&!mkdir($pathpages, 0777,true)) {
            die('Echec lors de la création des répertoires...');
        }
        if (!is_dir($pathmodule)&&!mkdir($pathmodule, 0777,true)) {
            die('Echec lors de la création des répertoires...');
        }
        if (!is_dir($pathEntity)&&!mkdir($pathEntity, 0777,true)) {
            die('Echec lors de la création des répertoires...');
        }
        if (!is_dir($pathIncludes)&&!mkdir($pathIncludes, 0777,true)) {
            die('Echec lors de la création des répertoires...');
        }
        if (!is_dir($pathWeb)&&!mkdir($pathWeb, 0777,true)) {
            die('Echec lors de la création des répertoires...');
        }
        if (!is_dir($pathimg)&&!mkdir($pathimg, 0777,true)) {
            die('Echec lors de la création des répertoires...');
        }
        if (!is_dir($pathLib)&&!mkdir($pathLib, 0777,true)) {
            die('Echec lors de la création des répertoires...');
        }
        if (!is_dir($pathCss)&&!mkdir($pathCss, 0777,true)) {
            die('Echec lors de la création des répertoires...');
        }
        if (!is_dir($pathJs)&&!mkdir($pathJs, 0777,true)) {
            die('Echec lors de la création des répertoires...');
        }
        //LIB
        $DB = $pathLib.'DB.php';
        $DBFile=file_get_contents('http://cmrweb.free.fr/API/DB.txt');
        file_put_contents($DB,$DBFile);
        $Autoload = $pathLib.'Autoload.php';
        $AutoloadFile=file_get_contents('http://cmrweb.free.fr/API/Autoload.txt');
        file_put_contents($Autoload,$AutoloadFile);
        $Html = $pathLib.'Html.php';
        $HtmlFile=file_get_contents('http://cmrweb.free.fr/API/Html.txt');
        file_put_contents($Html,$HtmlFile);
        $Form = $pathLib.'Form.php';
        $FormFile=file_get_contents('http://cmrweb.free.fr/API/Form.txt');
        file_put_contents($Form,$FormFile);
        //CSS
        $CSS = $pathCss.'cmrstyle.css';
        $cssFile=file_get_contents('http://cmrweb.free.fr/API/css.txt');
        file_put_contents($CSS,$cssFile);
        $prism = $pathCss.'prism.css';
        $prismFile=file_get_contents('http://cmrweb.free.fr/API/prism.txt');
        file_put_contents($prism,$prismFile);
        $normalize = $pathCss.'normalize.css';
        $normalizeFile=file_get_contents('http://cmrweb.free.fr/API/normalize.txt');
        file_put_contents($normalize,$normalizeFile);

        //JS
        $jquery = $pathJs.'jquery-3.2.1.min.js';
        $jqueryFile=file_get_contents('http://cmrweb.free.fr/API/jquery-3.2.1.min.txt');
        file_put_contents($jquery,$jqueryFile);
        $prismjs = $pathJs.'prism.js';
        $prismjsFile=file_get_contents('http://cmrweb.free.fr/API/prism.js.txt');
        file_put_contents($prismjs,$prismjsFile);
        $script = $pathJs.'script.js';
        $scriptFile=file_get_contents('http://cmrweb.free.fr/API/script.txt');
        file_put_contents($script,$scriptFile);
        echo "Projet $argv[2] Générer";
    }

} elseif ($argc != 3 || in_array($argv[1], array('new','--new','-new', '-n','n'))) {
    if(in_array($argv[2], array('article'))){
    ?> 
    module_<?php echo $argv[2]."\n"; ?>
    <?php
    echo 'Enter|yes|y no|n'."\n";
    echo 'Press Enter to continue: ';
    $handle = fopen ('php://stdin','r');
    $line = fgets($handle);
    if(preg_match('/no|n/',trim($line))){
        echo 'Annulé!';
        exit;
    }else if(preg_match('/yes|y|/',trim($line))){
        $pathEntity = 'generated/Entity/';
        $pathModule = 'generated/module/';
        if (!is_dir($pathModule)&&!mkdir($pathModule, 0777,true)) {
            die('Echec lors de la création des répertoires...');
        }
        if (!is_dir($pathEntity)&&!mkdir($pathEntity, 0777,true)) {
            die('Echec lors de la création des répertoires...');
        }
        $file = $pathEntity.'Article.php';
        $file2 = $pathModule.'mod_article.php';
        $content=file_get_contents('http://cmrweb.free.fr//API/mod_article.txt');
        $content2=file_get_contents('http://cmrweb.free.fr//API/Article.txt');
        file_put_contents($file2,$content);
        file_put_contents($file, $content2);
        echo 'Article Générer';
    }
 }elseif(in_array($argv[2], array('user','u'))){ 
     echo 'user';
// }elseif(in_array($argv[2], array('article'))){ //add cmd
}else{
        echo 'commande inconnu...';
    }

} else {
    echo $argv[1];
}
?>