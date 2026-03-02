<?php

namespace App\Models;

use App\Config\Database;

class Product extends Database
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    public function all()
    {
        $stm = $this->db->query("SELECT * FROM products");
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function create($data)
    {
        $stm = $this->db->prepare("INSERT INTO products (name, price, description) VALUES (?, ?, ?)");
        $stm->execute([$data["name"], $data["price"], $data["description"]]);
    }

    public function find($id)
    {
        $stm = $this->db->prepare("SELECT * FROM products WHERE id = ?");
        $stm->execute([$id]);
        return $stm->fetch(\PDO::FETCH_ASSOC);
    }

    public function update($id, $data)
    {
        $stm = $this->db->prepare("UPDATE products SET name = ?, price = ?, description = ? WHERE id = ?");
        $stm->execute([$data['name'], $data['price'], $data['description'], $id]);
    }

    public function delete($id)
    {
        $stm = $this->db->prepare("DELETE FROM products WHERE id = ?");
        $stm->execute([$id]);
    }
}
