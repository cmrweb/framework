<?php
class DB
{
    public $pdo;
    public $result;
    function __construct()
    {
        $this->pdo = new PDO("mysql:host={$_ENV['DB_HOST']};dbname={$_ENV['DB_NAME']};", "{$_ENV['DB_USER']}", "{$_ENV['DB_PASS']}", [PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION]);
        return $this->pdo;
    }
    public function select(string $select, string $from, ?string $where = null, ?bool $order = false, ?bool $group = false): array
    {
        $order = preg_replace('/cmr_/', '', $from);
        if ($where) {
            if (!$order) {
                $req = $this->pdo->prepare("SELECT $select FROM $from WHERE $where ORDER BY `id` asc");
                $req->execute();
                return $this->result = $req->fetchAll();
            } else {
                $req = $this->pdo->prepare("SELECT $select FROM $from WHERE $where order by id desc");
                $req->execute();
                return $this->result = $req->fetchAll();
            }
            if ($group) {
                $req = $this->pdo->prepare("SELECT $select FROM $from WHERE $where GROUP by {$group}");
                $req->execute();
                return $this->result = $req->fetchAll();
            } else {
                $req = $this->pdo->prepare("SELECT $select FROM $from WHERE $where");
                $req->execute();
                return $this->result = $req->fetchAll();
            }
        } else {
            if (!$order) {
                $req = $this->pdo->prepare("SELECT $select FROM $from ORDER BY `id` asc");
                $req->execute();
                return $this->result = $req->fetchAll();
            } else {
                $req = $this->pdo->prepare("SELECT $select FROM $from  order by id desc");
                $req->execute();
                return $this->result = $req->fetchAll();
            }
            if ($group) {
                $req = $this->pdo->prepare("SELECT $select FROM $from GROUP by {$group}");
                $req->execute();
                return $this->result = $req->fetchAll();
            } else {
                $req = $this->pdo->prepare("SELECT $select FROM $from");
                $req->execute();
                return $this->result = $req->fetchAll();
            }
        }
    }
    public function insert(string $into, $value, ?string $where = null): self
    {
        if ($where) {
            $query = "INSERT INTO $into(";
            foreach ($value as $key => $val) {
                $query .= "$key,";
            }
            $query = substr($query, 0, -1);

            $query .= ") VALUES (";
            foreach ($value as $key => $val) {
                $query .= ":$key,";
            }
            $query = substr($query, 0, -1);
            $query .= ") WHERE $where";

            foreach ($value as $key => $val) {
                $params[$key] = $val;
            }
            // echo $query;
            // dump($params);
            $req = $this->pdo->prepare("$query");
            $req->execute($params);
            return $this;
        } else {
            $query = "INSERT INTO $into(";
            foreach ($value as $key => $val) {
                $query .= "$key,";
            }
            $query = substr($query, 0, -1);

            $query .= ") VALUES (";
            foreach ($value as $key => $val) {
                $query .= ":$key,";
            }
            $query = substr($query, 0, -1);
            $query .= ")";

            $params=[];
            foreach ($value as $key => $val) {
                $params[$key] = $val;
            }
            // echo $query;
            // dump($params);
            $req = $this->pdo->prepare("$query");
            $req->execute($params);
            return $this;
        }
    }
    public function update(string $table, array $set, ?string $where = null): self
    {

        if ($where) {
            $query = "UPDATE $table SET ";
            foreach ($set as $key => $val) {
                $query .= "$key='{$val}',";
            }
            $query = substr($query, 0, -1);
            $query .= "WHERE $where";
            $req = $this->pdo->prepare("$query");
            $req->execute();
            return $this;
        } else {
            $query = "UPDATE $table SET ";
            foreach ($set as $key => $val) {
                $query .= "$key='{$val}',";
            }
            $query = substr($query, 0, -1);
            $req = $this->pdo->prepare("$query");
            $req->execute();
            return $this;
        }
    }
    public function delete(string $table, ?string $where = null): self
    {
        if ($where) {
            $query = "DELETE FROM $table WHERE $where";
            echo $query;
            $req = $this->pdo->prepare("$query");
            $req->execute();
            return $this;
        } else {
            $req = $this->pdo->prepare("DELETE FROM $table");
            $req->execute();
            return $this;
        }
    }
}
