<?php
$sql="<?php\n
/*
SQL Part
    *launch page and remove the following code
*/\n
\$db = new PDO(\"mysql:host=localhost;dbname=db_cmrfw;\",\"root\",\"\",[PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION]);
\$query=\" CREATE TABLE IF NOT EXISTS {$argv[1]}
(
    id INT PRIMARY KEY AUTO_INCREMENT,\n";
    for ($i=2; $i <count($argv) ; $i++) { 
        $field=implode("-",explode(" ",$argv[$i]));      
        $field=explode("-",$field);  
        if (isset($field[2])) {
            $sql.="{$field[0]} {$field[1]}({$field[2]}),\n";
        }else{
            $sql.="{$field[0]} {$field[1]},\n";
        }
    }
    $sql=substr($sql, 0, -2);
$sql.=")\";\n
\$req=\$db->prepare(\$query);\n
\$req->execute();\n
/*
Quick test 
    *add route in web\includes\main.php
    *launch page for creat table
    *comment or remove the sql part
    *uncomment the following code
    *replace \"name\" by your input name
*/
//\${$argv[1]}=new {$argv[1]}();
//\${$argv[1]}->setData([]);
//if (isset(\$_POST['send'])) {
//    \${$argv[1]}->setData([\"name\" => \$_POST['name']]);
//    header(\"Location: ./\");
//}
//if (isset(\$_POST['update'])) {
//    \${$argv[1]}->update([\"name\" => \$_POST['name']],\"id=\".\$_POST['id']);
//    header(\"Location: ./\");
//}
//if (isset(\$_POST['delete'])) {
//    \${$argv[1]}->delete(\$_POST['id']);
//    header(\"Location: ./\");
//}
//
//echo \$html->h('1', 'Create') .
//    \$html->formOpen('', 'post', 'large primary') .
//    \$html->input(\"text\", \"name\", \"name\") .
//    \$html->button('submit', 'success center', 'envoyer', 'send') .
//    \$html->formClose();
//
//if(\${$argv[1]}->getData()){
//    echo \$html->h('1', 'Read Update Delete');
//    foreach (\${$argv[1]}->getData() as \$key => \$value) :
//    echo \$html->formOpen('', 'post', 'small primary') .
//            \$html->input(\"hidden\", \"id\", \"\", \"\", \$value['id'],\$value['id']) . 
//            \$html->input(\"text\", \"name\", \"name\", \"\", \$value['name'],\$value['name']) . 
//            \$html->button('submit', 'success center', 'mettre a jour', 'update') .
//            \$html->button('delete', 'danger center', 'supprimer', 'delete') .
//            \$html->formClose();
//    endforeach;
//}
";
//echo $sql;

$pathsql = '../../web/pages/';
$sqlFile = $pathsql.$argv[1].'.php';
file_put_contents($sqlFile,$sql);

/**
 * GENERATE CLASS
 */
$class="<?php
class {$argv[1]}
{\n    
    private \$pdo;
    private \$data;
    private \$id;\n";
for ($i=2; $i <count($argv) ; $i++) { 
            $field=implode("-",explode(" ",$argv[$i]));      
        $field=explode("-",$field);
    $class.="private \${$field[0]};\n";
}
$class.="
    function __construct(\$bool = NULL)
    {
        \$this->pdo = new DB;
        \$this->pdo->select('*', '{$argv[1]}', \$bool);
        foreach (\$this->pdo->result as \$value) {
            \$this->data[\$value['id']] = [
                'id' => \$value['id'],\n";
for ($i=2; $i <count($argv) ; $i++) { 
            $field=implode("-",explode(" ",$argv[$i]));      
        $field=explode("-",$field);
     $class.="'{$field[0]}'=>\$value['{$field[0]}'],\n";
}
$class.="  ];\n";
$class.=" \$this->id[] = \$value['id'];\n";
for ($i=2; $i <count($argv) ; $i++) { 
            $field=implode("-",explode(" ",$argv[$i]));      
        $field=explode("-",$field);
    $class.="\$this->{$field[0]}[] = \$value['{$field[0]}'];\n";
}
$class.="
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
        \$this->pdo->insert('{$argv[1]}',\$data);
    }
    public function update(\$data,\$id)
    {
        \$this->pdo = new DB;
        \$this->pdo->update('{$argv[1]}',\$data,\$id);
    }
    public function delete(\$data)
    {
        \$this->pdo = new DB;
        \$this->pdo->delete('{$argv[1]}',\"id=\".\$data);
    }
}";
// echo $class;
$pathClass = '../../web/Entity/';
$classFile = $pathClass.$argv[1].'.php';
file_put_contents($classFile,$class);
