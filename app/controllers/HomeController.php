<?php

namespace App\Controllers;

use Core\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $data = ['title' => 'Bienvenue sur mon framework PHP'];
        $this->render('home/index', $data);
    }
    public function about()
    {
        $data = ['title' => 'About Me'];
        $this->render('home/about', $data);
    }
    public function contact()
    {
        $data = ['title' => 'Contact Me'];
        $this->render('home/contact', $data);
    }
}
