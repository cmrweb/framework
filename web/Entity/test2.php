<?php
class test2
{
    
    private $pdo;
    private $data;
    private $id;
private $nom;
private $prenom;

    function __construct($bool = NULL)
    {
        $this->pdo = new DB;
        $this->pdo->select('*', 'test2', $bool);
        foreach ($this->pdo->result as $value) {
            $this->data[$value['id']] = [
                'id' => $value['id'],
'nom'=>$value['nom'],
'prenom'=>$value['prenom'],
  ];
 $this->id[] = $value['id'];
$this->nom[] = $value['nom'];
$this->prenom[] = $value['prenom'];

        }
        return $this->data;
    }
    public function getData(): ?array
    {
        return $this->data;
    }
    public function setData($data)
    {
        $this->pdo = new DB;
        $this->pdo->insert('test2',$data);
    }
    public function update($data,$id)
    {
        $this->pdo = new DB;
        $this->pdo->update('test2',$data,$id);
    }
    public function delete($data)
    {
        $this->pdo = new DB;
        $this->pdo->delete('test2',"id=".$data);
    }
}