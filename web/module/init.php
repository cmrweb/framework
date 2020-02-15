<?php
$projectName = preg_replace("/\//","",$_SERVER['REQUEST_URI']);
$dbHOST = $_ENV['DB_HOST'];
$dbNAME = preg_replace("/\//","",$_SERVER['REQUEST_URI']);
$dbUSER = $_ENV['DB_USER'];
$dbPASS = $_ENV['DB_PASS'];
$envContent = "
APP_ENV=\"dev\"
DB_HOST=\"{$dbHOST}\"
DB_NAME=\"{$dbNAME}\"
DB_USER=\"{$dbUSER}\"
DB_PASS=\"{$dbPASS}\"
ROOT_PATH=\"/{$projectName}\"";
$db = new DB($dbNAME);
//dump($envContent);
file_put_contents(".env", $envContent);
if (isset($_POST['send'])) {
  //réecrire .env
  if (!empty($_POST['dbHost']) && !empty($_POST['dbName']) && !empty($_POST['dbUser']) && !empty($_POST['username']) && !empty($_POST['pwd'])) {
    $user = $_POST['username'];
    $pwd = password_hash($_POST['pwd'], PASSWORD_BCRYPT);
    $dbHOST = $_POST['dbHost'];
    $dbNAME = $_POST['dbName'];
    $dbUSER = $_POST['dbUser'];
    $dbPASS = $_POST['dbPwd'];
    $envContent = "
        APP_ENV=\"dev\"
        DB_HOST=\"{$dbHOST}\"
        DB_NAME=\"{$dbNAME}\"
        DB_USER=\"{$dbUSER}\"
        DB_PASS=\"{$dbPASS}\"
        ROOT_PATH=\"/{$projectName}\"";
    //dump($envContent);
    file_put_contents(".env", $envContent);

    $db = new DB($dbNAME);
        //init required tables
    $db = new DB;
    $tableUser = $db->pdo->prepare("DROP TABLE IF EXISTS `user`;
    CREATE TABLE IF NOT EXISTS `user` (

      `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
      `email` varchar(30) NOT NULL,
      `password` varchar(255) NOT NULL,
      `admin_lvl` int(11) DEFAULT NULL,
      PRIMARY KEY (`id`)
    ) ENGINE=MyISAM DEFAULT CHARSET=utf8;

    INSERT INTO `user` (`email`, `password`, `admin_lvl`) 
    VALUES('{$user}','{$pwd}',1);

    DROP TABLE IF EXISTS `post`;
    CREATE TABLE IF NOT EXISTS `post` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `parent_id` int(11) DEFAULT NULL,
      `user_id` int(11) DEFAULT NULL,
      `title` varchar(255) DEFAULT NULL,
      `post` text,
      `img` varchar(50) DEFAULT NULL,
      `category` int(11) DEFAULT NULL,
      PRIMARY KEY (`id`)
    ) ENGINE=MyISAM DEFAULT CHARSET=utf8;

    DROP TABLE IF EXISTS `cmr_follow`;
    CREATE TABLE IF NOT EXISTS `cmr_follow` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `user_id` int(11) NOT NULL,
      `follow_id` int(11) NOT NULL,
      PRIMARY KEY (`id`)
    ) ENGINE=MyISAM DEFAULT CHARSET=utf8;

    DROP TABLE IF EXISTS `chat`;
    CREATE TABLE IF NOT EXISTS `chat` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `nom` varchar(100) NOT NULL,
      `message` text NOT NULL,
      `date` datetime NOT NULL DEFAULT '2019-10-03 00:00:00',
      `sendby` int(11) NOT NULL,
      `sendto` int(11) DEFAULT '0',
      PRIMARY KEY (`id`)
    ) ENGINE=MyISAM DEFAULT CHARSET=utf8;

    DROP TABLE IF EXISTS `online_user`;
    CREATE TABLE IF NOT EXISTS `online_user` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `user_id` text NOT NULL,
      `time` datetime DEFAULT NULL,
      PRIMARY KEY (`id`)
    ) ENGINE=MyISAM DEFAULT CHARSET=utf8;COMMIT;");
    $tableUser->execute();
    //reecriture du path cli
    $cli = preg_replace("/cmrweb/", $projectName, file_get_contents("lib/cli/cmr.bat"));
    file_put_contents("lib/cli/cmr.bat", $cli);

    //reecriture des routes
    $route = preg_replace("/module\/init/", "pages/home", file_get_contents("web/module/route.php"));
    //dump($route);
    file_put_contents("web/module/route.php", $route);
    
    $_SESSION['message']['success'] = "Projet initialiser";
    header("Location: home");
  }else{
      $_SESSION['message']['danger'] = "Veuillez Remplir les champs";
  }
}

 require "web/module/init.manifest.php";
?>
<style>
  label {
    display: block
  }
</style>
<form method="post" class='large primary formContainer'>
  <h1>Initialiation du projet</h1>
  <div class="form">
    <label for="dbHost">Hote de la Base de données</label>
    <input class="input" type="text" id="dbHost" name="dbHost" value="<?= $dbHOST ?>">
  </div>

  <div class="form">
    <label for="dbName">Nom de la Base de données</label>
    <input class="input" type="text" id="dbName" name="dbName" value="<?= $dbNAME ?>">
  </div>

  <div class="form">
    <label for="dbUser">Nom d'utilisateur de la Base de données</label>
    <input class="input" type="text" id="dbUser" name="dbUser" value="<?= $dbUSER ?>">
  </div>

  <div class="form">
    <label for="dbPwd">Mot de passe de la Base de données</label>
    <input class="input" type="text" id="dbPwd" name="dbPwd" value="<?= $dbPASS ?>">
  </div>

  <div class="form">
    <label for="username">Email d'utilisateur</label>
    <input class="input mailSecure" type="email" id="username" name="username">
  </div>

  <div class="form">
    <label for="pwd">Mot de passe</label>
    <input class="input passSecure" type="password" id="pwd" name="pwd">
  </div>

  <button class="btn success large center m4" name="send">Valider</button>
</form>
