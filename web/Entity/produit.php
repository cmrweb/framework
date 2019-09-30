<?php
class Produit
{
    
    private $pdo;
    private $data;
    private $id;
private $name;
private $price;
private $description;
private $livraison;
private $category;

    function __construct($bool = NULL)
    {
        $this->pdo = new DB;
        $this->pdo->select('*', 'produit', $bool);
        foreach ($this->pdo->result as $value) {
            $this->data[$value['id']] = [
                'id' => $value['id'],
'name'=>$value['name'],
'price'=>$value['price'],
'description'=>$value['description'],
'livraison'=>$value['livraison'],
'category'=>$value['category'],
  ];
 $this->id[] = $value['id'];
$this->name[] = $value['name'];
$this->price[] = $value['price'];
$this->description[] = $value['description'];
$this->livraison[] = $value['livraison'];
$this->category[] = $value['category'];

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
        $this->pdo->insert('produit',$data);
    }
    public function update($data,$id)
    {
        $this->pdo = new DB;
        $this->pdo->update('produit',$data,$id);
    }
    public function delete($data)
    {
        $this->pdo = new DB;
        $this->pdo->delete('produit',"id=".$data);
    }
}