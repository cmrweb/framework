<?php
class Post
{
    
    private $pdo;
    private $data;
    private $id;
private $parent_id;
private $user_id;
private $title;
private $post;
private $img;
private $category;

    function __construct($bool = NULL)
    {
        $this->pdo = new DB;
        $this->pdo->select('*', 'post', $bool);
        foreach ($this->pdo->result as $value) {
            $this->data[$value['id']] = [
                'id' => $value['id'],
'parent_id'=>$value['parent_id'],
'user_id'=>$value['user_id'],
'title'=>$value['title'],
'post'=>$value['post'],
'img'=>$value['img'],
'category'=>$value['category'],
  ];
 $this->id[] = $value['id'];
$this->parent_id[] = $value['parent_id'];
$this->user_id[] = $value['user_id'];
$this->title[] = $value['title'];
$this->post[] = $value['post'];
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
        $this->pdo->insert('post',$data);
    }
    public function update($data,$id)
    {
        $this->pdo = new DB;
        $this->pdo->update('post',$data,$id);
    }
    public function delete($data)
    {
        $this->pdo = new DB;
        $this->pdo->delete('post',"id=".$data);
    }
}