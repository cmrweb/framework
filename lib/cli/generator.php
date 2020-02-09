<?php
$argLower=strtolower($argv[1]);
$argUc=ucfirst($argv[1]);
$controller = "<?php\n
/*
Partie SQL
    *supprimer le code ci dessous apres le lancement de la page
*/\n
\$db = new DB;
\$query=\"CREATE TABLE IF NOT EXISTS {$argLower}
(
    id INT PRIMARY KEY AUTO_INCREMENT,\n";
for ($i = 2; $i < count($argv); $i++) {
    $field = implode("-", explode(" ", $argv[$i]));
    $field = explode("-", $field);
    switch ($field[1]) {
        case "char":
        if (isset($field[2])) {
            $controller .= "`{$field[0]}` varchar({$field[2]}) NOT NULL,\n";
        } else {
            $controller .= "`{$field[0]}` varchar(255) NOT NULL,\n";
        }
        break;
        case "varchar":
        if (isset($field[2])) {
            $controller .= "`{$field[0]}` varchar({$field[2]}) NOT NULL,\n";
        } else {
            $controller .= "`{$field[0]}` varchar(255) NOT NULL,\n";
        }
        break;
        default:
        if (isset($field[2])) {
            $controller .= "`{$field[0]}` {$field[1]}({$field[2]}) NOT NULL,\n";
        } else {
            $controller .= "`{$field[0]}` {$field[1]} NOT NULL,\n";
        }
        break;
    }
}
$controller = substr($controller, 0, -2);
$controller .= ")\";\n
\$req=\$db->pdo->prepare(\$query);\n
\$req->execute();\n
/*
    Fin de la partie SQL
*/
\${$argv[1]}=new {$argUc}();
if (isset(\$_POST['send'])) {\n\${$argv[1]}->setData([";
for ($i = 2; $i < count($argv); $i++) {
    $field = implode("-", explode(" ", $argv[$i]));
    $field = explode("-", $field);
    $controller .= "\"{$field[0]}\" => \$_POST['{$field[0]}'],\n";
}
$controller = substr($controller, 0, -2);
$controller .= "]); \n
header(\"Location: $argLower\");
}
if (isset(\$_POST['update'])) {\${$argv[1]}->update([";
for ($i = 2; $i < count($argv); $i++) {
    $field = implode("-", explode(" ", $argv[$i]));
    $field = explode("-", $field);
    $controller .= "\"{$field[0]}\" => \$_POST['{$field[0]}'],\n";
}
$controller = substr($controller, 0, -2);

$controller .= "],\"id=\".\$_POST['id']);\n
header(\"Location: $argLower\");
}
if (isset(\$_POST['delete'])) {
    \${$argv[1]}->delete(\$_POST['id']);
    header(\"Location: $argLower\");
}
?>";

//echo $controller;

$pathctrl = '../../web/pages/controller/';
$controllerFile = $pathctrl . "c_".$argLower . '.php';
file_put_contents($controllerFile, $controller);
/**
 *  GENERATE ROUTE
 */
$route = substr(file_get_contents("../../web/module/route.php"), 0, -48);
$newRoute = $route."

case \$url[0] == '$argLower' and empty(\$url[1]):
    require 'web/pages/controller/c_$argLower.php';
    require 'web/pages/$argLower.php';
    break;

    default:
    echo 'ERREUR 404';
    break;
}";
file_put_contents("../../web/module/route.php", $newRoute);
/**
 *  GENERATE VUE
 */

$vue ="
<!-- Ajouter $argLower à l'url. -->
<link rel='stylesheet' href=\"<?= ROOT_DIR . PAGES_DIR ?>style/{$argLower}.css\">
<form method='post' class='large primary'>\n<h1>Create</h1>\n";
for ($i = 2; $i < count($argv); $i++) {
    $field = implode("-", explode(" ", $argv[$i]));
    $field = explode("-", $field);
    switch ($field[1]) {
        case "char":
        $vue .= "<div class='form'>\n<label for='{$field[0]}'>{$field[0]}</label>\n<input type=\"text\" class='input' name=\"{$field[0]}\"  id=\"{$field[0]}\">\n</div>\n";
        break;
        case "varchar":
            $vue .= "<div class='form'>\n<label for='{$field[0]}'>{$field[0]}</label>\n<input type=\"text\" class='input' name=\"{$field[0]}\"  id=\"{$field[0]}\">\n</div>\n";
            break;
        case "int":
            $vue .= "<div class='form'>\n<label for='{$field[0]}'>{$field[0]}</label>\n<input type=\"number\" class='input' name=\"{$field[0]}\" id=\"{$field[0]}\">\n</div>\n";
            break;
        case "date":
            $vue .= "<div class='form'>\n<label for='{$field[0]}'>{$field[0]}</label>\n<input type=\"date\" class='input' name=\"{$field[0]}\" id=\"{$field[0]}\">\n</div>\n";
            break;
        case "text":
            $vue .= "<div class='form'>\n<label for='{$field[0]}'>{$field[0]}</label>\n<textarea rows=\"5\" class='input' name=\"{$field[0]}\" id\"{$field[0]}\">\n</div>\n";
            break;
    }
}
$vue .= "<button type='submit' class='success center' name='send'>envoyer</button>
    </form>
<?php if(\${$argv[1]}->getData()): ?>
    <h1>Read Update Delete</h1>
<?php  foreach (\${$argv[1]}->getData() as \$key => \$value) : ?>
    <form method='post' class='small primary'>
            <input type=\"hidden\" name=\"id\" label=\"\" class=\"\" placeholder=\"<?=\$value['id']?>\"  value=\"<?=\$value['id']?>\">\n";
for ($i = 2; $i < count($argv); $i++) {
    $field = implode("-", explode(" ", $argv[$i]));
    $field = explode("-", $field);
    switch ($field[1]) {
        case "char":
        $vue .= "<div class='form'>\n<label for='{$field[0]}'>{$field[0]}</label>\n<input type=\"text\" name=\"{$field[0]}\"  id=\"{$field[0]}\" class=\"input\" placeholder=\"<?=\$value['{$field[0]}']?>\" value=\"<?=\$value['{$field[0]}']?>\"> \n</div>\n";
        break;
        case "varchar":
            $vue .= "<div class='form'>\n<label for='{$field[0]}'>{$field[0]}</label>\n<input type=\"text\" name=\"{$field[0]}\"  id=\"{$field[0]}\" class=\"input\" placeholder=\"<?=\$value['{$field[0]}']?>\" value=\"<?=\$value['{$field[0]}']?>\"> \n</div>\n";
            break;
        case "int":
            $vue .= "<div class='form'>\n<label for='{$field[0]}'>{$field[0]}</label>\n<input type=\"number\" name=\"{$field[0]}\" id=\"{$field[0]}\" class=\"input\" placeholder=\"<?=\$value['{$field[0]}']?>\" value=\"<?=\$value['{$field[0]}']?>\"> \n</div>\n";
            break;
        case "date":
            $vue .= "<div class='form'>\n<label for='{$field[0]}'>{$field[0]}</label>\n<input type=\"date\"name=\"{$field[0]}\" class=\"input\" id=\"{$field[0]}\" placeholder=\"<?=\$value['{$field[0]}']?>\" value=\"<?=\$value['{$field[0]}']?>\"> \n</div>\n";
            break;
        case "text":
            $vue .= "<div class='form'>\n<label for='{$field[0]}'>{$field[0]}</label>\n<textarea rows=\"5\" name=\"{$field[0]}\" class=\"input\" id=\"{$field[0]}\"><?=\$value['{$field[0]}']?></textarea>\n</div>\n";
            break;
    }
}
$vue .= "<button type='submit' class='success center' name='update'>mettre a jour</button>
        <button type='delete' class='danger center'  name='delete'>supprimer</button>
        </form>
<?php endforeach;
endif;
";
$pathvue = '../../web/pages/';
$vueFile = $pathvue . $argLower . '.php';
file_put_contents($vueFile, $vue);

$pathcss = '../../web/pages/style/';
$cssFile = $pathcss . $argLower . '.css';
file_put_contents($cssFile, "");
/**
 * GENERATE CLASS
 */
$class = "<?php
class {$argUc}
{\n    
    private \$pdo;
    private \$data;
    private \$id;\n";
for ($i = 2; $i < count($argv); $i++) {
    $field = implode("-", explode(" ", $argv[$i]));
    $field = explode("-", $field);
    $class .= "private \${$field[0]};\n";
}
$class .= "
    function __construct(\$bool = NULL)
    {
        \$this->pdo = new DB;
        \$this->pdo->select('*', '{$argLower}', \$bool);
        foreach (\$this->pdo->result as \$value) {
            \$this->data[\$value['id']] = [
                'id' => \$value['id'],\n";
for ($i = 2; $i < count($argv); $i++) {
    $field = implode("-", explode(" ", $argv[$i]));
    $field = explode("-", $field);
    $class .= "'{$field[0]}'=>\$value['{$field[0]}'],\n";
}
$class .= "  ];\n";
$class .= " \$this->id[] = \$value['id'];\n";
for ($i = 2; $i < count($argv); $i++) {
    $field = implode("-", explode(" ", $argv[$i]));
    $field = explode("-", $field);
    $class .= "\$this->{$field[0]}[] = \$value['{$field[0]}'];\n";
}
$class .= "
        }
        return \$this->data;
    }
    public function getData(): ?array
    {
        return \$this->data;
    }
    public function setData(\$data)
    {

        \$this->pdo = new DB;
        \$this->pdo->insert('{$argLower}',\$data);
    }
    public function update(\$data,\$id)
    {
        \$this->pdo = new DB;
        \$this->pdo->update('{$argLower}',\$data,\$id);
    }
    public function delete(\$data)
    {
        \$this->pdo = new DB;
        \$this->pdo->delete('{$argLower}',\"id=\".\$data);
    }
}";
// echo $class;
$pathClass = '../../web/Entity/';
$classFile = $pathClass . $argUc . '.php';
file_put_contents($classFile, $class);

echo "Generation des fichiers : \n->".$pathClass . $argUc . ".php \n-> ".$pathvue . $argLower . ".php \n-> ".$pathctrl . "c_".$argLower . ".php \n-> ".$pathcss . $argLower . '.css';
