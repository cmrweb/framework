<?php
class Animal
{

    private $pdo;
    private $data;
    private $id;
    private $race;
    private $nom;
    private $color;

    function __construct($bool = NULL)
    {
        $this->pdo = new DB;
        $this->pdo->select('*', 'animal', $bool);
        foreach ($this->pdo->result as $value) {
            $this->data[$value['id']] = [
                'id' => $value['id'],
                'race' => $value['race'],
                'nom' => $value['nom'],
                'color' => $value['color'],
            ];
            $this->id[] = $value['id'];
            $this->race[] = $value['race'];
            $this->nom[] = $value['nom'];
            $this->color[] = $value['color'];
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
        $this->pdo->insert('animal', $data);
    }
    public function update($data, $id)
    {
        $this->pdo = new DB;
        $this->pdo->update('animal', $data, $id);
    }
    public function delete($data)
    {
        $this->pdo = new DB;
        $this->pdo->delete('animal', "id=" . $data);
    }
}
