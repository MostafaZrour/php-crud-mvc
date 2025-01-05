<?php

namespace App\Models;

use App\Config\Database;

class User extends Database
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }
    public function all()
    {
        $stm = $this->db->query("SELECT * FROM users");
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function  create($data)
    {
        $stm = $this->db->prepare("insert into users (name , email) values (? , ?)");
        $stm->execute([$data["name"], $data["email"]]);
    }
    public function find($id)
    {
        $stm = $this->db->prepare("select * from users where id = ?");
        $stm->execute([$id]);
        return $stm->fetch(\PDO::FETCH_ASSOC);
    }
    public function update($id, $data)
    {
        $stm = $this->db->prepare("update users set name = ?, email = ? where id = ?");
        $stm->execute([$data['name'], $data['email'], $id]);
    }

    public function delete($id)
    {
        $stm = $this->db->prepare("delete from users where id = ?");
        $stm->execute([$id]);
    }
}
