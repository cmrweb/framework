<?php
class Shopping
{
    private $pdo;
    private $data;
    private $id;
    private $name;
    private $price;
    private $promo;
    private $description;
    private $img;
    private $category;
    function __construct($bool = NULL)
    {
        $this->pdo = new DB;
        $this->pdo->select("*", "cmr_shop_product", $bool);
        foreach ($this->pdo->result as $value) {
            $this->data[$value['id']] = [
                'id' => $value['id'],
                'name' => $value['name'],
                'price' => $value['price'],
                'promo' => $value["promo"],
                'description' => $value["description"],
                'img' => $value["img"],
                'category' => $value["category"]
            ];
            $this->id[] = $value['id'];
            $this->name[] = $value['name'];
            $this->price[] = $value['price'];
            $this->promo[] = $value['promo'];
            $this->description[] = $value['description'];
            $this->img[] = $value['img'];
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
        $this->pdo->insert('test',$data);
    }
    public function getPostId(): array
    {
        return $this->id;
    }
    public function getParentId(): array
    {
        return $this->name;
    }
    public function getUserId(): array
    {
        return $this->price;
    }
    public function getpromo(): array
    {
        return $this->promo;
    }
    public function getdescription(): array
    {
        return $this->description;
    }

    public function getImg(): array
    {
        return $this->img;
    }
    public function getcategory(): array
    {
        return $this->category;
    }
}
