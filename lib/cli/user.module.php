<?php
$controller = "<?php
/*
Partie SQL
    *supprimer le code ci dessous apres le lancement de la page
*/

\$db = new DB;
\$query=\"
CREATE TABLE IF NOT EXISTS `user` (
    `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    `email` varchar(30) NOT NULL,
    `password` varchar(255) NOT NULL,
    `admin_lvl` int(11) DEFAULT NULL,
    PRIMARY KEY (`id`)
  ) ENGINE=MyISAM DEFAULT CHARSET=utf8;\";
\$req=\$db->pdo->prepare(\$query);
\$req->execute();
/*
* READ
*/
\$user=new User();
//dump(\$user->getData());
/*
* CREATE
*/
if (isset(\$_POST['insc'])) {

    if(!empty(\$_POST[\"email\"]) &&!empty(\$_POST[\"password\"]) ){
    \$user->setData([
        \"email\" => \$_POST['email'],
        \"password\" => password_hash(\$_POST['password'],PASSWORD_BCRYPT)
        ]); 
    header(\"Location: ./\");
}
}
/*
* UPDATE
*/
if (isset(\$_POST['update'])) {    
    if(!empty(\$_POST[\"email\"]) &&!empty(\$_POST[\"password\"]) ){
        \$user->update([
        \"email\" => \$_POST['email'],
        \"password\" => password_hash(\$_POST['password'],PASSWORD_BCRYPT)
        ],
        \"id=\".\$_POST['id']);
        header(\"Location: ./\");
}
}
/*
* DELETE
*/
if (isset(\$_POST['delete'])) {
    if(!empty(\$_POST[\"email\"]) &&!empty(\$_POST[\"password\"]) ){
    \$user->delete(\$_POST['id']);
    header(\"Location: ./\");
    }
}
/**
 * CONNECT
 */
if(isset(\$_POST['conn'])){
    if(!empty(\$_POST[\"email\"]) &&!empty(\$_POST[\"password\"]) ){
        \$user = new User(\"email='{\$_POST['email']}'\");
        dump(\$user->getData());
        if(\$user->getData()){
            foreach (\$user->getData() as \$key => \$value) {
                if(password_verify(\$_POST['password'],\$value['password'])){
                    \$_SESSION['user']['name'] = \$value['email'];
                    \$_SESSION['user']['id'] = \$value['id'];
                    \$_SESSION['user']['admin'] = \$value['admin_lvl'];
                }else{
                    \$_SESSION['message'] = \"mot de passe ou email incorrect\";
                }
            }
        }
        header(\"Location: ./\");
        }
}
";

$pathctrl = '../../web/pages/controller/';
$controllerFile = $pathctrl . "c_user" . '.php';
file_put_contents($controllerFile, $controller);
/**
 *  GENERATE ROUTE
 */
$route = substr(file_get_contents("../../web/module/route.php"), 0, -48);
$newRoute = $route . "

case \$url[0] == 'user' and empty(\$url[1]):
    require 'web/pages/controller/c_user.php';
    require 'web/pages/user.php';
    break;

    default:
    echo 'ERREUR 404';
    break;
}";
file_put_contents("../../web/module/route.php", $newRoute);
/**
 *  GENERATE VUE
 */

$vue = "
<!-- Ajouter user à l'url. -->
<link rel='stylesheet' href=\"<?= ROOT_DIR . PAGES_DIR ?>style/user.css\">
<form method='post' class='large primary formLog'>
    <h1>Connexion</h1>
    <div class='form'>
        <label for='email'>email</label>
        <input type=\"email\" class='input mailSecure' name=\"email\" id=\"email\">
    </div>
    <div class='form'>
        <label for='password'>password</label>
        <input type=\"password\" class='input passSecure' name=\"password\" id=\"password\">
    </div>
    <button type='submit' class='success center' name='conn'>connexion</button>
</form>
<form method='post' class='large primary formSign'>
    <h1>Inscription</h1>
    <div class='form'>
        <label for='email'>email</label>
        <input type=\"email\" class='input mailSecure' name=\"email\" id=\"email\">
    </div>
    <div class='form'>
        <label for='password'>password</label>
        <input type=\"password\" class='input passSecure' name=\"password\" id=\"password\">
    </div>
    <button type='submit' class='success center' name='insc'>inscription</button>
</form>";
$pathvue = '../../web/pages/';
$vueFile = $pathvue .'user.php';
file_put_contents($vueFile, $vue);
/**
 * GENERATE CSS
 */
$pathcss = '../../web/pages/style/';
$cssFile = $pathcss .'user.css';
file_put_contents($cssFile, "");
/**
 * GENERATE ENTITY
 */
$class = "<?php
class User
{

    private \$pdo;
    private \$data;
    private \$id;
    private \$email;
    private \$password;
    private \$admin_lvl;

    function __construct(\$bool = NULL)
    {
        \$this->pdo = new DB;
        \$this->pdo->select('*', 'user', \$bool);
        foreach (\$this->pdo->result as \$value) {
            \$this->data[\$value['id']] = [
                'id' => \$value['id'],
                'email' => \$value['email'],
                'password' => \$value['password'],
                'admin_lvl' => \$value['admin_lvl']
            ];
            \$this->id[] = \$value['id'];
            \$this->email[] = \$value['email'];
            \$this->password[] = \$value['password'];
            \$this->admin_lvl[] = \$value['admin_lvl'];
        }
        return \$this->data;
    }
    public function getData(): ?array
    {
        return \$this->data;
    }
    public function setData(\$data)
    {
        \$this->pdo->insert('user', \$data);
    }
    public function update(\$data, \$id)
    {
        \$this->pdo->update('user', \$data, \$id);
    }
    public function delete(\$data)
    {
        \$this->pdo->delete('user', \"id=\" . \$data);
    }
}
";
// echo $class;
$pathClass = '../../web/Entity/';
$classFile = $pathClass .'User.php';
file_put_contents($classFile, $class);

$module = preg_replace("/userModule\=false\;/", "userModule=true;", file_get_contents("../../web/includes/header.php"));
file_put_contents("../../web/includes/header.php", $module);

    $header = file_get_contents("../../web/includes/header.php");
    $newHeader = "$header<?php
    require 'web/pages/controller/c_user.php';
    require 'web/pages/user.php';
    ?>";
    file_put_contents("../../web/includes/header.php",$newHeader);

echo "Generation des fichiers : \n->" . $pathClass ."User.php \n-> " . $pathvue ."user.php \n-> " . $pathctrl . "c_user.php \n-> " . $pathcss ."user.css \nRoute user ajouter";
