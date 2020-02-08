<?php
class Entretien
{
    
    private $pdo;
    private $data;
    private $id;
private $num;
private $question;
private $reponse;
private $page;

    function __construct($bool = NULL)
    {
        $this->pdo = new DB;
        $this->pdo->select('*', 'entretien', $bool);
        foreach ($this->pdo->result as $value) {
            $this->data[$value['id']] = [
                'id' => $value['id'],
'num'=>$value['num'],
'question'=>$value['question'],
'reponse'=>$value['reponse'],
'page'=>$value['page'],
  ];
 $this->id[] = $value['id'];
$this->num[] = $value['num'];
$this->question[] = $value['question'];
$this->reponse[] = $value['reponse'];
$this->page[] = $value['page'];

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
        $this->pdo->insert('entretien',$data);
    }
    public function update($data,$id)
    {
        $this->pdo = new DB;
        $this->pdo->update('entretien',$data,$id);
    }
    public function delete($data)
    {
        $this->pdo = new DB;
        $this->pdo->delete('entretien',"id=".$data);
    }
}