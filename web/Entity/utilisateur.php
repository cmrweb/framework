<?php
class Utilisateur
{

    private $pdo;
    private $data;
    private $id;
    private $nom;
    private $prenom;
    private $email;
    private $age;

    function __construct($bool = NULL)
    {
        $this->pdo = new DB;
        $this->pdo->select('*', 'utilisateur', $bool);
        foreach ($this->pdo->result as $value) {
            $this->data[$value['id']] = [
                'id' => $value['id'],
                'nom' => $value['nom'],
                'prenom' => $value['prenom'],
                'email' => $value['email'],
                'age' => $value['age'],
            ];
            $this->id[] = $value['id'];
            $this->nom[] = $value['nom'];
            $this->prenom[] = $value['prenom'];
            $this->email[] = $value['email'];
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
        $this->pdo->insert('utilisateur', $data);
    }
    public function update($data, $id)
    {
        $this->pdo = new DB;
        $this->pdo->update('utilisateur', $data, $id);
    }
    public function delete($data)
    {
        $this->pdo = new DB;
        $this->pdo->delete('utilisateur', "id=" . $data);
    }
}
