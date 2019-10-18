<?php
class User
{
    private $data;
    private $user_id;
    private $username;
    private $password;
    private $admin;
    function __construct($where=NULL)
    {
        $pdo=new DB;
        $pdo->select("*", "cmr_user",$where);
        foreach ($pdo->result as $value) {
            $this->data[] = [
                'user_id' => $value['id'],
                'username' => $value['username'],
                'password' => $value["password"],
                'admin' => $value["admin_lvl"]
            ];
            if(!$where){
                $this->user_id[] = $value['id'];
                $this->username[] = $value['username'];
                $this->password[] = $value['password'];
                $this->admin[] = $value['admin_lvl'];
            }else{
                $this->user_id = $this->data[0]['user_id'];
                $this->username = $this->data[0]['username'];
                $this->password = $this->data[0]['password'];
                $this->admin = $this->data[0]['admin'];
            }

        }
        
        return $this->data;
    }
    public function getData()
    {
        if($this->data)
        return $this->data;
    }
    public function setData($data)
    {
        $this->pdo = new DB;
        $this->pdo->insert('cmr_user',$data);
    }
    public function getUserId():array
    {
        return $this->user_id;
    }
    public function getName()
    {
        return $this->username;
    }
    public function getPass():array
    {
        return $this->password;
    }
}