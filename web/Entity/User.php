<?php
class User
{
    private $data;
    private $user_id;
    private $username;
    private $password;
    function __construct($where=NULL)
    {
        $pdo=new DB;
        $pdo->select("*", "cmr_user",$where);
        foreach ($pdo->result as $value) {
            $this->data[] = [
                'user_id' => $value['user_id'],
                'username' => $value['username'],
                'password' => $value["password"]
            ];
            if(!$where){
                $this->user_id[] = $value['user_id'];
                $this->username[] = $value['username'];
                $this->password[] = $value['password'];
            }else{
                $this->user_id = $this->data[0]['user_id'];
                $this->username = $this->data[0]['username'];
                $this->password = $this->data[0]['password'];
            }

        }
        
        return $this->data;
    }
    public function getData()
    {
        if($this->data)
        return $this->data;
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