<?php
class Chat
{

    private $pdo;
    private $data;
    private $id;
    private $nom;
    private $message;
    private $date;
    private $sendby;
    private $sendto;

    function __construct($bool = NULL)
    {
        $this->pdo = new DB;
        $this->pdo->select('*', 'chat', $bool);
        foreach ($this->pdo->result as $value) {
            $this->data[$value['id']] = [
                'id' => $value['id'],
                'nom' => $value['nom'],
                'message' => $value['message'],
                'date' => $value['date'],
                'sendto' => $value['sendto'],
                'sendby' => $value['sendby']
            ];
            $this->id[] = $value['id'];
            $this->nom[] = $value['nom'];
            $this->message[] = $value['message'];
            $this->date[] = $value['date'];
            $this->sendto[] = $value['sendto'];
            $this->sendby[] = $value['sendby'];
                        
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
    public function deletePrivate($data)
    {
        $this->pdo = new DB;
        $this->pdo->delete('chat', "sendto={$data} OR sendby={$data}");
    }
}
