<?php

namespace App\Controllers;

use App\Models\Managers\UserManager;
use App\Services\TwigService;


class SecurityController
{
    private $userManager;
    private $twigService;


    public function __construct()
    {
        $this->userManager = new UserManager();
        $this->twigService = new TwigService();
    }

    public function loginForm()
    {
        $data = ['title' => 'Login'];
        try {
            return $this->twigService->render('security/login', $data);
        } catch (\Throwable $th) {
            throw new \ErrorException("Erreur lors de l'affichage de la vue' : " . $th->getMessage());
        }
    }

    public function registerForm()
    {
        $data = ['title' => 'Register'];
        try {
            return $this->twigService->render('security/register', $data);
        } catch (\Throwable $th) {
            throw new \ErrorException("Erreur lors de l'affichage de la vue' : " . $th->getMessage());
        }
    }
    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $hash_password = password_hash($password, PASSWORD_BCRYPT);

            $this->userManager->register($name, $email, $hash_password);

            header('Location: /loginForm');
            exit();
        }
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            if ($this->userManager->login($email, $password)) {
                header('Location: /');
                exit();
            } else {
                $error = "Invalid email or password";
            }
        }
    }

    public function logout()
    {
        $this->userManager->logout();
        header('Location: /loginForm');
        exit();
    }
}
