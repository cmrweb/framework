<?php
class Reservation
{

    private $pdo;
    private $data;
    private $id;
    private $date;
    private $lieu;
    private $nom;
    private $prix;

    function __construct($bool = NULL)
    {
        $this->pdo = new DB;
        $this->pdo->select('*', 'reservation', $bool);
        foreach ($this->pdo->result as $value) {
            $this->data[$value['id']] = [
                'id' => $value['id'],
                'date' => $value['date'],
                'lieu' => $value['lieu'],
                'nom' => $value['nom'],
                'prix' => $value['prix'],
            ];
            $this->id[] = $value['id'];
            $this->date[] = $value['date'];
            $this->lieu[] = $value['lieu'];
            $this->nom[] = $value['nom'];
            $this->prix[] = $value['prix'];
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
        $this->pdo->insert('reservation', $data);
    }
    public function update($data, $id)
    {
        $this->pdo = new DB;
        $this->pdo->update('reservation', $data, $id);
    }
    public function delete($data)
    {
        $this->pdo = new DB;
        $this->pdo->delete('reservation', "id=" . $data);
    }
}
