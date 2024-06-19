<?php

namespace App\Controllers;

use Core\Controller;

class HomeController extends Controller
{
    public function index()
    {
        try {
            $data = ['title' => 'Bienvenue sur mon framework PHP', 'params' => 'ceci est un critère en plus'];
            return [
                $this->render('home/index', $data),
            ];
        } catch (\Throwable $th) {
            throw new \ErrorException("Erreur lors de l'affichage de la vue' : " . $th->getMessage());
        }
    }

    public function about()
    {
        $data = ['title' => 'About Me'];
        try {
            return [
                $this->render('home/about', $data),
            ];
        } catch (\Throwable $th) {
            throw new \ErrorException("Erreur lors de l'affichage de la vue' : " . $th->getMessage());
        }
    }
    public function contact()
    {
        $data = ['title' => 'Contact Me'];
        try {
            return [
                $this->render('home/contact', $data),
            ];
        } catch (\Throwable $th) {
            throw new \ErrorException("Erreur lors de l'affichage de la vue' : " . $th->getMessage());
        }
    }
}
