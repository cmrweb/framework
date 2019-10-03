<?php
class Demo
{
    
    private $pdo;
    private $data;
    private $id;
private $name;
private $count;
private $color;
private $image;

    function __construct($bool = NULL)
    {
        $this->pdo = new DB;
        $this->pdo->select('*', 'demo', $bool);
        foreach ($this->pdo->result as $value) {
            $this->data[$value['id']] = [
                'id' => $value['id'],
'name'=>$value['name'],
'count'=>$value['count'],
'color'=>$value['color'],
'image'=>$value['image'],
  ];
 $this->id[] = $value['id'];
$this->name[] = $value['name'];
$this->count[] = $value['count'];
$this->color[] = $value['color'];
$this->image[] = $value['image'];

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
        $this->pdo->insert('demo',$data);
    }
    public function update($data,$id)
    {
        $this->pdo = new DB;
        $this->pdo->update('demo',$data,$id);
    }
    public function delete($data)
    {
        $this->pdo = new DB;
        $this->pdo->delete('demo',"id=".$data);
    }
}