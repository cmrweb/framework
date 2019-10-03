<?php
class Chat
{

    private $pdo;
    private $data;
    private $id;
    private $nom;
    private $message;
    private $date;

    function __construct($bool = NULL)
    {
        $this->pdo = new DB;
        $this->pdo->select('*', 'chat', $bool, true);
        foreach ($this->pdo->result as $value) {
            $this->data[$value['id']] = [
                'id' => $value['id'],
                'nom' => $value['nom'],
                'message' => $value['message'],
                'date' => $value['date']
            ];
            $this->id[] = $value['id'];
            $this->nom[] = $value['nom'];
            $this->message[] = $value['message'];
            $this->date[] = $value['date'];
                        
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
        $this->pdo->insert('chat', $data);
    }
    public function update($data, $id)
    {
        $this->pdo = new DB;
        $this->pdo->update('chat', $data, $id);
    }
    public function delete($data)
    {
        $this->pdo = new DB;
        $this->pdo->delete('chat', "id=" . $data);
    }
}
