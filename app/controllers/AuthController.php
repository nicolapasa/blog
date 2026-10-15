<?php
require_once __DIR__ . '/../models/User.php';

class AuthController extends Controller {
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';
            $user = User::findByEmail($email);
            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                header('Location: /posts'); exit;
            } else {
                $error = 'Credenziali non valide';
            }
        }
        $this->view('auth/login', isset($error) ? ['error'=>$error] : []);
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? '';
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';
            if (User::findByEmail($email)) {
                $error = 'Email già registrata';
                $this->view('auth/register', ['error'=>$error]); return;
            }
            User::create($name, $email, $password);
            header('Location: /login'); exit;
        }
        $this->view('auth/register');
    }

    public function logout() {
        session_unset();
        session_destroy();
        header('Location: /login'); exit;
    }
}
