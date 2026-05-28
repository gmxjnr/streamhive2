<?php

class AuthController
{
    private $authService;

    public function __construct()
    {
        $this->authService = new AuthService();
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return;
        }

        try {
            $data = [
                'name' => $_POST['name'] ?? '',
                'email' => $_POST['email'] ?? '',
                'password' => $_POST['password'] ?? ''
            ];
            $userId = $this->authService->register($data);
            header("Location: /login");
            exit();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return;
        }

        try {
            $emailOrUsername = $_POST['emailOrUsername'] ?? '';
            $password = $_POST['password'] ?? '';
            $user = $this->authService->login($emailOrUsername, $password);
            header("Location: /dashboard");
            exit();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}