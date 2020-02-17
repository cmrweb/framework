<?php
class Profil
{
    
    private $pdo;
    private $data;
    private $id;
private $user_id;
private $nom;
private $prenom;
private $age;
private $adresse;
private $cp;

    function __construct($bool = NULL)
    {
        $this->pdo = new DB;
        $this->pdo->select('*', 'profil', $bool);
        foreach ($this->pdo->result as $value) {
            $this->data[$value['id']] = [
                'id' => $value['id'],
'user_id'=>$value['user_id'],
'nom'=>$value['nom'],
'prenom'=>$value['prenom'],
'age'=>$value['age'],
'adresse'=>$value['adresse'],
'cp'=>$value['cp'],
  ];
 $this->id[] = $value['id'];
$this->user_id[] = $value['user_id'];
$this->nom[] = $value['nom'];
$this->prenom[] = $value['prenom'];
$this->age[] = $value['age'];
$this->adresse[] = $value['adresse'];
$this->cp[] = $value['cp'];

        }
        return $this->data;
    }
    public function getData(): ?array
    {
        return $this->data;
    }
    public function setData($data)
    {
        $this->pdo->insert('profil',$data);
    }
    public function update($data,$id)
    {
        $this->pdo->update('profil',$data,$id);
    }
    public function delete($data)
    {
        $this->pdo->delete('profil',"id=".$data);
    }
}