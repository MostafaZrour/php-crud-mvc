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

    public function login()
    {
        if (isset($_SESSION['user_id'])) {
            header('Location: ?action=dashboard');
            return;
        }
        $this->laodView('auth/login', ['data' => [], 'errors' => []]);
    }

    public function verify()
    {
        $errors = [];
        $email = trim($_POST['email'] ?? '');
        $password = trim($_POST['password'] ?? '');
        
        $data = [
            'email' => $email,
            'password' => $password
        ];

        if (empty($email)) {
            $errors['email'] = 'Email is required.';
        }

        if (empty($password)) {
            $errors['password'] = 'Password is required.';
        }

        if (!empty($errors)) {
            $this->laodView('auth/login', ['errors' => $errors, 'data' => $data]);
            return;
        }

        // Check if user exists
        $user = $this->userModel->findByEmail($email);
        
        if (!$user || $user['password'] !== $password) {
            $errors['login'] = 'Invalid email or password.';
            $this->laodView('auth/login', ['errors' => $errors, 'data' => $data]);
            return;
        }

        // Start session and set user
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_email'] = $user['email'];
        $_SESSION['user_name'] = $user['name'];
        
        header('Location: ?action=dashboard');
    }

    public function dashboard()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: ?action=login');
            return;
        }
        
        $this->laodView('auth/dashboard', ['user' => $_SESSION]);
    }

    public function logout()
    {
        session_destroy();
        header('Location: ?action=login');
    }
}
