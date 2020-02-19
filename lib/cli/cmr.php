<?php
if (empty($argv[0])||in_array($argv[1], array('-help', '-h', 'help','h', '','aide','-aide','a','-a'))) {
    echo" \e[92m
   ____  ____ ___   _____ __   ___ ______ __
 / ___/ / __ `__ \ / ___//  //   //  __ // /__
/ /___ / / / / / // /   /  /\   //  ___//   __ \
\____//_/ /_/ /_//_/    \__/\__/ \_____/\______/     \e[39m\n
\e[39mAide                          \e[92m| \e[93mcmr \e[92m| \e[39m-help\e[91m|\e[39m-h\e[91m|\e[39m-aide\e[91m|\e[39m-a\e[91m|\e[39mhelp\e[91m|\e[39mh\e[91m|\e[39maide\e[91m|\e[39ma                                                       
\e[39mGenerer un composant          \e[92m| \e[93mcmr \e[92m| \e[39m-generate\e[91m|\e[39m-gen\e[91m|\e[39mgenerate\e[91m|\e[39mgen\e[91m|\e[39mg \e[91m<\e[95mtable\e[91m> \e[91m<\e[93mnom\e[39m-\e[96mtype\e[39m-\e[92mvaleur\e[91m> \e[91m<\e[93mnom\e[39m-\e[96mtype\e[39m-\e[92mvaleur\e[39m-\e[95mtable\e[39m.\e[93mnom\e[91m> 
\e[39mGenerer le module utilisateur \e[92m| \e[93mcmr \e[92m| \e[39m-module\e[91m|\e[39m-mod\e[91m|\e[39mmodule\e[91m|\e[39mmod \e[91m<\e[93m-user\e[91m|\e[93m-u\e[91m|\e[93muser\e[91m|\e[93mu\e[91m>                                                               
\e[39mDemarrer server local         \e[92m| \e[93mcmr \e[92m| \e[39m-start\e[91m|\e[39m-serve\e[91m|\e[39m-s\e[91m|\e[39mstart\e[91m|\e[39mserve\e[91m|\e[39ms                                         
\e[39mBuild le projet \e[91m(in progress!)\e[92m| \e[93mcmr \e[92m| \e[39m-build\e[91m|\e[39m-b\e[91m|\e[39mbuild\e[91m|\e[39mb   \e[39m                                
";
} elseif ($argc >= 1 && in_array($argv[1], array('generate','-generate','-gen','gen', '-g','g'))) {
    echo'generer le composant '.$argv[2]." ?\n";
    echo 'Entree|oui|o non|n'."\n";
    echo 'Entree pour continuer: ';
    $handle = fopen ('php://stdin','r');
    $line = fgets($handle);
    if(preg_match('/non|n/',trim($line))){
        echo 'Annulé!';
        exit;
    }else if(preg_match('/oui|o|/',trim($line))){
        require_once "generator.dev.php";
    }

} elseif ($argc >= 1 && in_array($argv[1], array('build','-build','-b','b'))) {
    echo"build le projet ?\n";
    echo 'Entree|oui|o non|n'."\n";
    echo 'Entree pour continuer: ';
    $handle = fopen ('php://stdin','r');
    $line = fgets($handle);
    if(preg_match('/non|n/',trim($line))){
        echo 'Annulé!';
        exit;
    }else if(preg_match('/oui|o|/',trim($line))){
        require_once "build.php";
    }

} elseif (!empty($argv[1]) && in_array($argv[1], array("-serve","-start","-s","start","s","serve"))) {
    echo 'Entree|oui|o non|n'."\n";
    echo 'Demmarer le server local ?';
    $handle = fopen ('php://stdin','r');
    $line = fgets($handle);
    if(preg_match('/non|n/',trim($line))){
        echo 'Annulé!';
        exit;
    }else if(preg_match('/oui|o|/',trim($line))){
        $path = preg_replace("/[\w|\W]*www\W|\Wlib\Wcli/","",__DIR__);
        exec("start http://localhost/{$path}");
    }
} elseif (!empty($argv[2])&&in_array($argv[1], array("module","-module","mod","-mod"))) {
    if(in_array($argv[2], array("user","-user","u","-u"))){
        echo 'Entree|oui|o non|n'."\n";
        echo 'Generer le module Utilisateur ?';
        $handle = fopen ('php://stdin','r');
        $line = fgets($handle);
        if(preg_match('/non|n/',trim($line))){
            echo 'Annulé!';
            exit;
        }else if(preg_match('/oui|o|/',trim($line))){
            require_once "user.module.php";
        }
    }else{
        echo "module inconnu";
    }
    
} else {
    echo "Commande inconnue essayer : -help";
}
?>