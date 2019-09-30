<?php
$argLower=strtolower($argv[1]);
$argUc=ucfirst($argv[1]);
$sql = "<?php\n
/*
SQL Part
    *launch page and remove the following code
*/\n
\$db = new DB;
\$query=\" CREATE TABLE IF NOT EXISTS {$argLower}
(
    id INT PRIMARY KEY AUTO_INCREMENT,\n";
for ($i = 2; $i < count($argv); $i++) {
    $field = implode("-", explode(" ", $argv[$i]));
    $field = explode("-", $field);
    if (isset($field[2])) {
        $sql .= "`{$field[0]}` {$field[1]}({$field[2]}) NOT NULL,\n";
    } else {
        $sql .= "`{$field[0]}` {$field[1]} NOT NULL,\n";
    }
}
$sql = substr($sql, 0, -2);
$sql .= ")\";\n
\$req=\$db->pdo->prepare(\$query);\n
\$req->execute();\n
/*
Quick test 
    *add route in web\includes\main.php
    *launch page for create table
    *comment or remove the sql part
*/
\${$argv[1]}=new {$argUc}();
if (isset(\$_POST['send'])) {\n\${$argv[1]}->setData([";
for ($i = 2; $i < count($argv); $i++) {
    $field = implode("-", explode(" ", $argv[$i]));
    $field = explode("-", $field);
    $sql .= "\"{$field[0]}\" => \$_POST['{$field[0]}'],\n";
}
$sql = substr($sql, 0, -2);
$sql .= "]); \n
header(\"Location: ./\");
}
if (isset(\$_POST['update'])) {\${$argv[1]}->update([";
for ($i = 2; $i < count($argv); $i++) {
    $field = implode("-", explode(" ", $argv[$i]));
    $field = explode("-", $field);
    $sql .= "\"{$field[0]}\" => \$_POST['{$field[0]}'],\n";
}
$sql = substr($sql, 0, -2);

$sql .= "],\"id=\".\$_POST['id']);\n
header(\"Location: ./\");
}
if (isset(\$_POST['delete'])) {
    \${$argv[1]}->delete(\$_POST['id']);
    header(\"Location: ./\");
}

echo \$html->h('1', 'Create') .
    \$html->formOpen('', 'post', 'large primary') .";
for ($i = 2; $i < count($argv); $i++) {
    $field = implode("-", explode(" ", $argv[$i]));
    $field = explode("-", $field);
    switch ($field[1]) {
        case "varchar":
            $sql .= "\$html->input(\"text\", \"{$field[0]}\", \"{$field[0]}\") .\n";
            break;
        case "int":
            $sql .= "\$html->input(\"number\", \"{$field[0]}\", \"{$field[0]}\") .\n";
            break;
        case "date":
            $sql .= "\$html->input(\"date\", \"{$field[0]}\", \"{$field[0]}\") .\n";
            break;
        case "text":
            $sql .= "\$html->textarea(\"5\", \"{$field[0]}\", \"{$field[0]}\") .\n";
            break;
    }
}
$sql .= "
    \$html->button('submit', 'success center', 'envoyer', 'send') .
    \$html->formClose();

if(\${$argv[1]}->getData()){
    echo \$html->h('1', 'Read Update Delete');
    foreach (\${$argv[1]}->getData() as \$key => \$value) :
    echo \$html->formOpen('', 'post', 'small primary') .
            \$html->input(\"hidden\", \"id\", \"\", \"\", \$value['id'],\$value['id']) . ";
for ($i = 2; $i < count($argv); $i++) {
    $field = implode("-", explode(" ", $argv[$i]));
    $field = explode("-", $field);
    switch ($field[1]) {
        case "varchar":
            $sql .= "\$html->input(\"text\", \"{$field[0]}\", \"{$field[0]}\", \"\", \$value['{$field[0]}'],\$value['{$field[0]}']) .\n ";
            break;
        case "int":
            $sql .= "\$html->input(\"number\", \"{$field[0]}\", \"{$field[0]}\", \"\", \$value['{$field[0]}'],\$value['{$field[0]}']) .\n ";
            break;
        case "date":
            $sql .= "\$html->input(\"date\", \"{$field[0]}\", \"{$field[0]}\", \"\", \$value['{$field[0]}'],\$value['{$field[0]}']) .\n ";
            break;
        case "text":
            $sql .= "\$html->textarea(\"5\", \"{$field[0]}\", \"{$field[0]}\").\n";
            break;
    }
}
$sql .= "\$html->button('submit', 'success center', 'mettre a jour', 'update') .
            \$html->button('delete', 'danger center', 'supprimer', 'delete') .
            \$html->formClose();
    endforeach;
}
";
//echo $sql;

$pathsql = '../../web/pages/';
$sqlFile = $pathsql . $argv[1] . '.php';
file_put_contents($sqlFile, $sql);

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
$classFile = $pathClass . $argv[1] . '.php';
file_put_contents($classFile, $class);

echo "Done!";
