<?php
if (in_array($argv[1], array('-help', '-h', 'help','h', '','aide','-aide','a','-a'))) {
    ?>
    Utilisation :
    Aide :
    cmr -help|-h|help|h|aide|-aide|a|-a 
    Generer ORM + CRUD                  
    cmr -generate|-gen|generate|gen|g <table> <nom-type-valeur> <nom-type-valeur-table.field>  
    Demarrer server Wamp          
    cmr -start|-serve|-s|start|serve|s           
                                                         
<?php
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

} elseif ($argc != 3 && in_array($argv[1], array("-serve","-start","-s","start","s","serve"))) {
    echo 'Entree|oui|o non|n'."\n";
    echo 'Demmarer le server local ?';
    $handle = fopen ('php://stdin','r');
    $line = fgets($handle);
    if(preg_match('/non|n/',trim($line))){
        echo 'Annulé!';
        exit;
    }else if(preg_match('/oui|o|/',trim($line))){
        exec("@echo off

        start c:\wamp64\wampmanager.exe -wait
        REM
        start http://localhost/
        
        exit");
    }
} else {
    echo "Commande inconnue essayer help";
}
?>