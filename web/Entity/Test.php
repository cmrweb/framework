<?php
use cmrweb\DB;
class Test
{
    
    private $pdo;
    private $data;
    private $id;
private $nom;
private $images;

    function __construct($bool = NULL)
    {
        $this->pdo = new DB;
        $this->pdo->select('*', 'test', $bool);
        foreach ($this->pdo->result as $value) {
            $this->data[$value['id']] = [
                'id' => $value['id'],
'nom'=>$value['nom'],
'images'=>$value['images'],
  ];
 $this->id[] = $value['id'];
$this->nom[] = $value['nom'];
$this->images[] = $value['images'];

        }
        return $this->data;
    }
    public function getData(): ?array
    {
        return $this->data;
    }
    public function setData($data)
    {
        $this->pdo->insert('test',$data);
    }
    public function update($data,$id)
    {
        $this->pdo->update('test',$data,$id);
    }
    public function delete($data)
    {
        $this->pdo->delete('test',"id=".$data);
    }
}