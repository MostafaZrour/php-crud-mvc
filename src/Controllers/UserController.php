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

    function  store()
    {
        $this->laodView('create');
    }

    function create()
    {
        $data = [
            'name' => htmlspecialchars($_POST['name']),
            'email' => htmlspecialchars($_POST['email'])
        ];
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
        $id = $_POST['id'];
        $data = [
            'name' => $_POST['name'],
            'email' => $_POST['email']
        ];

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
