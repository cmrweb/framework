<?php
class User
{

    private $pdo;
    private $data;
    private $id;
    private $email;
    private $password;
    private $admin_lvl;

    function __construct($bool = NULL)
    {
        $this->pdo = new DB;
        $this->pdo->select('*', 'user', $bool);
        foreach ($this->pdo->result as $value) {
            $this->data[$value['id']] = [
                'id' => $value['id'],
                'email' => $value['email'],
                'password' => $value['password'],
                'admin_lvl' => $value['admin_lvl']
            ];
            $this->id[] = $value['id'];
            $this->email[] = $value['email'];
            $this->password[] = $value['password'];
            $this->admin_lvl[] = $value['admin_lvl'];
        }
        return $this->data;
    }
    public function getData(): ?array
    {
        return $this->data;
    }
    public function setData($data)
    {
        $this->pdo->insert('user', $data);
    }
    public function update($data, $id)
    {
        $this->pdo->update('user', $data, $id);
    }
    public function delete($data)
    {
        $this->pdo->delete('user', "id=" . $data);
    }
}
