<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Product;

class ProductController extends Controller
{
    private $productModel;

    public function __construct()
    {
        $this->productModel = new Product();
    }

    public function index()
    {
        $products = $this->productModel->all();
        $this->laodView('product/index', ['products' => $products]);
    }

    public function store()
    {
        $this->laodView('product/create', ['data' => [], 'errors' => []]);
    }

    public function create()
    {
        $errors = [];
        $name = trim($_POST['name'] ?? '');
        $price = trim($_POST['price'] ?? '');
        $description = trim($_POST['description'] ?? '');
        
        $data = [
            'name' => $name,
            'price' => $price,
            'description' => $description
        ];

        if (empty($name)) {
            $errors['name'] = 'Name is required.';
        }

        if (empty($price)) {
            $errors['price'] = 'Price is required.';
        } elseif (!is_numeric($price) || $price < 0) {
            $errors['price'] = 'Price must be a positive number.';
        }

        if (empty($description)) {
            $errors['description'] = 'Description is required.';
        }

        if (!empty($errors)) {
            $this->laodView('product/create', ['errors' => $errors, 'data' => $data]);
            return;
        }

        $this->productModel->create($data);
        header('Location: ?action=products');
    }

    public function show()
    {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $product = $this->productModel->find($id);
            $this->laodView('product/update', ['product' => $product, 'data' => [], 'errors' => []]);
        }
    }

    public function update()
    {
        $errors = [];
        $id = $_POST['id'] ?? null;
        $name = trim($_POST['name'] ?? '');
        $price = trim($_POST['price'] ?? '');
        $description = trim($_POST['description'] ?? '');
        
        $data = [
            'name' => $name,
            'price' => $price,
            'description' => $description
        ];

        if (empty($name)) {
            $errors['name'] = 'Name is required.';
        }

        if (empty($price)) {
            $errors['price'] = 'Price is required.';
        } elseif (!is_numeric($price) || $price < 0) {
            $errors['price'] = 'Price must be a positive number.';
        }

        if (empty($description)) {
            $errors['description'] = 'Description is required.';
        }

        if (!empty($errors)) {
            $product = $this->productModel->find($id);
            $this->laodView('product/update', ['errors' => $errors, 'data' => $data, 'product' => $product]);
            return;
        }

        $this->productModel->update($id, $data);
        header('Location: ?action=products');
    }

    public function delete()
    {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $this->productModel->delete($id);
            header('Location: ?action=products');
        }
    }
}
