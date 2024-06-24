<?php

namespace Core;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class Twig
{
    private $twig;

    public function __construct()
    {
        $loader = new FilesystemLoader(__DIR__ . '/../views');
        $this->twig = new Environment($loader, [
            'cache' => __DIR__ . '/../cache',
            'debug' => true,
        ]);
    }

    public function getTwig()
    {
        return $this->twig;
    }
}
