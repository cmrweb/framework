<?php
class Test
{
    
    private $pdo;
    private $data;
    private $id;
private $nom;
private $prenom;
private $age;

    function __construct($bool = NULL)
    {
        $this->pdo = new DB;
        $this->pdo->select('*', 'test', $bool);
        foreach ($this->pdo->result as $value) {
            $this->data[$value['id']] = [
                'id' => $value['id'],
'nom'=>$value['nom'],
'prenom'=>$value['prenom'],
'age'=>$value['age'],
  ];
 $this->id[] = $value['id'];
$this->nom[] = $value['nom'];
$this->prenom[] = $value['prenom'];
$this->age[] = $value['age'];

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
        $this->pdo->insert('test',$data);
    }
    public function update($data,$id)
    {
        $this->pdo = new DB;
        $this->pdo->update('test',$data,$id);
    }
    public function delete($data)
    {
        $this->pdo = new DB;
        $this->pdo->delete('test',"id=".$data);
    }
}