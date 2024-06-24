<?php

namespace App\Controllers;

use App\Services\TwigService;

class HomeController
{
    private $twigService;

    public function __construct()
    {
        $this->twigService = new TwigService();
    }

    public function index()
    {
        try {
            $data = ['title' => 'Bienvenue sur mon framework PHP'];
            return $this->twigService->render('home/index', $data);
        } catch (\Throwable $th) {
            throw new \ErrorException("Erreur lors de l'affichage de la vue : " . $th->getMessage());
        }
    }

    public function about()
    {
        $data = ['title' => 'About Me'];
        try {
            return $this->twigService->render('home/about', $data);
        } catch (\Throwable $th) {
            throw new \ErrorException("Erreur lors de l'affichage de la vue : " . $th->getMessage());
        }
    }

    public function contact()
    {
        $data = ['title' => 'Contact Me'];
        try {
            return $this->twigService->render('home/contact', $data);
        } catch (\Throwable $th) {
            throw new \ErrorException("Erreur lors de l'affichage de la vue : " . $th->getMessage());
        }
    }
}
