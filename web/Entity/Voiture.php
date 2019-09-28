<?php
class Voiture
{
    
    private $pdo;
    private $data;
    private $id;
private $nom;
private $couleur;
private $porte;

    function __construct($bool = NULL)
    {
        $this->pdo = new DB;
        $this->pdo->select('*', 'Voiture', $bool);
        foreach ($this->pdo->result as $value) {
            $this->data[$value['id']] = [
                'id' => $value['id'],
'nom'=>$value['nom'],
'couleur'=>$value['couleur'],
'porte'=>$value['porte'],
  ];
 $this->id[] = $value['id'];
$this->nom[] = $value['nom'];
$this->couleur[] = $value['couleur'];
$this->porte[] = $value['porte'];

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
        $this->pdo->insert('Voiture',$data);
    }
    public function update($data,$id)
    {
        $this->pdo = new DB;
        $this->pdo->update('Voiture',$data,$id);
    }
    public function delete($data)
    {
        $this->pdo = new DB;
        $this->pdo->delete('Voiture',"id=".$data);
    }
}