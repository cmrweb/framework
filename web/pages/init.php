<?php

$projectName = preg_replace("/\//","",$_ENV['ROOT_PATH']);
$dbHOST = $_ENV['DB_HOST'];
$dbNAME = $_ENV['DB_NAME'];
$dbUSER = $_ENV['DB_USER'];
$dbPASS = $_ENV['DB_PASS'];

if(isset($_POST['send'])){
    //réecrire .env
    if(!empty($_POST['dbHost']) && !empty($_POST['dbName']) && !empty($_POST['dbUser'])){
        $dbHOST = $_POST['dbHost'];
        $dbNAME = $_POST['dbName'];
        $dbUSER = $_POST['dbUser'];
        $dbPASS = $_POST['dbPwd'];
        $envContent = "APP_ENV=\"dev\"
        DB_HOST=\"{$dbHOST}\"
        DB_NAME=\"{$dbNAME}\"
        DB_USER=\"{$dbUSER}\"
        DB_PASS=\"{$dbPASS}\"
        ROOT_PATH=\"/{$_POST['projectName']}\"";
        dump($envContent);
        file_put_contents(".env",$envContent); 
        header("Location: ./");  
    }
    //create database if not exist
    $pdo = new PDO("mysql:host={$dbHOST};","{$dbUSER}","{$dbPASS}");
    $createDB = $pdo->prepare("CREATE DATABASE IF NOT EXISTS {$dbNAME}");
    $createDB->execute();
    echo "La base de donnée {$dbNAME} à été créer.";
    //init required tables
    $db = new DB;
    $tableUser = $db->pdo->prepare("DROP TABLE IF EXISTS `cmr_user`;
    CREATE TABLE IF NOT EXISTS `cmr_user` (
      `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
      `username` varchar(30) NOT NULL,
      `password` varchar(255) NOT NULL,
      `admin_lvl` int(11) DEFAULT NULL,
      PRIMARY KEY (`id`)
    ) ENGINE=MyISAM DEFAULT CHARSET=utf8;
    
    DROP TABLE IF EXISTS `cmr_post`;
    CREATE TABLE IF NOT EXISTS `cmr_post` (
      `post_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
      `parent_id` int(11) DEFAULT '0',
      `user_id` int(11) NOT NULL,
      `titre` varchar(128) NOT NULL,
      `post` text NOT NULL,
      `img` varchar(20) DEFAULT NULL,
      `like_count` int(11) DEFAULT '0',
      PRIMARY KEY (`post_id`)
    ) ENGINE=MyISAM DEFAULT CHARSET=utf8;
    
    DROP TABLE IF EXISTS `online_user`;
    CREATE TABLE IF NOT EXISTS `online_user` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `user_id` text NOT NULL,
      `time` datetime DEFAULT NULL,
      PRIMARY KEY (`id`)
    ) ENGINE=MyISAM DEFAULT CHARSET=utf8;COMMIT;");  
    $tableUser->execute();
}


?>
<style>
label {
    display: block
}
</style>
<form method="post">
    <label for="projectName">Nom du projet</label>
    <input type="text" id="projectName" name="projectName" value="<?=$projectName?>">
    <label for="dbHost">Hote de la Base de données</label>
    <input type="text" id="dbHost" name="dbHost" value="<?=$dbHOST?>">
    <label for="dbName">Nom de la Base de données</label>
    <input type="text" id="dbName" name="dbName" value="<?=$dbNAME?>">
    <label for="dbUser">Nom d'utilisateur de la Base de données'</label>
    <input type="text" id="dbUser" name="dbUser" value="<?=$dbUSER?>">
    <label for="dbPwd">Mot de passe de la Base de données</label>
    <input type="text" id="dbPwd" name="dbPwd" value="<?=$dbPASS?>">

    <button name="send">Valider</button>
</form>