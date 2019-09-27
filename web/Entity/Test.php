<?php
class Test
{
    
    private $pdo;
    private $data;
    private $id;
private $arg2;
private $arg3;
private $arg4;
private $arg5;
private $arg6;

    function __construct($bool = NULL)
    {
        $this->pdo = new DB;
        $this->pdo->select('*', 'Test', $bool);
        foreach ($this->pdo->result as $value) {
            $this->data[$value['id']] = [
                'id' => $value['id'],
'arg2'=>$value['arg2'],
'arg3'=>$value['arg3'],
'arg4'=>$value['arg4'],
'arg5'=>$value['arg5'],
'arg6'=>$value['arg6'],
  ];
 $this->id[] = $value['id'];
$this->arg2[] = $value['arg2'];
$this->arg3[] = $value['arg3'];
$this->arg4[] = $value['arg4'];
$this->arg5[] = $value['arg5'];
$this->arg6[] = $value['arg6'];

        }
        return $this->data;
    }
    public function getData(): ?array
    {
        return $this->data;
    }
}