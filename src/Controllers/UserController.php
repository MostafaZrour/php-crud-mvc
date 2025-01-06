<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\User;

class UserController extends Controller
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new User();
    }

    public function index()
    {
        $users = $this->userModel->all();
        $this->laodView('index', ['users' => $users]);
    }

    public function store()
    {
        $this->laodView('create');
    }

    public function create()
    {
        $errors = [];
        $data = [
            'name' => htmlspecialchars($_POST['name'] ?? ''),
            'email' => htmlspecialchars($_POST['email'] ?? '')
        ];

        if (empty($data['name'])) {
            $errors['name'] = 'Name is required.';
        }

        if (empty($data['email'])) {
            $errors['email'] = 'Email is required.';
        } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Invalid email format.';
        }

        if (!empty($errors)) {
            $this->laodView('create', ['errors' => $errors, 'data' => $data]);
            return;
        }

        $this->userModel->create($data);
        header('Location: /');
    }

    public function show()
    {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $user = $this->userModel->find($id);
            $this->laodView('update', ['user' => $user]);
        }
    }

    public function update()
    {
        $errors = [];
        $id = $_POST['id'] ?? null;
        $data = [
            'name' => htmlspecialchars($_POST['name'] ?? ''),
            'email' => htmlspecialchars($_POST['email'] ?? '')
        ];

        if (empty($data['name'])) {
            $errors['name'] = 'Name is required.';
        }

        if (empty($data['email'])) {
            $errors['email'] = 'Email is required.';
        } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Invalid email format.';
        }

        if (!empty($errors)) {
            $user = $this->userModel->find($id);
            $this->laodView('update', ['errors' => $errors, 'data' => $data, 'user' => $user]);
            return;
        }

        $this->userModel->update($id, $data);
        header('Location: /');
    }

    public function delete()
    {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $this->userModel->delete($id);
            header('Location: /');
        }
    }
}
