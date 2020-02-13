<?php
if (in_array($argv[1], array('-help', '-h', 'help','h', '','aide','-aide','a','-a'))) {
    ?>
    Utilisation :
    Aide :
    cmr -help|-h|help|h|aide|-aide|a|-a 
    Generer ORM + CRUD :               
    cmr -generate|-gen|generate|gen|g <table> <nom-type-valeur> <nom-type-valeur-table.field>  
    Generer le module de connexion :
    cmr connect|co|-connect|-co
    Demarrer server Wamp :       
    cmr -start|-serve|-s|start|serve|s <project-name>       
                                                         
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

} elseif ($argc != 4 && in_array($argv[1], array("-serve","-start","-s","start","s","serve"))) {
    echo 'Entree|oui|o non|n'."\n";
    echo 'Demmarer le server local ?';
    $handle = fopen ('php://stdin','r');
    $line = fgets($handle);
    if(preg_match('/non|n/',trim($line))){
        echo 'Annulé!';
        exit;
    }else if(preg_match('/oui|o|/',trim($line))){
        echo "http://localhost/{$argv[2]}";
    }
} elseif ($argc != 3 && in_array($argv[1], array("connect","-connect","co","-co"))) {
    echo 'Entree|oui|o non|n'."\n";
    echo 'Generer le module de connexion ?';
    $handle = fopen ('php://stdin','r');
    $line = fgets($handle);
    if(preg_match('/non|n/',trim($line))){
        echo 'Annulé!';
        exit;
    }else if(preg_match('/oui|o|/',trim($line))){
        require_once "user.module.php";
    }
} else {
    echo "Commande inconnue essayer help";
}
?>