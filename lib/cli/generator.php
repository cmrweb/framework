<?php
$sql="<?php\n\$db = new PDO(\"mysql:host=localhost;dbname=db_cmrfw;\",\"root\",\"\",[PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION]);
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
*   Quick test
*/
//\${$argv[1]}=new {$argv[1]}();
//\${$argv[1]}->setData([]);
//dump(\${$argv[1]}->getData());";
//echo $sql;

$pathsql = '../../';
$sqlFile = $pathsql.$argv[1].'_sql.php';
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
        \$this->pdo->update('test2',\$data,\$id);
    }
    public function delete(\$data)
    {
        \$this->pdo = new DB;
        \$this->pdo->delete('test2',\"id=\".\$data);
    }
}";
// echo $class;
$pathClass = '../../web/Entity/';
$classFile = $pathClass.$argv[1].'.php';
file_put_contents($classFile,$class);
