<?php
class Category
{
    
    private $pdo;
    private $data;
    private $id;
private $name;
private $owner;

    function __construct($bool = NULL)
    {
        $this->pdo = new DB;
        $this->pdo->select('*', 'Category', $bool);
        foreach ($this->pdo->result as $value) {
            $this->data[$value['id']] = [
                'id' => $value['id'],
'name'=>$value['name'],
'owner'=>$value['owner'],
  ];
 $this->id[] = $value['id'];
$this->name[] = $value['name'];
$this->owner[] = $value['owner'];

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
        $this->pdo->insert('Category',$data);
    }
    public function update($data,$id)
    {
        $this->pdo = new DB;
        $this->pdo->update('Category',$data,$id);
    }
    public function delete($data)
    {
        $this->pdo = new DB;
        $this->pdo->delete('Category',"id=".$data);
    }
}